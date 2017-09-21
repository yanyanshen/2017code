<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Home/fonts/iconfont.css" rel="stylesheet" type="text/css" />
    <script src="/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <!--<script src="/Public/Home/js/jquery-1.8.2.min.js" type="text/javascript"></script>-->
    <script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
    <script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
    <script src="/Public/Home/js/footer.js" type="text/javascript"></script>
    <script src="/Public/Home/js/lrtk.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>

    <script src="/Public/Home/js/gt.js" type="text/javascript"></script>
    <title>用户登陆</title>
</head>

<style type="text/css">
    .tou{
        background: url("/Public/Home/images/tou.png") no-repeat;
        width: 97px;
        height: 92px;
        position: absolute;
        top: -87px;
        left: 140px;
    }
    .left_hand{
        background: url("/Public/Home/images/left_hand.png") no-repeat;
        width: 32px;
        height: 37px;
        position: absolute;
        top: -38px;
        left: 150px;
    }
    .right_hand{
        background: url("/Public/Home/images/right_hand.png") no-repeat;
        width: 32px;
        height: 37px;
        position: absolute;
        top: -38px;
        right: -64px;
    }
    .initial_left_hand{
        background: url("/Public/Home/images/hand.png") no-repeat;
        width: 30px;
        height: 20px;
        position: absolute;
        top: -12px;
        left: 100px;
    }
    .initial_right_hand{
        background: url("/Public/Home/images/hand.png") no-repeat;
        width: 30px;
        height: 20px;
        position: absolute;
        top: -12px;
        right: -112px;
    }
    .left_handing{
        background: url("/Public/Home/images/left-handing.png") no-repeat;
        width: 30px;
        height: 20px;
        position: absolute;
        top: -24px;
        left: 139px;
    }
    .right_handinging{
        background: url("/Public/Home/images/right_handing.png") no-repeat;
        width: 30px;
        height: 20px;
        position: absolute;
        top: -21px;
        left: 210px;
    }


    input.error { border: 1px solid #EA5200;background: #ffdbb3;}
    span.error{
        position: absolute;
        color:#ff0300;
        display: block;
        font-weight: bold;
        font-size: 14px;
    }
    span.ok {
        color:green;
    }

</style>

<script type="text/javascript">
    $(function(){
        //得到焦点
        $("#password").focus(function(){
            $("#left_hand").animate({
                left: "150",
                top: " -38"
            },{step: function(){
                if(parseInt($("#left_hand").css("left"))>140){
                    $("#left_hand").attr("class","left_hand");
                }
            }}, 2000);
            $("#right_hand").animate({
                right: "-64",
                top: "-38px"
            },{step: function(){
                if(parseInt($("#right_hand").css("right"))> -70){
                    $("#right_hand").attr("class","right_hand");
                }
            }}, 2000);
        });
        //失去焦点
        $("#password").blur(function(){
            $("#left_hand").attr("class","initial_left_hand");
            $("#left_hand").attr("style","left:100px;top:-12px;");
            $("#right_hand").attr("class","initial_right_hand");
            $("#right_hand").attr("style","right:-112px;top:-12px");
        });
    });
</script>

<body>
<div class="log_bg">
 <div class="top">
   <div class="logo"><div class="logo_link"><a href="<?php echo U('Index/Index');?>"><img src="/Public/Home/images/logo.png"></a></div><div class="phone">免费咨询热线：<b>400-567-4556</b></div></div>
  </div>
 <div class="login">
   <div class="log_img"><img src="/Public/Home/images/imgbg_03.png" width="611" height="425"></div>
   <div class="log_c">
    <form style="border: solid 1px #ffffff;" action="<?php echo U('doLogin');?>" method="post" id="LoginForm">
        <DIV style="width: 160px; height: 96px; position: absolute;margin-left: 35px;">
            <DIV class="tou"></DIV>
            <DIV class="initial_left_hand" id="left_hand"></DIV>
            <DIV class="initial_right_hand" id="right_hand"></DIV></DIV>
    <table border="0"  cellspacing="0" cellpadding="0" >
              <tbody><tr height="50" valign="top">
              	<td width="55">&nbsp;</td>
                <td>
                	<span class="fl" style="font-size:24px;">登录</span>
                    <span class="fr">还没有商城账号，<a href="<?php echo U('Register/Register');?>" style="color:#ff4e00;">立即注册</a></span>
                </td>
              </tr>
              <tr height="70">
                <td>用户名</td>
                <td><input type="text" value="" class="l_user" name="username" id="username"></td>
              </tr>
              <tr height="70"> <td>密&nbsp; &nbsp; 码</td>
                <td><input type="password" value="" class="l_pwd" id="password"  name="password"  ></td>
              </tr>
              <tr>
                  <td  style="text-align: center;vertical-align:middle; width:60px ; padding-top: 8px;">验证码</td>
                  <td>

                     <!-- <div id="captcha"></div>-->

                       <input type="text" value="" class="l_ipt" name="verify" style="width: 212px">
                       <input type="hidden" value="<?php echo (session('URL')); ?>" name="URL" id="hid"/>
                       <img  src="<?php echo U('Home/Register/verify');?>" alt="验证码"; onclick="this.src='<?php echo U('Home/Register/verify?vid=1',array('id',mt_rand()));?>'" style="cursor: pointer;width:80px;height:40px;display: inline-block; position:relative;top: 15px;left: -4px"/>
                  </td>
              </tr>
              <tr>
              	<td>&nbsp;</td>
                <td style="font-size:12px; padding-top:20px;">
                	<span style="font-family:'宋体';" class="fl">
                    	<label class="r_rad"><input type="checkbox" value="1" name="remember" id="ck_rmbUser"></label><label class="r_txt">请保存我这次的登录信息</label>
                    </span>
                    <span class="fr"><a href="<?php echo U('Home/ChangPassword/index');?>" style="color:#ff4e00;">忘记密码</a></span>
                </td>
              </tr>
              <tr height="60">
              	<td>&nbsp;</td>
                <td><input type="button" value="登录" class="log_btn" id="log_btn" onclick="fn()"></td>
              </tr>
            </tbody></table>
    </form>
   </div>
 </div>
 <div class="btmbg">
    <div class="btm">
        备案/许可证编号：蜀ICP备12009302号-1-www.dingguagua.com   Copyright © 2015-2018 尤洪商城网 All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br>

    </div>    	
</div>
</div>
</body>
</html>



<script>

    $(function(){
        //validate表单验证
        var validate=$('#LoginForm').validate({
            //设置验证规则
            rules:{
                username:{
                    required:true


                },
                password:{
                    required:true

                },

                verify: {
                    required: true,
                    remote: {
                        url: '<?php echo U("chkVerify");?>',
                        type: 'post'
                    }
                }
            },


            messages: {
                username: {
                    required: '用户名不能为空'

                },
                password: {
                    required: '密码不能为空'

                },

                verify: {
                    required: '请输入验证码',
                    remote: '验证码不正确'
                }
            },
            success: function(span) {
                span.addClass("ok").text('OK');
            },
            validClass:'ok',
            errorElement:'span'
        });


        $('#log_btn').click(function(){
            //表单提交之前判断前端验证是否通过，只有通过时才提交表单
            if(validate.form()){

                $.post("<?php echo U('Home/Login/doLogin');?>",$('#LoginForm').serialize(),function(res){

                    if(res.status==1){

                        layer.msg('登陆成功', {icon:1,time:1000},function(){
                                    location.href=res.info;
                                }
                        );
            
                    }else{
                        layer.open({
                            content:res.info,
                            icon:2,
                            title : '错误提示'
                        });
                    };
                },'json')
            }

        })
    })
</script>
</body>

<script>
var handler = function (captchaObj) {
// 将验证码加到id为captcha的元素里
captchaObj.appendTo("#captcha");
};
// 获取验证码
$.get("<?php echo U('Home/Test/geetest_show_verify');?>", function(data) {

// 使用initGeetest接口
// 参数1：配置参数，与创建Geetest实例时接受的参数一致
// 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
initGeetest({
gt: data.gt,
challenge: data.challenge,
product: "float", // 产品形式
offline: !data.success
}, handler);
},'json');
// 检测验证码
/*function check_verify(){
// 组合验证需要用的数据
var test=$('.geetest_challenge').val();
var postData={
geetest_challenge: $('.geetest_challenge').val(),
geetest_validate: $('.geetest_validate').val(),
geetest_seccode: $('.geetest_seccode').val()
}
// 验证是否通过
$.post("<?php echo U('Home/Test/geetest_ajax_check');?>", postData, function(data) {
if (data==1) {
alert('验证成功');
}else{
alert('验证失败');
}
});
}*/
</script>

<script>
    //记住用户名密码
    var user = document.getElementsByTagName("input")[0],
            pass = document.getElementsByTagName("input")[1],
            check = document.getElementsByTagName("input")[4],
            loUser = localStorage.getItem("user") || "";  //获取user的值
    loPass = localStorage.getItem("pass") || "";
    user.value = loUser;
    pass.value = loPass;
    if(loUser !== "" && loPass !== ""){
        check.setAttribute("checked","");
    }
    function fn(){
        if(check.checked){
            localStorage.setItem("user",user.value);
            localStorage.setItem("pass",pass.value);
        }else{
            localStorage.setItem("user","");
            localStorage.setItem("pass","");
        }
    }
</script>
<!--按回车触发按钮事件-->
<script language="javascript">
    $(function () {
        document.onkeydown = function (event) {
            var e = event || window.event || arguments.callee.caller.arguments[0];
            if (e && e.keyCode == 13) {
                $('#log_btn').click();
            }
        };
    });
</script>

</html>