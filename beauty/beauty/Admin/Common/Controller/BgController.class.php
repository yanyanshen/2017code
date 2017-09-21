<?php
namespace Admin\Common\Controller;
use Think\Auth;
use Think\Controller;
class BgController extends Controller{
    public function __construct(){
        parent::__construct();
       if(!session('aid')) {
           $this->redirect('Login/Login');
       }/*else{
           $auth=new Auth();
           $rule_name=MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
           $result=$auth->check($rule_name,session('aid'));
           if(!$result){
               $this->error('你没有权限访问');
           }
       }*/
    }
}

