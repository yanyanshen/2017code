<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/13
 * Time: 10:03
 */
namespace Admin\Common\Controller;
use Think\Controller;
class BgController extends Controller{
    public function __construct(){
        parent::__construct();
        if(!session('aid')){
            $this->redirect('Login/Login');
        }
    }
}