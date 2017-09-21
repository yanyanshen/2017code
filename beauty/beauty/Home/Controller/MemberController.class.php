<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Think\Image;
use Think\Upload;
class MemberController extends Controller
{
    /*链接用户中心的index方法*/
    public function index()
    {
        if (session('mid')) {
            $userName = session('mname');
            $user = M('User');
            $order = M('Order');
            $mid = session('mid');
            $waitOrder = $order->where(array('status' => 1, 'mid' => $mid))->count();
            $forGoods = $order->where(array('status' => 3, 'mid' => $mid))->count();
            $waitComment = $order->where(array('status' => 4, 'mid' => $mid))->count();
            $Commented = $order->where(array('status' => 5, 'mid' => $mid))->count();
            $userInfo = $user->join('beauty_user_vipinfo a on beauty_user.memberorder=a.id')->where(array('username' => $userName))->find();
            //print_r($userInfo);
            //根据积分更新会员等级
            if ($userInfo['score'] >= 500 && $userInfo['score'] < 1000) {
                $date3['memberorder'] = 2;
                $user->join('beauty_user_vipinfo a on beauty_user.memberorder=a.id')->where(array('username' => $userName))->save($date3);
            } elseif ($userInfo['score'] >= 1000) {
                $date2['memberorder'] = 3;
                $user->join('beauty_user_vipinfo a on beauty_user.memberorder=a.id')->where(array('username' => $userName))->save($date2);
            } elseif ($userInfo['score'] < 500) {
                $date1['memberorder'] = 1;
                $user->join('beauty_user_vipinfo a on beauty_user.memberorder=a.id')->where(array('username' => $userName))->save($date1);
            }
            //$count=500-$userInfo['score']; //500积分升级会员等级

                $rscore = $userInfo['monetary'] * '0.1';  //按消费金额的百分之十返还积分
                $mscore=$rscore+$userInfo['score'];//积分的累加
                //$user->where(array('username' => session('mname')))->save(array('score'=>$mscore));//对数据库积分的累加跟新

            $memberinfo = $user->where(array('username' => session('mname')))->find();
            $trade=M('AccountTrade')->where(array('mid'=>session('mid')))->order('id desc')->find();
            $packetinfo = M('Packet')->where(array('mid'=>session('mid')))->count();
            $packet['addtime'] = time();
            $packet['expirationtime'] = time() + 3600 * 24 * 30;
            M('Packet')->where(array('mid' => $memberinfo['id']))->save($packet);
            $account = M('Account')->where(array('mid' => session('mid')))->find();
            $var = 1000 - $userInfo['score'];
            $var1 = 500 - $userInfo['score'];
            //$var2=1000-$userInfo['score'];
            $this->assign('var1', $var1);
            $this->assign('var', $var);
            //$this->assign('var',$var2);
            $this->assign('balance', $account['balance']);
            $this->assign('order', $userInfo['vipname']);
            $this->assign('score', $userInfo['score']);
            $this->assign('waitOrder', $waitOrder);
            $this->assign('forGoods', $forGoods);
            $this->assign('waitComment', $waitComment);
            $this->assign('Commented', $Commented);
            //$this->assign('count',$count);
            $this->assign('rscore', $rscore);
            $this->assign('userImg', $userInfo['userimg']);
            $this->assign('lastTime', $userInfo['lastlogin']);
            $this->assign('money', $userInfo['monetary']);
            $this->assign('discount', $packetinfo);
            //$this->assign('discount0', $discount0);
            $this->assign('savepath', $userInfo['imgpath']);
            $this->assign('savename', $userInfo['imgname']);
            $this->assign('email', $userInfo['email']);
            $this->assign('regTime', $userInfo['regtime']);
            $this->assign('money',$trade['tradesum']);
            $this->display('Member');
        }else{
            $this->redirect('Home/Login/Login');
        }
    }
//更新用户积分
    public function UpdateScore(){
        $user=M('User');
        $userName=session('mname');
        $userInfo=$user->where(array('username'=>$userName))->find();
        $date['score']=$userInfo['monetary']*0.1+$userInfo['score']; //根据消费金额累计积分
        $user->where(array('username'=>$userName))->save($date);//更新数据库积分
    }


    /*链接用户中心的用户地址address方法*/
    public function address(){
        $User=M('addresses');
        $where['mid']=session('mid');
        $addressList=$User->where($where)->order('addtime desc')->select();
        $this->assign('addressList', $addressList);
        $this->display('Member_Address');

    }
//添加收货地址的方法
    public function addAddress()
    {   $mid=session('mid');
        if (IS_AJAX) {
            $data['mid'] = session('mid');
            if(I('post.area')){
                $data['area']=I('post.area');
            }else{
                $data['area']=I('post.province').I('post.city').I('post.county');
            }
            $data['address'] = I('post.address');
            $data['username'] = I('post.username');
            $data['ecode'] = I('post.ecode');
            $data['telephone'] = I('post.telephone');
            $data['mobile'] = I('post.mobile');
            $data['email'] = I('post.email');
            $data['addtime'] = time();

            if( $data['area'] && $data['address'] && $data['username'] &&  $data['mobile']) {
                $where['mid'] = session('mid');
                $User = M('addresses');
                $rows = $User->where($where)->count();

                if ($rows < 4) {
                    $a = $User->data($data)->add();
                    $where1['id'] = $a;
                    $where2['id'] = array('notin', $a);
                    $data1['isdefault'] = 1;
                    $data2['isdefault'] = 0;
                    $User->where($where1)->save($data1);
                    $User->where($where2)->save($data2);

                    $where1['id'] = $a;
                    $where1['mid'] = $mid;
                    $where2['id'] = array('notin', $a);
                    $where2['mid'] = $mid;
                    $data1['isdefault'] = 1;
                    $data2['isdefault'] = 0;
                    $User->where($where1)->save($data1);
                    $User->where($where2)->save($data2);
                    if ($a) {
                        $this->success($data);
                    }
                } else {
                    $this->error("已达到添加地址上限");
                }
            }else{
                $this->error("必填项不能为空");
            }
        } else {
            $this->display('Member_Address');
        }
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


    /*删除收货地址*/
    public function deleteAddress(){
        if(IS_AJAX) {
            $User = M("addresses"); // 实例化User对象
            $mid = session('mid');
            $id = I('post.id');
           $info= $User->where(array('id' => $id,'mid' => $mid))->delete();
            if($info){
                $this->success("成功");
            }else{
                $this->error("失败");
            }
        }else{
            //$this->display('Member_Address');
        }
    }
    /*链接用户中心的用户收藏的collect方法*/
    public function showCollect(){
        if (session('mid')) {
        $where['mid']=session('mid');
        $count=M('Collect')->where($where)->count();
        $Page=new Page($count,5);
        $show=$Page->show();
        $collectList=M('Collect')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
      /*  print_r($collectList);
        $idStr='';
        $gidArr= M('activity')->field('gid')->select();;
        foreach($gidArr as $v){
            //得到的id是个数组 得到里面的字符串值
            $idStr.=$v['id'].',';//这样最后会得到一个 最后又一个逗号的字符串
        }
        $gidStr=substr($idStr,0,-1);
        M('Collect')->*/
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('collectList',$collectList);
        $this->assign('empty','<h1 style="text-align: center;color: orangered">您的收藏夹为空，快来添些宝贝吧！！！</h1>');
        $this->display("Member_Collect");
    }else{
            $this->redirect('Home/Login/Login');
        }
    }


    public function deleteCollect(){
        $gid=I('get.gid');
        $where['gid']=$gid;
        $where['mid']=session('mid');
        M('collect')->where($where)->delete();
        $this->success();
    }


    /*周贝贝的评论开始*/
    //显示评论列表
    public function showcomment(){
        $comment=M('Comment');
        $mid=session('mid');
        $commentwhere['c.mid']=$mid;
        $count=$comment->field('g.goodsname,g.imageurl,g.imagename,g.id,c.content,c.response,c.ml')
            ->table('beauty_goods g,beauty_comment c')->where('g.id=c.gid')->where($commentwhere)->count();
        $Page=new Page($count,2);
        $show=$Page->show();

        $commentlist=$comment->field('g.goodsname,g.imageurl,g.imagename,c.gid,c.oid,c.content,c.response,c.respid,cs.costatus,c.coaddtime,c.ml,c.zuijia,c.zuijiacount')
            ->table('beauty_goods g,beauty_comment c,beauty_comment_status cs')->order('c.coaddtime desc')
            ->where('g.id=c.gid and c.cosid=cs.id')->where($commentwhere)->limit($Page->firstRow.','.$Page->listRows)->select();

        //显示用户的一些信息
        $userwhere['u.id']=$mid;
        $userInfo=M('User')->table('beauty_user u,beauty_user_vipinfo v')->where('u.memberorder=v.id')->where($userwhere)->select();
        $this->assign('userInfo',$userInfo);
        $this->assign('page',$show);
        $this->assign('commentlist',$commentlist);
        $this->assign('count',$count);
        $this->assign('empty','<h1 style="font-size: 20px;font-weight: bold;">该用户还未做出任何评价</h1>');
        $this->display('Member_Comment');
    }

    //删除评论
    public function deletecomment(){
        $gid=I('get.gid');
        $mid=session('mid');
        $oid=I('get.oid');
        $comwhere['gid']=$gid;
        $comwhere['mid']=$mid;
        $comwhere['oid']=$oid;
        if(M('Comment')->where($comwhere)->delete()){
            $this->success();
        }else{
            $this->error();
        }
    }
    /*周贝贝的评论结束*/

    /*链接用户中心的我的订单的order方法*/
    public function Orderform()
    {
        if (session('mid')) {
            if (IS_GET) {
                $keywords1 = I('get.keywords1');
                $keywords2 = I('get.keywords2');
                //print_r(I('get.keywords1'));
                if (!$keywords2 == 0) {
                    $where['o.status'] = $keywords2;
                }
                $where['o.orderno'] = array('like', "%$keywords1%");
            } else {
                $where = '';
            }
            $User = M('order'); // 实例化User对象
            $where1['o.mid'] = session('mid');
            $where2['_string'] = 'os.id=o.status and o.id=og.oid and og.gid=g.id';

            $count = $User
                ->field('o.id,o.orderno,g.saleprice,o.create_time,os.statusname,os.memberstatus,og.gid,g.goodsname,g.imageurl,g.imagename')
                ->where($where1)
                ->where($where2)
                ->where($where)
                ->table('beauty_order_status os,beauty_order o,beauty_order_goods og,beauty_goods g')
                ->count();// 查询满足要求的总记录数
            // print_r($count);

            $Page = new Page($count, 6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $User
                ->field('o.id,o.orderno,g.saleprice,o.create_time,os.statusname,os.memberstatus,og.gid,g.goodsname,g.imageurl,g.imagename')
                ->where($where1)
                ->where($where2)
                ->where($where)
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->order('o.create_time desc')
                ->table('beauty_order_status os,beauty_order o,beauty_order_goods og,beauty_goods g')
                ->select();
            $this->assign('list', $list);// 赋值数据集
            $this->assign('firstRow', $Page->firstRow);
            $this->assign('page', $show);// 赋值分页输出
            $this->assign('keywords1', $keywords1);
            $this->display('Member_Order');
        }else{
                $this->redirect('Home/Login/Login');
        }
    }

    public function Orderform1()
    {
        if (session('mid')) {
            if (IS_GET) {
                $keywords1 = I('get.keywords1');
                $keywords2 = I('get.keywords2');
                //print_r(I('get.keywords1'));
                if (!$keywords2 == 0) {
                    $where['o.status'] = $keywords2;
                }
                $where['o.orderno'] = array('like', "%$keywords1%");
            } else {
                $where = '';
            }
            $User = M('order'); // 实例化User对象
            $where1['o.mid'] = session('mid');
            $where2['_string'] = 'os.id=o.status and o.id=og.oid and og.gid=g.id';

            $count = $User
                ->field('o.id,o.orderno,g.saleprice,o.create_time,os.statusname,os.memberstatus,og.gid,g.goodsname,g.imageurl,g.imagename')
                ->where($where1)
                ->where($where2)
                ->where($where)
                ->table('beauty_order_status os,beauty_order o,beauty_order_goods og,beauty_golds g')
                ->count();// 查询满足要求的总记录数
            // print_r($count);

            $Page = new Page($count, 6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $list = $User
                ->field('o.id,o.orderno,g.saleprice,o.create_time,os.statusname,os.memberstatus,og.buynum,og.gid,g.goodsname,g.imageurl,g.imagename')
                ->where($where1)
                ->where($where2)
                ->where($where)
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->order('o.create_time desc')
                ->table('beauty_order_status os,beauty_order o,beauty_order_goods og,beauty_golds g')
                ->select();
            $this->assign('list', $list);// 赋值数据集
            $this->assign('firstRow', $Page->firstRow);
            $this->assign('page', $show);// 赋值分页输出
            $this->assign('keywords1', $keywords1);
            $this->display('Member_Order1');
        }else{
            $this->redirect('Home/Login/Login');
        }
    }


    public function confirm_goods1(){
        $oid=I('get.oid');
        $gid=I('get.gid');
        $mid=session('mid');
        $User=M('order');
        $info=$User ->table('beauty_order_status os,beauty_order o,beauty_order_goods og,beauty_golds g')
            ->where('o.id=og.oid and g.id=og.gid and os.id=o.status')
            ->where(array('o.id'=>$oid,'g.id'=>$gid,'o.mid'=>$mid))
            ->select();
        // dump($info);
        if($info){
            $info['status']=4;
            $a=$User->table('beauty_order_status os,beauty_order o,beauty_order_goods og,beauty_golds g')
                ->where('o.id=og.oid and g.id=og.gid and os.id=o.status')
                ->where(array('o.id'=>$oid,'g.id'=>$gid,'o.mid'=>$mid))
                ->field('status')
                ->save($info);
            if($a){
                $this->redirect('Home/Member/Orderform1');
            }else{
                $this->display('Member_Order1');
            }
        }
        //确认收货 积分增加
        $score=$User->table('beauty_order o,beauty_order_goods og,beauty_goods g')
            ->where('o.id=og.oid and g.id=og.gid')
            ->where(array('o.id'=>$oid,'g.id'=>$gid,'o.mid'=>$mid))
            ->field('score')
            ->find();
        M('User')->where(array('id'=>$mid))->setInc('score',$score['score']);//更新数据库积分
        $this->display('Member_Order');
    }

    //点击付款到付款页面
    public function topay1(){
        /*$oid=I('get.oid');
        $gid=I('get.gid');
        $mid=session('mid');
        $addresses=M('Addresses')->where(array('mid'=>$mid))->select();
        foreach($addresses as $k=>$val){
            $defaultAdd[$k]=$val['isdefault'];
        }
        foreach($defaultAdd as $v){
            $isdefault=$v['isdefault'];
        }
        if($addresses && $isdefault==1){*/

        $oid=I('get.oid');
        $gid=I('get.gid');
        $orderlist=M('Order')->field('orderno,price')->where(array('id'=>$oid))->select();
        $this->assign('oid',$oid);
        $this->assign('gid',$gid);
        $this->assign('orderlist',$orderlist);
        $this->display('showcart');
    }

    //支付操作;
    public function dopay(){
        if(IS_AJAX){
            $oid=I('post.oid');
            $radio=I('post.radio');
            $paypwd=trim(I('post.paypwd'));
            $mid=session('mid');
            $where['mid']=$mid;
            $where['paypwd']=md5($paypwd);
            $res=M('User')->field('paypwd')->where($where)->find();
            if($res && $radio==1){
                $order=M('Order');
                $orderInfo=$order->where(array('id'=>$oid))->find();
                $accountInfo=M('Account')->where(array('mid'=>$mid))->find();
                $tradeInfo=M('Account_trade')->where(array('mid'=>$mid))->order('id desc')->find();
                //只有资金账户总表存在以及同时余额大于消费额度,才能直接从账户进行支付操作;
                if ($accountInfo && $accountInfo['balance'] >= $orderInfo['price']) {
                    //查看资金账户是否冻结;
                    if($accountInfo['status']==1) {
                        //开启事务;
                        $order->startTrans();
                        //分两种情况,是否有过消费记录;
                        if ($tradeInfo) {
                            //有过消费记录,账户主表更新,消费表插入以及更新;
                            $data['trademoney'] = $orderInfo['price'];
                            $data['tradetime'] = time();
                            $data['tradesum'] = $tradeInfo['tradesum'] + $orderInfo['price'];
                            $data['mid'] = $mid;
                            $info['balance'] = $accountInfo['balance'] - $orderInfo['price'];
                            $info['time'] = time();
                            //更新订单主表;
                            $orderInfo['status'] = 2;
                            //根据订单编号获取订单商品的库存量和销售量;
                            $ogdInfo = M('Order_goods')->where(array('oid' => $oid))->field('gid,buynum')->select();
                            foreach ($ogdInfo as $k=>$v) {
                                $goodsInfo = M('Goods')->where(array('id' => $v['gid']))->find();
                                $ordNum[$k]['salenum'] = $goodsInfo['salenum'] + $v['buynum'];
                                $ordNum[$k]['num'] = $goodsInfo['num'] - $v['buynum'];
                                $ordNum[$k]['gid']=$v['gid'];
                            }
                            //事务同时操作;
                            if (!$order->where(array('id' => $oid))->field('status')->save($orderInfo)) {
                                $order->rollback();
                            }
                            if (!M('Account_trade')->add($data)) {
                                $order->rollback();
                            }
                            if (!M('Account')->where(array('mid' => $mid))->save($info)) {
                                $order->rollback();
                            }
                            //更新商品表中的库存量和销售量;
                            foreach($ordNum as $v1){
                                $goods['salenum']=$v1['salenum'];
                                $goods['num']=$v1['num'];
                                if (!M('Goods')->where(array('id' => $v1['gid']))->field('salenum,num')->save($goods)) {
                                    $order->rollback();
                                }
                            }
                            //事务提交;
                            if ($order->commit()) {
                                $this->success('订单付款成功');
                            } else {
                                $this->error('订单付款失败');
                            }
                        } else {
                            //没有消费记录,账户主表更新,消费表插入;
                            $data['trademoney'] = $orderInfo['price'];
                            $data['tradetime'] = time();
                            $data['tradesum'] = $orderInfo['price'];
                            $data['mid'] = $mid;
                            $info['balance'] = $accountInfo['balance'] - $orderInfo['price'];
                            $info['time'] = time();
                            //更新订单主表;
                            $orderInfo['status'] = 2;
                            //根据订单编号获取订单商品的库存量和销售量;
                            $ogdInfo = M('Order_goods')->where(array('oid' => $oid))->field('gid,buynum')->select();
                            foreach ($ogdInfo as $k=>$v) {
                                $goodsInfo = M('Goods')->where(array('id' => $v['gid']))->find();
                                $ordNum[$k]['salenum'] = $goodsInfo['salenum'] + $v['buynum'];
                                $ordNum[$k]['num'] = $goodsInfo['num'] - $v['buynum'];
                                $ordNum[$k]['gid']=$v['gid'];
                            }
                            //事务同时操作;
                            if (!$order->where(array('id' => $oid))->field('status')->save($orderInfo)) {
                                $order->rollback();
                            }
                            if (!M('Account_trade')->add($data)) {
                                $order->rollback();
                            }
                            if (!M('Account')->where(array('mid' => $mid))->save($info)) {
                                $order->rollback();
                            }
                            //更新商品表中的库存量和销售量;
                            foreach($ordNum as $v1){
                                $goods['salenum']=$v1['salenum'];
                                $goods['num']=$v1['num'];
                                if (!M('Goods')->where(array('id' => $v1['gid']))->field('salenum,num')->save($goods)) {
                                    $order->rollback();
                                }
                            }
                            //事务提交;
                            if ($order->commit()) {
                                $this->success('订单付款成功');
                            } else {
                                $this->error('订单付款失败');
                            }
                        }
                    }else{
                        $this->error('你的资金账户被冻结');
                    }
                } else {
                    $this->error('你的余额不足');
                }
            }else{
                $this->error('支付密码错误');}
        }else{
            $this->display('showcart');
        }
    }


    //跳转到支付成功的界面
    public function paysuccess(){
        $oid=I('get.oid');
        $where['id']=$oid;
        $orderno1=M('Order')->field('orderno')->where($where)->find();
        $orderno=$orderno1['orderno'];
        //显示购买该商品的用户还买的商品,可根据订单的oid得到所购买商品的gid


        $this->assign('orderno',$orderno);
        $this->display('Order/PaySuccess');
    }

    //删除订单;
    public function delOrder(){
        $oid=I('post.oid');
        $gid=I('post.gid');
        $orderGoods=M('Order_goods');
        $ordGoodsInfo=$orderGoods->where(array('oid'=>$oid,'gid'=>$gid))->find();
        $orderInfo=M('Order')->where(array('id'=>$oid))->find();
        if($ordGoodsInfo && $orderInfo){
            //开启事务;
            $orderGoods->startTrans();
            $data['price']=$orderInfo['price']-$ordGoodsInfo['saleprice'];
            //判断订单的总价是否和订单商品价格一样;
            if($data['price']>0) {
                if (!$orderGoods->where(array('oid' => $oid, 'gid' => $gid))->delete()) {
                    $orderGoods->rollback();
                }
                if (!M('Order')->where(array('id' => $oid))->field('price')->save($data)) {
                    $orderGoods->rollback();
                }
                if ($orderGoods->commit()) {
                    $this->success('删除订单商品成功');
                } else {
                    $this->error('删除订单商品失败');
                }
            }elseif($data['price']==0){
                if (!$orderGoods->where(array('oid' => $oid, 'gid' => $gid))->delete()) {
                    $orderGoods->rollback();
                }
                if (!M('Order')->where(array('id' => $oid))->delete()) {
                    $orderGoods->rollback();
                }
                if ($orderGoods->commit()) {
                    $this->success('删除订单商品成功');
                } else {
                    $this->error('删除订单商品失败');
                }
            }
        }else{
            $this->error('订单商品不存在');
        }
    }
    //确认收货
    public function confirm_goods(){
        $oid=I('get.oid');
        $gid=I('get.gid');
        $mid=session('mid');
        $User=M('order');
        $info=$User ->table('beauty_order_status os,beauty_order o,beauty_order_goods og,beauty_goods g')
              ->where('o.id=og.oid and g.id=og.gid and os.id=o.status')
              ->where(array('o.id'=>$oid,'g.id'=>$gid,'o.mid'=>$mid))
              ->select();
       // dump($info);
        if($info){
            $info['status']=4;
            $a=$User->table('beauty_order_status os,beauty_order o,beauty_order_goods og,beauty_goods g')
              ->where('o.id=og.oid and g.id=og.gid and os.id=o.status')
              ->where(array('o.id'=>$oid,'g.id'=>$gid,'o.mid'=>$mid))
              ->field('status')
              ->save($info);
           if($a){
               $this->redirect('Home/Member/Orderform');
           }else{
               $this->display('Member_Order');
           }
        }
        //确认收货 积分增加
        $score=$User->table('beauty_order o,beauty_order_goods og,beauty_goods g')
                    ->where('o.id=og.oid and g.id=og.gid')
                    ->where(array('o.id'=>$oid,'g.id'=>$gid,'o.mid'=>$mid))
                    ->field('score')
                    ->find();
        M('User')->where(array('id'=>$mid))->setInc('score',$score['score']);//更新数据库积分
        $this->display('Member_Order');
    }
    //设置2212默认地址
    public function set_default(){
        $id=I('get.id');
        $mid=session('mid');
        $User=M('addresses');
        $info=$User
            ->where(array('mid'=>$mid,'id'=>$id))
            ->select();
        if($info){
            $info1=$User
                ->where(array('mid'=>$mid))
                ->select();
            $info1['isdefault']=0;
            $User->where(array('mid'=>$mid))->field('isdefault')->save($info1);
            $info['isdefault']=1;
            $User->where(array('mid'=>$mid,'id'=>$id))->field('isdefault')->save($info);
            $this->redirect('Home/Member/address');
        }else{
            $this->display('Member_Address');
        }

    }



    //白文飞会员中心的用户信息
    public function MemberCentre(){

        $userName=session('mname');
        $user=M('User');
        $order=M('Order');
        $mid=session('mid');
        $waitOrder=$order->where(array('status'=>1,'mid'=>$mid))->count();
        //print_r($waitOrder);
        $forGoods=$order->where(array('status'=>3,'mid'=>$mid))->count();
        $waitComment=$order->where(array('status'=>5,'mid'=>$mid))->count();
        $Commented=$order->where(array('status'=>6,'mid'=>$mid))->count();
        $userInfo=$user->join('beauty_user_vipinfo a on beauty_user.memberorder=a.id')->where(array('username'=>$userName))->find();
        //print_r($userInfo);

        if($userInfo['score']>=500&&$userInfo['score']<1000){
            $date3['memberorder']=2;
            $user->join('beauty_user_vipinfo a on beauty_user.memberorder=a.id')->where(array('username'=>$userName))->save($date3);
        }elseif($userInfo['score']>=1000){
            $date2['memberorder']=3;
            $user->join('beauty_user_vipinfo a on beauty_user.memberorder=a.id')->where(array('username'=>$userName))->save($date2);
        }elseif($userInfo['score']<500){
            $date1['memberorder']=1;
            $user->join('beauty_user_vipinfo a on beauty_user.memberorder=a.id')->where(array('username'=>$userName))->save($date1);
        }
        //$count=500-$userInfo['score'];

        $packetinfo = M('Packet')->where(array('mid'=>session('mid')))->count();//红包的个数

        //$discount0=ceil($rscore*0.01);
        //$discount=$discount0+$userInfo['discount'];
        $account=M('Account')->where(array('mid'=>session('mid')))->find();
        $trade=M('AccountTrade')->where(array('mid'=>session('mid')))->order('id desc')->find();
        $rscore=$account['trademoney']*'0.1';//消费金额的10%返还积分
        $mscore=$rscore+$userInfo['score'];
        //$user->where(array('username' => session('mname')))->save(array('score'=>$mscore));
        $var=1000-$userInfo['score'];
        $var1=500-$userInfo['score'];
        $this->assign('var1',$var1);
        $this->assign('var',$var);
        $this->assign('balance',$account['balance']);
        $this->assign('order',$userInfo['vipname']);
        $this->assign('score',$userInfo['score']);
        $this->assign('waitOrder',$waitOrder);
        $this->assign('forGoods',$forGoods);
        $this->assign('waitComment',$waitComment);
        $this->assign('Commented',$Commented);
        //$this->assign('count',$count);
        $this->assign('rscore',$rscore);
        $this->assign('userImg',$userInfo['userimg']);
        $this->assign('lastTime',$userInfo['lastlogin']);
        $this->assign('money',$trade['tradesum']);
        $this->assign('discount',$packetinfo);
        //$this->assign('discount0',$discount0);
        $this->assign('savepath',$userInfo['imgpath']);
        $this->assign('savename',$userInfo['imgname']);
        $this->assign('email',$userInfo['email']);
        $this->assign('regTime',$userInfo['regtime']);
        $this->display('Member_User');
    }



    public function packet(){
        $packet=M('Packet');
        $where['mid']=session('mid');
        $count=$packet->where($where)->count();
        $page=new Page($count,5);
        $show=$page->show();
        $list=$packet->where($where)->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
        $this->assign('page',$show);
        $this->assign('firstRow',$page->firstRow);
        $this->assign('count',$count);
        $this->assign('curPage',ceil(($page->firstRow+1)/5));
        $this->assign('list',$list);



        $this->display('Member_Packet');
    }

    public function safe()
    {
        $this->display('Member_Safe');
    }

    //修改邮箱;
    public function changeMail(){
        if(IS_AJAX){
            if(I('post.oldemail') && I('post.newemail')) {
                $oldemail = trim(I('post.oldemail'));
                $mid = session('mid');
                $user = D('User');
                $userInfo = $user->where(array('id' => $mid, 'email' => $oldemail))->find();
                if ($userInfo) {
                    $data['email'] = trim(I('post.newemail'));
                    $id = $user->where(array('id' => $mid))->field('email')->save($data);
                    if ($id) {
                        $this->success('邮箱修改成功');
                    } else {
                        $this->error('邮箱修改失败');
                    }
                } else {
                    $this->error('原有邮箱输入错误');
                }
            }else{
                $this->error('邮箱不允许为空');
            }
        }else{
            $this->display('Member_Safe');
        }
    }

    //修改支付密码;
    public function changePaypwd(){
        if(IS_AJAX){
            if(I('post.email') && I('post.newpaypwd')){
                $email=I('post.email');
                $mid = session('mid');
                $user = M('User');
                $userInfo = $user->where(array('id' => $mid, 'email' => $email))->find();
                if ($userInfo) {
                    $data['paypwd'] = md5(trim(I('post.newpaypwd')));
                    $id = $user->where(array('id' => $mid))->field('paypwd')->save($data);
                    if ($id) {
                        $this->success('支付密码修改成功');
                    } else {
                        $this->error('支付密码修改失败');
                    }
                } else {
                    $this->error('注册邮箱输入错误');
                }
            }else{
                $this->error('邮箱或支付密码不允许为空');
            }
        }else{
            $this->display('Member_Safe');
        }
    }

    //修改密码;
    public function changePwd(){
        if(IS_AJAX){
            $email=trim(I('post.email'));
            $oldpwd=md5(trim(I('post.oldpwd')));
            $newpwd=md5(trim(I('post.newpwd')));
            $repwd=md5(trim(I('post.repwd')));
            if($email && $oldpwd && $newpwd && $repwd && $newpwd==$repwd){
                $mid=session('mid');
                $user=M('User');
                $userInfo=$user->where(array('id'=>$mid,'email'=>$email,'password'=>$oldpwd))->find();
                if($userInfo){
                    $id=$user->where(array('id'=>$mid))->field('password')->data(array('password'=>$newpwd))->save();
                    if($id){
                        $this->success('密码修改成功');
                    }else{
                        $this->error('密码修改失败');
                    }
                }else{
                    $this->error('原有邮箱或密码输入错误');
                }
            }else{
                $this->error('邮箱或密码不允许为空');
            }
        }else{
            $this->display('Member_Safe');
        }
    }


    // 更换头像
        public function addImg(){
            $this->display('addImg');
        }


    public function addUserImg()
    {
        $user = M('User');
        //$date = $_POST;
        //print_r($date);
        $upLode = new Upload();
        $upLode->mxaSize = 3145728;
        $upLode->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upLode->rootPath = './UserImg/photo';
        $upLode->savePath = '';
        $info = $upLode->upload();
        //print_r($info);
        if (!$info) {
            $this->error($upLode->getError());
        } else {
            //生成缩略图
            $savePath = $info['img']['savepath'];
            $saveName = $info['img']['savename'];
            $image = new Image();
            $image->open('./UserImg/photo' . $savePath . $saveName);
            $image->thumb(100, 90)->save('./UserImg/photo' . $savePath . $saveName);
            //添加到数据库

            $imgInfo['imgpath'] = $info['img']['savepath'];
            $imgInfo['imgname'] = $info['img']['savename'];
            $userName = session('mname');
            //print_r($saveName);

            $bid = $user->where(array('username' => $userName))->save($imgInfo);
        }
        //print_r('./Upload/logo'.$savePath.$saveName);
        if ($bid) {
            $this->success('头像更换成功');
        } else {
            $this->error('头像更换失败');
        }
    }

        //$this->display('AddImg/addImg');


    //删除红包;
    public function delPacket(){
        if (IS_AJAX) {
            $id = I('post.id');
            $mid = session('mid');
            $packet = M('Packet');
            $a = $packet->where(array('mid' => $mid, 'id' => $id))->delete();
            if ($a) {
                $this->success('红包删除成功');
            } else {
                $this->error('红包删除失败');
            }
        } else {
            $this->display('Member_Packet');
        }
    }


//显示需要评价的商品信息
    public function usercomment(){
        //显示所评价的商品的信息
        $oid=I('get.oid');
        $gid=I('get.gid');
        $str='';
        $gidInfo=M('order_goods')->where(array('oid'=>$oid))->select();
        foreach($gidInfo as $k=>$v){
            $str.=$v['gid'].',';
            $str1=substr($str,0,-1);
        }
        $where['g.id']=array('in',$str1);
        $where['o.mid']=session('mid');
        $where['o.id']=$oid;
        $goodsInfo=M('Goods')->table('beauty_goods g,beauty_order_goods og,beauty_order o')->where('g.id=og.gid and o.id=og.oid')
            ->field('g.imageurl,g.imagename,g.goodsname,g.id,og.ml')->where($where)->select();
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('oid',$oid);
        $this->assign('gid',$gid);
        $this->display('UserComment');
    }

    public function usercomment1(){
        //显示所评价的商品的信息
        $oid=I('get.oid');
        $gid=I('get.gid');
        $str='';
        $gidInfo=M('order_goods')->where(array('oid'=>$oid))->select();
        foreach($gidInfo as $k=>$v){
            $str.=$v['gid'].',';
            $str1=substr($str,0,-1);
        }
        $where['g.id']=array('in',$str1);
        $where['o.mid']=session('mid');
        $where['o.id']=$oid;
        $goodsInfo=M('Goods')->table('beauty_golds g,beauty_order_goods og,beauty_order o')
            ->where('g.id=og.gid and o.id=og.oid')
            ->field('g.imageurl,g.imagename,g.goodsname,g.id,og.ml')->where($where)->select();
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('oid',$oid);
        $this->assign('gid',$gid);
        $this->display('UserComment');
    }

    //对商品进行评价
    public function commentgoods()
    {
        if (IS_POST) {
            $arr = I('post.');
                if ($arr){
                    //上传晒图
                    $common = A('Common');
                    $info = $common->uploadPic();
                    foreach ($arr as $k=>$v) {
                        $data[$k]['ml'] = $v['ml'];
                        $data[$k]['gid'] = $v['gid'];
                        $data[$k]['oid'] = $v['oid'];
                        $data[$k]['content'] = $v['content'];
                        $data[$k]['cosid'] = $v['pingjia'][0];
                        $data[$k]['mid'] = session('mid');
                        $data[$k]['coaddtime'] = time();
                        $data[$k]['cstatus']=5;
                        if(is_array($info)){
                            $data[$k]['imageurl']=$info["image$k"]['savepath'];
                            $data[$k]['imagename']=$info["image$k"]['savename'];
                            if($data[$k]['imageurl']&&$data[$k]['imagename']){
                                $data[$k]['isimage']=1;
                            }
                        }
                }
                    foreach($data as $k1=>$val){
                        //判断一下$k1是否是数值，是的话就执行插入操作
                        if(is_numeric($k1)){
                            if(M('Comment')->add($val)){
                                $data1['status'] = 5;
                                //更新订单表里面的状态
                                M('Order')->where(array('id' => $val['oid']))->save($data1);
                            }
                        }
                    }
                    $this->success('评价成功');
            }else{
                    $this->error('评价失败');
                }
        }
    }


    public function zuijiacomment(){
        //显示所评价的商品的信息
        $oid=I('get.oid');
        $gid=I('get.gid');
        $str='';
        $gidInfo=M('order_goods')->where(array('oid'=>$oid))->select();
        foreach($gidInfo as $k=>$v){
            $str.=$v['gid'].',';
            $str1=substr($str,0,-1);
        }
        $where['g.id']=array('in',$str1);
        $where['o.mid']=session('mid');
        $where['o.id']=$oid;
        $goodsInfo=M('Goods')->table('beauty_goods g,beauty_order_goods og,beauty_order o')->where('g.id=og.gid and o.id=og.oid')
            ->field('g.imageurl,g.imagename,g.goodsname,g.id,og.ml')->where($where)->select();
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('oid',$oid);
        $this->assign('gid',$gid);
        $this->display('zuijiacomment');
    }

    public function zuijiasuccess(){
        if (IS_POST) {
            $arr = I('post.');
            if ($arr){
                //上传晒图
                $common = A('Common');
                $info = $common->uploadPic();
                foreach ($arr as $k=>$v) {
                    $data[$k]['ml'] = $v['ml'];
                    $data[$k]['gid'] = $v['gid'];
                    $data[$k]['oid'] = $v['oid'];
                    $data[$k]['content'] = $v['content'];
                    $data[$k]['cosid'] = $v['pingjia'][0];
                    $data[$k]['mid'] = session('mid');
                    $data[$k]['coaddtime'] = time();
                    if(is_array($info)){
                        $data[$k]['imageurl']=$info["image$k"]['savepath'];
                        $data[$k]['imagename']=$info["image$k"]['savename'];
                    }
                }
                foreach($data as $k1=>$val){
                    //判断一下$k1是否是数值，是的话就执行插入操作
                    $commentwhere['oid']=$val['oid'];
                    $commentwhere['gid']=$val['gid'];
                    $commentwhere['mid']=session('mid');
                    $commentwhere['ml']=$val['ml'];
                    $data1['zuijia']=$val['content'];
                    $data1['zuijiatime']=time();
                    if($val['content']){
                        $data1['zuijiacount']=1;
                    }
                    $data1['cstatus']=6;
                    if($val['imageurl']&&$val['imagename']){
                        $data1['picurl']=$val['imageurl'];
                        $data1['picname']=$val['imagename'];
                    }
                    if(is_numeric($k1)){
                        if(M('Comment')->where($commentwhere)->save($data1)){
                            $data2['status'] = 6;
                            //更新订单表里面的状态
                            M('Order')->where(array('id'=>$val['oid']))->save($data2);
                        }
                    }
                }
                if(M('User')->where(array('mid'=>session('mid')))->setInc('score',5)){
                    $this->success('追评成功');
                }
            }else{
                $this->error('追评失败');
            }
        }
}

    public function deleteorder(){
        $oid=I('post.oid');
        if(M('Order')->where(array('id'=>$oid))->delete()){
            if(M('Order_goods')->where(array('oid'=>$oid))->delete()){
                     $this->success();
            }else{
                $this->error();
            }
        }
    }



    //显示我的购物车
    public function showcart(){
        $this->display('Member_Cart');
    }

    //充值操作;
    public function recharge(){
        $this->display('Member_Money_Charge');
    }

    //资金管理;
    public function money(){
        $mid=session('mid');
        $list=M('Account')->where(array('mid'=>$mid))->find();
        $recharge=M('Account_recharge')->where(array('mid'=>$mid))->order('id desc')->find();
        $trade=M('Account_trade')->where(array('mid'=>$mid))->order('id desc')->find();
        $cash=M('Account_cash')->where(array('mid'=>$mid))->order('id desc')->find();
        $this->assign('time',$list['time']?$list['time']:'');
        $this->assign('mid',$mid);
        $this->assign('status',$list['status']?$list['status']:'');
        $this->assign('balance',$list['balance']?$list['balance']:0);
        $this->assign('rechargesum',$recharge['rechargesum']?$recharge['rechargesum']:0);
        $this->assign('tradesum',$trade['tradesum']?$trade['tradesum']:0);
        $this->assign('cashsum',$cash['cashsum']?$cash['cashsum']:0);
        $this->display('Member_Money');
    }

    //支付账户冻结操作;
    public function operate(){
        if(IS_AJAX){
            $mid=I('post.mid');
            $account=M('Account');
            $info=$account->where(array('mid'=>$mid))->find();
            if($info){
                $info['status']=($info['status']==0)?1:0;
                $id=$account->where(array('mid'=>$mid))->field('status')->save($info);
                if($id){
                    $this->success('支付账户冻结成功');
                }else{
                    $this->error('支付账户冻结失败');
                }
            }else{
                $this->error('操作失败');
            }
        }else{
            $this->display('Member_Money');
        }
    }

    //连接支付平台;
    public function ebank(){
        $money=I('post.money');
        $remark=I('post.remark');
        $pay=I('post.pay');
        if($money && $remark && $pay){
            $this->assign('money',$money);
            $this->assign('remark',$remark);
            $this->assign('pay',$pay);
            $this->display('Member_Money_Pay');
        }else{
            $this->redirect('Member/recharge');
        }
    }

    //查看充值记录;
    public function chargeRecord(){
        $mid=session('mid');
        $recharge=M('Account_recharge');
        $count=$recharge->where(array('mid'=>$mid))->count();
        $page=new Page($count,5);
        $show=$page->show();
        $list=$recharge->where(array('mid'=>$mid))->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->assign('firstRow',$page->firstRow);
        $this->assign('curPage',ceil(($page->firstRow+1)/5));
        $this->assign('list',$list);
        $this->display('Member_Money_ChargeRecord');
    }

    //立即充值;
    public function imediate(){
        if(IS_AJAX){
            $mid=session('mid');
            $recharge=M('Account_recharge');
            $account=M('Account');
            //开启事务;
            $recharge->startTrans();
            $rechargeInfo=$recharge->where(array('mid'=>$mid))->order('id desc')->find();
            $accountInfo=$account->where(array('mid'=>$mid))->find();
            if($rechargeInfo && $accountInfo){
                $data['rechargemoney']=I('post.money');
                $data['rechargetime']=time();
                $data['rechargesum']=$rechargeInfo['rechargesum']+I('post.money');
                $data['mid']=$mid;
                $info['balance']=$accountInfo['balance']+I('post.money');
                $info['remark']=I('post.remark');
                $info['time']=time();
                //事务同时操作;
                if(!$recharge->add($data)){
                    $recharge->rollback();
                }
                if(!$account->where(array('mid'=>$mid))->save($info)){
                    $recharge->rollback();
                }
                //事务提交;
                if($recharge->commit()){
                    $this->success('充值成功');
                }else{
                    $this->error('充值失败');
                }
            }elseif(!$rechargeInfo && !$accountInfo){
                $data['rechargemoney']=I('post.money');
                $data['rechargetime']=time();
                $data['rechargesum']=I('post.money');
                $data['mid']=$mid;
                $info['balance']=I('post.money');
                $info['time']=time();
                $info['mid']=$mid;
                $info['remark']=I('post.remark');
                //事务同时操作;
                if(!$recharge->add($data)){
                    $recharge->rollback();
                }
                if(!$account->add($info)){
                    $recharge->rollback();
                }
                //事务提交;
                if($recharge->commit()){
                    $this->success('充值成功');
                }else{
                    $this->error('充值失败');
                }
            }else{
                $this->error('充值失败');
            }
        }else{
            $this->display('Member/ebank');
        }
    }

    //立即提取现金操作;
    public function drawcash(){
        if(IS_AJAX){
            $paypwd=trim(I('post.paypwd'));
            $money=trim(I('post.money'));
            $mid=session('mid');
            $where['id']=$mid;
            $where['paypwd']=md5($paypwd);
            //判断支付密码是否正确;
            $res=M('User')->where($where)->find();
            if($paypwd && $res) {
                //判断提现的金额;
                if (is_numeric($money) && $money > 0) {
                    $cash = M('Account_cash');
                    $account = M('Account');
                    $cashInfo = $cash->where(array('mid' => $mid))->order('id desc')->find();
                    $accountInfo = $account->where(array('mid' => $mid))->find();
                    //只有账户总表存在以及同时余额大于提现额度,才能进行提现操作;
                    if ($accountInfo && $accountInfo['balance'] >= $money) {
                        //查看资金账户是否被冻结;
                        if ($accountInfo['status'] == 1) {
                            //开启事务;
                            $cash->startTrans();
                            //分两种情况,是否有过体现记录;
                            if ($cashInfo) {
                                //有过提现记录,主表更新,提现表插入以及更新;
                                $data['cashmoney'] = $money;
                                $data['cashtime'] = time();
                                $data['cashsum'] = $cashInfo['cashsum'] + $money;
                                $data['mid'] = $mid;
                                $info['balance'] = $accountInfo['balance'] - $money;
                                $info['time'] = time();
                                //事务同时操作;
                                if (!$cash->add($data)) {
                                    $cash->rollback();
                                }
                                if (!$account->where(array('mid' => $mid))->save($info)) {
                                    $cash->rollback();
                                }
                                //事务提交;
                                if ($cash->commit()) {
                                    $this->success('提现成功');
                                } else {
                                    $this->error('提现失败');
                                }
                            } else {
                                //没有提现记录,主表更新,体现表插入;
                                $data['cashmoney'] = $money;
                                $data['cashtime'] = time();
                                $data['cashsum'] = $money;
                                $data['mid'] = $mid;
                                $info['balance'] = $accountInfo['balance'] - $money;
                                $info['time'] = time();
                                //事务同时操作;
                                if (!$cash->add($data)) {
                                    $cash->rollback();
                                }
                                if (!$account->where(array('mid' => $mid))->save($info)) {
                                    $cash->rollback();
                                }
                                //事务提交;
                                if ($cash->commit()) {
                                    $this->success('提现成功');
                                } else {
                                    $this->error('提现失败');
                                }
                            }
                        } else {
                            $this->error('你的资金账户被冻结');
                        }
                    } else {
                        $this->error('你的余额不足');
                    }
                } else {
                    $this->error('你输入的金额不正确');
                }
            }else{
                $this->error('支付密码错误');
            }
        }else{
            $this->display('Member_Money_drawcash');
        }
    }

    //查看取现记录;
    public function cashRecord(){
        $mid=session('mid');
        $cash=M('Account_cash');
        $count=$cash->where(array('mid'=>$mid))->count();
        $page=new Page($count,5);
        $show=$page->show();
        $list=$cash->where(array('mid'=>$mid))->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->assign('firstRow',$page->firstRow);
        $this->assign('curPage',ceil(($page->firstRow+1)/5));
        $this->assign('list',$list);
        $this->display('Member_Money_cashRecord');
    }

    //查看消费记录;
    public function tradeRecord(){
        $mid=session('mid');
        $trade=M('Account_trade');
        $count=$trade->where(array('mid'=>$mid))->count();
        $page=new Page($count,5);
        $show=$page->show();
        $list=$trade->where(array('mid'=>$mid))->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('page',$show);
        $this->assign('firstRow',$page->firstRow);
        $this->assign('curPage',ceil(($page->firstRow+1)/5));
        $this->assign('list',$list);
        $this->display('Member_Money_tradeRecord');
    }

    //分销中心中我的会员
    public function myMember(){
        $user=M('User');
        $userNum=$user->count();
        $order1=$user->where(array('memberorder'=>1))->count();
        $order2=$user->where(array('memberorder'=>2))->count();
        $order3=$user->where(array('memberorder'=>3))->count();
        $myorder=$user->where(array('username'=>session('mname')))->field('memberorder')->find();
        //print_r($myorder);
        $this->assign('myorder',$myorder['memberorder']);
        $this->assign('order1',$order1);
        $this->assign('order2',$order2);
        $this->assign('order3',$order3);
        $this->assign('userNum',$userNum);


        $this->display('Member_Member');
    }

}
