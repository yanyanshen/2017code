<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;

class WeiXinController extends BgController{
    public function createMenu(){
        $this->display('createMenu');
    }
}