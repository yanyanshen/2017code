<?php
namespace Mobile\Controller;
use Think\Controller;
class OrderController extends Controller{
    public function uniqueStr()
    {
        return substr(md5(uniqid(microtime(true))), 0, 15);
    }


    public function money(){
        $pid=I('post.money');
        $money=M('Packet')->where(array('id'=>$pid))->find();
        if($money){
            $this->success($money['money']);
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

    //用户名的远程校验
    public function layer(){
        $username=trim(I('post.username'));
        $user=M('User');
        $where['username']=$username;
        $result=$user->where($where)->select();
        if($result){
            echo 'true';
        }else {
            echo 'false';
        }
    }


    //登录弹框
    function layerLogin(){
        $username=trim(I('post.username'));
        $password=trim(I('post.password'));
        $where['username']=$username;
        $where['password']=md5($password);
        $user=M('User');
        $result=$user->field('id')->where($where)->find();
        $mid=$result['id'];
        if($result){
            session('mname',"$username");
            session('mid',$mid);
            $this->success('登录成功');
        }
        else {
            $this->error('登录失败');
        }
    }

    //设置如结算时候没有登录时候的url地址
    public function carturl(){
        session('carturl',U('Mobile/MyCart/mycart'));
        $this->success(session('carturl'));
    }

}