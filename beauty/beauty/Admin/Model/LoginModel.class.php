<?php
namespace Admin\Model;
use Think\Model;
class LoginModel extends Model{
    protected $_validate=array(
        //array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间])
        array('username','required','用户名不能为空'),
        array('username','5,12','用户名长度必须在5到12位之间',0,'length'),
        array('password','required','密码不能为空'),
        array('password','5,12','密码长度必须在5到12位之间',0,'length')
    );
}