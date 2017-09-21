<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class BuyBrandsController extends Controller
{
    /*链接用户中心的index方法*/
    public function index()
    {
        $bid=I('get.bid');
        $goodsObj=M('goods');//实例化对象
        $count=$goodsObj->count();
        $Page=new Page($count,10);
        $show=$Page->show();//分页显示
        $where['_string']='a.bid=b.id and b.id=g.bid and g.show=1 and a.astatus=1 and b.status=1';
        $where['b.id']=$bid;
        $list=$goodsObj->table('beauty_activity a,beauty_brands b,beauty_goods g')
            ->where($where)
            ->order('a.addtime,g.salenum')
            ->limit($Page->firstRow.','.$Page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('page',$show);
        $this->display('Buy_Brands');
    }
/*限时团购*/
    public function groupBuy(){
        //实例化对象
        $goodsObj=M('activity');//实例化对象
        $count=$goodsObj->count();
        $Page=new Page($count,10);
        $show=$Page->show();//分页显示
        $where['_string']='a.bid=b.id and b.id=g.bid and g.show=1 and a.astatus=1 and b.status=1 and a.aname="限时团购"';
        $list=$goodsObj->where($where)
            ->table('beauty_activity a,beauty_brands b,beauty_goods g')
            ->order('a.addtime desc,g.addtime desc')
            ->limit($Page->firstRow.','.$Page->listRows)
           ->select();
        foreach($list as $k=>$v){
            $list[$k]['restTime']=$v['stoptime']-time();
            preg_match_all('/\d+\d/',$v['rules'],$rule);
            $list[$k]['groupprice']=$v['saleprice']-$rule[0][0];
        }
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('empty',"<h1 style='text-align: center'>没有相应的数据了哦</h1>");
        //print_r($list);
        $this->assign('page',$show);
        $this->assign('list',$list);
        $this->display('Buy_Brands');
    }



    public function goodsdetail(){
        if(IS_GET){
            $gid=I('get.gid');
        }
        $goods=M('Goods');
        $where1['id']=I('gid');
        $goodswhere['id']=$gid;
        $typewhere['gid']=$gid;
        $picwhere['gid']=$gid;
        $commentwhere['gid']=$gid;
        //显示商品的信息
        $goodsdetail1=$goods->where($goodswhere)->select();
        //商品详情
        $description=$goods->field('description')->where($goodswhere)->find();
        $des=explode(',',$description['description']);

        $gname=$goods->where($goodswhere)->find();
        $goodsname=$gname['goodsname'];
        //显示商品的属性
        $type1=M('Type')->where($typewhere)->find();
        $type=explode(',',$type1['ml']);
        //显示商品的主图
        $zhugoodsimage=$goods->field('imageurl,imagename')->where($goodswhere)->select();
        //显示商品的副图
        $fugoodsimage=M('Pic')->where($picwhere)->select();

        //显示好评率，以及好，中，差的百分率
        //全部的评论条目
        $totalcount=M('Comment')->where($commentwhere)->count();
        //查询好评的评论条目
        $greatecount=M('Comment')->where(array('gid'=>$gid,'cosid'=>1))->count();
        $greate=($greatecount/$totalcount)*100;

        //查询中评的评论条目
        $middlecount=M('Comment')->where(array('gid'=>$gid,'cosid'=>2))->count();
        $middle=($middlecount/$totalcount)*100;
        //查询差评的评论条目
        $badcount=M('Comment')->where(array('gid'=>$gid,'cosid'=>3))->count();
        $bad=($badcount/$totalcount)*100;
        //显示给商品的所有评价，需要显示的字段,用户头像，用户昵称，型号，评价内容，评价时间，回复内容
        $commresponlist=M('Comment')->field('c.content,c.coaddtime,c.response,u.username,c.ml,c.readdtime,c.respid')
            ->table('beauty_comment c,beauty_user u')->where($commentwhere)
            ->where('c.mid=u.id')
            ->select();

        //用户还喜欢所要展示的一些商品列表,根据商品的分类进行推荐用户的喜欢
        $cidarr=$goods->field('cid')->where(array('id'=>$gid))->find();
        $cid=$cidarr['cid'];
        $likegoods=$goods->where(array('cid'=>$cid))->order('salenum desc')->limit(0,5)->select();

        //查询搜索框下面的一些分类，只存放一些顶级分类
        $catelist=M('Category')->where(array('pid'=>0))->select();

        //遍历组合购买的一些商品
        $bidarr=$goods->field('bid')->where(array('id'=>$gid))->find();
        $bid=$bidarr['bid'];

        $combgoods1=$goods->where(array('bid'=>$bid))->order('salenum desc')->limit(0,1)->select();
        $combgoods2=$goods->where(array('bid'=>$bid))->order('salenum desc')->limit(1,2)->select();
        $combgoods3=$goods->where(array('bid'=>$bid))->order('salenum desc')->limit(2,3)->select();

        //展示商品的一些信息

        $goodsdetail=$goods->where($where1)->select();
        // print_r($goodsdetail);
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
        $this->assign('goodsdetail',$goodsdetail);
        $this->assign('goodsdetail1',$goodsdetail1);
        $this->assign('type',$type);
        //展示商品的图片信息
        $this->assign('zhugoodsimage',$zhugoodsimage);
        $this->assign('fugoodsimage',$fugoodsimage);
        //显示商品的评论回复信息
        $this->assign('commresponlist',$commresponlist);
        $this->assign('empty','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        //显示商品的中，差，好评率
        $this->assign('totalcount',$totalcount);
        $this->assign('greate',$greate);
        $this->assign('middle',$middle);
        $this->assign('bad',$bad);
        //商品详情,包含规格主图一些信息
        $this->assign('ml',$des[0]);
        $this->assign('shape',$des[1]);
        $this->assign('pack',$des[2]);
        $this->assign('apply',$des[3]);
        //显示商品的名字
        $this->assign('goodsname',$goodsname);
        //$bid1=$goods->field('bid')->where(array('id'=>$gid))->find();

        $brandInfo=M('Brands')->field('blogopath,blogoname,id')->where(array('id'=>$bid))->find();
        //print_r($brandInfo);
        $this->assign('brandInfo',$brandInfo);
        //显示用户还喜欢的一些商品信息图片
        $this->assign('likegoods',$likegoods);
        //显示搜索框下面的分类信息
        $this->assign('catelist',$catelist);
        $man=I('man');
        $jian=I('jian');
        $this->assign('man',$man);
        $this->assign('jian',$jian);
        //组合购买的一些信息
        $this->assign('combgoods1',$combgoods1);
        $this->assign('combgoods2',$combgoods2);
        $this->assign('combgoods3',$combgoods3);
        $this->display('Product');

    }

    public function groupdetail(){
        if(IS_GET){
            $gid=I('get.gid');
        }
        $goods=M('Goods');
        $where1['id']=I('gid');
        $goodswhere['id']=$gid;
        $typewhere['gid']=$gid;
        $picwhere['gid']=$gid;
        $commentwhere['gid']=$gid;
        //显示商品的信息
        $goodsdetail1=$goods->where($goodswhere)->select();
        //商品详情
        $description=$goods->field('description')->where($goodswhere)->find();
        $des=explode(',',$description['description']);

        $gname=$goods->where($goodswhere)->find();
        $goodsname=$gname['goodsname'];
        //显示商品的属性
        $type1=M('Type')->where($typewhere)->find();
        $type=explode(',',$type1['ml']);
        //显示商品的主图
        $zhugoodsimage=$goods->field('imageurl,imagename')->where($goodswhere)->select();
        //显示商品的副图
        $fugoodsimage=M('Pic')->where($picwhere)->select();

        //显示好评率，以及好，中，差的百分率
        //全部的评论条目
        $totalcount=M('Comment')->where($commentwhere)->count();
        //查询好评的评论条目
        $greatecount=M('Comment')->where(array('gid'=>$gid,'cosid'=>1))->count();
        $greate=($greatecount/$totalcount)*100;

        //查询中评的评论条目
        $middlecount=M('Comment')->where(array('gid'=>$gid,'cosid'=>2))->count();
        $middle=($middlecount/$totalcount)*100;
        //查询差评的评论条目
        $badcount=M('Comment')->where(array('gid'=>$gid,'cosid'=>3))->count();
        $bad=($badcount/$totalcount)*100;
        //显示给商品的所有评价，需要显示的字段,用户头像，用户昵称，型号，评价内容，评价时间，回复内容
        $commresponlist=M('Comment')->field('c.content,c.coaddtime,c.response,u.username,c.ml,c.readdtime,c.respid')
            ->table('beauty_comment c,beauty_user u')->where($commentwhere)
            ->where('c.mid=u.id')
            ->select();

        //用户还喜欢所要展示的一些商品列表,根据商品的分类进行推荐用户的喜欢
        $cidarr=$goods->field('cid')->where(array('id'=>$gid))->find();
        $cid=$cidarr['cid'];
        $likegoods=$goods->where(array('cid'=>$cid))->order('salenum desc')->limit(0,5)->select();

        //查询搜索框下面的一些分类，只存放一些顶级分类
        $catelist=M('Category')->where(array('pid'=>0))->select();

        //遍历组合购买的一些商品
        $bidarr=$goods->field('bid')->where(array('id'=>$gid))->find();
        $bid=$bidarr['bid'];
        $combgoods1=$goods->where(array('bid'=>$bid))->order('salenum desc')->limit(0,1)->select();
        $combgoods2=$goods->where(array('bid'=>$bid))->order('salenum desc')->limit(1,2)->select();
        $combgoods3=$goods->where(array('bid'=>$bid))->order('salenum desc')->limit(2,3)->select();

        //展示商品的一些信息

        $goodsdetail=$goods->where($where1)->select();
        // print_r($goodsdetail);
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
        $this->assign('goodsdetail',$goodsdetail);
        $this->assign('goodsdetail1',$goodsdetail1);
        $this->assign('resttime',I('resttime'));
        $this->assign('type',$type);
        //展示商品的图片信息
        $this->assign('zhugoodsimage',$zhugoodsimage);
        $this->assign('fugoodsimage',$fugoodsimage);
        //显示商品的评论回复信息
        $this->assign('commresponlist',$commresponlist);
        $this->assign('empty','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        //显示商品的中，差，好评率
        $this->assign('totalcount',$totalcount);
        $this->assign('greate',$greate);
        $this->assign('middle',$middle);
        $this->assign('bad',$bad);
        //商品详情,包含规格主图一些信息
        $this->assign('ml',$des[0]);
        $this->assign('shape',$des[1]);
        $this->assign('pack',$des[2]);
        $this->assign('apply',$des[3]);
        //显示商品的名字
        $this->assign('goodsname',$goodsname);

        //显示用户还喜欢的一些商品信息图片
        $this->assign('likegoods',$likegoods);
        //显示搜索框下面的分类信息
        $this->assign('catelist',$catelist);
        $tuan=I('tuan');
        $brandInfo=M('Brands')->field('blogopath,blogoname,id')->where(array('id'=>$bid))->find();
        //print_r($brandInfo);
        $this->assign('brandInfo',$brandInfo);
        //组合购买的一些信息
        $this->assign('tuan',$tuan);
        $this->assign('combgoods1',$combgoods1);
        $this->assign('combgoods2',$combgoods2);
        $this->assign('combgoods3',$combgoods3);
        $this->display('groupProduct');

    }

    public function tobuy(){
        //提交表单的时候得到商品的商品id和销售数量
        $gid = I('post.gid');
        $salenum = I('post.salenum');
        $ml=I('post.xinghao');
        if (session('mid')) {
            $g = M('Goods');
            $where['id'] = $gid;
            //得到订单列表orderlist
            $goods=$g->query("select (saleprice*$salenum) as orderprice from beauty_goods where id=$gid");

            $orderlist=$g->field('goodsname,imageurl,discount,saleprice,imagename')->where($where)->select();
            foreach($orderlist as $k=>$v){
                foreach($goods as $v){
                    if($v['orderprice']>I('get.man')){
                        $orderlist[$k]['price']=$v['orderprice']-I('get.jian');
                    }else{
                        $orderlist[$k]['price']=$v['orderprice'];
                    }

                }
                $orderlist[$k]['buynum']=$salenum;
                $orderlist[$k]['ml']=$ml;
            }
            $this->assign('orderlist',$orderlist);
            //将商品的id传过去，作为隐藏提交的时候提交上来
           // print_r(I('get.man'));
            $this->assign('gid',$gid);
            $this->assign('man',I('get.man'));
            $this->assign('jian',I('get.jian'));
            $this->showaddress();
            $this->display('BuyBrands/Order_payment');

        }

    }

    public function tuantobuy(){
        //提交表单的时候得到商品的商品id和销售数量和型号
        $gid = I('post.gid');
        $salenum = I('post.salenum');
        $ml=I('post.xinghao');
        if (session('mid')) {
            $g = M('Goods');
            $where['id'] = $gid;
            //得到订单列表orderlist
            $goods=$g->query("select (saleprice*$salenum) as orderprice from beauty_goods where id=$gid");
            $orderlist=$g->field('goodsname,imageurl,discount,saleprice,imagename')->where($where)->select();
            foreach($orderlist as $k=>$v){
                foreach($goods as $v){
                    $orderlist[$k]['price']=$v['orderprice'];
                }
                $orderlist[$k]['buynum']=$salenum;
                $orderlist[$k]['ml']=$ml;
            }
            $this->assign('orderlist',$orderlist);
            //将商品的id传过去，作为隐藏提交的时候提交上来
            $this->assign('gid',$gid);
            $this->assign('tuan',I('post.tuan'));
            $this->showaddress();
            $this->display('BuyBrands/Order_payment1');
        }

    }




    public function showaddress(){
        //收货地址
        $User=M('addresses');
        //$where['mid']=session('mid');
        $where['mid']=session('mid');
        $addressList=$User->where($where)->order('addtime desc')->select();
        foreach($addressList as $k=>$v){
            $list[$k]=$v;
            $list[$k]['totaladdress']=$v['shengfen'].$v['shi'].$v['xian'];
        }
        $this->assign('list',$list);
    }


}


