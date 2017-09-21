<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class HuiyuanController extends Controller{
    public function index(){
        $this->huiyuan();
        $this->display('huiyuan');
    }

    public function huiyuan(){
     $goodsInfo= M('goods')->table('beauty_goods g,beauty_brands b')
         ->field('g.id,b.bname,g.goodsname,g.imageurl,g.imagename,g.salenum,b.blogopath,b.blogoname,g.bid,g.saleprice')
         ->where('g.bid=b.id and ismember=1')->select();
       foreach($goodsInfo as $k=>$v){
           $goodsInfo[$k]['saleprice']=ceil($v['saleprice']*0.7);
       }
        $this->assign('goodsInfo',$goodsInfo);
    }

    public function goodsdetail(){
        $gid=I('get.gid');
        $goods=M('Goods');
        $mid=session('mid');
        if($mid){
            $uservip=M('User')->field('memberorder')->where(array('id'=>$mid))->find();
            $this->assign('uservip',$uservip['memberorder']);
        }
        $commentwhere1['c.gid']=$gid;
        $commentwhere2['c.gid']=$gid;
        $commentwhere3['c.gid']=$gid;
        $commentwhere4['c.gid']=$gid;
        $commentwhere2['c.cosid']=1;
        $commentwhere3['c.cosid']=2;
        $commentwhere4['c.cosid']=3;
        //显示好评率，以及好，中，差的百分率
        //全部的评论条目
        $list=D('Comment');
        $limitRows = 1; // 设置每页记录数
        $totalcount1=M('Comment')->where(array('gid'=>$gid))->count();//总记录数
        $p1 = new \Org\Beauty\AjaxPage($totalcount1,$limitRows,"goodsdetail1"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value1 = $p1->firstRow .",". $p1->listRows;
        $commresponlist1=$list->goods($commentwhere1,$limit_value1);
        $page1 = $p1->show(); //产生分页信息，AJAX的连接在此处生成

        $totalcount2=M('Comment')->where(array('gid'=>$gid,'cosid'=>1))->count();//总记录数
        $p2 = new \Org\Beauty\AjaxPage($totalcount2,$limitRows,"goodsdetail2"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value2 = $p2->firstRow .",". $p2->listRows;
        $commresponlist2=$list->goods($commentwhere2,$limit_value2);
        $page2 = $p2->show(); //产生分页信息，AJAX的连接在此处生成

        $totalcount3=M('Comment')->where(array('gid'=>$gid,'cosid'=>2))->count();//总记录数
        $p3 = new \Org\Beauty\AjaxPage($totalcount3,$limitRows,"goodsdetail3"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value3 = $p3->firstRow .",". $p3->listRows;
        $commresponlist3=$list->goods($commentwhere3,$limit_value3);
        $page3 = $p3->show(); //产生分页信息，AJAX的连接在此处生成

        $totalcount4=M('Comment')->where(array('gid'=>$gid,'cosid'=>3))->count();//总记录数
        $p4 = new \Org\Beauty\AjaxPage($totalcount4,$limitRows,"goodsdetail4"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value4 = $p4->firstRow .",". $p4->listRows;
        $commresponlist4=$list->goods($commentwhere4,$limit_value4);
        $page4 = $p4->show(); //产生分页信息，AJAX的连接在此处生成
        //查询好评的评论条目
        $greatecount=M('Comment')->where(array('gid'=>$gid,'cosid'=>1))->count();
        $greate=($greatecount/$totalcount1)*100;
        //查询中评的评论条目
        $middlecount=M('Comment')->where(array('gid'=>$gid,'cosid'=>2))->count();
        $middle=($middlecount/$totalcount1)*100;
        //查询差评的评论条目
        $badcount=M('Comment')->where(array('gid'=>$gid,'cosid'=>3))->count();
        $bad=($badcount/$totalcount1)*100;

        $goodsdetail=D('Goods')->foot($gid);
        $this->assign('goodsdetail',$goodsdetail);
        $goodsdetail1=M('Goods')->field('goodsname,imageurl,imagename,num,salenum,marketprice,score,id')->where(array('id'=>$gid))->select();
        $salepriceinfo=M('Type')->table('beauty_type')->where(array('gid'=>$gid))->find();
        $goodsdetail1[0]['saleprice']=$salepriceinfo['saleprice'];
        $goodsdetail1[0]['memprice']=ceil($salepriceinfo['saleprice']*0.7);
        $this->assign('goodsdetail1',$goodsdetail1);
        $type=D('Goods')->type($gid);
        $this->assign('type',$type);
        //展示商品的图片信息
        $zhugoodsimage=D('Goods')->zhuimg($gid);
        $this->assign('zhugoodsimage',$zhugoodsimage);
        $fugoodsimage=D('Goods')->fuimg($gid);
        $this->assign('fugoodsimage',$fugoodsimage);
        //显示商品的评论回复信息
        $this->assign('commresponlist1',$commresponlist1);
        $this->assign('empty1','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        $this->assign('commresponlist2',$commresponlist2);
        $this->assign('empty2','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        $this->assign('commresponlist3',$commresponlist3);
        $this->assign('empty3','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        $this->assign('commresponlist4',$commresponlist4);
        $this->assign('empty4','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        //显示商品的中，差，好评率
        $this->assign('totalcount',$totalcount1);
        $this->assign('greate',$greate);
        $this->assign('middle',$middle);
        $this->assign('bad',$bad);
        $this->assign('greatecount',$greatecount);
        $this->assign('middlecount',$middlecount);
        $this->assign('badcount',$badcount);
        //商品详情,包含规格主图一些信息
        $des=D('Goods')->guige($gid);
        $this->assign('ml',$des[0]);
        $this->assign('shape',$des[1]);
        $this->assign('pack',$des[2]);
        $this->assign('apply',$des[3]);
        //显示商品的名字
        $gname=$goods->where(array('id'=>$gid))->find();
        $goodsname=$gname['goodsname'];
        $this->assign('goodsname',$goodsname);
        //显示用户还喜欢的一些商品信息图片
        $likegoods=D('Goods')->userlike($gid);
        $this->assign('likegoods',$likegoods);
        //显示搜索框下面的分类信息
        $catelist=D('Goods')->catelist();
        $this->assign('catelist',$catelist);
        //显示品牌信息
        $brandInfo=D('Goods')->brand($gid);
        $this->assign('brandInfo',$brandInfo);
        //传组合购买的商品id
        $gidinfo=D('Goods')->combuy($gid);
        $this->assign('gidinfo',$gidinfo);
        $this->assign('gid',$gid);
        //展示该商品的路径
        $pathinfo=D('Goods')->goodspath($gid);
        $this->assign('pathinfo',$pathinfo);
        //展示输出分页
        $this->assign('page1',$page1);
        $this->assign('page2',$page2);
        $this->assign('page3',$page3);
        $this->assign('page4',$page4);
        if(IS_AJAX){
            switch (I('get.cid')){
                case 1:
                    $this->display('result1');
                    break;
                case 2:
                    $this->display('result2');
                    break;
                case 3:
                    $this->display('result3');
                    break;
                case 4:
                    $this->display('result4');
                    break;
            }
        }else{
            $this->display('goodsdetail');
        }

    }

    public function saleprice(){
        $ml=I('post.xinghao');
        $gid=I('post.gid');
        $where['ml']=substr($ml,0,-2);
        $where['gid']=$gid;
        $saleprice=M('Type')->field('saleprice')->where($where)->find();
        if($saleprice){
            $arr['memprice']=ceil($saleprice['saleprice']*0.7);
            $arr['saleprice']=$saleprice['saleprice'];
            $this->success($arr);
        }
    }

    //点击立即购买执行tobuy方法 到订单页面（Order_payment）
    public function tobuy(){
        //提交表单的时候得到商品的商品id和销售数量和型号
        $gid = I('post.gid');
        $salenum = I('post.salenum');
        $ml=I('post.xinghao');
        $typewhere['gid']=$gid;
        $typewhere['ml']=substr($ml,0,-2);
        $saleprice=M('Type')->where($typewhere)->find();
        $orderprice=$salenum*ceil($saleprice['saleprice']*0.7);
        if (session('mid')){
            $g = M('Goods');
            $where['id'] = $gid;
            //得到订单列表orderlist
            $orderlist=$g->field('goodsname,imageurl,discount,imagename')->where($where)->select();
            foreach($orderlist as $k=>$v){
                $orderlist[$k]['price']=$orderprice;
                $orderlist[$k]['buynum']=$salenum;
                $orderlist[$k]['saleprice']=ceil($saleprice['saleprice']*0.7);
                $orderlist[$k]['ml']=$ml;
            }
            $this->assign('orderlist',$orderlist);
            //将商品的id传过去，作为隐藏提交的时候提交上来
            $this->assign('gid',$gid);
            $order=A('Order');
            $order->showaddress();
            $order->hongbao();
            $this->display('Order/Order_payment');
        }

    }
}