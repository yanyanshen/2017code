<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/time/abc/timer/WdatePicker.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.btn').click(function(){
                $.post('<?php echo U("Pay/Sale/addActivity");?>',$('#form1').serialize(),function(res){
                    if(res.status==0){
                        if(res.info==1){
                            layer.msg('品牌,活动,和规则不能为空',{icon:2});
                        }else if(res.info==2){
                            layer.msg('时间范围不正确',{icon:2});
                        }else if(res.info==3){
                            layer.msg('该品牌已经添加过活动了',{icon:2});
                        }
                    }else{
                        if(res.info==1)
                       layer.msg('添加成功',{icon:1});
                    }
                })
            })



            $("#clear").click(function(){
                $.get('<?php echo U("Sale/clearCache");?>',function(res){
                    layer.msg(res.info,{icon:1});
                })
            })
        })
    </script>
<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
  
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 200
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
        <form action="" method="post" id="form1">
            <li>
                <label style="width: 100px">参加活动的品牌<b>*</b></label>
                <div class="vocation">
                    <select name="bname" class="select1">
                        <option>请选择</option>
                        <?php if(is_array($brandsList)): $i = 0; $__LIST__ = $brandsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><option><?php echo ($date["bname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>

                </div>
                <input style="padding: 10px;margin-left: 10px" type="button" value="清除品牌列表缓存" id="clear"/>
            </li>
            <li><label style="width: 100px">活动名称<b>*</b></label><input name="aname" type="text" class="dfinput" value=""  style="width:518px;"/></li>
            <li><label style="width: 100px">活动规则<b>*</b></label><input name="rules" type="text" class="dfinput" value=""  style="width:518px;"/></li>

            <li>
                <label style="width: 100px">活动时间<b>*</b></label>
                <input id="d11" name="time1" value="" type="text" onClick="WdatePicker()" style="width: 120px;height: 25px;border: 1px solid #cccccc;"/>
                <span style="display: inline-block;">-</span>
                <input class="Wdate"  name="time2" value="" type="text" id="d15" onFocus="WdatePicker({isShowClear:false,readOnly:true})" style="width: 120px;height: 25px;border: 1px solid #cccccc;"/>
            </li>
            <li><label style="width: 100px">&nbsp;</label><input name="" type="button" class="btn" value="点击发布"/></li>
        </form>
    </ul>
    </div>
       
	</div> 
 
	
    
    
    
    
    
    </div>


</body>

</html>