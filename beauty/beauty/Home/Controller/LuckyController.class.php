<?php
namespace Home\Controller;
use Think\Controller;
class LuckyController extends Controller
{
    public function index()
    {
        $mid=session('mid');
        $signInfo=M('Sign')->where(array('mid'=>session('mid')))->find();
        $date['luckytag']=0;
        if(time()>$signInfo['stoptime']){
            M('Sign')->execute("update beauty_sign set luckytag=0 where  mid=$mid");
        }
        $this->assign('luckytag',$signInfo['luckytag']);
        $this->display('lucky');
    }
//为登陆显示的页面
    public function login()
    {
        $this->display('Login');
    }

    public function lucky()
    {
        $prize = I('get.prize');
        $message = I('get.message');
        $sign = M('Sign')->where(array('mid' => session('mid')))->find();
        $date['stoptime']=strtotime(date('Y-m-d',time()))+ 86400;
        if($sign['luckytag']==3){
            $str='今日机会已用完，明天再来吧！！';
        }else{
            if ($message == '1') {
                if ($prize == '100金币') {
                    if (!$sign) {
                        $date['mid'] = session('mid');
                        $date['Sign'] = 100;
                        $date['luckytag'] = 1;
                        M('Sign')->add($date);
                    } else {
                        M('Sign')->where(array('mid' => session('mid')))->save($date);
                            M('Sign')->where(array('mid' => session('mid')))->setInc('Sign', 100);
                            M('Sign')->where(array('mid'=>session('mid')))->setInc('luckytag',1);
                    }
                    $str = '恭喜您获得100金币';
                }
                if ($prize == '20金币') {
                    if (!$sign) {
                        $date['mid'] = session('mid');
                        $date['Sign'] = 20;
                        $date['luckytag'] = 1;
                        M('Sign')->add($date);
                    } else {
                        M('Sign')->where(array('mid' => session('mid')))->save($date);
                            M('Sign')->where(array('mid' => session('mid')))->setInc('Sign',20);
                            M('Sign')->where(array('mid'=>session('mid')))->setInc('luckytag',1);
                    }
                    $str = '恭喜您获得20金币';
                }
                if ($prize == '2金币') {
                    $sign = M('Sign')->where(array('mid' => session('mid')))->select();
                    if (!$sign) {
                        $date['mid'] = session('mid');
                        $date['Sign'] = 2;
                        $date['luckytag'] = 1;
                        M('Sign')->add($date);
                    } else {
                        M('Sign')->where(array('mid' => session('mid')))->save($date);
                            M('Sign')->where(array('mid' => session('mid')))->setInc('Sign',2);
                            M('Sign')->where(array('mid'=>session('mid')))->setInc('luckytag',1);
                    }
                    $str = '恭喜您获得2金币';
                }
            } else {
                if ($prize == '0') {
                    M('Sign')->where(array('mid' => session('mid')))->save($date);
                    M('Sign')->where(array('mid'=>session('mid')))->setInc('luckytag',1);
                    $str = '没有金币也没有关系，开心最重要了';
                }
            }
        }

//        $sign1=M('Sign')->where(array('mid' => session('mid')))->find();
//        $arr=array();
//        $arr['str']=$str;
//        $arr['sign1']=3-$sign1['luckytag'];
        $this->success($str);

    }
}