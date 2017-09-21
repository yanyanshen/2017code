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
<script type="text/javascript" src="/Public/Admin/js/jquery.validate.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>

    <style type="text/css">

        input{
            margin-bottom: 6px;
        }
        lable.error{
            font-size: 14px;
            font-weight: bold;
            color: #FF0000;
        }
        lable.ok{
            font-size: 14px;
            font-weight: bold;
            color: #38D63B;
        }

    </style>
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
    <li><a href="#">会员管理</a></li>
    <li><a href="#">发送站内信</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    <div id="usual1" class="usual"> 
  	<div id="tab1" class="tabson">

    <form id="form" method="post">
    <ul class="forminfo">
    <li><label>收件人<b>*</b></label>
        <div class="vocation">
            <select name="role" class="select1">
                <option value="0">所有会员</option>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="$val.id"><?php echo ($val["vipname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
    </li>
    <li><label>主题<b>*</b></label><input name="title" type="text" class="dfinput" /></li>
    <li><label>内容<b>*</b></label>
        <span style="height: 20px;color: orangered"></span>
        <textarea name="content" style="width:345px;height:300px;border: 1px solid #D4E7F0;font-size: 16px;margin-top: 10px" id="content"></textarea>
    </li>
    <li><label>&nbsp;</label><input type="button" class="btn" value="发送"/></li>
    </ul>
    </form>

    </div>
	</div>
    </div>
</body>
<script>
    $(function(){
        $('#content').keyup(function(){
            var num=$(this).val().length;
            $('#form span').html('* 已经输入 '+num+' 字，还可以继续输入 '+(80-num)+' 字');
        })
        var title= function (value) {
            value = $.trim(value);
            if (value == '') {
                return '主题不能为空!';
            }else if (value.indexOf(' ') >= 0) {
                return '主题不能包含空格';
            }else{
                return true;
            }
        }
        $('.btn').click(function(){
            $('#form').submit();
        })
        $(window).keydown(function(event){
            if(event.keyCode==13){
                $('#form').submit();
            }
        })
        $('#form').submit(function(){
            if(title($("input[name='title']").val())!=1){
                layer.msg(title($("input[name='title']").val()),{time:3000,icon:5});
            }else if($('#content').val().length>80 || $('#content').val().length<=0){
                layer.msg('输入的字数不符合规定',{time:3000,icon:5});
            }else if(title($("input[name='title']").val())==1 && $('#content').val().length<80 && $('#content').val().length>0) {
                $.post("<?php echo U('User/sendUserMessage');?>", $('#form').serialize(), function (res) {
                    if (res.status == 1) {
                        layer.msg(res.info, {time: 3000, icon: 6}, function () {
                            location = "<?php echo U('sendUserMessage');?>";
                         })
                    } else {
                        layer.msg(res.info, {time: 3000, icon: 5});
                    }
                }, 'json')
            }
        })
    })
</script>

</html>