<?php
namespace Mobile\Controller;
use Think\Controller;
class RegisterController extends Controller {


    public function index()
    {

        if (IS_AJAX) {
            $member = D('User');
            //$date=$member->create();
            $date = $_POST;       // print_r($date);
            if ($date) {
                $data['username'] = $date['mobile'];
                $data['phone'] = $date['mobile'];
                $data['email'] = $date['email'];
                $data['password'] = md5($date['password']);
                $data['regtime'] = time();
                //$data['email']=trim($data['email']);
                $mid = $member->add($data);
                //print_r($mid);
                if ($mid) {
                    session('mid', $mid);
                    session('mname', trim(I('post.mobile')));
                    $where['id'] = $mid;
                    $member->where($where)->setInc('score', 10);
                    $date['mid'] = session('mid');
                    $date['status'] = 1;
                    //print_r($date);
                    M('Packet')->add($date);
                    $this->success('用户注册成功');
                } else {
                    $this->error('用户注册失败');
                }
            } else {
                $this->error($member->getError());
            }
        } else {
            $this->display('Register/reg_mobile');
        }

    }
    //验证手机号是否被注册
        public function chkUserName(){
            $username=I('post.mobile');
            if(M('User')->where(array('username'=>$username))->find()){
                echo  'false';
            }else{
                echo 'true';
            }
        }

    public function email(){
        if(IS_AJAX){
            $member=D('User');
            $date=$_POST;
            //print_r($date);
            if($date){
                $data['username']=$date['email'];
                $data['password']=md5($date['password']);
                $data['email']=$date['email'];
                $data['phone']=$date['mobile'];
                $date['regtime']=time();
                //$data['email']=trim($data['email']);
                $mid=$member->add($date);
                //print_r($mid);
                if($mid){
                    session('mid',$mid);
                    session('mname',trim(I('post.email')));
                    $where['id']=$mid;
                    $member->where($where)->setInc('score',10);
                    $date['mid']=session('mid');
                    $date['status']=1;
                    //print_r($date);
                    M('Packet')->add($date);
                    $this->success('用户注册成功');
                }else{
                    $this->error('用户注册失败');
                }
            }else{
                $this->error($member->getError());
            }
        }else{
            $this->display('Register/reg_email');
        }
    }



    public  function ChangPassword(){
        if(IS_AJAX){
            $email=trim(I('post.email'));
            $username=trim(I('post.phone'));
            $password=trim(md5(I('post.newpassword')));
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

public function changpwd(){
   $this->display('Register/reg_pwd');
}
}