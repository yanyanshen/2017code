<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧菜单页</title>
<link href="/test/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/test/Public/Admin/js/jquery.js"></script>

<script type="text/javascript">
$(function(){
	//导航切换
	$(".menuson .header").click(function(){
		var $parent = $(this).parent();
		$(".menuson>li.active").not($parent).removeClass("active open").find('.sub-menus').hide();

		$parent.addClass("active");
		if(!!$(this).next('.sub-menus').size()){
			if($parent.hasClass("open")){
				$parent.removeClass("open").find('.sub-menus').hide();
			}else{
				$parent.addClass("open").find('.sub-menus').show();
			}
		}
	});

	// 三级菜单点击
	$('.sub-menus li').click(function(e) {
        $(".sub-menus li.active").removeClass("active")
		$(this).addClass("active");
    });

	$('.title').click(function(){
		var $ul = $(this).next('ul');
		$('dd').find('.menuson').slideUp();
		if($ul.is(':visible')){
			$(this).next('.menuson').slideUp();
		}else{
			$(this).next('.menuson').slideDown();
		}
	});
})
</script>


</head>

<body style="background:#f0f9fd;">
	<div class="lefttop"><span></span>后台管理</div>

    <dl class="leftmenu">

        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>
                <a href="<?php echo U('Index/main');?>" target="rightFrame">后台首页</a>
            </div>
        </dd>
        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>系统管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Index/main');?>" target="rightFrame">后台首页</a>
                        <i></i>
                    </div>
                   <ul class="sub-menus">
                      <li><a href="javascript:;">文件管理</a></li>
                      <li><a href="javascript:;">模型信息配置</a></li>
                      <li><a href="javascript:;">基本内容</a></li>
                      <li><a href="javascript:;">自定义</a></li>
                  </ul>
                </li>

                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AdminNav/index');?>" target="rightFrame">菜单列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AdminNav/add');?>" target="rightFrame">添加菜单</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>权限管理
            </div>
            <ul class="menuson">
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/index');?>" target="rightFrame">管理员列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/add');?>" target="rightFrame">添加管理员</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/changeInfo');?>" target="rightFrame">个人信息修改</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AuthGroup/index');?>" target="rightFrame">管理组列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AuthGroup/add');?>" target="rightFrame">添加管理组</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AuthRule/index');?>" target="rightFrame">权限列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('AuthRule/add');?>" target="rightFrame">添加权限</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>品牌管理
            </div>
        	<ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Brand/index');?>" target="rightFrame">品牌列表</a>
                        <i></i>
                    </div>
                    <ul class="sub-menus">
                      <li><a href="javascript:;">文件管理</a></li>
                      <li><a href="javascript:;">模型信息配置</a></li>
                      <li><a href="javascript:;">基本内容</a></li>
                      <li><a href="javascript:;">自定义</a></li>
                  </ul>
                </li>

                <li>
                    <div class="header">
                    <cite></cite>
                    <a href="<?php echo U('AddBrand/add');?>" target="rightFrame">添加品牌</a>
                    <i></i>
                    </div>
                </li>

            </ul>
        </dd>



        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>商品管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Goods/index');?>" target="rightFrame">商品列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                    <cite></cite>
                    <a href="<?php echo U('Goods/addAct');?>" target="rightFrame">添加商品</a>
                    <i></i>
                    </div>
                </li>

            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>会员管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('User/UserList');?>" target="rightFrame">会员列表</a>
                        <i></i>
                    </div>
                </li>

                <li>
                    <div class="header">
                    <cite></cite>
                    <a href="<?php echo U('BrandAdd/UserAdd');?>" target="rightFrame">添加会员</a>
                    <i></i>
                    </div>
                </li>
            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>订单管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Order/index');?>" target="rightFrame">订单列表</a>
                        <i></i>
                    </div>
                </li>
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Order/dfk');?>" target="rightFrame">待付款订单</a>
                        <i></i>
                    </div>
                </li>
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Order/dfh');?>" target="rightFrame">待发货订单</a>
                        <i></i>
                    </div>
                </li>
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Order/yfh');?>" target="rightFrame">已发货订单</a>
                        <i></i>
                    </div>
                </li>
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Order/ysh');?>" target="rightFrame">已收货订单</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>广告管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Advertise/index');?>" target="rightFrame">广告列表</a>
                        <i></i>
                    </div>
                </li>
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Advertise/add');?>" target="rightFrame">添加广告</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>活动发布
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Sale/index');?>" target="rightFrame">活动列表</a>
                        <i></i>
                    </div>
                </li>
                <li>
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Sale/add');?>" target="rightFrame">添加活动</a>
                        <i></i>
                    </div>
                </li>

            </ul>
        </dd>


        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>评论管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Comment/index');?>" target="rightFrame">评论列表</a>
                        <i></i>
                    </div>
                </li>
            </ul>
             <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Comment/index');?>" target="rightFrame">已回复</a>
                        <i></i>
                    </div>
                </li>
            </ul>
             <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Comment/index');?>" target="rightFrame">未回复</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>


        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>题目管理
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Test/testlistshow');?>" target="rightFrame">试题列表</a>
                        <i></i>
                    </div>
                </li>
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Test/addtestshow');?>" target="rightFrame">添加试题</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>

        <dd>
            <div class="title">
                <span><img src="/test/Public/Admin/images/leftico01.png" /></span>金币商城
            </div>
            <ul class="menuson">
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Golds/index');?>" target="rightFrame">商品列表</a>
                        <i></i>
                    </div>
                </li>
                <li class="active">
                    <div class="header">
                        <cite></cite>
                        <a href="<?php echo U('Admin/Golds/addAct');?>" target="rightFrame">添加商品</a>
                        <i></i>
                    </div>
                </li>
            </ul>
        </dd>
    </dl>
    <!--<a href="<?php echo U($v1['navurl']);?>" target="rightFrame"><?php echo ($v1["navname"]); ?></a>-->
    <!--<dl class="leftmenu">-->
        <!--<?php if(!empty($navList)): ?>-->
            <!--<?php if(is_array($navList)): $i = 0; $__LIST__ = $navList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?>-->
                <!--<dd>-->
                    <!--&lt;!&ndash;<div class="title">-->
                        <!--<span><img src="/test/Public/Admin/images/leftico01.png" /></span>-->
                        <!--<?php if(empty($v1['child'])): ?>-->
                            <!--<a href="<?php echo U($v1['navurl']);?>" target="rightFrame"><?php echo ($v1["navname"]); ?></a>-->
                            <!--<?php else: ?>-->
                            <!--<?php echo ($v1["navname"]); ?>-->
                        <!--<?php endif; ?>-->
                    <!--</div>&ndash;&gt;-->
                    <!--<?php if(empty($v1['child'])): ?>-->
                        <!--<a href="<?php echo U($v1['navurl']);?>" target="rightFrame">-->
                            <!--<div class="title">-->
                                <!--<span><img src="/test/Public/Admin/images/leftico01.png" /></span>-->
                                <!--<?php echo ($v1["navname"]); ?>-->
                            <!--</div>-->
                        <!--</a>-->
                        <!--<?php else: ?>-->
                        <!--<div class="title">-->
                            <!--<span><img src="/test/Public/Admin/images/leftico01.png" /></span>-->
                            <!--<?php echo ($v1["navname"]); ?>-->
                        <!--</div>-->
                    <!--<?php endif; ?>-->
                    <!--<ul class="menuson">-->
                        <!--<?php if(!empty($v1['child'])): ?>-->
                            <!--<?php if(is_array($v1['child'])): $k = 0; $__LIST__ = $v1['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($k % 2 );++$k;?>-->
                                <!--<li class=<?php echo ($k==1?"active":''); ?>>-->
                                    <!--<div class="header">-->
                                        <!--<cite></cite>-->
                                        <!--<a href="<?php echo U($v2['navurl']);?>" target="rightFrame"><?php echo ($v2["navname"]); ?></a>-->
                                        <!--<i></i>-->
                                    <!--</div>-->
                                <!--</li>-->
                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                        <!--<?php endif; ?>-->
                    <!--</ul>-->
                <!--</dd>-->
            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
        <!--<?php endif; ?>-->
    <!--</dl>-->
    
</body>
</html>