<?php
namespace Mobile\Controller;
use Think\Controller;
class MemberController extends Controller{
    public function index(){
        $user=M('User');
        $photoInfo=$user->where(array('username'=>session('mname')))->find();
        //$this->assign('$photo',$photo);
        //print_r($photoInfo);
        $this->assign('photoPath',$photoInfo['imgpath']);
        $this->assign('photoName',$photoInfo['imgname']);
        $this->collectCount();
        $this->historyCount();
        $this->orderCount();
        $this->sign();
        $this->packet();
        $this->display('member_index');
    }
    public function message(){
        $mid=session('mid');
        $messageList=M('Message_user')->table('beauty_message_user u,beauty_messagetext t')
            ->where(array('receiveId'=>$mid))->where('u.textId=t.id and u.status!=3')
            ->field('u.status,t.title,t.content,t.time,u.type')->order('u.id desc')->select();
        $this->assign('list',$messageList);
        $this->display('member_message');
    }
    public function collectCount(){
        $count=M('collect')->where(array('mid'=>session('mid')))->count();
        $score=M('user')->where(array('mid'=>session('mid')))->field('score')->find();
        $this->assign('score',$score['score']);
        $this->assign('count',$count);
    }


    public function historyCount(){
        $historyCount=M('footprint')->where(array('mid'=>session('mid')))->count();
        $this->assign('historyCount',$historyCount);
    }

    //订单个数;
    public function orderCount(){
        $orderDfk=M('Order')->where(array('mid'=>session('mid'),'status'=>1))->count();
        $orderDfh=M('Order')->where(array('mid'=>session('mid'),'status'=>2))->count();
        $orderDsh=M('Order')->where(array('mid'=>session('mid'),'status'=>3))->count();
        $orderDpj=M('Order')->where(array('mid'=>session('mid'),'status'=>4))->count();
        $this->assign('orderDfk',$orderDfk);
        $this->assign('orderDfh',$orderDfh);
        $this->assign('orderDsh',$orderDsh);
        $this->assign('orderDpj',$orderDpj);
    }

    //金币总数、积分以及账户余额;
    public function sign(){
        $signInfo=M('Sign')->where(array('mid'=>session('mid')))->find();
        $scoreInfo=M('User')->where(array('id'=>session('mid')))->find();
        $accountInfo=M('Account')->where(array('mid'=>session('mid')))->find();
        $vipInfo=M('User')->where(array('id'=>session('mid')))->find();
        $this->assign('sign',$signInfo['sign']?$signInfo['sign']:0);
        $this->assign('score',$scoreInfo['score']?$scoreInfo['score']:0);
        $this->assign('balance',$accountInfo['balance']?$accountInfo['balance']:0);
        $this->assign('memberorder',$vipInfo['memberorder']);
    }

    //红包个数;
    public function packet(){
        $data['mid']=session('mid');
        $data['status']=1;
        $data['packetag']=1;
        $packet=M('Packet')->where($data)->count();
        $this->assign('packet',$packet);
    }

    //全部订单;
    public function myOrder(){
        if(session('mid')){
            if(IS_GET){
                $keywords=I('get.key');
                $where['orderno']=array('like',"%$keywords%");
            }else{
                $where='';
            }
            $where['mid']=session('mid');
            $order=M('Order');
            //获得订单列表;
            $orderList=$order->table('beauty_order o,beauty_order_status s')
                ->where($where)->where('o.status=s.id')
                ->field('o.id,o.price,s.statusname,o.orderno,o.status,o.create_time')
                ->order('id desc')
                ->select();
            //获得订单中多个商品信息;
            foreach($orderList as $k=>$v){
                $orderList[$k]['goods']=M('Order_goods')->table('beauty_order_goods og,beauty_goods g')
                    ->where($where)->where(array('oid'=>$v['id']))->where('og.gid=g.id')
                    ->field('og.buynum,og.ml,g.saleprice,g.goodsname,g.imageurl,g.imagename')
                    ->select();
                //订单商品总数量;
                $orderList[$k]['buynum']=M('Order_goods')->where(array('oid'=>$v['id']))->sum('buynum');
            }
            $this->assign('orderList',$orderList);
            $this->assign('status',1);
            $this->display('member_order');
        }else{
            $this->display('Login/Login');
        }
    }

    //待付款订单;
    public function dfk(){
        if(IS_GET){
            $keywords=I('get.key');
            $where['orderno']=array('like',"%$keywords%");
        }else{
            $where='';
        }
        $where['mid']=session('mid');
        $order=M('Order');
        //获得订单列表;
        $orderList=$order->table('beauty_order o,beauty_order_status s')
            ->where($where)->where('o.status=s.id and o.status=1')
            ->field('o.id,o.price,s.statusname,o.orderno,o.status,o.create_time')
            ->order('id desc')
            ->select();
        //获得订单中多个商品信息;
        foreach($orderList as $k=>$v){
            $orderList[$k]['goods']=M('Order_goods')->table('beauty_order_goods og,beauty_goods g')
                ->where($where)->where(array('oid'=>$v['id']))->where('og.gid=g.id')
                ->field('og.buynum,og.ml,g.saleprice,g.goodsname,g.imageurl,g.imagename')
                ->select();
            //订单商品总数量;
            $orderList[$k]['buynum']=M('Order_goods')->where(array('oid'=>$v['id']))->sum('buynum');
        }
        $this->assign('orderList',$orderList);
        $this->assign('status',2);
        $this->display('member_order');
    }

    //待发货订单;
    public function dfh(){
        if(IS_GET){
            $keywords=I('get.key');
            $where['orderno']=array('like',"%$keywords%");
        }else{
            $where='';
        }
        $where['mid']=session('mid');
        $order=M('Order');
        //获得订单列表;
        $orderList=$order->table('beauty_order o,beauty_order_status s')
            ->where($where)->where('o.status=s.id and o.status=2')
            ->field('o.id,o.price,s.statusname,o.orderno,o.status,o.create_time')
            ->order('id desc')
            ->select();
        //获得订单中多个商品信息;
        foreach($orderList as $k=>$v){
            $orderList[$k]['goods']=M('Order_goods')->table('beauty_order_goods og,beauty_goods g')
                ->where($where)->where(array('oid'=>$v['id']))->where('og.gid=g.id')
                ->field('og.buynum,og.ml,g.saleprice,g.goodsname,g.imageurl,g.imagename')
                ->select();
            //订单商品总数量;
            $orderList[$k]['buynum']=M('Order_goods')->where(array('oid'=>$v['id']))->sum('buynum');
        }
        $this->assign('orderList',$orderList);
        $this->assign('status',3);
        $this->display('member_order');
    }

    //待收货订单;
    public function dsh(){
        if(IS_GET){
            $keywords=I('get.key');
            $where['orderno']=array('like',"%$keywords%");
        }else{
            $where='';
        }
        $where['mid']=session('mid');
        $order=M('Order');
        //获得订单列表;
        $orderList=$order->table('beauty_order o,beauty_order_status s')
            ->where($where)->where('o.status=s.id and o.status=3')
            ->field('o.id,o.price,s.statusname,o.orderno,o.status,o.create_time')
            ->order('id desc')
            ->select();
        //获得订单中多个商品信息;
        foreach($orderList as $k=>$v){
            $orderList[$k]['goods']=M('Order_goods')->table('beauty_order_goods og,beauty_goods g')
                ->where($where)->where(array('oid'=>$v['id']))->where('og.gid=g.id')
                ->field('og.buynum,og.ml,g.saleprice,g.goodsname,g.imageurl,g.imagename')
                ->select();
            //订单商品总数量;
            $orderList[$k]['buynum']=M('Order_goods')->where(array('oid'=>$v['id']))->sum('buynum');
        }
        $this->assign('orderList',$orderList);
        $this->assign('status',4);
        $this->display('member_order');
    }

    //待评价订单;
    public function dpj(){
        if(IS_GET){
            $keywords=I('get.key');
            $where['orderno']=array('like',"%$keywords%");
        }else{
            $where='';
        }
        $where['mid']=session('mid');
        $order=M('Order');
        //获得订单列表;
        $orderList=$order->table('beauty_order o,beauty_order_status s')
            ->where($where)->where('o.status=s.id and o.status=4')
            ->field('o.id,o.price,s.statusname,o.orderno,o.status,o.create_time')
            ->order('id desc')
            ->select();
        //获得订单中多个商品信息;
        foreach($orderList as $k=>$v){
            $orderList[$k]['goods']=M('Order_goods')->table('beauty_order_goods og,beauty_goods g')
                ->where($where)->where(array('oid'=>$v['id']))->where('og.gid=g.id')
                ->field('og.buynum,og.ml,g.saleprice,g.goodsname,g.imageurl,g.imagename')
                ->select();
            //订单商品总数量;
            $orderList[$k]['buynum']=M('Order_goods')->where(array('oid'=>$v['id']))->sum('buynum');
        }
        $this->assign('orderList',$orderList);
        $this->assign('status',5);
        $this->display('member_order');
    }

    //已评价订单;
    public function ypj(){
        if(IS_GET){
            $keywords=I('get.key');
            $where['orderno']=array('like',"%$keywords%");
        }else{
            $where='';
        }
        $where['c.mid']=session('mid');
        $comment=M('Comment');
        $orderList=$comment->table('beauty_comment c,beauty_goods g,beauty_order o,beauty_order_status s,beauty_order_goods og')
            ->where($where)->where('c.oid=o.id and c.gid=g.id and c.cstatus=s.id and og.gid=c.gid')
            ->field('c.coaddtime,c.ml,c.cstatus status,o.orderno,s.statusname,g.goodsname,g.saleprice,g.imageurl,g.imagename,og.buynum,o.id')
            ->order('c.id desc')
            ->select();

        /*$where['mid']=session('mid');
        $order=M('Order');
        //获得订单列表;
        $orderList=$order->table('beauty_order o,beauty_order_status s')
            ->where($where)->where('o.status=s.id and o.status=5')
            ->field('o.id,o.price,s.statusname,o.orderno,o.status,o.create_time')
            ->order('id desc')
            ->select();
        //获得订单中多个商品信息;
        foreach($orderList as $k=>$v){
            $orderList[$k]['goods']=M('Order_goods')->table('beauty_order_goods og,beauty_goods g')
                ->where($where)->where(array('oid'=>$v['id']))->where('og.gid=g.id')
                ->field('og.buynum,og.ml,g.saleprice,g.goodsname,g.imageurl,g.imagename')
                ->select();
            //订单商品总数量;
            $orderList[$k]['buynum']=M('Order_goods')->where(array('oid'=>$v['id']))->sum('buynum');
        }*/

        $this->assign('orderList',$orderList);
        $this->assign('status',6);
        $this->display('member_order');
    }

    //订单详情;
    public function detail(){
        $oid=I('get.oid');
        $mid=session('mid');
        //$order=M('Order')->where(array('id'=>$oid))->select();
        $addresses=M('Addresses')->where(array('mid'=>$mid))->select();
        $order=M('Order');
        //获得订单列表;
        $orderList=$order->table('beauty_order o,beauty_order_status s')
            ->where(array('o.id'=>$oid))
            ->where('o.status=s.id')
            ->field('o.id,o.price,s.statusname,o.orderno,o.create_time,o.inform,o.status')
            ->order('id desc')
            ->select();
        //获得订单中多个商品信息;
        foreach($orderList as $k=>$v){
            $orderList[$k]['goods']=M('Order_goods')->table('beauty_order_goods og,beauty_goods g')
                //->where(array('og.mid'=>$mid))
                ->where(array('oid'=>$v['id']))->where('og.gid=g.id')
                ->field('og.buynum,og.ml,g.saleprice,g.goodsname,g.imageurl,g.imagename')
                ->select();
        }
        $this->assign('addresses',$addresses);
        $this->assign('orderList',$orderList);
        $this->display('member_order_detail');
    }

    //取消订单;
    public function cancelOrder(){
        if(IS_AJAX){
            $oid=I('post.order_id');
            $reasonid=I('post.reasonid');
            $order=M('Order');
            if($reasonid>0){
                if($order->where(array('id'=>$oid))->find()){
                    $order->where(array('id'=>$oid))->delete();
                    $this->success('删除订单成功');
                }else{
                    $this->error('没有查到数据');
                }
            }else{
                $this->error('请重新选择');
            }
        }
    }

    //确认收货;
    public function receipt(){
        if(IS_AJAX){
            $oid=I('post.oid');
            $order=M('Order');
            $orderInfo=$order->where(array('id'=>$oid))->find();
            if($orderInfo){
                $info['status']=4;
                if($order->where(array('id'=>$oid))->save($info)){
                    $this->success('确认收货成功');
                }else{
                    $this->error('操作失败');
                }
            }else{
                $this->error('没有查到数据');
            }
        }
    }

    //账户管理;
    public function accout(){
        $this->display('member_accout');
    }

    //修改密码;
    public function chgPwd(){
        if(IS_AJAX){
            $mid = session('mid');
            $oldpassword = trim(I('post.oldpassword'));
            $newpassword = trim(I('post.newpassword'));
            if($oldpassword && $newpassword) {
                $user = M('User');
                $userInfo=$user->where(array('id'=>$mid,'password'=>md5($oldpassword)))->find();
                if($userInfo){
                    $data['password']=md5($newpassword);
                    if($user->where(array('id'=>$mid))->save($data)){
                        $this->success('修改密码成功');
                    }else{
                        $this->error('修改密码失败');
                    }
                }else{
                    $this->error('密码错误');
                }
            }else{
                $this->error('密码不能为空！');
            }
        }else{
            $this->display('member_pwd');
        }
    }

}