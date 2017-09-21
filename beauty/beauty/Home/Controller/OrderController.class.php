<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Think\Page;
header('content-type:text/html;charset=utf-8');
class OrderController extends Controller{
    //生成唯一的字符串
    public function uniqueStr(){
        return substr(md5(uniqid(microtime(true))),0,15);
    }
    public function goodsdetail(){
        $gid=I('get.gid');
        $goods=M('Goods');
        $mid=session('mid');
        $commentwhere1['c.gid']=$gid;
        $commentwhere2['c.gid']=$gid;
        $commentwhere3['c.gid']=$gid;
        $commentwhere4['c.gid']=$gid;
        $commentwhere5['c.gid']=$gid;
        $commentwhere6['c.gid']=$gid;
        $commentwhere2['c.cosid']=1;
        $commentwhere3['c.cosid']=2;
        $commentwhere4['c.cosid']=3;
        $commentwhere5['c.isimage']=1;
        $commentwhere6['c.zuijiacount']=1;
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


        //有图的订单
        $totalcount5=M('Comment')->where(array('gid'=>$gid,'isimage'=>1))->count();//总记录数
        $p5 = new \Org\Beauty\AjaxPage($totalcount5,$limitRows,"goodsdetail5"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value5 = $p5->firstRow .",". $p5->listRows;
        $commresponlist5=$list->goods($commentwhere5,$limit_value5);
        $page5 = $p5->show(); //产生分页信息，AJAX的连接在此处生成
        $this->assign('totalcount5',$totalcount5);

        //追加的评论

        $totalcount6=M('Comment')->where(array('gid'=>$gid,'zuijiacount'=>1))->count();//总记录数
        $p6 = new \Org\Beauty\AjaxPage($totalcount6,$limitRows,"goodsdetail6"); //第三个参数是你需要调用换页的ajax函数名
        $limit_value6 = $p6->firstRow .",". $p6->listRows;
        $commresponlist6=M('Comment')->field('c.content,c.cosid,c.coaddtime,c.response,c.id,u.username,u.imgpath,u.imgname,c.ml,c.readdtime,c.respid,cs.costatus,
  c.imageurl,c.imagename,c.picurl,c.picname,c.zuijia,c.zuijiatime')
            ->table('beauty_comment c,beauty_user u,beauty_comment_status cs')
            ->where($commentwhere6)
            ->where('c.mid=u.id and c.cosid=cs.id')
            ->limit($limit_value6)
            ->order(array('c.coaddtime'=>'desc'))
            ->select();// 查询总评价
        foreach($commresponlist6 as $k=>$v){
            $commresponlist6[$k]['zuijiatime']=ceil(($v['zuijiatime']-$v['coaddtime'])/86400);
        }
        $page6 = $p6->show(); //产生分页信息，AJAX的连接在此处生成
        $this->assign('totalcount6',$totalcount6);
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
        $goodsdetail1=D('Goods')->detail($gid);
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
        $this->assign('commresponlist5',$commresponlist5);
        $this->assign('empty5','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
        $this->assign('commresponlist6',$commresponlist6);
        $this->assign('empty6','<h1 style="font-size: 20px;font-weight: bold;">还没有用户评价信息</h1>');
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
        //组合购买的一些信息
        $combgoods1=D('Goods')->com1($gid);
        $this->assign('combgoods1',$combgoods1);
        $combgoods2=D('Goods')->com2($gid);
        $this->assign('combgoods2',$combgoods2);
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
        $this->assign('page5',$page5);
        $this->assign('page6',$page6);
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
                case 5:
                    $this->display('result5');
                    break;
                case 6:
                    $this->display('result6');
                    break;
            }
        }else{
            $this->display('goodsdetail');
        }

    }


    //显示评论的大图
    public function seeimg(){
        $id=I('get.cid');
        $imgInfo=M('Comment')->field('imageurl,imagename')->where(array('id'=>$id))->select();
        $this->assign('imgInfo',$imgInfo);
        $this->display('bigimg');
    }



     public function collect(){
           if(session('mid')){
               $gid=I('gid');
               $where['gid']=$gid;
               $where['mid']=session('mid');
               $collectInfo=M('collect')->where($where)->find();
               if(!$collectInfo){
                   $where1['id']=I('gid');
                   $goods=M('goods')->where($where1)->find();
                   $date['gid']=$goods['id'];
                   $date['mid']=session('mid');
                   $date['goodsname']=$goods['goodsname'];
                   $date['imageurl']=$goods['imageurl'];
                   $date['imagename']=$goods['imagename'];
                   $date['saleprice']=$goods['saleprice'];
                   M('collect')->add($date);
                   M('Goods')->where($where1)->setInc('collectnum',1);
                   $this->success('您已成功收藏该商品');

               }else{

                  $this->error('该商品已经在收藏夹里哦');
               }
           }else{
               $gid=I('gid');
               $url="Order/goodsdetail?gid=".$gid;
               session('url',$url);
               $this->error('请先登录','Login');
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
                $list[$k]['totaladdress']=$v['area'];
            }
            $this->assign('list',$list);
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
           $orderprice=$salenum*$saleprice['saleprice'];

       if (session('mid')){
           $g = M('Goods');
           $where['id'] = $gid;
           //得到订单列表orderlist
           $orderlist=$g->field('goodsname,imageurl,discount,imagename')->where($where)->select();
       foreach($orderlist as $k=>$v){
               $orderlist[$k]['price']=$orderprice;
               $orderlist[$k]['buynum']=$salenum;
               $orderlist[$k]['saleprice']=$saleprice['saleprice'];
               $orderlist[$k]['ml']=$ml;
           }
           $this->assign('orderlist',$orderlist);
           //将商品的id传过去，作为隐藏提交的时候提交上来
           $this->assign('gid',$gid);
           $this->showaddress();
           $this->hongbao();
           $this->display('Order/Order_payment');
       }

   }



//点击提交订单执行tosubmit方法到提交订单成功页面（showcart）
   public function tosubmit(){
       $mid=session('mid');
       if(IS_POST){
           //得到使用的红包id
           $hid=I('post.hid');
           $salenum=I('post.buynum');
           $orderno=$this->uniqueStr();
           $ml=substr(I('post.ml'),0,-2);
           if(I('post.address')){
               $address=I('post.address');
           }else{
               $addresswhere['mid']=$mid;
               $addresswhere['isdefault']=1;
               $isdefault=M('Addresses')->field('id')->where($addresswhere)->find();
               $address=$isdefault['id'];
           }
           $create_time=time();
           $trueprice=I('post.trueprice');//实付款的价格
           $gid=I('post.gid');
       }
       if(session('mid')){
           $g=M('Goods');
           //通过红包id找到使用红包的金额
           $money=M('Packet')->where(array('id'=>$hid))->find();
           //提交订单的时候将商品信息写到订单表里面
           $order['orderno']=$orderno;
           $order['mid']=$mid;
           $order['price']=$trueprice;
           $order['create_time']=$create_time;
           $order['address']=$address;
           $order['packet']=$money['money'];
           if(I('post.inform')){
               $order['inform']=I('post.inform');
           }
           //将购买的商品信息直接写入订单
           $id=$g->table('beauty_order')->field('orderno,mid,price,create_time,address,inform')->add($order);
       }
       if ($id) {
           //将商品信息写入商品订单表 首先得到提交上来的商品的订单信息
           $ordergoods['oid'] = $id;
           $ordergoods['gid'] = $gid;
           $ordergoods['buynum'] = $salenum;
           $ordergoods['ml'] = $ml;
           $salepriceinfo=M('Type')->where(array('gid'=>$gid,'ml'=>$ml))->find();
           $ordergoods['saleprice']=$salenum*$salepriceinfo['saleprice'];
           $res = $g->table('beauty_order_goods')->field('oid,gid,buynum,ml,saleprice')->add($ordergoods);
           if ($res) {
               $data['status']=2;
               M('Packet')->where(array('id'=>$hid))->save($data);
               //显示订单页面的订单号和支付金额
               $this->assign('orderno',$orderno);
               $this->assign('trueprice',$trueprice);
               print_r($trueprice);
               $this->assign('oid',$id);
               $this->display('showcart');
           }
       }
   }

    //支付订单的方法
    public function topay()
    {
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
                            $goods['num']=$goodsInfo['num']-$v1['buynum'];
                            if(!M('Goods')->where(array('id'=>$v1['gid']))->save($goods)){
                                $order->rollback();
                            }
                            //删除选中结算的购物车中的商品
                            $cartwhere['gid'] = $v1['gid'];
                            $cartwhere['ml'] = $v1['ml'];
                            $cartwhere['mid'] = $mid;
                            $cartbuynum = M('Cart')->where($cartwhere)->find();
                            $price = M('Cart')->field('sumprice')->where($cartwhere)->find();
                            if ($v1['buynum']<$cartbuynum['buynum']){
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
                            $this->error('订单付款失败');
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

                            //删除选中结算的购物车中的商品
                            $cartwhere['gid'] = $v1['gid'];
                            $cartwhere['ml'] = $v1['ml'];
                            $cartwhere['mid'] = $mid;
                            $cartbuynum = M('Cart')->where($cartwhere)->find();
                            $price = M('Cart')->field('sumprice')->where($cartwhere)->find();
                            if ($v1['buynum'] < $cartbuynum['buynum']) {
                                //更新数量和价格
                                $totalprice = $v1['saleprice'] * $v1['buynum'];
                                $sumprice = $price['sumprice'] - $totalprice;
                                M('Cart')->where($cartwhere)->setDec('buynum', $v1['buynum']);
                                M('Cart')->where($cartwhere)->setDec('sumprice', $sumprice);
                            } else {
                                M('Cart')->where($cartwhere)->delete();
                            }

                        }
                        //事务提交;
                        if ($order->commit()) {
                            $this->success('订单支付成功');
                        } else {
                            $this->error('订单付款失败');
                        }
                    }
                } else {
                    $this->error('你的资金账户被冻结');
                }
            } else {
                $this->error('账户余额不足');
            }
        } else {
            if($res&&$zffs!=1){
                //订单支付成功，根据订单号更新订单的状态
                $order=M('Order');
                $data['status']=2;
                $data['price']=$trueprice;
                $where['id']=$oid;
                if($order->where($where)->field('status,price')->save($data)){
                    $Info=$order->table('beauty_order_goods')->field('gid,buynum,ml')->where(array('oid'=>$oid))->select();
                    //更新销售量和库存量
                    foreach($Info as $v){
                        M('Goods')->where(array('id'=>$v['gid']))->setInc('salenum',$v['buynum']);
                        M('Goods')->where(array('id'=>$v['gid']))->setDec('num',$v['buynum']);
                        //删除选中结算的购物车中的商品
                        $cartwhere['gid'] = $v['gid'];
                        $cartwhere['ml'] = $v['ml'];
                        $cartwhere['mid'] = $mid;
                        $cartbuynum = M('Cart')->where($cartwhere)->find();
                        $price = M('Cart')->field('sumprice')->where($cartwhere)->find();
                        if ($v['buynum'] < $cartbuynum['buynum']) {
                            //更新数量和价格
                            $totalprice = $v['saleprice'] * $v['buynum'];
                            $sumprice = $price['sumprice'] - $totalprice;
                            M('Cart')->where($cartwhere)->setDec('buynum', $v['buynum']);
                            M('Cart')->where($cartwhere)->setDec('sumprice', $sumprice);
                        } else {
                            M('Cart')->where($cartwhere)->delete();
                        }
                    }
                    $this->success($trueprice);
                }
            }else{
                $this->error('支付密码不正确，请重新输入');
            }
        }
    }

    //跳转到支付成功的界面
    public function paysuccess(){
        $oid=I('get.oid');
        $where['id']=$oid;
        $orderno1=M('Order')->field('orderno')->where($where)->find();
        $orderno=$orderno1['orderno'];
        //显示购买该商品的用户还买的商品,可根据订单的oid得到所购买商品的gid
        $mid=session('mid');
        $goodsInfo=M('Goods')->order('salenum asc')->limit(0,15)->select();
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('orderno',$orderno);
        $this->display('PaySuccess');
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
//生成验证码
    public function verify(){
        $config=array(
            'fontSize'=>30,//验证码字体大小
            'length'=>'2',//验证码的位数
            'useNoise'=>false,//关闭验证码的杂点
            'useCurve'=>false,//关闭验证码的干扰线
            'codeSet'=>'1234567890',//验证码的字符集合
            // 'useImgBg'=>'true',//使用背景图片
            //'bg'        =>  array(243, 251, 254),  // 设置背景颜色
            //'useZh'  =>true,//使用中文
        );
        $verify=new Verify($config);
        $verify->entry();
    }

    //显示地址弹框的方法
    public function layeraddress(){
        $this->display('addresslayer');
    }

    //删除地址
    public function deleteAddress(){
        $id=I('post.id');
        if(M('addresses')->where(array('id'=>$id))->delete()){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }

//显示需要编辑的地址信息
    public function showAddresslist(){
        $id=I('get.aid');
           $addressInfo=M('addresses')->where(array('id'=>$id))->select();
           $this->assign('addressInfo',$addressInfo);
           $this->assign('addressid',$id);
           $this->display("editorLayer");
    }

    //编辑地址
    public function editorAddress(){
        if(IS_POST){
            $id=I('post.addressid');
            $address=M('Addresses');
            if(I('post.area')){
                $data['area']=I('post.area');
            }else{
                $data['area']=I('post.province').I('post.city').I('post.county');
            }
            $data['username']=I('post.username');
            $data['mobile']=I('post.mobile');
            $data['address']=I('post.address');
            $data['email']=I('post.email');
            $data['telephone']=I('post.telephone');
            $data['ecode']=I('post.ecode');
            if($address->where(array('id'=>$id))->save($data)){
                $this->success($data);
            }else{
                $this->error($data);
            }
        }
    }

//设置默认地址
public function setdefault(){
    $id=I('post.id');
    $mid=session('mid');
    //设置默认地址，并将该用户其他的isdefault属性设置为0
    $where1['mid']=$mid;
    $where1['id']=$id;
    $data1['isdefault']=1;
    //更新除了设置该地址的其他的地址的isdefault值
    $where2['mid']=$mid;
    $where2['id']=array('notin',$id);
    $data2['isdefault']=0;
    if(M('addresses')->where($where1)->save($data1)){
        M('addresses')->where($where2)->save($data2);
        $this->success('设置成功');
    }
    else{
        $this->error('请稍后再进行设置');
    }
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

    public function saleprice(){
        $ml=I('post.xinghao');
        $gid=I('post.gid');
        $where['ml']=substr($ml,0,-2);
        $where['gid']=$gid;
        $saleprice=M('Type')->field('saleprice')->where($where)->find();
        if($saleprice){
            $this->success($saleprice['saleprice']);
        }
    }

}

