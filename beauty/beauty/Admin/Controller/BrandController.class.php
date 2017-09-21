<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;
use Think\Upload;
class BrandController extends BgController{
    public function index(){
        //遍历商品到页面
             if($_GET['chaXun']){
            $where['bname']=array('like',"%{$_GET['chaXun']}%");
             }else{
                 $where='';
             }
            $Brand=M('Brands');
            $count=$Brand->where($where)->count();//查询记录总数
            $Page=new Page($count,5);//实例化分页类，传入总记录数和每页显示的记录数
            $show=$Page->show();//分页显示
            $nowPage=ceil(($Page->firstRow+1)/5);
            //进行分页数据查询，注意limit方法的参数要使用Page类的属性
            $BrandInfo = $Brand->where($where)->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
           //print_r($BrandInfo);
            $this->assign('count', $count);
            $this->assign('firstRow', $Page->firstRow);
            $this->assign('BrandInfo', $BrandInfo);
            $this->assign('nowPage', $nowPage);
            $this->assign('Page',$show);// 赋值分页输出
            $this->display('list');
    }

    public function upData(){
        if(IS_AJAX) {
            $Brand = M('Brands');
            $id =I('post.id');
            $data = $Brand->where(array('id'=>$id))->field('status')->find();
            $data['status'] = ($data['status'] == 0) ? 1 : 0;
            $up = $Brand->where(array('id'=>$id))->field('status')->save($data);
            if ($up) {
                $this->success('品牌状态更新成功 ');
            } else {
                $this->success('品牌状态更新失败');
            }
        }else{
            $this->index();
        }

    }

}