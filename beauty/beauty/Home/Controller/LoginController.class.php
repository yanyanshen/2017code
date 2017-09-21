<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Home\Model\AdminModel;
class LoginController extends Controller {
//判断验证码是否正确
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


      public function Login(){
        $this->display('Login');
    }

    public function doLogin(){
      //检验验证码是否通过
       /* $geetest_id=C('GEETEST_ID');
        $geetest_key=C('GEETEST_KEY');
        $geetest=new \Org\Beauty\Geetest($geetest_id,$geetest_key);
        $code_flag=false;
        $user_id=$_SESSION['geetest']['user_id'];
        if ($_SESSION['geetest']['gtserver']==1) {
            $result=$geetest->success_validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode'], $user_id);
            if ($result) {
                $code_flag=true;
            } else{
                $this->error('请拖动验证码至正确位置');
            }
        }else{
            if ($geetest->fail_validate($_POST['geetest_challenge'],$_POST['geetest_validate'],$_POST['geetest_seccode'])) {
                $code_flag= true;
            }else{
                $this->error('请拖动验证码至正确位置');
            }
        }*/


        if(IS_AJAX){
        $m=M('User');
        $username=trim($_POST['username']);
        $password=md5($_POST['password']);
        $where['username']=$username;
        $where['password']=$password;
        $data=$m->field('id,username,password')->where($where)->find();
        $mid=$data['id'];
        if($data) {
            session('mid', $mid);
            session('mname', $username);
            $time['lastlogin'] = time();
            $m->where($where)->save($time);
            //周贝贝的session('mycart1')开始
            if(session('mycart1')){
                $mid=session('mid');
                foreach(session('mycart1') as $v){
                    $v['mid']=$mid;
                    $gid=$v['gid'];
                    $ml=$v['ml'];
                    //判断购物车数据表中是否存在该用户添加购物车的数据信息
                    $res1=M('Cart')->field('gid,buynum,sumprice,ml')->where(array('mid'=>$mid,'gid'=>$gid,'ml'=>$ml))->find();
                        if($res1){
                            $buynum=$res1['buynum']+$v['buynum'];
                            $sumprice=$res1['sumprice']+$v['sumprice'];
                            $cartwhere['mid']=$mid;
                            $cartwhere['gid']=$res1['gid'];
                            $cartwhere['ml']=$res1['ml'];
                            M('Cart')->where($cartwhere)->save(array('buynum'=>$buynum,'sumprice'=>$sumprice));
                        }else{
                            $res2=M('Cart')->where(array('mid'=>$mid))->add($v);
                        }
                    if($res2){
                        session('mycart1',null);
                    }
                }
            }
            //周贝贝的session('mycart1')结束
                if(session('url1')){
                    $url1=session('url1');
                    session('url1',null);
                    $this->success($url1);
                }elseif(session('URL')){
                    $url=session('URL');
                    session('URL',null);
                    $this->success($url);
                }elseif(session('URL2')){
                    $url=session('URL2');
                    session('URL2',null);
                    $this->success($url);
                }
                else{
                    $a=U('Index/index');
                    $this->success($a);
                    }
            }else{
                $this->error('用户名或密码错误');
            }
        }else{
        $this->display('Login');
        }
    }

       public function LoginOut(){
               session(null);
               $this->success('退出成功');
           //$this->display('Index/index');
       }


    /**
     * geetest检测验证码
     */
    public function geetest_chcek_verify($data){
        $geetest_id=C('GEETEST_ID');
        $geetest_key=C('GEETEST_KEY');
        $geetest=new \Org\Beauty\Geetest($geetest_id,$geetest_key);
        $user_id=$_SESSION['geetest']['user_id'];
        if ($_SESSION['geetest']['gtserver']==1) {
            $result=$geetest->success_validate($data['geetest_challenge'], $data['geetest_validate'], $data['geetest_seccode'], $user_id);
            if ($result) {
                return true;
            } else{
                return false;
            }
        }else{
            if ($geetest->fail_validate($data['geetest_challenge'],$data['geetest_validate'],$data['geetest_seccode'])) {
                return true;
            }else{
                return false;
            }
        }
    }


}