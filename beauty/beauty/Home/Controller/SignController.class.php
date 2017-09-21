<?php
namespace Home\Controller;
use Think\Controller;
class SignController extends Controller{
        public function sign(){
            $mid=session('mid');
            $signInfo=M('Sign')->where(array('mid'=>session('mid')))->find();
            $date['signtag']=0;
            if(time()>$signInfo['stopsign']){
                M('Sign')->execute("update beauty_sign set signtag=0  where mid=$mid");
            }
            if($signInfo['signcount']<50){
                $day=50-$signInfo['signcount'];
                $daysign=3;
            }elseif($signInfo['signcount']>=50&&$signInfo['signcount']<200){
                $day=200-$signInfo['signcount'];
                $daysign=6;
            }elseif($signInfo['signcount']>=200&&$signInfo['signcount']<500){
                $day=500-$signInfo['signcount'];
                $daysign=10;
            }

            $sign=M('Sign')->where(array('mid'=>session('mid')))->find();
            $this->assign('signtag',$sign['signtag']);
            $a=M('user')->where(array('id'=>session('mid')))->find();
            $this->assign('imgpath',$a['imgpath']);
            $this->assign('imgname',$a['imgname']);
            $this->assign('day',$day);
            $this->assign('daysign',$daysign);
            $this->assign('sign',$sign);
            $this->display('sign');
    }


    public function addSign(){
//        print_r(I('checkedDay'));
        $mid=session('mid');
        $where['mid']=$mid;
        $sign=M('Sign')->where($where)->find();
//        $this->success(I('checkedDay'));
        if(!$sign){
            $date['mid']=session('mid');
            $date['sign']=1;
            $date['signcount']=1;
            $date['signtime']=time();
            $date['signtag']=1;
            $date['stoptime']=strtotime(date('Y-m-d', time()))+ 86400;
           M('sign')->where($where)->add($date);
            $sign['day']=date('d',$sign['signtime']);
            $this->success($sign);
        }else {
            if($sign['signtag']==0){
                if($sign['signcount']<50){
                    M('Sign')->where(array('mid' => session('mid')))->setInc('sign',1);
                }elseif($sign['signcount']>=50&&$sign['signcount']<200){
                    M('Sign')->where(array('mid' => session('mid')))->setInc('sign',3);
                }elseif($sign['signcount']>=200&&$sign['signcount']<500){
                    M('Sign')->where(array('mid' => session('mid')))->setInc('sign',6);
                }elseif($sign['signcount']>=500){
                    M('Sign')->where(array('mid' => session('mid')))->setInc('sign',10);
                }
                    M('Sign')->where(array('mid' => session('mid')))->setInc('signcount',1);
                    $date['signtag']=1;
                    $date['signtime']=time();
                    $date['stopsign']=strtotime(date('Y-m-d', time()))+ 86400;
                     M('sign')->where(array('mid' => session('mid')))->save($date);
                    $sign=M('sign')->where(array('mid' => session('mid')))->find();
                $sign['day']=date('d',$sign['signtime']);
                    $this->success($sign);
                } else {
                $sign['day']=date('d',$sign['signtime']);
                    $this->error($sign);
                }
        }
    }


    public function signCity(){
        $goods=M('golds')->where(array('show'=>1))->order('salenum desc')->limit(0,12)->select();
        $this->assign('goods',$goods);
        $sign=M('Sign')->where(array('mid'=>session('mid')))->find();
        $this->assign('sign',$sign);
        $this->display('signcity');
    }


    public function addOrder(){
        $signInfo=M('Sign')->where(array('mid'=>session('mid')))->find();
        $sign=$signInfo['sign'];
        if($sign<I('price')){
            $this->error(1);
        }else{
            M('Sign')->where(array('mid'=>session('mid')))->setDec('sign',I('price'));
            $orderno=A('Order')->uniqueStr();
            $date['orderno']=$orderno;
            $date['price']=I('price')/10;
            $date['create_time']=time();
            $date['mid']=session('mid');

            $lastid=M('order')->add($date);
            $ordergoods['oid'] = $lastid;
            $ordergoods['gid'] = I('gid');
            $ordergoods['buynum'] = 1;
            $ordergoods['price'] = I('price')/10;
//            $this->success($ordergoods);
            //向商品订单中插入
            if ($lastid) {
                //将商品信息写入商品订单表 首先得到提交上来的商品的订单信息
                $ordergoods['oid'] = $lastid;
                $ordergoods['gid'] = I('gid');
                $ordergoods['buynum'] = 1;
                $ordergoods['saleprice'] = I('price')/10;

                $res = M('Sign')->table('beauty_order_goods')->field('oid,gid,buynum,saleprice,ml')->add($ordergoods);
                if ($res) {
                    //显示订单页面的订单号和支付金额
                    $this->success($lastid);
                }
            }
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

    public function showOrder(){
        $oid=I('oid');
        $where['_string']="og.oid=o.id and g.id=og.gid and oid={$oid}";
        $gidInfo=M('Order_goods')->field('gid')->where(array('oid'=>$oid))->find();
        $typestr=M('gtype')->field('ml')->where(array('gid'=>$gidInfo['gid']))->find();
        $typearr=explode(',',$typestr['ml']);
        $ml=$typearr[0];
        $orderlist=M('order')
            ->table('beauty_order o,beauty_order_goods og,beauty_golds g ')
            ->field('g.id,g.imageurl,g.imagename,og.buynum,og.saleprice,g.goodsname,o.price')
            ->where($where)
            ->select();
        $orderlist[0]['ml']=$ml;
        $orderlist[0]['oid']=$oid;
        $this->assign('orderlist',$orderlist);
        $this->showaddress();
        $this->display('Order_payment3');
    }
}