<?php
namespace Mobile\Controller;
use Think\Controller;
class FeedbackController extends Controller {
    public function index()
    {
        if(session('mid')){
            $this->display('feedback');
        }else{
            $this->redirect('Login');
        }


    }

    public function send(){
        $textarea=I('textarea');
        $way=I('way');
        $info=M('user')->where(array('id'=>session('mid')))->find();

        if($textarea&&$way){
            $data['mname']=$info['username'];
            $data['idea']=$textarea;
            $data['mobile']=$way;
            $data['backtime']=time();
            if(!M('userfeedback')->where(array('idea'=>$textarea,'mobile'=>$way,'mname'=>$info['username']))->find()){
                M('userfeedback')->add($data);
                $this->success(1);
            }else{
                $this->success();
            }
        }else{
            $this->error();
        }

    }


    public function helplist(){
        $this->display('help_list');
    }
}