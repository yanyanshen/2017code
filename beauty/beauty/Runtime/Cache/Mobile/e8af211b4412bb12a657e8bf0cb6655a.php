<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>意见反馈</title>
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
    <script src="/Public/Mobile/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','help2.0','feedback'],'2015/09/15 16:15:43',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script>
    <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.help2_0.feedback.v3907.css" type="text/css" />
    <script type="text/javascript" src="/Public/Mobile/js/zepto.min.js"></script>
    <script src="/Public/Mobile/layer_mobile/layer.js" type="text/javascript"></script>
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
        <p> <a class="bt_prev" href="javascript:history.back(-1)"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p>
        <h1 class="ellipsis bt_title"> 意见反馈 </h1>
        <p> <a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p>
    </div>
    <div class="m_menu hidden">
        <div>
            <i class="rotate45"></i>
            <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
            <a href="<?php echo U('Mobile/Category/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
            <a href="<?php echo U('Mobile/MyCart/mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
            <a href="member_index.html"><span><i class="m_bg"></i></span>beauty中心</a>
        </div>
    </div>
    <form action="" method="get" id="form1">
        <div class="lib_content" id="js_lib_content">
            <div class="placeholder"></div>
            <div class="placeholder"></div>
            <div class="w600 content">
                <textarea name="textarea" id="js_content" placeholder="亲，您遇到什么系统问题啦，或有什么功能建议吗？欢迎您提给我们，谢谢！">

                </textarea>
                <label>联系方式</label>
                <input name="way" value="" id="js_contact" type="text" placeholder="手机/QQ/微信/邮箱" />
            </div>
            <div class="w600 f24 grayc">
                请留下任一联系方式，仅供有奖反馈可联系到您
            </div>
            <div class="placeholder"></div>
            <a href="javascript:;" id="submit" class="m_button m_button_orange m_button_block" disabled="">发表</a>
            <div class="placeholder"></div>
            <div class="placeholder"></div>
        </div>
    </form>
    <script>

        $('#submit').click(function(){
            $.get('<?php echo U("Mobile/Feedback/send");?>',$('#form1').serialize(),function(res){
                if(res.status==0){
                    layer.open({
                        content: '填写完整才能提交哦'
                        ,skin: 'msg'
                        ,time: 5 //2秒后自动关闭
                    });
                }else if(res.status==1){
                    if(res.info==1){
                        layer.open({
                            content: '谢谢您的及时反馈，根据您的意见我们会继续努力的！！！'
                            ,skin: 'msg'
                            ,time: 5 //2秒后自动关
                        });
                    }else{
                        layer.open({
                            content: '不可重复提交'
                            ,skin: 'msg'
                            ,time: 5 //2秒后自动关闭
//
                        });
                    }

                }
            })
        })
    </script>
    <div class="m_footer clear">
        <a class="m_icon m_icon_gotop hidden" href="javascript:void(0);"></a>
        <script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>

<div class="userinfo">
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6 ellipsis" href="<?php echo U('Mobile/Member/index');?>"><?php echo (session('mname')); ?></a>
        <?php else: ?> <a style="color:#666666 " href="<?php echo U('Mobile/Login/Dologin');?>"> 登录</a><?php endif; ?>

    <span></span>
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" id="OUT" href="javascript:;">退出</a>
        <?php else: ?><a class="gray6" href="<?php echo U('Mobile/Register/index');?>">注册</a><?php endif; ?>
    <span></span>
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" href="<?php echo U('Mobile/Feedback/index');?>">用户反馈</a>
        <?php else: ?>
        <a class="gray6" href="<?php echo U('Mobile/Login/Dologin');?>">用户反馈</a><?php endif; ?>
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
<script type="text/javascript" src="/Public/Mobile/js/zip.touch.help2_0.feedback.v361.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script>

</body>
</html>