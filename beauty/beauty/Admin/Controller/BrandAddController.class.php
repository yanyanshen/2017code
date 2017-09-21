<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;
class BrandListController extends BgController{
    public function UserList(){
        $get=strtolower($_GET['chaXun']);
        if($get){
            $where['username']=array('like',"%$get%");
        }else{
            $where='';
        }
        $User=M('User');
        //$BrandInfo = $Brand->select();
        $count=$User->where($where)->count();//查询记录总数
        $Page=new Page($count,5);//实例化分页类，传入总记录数和每页显示的记录数
        $show=$Page->show();//分页显示
        $nowPage=ceil(($Page->firstRow+1)/2);
        //进行分页数据查询，注意limit方法的参数要使用Page类的属性
        $UserInfo = $User->where($where)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('count', $count);
        $this->assign('UserInfo', $UserInfo);
        $this->assign('nowPage', $nowPage);
        $this->assign('Page',$show);// 赋值分页输出
        $this->display('User/list');
    }


    public function UserAdd(){

        $this->display('User/add');
    }
}