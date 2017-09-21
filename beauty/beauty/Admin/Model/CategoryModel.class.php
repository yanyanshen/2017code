<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model{
    public function getCateByPid($pid){
        $cateList=$this->where(array('pid'=>$pid))->select();
        if($cateList){
            return $cateList;
        }else{
            return false;
        }
    }

}