<?php
namespace Home\Controller;
use Think\Controller;
class MoreBrandController extends Controller{
          public function brandsList(){
              $brand=M('brands');
              $list=$brand->select();
              $empty='<span style="color: #ff0000;font-size: 36px;">此品牌下暂时没有商品</span>';
              $this->assign('list',$list);
              $this->assign('empty',$empty);
              $this->display('MoreBrand');


          }
}