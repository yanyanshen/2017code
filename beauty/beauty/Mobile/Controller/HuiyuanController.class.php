<?php
namespace Mobile\Controller;
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
        $mid=session('mid');
        if($mid){
            $uservip=M('User')->field('memberorder')->where(array('id'=>$mid))->find();
            $this->assign('uservip',$uservip['memberorder']);
        }
        $goods=D('Goods');
        $goodslist=$goods->goods($gid);
        $goodslist[0]['saleprice1']=ceil($goodslist[0]['saleprice']*0.7);
        $goods->foot($gid);
        $typelist=$goods->type($gid);
        $ruleslist=$goods->rules($gid);
        $zhuimg=$goods->zhuimg($gid);
        $fuimg=$goods->fuimg($gid);
        $orderinfo=$goods->orderrecord($gid);
        $this->assign('goodslist',$goodslist);
        $this->assign('typelist',$typelist);
        $this->assign('ruleslist',$ruleslist);
        $this->assign('zhuimg',$zhuimg);
        $this->assign('fuimg',$fuimg);
        //成交记录
        $this->assign('orderinfo',$orderinfo);
        //显示一条评价记录
        $commresponlist1=M('Goods')->field('c.content,c.cosid,c.coaddtime,c.response,c.id,u.username,u.imgpath,u.imgname,c.ml,c.readdtime,c.respid,cs.costatus,
  c.imageurl,c.imagename')
            ->table('beauty_comment c,beauty_user u,beauty_comment_status cs')
            ->where(array('c.gid'=>$gid))
            ->where('c.mid=u.id and c.cosid=cs.id')
            ->limit(0,1)
            ->order(array('c.coaddtime'=>'desc'))
            ->select();// 查询总评价
        $this->assign('commresponlist1',$commresponlist1);
        $this->assign('empty1','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        //第二天清空点赞表里面的次数
        if($mid){
            $time=time();
            $res=M('Count')->field('gcount,addtime,todaycount,stoptime')->where(array('gid'=>$gid,'mid'=>$mid))->find();
            if($res){
                if($time>$res['stoptime']){
                    $data['todaycount']=0;
                    M('Count')->where(array('gid'=>$gid,'mid'=>$mid))->save($data);
                }
            }
        }
        $totalcount1=M('Comment')->where(array('gid'=>$gid))->count();//总记录数
        $totalcount2=M('Comment')->where(array('gid'=>$gid,'cosid'=>1))->count();//好总记录数
        $totalcount3=M('Comment')->where(array('gid'=>$gid,'cosid'=>2))->count();//中记录数
        $totalcount4=M('Comment')->where(array('gid'=>$gid,'cosid'=>3))->count();//差记录数
        //输出全部，好，中，差的评论条目
        $this->assign('totalcount1',$totalcount1);
        $this->assign('totalcount2',$totalcount2);
        $this->assign('totalcount3',$totalcount3);
        $this->assign('totalcount4',$totalcount4);

        //展示商品的点赞次数
        $gcount=M('Count')->query("select sum(gcount) as goodscount from beauty_count where gid=$gid");
        $this->assign('gcount',$gcount[0]['goodscount']);
        $this->display('goods_detail');

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
    //点击立即购买执行的方法
    public function tobuy(){
        $mid=session('mid');
        $buynum=I('post.buynum');
        $ml=I('post.xinghao');
        $gid=I('post.gid');
        $price=I('post.price');
        //通过商品的id查找商品的一些信息
        $goods=M('Goods')->field('goodsname,imageurl,imagename')->where(array('id'=>$gid))->find();
        //将需要展示的商品信息组合到一个数组里里面
        $orderlist[0]['goodsname']=$goods['goodsname'];
        $orderlist[0]['imageurl']=$goods['imageurl'];
        $orderlist[0]['imagename']=$goods['imagename'];
        $orderlist[0]['buynum']=$buynum;
        $orderlist[0]['saleprice']=$price;
        $orderlist[0]['ml']=$ml;
        $orderprice=$buynum*$price;

        //将订单信息插入订单表
        $order['orderno']=$this->uniqueStr();
        $order['mid']=$mid;
        $order['price']=$price*$buynum;
        $order['create_time']=time();
        $oid=M('Order')->add($order);
        if($oid){
            $ordergoods['oid']=$oid;
            $ordergoods['gid']=$gid;
            $ordergoods['buynum']=$buynum;
            $ordergoods['ml']=$ml;
            $ordergoods['saleprice']=$price*$buynum;
            if(M('Order_goods')->add($ordergoods)){
                //展示红包列表
                $mycart=A('MyCart');
                $mycart->hongbao();
                $this->money();
                //获取地址id,如果存在就显示获取地址id的该地址，如果不存在就显示默认地址
                if(I('get.addid')){
                    $addid=I('get.addid');
                    $address=M('Addresses')->where(array('id'=>$addid))->order('addtime desc')->select();
                    $areastr=$address[0]['area'];
                    $areaarr=explode('-',$areastr);
                    $address[0]['province']=$areaarr[0];
                    $address[0]['country']=$areaarr[1];
                    $address[0]['city']=$areaarr[2];
                    $this->assign('address',$address);
                }else{
                    //展示地址
                    $address=A('Address');
                    $address->addresslist();
                }
                $goodsinfo=M('order_goods')->field('gid,ml,buynum,saleprice')->where(array('oid'=>$oid))->select();
                $g=M('Goods');
                foreach($goodsinfo as $k=>$goods){
                    $where['id'] = $goods['gid'];
                    //得到商品的一些信息
                    $goodsmsg = $g->field('goodsname,imageurl,discount,imagename,id')->where($where)->select();
                    foreach ($goodsmsg as $v) {
                        $orderlist[$k] = $v;
                        $orderlist[$k]['ml'] = $goods['ml'];
                        $orderlist[$k]['buynum'] = $goods['buynum'];
                        $orderlist[$k]['sumprice'] = $goods['saleprice'];
                        $orderlist[$k]['saleprice'] = $goods['saleprice']/$goods['buynum'];
                    }
                }
                $this->assign('oid',$oid);
                $this->assign('orderlist',$orderlist);
                $this->assign('orderprice',$orderprice);
                $this->display('submit_order');
            }
        }

    }
}