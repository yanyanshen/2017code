<?php
/**
 * Created by PhpStorm.
 * Member: Administrator
 * Date: 2017/3/15
 * Time: 10:33
 */

namespace Admin\Model;
use Think\Model;
class TestCategoryModel extends Model{
    public function test_category(){//用于分类的查询
        $test_Category=$this->where('status=1')->select();
        return $test_Category;
    }
    public function getCateByPid($pid){
        $cateList=$this->where(array('pid'=>$pid))->select();
        if($cateList){
            return $cateList;
        }else{
            return false;
        }
    }
}