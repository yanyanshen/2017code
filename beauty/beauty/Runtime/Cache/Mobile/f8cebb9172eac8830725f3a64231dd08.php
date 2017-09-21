<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <title>会员中心 - 首页</title> 
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
  <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','member2.0','index'],'2015/09/15 16:12:51',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script>
     <script type="text/javascript" src="/Public/Mobile/js/jquery.min.1.8.2.js"></script>
     <script src="/Public/Home/js/jquery.validate.min.js" type="text/javascript"></script>
     <script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>
     <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.member2_0.index.v39016.css" type="text/css" />
  <script type="text/javascript" src="/Public/Mobile/js/zepto.min.js"></script> 
  <style type="text/css">
.m_header,
.body{max-width: 640px;}
.m_header{left:50%;margin-left: -320px;}
.m_address{background-position:-.62rem -4.4rem;width: .52rem;height: .52rem}
</style> 
  <script type="text/javascript">function remReSize(){var w = $(window).width();try{w = $(parent.window).width();}catch(ex){};if(w>640){w = 640;};$('html').css('font-size',100/640*w+'px');$('#js_style_for_pc').remove();$('body').append('<style id="js_style_for_pc">.m_header{margin-left: -'+w/2+'px;}.m_menu{margin-left: -'+w/2+'px;}</style>');};remReSize();$(window).resize(remReSize);$(document).ready(function() {remReSize();});for(var i=0;i<3;i++){setTimeout(remReSize, 100*i);};</script> 
 </head> 
 <body> 
  <div class="body"> 
   <div class="m_header"> 
    <p> <a class="bt_prev" href="javascript:window.history.back();void(0);"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p> 
    <h1 class="ellipsis bt_title"> 用户中心 </h1>
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
    <div class="m_index_header"> 
     <a class="message_box" href="<?php echo U('Mobile/Member/index');?>">
        <div class="box_bg"></div> <i class="m_icon m_icon_message"></i>
     </a>
     <div class="m_index_info">

      <a class="portrait_box" href="<?php echo U('AddPhoto/AddPhoto');?>"> <img class="portrait_img" src="/PhotoImg/photo<?php echo ($photoPath); echo ($photoName); ?>" />
       <div class="box_bg"></div> <i class="clear"></i> </a> 
      <div class="portrait_name"> 
       <span class="ellipsis"><?php echo (session('mname')); ?></span>
       <i class="m_icon m_icon_lever m_lever0"></i> 
      </div> 
      <div class="portrait_info"> 
       <a>积分：<?php echo ($score); ?></a>|
       <a>金币：<?php echo ($sign); ?></a>
      </div> 
      <i class="clear"></i> 
     </div> 
     <div class="m_operate_bg"></div> 
     <div class="m_operate"> 
      <a href="<?php echo U('Mobile/Collect/index');?>"><?php echo ($count); ?><br /> <span>收藏的商品</span> </a>
      <a href="<?php echo U('Mobile/Account/index');?>"><?php echo ($balance); ?><br /> <span>账户余额</span> </a>
      <a href="<?php echo U('Mobile/Footprint/footprint');?>"><?php echo ($historyCount); ?><br /> <span>我的足迹</span> </a>
     </div> 
     <i class="clear"></i> 
    </div> 
    <div class="placeholder"></div>
    <div class="placeholder"></div> 
    <ul class="m_list m_list_top_line bg_white p_index_menu">
        <li class="p_menu">
            <a href="<?php echo U('Member/dfk');?>"> <i class="m_icon"></i><br /> 待付款 <span class="m_smalldots"><?php echo ($orderDfk); ?></span> </a>
            <a href="<?php echo U('Member/dfh');?>"> <i class="m_icon"></i><br /> 待发货 <span class="m_smalldots"><?php echo ($orderDfh); ?></span></a>
            <a href="<?php echo U('Member/dsh');?>"> <i class="m_icon"></i><br /> 待收货 <span class="m_smalldots"><?php echo ($orderDsh); ?></span></a>
            <a href="<?php echo U('Member/dpj');?>"> <i class="m_icon"></i><br /> 待评价 <span class="m_smalldots"><?php echo ($orderDpj); ?></span></a>
        </li>

	<i class="clear"></i> </li>
        <li class="link"> <a href="<?php echo U('Member/myOrder');?>"> <i class="m_icon m_icon_order"></i> 全部订单
       <div class="right">
         查看全部已购商品 
        <span class="m_arrow"> <i class="rotate45"></i> <i class="rotate135"></i> </span> 
       </div> </a> </li> 
    </ul> 
    <div class="placeholder"></div>
    <div class="placeholder"></div> 

    <ul class="m_list m_list_top_line bg_white p_index_menu">
     <li class="link">
			<a href="<?php echo U('Mobile/MyCart/mycart');?>">
				<i class="m_icon m_icon_privilege"></i>
				我的购物车
				<div class="right">
					<span class="m_arrow">
						<i class="rotate45"></i>
						<i class="rotate135"></i>
					</span>
				</div>
			</a>
		</li>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
    <ul class="m_list m_list_top_line bg_white p_index_menu">
     <li class="link"> <a href="<?php echo U('Mobile/Coupon/index');?>"> <i class="m_icon m_icon_sale"></i> 我的红包
       <div class="right">
         新增 <?php echo ($packet); ?> 张红包
        <span class="m_arrow"> <i class="rotate45"></i> <i class="rotate135"></i> </span> 
       </div> </a> </li> 
    </ul> 
    <div class="placeholder"></div>
    <div class="placeholder"></div> 
    <ul class="m_list m_list_top_line bg_white p_index_menu">
        <li class="link"> <a href="<?php echo U('Member/accout');?>"> <i class="m_icon m_icon_user"></i> 账户管理
            <div class="right">
                <span class="m_arrow"> <i class="rotate45"></i> <i class="rotate135"></i> </span>
            </div> </a> </li>
    </ul>

        <div class="placeholder"></div>
    <div class="placeholder"></div>
        <ul class="m_list m_list_top_line bg_white p_index_menu">
            <li class="link"> <a href="<?php echo U('Mobile/ManageAddress/manageaddress');?>"> <i class="m_icon m_address"></i> 地址管理
                <div class="right">
                    <span class="m_arrow"> <i class="rotate45"></i> <i class="rotate135"></i> </span>
                </div> </a> </li>
        </ul>

        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <ul class="m_list m_list_top_line bg_white p_index_menu">
     <li class="link"> <a href="<?php echo U('Mobile/Feedback/index');?>"> <i class="m_icon m_icon_help"></i> 帮助与反馈
       <div class="right"> 
        <span class="m_arrow"> <i class="rotate45"></i> <i class="rotate135"></i> </span> 
       </div> </a> </li> 
    </ul> 
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
  <script type="text/javascript" src="/Public/Mobile/js/zip.touch.member2_0.index.v36.js"></script> 
  <script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script> 

 </body>
</html>