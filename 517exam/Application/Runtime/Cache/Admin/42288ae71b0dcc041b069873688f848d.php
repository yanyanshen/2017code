<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>试题发布</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
    <script type="text/javascript">


    </script>


</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">试题管理</a></li>
        <li><a href="#">excel表格上传</a></li>
    </ul>
</div>
<div>
    <img src="<?php echo ($server); ?>/Uploads/Exceldest/3.png" alt=""/>
</div>
<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">
            <form action="<?php echo U('Pay/Test/import_excel');?>" id="form1" method="post" enctype="multipart/form-data">
                    <ul class="forminfo">
                        <li>
                            <p style="float: left;padding-top: 8px;font-size: 14px;">试题的分类有：</p>
                            <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><p style="float: left;padding-top: 8px;color:red;font-size: 14px;"><?php echo ($data["cname"]); ?> 、</p><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li>
                            <!--<label>插入的表格的后缀必须是.xls<b>*</b></label>-->
                            <label style="font-size: 15px">注意:<b>*</b></label>
                            <p style="float: left;padding-top: 8px;color:red;font-size: 14px;">插入的表格的后缀必须是.xls,表格内容见上图</p>
                        </li>
                        <li>
                            <label>导入Excel表<b>*</b></label>
                            <input style="width: 320px;height:240px;border:1px solid #808080;padding-top: 110px;padding-left:100px;float: left;" name="excelname" type="file" />
                        </li>

                        <li>
                            <label>&nbsp;</label>
                            <input style="margin-top: 10px;" type="button" class="btn" value="导入"/>
                        </li>
                    </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>


<script>
    $('.btn').click(function(){
        $('.btn').attr('disabled','disabled');
        $('#form1').ajaxSubmit(function(res) {
            if (res.info == 'null') {
                layer.msg('您上传的文件不能为空');
            }else if(res.info=='type'){
                layer.msg('您上传的文件类型不正确，请重新上传');
            }else if(res.info=='file_error'){
                layer.msg('上传失败');
            }else if(res.info==1){
                layer.msg('导入成功');
            }
        },'json')
    })

</script>