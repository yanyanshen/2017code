<?php
namespace Mobile\Controller;
use Think\Controller;
class MyCartController extends Controller{
    //将商品添加到购物车
    public function addcart(){
        $mid=session('mid');
        $ml=I('post.xinghao');
        $gid=I('post.gid');
        $buynum=I('post.buynum');
        $addtime=time();
        $price=I('post.price');
        $totalprice=$buynum*$price;
        if($mid){
            $cartwhere['gid']=$gid;
            $cartwhere['ml']=$ml;
            $cartwhere['mid']=$mid;
            $res=M('Cart')->where($cartwhere)->find();
            if($res){
                $buynum= $res['buynum']+$buynum;
                $sumprice=$res['sumprice']+$totalprice;
                $cartsave['buynum']=$buynum;
                $cartsave['sumprice']=$sumprice;
                if(M('Cart')->where($cartwhere)->save($cartsave)){
                    $this->success();
                }
            }else{
                $cartdata['buynum']=$buynum;
                $cartdata['mid']=$mid;
                $cartdata['gid']=$gid;
                $cartdata['ml']=$ml;
                $cartdata['addtime']=time();
                $cartdata['sumprice']=$totalprice;
                $lastid=M('Cart')->add($cartdata);
                if($lastid){
                    $this->success();
                }
            }

        }else{
            $gidml = $gid.$ml;
            if(session("mycart2.$gidml")){
                $buynum = session("mycart2.$gidml")['buynum']+ $buynum;
                $sumprice = session("mycart2.$gidml")['sumprice'] + $totalprice;
                session("mycart2.$gidml", array('buynum' => $buynum, 'addtime' => $addtime, 'sumprice' => $sumprice, 'gid' => $gid, 'ml' => $ml));
            }else{
                $cart2['buynum']=$buynum;
                $cart2['sumprice']=$totalprice;
                $cart2['addtime']=$addtime;
                $cart2['gid']=$gid;
                $cart2['ml']=$ml;
                session("mycart2.$gidml",$cart2);
            }
            $this->success(session('mycart2'));
        }
    }


    public function mycart(){
        $mid=session('mid');
        if($mid){
            $cartwhere['c.mid'] = $mid;
            $cartlist = M('Cart')->field("g.id gid,g.imageurl,g.imagename,g.goodsname,g.score,c.buynum,c.ml,c.id,c.sumprice,g.bid,g.marketprice")
                ->table('beauty_cart c,beauty_goods g')->where('c.gid=g.id')->where($cartwhere)->order('c.addtime desc')->select();
            foreach($cartlist as $k=>$v){
                $cartlist[$k]['saleprice']=ceil($cartlist[$k]['sumprice']/$cartlist[$k]['buynum']);
            }
        }else{
            //在用户没有登录的时候直接从session里面拿数据
            session('mycart2');
            $cartlist2=session('mycart2');
            foreach (array_reverse($cartlist2) as $k => $v) {
                $where['id'] = $v['gid'];
                $goods = M('Goods')->field('imageurl,imagename,id gid,goodsname,marketprice,score')->where($where)->find();
                //array_merge多个数组进行合并有相同的键名的时候则会进行覆盖
                $cartlist[$k] = array_merge($v, $goods);
                $cartlist[$k]['saleprice']=ceil($v['sumprice']/$v['buynum']);
                $cartlist[$k]['id'] = $v['gid'] . $v['ml'];
            }
        }
        $this->assign('cartlist',$cartlist);
        $this->assign('empty','<h1>购物车内还没有商品，赶紧选购吧</h1>');
        $this->display('cart');
    }
    public function uniqueStr()
    {
        return substr(md5(uniqid(microtime(true))), 0, 15);
    }


    //去结算购物车中的页面，去结算执行的方法，并返回一个oid;
    public function toaccount(){
        $mid=session('mid');
        $gidinfo=I('post.gid');
        $mlInfo=I('post.ml');
        $buynumInfo=I('post.buynum');
        $sumpriceInfo=I('post.numprice');
        $orderprice=I('post.orderprice');
            foreach($gidinfo as $k=>$gid){
                $where['id'] = $gid;
                //得到商品的一些信息
                $goods = M('Goods')->field('goodsname,imageurl,discount,imagename,id')->where($where)->select();
                foreach ($goods as $v) {
                    $orderlist[$k] = $v;
                    $orderlist[$k]['ml'] = $mlInfo[$k];
                    $orderlist[$k]['buynum'] = $buynumInfo[$k];
                    $orderlist[$k]['sumprice'] = $sumpriceInfo[$k];
                    $orderlist[$k]['saleprice'] = $sumpriceInfo[$k]/$buynumInfo[$k];
                }
                //将结算商品的信息写入订单表
                $order['orderno'] = $this->uniqueStr();
                $order['mid'] = $mid;
                $order['price'] = $orderprice;
                $order['create_time'] = time();
                //写入订单表
                $oid=M('Order')->add($order);
            }
           if ($oid) {
               foreach ($orderlist as $k => $v1) {
                   $ordergoods[$k]['gid'] = $v1['id'];
                   $ordergoods[$k]['buynum'] = $v1['buynum'];
                   $ordergoods[$k]['ml'] = substr($v1['ml'],0,-2);
                   $ordergoods[$k]['oid'] = $oid;
                   $ordergoods[$k]['saleprice'] = $v1['saleprice']*$v1['buynum'];
               }
               //写入订单商品表
               foreach ($ordergoods as $v2){
                   M('Goods')->table('beauty_order_goods')->field('gid,buynum,ml,oid,saleprice')->add($v2);
               }
               $this->success($oid);
           }
    }
    //到订单页面，将购买的商品遍历到订单页面
    public function orderlist(){
         $oid=I('get.oid');
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
        //根据oid查询该订单的商品总和
        $orderprice=M('Order')->where(array('id'=>$oid))->find();
        $this->assign('orderprice',$orderprice['price']);
        $this->assign('oid',$oid);
        $this->assign('orderlist',$orderlist);
        //展示用户的红包信息
        $this->hongbao();
        $this->money();
        $this->display('submit_order');
    }


    public function hongbao(){
        $mid=session('mid');
        $hlist=M('Packet')->where(array('mid'=>$mid,'status'=>1))->select();
        $this->assign('hlist',$hlist);
    }

    public function money(){
        $pid=I('post.money');
        $money=M('Packet')->where(array('id'=>$pid))->find();
        if($money){
            $this->success($money['money']);
        }
    }


    public function tosubmit(){
        $oid = I('post.oid');
        $mid = session('mid');
        //获取红包id
        $pid=I('post.hid');
        $totalprice = I('post.totalprice');//实付款的价格
        $address = I('post.address');
        $inform = I('post.inform');
        $packet=I('post.hongbao');
        $orderwhere['id'] = $oid;
        $orderwhere['mid'] = $mid;
        $data['address'] = $address;
        $data['inform'] = $inform;
        $data['price'] = $totalprice;
        $data['packet']=$packet;
        $orderno1 = M('Order')->field('orderno')->where(array('id' => $oid))->find();
        $orderno = $orderno1['orderno'];
        //更新订单表里面的地址和留言
        M('Order')->where($orderwhere)->save($data);
            //更新红包的使用状态
            $data['status']=2;
            M('Packet')->where(array('id'=>$pid))->save($data);

            $address1= M('Addresses')->where(array('id'=>$address))->select();
            $areastr = $address1[0]['area'];
            $areaarr = explode('-', $areastr);
            $address1[0]['province'] = $areaarr[0];
            $address1[0]['country'] = $areaarr[1];
            $address1[0]['city'] = $areaarr[2];
            $this->assign('address1',$address1);
            $this->assign('orderno', $orderno);
            $this->assign('totalprice', $totalprice);
            $this->assign('oid', $oid);
            $this->display('cart_success');
    }

    public function topay(){
        $order = M('Order');
        if (IS_POST) {
            $oid = I('post.oid');
            $paypwd = I('post.paypwd');
            $mid = session('mid');
            $trueprice = I('post.trueprice');
            $zffs = I('post.zffs');
        }
        $userwhere['mid'] = $mid;
        $userwhere['paypwd'] = md5($paypwd);
        $res = M('User')->field('paypwd')->where($userwhere)->find();
        if ($res&&$zffs==1){
            //查看订单的消费金额
            $orderInfo = $order->where(array('id' => $oid))->find();
            $price = $orderInfo['price'];
            //查看账户余额
            $acountInfo = M('Account')->where(array('mid' => $mid))->find();
            //查看那是否有消费记录
            $tradeInfo = M('Account_trade')->where(array('mid' => $mid))->order('id desc')->find();
            if ($acountInfo && $acountInfo['balance'] > $price) {
                if ($acountInfo['status'] == 1) {
                    //开启事务;
                    $order->startTrans();
                    //判断是否有消费记录
                    if ($tradeInfo) {
                        //有过消费记录,账户主表更新,消费表插入以及更新;
                        $data['trademoney'] = $price;
                        $data['tradetime'] = time();
                        $data['tradesum'] = $tradeInfo['tradesum'] + $orderInfo['price'];
                        $data['mid'] = $mid;
                        $info['balance'] = $acountInfo['balance'] - $orderInfo['price'];
                        $info['time'] = time();
                        //订单支付成功，根据订单号更新订单的状态
                        $data['status'] = 2;
                        $data['price'] = $trueprice;
                        $where['id'] = $oid;
                        //事务同时操作;
                        if (!$order->where($where)->field('status')->save($data)) {
                            $order->rollback();
                        }
                        if (!M('Account_trade')->add($data)) {
                            $order->rollback();
                        }
                        if (!M('Account')->where(array('mid' => $mid))->save($info)) {
                            $order->rollback();
                        }
                        //更新商品表中的库存量和销售量;
                        $Info=$order->table('beauty_order_goods')->field('gid,buynum,ml')->where(array('oid'=>$oid))->select();
                        foreach ($Info as $v1) {
                            $goodsInfo=M('Goods')->field('num,salenum')->where(array('id'=>$v1['gid']))->find();
                            $goods['salenum'] = $v1['buynum']+$goodsInfo['salenum'];
                            $goods['num'] =  $goodsInfo['num']-$v1['buynum'];
                            if (!M('Goods')->where(array('id' => $v1['gid']))->save($goods)) {
                                $order->rollback();
                            }
                            //付款成功之后删除选中结算的购物车中的商品
                            $cartwhere['gid'] = $v1['gid'];
                            $cartwhere['ml'] = $v1['ml'];
                            $cartwhere['mid'] = $mid;
                            $cartbuynum = M('Cart')->where($cartwhere)->find();
                            $price = M('Cart')->field('sumprice')->where($cartwhere)->find();
                            if ($v1['buynum'] < $cartbuynum['buynum']) {
                                //更新数量和价格
                                $cartwhere1['gid'] = $v1['gid'];
                                $cartwhere1['ml'] = $v1['ml'];
                                $salepriceinfo=M('Type')->where($cartwhere1)->field('saleprice')->find();
                                $totalprice =$salepriceinfo['saleprice']*$v1['buynum'];
                                $sumprice = $price['sumprice']-$totalprice;
                                $cartdata['sumprice']=$sumprice;
                                $cartdata['buynum']=$cartbuynum['buynum']-$v1['buynum'];
                                M('Cart')->where($cartwhere)->save($cartdata);
                            } else {
                                M('Cart')->where($cartwhere)->delete();
                            }

                        }
                        //事务提交;
                        if ($order->commit()) {
                            $this->success('订单支付成功');
                        } else {
                            $this->error(1);
                        }
                    } else {
                        //没有消费记录,账户主表更新,消费表插入;
                        $data['trademoney'] = $orderInfo['price'];
                        $data['tradetime'] = time();
                        $data['tradesum'] = $orderInfo['price'];
                        $data['mid'] = $mid;
                        //更新余额表的数据
                        $info['balance'] = $acountInfo['balance'] - $orderInfo['price'];
                        $info['time'] = time();
                        //订单支付成功，根据订单号更新订单的状态
                        $data['status'] = 2;
                        $data['price'] = $trueprice;
                        $where['id'] = $oid;
                        //事务同时操作;
                        if (!$order->where($where)->field('status')->save($data)) {
                            $order->rollback();
                        }
                        if (!M('Account_trade')->add($data)) {
                            $order->rollback();
                        }
                        if (!M('Account')->where(array('mid' => $mid))->save($info)) {
                            $order->rollback();
                        }
                        //更新商品表中的库存量和销售量;
                        $Info = $order->table('beauty_order_goods')->field('gid,buynum')->where(array('oid' => $oid))->select();
                        foreach ($Info as $v1) {
                            $goods['salenum'] = $v1['buynum'];
                            $goodsInfo=M('Goods')->field('num')->where(array('id'=>$v1['gid']))->find();
                            $goods['num'] = $goodsInfo['num']-$v1['buynum'];
                            if (!M('Goods')->where(array('id' => $v1['gid']))->field('salenum,num')->save($goods)) {
                                $order->rollback();
                            }
                        }
                        //事务提交;
                        if ($order->commit()) {
                            $this->success('订单支付成功');
                        } else {
                            $this->error(1);
                        }
                    }
                } else {
                    $this->error(2);
                }
            } else {
                $this->error(3);
            }
        } else {
            if($res&&$zffs!=1){
                //订单支付成功，根据订单号更新订单的状态
                $order=M('Order');
                $data['status']=2;
                $data['price']=$trueprice;
                $where['id']=$oid;
                if($order->where($where)->field('status,price')->save($data)){
                    $Info=$order->table('beauty_order_goods')->field('gid,buynum')->where(array('oid'=>$oid))->select();
                    //更新销售量和库存量
                    foreach($Info as $v){
                        M('Goods')->where(array('id'=>$v['gid']))->setInc('salenum',$v['buynum']);
                        M('Goods')->where(array('id'=>$v['gid']))->setDec('num',$v['buynum']);
                    }
                    $this->success($trueprice);
                }
            }else{
                $this->error(4);
            }
        }
    }


    //从购物车里面删除商品的信息
    public function tocartdelete()
    {   $mid = session('mid');
        $id = I('post.cid');
        if ($mid) {
            if (M('Cart')->where(array('id' => $id))->delete()) {
                $this->success('删除成功');
            } else {
                $this->error();
            }
        } else {
            session("mycart1.$id", null);
            $this->success('删除成功');
        }
    }

    //删除购物车中全部的商品
    public function alldelete(){
        $mid = session('mid');
        if ($mid) {
            if (M('Cart')->where(array('mid' => $mid))->delete()) {
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        } else {
            session("mycart1", null);
            $this->success('删除成功');
        }
    }
}