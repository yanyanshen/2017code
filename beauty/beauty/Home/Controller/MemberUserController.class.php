<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class MemberUserController extends Controller{
    /*链接用户信息的index方法*/
    public function index(){
        $session=session('mname');
        $user=M('User');
        $where['username']=$session;
        $data=$user->field('vipname')->where($where)->join('beauty_user_vipinfo ON beauty_user.memberorder=beauty_user_vipinfo.id ')->find();
        $vip=$data['vipname'];
        $this->assign('vip',$vip);
        $this->display('User/Member_User');
    }
}