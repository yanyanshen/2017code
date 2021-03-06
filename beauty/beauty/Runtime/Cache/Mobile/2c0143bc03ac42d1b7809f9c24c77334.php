<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>商品列表</title>
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
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/base.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/page.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/mui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/loaders.min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/loading.css"/>
    <script src="/Public/Mobile/list/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','list2.0','index'],'2015/09/15 16:17:01',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script>

    <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.list2_0.index.v3902355.css" type="text/css" />
    <script type="text/javascript" src="/Public/Mobile/js/zepto.min.js"></script>



    <script src="/Public/Mobile/layer_mobile/layer.js" type="text/javascript"></script>
    <style type="text/css">
        .m_header,
        .body{max-width: 640px;}
        .m_header{left:50%;margin-left: -320px;}
        .actived{color:#fff;background: #FF4A4A;width: 70px;}
        #test {
            margin:0 auto;font-size: 16px;font-style: italic;
            width: 100%;height: 95px;color: red;line-height: 30px ;
            word-spacing: 5px;
            margin-top: 20px;
            overflow:hidden;
            padding: 5px;
            text-align: center;
        }
    </style>
    <script type="text/javascript">function remReSize(){var w = $(window).width();try{w = $(parent.window).width();}catch(ex){};if(w>640){w = 640;};$('html').css('font-size',100/640*w+'px');$('#js_style_for_pc').remove();$('body').append('<style id="js_style_for_pc">.m_header{margin-left: -'+w/2+'px;}.m_menu{margin-left: -'+w/2+'px;}</style>');};remReSize();$(window).resize(remReSize);$(document).ready(function() {remReSize();});for(var i=0;i<3;i++){setTimeout(remReSize, 100*i);};</script>
</head>
<body>
<div class="body">
    <div class="m_header">
        <p> <a class="bt_prev" href="javascript:history.back(-1);"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p>
        <h1 class="ellipsis bt_title" style="margin-top:3%"> 黄金会员专享 </h1>
        <p> <a href="<?php echo U('Mobile/Search/index');?>"><i class="m_icon m_icon_search"></i></a> <a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p>
    </div>
    <div class="m_menu hidden">
        <div>
            <i class="rotate45"></i>
            <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
            <a href="<?php echo U('Mobile/Category/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
            <a href="<?php echo U('Mobile/MyCart/mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
            <a href="<?php echo U('Mobile/Member/index');?>"><span><i class="m_bg"></i></span>beauty中心</a>
        </div>
    </div>
    <div class="m_goods">
        <div id="js_goodslist" class="m_list m_goods_list">
        </div>
    </div>
    <div class="m_goods">
        <div id="js_hotgoodslist" class="m_list m_goods_list">
            <div id="test">
                <div id="test1">
                    欢迎来到黄金会员专享！！！<br>
                    您是黄金会员吗？<br>
                    若不是黄金会员，请赶紧消费赚积分，升级会员吧<br>
                    <span style="font-weight: bold;font-size: 20px;">黄金会员可以享受商品的7折优惠哦！！！</span><br>
                    快去消费吧！！！<br>
                </div>
                <div id="test2"></div>
            </div>
            <div class="lists clearfloat">
                <div class="bottom clearfloat">
                    <?php if(is_array($goodsInfo)): $i = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="lie clearfloat">
                            <a href="<?php echo U('Mobile/Huiyuan/goodsdetail',array('gid'=>$data['id']));?>">
                                <div class="tu clearfloat fl">
                                    <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>"/>
                                </div>
                            </a>
                            <a href="<?php echo U('Mobile/Huiyuan/goodsdetail',array('gid'=>$data['id']));?>">
                                <p style="font-size: 0.2rem" class="tit"><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?>...</p>
                            </a>
                            <br>
                            <a href="<?php echo U('Mobile/Huiyuan/goodsdetail',array('gid'=>$data['id']));?>">
                                <p  style="font-size:0.3rem;color: #ff6c4c"><span style="color: orangered;">黄金会员价：</span>￥<?php echo ($data['saleprice']); ?></p>
                            </a>
                            <br>

                            <a href="<?php echo U('Mobile/Huiyuan/goodsdetail',array('gid'=>$data['gid']));?>">
                                <span>
                                  <span style="margin-right: 10px;font-size: 16px;color: black;">找相似</span>
                                </span>
                            </a>
                            <span  style="margin-left: 50%" class="fr db" gid="<?php echo ($data['id']); ?>">收藏</span>
                        </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="m_loading m_loaded" data-url="/list2.0?t=1&@lastid=@lastid" data-lastid="1" data-listid="js_hotgoodslist" data-template="tpl_hotlist">
    正在加载...
</div>
<div class="placeholder"></div>
<div class="placeholder"></div>
<div class="text-center">
    <a class="m_button m_button_radius">没有更多了</i>
    </a>
    <i class="m_icon m_icon_nosearch"></i>
</div>

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
<div style="display:none;">
</div>
</div>
<script type="text/javascript" src="/Public/Mobile/js/zip.touch.list2_0.index.v13619.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script>

</body>
</html>
<script type="text/javascript">
    var test=document.getElementById("test");
    var test1=document.getElementById("test1");
    var test2=document.getElementById("test2");

    test2.innerHTML=test1.innerHTML;
    function move(){
        if(test1.offsetHeight - test.scrollTop <= 0){
            test.scrollTop-=test1.offsetHeight;
        }
        test.scrollTop++;

        //window.document.title=test.scrollTop+",test1.offsetTop="+test2.offsetTop;
    }

    setInterval("move()", 50);
</script>