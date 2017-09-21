<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>我的收藏</title>
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
    <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','cart2.0','index'],'2015/09/15 16:00:42',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script>
    <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.cart2_0._all_.v39013.css" type="text/css" />
    <script type="text/javascript" src="/Public/Mobile/js/zepto.min.js"></script>
    <script src="/Public/Mobile/list/js/jquery.min.1.8.2.js" type="text/javascript"></script>
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
        <p> <a class="bt_prev" href="javascript:window.history.back();void(0);"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p>
        <h1 class="ellipsis bt_title">收藏 </h1>
        <p> <a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p>
    </div>
    <div class="m_menu hidden">
        <div>
            <i class="rotate45"></i>
            <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
            <a href="<?php echo U('Mobile/Category/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
            <a href="<?php echo U('Mobile/Mycart/Mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
            <a href="<?php echo U('Mobile/Member/index');?>"><span><i class="m_bg"></i></span>我的用户中心</a>
        </div>
    </div>
    <div class="lib_content" id="js_lib_content">
        <!--购物车有商品-->
        <div class="car_opera">
            <label class="m_radio m_order_checkbox"> <input class="js_select_all" type="checkbox" /> </label>
            <label for="select_all" class="gray6">全选</label>
            <i class="m_icon m_icon_delete_gray right deleteAll" id=""></i>

        </div>
        <form id="js-form" action="/order/trolly?1442304042" method="post">
            <!-- 供应商 start ------------------------------------------->
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="goodsbox">
                    <ul class="goodslist">
                        <li>
                            <div class="img">
                                <label class="m_radio m_order_checkbox m_checked">
                                    <input type="checkbox" itemid="10780995380" name="business[30462][items][10780995380][itemid]"
                                           value="1078099" />
                                </label>
                                <div class="img_type">
                                    <img class="img180" src="/Uploads/<?php echo ($data["imageurl"]); echo ($data["imagename"]); ?>" />
                                </div>
                            </div>
                            <div class="info">
                                <p class="title">
                                    <a class="name gray3" href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <?php echo (mb_substr($data['goodsname'],0,15,utf8)); ?>...
                                    </a>
                                </p>
                                <!--<p class="numbox"> <a class="del noclick" href="javascript:void(0)">-</a> <input class="num" type="text" name="business[30462][items][10780995380][num]" value="1" brandid="1067" itemid="10780995380" data-maxnum="10" /> <a class="add" href="javascript:void(0)">+</a> <i class="clear"></i> </p>-->
                            </div>
                            <div class="price">
                                <input type="hidden" name="business[30462][items][10780995380][sizeid]" value="538" />
                                <span class="oof">￥</span>
                                <span class="js-price"> <?php echo ($data['saleprice']); ?></span>
                                <br />
                                <br />
                                <i gid="<?php echo ($data['gid']); ?>" class="m_icon m_icon_delete_gray right delete" id="js-delcar"></i>
                            </div>
                            <div class="clear"></div>
                            <p class="additional gray9 text-left red">【该商品不支持货到付款】</p>
                        </li>
                    </ul>
                </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
            <div class="fixed_price" style="display: none;">
                <div class="price_info">
                    <p class="total" style="padding: 0;line-height: 40px;height: 40px;">
                        <label class="m_radio m_order_checkbox"> <input class="js_select_all" type="checkbox" style="display: none;"/></label>
                </div>
            <div style="text-align: center;color: #a9a9a9">没有更多了</div>
        </form>

        <div class="m_footer clear">
            <a class="m_icon m_icon_gotop hidden" href="javascript:void(0);"></a>
            <script>
                $(".delete").click(function(){
                    if($('.m_radio ').hasClass('m_checked')){
                        var gid=$(this).attr('gid');
                        var a=$(this);
                        $.get('<?php echo U("Mobile/Collect/deletecollect");?>?gid='+gid,function(res){
                            if(res.status==1){
                                layer.open({
                                    content:'删除成功'
                                    ,skin:'msg'
                                    ,time:5
                                    ,end:function(){
                                        a.parents('li').hide();
                                    }
                                })
                            }
                        })
                    }else{
                        layer.open({
                            content:'请选择后再删除'
                            ,skin:'msg'
                            ,time:5
                        })
                    }
                })

                $(".deleteAll").click(function(){
                    if($('.m_radio ').hasClass('m_checked')){
                        $.get('<?php echo U("Mobile/Collect/deleteAll");?>',function(res){
                            if(res.status==1){
                                layer.open({
                                    content:'删除成功'
                                    ,skin:'msg'
                                    ,time:3
                                    ,end:function(){
                                        location='<?php echo U("Collect/index");?>'
                                    }
                                })
                            }
                        })
                    }else{
                        layer.open({
                            content:'请选择后再删除'
                            ,skin:'msg'
                            ,time:5
                        })
                    }
                })
            </script>
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
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
        <div class="placeholder"></div>
    </div>
    <script type="text/javascript" src="/Public/Mobile/js/zip.touch.cart2_0._all_.v3624.js"></script>
    <script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script>

</div>
</body>
</html>