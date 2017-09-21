<?php
namespace Mobile\Controller;
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
        $this->display('sign1');
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
                $this->success($sign);
            } else {
                $this->error($sign);
            }
        }
    }



}