<?php
namespace Home\Controller;
use Think\Controller;
class ChangPasswordController extends Controller{
    public function isSetUserName(){
        $username=I('post.username');
        if(!M('User')->where(array('username'=>$username))->find()){
            echo  'false';
        }else{
            echo 'true';
        }
    }

    public  function ChangPassword(){
        if(IS_AJAX){
            $email=trim(I('post.email'));
            $username=trim(I('post.username'));
            $password=trim(md5(I('post.password')));
            $User=M('User');
            $db=$User->where(array('username'=>$username,'email'=>$email))->find();
              if($db){
                  $data=array('password'=>$password);
                  $User->where(array('id'=>$db['id']))->setField($data);
                  $this->success('修改成功！');
              }else{
                  $this->error('密码修改失败');
              }

            }else{
            $this->display('ChangPassword');
        }
    }

    public function index(){
        $this->display('ChangPassword');
    }
}