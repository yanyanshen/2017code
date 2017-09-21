<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
   /* protected $_map=array(
        'l_user'=>'username',
        'l_pwd'=>'password',
        '1_email'=>'email'
    );*/
    protected $_map=array(
        'newemail'=>'email'
    );
    protected $_validate = array(
        array('verify','require','验证码不能为空！'), //默认情况下用正则进行验证
        //array('username','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
        array('username','checkLength','用户名长度必须在5-10个字符之间',0,'function',3,array('5','10')),

        array('email','email','格式必须为邮箱'),
        array('phone','/\^[1][358][0-9]{9}$/','输入正确的手机格式'),
        array('password','/^[0-9a-zA-Z]{6,20}$/','请输入正确的密码格式'),
        //array('value',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内
        array('repwd','password','密码不匹配',0,'confirm'), // 验证确认密码是否和密码一致
        array('password','checkLength','密码长度必须在5-10个字符之间',0,'function',3,array('5','10')), // 自定义函数验证密码格式
    );
    protected  function checkLength($str,$min,$max){
        if(strlen($str)>$max ||strlen($str)<$min){
            return false;
        }else{
            return true;
        }
    }

    /*protected  function checkName($name){
        $admin=D('User');
        $list=$admin->find();
        if($list['username']==$name){
            return 'false';
        }else{
            return 'true';
        }
    }*/


}