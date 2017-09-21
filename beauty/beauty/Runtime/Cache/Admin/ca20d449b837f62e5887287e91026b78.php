<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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


    <script type="text/javascript">
        $(document).ready(function(e) {

            $(".select1").uedSelect({
                width: 345
            });
            $(".select2").uedSelect({
                width: 167
            });
            $(".select3").uedSelect({
                width: 100
            });
            //异步提交表单
            $('.btn').click(function(){
                $.post("<?php echo U('edit');?>",$('#form1').serialize(),function(res){
                    if(res.status==1){
                        layer.msg(
                                res.info,
                                {icon:1},
                                function(){
                                    location.href="<?php echo U('index');?>";
                                }
                        );
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
                <ul class="forminfo">
                    <li style="display: none"><label>菜单ID<b>*</b></label><input name="id" class="dfinput" value="<?php echo ($id); ?>"  style="width:400px;"/></li>
                    <li><label>菜单名称<b>*</b></label><input name="navname" type="text" class="dfinput" value="<?php echo ($navname); ?>"  style="width:400px;"/></li>
                    <li><label>菜单链接<b>*</b></label><input name="navurl" type="text" class="dfinput" value="<?php echo ($navurl); ?>"  style="width:400px;"/></li>
                    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确认编辑"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>