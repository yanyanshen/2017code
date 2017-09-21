<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jQuery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script src="/Public/Admin/js/layer/layer.js"></script>


    <script type="text/javascript">
        $(document).ready(function(e) {
            //异步提交表单
            $('.btn').click(function(){
                $.post("<?php echo U('edit');?>",$('#form1').serialize(),function(res){
                    if(res.status==1){
                        layer.msg(res.info, {icon:1},function(){
                            location=res.url;
                        });
                    }else{
                        layer.msg(res.info);
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
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="" method="post" id="form1">
                <input type="hidden" value="<?php echo ($adminInfo["id"]); ?>" name="id"/>
            <ul class="forminfo">
                <li>
                    <label>所属组<b>*</b></label>
                    <?php if(is_array($groupList)): $i = 0; $__LIST__ = $groupList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><span style="float:left;margin-right: 25px;">
                        <label for="<?php echo ($value["title"]); ?>" style="width: 70px"><?php echo ($value["title"]); ?></label>
                        <input name="group_id[]" <?php echo in_array($value['id'],$adminInfo['gid'])?'checked':'';?> id="<?php echo ($value["title"]); ?>" type="checkbox" value="<?php echo ($value["id"]); ?>" class="dfinput"  style="width:18px;"/>
                        </span><?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
                <li><label>用户名<b>*</b></label><input name="username" value="<?php echo ($adminInfo["username"]); ?>" type="text" class="dfinput" placeholder="请填写用户名"  style="width:400px;"/></li>
                <li><label>密　码<b>*</b></label>
                    <input name="password" type="password" class="dfinput" value="" placeholder="不填写则保持原密码不变" style="width:400px;"/>
                </li>
                <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确认编辑"/></li>
            </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>