<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>会员中心 - 取现</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="utf-8" />
    <link rel="dns-prefetch" href="//ued.paixie.net" />
    <link rel="dns-prefetch" href="//img-cdn2.paixie.net" />
    <link rel="icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="bookmark" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="edge" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telphone=no, email=no" />
    <meta name="renderer" content="webkit" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="screen-orientation" content="portrait" />
    <meta name="x5-orientation" content="portrait" />
    <meta name="full-screen" content="yes" />
    <meta name="x5-fullscreen" content="true" />
    <meta name="browsermode" content="application" />
    <meta name="x5-page-mode" content="app" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" />
    <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','member2.0','password'],'2015/09/15 16:08:10',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script>
    <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.member2_0.password.v3901.css" type="text/css" />
    <script type="text/javascript" src="/Public/Mobile/js/zepto.min.js"></script>
    <script type="text/javascript" src="/Public/Mobile/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>
    <style type="text/css">
        .m_header,
        .body{max-width: 640px;}
        .m_header{left:50%;margin-left: -320px;}
    </style>
    <script type="text/javascript">function remReSize(){var w = $(window).width();try{w = $(parent.window).width();}catch(ex){};if(w>640){w = 640;};$('html').css('font-size',100/640*w+'px');$('#js_style_for_pc').remove();$('body').append('<style id="js_style_for_pc">.m_header{margin-left: -'+w/2+'px;}.m_menu{margin-left: -'+w/2+'px;}</style>');};remReSize();$(window).resize(remReSize);$(document).ready(function() {remReSize();});for(var i=0;i<3;i++){setTimeout(remReSize, 100*i);};</script>
</head>
<body>
<div class="body">
    <div class="m_header">
        <p> <a class="bt_prev" href="<?php echo U('Account/index');?>"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p>
        <h1 class="ellipsis bt_title"> 取现 </h1>
        <p> <a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p>
    </div>
    <div class="m_menu hidden">
        <div>
            <i class="rotate45"></i>
            <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
            <a href="<?php echo U('Mobile/Category/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
            <a href="<?php echo U('Mobile/MyCart/mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
            <a href="<?php echo U('Mobile/Member/index');?>"><span><i class="m_bg"></i></span>用户中心</a>
        </div>
    </div>
    <div class="lib_content" id="js_lib_content">
        <div class="placeholder"></div>
        <div class="gray9 f28 w600">
            请确保资金安全
        </div>
        <div class="placeholder"></div>
        <!--<ul form-submit="js_submit" class="m_list m_list_form m_list_form_separate">-->
        <form id="form" action="">
            <ul  class="m_list m_list_form m_list_form_separate">
                <li class="password"> <label class="gray6">取现金额</label> <input id="js_password" name="money" placeholder="请输入充值金额" type="text" />
                    <div class="right text-v">
                        <a class="m_icon m_icon_del"> <dfn class="rotate45"></dfn> <dfn class="rotate135"></dfn> </a>
                    </div> </li>
                <li class="password"> <label class="gray6">交易密码</label> <input id="js_password2"  name="paypwd" placeholder="请输入交易密码" type="password" />
                    <div class="right text-v">
                        <a class="m_icon m_icon_del"> <dfn class="rotate45"></dfn> <dfn class="rotate135"></dfn> </a>
                    </div>
                    <!--<div class="grayc f24">
                     密码由6-20位英文字母、数字或者符号组成
                    </div>
                    <div id="js_strength" class="gray9 hidden">
                     密码强度：
                     <span class="orange">强</span>
                    </div>--> </li>
            </ul>
            <div class="placeholder"></div>
            <!--<div class="w600 f24 gray9">
             <label class="m_setting m_setting_password"> <i></i> <span><b><dfn></dfn><dfn></dfn><dfn></dfn></b></span> <strong><b>ABC</b></strong> <input id="js_show_password" type="checkbox" /> </label>
             <label>显示密码</label>
            </div>-->
            <a id="submit" class="m_button m_button_orange m_button_block" >提交</a>
        </form>

        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
    </div>
    <div class="m_footer clear">
        <a class="m_icon m_icon_gotop hidden" href="javascript:void(0);"></a>
        <div class="userinfo">
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6 ellipsis" href="<?php echo U('Mobile/Member/index');?>"><?php echo (session('mname')); ?></a>
        <?php else: ?> <a style="color:#666666 " href="<?php echo U('Mobile/Login/Dologin');?>"> 登录</a><?php endif; ?>

    <span></span>
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" id="OUT" href="javascript:;">退出</a>
        <?php else: ?><a class="gray6" href="<?php echo U('Mobile/Register/index');?>">注册</a><?php endif; ?>
    <span></span>
    <a class="gray6" href="<?php echo U('Mobile/Feedback/index');?>">用户反馈</a>
    <span></span>
    <a class="gray6" href="/help/app.html#button">客户端</a>
</div>
<div class="copyright gray9">© 2007-2015 Paixie All Rights Reserved<br>闽B2-20110084</div>
<script>
    $(function() {
        $('#OUT').click(function () {
            $.post("<?php echo U('Mobile/Login/LoginOut');?>", '', function (res) {
                if (res.status == 1) {
                    layer.open({
                        content: res.info,
                        type:1,
                        skin:'msg',
                        time:3,
                        end: function () {
                            location.href = "<?php echo U('Mobile/index/index');?>";
                        }
                    })
                } else {
                    layer.open({
                        content: res.info,
                        type:1
                    });
                }
            }, 'json')
        });
    })
 </script>
    </div>
    <div style="display:none;">
    </div>
</div>
<script type="text/javascript" src="/Public/Mobile/js/zip.touch.member2_0.password.v361.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script>

<script>
    $(function() {
        var money = function (value) {
            value = $.trim(value);
            if (value == '') {
                return '取现金额不能为空!';
            }else if (!/^[1-9]{1}[0-9]*$/.test(value)) {
                return '取现金额必须为数字！';
            }else if (value.indexOf(' ') >= 0) {
                return '取现金额不能包含空格';
            }else{
                return true;
            }
        }
        var paypwd = function (value) {
            value = $.trim(value);
            if (value == '') {
                return '支付密码不能为空!';
            }else{
                return true;
            }
        }
        $('#submit').click(function () {
            if(money($("input[name=money]").val())==1 && paypwd($("input[name=paypwd]").val())==1){
                $('#form').submit();
            }else if(money($("input[name=money]").val())!=1){
                layer.open({
                    content:money($("input[name=money]").val()),
                    skin:'msg',
                    type:1,
                    time:3
                })
            }else if(paypwd($("input[name=paypwd]").val())!=1){
                layer.open({
                    content:paypwd($("input[name=paypwd]").val()),
                    skin: 'msg',
                    type: 1,
                    time: 3
                })
            }
        })
        $('#form').submit(function(){
            $.post("<?php echo U('cash');?>",$('#form').serialize(),function(res){
                if(res.status==1){
                    layer.open({
                        content:res.info,
                        skin:'msg',
                        type:1,
                        time:3
                    })
                }else{
                    layer.open({
                        content:res.info,
                        skin:'msg',
                        type:1,
                        time:3
                    })
                }
            })
        })

    })
</script>
</body>
</html>