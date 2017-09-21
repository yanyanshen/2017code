<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>

    <style type="text/css">

        input{
            margin-bottom: 6px;
        }
        lable.error{
            font-size: 14px;
            font-weight: bold;
            color: #FF0000;
        }
        lable.ok{
            font-size: 14px;
            font-weight: bold;
            color: #38D63B;
        }

    </style>
<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
</script>
  
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
    <script>
        $(function(){
            var validate=$('#form').validate({
                rules:{
                    mobile:{
                        required:true,
                        mobile:true
                    },
                    username:{
                        required:true,
                        rangelength:[5,12],
                        remote:{
                            url:"<?php echo U('chkUsername');?>",
                            type:'post'
                        }
                    },
                    password:{
                        required:true,
                        rangelength:[5,12]
                    },
                    repwd:{
                        required:true,
                        equalTo:'#password'
                    }
                },
                messages:{
                    mobile:{
                        required:' * 密保手机号不能为空！',
                        mobile:' * 手机号码格式不正确！'
                    },
                    username:{
                        required:' * 管理员账号不能为空！',
                        rangelength:' * 账号长度必须在5到18位之间！',
                        remote:' * 用户名已存在！'
                    },
                    password:{
                        required:' * 密码不能为空！',
                        rangelength:' * 密码长度必须在5到18位之间！'
                    },
                    repwd:{
                        required:' * 确认密码不能为空!',
                        equalTo:' * 两次密码输入不一致!'
                    }
                },
                success:function(lable){
                    lable.addClass('ok').text(' * 通过验证');
                },
                validClass:'ok',
                errorElement:'lable'
            })
            // 手机号码验证
            jQuery.validator.addMethod("mobile", function(value, element) {
                var mobileReg = /^1[34578]{1}[0-9]{9}$/;
                return this.optional(element) || (mobileReg.test(value));
            }, "请正确填写您的手机号码");

            $('.btn').click(function(){
                $('#form').submit();
            })
            $(window).keydown(function(event){
                if(event.keyCode==13){
                    $('#form').submit();
                }
            })
            $('#form').submit(function(){
                if(validate.form()){
                    $.post("<?php echo U('Admin/add');?>",$('#form').serialize(),function(res){
                        if(res.status==1){
                            layer.msg('添加管理员成功',{time:2000,icon:6},function(){
                                window.location.href="<?php echo U('Admin/add');?>";
                            })
                        }else{
                            layer.msg(res.info,{time:3000,icon:5},function(){
                                window.location.href="<?php echo U('Admin/add');?>";
                            })
                        }
                    },'json')
                    return false;
                }
            })
        })
    </script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">系统管理</a></li>
    <li><a href="#">添加管理员</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">


    <form action="<?php echo U('Admin/add');?>" method="post" id="form">
    <ul class="forminfo">
    <li><label>添加类型<b>*</b></label>
        <div class="vocation">
            <select name="permissions" class="select1">
                <option value="0">请选择</option>
                <option value="1">超级管理员</option>
                <option value="2">标准管理员</option>
            </select>
        </div>
    </li>
    <li><label>密保手机号<b>*</b></label><input name="mobile" type="text" class="dfinput" placeholder="请填写密保手机号" /></li>
    <li><label>管理员账号<b>*</b></label><input name="username" type="text" class="dfinput" placeholder="请添加管理员账号" /></li>
    <li><label>管理员密码<b>*</b></label><input name="password" id="password" type="password" class="dfinput" placeholder="请添加管理员密码" /></li>
    <li><label>确认密码<b>*</b></label><input name="repwd" type="password" class="dfinput" placeholder="请确认密码" /></li>
    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确定"/></li>
    </ul>
    </form>
    
    </div> 
    
    
  	
       
	</div> 
 
	
    
    
    
    
    
    </div>


</body>

</html>