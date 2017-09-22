<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        //验证规则：require 字段值必须、email 邮箱、url URL地址、currency 货币、number 数字、double浮点、integer整数、zip邮政编码、english英文
        //验证条件：0代表字段存在时必须验证、1代表字段必须验证、2代表字段存在而且不为空时验证
        //附加规则:默认为regex,附加规则的值决定了验证规则的值
        //验证时间:1代表添加时验证，2代表更新时验证，3代表任何情况下都验证
        array('username','require','用户名不能为空',0,'regex',1),
        array('username','','用户名已经存在',0,'unique',1),
        array('password','require','密码不能为空',0,'regex',1),
        array('mobile','require','手机号不能为空',0,'regex',1),
    );

    protected $_auto = array (
        array('password','md5',3,'function'),            // 对password字段在新增和编辑的时候使md5函数处理
        array('password','',2,'ignore') ,                // 编辑时若password字段为空则不作修改
    );

    public function addAdmin($data){
        $id=$this->field("username,password")->add($data);
        return $id;
    }

    public function getAdminList(){
        $adminList=$this->select();
        return $adminList;
    }

    public function getAdminById($id){
        $admin=$this->find($id);
        return $admin;
    }



    public function editAdmin($data){
        $row=$this->save($data);
        return $row;
    }


}