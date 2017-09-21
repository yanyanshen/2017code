<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Image;
use Think\Upload;
class AddBrandController extends Controller{
    public function add(){
        $this->display('Brand/add');
    }


    public function addbrands(){
        $brand = M('Brands');
        $date =$_POST;
        $upLode = new Upload();
        $upLode->mxaSize = 3145728;
        $upLode->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upLode->rootPath = './Upload/logo';
        $upLode->savePath = '';
        $info = $upLode->upload();
        if(!file_exists($upLode->rootPath)){
            mkdir($upLode->rootPath);
        }
        if (!$info) {
            $this->error($upLode->getError());
        } else {
            //生成缩略图
            $savePath=$info['rules']['savepath'];
            $saveName=$info['rules']['savename'];
            $image=new Image();
            $image->open('./Upload/logo'.$savePath.$saveName);
            $image->thumb(180,90)->save('./Upload/logo'.$savePath.$saveName);
            //添加到数据库
            $brandInfo['bname']=$date['catename'];
            $brandInfo['blogopath']=$info['rules']['savepath'];
            $brandInfo['blogoname']=$info['rules']['savename'];
            $brandInfo['addtime']=$date['time1'];
            $brandInfo['brandtype']=$date['brandtype'];
            $bid=$brand->add($brandInfo);
        }

        //print_r('./Upload/logo'.$savePath.$saveName);
        if($bid){
            $this->success('上传成功');
        }else{
            $this->error('上传失败');
        }
        /*   $this->display('Brand/add');*/
    }
//验证品牌是否已添加
    public function chkBname(){
        $bname=I('post.catename');
        if(D('Brands')->where(array('bname'=>$bname))->find()){
            echo  'false';
        }else{
            echo 'true';
        }
    }
}