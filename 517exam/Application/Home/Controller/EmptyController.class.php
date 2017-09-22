<?php
namespace Home\Controller;
use Think\Controller;
class EmptyController extends Controller{
    public function index(){
        //根据当前的控制器名来判断
        $controller=CONTROLLER_NAME;
//        $this->show('此控制器'.$controller."不存在");
        $this->show('loading...');
    }
    public function _empty(){
        $action=ACTION_NAME;
//        $this->show('此方法'.$action.'不存在');
        $this->show('loading...');
    }
}