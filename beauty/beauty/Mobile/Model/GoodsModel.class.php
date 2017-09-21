<?php
namespace Mobile\Model;
use Think\Model;
class GoodsModel extends Model{
    //查询商品的一些详情信息
    public function goods($gid){
        $goodsInfo=$this->field('goodsname,imageurl,imagename,num,salenum,marketprice,score,id')->where(array('id'=>$gid))->select();
        $salepriceinfo=$this->table('beauty_type')->where(array('gid'=>$gid))->find();
        $goodsInfo[0]['saleprice']=$salepriceinfo['saleprice'];
        return $goodsInfo;
    }

    //查询商品的型号信息
    public function type($gid){
        $typeinfo=$this->table('beauty_type')->where(array('gid'=>$gid))->select();
        return $typeinfo;
    }

    //将商品的活动直接遍历出来，将价格直接变成商品的活动价格
    public function rules($gid){
        //查询该商品的品牌
        $bidinfo=$this->where(array('id'=>$gid))->find();
        $bid=$bidinfo['bid'];
        //查询参加活动的规则
        $rules=$this->table('beauty_activity')->field('rules,aname')->where(array('bid'=>$bid,'astatus'=>1))->select();
        //查询该商品的价格
        $saleprice=$this->table('beauty_type')->where(array('id'=>$gid))->find();
        if($rules){
            if($rules[0]['aname']=='限时特卖'){
                $reg='/\d+\d/';
               preg_match_all($reg,$rules[0]['rules'],$arr);
                if($saleprice['saleprice']>$arr[0][0]){
                    $rules[0]['saleprice']=$saleprice['saleprice']-$arr[0][1];
                }else{
                    $rules[0]['saleprice']=$saleprice['saleprice'];
                }
            }elseif($rules[0]['aname']=='限时团购'){
                $reg='/\d+\d/';
                preg_match_all($reg,$rules[0]['rules'],$arr);
                $rules[0]['saleprice']=$saleprice['saleprice']-$arr[0][0];
            }
        }else{
            $rules[0]['saleprice']=$bidinfo['saleprice'];
        }
        return $rules;
    }

    //查询商品的主图信息
    public function zhuimg($gid){
        $zhuimg=$this->field('imageurl,imagename')->where(array('id'=>$gid))->select();
        return $zhuimg;
    }

    //查询商品的副图信息
    public function fuimg($gid){
        $fuimg=$this->table('beauty_pic')->field('picurl,picname')->where(array('gid'=>$gid))->select();
        return $fuimg;
    }


    //查询所有的成交记录
    public function orderrecord($gid){
        $orderinfo=$this->field('ad.mobile,o.create_time,og.ml,og.buynum')->table('beauty_order_goods og,beauty_order o,beauty_addresses ad')
            ->where('og.oid=o.id and o.address=ad.id')
            ->where(array('og.gid'=>$gid))->select();
        return $orderinfo;


    }

//足迹
    public function foot($gid){
        //展示商品的一些信息
        $footprint=$this->where(array('id'=>$gid))->select();
        if(session('mid')){
            $where2['gid']=I('gid');
            $where2['mid']=session('mid');
            if(!M('footprint')->where($where2)->find()){
                $date['mid']=session('mid');
                $date['gid']=I('gid');
                $date['addtime']=time();
                foreach($footprint as $v){
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
        return $footprint;
    }
}