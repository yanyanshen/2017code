<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
class LoginController extends Controller{
    public function login(){
        if(IS_AJAX){
            $admin=D('admin');
            $data=$admin->create();
            $data['username']=trim(I('post.username'));
            $data['password']=md5(trim(I('post.password')));
            //判断账号密码是否一致;
            $info=$admin->where($data)->find();
            if($info){
                //判断账号状态;
                if($info['status']==1) {
                    //更新数据;
                    $info['lastlogin'] = time();
                    $info['lastip'] = I("server.REMOTE_ADDR");
                    $info['online']=1;
                    $admin->where(array('id' => $info['id']))->field('lastlogin,lastip,online')->save($info);
                    //写入session;
                    session('aid', $info['id']);
                    session('username', I('post.username'));
                    $this->success('登陆成功');
                }else{
                    $this->error('你的账号被停权');
                }
            }else{
                $this->error('密码错误');
            }
        }else {
            $this->display();
        }
    }
    public function verify(){
        $config=array(
            'fontSize'=>80,
            'length'  =>2,
            'useCurve'=>false,
            'useNoise'=>false,
            'codeSet' =>'123456789'
        );
        $verify=new Verify($config);
        $verify->entry();
    }
    public function chkVerify(){
        $verify=new Verify();
        $code=I('post.verify');
        if($verify->check($code,'')){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    public function chkAdmin(){
        $username=trim(I('post.username'));
        $info=M('admin')->where(array('username'=>$username))->find();
        if($info){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    /*public function Login(){
        if(IS_AJAX){
            $admin=D('Pay');
            $data=$admin->create();
            $data['username']=trim(I('post.username'));
            $data['password']=md5(trim(I('post.password')));
            //判断账号密码是否一致;
            $info=$admin->where($data)->find();
            if($info){
                //判断账号的登录状态;
                if($info['online']==0){
                    //判断账号状态;
                    if($info['status']==1) {
                        //更新数据;
                        $info['lastlogin'] = time();
                        $info['lastip'] = I("server.REMOTE_ADDR");
                        $info['online']=1;
                        $admin->where(array('id' => $info['id']))->field('lastlogin,lastip,online')->save($info);
                        //写入session;
                        session('aid', $info['id']);
                        session('username', I('post.username'));
                        $this->success('登陆成功');
                    }else{
                        $this->error('你的账号被停权');
                    }
                }else{
                    $this->error('账号已登录');
                }
            }else{
                $this->error('密码错误');
            }
        }else {
            $this->display();
        }
    }*/

    //忘记密码;
    public function forgetPwd(){
        if(IS_AJAX){
            $admin=D('admin');
            $data['username']=trim(I('post.username'));
            $data['mobile']=md5(trim(I('post.mobile')));
            $info=$admin->where($data)->find();
            if($info){
                $info['password']=md5(trim(I('post.password')));
                if($admin->where(array('id'=>$info['id']))->field('password')->save($info)){
                    $this->success('修改密码成功');
                }else{
                    $this->error('修改密码失败');
                }
            }else{
                $this->error('没有查到数据');
            }
        }else{
            $this->display('forgetPwd');
        }
    }

    //验证手机号;
    public function chkMobile(){
        $where['mobile']=md5(trim(I('post.mobile')));
        $admin=M('admin');
        $info=$admin->where($where)->find();
        if($info){
            echo 'true';
        }else{
            echo 'false';
        }
    }
}