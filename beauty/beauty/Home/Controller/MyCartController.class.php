<?php
namespace Home\Controller;
use Think\Controller;
header('Content-type:text/html;charset=utf-8');
class MyCartController extends Controller
{

    public function uniqueStr()
    {
        return substr(md5(uniqid(microtime(true))), 0, 15);
    }

    //将添加购物车的商品添加到购物车表里
    public function mycart()
    {
        $gid = I('get.gid');
        $salenum = I('get.salenum');
        if (I('get.xinghao')) {
            $ml1 = I('get.xinghao');
            $ml = substr($ml1, 0, -2);
        } else {
            $this->error('请选择商品的属性');
        }
        $addtime = time();
        $cart = M('Cart');
        $goods = M('Goods');
        //用户存在的时候添加到数据表里面
        if (session('mid')) {
            $mid = session('mid');
            if (IS_AJAX) {
                $where1['gid'] = $gid;
                $where1['mid'] = $mid;
                $where1['ml'] = $ml;
                //判断一下购物车中是否存在该商品，存在的话只更新该商品的数量和价格
                if ($cart->where($where1)->find()){
                    //得到该商品的数量
                    $num = $cart->field('buynum')->where($where1)->find();
                    $buynum['buynum'] = $num['buynum'] + $salenum;
                    //得到添加购物车中相同商品的价格
                    $price1 = $goods->table('beauty_type')->field('saleprice')->where(array('gid'=>$gid,'ml'=>$ml))->find();
                    $saleprice = $price1['saleprice'];
                    $sumprice = $salenum * $saleprice;
                    //得到该商品的价格
                    $price2 = $cart->field('sumprice')->where($where1)->find();
                    $buynum['sumprice'] = $sumprice + $price2['sumprice'];
                    if ($cart->where($where1)->save($buynum)){
                        $this->success('添加成功');
                    } else {
                        $this->error('添加失败');
                    }
                } else {
                    //得到加入购物车的商品的总价格
                    $where2['gid'] = $gid;
                    $where2['ml'] = $ml;
                    $result = $goods->table('beauty_type')->field('saleprice')->where($where2)->find();
                    $price = $result['saleprice'];
                    $sumprice = $salenum * $price;
                    //将需要插入的数据写到一个数组里面
                    $data['sumprice'] = $sumprice;
                    $data['gid'] = $gid;
                    $data['buynum'] = $salenum;
                    $data['addtime'] = $addtime;
                    $data['mid'] = $mid;
                    $data['ml'] = $ml;
                    $lastInsertId = $cart->add($data);
                    if ($lastInsertId) {
                        $this->success('添加成功');
                    } else {
                        $this->error('添加失败');
                    }
                }
            }
        } //当用户不存在的时候直接将需要加入购物车的商品信息保存到session里面
        else {
            $where3['gid'] = I('get.gid');
            $where3['ml'] =$ml;
            $result1 = $goods->table('beauty_type')->field('saleprice')->where($where3)->find();
            $price = $result1['saleprice'];
            $sumprice = $salenum * $price;
            $gidml = $gid . $ml;
            //判断session里面是否含有该商品，有的话只需要更新该商品的价格总和，购买数量，和时间
            if (session("mycart1.$gidml")) {
                $buynum = session("mycart1.$gidml")['buynum'] + $salenum;
                $sumprice = session("mycart1.$gidml")['sumprice'] + $sumprice;
                session("mycart1.$gidml", array('buynum' => $buynum, 'addtime' => $addtime, 'sumprice' => $sumprice, 'gid' => $gid, 'ml' => $ml));
            } else {
                //当session里面不存在新加入的商品的时候，需要向session里面保存一条新的信息
                $cart1['buynum'] = $salenum;
                $cart1['gid'] = $gid;
                $cart1['ml'] = $ml;
                $cart1['addtime'] = $addtime;
                $cart1['sumprice'] = $sumprice;
                session("mycart1.$gidml", $cart1);
            }
            $this->success('添加成功');
        }
    }


    //得到右侧栏购物车的信息列表
    public function getcartlist()
    {
        //用户登录时候
        if (session('mid')) {
            $mid = session('mid');
            $cart1 = M('Cart');
            $cartwhere['c.mid'] = $mid;
            $cartlist = $cart1->field('g.imageurl,g.imagename,g.saleprice,g.goodsname,c.buynum,c.sumprice,c.id,g.id gid,c.ml')
                ->table('beauty_goods g,beauty_cart c')->where('g.id=c.gid')->where($cartwhere)->order('c.addtime desc')->limit(0,6)->select();
        } //用户未登录的时候
        else {
            if (session('mycart1')) {
                foreach (array_reverse(session('mycart1')) as $k => $v) {
                    //通过加入购物车成功的页面传的gid的值在商品表里面得到商品的信息
                    $goodsInfo = M('Goods')->field('imageurl,imagename,saleprice,goodsname,id gid')->where(array('id' => $v['gid']))->limit(0,6)->select();
                    foreach ($goodsInfo as $value) {
                        $cartlist[$k] = $value;
                    }
                    //将session中的购买数量也写进goods数组
                    $cartlist[$k]['buynum'] = $v['buynum'];
                    $cartlist[$k]['id'] = $v['gid'] . $v['ml'];
                    $cartlist[$k]['ml'] = $v['ml'];
                    $cartlist[$k]['sumprice'] = $v['sumprice'];
                }
            } else {
                session('mycart1', null);
                $cartlist = array();
            }
        }
        $this->success($cartlist);
    }

    //删除右侧列表里面的购物车信息条目
    public function deletecart()
    {
        //当商品的型号不同的时候属于两种不同的商品，所以在用户登录时需要通过cart里面的id进行删除
        $cid = I('post.cid');
        //当用户登录的时候直接删除购物车中的商品
        if (session('mid')) {
            M('Cart')->where(array('id' => $cid))->delete();
            $this->success(1);
        } //用户没有登录的时候直接将session里面的该商品设置为空即可，在用户没有登录的时候$cid就相当于是$gid.$ml
        else {
            session("mycart1.$cid", null);
            $this->success(1);
        }

    }

    //显示地址弹框的方法
    public function layeraddress()
    {
        $this->display('addresslayer');
    }

    //到购物车的方法
    public function tocart()
    {
        if (session('mid')) {
            $cart = M('Cart');
            //用户登录的时候直接从购物车数据表中直接拿
            $mid = session('mid');
            $cartwhere['c.mid'] = $mid;
            $cartlist = $cart->field('g.id gid,g.imageurl,g.imagename,g.goodsname,g.saleprice,g.score,c.buynum,c.ml,c.id,c.sumprice,g.bid')
                ->table('beauty_cart c,beauty_goods g')->where('c.gid=g.id')->where($cartwhere)->select();
            foreach ($cartlist as $k => $value) {
                $bid = $value['bid'];
                $where['bid'] = $bid;
                $cartlist[$k]['saleprice']=$cartlist[$k]['sumprice']/$cartlist[$k]['buynum'];
                $a = M('activity')->field('rules,aname')->where($where)->find();
                if ($a) {
                    if ($a['aname'] == '限时团购') {
                        $cartlist[$k][]['rules'] = $a['rules'];
                        preg_match_all('/\d+\d/', $a['rules'], $cartlist[$k]['rules']);
                        $cartlist[$k]['saleprice'] = $value['saleprice'] - $cartlist[$k]['rules'][0][0];
                        $cartlist[$k]['sumprice'] = $value['sumprice'] - $cartlist[$k]['rules'][0][0];
                    } else {
                        $cartlist[$k][]['rules'] = $a['rules'];
                        preg_match_all('/\d+\d/', $a['rules'], $cartlist[$k]['rules']);
                        if($value['sumprice']>$cartlist[$k]['rules'][0][0]){
                            $cartlist[$k]['saleprice'] = $value['saleprice']-$cartlist[$k]['rules'][0][1];
                            $cartlist[$k]['sumprice'] = $value['saleprice']-$cartlist[$k]['rules'][0][1];
                        }
                    }
                }
            }
        } else {
            //在用户没有登录的时候直接从session里面拿数据
            session('mycart1');
            $cartlist1 = session('mycart1');
            $cartlist = array();
            foreach ($cartlist1 as $k => $v) {
                $where['id'] = $v['gid'];
                $goods = M('Goods')->field('imageurl,imagename,id gid,goodsname,score,bid')->where($where)->find();
                //array_merge多个数组进行合并有相同的键名的时候则会进行覆盖
                $cartlist[$k] = array_merge($v, $goods);
                $cartlist[$k]['saleprice']=$cartlist[$k]['sumprice']/$v['buynum'];
                $cartlist[$k]['id'] = $v['gid'] . $v['ml'];
            }

            foreach ($cartlist as $k => $value) {
                $bid = $value['bid'];
                $where1['bid'] = $bid;
                $a = M('activity')->field('rules,aname')->where($where1)->find();
                if ($a) {
                    if ($a['aname'] == '限时团购') {
                        $cartlist[$k][]['rules'] = $a['rules'];
                        preg_match_all('/\d+\d/', $a['rules'], $cartlist[$k]['rules']);
                        $cartlist[$k]['saleprice'] = $value['saleprice'] - $cartlist[$k]['rules'][0][0];
                        $cartlist[$k]['sumprice'] = $value['sumprice'] - $cartlist[$k]['rules'][0][0];
                    } else {
                        $cartlist[$k][]['rules'] = $a['rules'];
                        preg_match_all('/\d+\d/', $a['rules'], $cartlist[$k]['rules']);
                        if($value['sumprice']>$cartlist[$k]['rules'][0][0]){
                            $cartlist[$k]['saleprice'] = $value['saleprice']-$cartlist[$k]['rules'][0][1];
                            $cartlist[$k]['sumprice'] = $value['saleprice']-$cartlist[$k]['rules'][0][1];
                        }
                    }
                }
            }
        }
        //根据足迹可看到订单查看到的商品
        $goodsinfo = M('Footprint')->order('addtime desc')->limit(0, 8)->select();
        $this->assign('goodsinfo', $goodsinfo);
        $this->assign('cartlist', $cartlist);
        $this->assign('empty', '<h1>购物车中还没有商品，赶紧选购吧！</h1>');
        $this->display('Cart');
    }


    //通过购物车去结算的方法
    public function cartbuy()
    {
        if (IS_POST) {
            $mid = session('mid');
            if ($mid) {
                $gidInfo = I('post.goods');
                $mlInfo = I('post.ml');
                $buynumInfo = I('post.buynum');
                $sumpriceInfo = I('post.sumprice');
                $g = M('Goods');
                foreach ($gidInfo as $k => $gid) {
                    $where['id'] = $gid;
                    //得到商品的一些信息
                    $goods = $g->field('goodsname,imageurl,discount,imagename,id')->where($where)->select();
                    foreach ($goods as $v) {
                        $orderlist[$k] = $v;
                        $orderlist[$k]['ml'] = substr($mlInfo[$k],0,-2);
                        $orderlist[$k]['buynum'] = $buynumInfo[$k];
                        $orderlist[$k]['sumprice'] = $sumpriceInfo[$k];
                        $orderlist[$k]['saleprice'] = $sumpriceInfo[$k]/$buynumInfo[$k];
                        $orderlist[$k]['gid']=$gidInfo[$k];
                    }
                }
                $this->assign('orderlist', $orderlist);
                $address = A('Order');
                $address->showaddress();
                $address->hongbao();
                $this->display('MyCart/Order_payment');
            } else {
                session('URL', U('Home/MyCart/tocart'));
                $this->redirect('Home/Login/Login');
            }
        }
    }

    public function tosubmit()
    {
        //获取红包id
        $hid=I('post.hid');
        //通过红包id找到使用红包的金额
        $money=M('Packet')->where(array('id'=>$hid))->find();
        /*$oid = I('post.oid');*/
        $mid = session('mid');
        $trueprice = I('post.trueprice');//实付款的价格
        $gidinfo=I('post.gidinfo');
        $mlinfo=I('post.ml');
        $buynuminfo=I('post.buynum');
        $address = I('post.address');
        if($address){
            $order['address'] = $address;
        }else{
            $address=M('Addresses')->where(array('mid'=>$mid,'isdefault'=>1))->find();
            $order['address'] = $address['id'];
        }
        $inform = I('post.inform');
        $order['inform'] = $inform;
        $order['packet']=$money['money'];
        $order['orderno'] = $this->uniqueStr();
        $order['mid'] = $mid;
        $order['price'] = $trueprice;
        $order['create_time'] = time();
        $oid = M('Order')->add($order);
        if ($oid) {
            foreach($mlinfo as $k=>$ml){
                $ordergoods[$k]['gid'] = $gidinfo[$k];
                $ordergoods[$k]['buynum'] = $buynuminfo[$k];
                $ordergoods[$k]['ml'] = substr($mlinfo[$k],0,-2);
                $ordergoods[$k]['oid'] = $oid;
                $typewhere['ml']=substr($mlinfo[$k],0,-2);
                $typewhere['gid']=$gidinfo[$k];
                $saleprice=M('Type')->field('saleprice')->where($typewhere)->find();
                $ordergoods[$k]['saleprice'] = $saleprice['saleprice']*$buynuminfo[$k];
            }
         //写入订单商品表，同时将结算之后的商品进行删除
            foreach ($ordergoods as $v2) {
                M('order_goods')->add($v2);
            }
            $orderno1 = M('Order')->field('orderno')->where(array('id' => $oid))->find();
            $orderno = $orderno1['orderno'];
            //更新红包的状态
            $data['status']=2;
            M('Packet')->where(array('id'=>$hid))->save($data);
            $this->assign('orderno', $orderno);
            $this->assign('trueprice', $trueprice);
            $this->assign('oid', $oid);
            $this->display('Order/showcart');
       }
    }


    //删除地址
    public function deleteAddress()
    {
        $id = I('post.id');
        if (M('addresses')->where(array('id' => $id))->delete()) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

//显示需要编辑的地址信息
    public function showAddresslist()
    {
        $id = I('get.aid');
        $addressInfo = M('addresses')->where(array('id' => $id))->select();
        $this->assign('addressInfo', $addressInfo);
        $this->assign('addressid', $id);
        $this->display("editorLayer");
    }

    //编辑地址
    public function editorAddress()
    {
        if (IS_POST) {
            $id = I('post.addressid');
            $address = M('Addresses');
            if(I('post.area')){
                $data['area']=I('post.area');
            }else{
                $data['area']=I('post.province').I('post.city').I('post.county');
            }
            $data['username'] = I('post.username');
            $data['mobile'] = I('post.mobile');
            $data['address'] = I('post.address');
            $data['email'] = I('post.email');
            $data['telephone'] = I('post.telephone');
            $data['ecode'] = I('post.ecode');
            if ($address->where(array('id' => $id))->save($data)) {
                $this->success('编辑成功');
            } else {
                $this->error('编辑失败');
            }
        }
    }


    //从购物车里面删除商品的信息
    public function tocartdelete()
    {
        $mid = session('mid');
        $id = I('post.cid');
        if ($mid) {
            if (M('Cart')->where(array('id' => $id))->delete()) {
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        } else {
            session("mycart1.$id", null);
            $this->success('删除成功');
        }
    }

//设置默认地址
    public function setdefault()
    {
        $id = I('post.id');
        $mid = session('mid');
        //设置默认地址，并将该用户其他的isdefault属性设置为0
        $where1['mid']=$mid;
        $where1['id']=$id;
        $data1['isdefault']=1;
        //更新除了设置该地址的其他的地址的isdefault值
        $where2['mid']=$mid;
        $where2['id']=array('notin', $id);
        $data2['isdefault'] = 0;
        if (M('addresses')->where($where1)->save($data1) && M('addresses')->where($where2)->save($data2)) {
            $this->success('设置成功');
        } else {
            $this->error('请稍后再进行设置');
        }
    }

    public function combuy()
    {
        $gidinfo = I('get.gidinfo');
        $totalprice = I('get.totalprice');
        $combuynum=I('get.combuynum');
        $goodswhere['id'] = array('in',$gidinfo);
        $typewhere['gid'] = array('in',$gidinfo);
        $goodsinfo = M('Goods')->where($goodswhere)->select();
        $goodsinfo1 = M('Goods')->where($goodswhere)->limit(0,1)->select();
        $goodsinfo2 = M('Goods')->where($goodswhere)->limit(1,1)->select();
        $goodsinfo3 = M('Goods')->where($goodswhere)->limit(2,1)->select();
       $gidarr=explode(',',$gidinfo);
        $str='';
       foreach($gidarr as $v){
           $mlinfo= M('Type')->field('ml')->where(array('gid'=>$v))->find();
           $str.=$mlinfo['ml'].',';
       }
        //得到组合购买的商品的市场价格总和
        $marketprice = 0;
        foreach ($goodsinfo as $market) {
            $marketprice += $market['marketprice'];
        }
        $str1 = substr($str, 0, -1);
        $arr2 = explode(',', $str1);
        foreach ($arr2 as $k => $v1) {
            $goodsinfo[$k]['ml'] = $v1;
        }
        //算出节省的钱
        $jiesheng = $marketprice*$combuynum - $totalprice;
        $this->assign('goodsinfo', $goodsinfo);
        $this->assign('totalprice', $totalprice);
        $this->assign('marketprice', $marketprice*$combuynum);
        $this->assign('goodsinfo1', $goodsinfo1);
        $this->assign('goodsinfo2', $goodsinfo2);
        $this->assign('goodsinfo3', $goodsinfo3);
        $this->assign('combuynum',$combuynum);
        $this->assign('jiesheng', $jiesheng);
        $this->display('combuy');
    }


    public function comtobuy(){
        $gidinfo = I('post.gid');
        $mid = session('mid');
        $xinghaoinfo = I('post.xinghao');
        $saleinfo=I('post.salenum');
        $zong = I('post.totalprice');
        $g = M('Goods');
        foreach ($gidinfo as $k => $gid) {
            $where['id'] = $gid;
            //得到商品的一些信息
            $goods = $g->field('goodsname,imageurl,discount,saleprice,imagename,id')->where($where)->select();
            foreach ($goods as $v) {
                $orderlist[$k] = $v;
                $orderlist[$k]['ml'] = $xinghaoinfo[$k];
                $orderlist[$k]['buynum'] = $saleinfo[$k];
                $orderlist[$k]['sumprice'] = $v['saleprice'];
            }
        }
        //写入订单表
        $order['orderno'] = $this->uniqueStr();
        $order['mid'] = $mid;
        $order['price'] = $zong;
        $order['create_time'] = time();
        $oid = M('Order')->add($order);
        if ($oid) {
            foreach ($orderlist as $k => $v1) {
                $ordergoods[$k]['gid'] = $v1['id'];
                $ordergoods[$k]['buynum'] = $v1['buynum'];
                $ordergoods[$k]['ml'] = substr($v1['ml'], 0, -2);
                $ordergoods[$k]['oid'] = $oid;
                $ordergoods[$k]['saleprice'] = $v1['saleprice']*$v1['buynum'];
            }
            //写入订单商品表
            foreach ($ordergoods as $v2){
                $g->table('beauty_order_goods')->field('gid,buynum,ml,oid,saleprice')->add($v2);
            }
            $this->success($oid);
        }
    }

    public function comorder(){
       $oid=I('get.oid');
       $goodsinfo=M('order_goods')->field('gid,ml,buynum,saleprice')->where(array('oid'=>$oid))->select();
        $g=M('Goods');
        foreach($goodsinfo as $k=>$goods){
            $where['id'] = $goods['gid'];
            //得到商品的一些信息
            $goodsmsg = $g->field('goodsname,imageurl,discount,saleprice,imagename,id')->where($where)->select();
            foreach ($goodsmsg as $v) {
                $orderlist[$k] = $v;
                $orderlist[$k]['ml'] = $goods['ml'];
                $orderlist[$k]['buynum'] = $goods['buynum'];
                $orderlist[$k]['sumprice'] = $goods['saleprice'];
            }
        }
        $this->assign('oid',$oid);
        $this->assign('orderlist',$orderlist);
        $address = A('Order');
        $address->showaddress();
        $address->hongbao();
        $this->display('comOrder');
    }

    //
    public function setSession(){
        session('URL2',U('Home/Order/goodsdetail',array('gid'=>I('post.gid'))));
        $this->success();
    }

    public function tosubmit1()
    {
        $gid=I('post.gid');
        $oid = I('post.oid');
        $mid = session('mid');
        $trueprice = I('post.trueprice');//实付款的价格
        $address = I('post.address');
        $inform = I('post.inform');
        $orderwhere['id'] = $oid;
        $orderwhere['mid'] = $mid;
        $data['address'] = $address;
        $data['inform'] = $inform;
        $data['status'] = 2;
        $orderno1 = M('Order')->field('orderno')->where(array('id' => $oid))->find();
        $orderno = $orderno1['orderno'];
        //更新订单表里面的地址和留言
        if (M('Order')->where($orderwhere)->save($data)) {
            M('golds')->where(array('id'=>$gid))->setInc('salenum',1);
            $this->assign('orderno', $orderno);
            $this->assign('trueprice', $trueprice);
            $this->assign('oid', $oid);
            $this->success();
        }else{
            $this->error();
        }
    }

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