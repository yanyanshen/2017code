<?php
namespace Home\Controller;
use Think\Controller;
class BrandGoodsController extends Controller{
    public function showBrand(){
        $id=I('get.bid');
        $brand=M('brands');
        $brandGoods=$brand->join('beauty_goods on beauty_brands.id=beauty_goods.bid')->where(array('status'=>1,'bid'=>$id))->select();
        //print_r($brandGoods);
        $this->assign('brandGoods',$brandGoods);
        $this->display('brandGoods');
    }
}
