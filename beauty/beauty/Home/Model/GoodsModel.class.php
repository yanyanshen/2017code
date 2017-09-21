<?php
namespace Home\Model;
use Think\Model;
class GoodsModel extends Model{
    //用户还喜欢所要展示的一些商品列表,根据商品的分类进行推荐用户的喜欢
    public function userlike($gid){
        //用户还喜欢所要展示的一些商品列表,根据商品的分类进行推荐用户的喜欢
        $cidarr=$this->field('cid')->where(array('id'=>$gid))->find();
        $cid=$cidarr['cid'];
        $likegoods=$this->where(array('cid'=>$cid))->order('salenum desc')->limit(0,5)->select();
        return $likegoods;
    }

    //查询搜索框下面的一些分类，只存放一些顶级分类
    public function catelist(){
        $catelist=$this->table('beauty_category')->where(array('pid'=>0))->select();
        return $catelist;
    }
    //显示商品的属性
    public function type($gid){
        $type=$this->table('beauty_type')->where(array('gid'=>$gid))->select();
        return $type;
    }

    public function brand($gid){
        //得到商品的品牌
        $bid1=$this->field('bid')->where(array('id'=>$gid))->find();
        $bid=$bid1['bid'];
        $brandInfo=M('Brands')->field('blogopath,blogoname,id')->where(array('id'=>$bid))->select();
        return $brandInfo;
    }

    public function fuimg($gid){
        //显示商品的副图
        $fugoodsimage=$this->table('beauty_pic')->where(array('gid'=>$gid))->select();
        return $fugoodsimage;
    }

    public function zhuimg($gid){
        //显示商品的主图
        $zhugoodsimage=$this->field('imageurl,imagename')->where(array('id'=>$gid))->select();
        return $zhugoodsimage;
    }

    public function foot($gid){
        //展示商品的一些信息
        $goodsdetail=$this->where(array('id'=>$gid))->select();
        if(session('mid')){
            $where2['gid']=I('gid');
            $where2['mid']=session('mid');
            if(!M('footprint')->where($where2)->find()){
                $date['mid']=session('mid');
                $date['gid']=I('gid');
                $date['addtime']=time();
                foreach($goodsdetail as $v){
                    $date['goodsname']=$v['goodsname'];
                    $date['imageurl']=$v['imageurl'];
                    $date['imagename']=$v['imagename'];
                    $date['saleprice']=$v['saleprice'];
                }
                M('footprint')->add($date);
            }else{
                $where3['mid']=session('mid');
                $where3['gid']=I('gid');
                $date['addtime']=time();
                M('footprint')->where($where3)->save($date);
            }
        }

        return $goodsdetail;
    }

    //遍历组合购买的一些商品信息
    public function combuy($gid){
        //遍历组合购买的一些商品
        $goodsdetail1=$this->where(array('id'=>$gid))->select();
        $bidarr=$this->field('bid')->where(array('id'=>$gid))->find();
        $bid=$bidarr['bid'];
        $combgoods1=$this->where(array('bid'=>$bid))->order('salenum desc')->limit(2,1)->select();
        $combgoods2=$this->where(array('bid'=>$bid))->order('salenum desc')->limit(1,1)->select();
        //将组合购买的商品id组合购买的页面
        $gidinfo='';
        foreach($combgoods1 as $v1){
            $gidinfo.=$v1['id'].',';
        }
        foreach($combgoods2 as $v2){
            $gidinfo.=$v2['id'].',';
        }
        foreach($goodsdetail1 as $v3){
            $gidinfo.=$v3['id'];
        }
        return $gidinfo;
    }

    public function com1($gid){
        $bidarr=$this->field('bid')->where(array('id'=>$gid))->find();
        $bid=$bidarr['bid'];
        $combgoods1=$this->where(array('bid'=>$bid))->order('salenum desc')->limit(2,1)->select();
        return $combgoods1;
    }

    public function com2($gid){
        $bidarr=$this->field('bid')->where(array('id'=>$gid))->find();
        $bid=$bidarr['bid'];
        $combgoods2=$this->where(array('bid'=>$bid))->order('salenum desc')->limit(1,1)->select();
        return $combgoods2;
    }

    public function guige($gid){
        //商品详情
        $description=$this->field('description')->where(array('id'=>$gid))->find();
        $des=explode(',',$description['description']);
        return $des;
    }

    public function detail($gid){
        //显示商品的信息
        $goodsdetail1=$this->field('goodsname,imageurl,imagename,num,salenum,marketprice,score,id')->where(array('id'=>$gid))->select();
        $salepriceinfo=$this->table('beauty_type')->where(array('gid'=>$gid))->find();
        $goodsdetail1[0]['saleprice']=$salepriceinfo['saleprice'];
        return $goodsdetail1;
    }

    //查询主图上面的商品路径
    public function goodspath($gid){
        $goodspath=$this->where(array('id'=>$gid))->find();
        $where['path']=array('like',"%{$goodspath['cid']}%");
        $where['pid']=0;
        $firstcate=$this->table('beauty_category')->where($where)->find();
        $firstcname=$firstcate['cname'];
        $cnameinfo=$this->table('beauty_category')->where(array('id'=>$goodspath['cid']))->find();
        $cname=$cnameinfo['cname'];
        $brandinfo=$this->table('beauty_brands')->where(array('id'=>$goodspath['bid']))->find();
        $bname=$brandinfo['bname'];
        $goodsname=mb_substr($goodspath['goodsname'],0,5,'utf8');
        $pathinfo='全部 '.' > '.$firstcname.' > '.$cname.' > '.$bname.' > '.$goodsname;
        return $pathinfo;
    }
}