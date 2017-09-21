<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller{
    public function index(){
        $this->display();
    }

    /**
     * geetest生成验证码
     */
    public function geetest_show_verify(){
        $geetest_id=C('GEETEST_ID');
        $geetest_key=C('GEETEST_KEY');
        $geetest=new \Org\Beauty\Geetest($geetest_id,$geetest_key);
        $user_id = "test";
        $status = $geetest->pre_process($user_id);
        $_SESSION['geetest']=array(
            'gtserver'=>$status,
            'user_id'=>$user_id
        );
        echo $geetest->get_response_str();
    }

    /**
     * geetest submit 提交验证
     */
    public function geetest_submit_check(){
        $data=I('post.');
        if ($this->geetest_chcek_verify($data)) {
            echo 'true';
        }else{
            echo 'false';
        }
    }

    /**
     * geetest ajax 验证
     */
    public function geetest_ajax_check(){
        $data=I('post.');
        echo intval($this->geetest_chcek_verify($data));
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


    /**
     * 发送邮件
     */
    public function send_email(){
        $email=I('post.email');
        $title=I('post.title');
        $content=I('post.content');
        $content=$content."<a href='http://www.baidu.com'>点此激活<a>";
        $result=send_email($email,$title,$content);
        if ($result['error']==1) {
            die('邮件发送失败');
        }else{
            echo '邮件发送成功';
        }

    }


}