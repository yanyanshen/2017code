<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>
<script src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
<script src="/Public/Admin/js/layer/layer.js"></script>
    <style type="text/css">
        #loginout{
            cursor: pointer;
        }
        #timeunit{
            width: 230px;
            float: right;
        }
        #time{
            font-size: 14px;
            font-style: normal;
            color: #d0d8e0;
        }
    </style>
<script type="text/javascript">
$(function(){	
	//顶部导航切换
	$(".nav li a").click(function(){
		$(".nav li a.selected").removeClass("selected")
		$(this).addClass("selected");
	})
    $('#loginout').click(function(){
        $.post("<?php echo U('Admin/Admin/loginout');?>",'',function(res){
            if(res.status==1){
                layer.msg('退出成功',{icon:1,time:1000},function(){
                    parent.location.href="<?php echo U('Admin/Login/login');?>";
                })
            }else{
                layer.msg('退出失败');
            }
        })

    })

    //时间设置;
    function currentTime(){
        var dt=new Date(),
        str='';
        str+=dt.getFullYear()+'年';
        str+=dt.getMonth() + 1+'月';
        str+=dt.getDate()+'日';
        if(dt.getHours()<10){
            str+="0"+dt.getHours()+'时';
        }else{
            str+=dt.getHours()+'时';
        }
        if(dt.getMinutes()<10){
            str+="0"+dt.getMinutes()+'分';
        }else{
            str+=dt.getMinutes()+'分';
        }
        if(dt.getSeconds()<10){
            str+="0"+dt.getSeconds()+'秒';
        }else{
            str+=dt.getSeconds()+'秒';
        }
        return str;
    }
    setInterval(function(){
        $('#time').html(currentTime)
    },1000);

    /*$('.user').mouseenter(function(){
        $.post("<?php echo U('Index/top');?>",function(res){
            if(res.status==1) {
                var str = "<?php echo ($mail); ?>";
                $('.user b').html(str);
            }
        })
    })*/
})	
</script>


</head>

<body style="background:url(/Public/Admin/images/topbg.gif) repeat-x;">

    <div class="topleft">
    <a href="index.html" target="_top"><img src="/Public/Admin/images/logo.png" title="系统首页" /></a>
    </div>
        
 <!--    <ul class="nav">
 <li>
     <a href="main.html" target="rightFrame" class="selected">
         <img src="/Public/Admin/images/icon01.png" title="工作台" />
     <h2>工作台</h2>
     </a>
 </li>
    
 </ul> -->


    <div class="topright">
    <ul>
    <li><span><img src="/Public/Admin/images/help.png" title="帮助"  class="helpimg"/></span><a href="#">帮助</a></li>
    <li><a href="#">关于</a></li>
    <li><a target="_parent" id="loginout">退出</a></li>
    </ul>
     
    <div class="user">
    <span><?php echo ($username); ?></span>
    <i>消息</i>
    <b><?php echo ($mail); ?></b>
    </div>

        <div id="timeunit">
            <span class="time"><em id="time"></em></span>
        </div>
    
    </div>

</body>
</html>