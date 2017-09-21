<?php
namespace Mobile\Controller;
use Think\Controller;
class CouponController extends Controller {
    public function index(){
        $list=M('packet')->where(array('mid'=>session('mid'),'status'=>1))->select();
        $this->assign('list',$list);
        $this->assign('empty',"<h3 style='text-align: center;color:#dcdcdc'>没有查到相关数据</h3>");

        $this->display('member_coupon');
    }

    public function shixiao(){
        $list=M('packet')->where(array('mid'=>session('mid'),'status'=>0))->select();
        $this->assign('list',$list);
        $this->assign('empty',"<h3 style='text-align: center;color:#dcdcdc'>没有查到相关数据</h3>");
        $this->display('member_coupon_shixiao');
    }
}