<?php
namespace Mobile \Controller;
use Think\Controller;
use Think\Image;
use Think\Upload;
class AddPhotoController extends Controller {
    public function AddPhoto(){
        $this->display('AddPhoto');
    }


    public function addUserImg()
    {
        $user = M('User');
        //$date = $_POST;
        //print_r($date);
        $upLode = new Upload();
        $upLode->mxaSize = 3145728;
        $upLode->exts = array('jpg', 'gif', 'png', 'jpeg');
        $upLode->rootPath = './PhotoImg/photo';
        $upLode->savePath = '';
        $info = $upLode->upload();
        //print_r($info);
        if (!$info) {
            $this->error($upLode->getError());
        } else {
            //生成缩略图
            $savePath = $info['img']['savepath'];
            $saveName = $info['img']['savename'];
            $image = new Image();
            $image->open('./PhotoImg/photo' . $savePath . $saveName);
            $image->thumb(90, 90)->save('./UserImg/photo' . $savePath . $saveName);
            //添加到数据库

            $imgInfo['imgpath'] = $info['img']['savepath'];
            $imgInfo['imgname'] = $info['img']['savename'];
            $userName = session('mname');
            //print_r($saveName);

            $bid = $user->where(array('username' => $userName))->save($imgInfo);
        }
        //print_r('./Upload/logo'.$savePath.$saveName);
        if ($bid) {
            $this->success('头像更换成功');
        } else {
            $this->error('头像更换失败');
        }
    }
}