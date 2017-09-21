<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>商品分类</title>
    <meta charset="utf-8" />
    <link rel="icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="bookmark" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <meta content=" width = device-width , initial-scale = 1.0 , maximum-scale = 1.0 , user-scalable = no " id="viewport" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
</head>
<body>
<!--改版后 com1-3.css可以去掉-->
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/com1-3.css?2015091515" />
<!--新改的-->
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/com1-4.css?2015091515" />
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/download.css?2015091515" />
<link type="text/css" rel="stylesheet" href="/Public/Mobile/css/public-adaptation1-1.css?2015091515" />
<script src="/Public/Mobile/js/jquery.js?2015091515"></script>
<script>var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','category','index'],'2015/09/15 15:59:20',0,false]; var DOMIN = {MAIN:"http://m.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};</script>
<script>
    var JAVASCRIPT_LIB = (('\v' !== 'v') ? 'zepto' : 'jquery');
    JAVASCRIPT_LIB="jquery";
    DOMIN.MAIN = 'http://m.paixie.net';
    DOMIN.PAIXIE = 'http://www.paixie.net';
    // uc浏览器添加书签功能   
    window.onmessage = function(event){
        if(event.data.message != ''){
            $('#otherPage').remove();
        }else{
            $('#otherPage').show();
        }
    };
</script>
<script src="/Public/Mobile/js/com.js?2015091515"></script>
<script src="/Public/Mobile/js/px-verify.js?2015091515"></script>
<script src="/Public/Mobile/js/template.js?2015091515"></script>
<!--红包分享，临时添加-->
<!-- uc 浏览器添加书签 start --->
<iframe src="http://app.uc.cn/appstore/AppCenter/frame?uc_param_str=nieidnutssvebipfcp&amp;api_ver=2.0&amp;id=1904" width="100%" height="160" style="display:none" id="otherPage"></iframe>
<!-- uc 浏览器添加书签 end   ---->
<script>

</script>
<div class="com-content">
    <script>
        function open_notice(id){
            setCookie('touch_notice_close',1);
            var url = '/new/info/'+id+'.html';
            window.location.href=url;
        };
        var touch_notice_close = getCookie('touch_notice_close');
        if(touch_notice_close == '1' && typeof(document.getElementById('js-com-notification2')) != 'undefined' && document.getElementById('js-com-notification2') != null){
            document.getElementById('js-com-notification2').style.display = 'none';
        }


    </script>
    <script>
        $(document).ready(function(e) {
            publicHeadFoot(); // 首页公共部分进行头尾部公用
            $('.dload a.close').click(function(){
                $(this).parent().remove();
                setCookie('tipdownapp',1);
            });
        });
    </script>
    <div class="com-header-area" style="display:none">
    </div>
    <div class="clearboth"></div>
    <div class="com-content-area" id="js-com-content-area">
        <div class="mask hidden"></div>
        <!--content-->
        <style type="text/css">
            .m_bg{background-image: url(/Public/Mobile/images/base.png);background-size: 345px 350px;}
            .holdspace{ height:50px;}
            .com-title{ position:fixed; height:45px; left:0; z-index:3; top:0; width:100%; font-family:微软雅黑 !important;}
            .com-title .home_menu{display: inline-block;vertical-align: middle; right:2%; top:-4%; width:10%;}
            .com-title .home_menu span:after,
            .com-title .home_menu span:before,
            .com-title .home_menu span{display: inline-block;vertical-align: middle;width: 6px;height: 6px;border-radius: 3px;background: #ffffff;position: relative;}
            .com-title .home_menu span:after{content: ' ';position: absolute;right:-10px;top:0;}
            .com-title .home_menu span:before{content: ' ';position: absolute;left:-10px;top:0;}
            .rotate45{webkit-transform:rotate(45deg) scale(1.00,1.00) translate(0px,0px) skew(0deg,0deg);transform:rotate(45deg) scale(1.00,1.00) translate(0px,0px) skew(0deg,0deg);}
            .m_menu{z-index: 20;position: fixed;top:45px;right:5px;margin-left: -320px;}
            .m_menu>div{margin-left:340px;width: 160px;background: #292c33;border-radius: 6px;}
            .m_menu>div>i{width: 26px;height: 26px;position: absolute;right:15px;top:-12px;background: #292c33;}
            .m_menu>div>a{color: #949599;text-decoration: none;display: block;height: 50px;line-height: 50px;border-bottom:2px solid #1f2126;padding-left:65px;position: relative;}
            .m_menu>div>a:last-child{border-bottom:0;line-height: 50px;}
            .m_menu>div>a>span{position: absolute;top:0;left:24px;}
            .m_menu>div>a>span>i{width: 23px;height: 21px;display: inline-block;vertical-align: middle;}
            .m_menu>div>a:nth-child(2)>span>i{background-position: 0 -251px;}
            .m_menu>div>a:nth-child(3)>span>i{background-position: -25px -251px;}
            .m_menu>div>a:nth-child(4)>span>i{background-position: -52px -251px;}
            .m_menu>div>a:nth-child(5)>span>i{background-position: -78px -251px;}
            .spaceholder{ height:45px;}
            .hidden{ display:none;}
            .mask{ background: #FFF; opacity: 0.01;z-index: 19; width: 100%;height: 100%; position: absolute;top: 0;left: 0;}
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                var $header = $('.com-title');
                if($header.length){
                    $header.find('.home_menu').click(function(){
                        var _menu = $('.m_menu').removeClass('hidden');
                        var _mask = $('.mask').removeClass('hidden');
                        _menu.unbind('click').click(function(){
                            _mask.click();
                        });
                        _mask.click(function(){
                            _menu.addClass('hidden');
                            _mask.addClass('hidden');
                        });
                    })
                };
            });
        </script>
        <link rel="stylesheet" type="text/css" href="/Public/Mobile/css/classify.1.1.css?4" />
        <div class="com-title">
            <a title="返回" href="javascript:history.back(-1);"><span style="width: 80px;color:white;font-weight: bold;display: inline-block;">&lt;</span></a>
            <a title="菜单" href="javascript:history.back(-1);" class="home_menu"> <span></span> </a> 找商品
        </div>
        <div class="m_menu hidden">
            <div>
                <i class="rotate45"></i>
                <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
                <a href="<?php echo U('Mobile/Search/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
                <a href="<?php echo U('Mobile/MyCart/mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
                <a href="<?php echo U('Mobile/Member/index');?>"><span><i class="m_bg"></i></span>用户中心</a>
            </div>
        </div>
        <div class="spaceholder"></div>
        <div class="p-area">
            <div class="p-tag">
                <a href="<?php echo U('Mobile/Category/index');?>" class="current">分类</a>
                <a href="<?php echo U('Mobile/Category/brand');?>">品牌</a>
            </div>
            <div class="p-content">
                <div class="p-conleft">
                    <ul class="classify-title" id="js-classify-title">
                        <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li style="color:#; " class="on"><?php echo ($list['cname']); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div class="p-conright">
                    <!--分类 -->
                    <div class="js-con-0">
                        <!--				<div class="p-ad"><img src="/Public/Mobile/images/qq.jpg"></div>-->
                        <!--二级分类单元-->
                        <div class="p-two-title">
                            <p style="color:#; ">人气单品</p>
                            <ul class="p-three-title">
                                <?php if(is_array($one)): $i = 0; $__LIST__ = array_slice($one,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                    <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                    <span style="font-size: 0.06rem ;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?>...</span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#cf2d76; ">热搜榜</p>
                            <ul class="p-three-title">
                                <?php if(is_array($one)): $i = 0; $__LIST__ = array_slice($one,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">面霜</p>
                            <ul class="p-three-title">
                                <?php if(is_array($one1)): $i = 0; $__LIST__ = array_slice($one1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="">眼霜</p>
                            <ul class="p-three-title">
                                <?php if(is_array($one2)): $i = 0; $__LIST__ = array_slice($one2,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style=" ">补水</p>
                            <ul class="p-three-title">
                                <?php if(is_array($one3)): $i = 0; $__LIST__ = array_slice($one3,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">面膜</p>
                            <ul class="p-three-title">
                                <?php if(is_array($one4)): $i = 0; $__LIST__ = array_slice($one4,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style=" ">护肤套装</p>
                            <ul class="p-three-title">
                                <?php if(is_array($one5)): $i = 0; $__LIST__ = array_slice($one5,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div>
                        <!--二级分类单元- end -->
                    </div>
                    <div class="js-con-1" style="display:none;">
                        <!--二级分类单元-->
                        <div class="p-two-title">
                            <p style="color:#; ">人气单品</p>
                            <ul class="p-three-title">
                                <?php if(is_array($two)): $i = 0; $__LIST__ = array_slice($two,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">人气推荐</p>
                            <ul class="p-three-title">
                                <?php if(is_array($two)): $i = 0; $__LIST__ = array_slice($two,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">沐浴露</p>
                            <ul class="p-three-title">
                                <?php if(is_array($two1)): $i = 0; $__LIST__ = array_slice($two1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">晒后修护</p>
                            <ul class="p-three-title">
                                <?php if(is_array($two2)): $i = 0; $__LIST__ = array_slice($two2,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">精油区</p>
                            <ul class="p-three-title">
                                <?php if(is_array($two3)): $i = 0; $__LIST__ = array_slice($two3,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <!--二级分类单元- end -->
                    </div>
                    <div class="js-con-2" style="display:none;">
                        <!--二级分类单元-->
                        <div class="p-two-title">
                            <p style="color:#; ">人气单品</p>
                            <ul class="p-three-title">
                                <?php if(is_array($three)): $i = 0; $__LIST__ = array_slice($three,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">人气热卖</p>
                            <ul class="p-three-title">
                                <?php if(is_array($three)): $i = 0; $__LIST__ = array_slice($three,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">卸妆</p>
                            <ul class="p-three-title">
                                <?php if(is_array($three1)): $i = 0; $__LIST__ = array_slice($three1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">防晒</p>
                            <ul class="p-three-title">
                                <?php if(is_array($three2)): $i = 0; $__LIST__ = array_slice($three2,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">BB霜</p>
                            <ul class="p-three-title">
                                <?php if(is_array($three3)): $i = 0; $__LIST__ = array_slice($three3,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">香水区</p>
                            <ul class="p-three-title">
                                <?php if(is_array($three4)): $i = 0; $__LIST__ = array_slice($three4,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <!--二级分类单元- end -->
                    </div>
                    <div class="js-con-3" style="display:none;">
                        <!--二级分类单元-->
                        <div class="p-two-title">
                            <p style="color:#; ">人气单品</p>
                            <ul class="p-three-title">
                                <?php if(is_array($four)): $i = 0; $__LIST__ = array_slice($four,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">热卖推荐</p>
                            <ul class="p-three-title">
                                <?php if(is_array($four)): $i = 0; $__LIST__ = array_slice($four,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">洗发套装</p>
                            <ul class="p-three-title">
                                <?php if(is_array($four1)): $i = 0; $__LIST__ = array_slice($four1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">洗发乳</p>
                            <ul class="p-three-title">
                                <?php if(is_array($four2)): $i = 0; $__LIST__ = array_slice($four2,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">护发素</p>
                            <ul class="p-three-title">
                                <?php if(is_array($four3)): $i = 0; $__LIST__ = array_slice($four3,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">护发精油</p>
                            <ul class="p-three-title">
                                <?php if(is_array($four4)): $i = 0; $__LIST__ = array_slice($four4,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <!--二级分类单元- end -->
                    </div>
                    <div class="js-con-4" style="display:none;">
                        <!--二级分类单元-->
                        <div class="p-two-title">
                            <p style="color:#; ">人气单品</p>
                            <ul class="p-three-title">
                                <?php if(is_array($five)): $i = 0; $__LIST__ = array_slice($five,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">洁面</p>
                            <ul class="p-three-title">
                                <?php if(is_array($five1)): $i = 0; $__LIST__ = array_slice($five1,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">润肤乳</p>
                            <ul class="p-three-title">
                                <?php if(is_array($five2)): $i = 0; $__LIST__ = array_slice($five2,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">男性爽肤水</p>
                            <ul class="p-three-title">
                                <?php if(is_array($five3)): $i = 0; $__LIST__ = array_slice($five3,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <!--二级分类单元- end -->
                    </div>
                    <div class="js-con-5" style="display:none;">
                        <!--二级分类单元-->
                        <div class="p-two-title">
                            <p style="color:#; ">超值单品</p>
                            <ul class="p-three-title">
                                <?php if(is_array($six)): $i = 0; $__LIST__ = array_slice($six,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">热卖推荐</p>
                            <ul class="p-three-title">
                                <?php if(is_array($six)): $i = 0; $__LIST__ = array_slice($six,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">补水</p>
                            <ul class="p-three-title">
                                <?php if(is_array($six1)): $i = 0; $__LIST__ = array_slice($six1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">美白</p>
                            <ul class="p-three-title">
                                <?php if(is_array($six2)): $i = 0; $__LIST__ = array_slice($six2,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                        <p style="color:#; ">保湿</p>
                        <ul class="p-three-title">
                            <?php if(is_array($six4)): $i = 0; $__LIST__ = array_slice($six4,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                    <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                    <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="clearboth"></div>
                        </ul>
                    </div>
                        <div class="p-two-title">
                            <p style="color:#; ">洗面奶</p>
                            <ul class="p-three-title">
                                <?php if(is_array($six5)): $i = 0; $__LIST__ = array_slice($six5,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <!--二级分类单元- end -->
                    </div>
                    <div class="js-con-6" style="display:none;">
                        <!--二级分类单元-->
                        <div class="p-two-title">
                            <p style="color:#; ">人气单品</p>
                            <ul class="p-three-title">
                                <?php if(is_array($seven)): $i = 0; $__LIST__ = array_slice($seven,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">热卖推荐</p>
                            <ul class="p-three-title">
                                <?php if(is_array($seven)): $i = 0; $__LIST__ = array_slice($seven,3,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">乳液</p>
                            <ul class="p-three-title">
                                <?php if(is_array($seven1)): $i = 0; $__LIST__ = array_slice($seven1,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">精华水</p>
                            <ul class="p-three-title">
                                <?php if(is_array($seven2)): $i = 0; $__LIST__ = array_slice($seven2,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <div class="p-two-title">
                            <p style="color:#; ">粉底液</p>
                            <ul class="p-three-title">
                                <?php if(is_array($seven3)): $i = 0; $__LIST__ = array_slice($seven3,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li> <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['gid']));?>">
                                        <img src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" alt="" />
                                        <span style="font-size: 0.06rem;color: #000000 "><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?></span> </a> </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                <div class="clearboth"></div>
                            </ul>
                        </div>
                        <!--二级分类单元- end -->
                    </div>
                    <!--分类- end -->
                </div>
                <div class="clearboth"></div>
            </div>
        </div>
        <!--content-end-->
    </div>
    <div class="com-footer-area" id="js-com-footer-area">
        <span class="top"></span>
        <div class="footer">
            <div class="com-footer-area" id="js-com-footer-area">
    <span class="top"></span>
    <div class="footer">
        <div class="nav">
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
        <div class="copy">
            &copy;2007-2015
            <a href="http://m.paixie.net/" style="color:#9ea4b1;">Paixie</a> All Rights Reserved
            <br />闽B2-20110084
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#OUT').click(function () {
            $.post("<?php echo U('Mobile/Login/LoginOut');?>", function (res) {
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
</div>

<!--<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-45921315-2', 'paixie.net');
    ga('send', 'pageview');

</script>-->
<div style="display:none;">
</div>
<script type="text/javascript">
    top.ztetbdata = null;
</script>
<script src="/Public/Mobile/js/classify.1.1.js"></script>
</body>
</html>