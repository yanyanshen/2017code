<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
        });
    </script>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">

                    <ul class="forminfo">
                        <li>
                            <label style="width: 100px;">网站会员名<b>*</b></label>
                            <label><?php echo ($backInfo['mname']); ?></label>
                        </li>
                        <li>
                            <label style="width: 100px;">联系人姓名<b>*</b></label>
                            <label><?php echo ($backInfo["connectname"]); ?></label>
                        </li>
                        <li>
                            <label  style="width: 230px;">该用户对商品列表的总体满意度<b>*</b></label>
                            <label><?php echo ($backInfo["total"]); ?></label>
                        </li>
                        <li>
                            <label  style="width: 230px;">该用户对快速留言方式的总体满意度<b>*</b></label>
                            <label><?php echo ($backInfo["way"]); ?></label>
                        </li>
                        <li>
                            <label  style="width: 230px;">该用户对网站总体满意度<b>*</b></label>
                            <label><?php echo ($backInfo["satis"]); ?></label>
                        </li>
                        <li>
                            <label  style="width: 180px;">该用户对本站服务的满意度<b>*</b></label>
                            <label><?php echo ($backInfo["server"]); ?></label>
                        </li>
                        <li>
                            <label  style="width: 180px;">该用户对本站服务的满意度<b>*</b></label>
                            <label><?php echo ($backInfo["idea"]); ?></label>
                        </li>
                        <li>
                            <label  style="width: 180px;">联系电话<b>*</b></label>
                            <label><?php echo ($backInfo["mobile"]); ?></label>
                        </li>
                        <li>
                            <label  style="width: 180px;">反馈时间<b>*</b></label>
                            <label><?php echo (date('Y-m-d',$backInfo["backtime"])); ?></label>
                        </li>
                        <li><label style="width: 200px;">买家对网站的意见<b>*</b></label>
                            <textarea name="content" cols="30" rows="10"  style="width:600px;height:200px;border:1px solid #cccccc;"><?php echo ($backInfo["idea"]); ?></textarea></li>
                    </ul>

        </div>
    </div>
</div>
</body>

</html>