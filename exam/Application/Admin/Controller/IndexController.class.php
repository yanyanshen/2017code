<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
class IndexController extends BgController {
    public function index(){
        $this->display('index');
    }
    public function main(){
        $aid=session('aid');
        if($aid){
            $admin=M('Admin');
            $userInfo=$admin->where(array('id'=>$aid))->field('username,lastlogin,lastip')->select();
            $this->assign('userInfo',$userInfo);
            $this->display('main');
        }
        $this->display('main');

    }
    public function footer(){
        $this->display('public/footer');
    }
    public function top(){
        $this->display('public/top');
    }
    public function left(){
//        获取左侧栏菜单
        $nav=D('AdminNav');
        $navList=$nav->getNavTree();
        $this->assign('navList',$navList);
        $this->display('public/left');
    }



}