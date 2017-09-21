<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Image;
use Think\Page;
use Think\Upload;

class AdvertiseController extends BgController{
    public function index(){
        //处理搜索;
        if(IS_GET){
            $keywords=I('get.keywords');
            $where['title']=array('like',"%$keywords%");
        }else{
            $where='';
        }
        //处理分页;
        $advertise=M('Advertise');
        $count=$advertise->where($where)->count();
        $page=new Page($count,5);
        $show=$page->show();
        $list=$advertise->where($where)->limit($page->firstRow.','.$page->listRows)->order('id desc')->select();
        $this->assign('page',$show);
        $this->assign('keywords',$keywords);
        $this->assign('count',$count);
        $this->assign('curPage',ceil(($page->firstRow+1)/5));
        $this->assign('firstRow',$page->firstRow);
        $this->assign('list',$list);
        $this->display('list');
    }


    //添加广告操作;
    public function add(){
        if (IS_POST) {
            $advertise = M('Advertise');
            $data['title'] = trim(I('param.title'));
            $data['position'] = I('param.position');
            $data['detail'] = trim(I('param.content'));
            //判断上传的信息;
            if (I('param.title') && I('param.position') > 0 && I('param.content')) {
                $data['addtime'] = time();
                //把数据添加到数据库;
                if ($id = $advertise->add($data)) {
                    //处理图片上传;
                    $upload = new Upload();
                    $upload->maxSize = 3145728;
                    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                    $upload->rootPath = './Uploads/Advertises/';
                    //创建上传文件夹;
                    if (!file_exists($upload->rootPath)) {
                        mkdir($upload->rootPath);
                    }
                    //上传操作;
                    $info = $upload->upload();
                    if($info){
                        foreach($info as $file){
                            //获取图片文件路径;
                            $filename='./Uploads/Advertises/'.$file['savepath'].$file['savename'];
                            //生成缩略图;
                            $image=new Image();
                            if(I('param.position')==1){
                                $thumb='/Uploads/Advertises/1/'.$file['savepath'].$file['savename'];
                                $image->open($filename)->thumb(1200,300)->save($thumb);
                            }elseif(I('param.position')==2){
                                $thumb='/Uploads/Advertises/2/'.$file['savepath'].$file['savename'];
                                $image->open($filename)->thumb(1200,460)->save($thumb);
                            }elseif(I('param.position')==3){
                                $thumb='/Uploads/Advertises/3/'.$file['savepath'].$file['savename'];
                                $image->open($filename)->thumb(300,320)->save($thumb);
                            }elseif(I('param.position')==4){
                                $thumb='/Uploads/Advertises/4/'.$file['savepath'].$file['savename'];
                                $image->open($filename)->thumb(100,100)->save($thumb);
                            }else{
                                $thumb='/Uploads/Advertises/5/'.$file['savepath'].$file['savename'];
                                $image->open($filename)->thumb(100,100)->save($thumb);
                            }
                            $data['picurl']=$file['savepath'];
                            $data['picname']=$file['savename'];
                            if($advertise->where(array('id'=>$id))->field('picurl,picname')->save($data)){
                                $this->success('广告添加成功,请继续添加');
                            } else {
                                $this->error('广告添加失败');
                            }
                        }
                    } else {
                        $upload->getError();
                    }
                }
            } else {
                $this->error('上传广告不能为空');
            }
        } else {
            $this->display('add');
        }
    }

    //更改广告状态;
    public function operate(){
        if(IS_AJAX){
            $advertise=M('Advertise');
            $data['id']=I('post.id');
            //查找所点击的广告信息;
            $data=$advertise->where(array('id'=>$data['id']))->find();
            //更改广告状态;
            $data['status']=($data['status']==0)?1:0;
            $a=$advertise->where(array('id'=>$data['id']))->field('status')->save($data);
            if($a){
                $this->success('广告状态更改成功');
            }else{
                $this->error('广告状态更改失败');
            }
        }else{
            $this->display('list');
        }
    }

    //删除广告操作;
    public function delAdvertise(){
        if(IS_AJAX){
            $advertise=M('Advertise');
            $data['id']=I('post.id');
            //查找所点击的广告信息;
            $data=$advertise->where(array('id'=>$data['id']))->find();
            //删除广告操作;
            if($data){
                if($advertise->where(array('id'=>$data['id']))->delete()){
                    $this->success('删除广告成功');
                }else{
                    $this->error('删除广告失败');
                }
            }else{
                $this->error('删除的广告不存在');
            }
        }else{
            $this->display('list');
        }
    }

    //广告编辑操作;
    public function edit(){
        $id=I('get.id');
        $advertise=M('Advertise');
        $advertiseInfo=$advertise->where(array('id'=>$id))->find();
        $this->assign('id',$id);
        $this->assign('title',$advertiseInfo['title']);
        $this->assign('position',$advertiseInfo['position']);
        $this->assign('detail',$advertiseInfo['detail']);
        $this->assign('picurl',$advertiseInfo['picurl']);
        $this->assign('picname',$advertiseInfo['picname']);
        $this->display('edit');
    }

    //编辑更改广告操作;
    public function editChange(){
        if (IS_POST) {
            $advertise = M('Advertise');
            $id=I('param.id');
            $data['title'] = trim(I('param.title'));
            $data['position'] = I('param.position');
            $data['detail'] = trim(I('param.content'));
            //判断上传的信息;
            if (I('param.title') && I('param.position') && I('param.content')) {
                $data['addtime'] = time();
                //把数据更新到数据库;
                if ($advertise->where(array('id'=>$id))->field('title,position,detail,addtime')->save($data)) {
                    //处理图片上传;
                    $upload = new Upload();
                    $upload->maxSize = 3145728;
                    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
                    $upload->rootPath = './Uploads/Advertises/';
                    //上传操作;
                    $info = $upload->upload();
                    if($info){
                        foreach($info as $file){
                            //获取图片文件路径;
                            $data['picurl']=$file['savepath'];
                            $data['picname']=$file['savename'];
                            if($advertise->where(array('id'=>$id))->field('picurl,picname')->save($data)){
                                $this->success('广告编辑成功');
                            } else {
                                $this->error('广告编辑失败');
                            }
                        }
                    } else {
                        $this->success('广告编辑成功');
                    }
                }else{
                    $this->error('广告编辑失败');
                }
            } else {
                $this->error('上传广告不能为空');
            }
        } else {
            $this->display('add');
        }
    }
    
}







