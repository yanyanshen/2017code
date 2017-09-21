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
    <script src="/Public/Admin/js/layer/layer.js"></script>
    <style>
        .btn{margin-top: 30px;margin-left: 30px;border-radius: 10px}
    </style>

    <script type="text/javascript">
        $(document).ready(function(e) {
            //异步提交表单
            $('.btn1').click(function(){
                $.post("<?php echo U('addMember');?>",$('#form1').serialize(),function(res){
                    if(res.status==1){
                        layer.msg(res.info, {icon:1}, function(){
                            location.href=res.url;
                        });
                    }else{
                        layer.msg(res.info,{icon:5});
                    }
                })
                return false;
            })
            $('.btn2').click(function(){
                $.post("<?php echo U('addMember');?>",$('#form2').serialize(),function(res){
                    if(res.status==1){
                        layer.msg(res.info, {icon:1}, function(){
                            location.href=res.url;
                        });
                    }else{
                        layer.msg(res.info,{icon:5});
                    }
                })
                return false;
            })
        })
  </script>
</head>

<body>
<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">权限管理</a></li>
        <li><a href="#">添加组员</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="" method="post" id="form1">
            <ul class="forminfo">
                <li style="display: none"><label>管理组ID<b>*</b></label><input name="gid" value="<?php echo ($gid); ?>" type="text" class="dfinput" style="width:200px;"/></li>
                <li><label>管理员名字<b>*</b></label><input name="username" type="text" class="dfinput" placeholder="请填写管理员名字" style="width:200px;"/></li>
                <li><label>&nbsp;</label><input name="" type="button" class="btn btn1" value="确认添加"/></li>
            </ul>
            </form>
        </div>
    </div>
    <div class="tabson" style="margin-top: 100px">
        <form action="" method="post" id="form2">
            <ul class="forminfo">
                <!--<li><input type="hidden" value="<?php echo ($accessInfo['uid']); ?>" name="id"/></li>-->
                <li style="display: none"><label>管理组ID<b>*</b></label><input name="gid" value="<?php echo ($gid); ?>" type="text" class="dfinput" style="width:200px;"/></li>
                <li>
                    <label>管理员<b>*</b></label>
                    <div style="margin-left: 120px;">
                    <?php if(is_array($admins)): $i = 0; $__LIST__ = $admins;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><span style="margin-right: 25px;border: 1px solid #ffffff">
                        <!--<label for="<?php echo ($val["username"]); ?>" style="width: 70px;"><?php echo ($val["username"]); ?></label>
                        <input name="uid[]" id="<?php echo ($val["username"]); ?>" type="checkbox" value="<?php echo ($val["id"]); ?>" class="dfinput"  style="width:18px;"/>-->

                        <label for="<?php echo ($val["username"]); ?>" style="width: 70px;"><?php echo ($val["username"]); ?></label>
                        <input name="uid[]" <?php echo in_array($val['id'],$accessInfo['uid'])?'checked':'';?> id="<?php echo ($val["username"]); ?>" type="checkbox" value="<?php echo ($val["id"]); ?>" class="dfinput"  style="width:18px;"/>

                        </span><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </li>
                <li><label>&nbsp;</label><input name="" type="button" class="btn btn2" value="确认添加"/></li>
            </ul>
        </form>
    </div>
</div>
</body>
</html>