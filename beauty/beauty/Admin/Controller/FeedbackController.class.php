<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;
class FeedbackController extends BgController{
    /*后台活动发布中的活动列表*/
    public function index(){
       if (IS_GET) {
           if(I('get.time1')&&I('get.time2')){
               $time1=strtotime(I('get.time1'));
               $time2=strtotime(I('get.time2'));
               $where['backtime']=array('between',array($time1,$time2));
           }elseif(I('get.time2')){
               $time2=strtotime(I('get.time2'));
               $where['backtime']=array('lt',$time2);
           }else if(I('get.time1')){
               $time1=strtotime(I('get.time1'));
               $where['backtime']=array('gt',$time1);
           }

       } else {
            $where = '';
        }
        $backObj=D('userfeedback');
        $count= $backObj
            ->where($where)
            ->count();// 查询满足要求的总记录数
        $Page       = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list=$backObj
            ->where($where)
            ->limit($Page->firstRow.','.$Page->listRows)
            ->order('backtime desc')
            ->select();
        $this->assign('count',$count);
        $this->assign('time1',$time1);
        $this->assign('time2',$time2);
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display('list'); // 输出模板
    }

    public function deleteFeed(){
        $id=I('get.id');
        $where['id']=$id;
        if( M('userfeedback')->where($where)->delete()){
            $this->success();
        }else{
            $this->error();
        }

    }

    public function see(){
        $backInfo= M('userfeedback')->where(array('id'=>I('id')))->find();
        $this->assign('backInfo',$backInfo);
        $this->display('see');
    }

}