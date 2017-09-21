<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<title>搜索</title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta charset="utf-8"/>
<link rel="dns-prefetch" href="//ued.paixie.net"/>
<link rel="dns-prefetch" href="//img-cdn2.paixie.net"/>
<link rel="icon" href="/favicon.ico" type="image/x-icon"/>
<link rel="bookmark" href="/favicon.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
<meta http-equiv="X-UA-Compatible" content="edge"/>
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="format-detection" content="telphone=no, email=no"/>
<meta name="renderer" content="webkit"/>
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>
<meta name="screen-orientation" content="portrait"/>
<meta name="x5-orientation" content="portrait"/>
<meta name="full-screen" content="yes"/>
<meta name="x5-fullscreen" content="true"/>
<meta name="browsermode" content="application"/>
<meta name="x5-page-mode" content="app"/>
<meta name="msapplication-tap-highlight" content="no"/>
<meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport"/>
    <script src="/Public/Mobile/list/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','fqq55bj0iq1fvg7cc5ff3hmg90',['touch','home','search'],'2015/09/16 07:58:10',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script>
<link rel="stylesheet" href="/Public/Mobile/css/zip.touch.home.search.v39031.css" type="text/css" />
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
    <p>
        <a class="bt_prev" href="javascript:window.history.back();void(0);">
            <i class="m_icon m_icon_close"></i>
        </a>
    </p>
	<div class="searchform">
		<form action="<?php echo U('Mobile/Search/search');?>" method="get" id="search_jump_to">
			<input class="m_home_search" type="text" value="<?php echo ($keywords?$keywords:'口红'); ?>" placeholder="" data-url='ajax_search.php' name="keywords"/>
			<input class="m_home_search_sibmit" type="submit" value="搜索"/>
		</form>
		<!--<ul id="js_search_list" class="search_list hidden">
		</ul>-->
	</div>
</div>
<div class="lib_content" id="js_lib_content">
<div id="js_search">
	<div class="m_search_hot">
		<div class="hot_title">热门搜索</div>
		<div class="hot_content">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Search/search',array('keywords'=>$data['keywords']));?>"><?php echo ($data['keywords']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
	</div>
	<ul class="m_list m_search_list" id="js_clear_search_list">
		</ul>
</div>
<ul id="js_search_list" class="search_list hidden">
</ul>
    <p class="text-center">
        <a class="m_button m_button_radius bg_white" id="clear"  href="javascript:void(0);">清空搜索记录</a>
    </p>

</div>
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


</div>
<script type="text/javascript" src="/Public/Mobile/js/zip.touch.home.search.v36111.js"></script>

<script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script>

</body>
</html>
<script>
    $("#clear").click(function(){
        $.get('<?php echo U("Mobile/Search/deleteKeywords");?>',function(res){
            if(res.status==1){
                layer.open({
                    content:'删除成功'
                    ,type:1
                    ,skin:'msg'
                    ,time:3
                    ,end:function(){
                        location='<?php echo U("Mobile/Search/index");?>'
                    }
                })
            }else{
                if(res.info==1){
                    layer.open({
                        content:'删除失败，请稍后重试'
                        ,type:1
                        ,skin:'msg'
                        ,time:3
                    })
                }else{
                    layer.open({
                        content:'没有数据可进行删除，你可能还没登录'
                        ,type:1
                        ,skin:'msg'
                        ,time:3
                    })
                }
            }
        })
    })
</script>