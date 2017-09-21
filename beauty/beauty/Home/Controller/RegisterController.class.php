<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Home\Model\AdminModel;
class RegisterController extends Controller {
    //生成验证码
    public function verify(){
        $config =    array(
            'fontSize'    =>    30,    // 验证码字体大小
            'length'      =>    2,     // 验证码位数
            //'useNoise'    =>    false, // 关闭验证码杂点
           // 'useCurve'   =>     false, //关闭验证码干扰曲线
            //'imageW'   =>     80, //关闭验证码干扰曲线
            // 'imageH'   =>     40, //关闭验证码干扰曲线
            'bg'        =>  array('166','166','166'),
            'codeSet'     => '1234567890'

        );
        $verify =new Verify($config);
        return $verify->entry();
    }
   //验证用户名是否存在
    public function chkUserName(){
        $username=I('post.username');
        if(M('User')->where(array('username'=>$username))->find()){
            echo  'false';
        }else{
            echo 'true';
        }
    }


//验证验证码是否正确
    public function chkVerify()
    {
        $verify = new Verify();
        $code = I('post.verify');
        if ($verify->check($code, '')) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
    //通过验证写入数据库
    public function register(){
        if(IS_POST){
            $member=D('User');
            $data=$member->create();
            if($data){
                $data['password']=md5($data['password']);
                $data['regtime']=time();
                //$data['email']=trim($data['email']);
                $mid=$member->add($data);
                //print_r($mid);
                if($mid){
                    session('mid',$mid);
                    session('mname',trim(I('post.username')));
                    $where['id']=$mid;
                    $member->where($where)->setInc('discount',10);
                    $date['mid']=session('mid');

                    $date['status']=1;
                     M('Packet')->add($date);
                    $this->success('用户注册成功');
                }else{
                    $this->error('用户注册失败');
                }
            }else{
                $this->error($member->getError());
            }
        }else{
            $this->display('registered');
        }
    }
    public function login(){
        $this->display('registered');
    }
}