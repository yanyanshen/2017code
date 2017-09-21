<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
class AdminNavController extends BgController {
    //菜单列表
    public function index(){
        $nav=D('AdminNav');
        $navList=$nav->getNavList();

        $this->assign('navList',$navList);

        $this->display('list');
    }
   //添加菜单
    public function add(){
        if(IS_AJAX){
            $nav=D('AdminNav');
            $data=$nav->create();
            if($data){
                $nid=$nav->addNav($data);
                if($nid){
                    $this->success('菜单添加成功',U('index'));
                }else{
                    $this->error('菜单添加失败');
                }
            }else{
                $this->error($nav->getError());
            };
        }else{
            if(I('get.pid')){
               $this->assign('pid',I('get.pid'));
               $this->assign('pname',I('get.pname'));
            }
            $this->display();
        }
    }

    //删除菜单
    public function del(){
        $id=I('post.id');
        $nav=M('AdminNav');
        $info=$nav->where(array('id'=>$id))->find();
        if($info){
            $where['path']=array('like',"$id%");
            $pathInfo=$nav->where($where)->select();
            if($pathInfo){
                if($nav->where($where)->delete()){
                    $this->success('删除成功');
                }else{
                    $this->error('删除失败');
                }
            }else{
                if($nav->where(array('id'=>$id))->delete()){
                    $this->success('删除成功');
                }else{
                    $this->error('删除失败');
                }
            }
        }else{
            $this->error('没有查到数据');
        }
    }

    //编辑菜单
    public function edit(){
        if(IS_AJAX){
            $id=I('post.id');
            $nav=M('AdminNav');
            $data['navname']=I('post.navname');
            $data['navurl']=I('post.navurl');
            $info=$nav->where(array('id'=>$id))->find();
            if($info){
                if($nav->where(array('id'=>$id))->save($data)){
                    $this->success('编辑成功');
                }else{
                    $this->error('编辑失败');
                }
            }else{
                $this->error('没有查到数据');
            }
        }else{
            $id=I('get.id');
            $nav=M('AdminNav');
            $navInfo=$nav->where(array('id'=>$id))->find();
            $this->assign('id',$id);
            $this->assign('navname',$navInfo['navname']);
            $this->assign('navurl',$navInfo['navurl']);
            $this->display('edit');
        }
    }

    //设置菜单优先级
    public function setPriority(){
        if(IS_AJAX){
            $nav=D('AdminNav');
            $data=$nav->create();
            if($data){
                $row=$nav->setPriority($data);
                if($row){
                    $this->success('优先级更新成功');
                }
            }else{
                $this->error($nav->getError());
            }
        }

    }

}