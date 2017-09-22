<?php if (!defined('THINK_PATH')) exit();?>﻿﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧菜单页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="/Public/Admin/js/jquery.js"></script>

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

    <!--<dl class="leftmenu">-->
        <!--<dd>-->
            <!--<div class="title">-->
                <!--<span><img src="/Public/Pay/images/leftico01.png" /></span>-->
                <!--<a href="<?php echo U('Index/main');?>" target="rightFrame">后台首页</a>-->
            <!--</div>-->
        <!--</dd>-->

        <!--<dd>-->
            <!--<div class="title">-->
                <!--<span><img src="/Public/Pay/images/leftico01.png" /></span>权限管理-->
            <!--</div>-->
            <!--<ul class="menuson">-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/index');?>" target="rightFrame">管理员列表</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/add');?>" target="rightFrame">添加管理员</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/changeInfo');?>" target="rightFrame">个人信息修改</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('AuthGroup/index');?>" target="rightFrame">管理组列表</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('AuthGroup/add');?>" target="rightFrame">添加管理组</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('AuthRule/index');?>" target="rightFrame">权限列表</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('AuthRule/add');?>" target="rightFrame">添加权限</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->

            <!--</ul>-->
        <!--</dd>-->
        <!--<dd>-->
            <!--<div class="title">-->
                <!--<span><img src="/Public/Pay/images/leftico01.png" /></span>系统管理-->
            <!--</div>-->
            <!--<ul class="menuson">-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('AdminNav/index');?>" target="rightFrame">菜单列表</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('AdminNav/add');?>" target="rightFrame">添加菜单</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->

            <!--</ul>-->
        <!--</dd>-->
        <!---->
        <!--<dd>-->
            <!--<div class="title">-->
                <!--<span><img src="/Public/Pay/images/leftico01.png" /></span>应聘信息-->
            <!--</div>-->
            <!--<ul class="menuson">-->
                <!--<li class="active">-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/Member/index');?>" target="rightFrame">应聘者列表</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</dd>-->

        <!--<dd>-->
            <!--<div class="title">-->
                <!--<span><img src="/Public/Pay/images/leftico01.png" /></span>分类管理-->
            <!--</div>-->
            <!--<ul class="menuson">-->
                <!--<li class="active">-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/TestCategory/index');?>" target="rightFrame">分类列表</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->

                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/TestCategory/add');?>" target="rightFrame">添加分类</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->

            <!--</ul>-->
        <!--</dd>-->
        <!--<dd>-->
            <!--<div class="title active">-->
                <!--<span><img src="/Public/Pay/images/leftico01.png" /></span>试题添加-->
            <!--</div>-->
            <!--<ul class="menuson">-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/Test/one_list');?>" target="rightFrame">单选题</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/Test/one_pic_list');?>" target="rightFrame">单选题（图片）</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/Test/two_list');?>" target="rightFrame">多选题</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/Test/two_pic_list');?>" target="rightFrame">多选题（图片）</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/Test/short_list');?>" target="rightFrame">简答题</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/Test/short_pic_list');?>" target="rightFrame">简答题(图片)</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="header">-->
                        <!--<cite></cite>-->
                        <!--<a href="<?php echo U('Pay/Test/addtestshow');?>" target="rightFrame">添加试题</a>-->
                        <!--<i></i>-->
                    <!--</div>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</dd>-->

    <!--</dl>-->
    <!--<a href="<?php echo U($v1['navurl']);?>" target="rightFrame"><?php echo ($v1["navname"]); ?></a>-->
    <dl class="leftmenu">
        <?php if(!empty($navList)): if(is_array($navList)): $i = 0; $__LIST__ = $navList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><dd>
                    <!--<div class="title">
                        <span><img src="/Public/Pay/images/leftico01.png" /></span>
                        <?php if(empty($v1['child'])): ?><a href="<?php echo U($v1['navurl']);?>" target="rightFrame"><?php echo ($v1["navname"]); ?></a>
                            <?php else: ?>
                            <?php echo ($v1["navname"]); endif; ?>
                    </div>-->
                    <?php if(empty($v1['child'])): ?><a href="<?php echo U($v1['navurl']);?>" target="rightFrame">
                            <div class="title">
                                <span><img src="/Public/Admin/images/leftico01.png" /></span>
                                <?php echo ($v1["navname"]); ?>
                            </div>
                        </a>
                        <?php else: ?>
                        <div class="title">
                            <span><img src="/Public/Admin/images/leftico01.png" /></span>
                            <?php echo ($v1["navname"]); ?>
                        </div><?php endif; ?>
                    <ul class="menuson">
                        <?php if(!empty($v1['child'])): if(is_array($v1['child'])): $k = 0; $__LIST__ = $v1['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($k % 2 );++$k;?><li class=<?php echo ($k==1?"active":''); ?>>
                                    <div class="header">
                                        <cite></cite>
                                        <a href="<?php echo U($v2['navurl']);?>" target="rightFrame"><?php echo ($v2["navname"]); ?></a>
                                        <i></i>
                                    </div>
                                </li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </ul>
                </dd><?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </dl>
    
</body>
</html>