<?php
namespace Admin\Model;
use Think\Model;
class FooteModel extends Model{
    protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        //验证规则：require 字段值必须、email 邮箱、url URL地址、currency 货币、number 数字、double浮点、integer整数、zip邮政编码、english英文
        //验证条件：0代表字段存在时必须验证、1代表字段必须验证、2代表字段存在而且不为空时验证
        //附加规则:默认为regex,附加规则的值决定了验证规则的值
        //验证时间:1代表添加时验证，2代表更新时验证，3代表任何情况下都验证
        array('newtitle','require','文章标题不能为空',0,'regex',1),
        array('newcontent','require','文章内容不能为空',0,'regex',1),
    );

    public function getCateByPid($pid){
        $cateList=$this->where(array('pid'=>$pid))->select();
        if($cateList){
            return $cateList;
        }else{
            return false;
        }
    }
}