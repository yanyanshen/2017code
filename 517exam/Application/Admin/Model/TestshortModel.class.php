<?php
/**
 * Created by PhpStorm.
 * Member: Administrator
 * Date: 2017/3/16
 * Time: 11:42
 */
namespace Admin\Model;
use Think\Model;

class TestshortModel extends Model{
    public function Testshort($where){//用于简答题的查询
        $res=$this->where($where)->select();
        return $res;
    }
}