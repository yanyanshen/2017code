<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">微信管理</a></li>
    </ul>
</div>
    <a href="<?php echo U('WeChat/createMenu');?>">创建菜单</a>
    <a href="<?php echo U('WeChat/deleteMenu');?>">删除菜单</a>
</body>
</html>