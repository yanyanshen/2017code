<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        #page a,#page span{
            display: inline-block;
            width:18px;
            height:18px ;
            padding: 5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 18px;
            background: #f0ead8;
            color:#000000;
            border: 1px solid #c2d2d7;
        }
        #page a:hover{
            background: #333;
            color:#fff;
        }

        #page span{
            background: #333;
            color: #fff;
            font-weight: bold;
        }
    </style>
<title>列表页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<!--<script type="text/javascript" src="/Public/Pay/map/jquery.map"></script>-->
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/time/abc/timer/WdatePicker.js"></script>

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
  	<div id="tab2" class="tabson">

        <!--<form action="<?php echo U('Category/index');?>" method="get">-->
            <!--<ul class="seachform">-->
                <!--<li><label>按名称查询</label><input name="keywords" type="text" value="<?php echo ($keywords); ?>" class="scinput" /></li>-->
                <!--<li>-->
                    <!--<label>按时间时间：</label>-->
                    <!--<input id="d11" name="time1" value="" type="text" onClick="WdatePicker()" style="width: 120px;height: 25px;border: 1px solid #cccccc;"/>-->
                    <!--<span style="display: inline-block;">-</span>-->
                    <!--<input class="Wdate"  name="time2" value="" type="text" id="d15" onFocus="WdatePicker({isShowClear:false,readOnly:true})" style="width: 120px;height: 25px;border: 1px solid #cccccc;"/>-->
                <!--</li>-->
                <!--<li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>-->
                <!--<li><label>&nbsp;</label>-->
                    <!--<input type="button" class="scbtn" id="exportdata" value="Excel表导出" style="width: 90px;height: 35px;margin:0;padding: 0;"/></li>-->
            <!--</ul>-->
        <!--</form>-->

    <table class="tablelist">
    	<thead>
    	<tr>
            <th><input name="" type="checkbox" value="" checked="checked"/></th>
            <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
            <th>分类名称</th>
            <th>分类Id</th>
            <th>上级分类</th>
            <th>分类父Id</th>
            <th>添加时间</th>
            <th>是否展示</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
            <?php if(is_array($list1)): $k = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($k % 2 );++$k;?><tr>
                    <td><input name="" type="checkbox" value="" /></td>
                    <td><?php echo ($k+$firstRow); ?></td>
                    <td><?php echo ($date["cname"]); ?></td>
                    <td><?php echo ($date["id"]); ?></td>
                    <td><?php echo (substr($list3[$k-1]['path'],0,-2)); ?></td>
                     <td><?php echo ($date["pid"]); ?></td>
                    <td><?php echo (date('Y-m-d',$date["create_time"])); ?></td>
                    <td class="zhuangtai"><?php echo ($date['status']?'展示':'下架'); ?></td>
                    <td class="par">
                        <a href="javascript:;" pid="<?php echo ($date['pid']); ?>" id="<?php echo ($date['id']); ?>" class="tablelink click"><?php echo ($date['status']?'下架':'展示'); ?></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="<?php echo U('Admin/TestCategory/editorCate',array('id'=>$date['id']));?>" class="tablelink">编辑</a>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>

       <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($currentPage); ?></i>页</div>
        <ul class="paginList">
            <div id="page"><?php echo ($page); ?></div>
        </ul>
    </div>

	</div>

    </div>
</div>

</body>
<script type="text/javascript">
    $("#usual1 ul").idTabs();
</script>

<script type="text/javascript">
    $('.tablelist tbody tr:odd').addClass('odd');
</script>
</html>

<script>
    $(function(){
        $("#exportdata").click(function(){
            $.post("<?php echo U('Admin/Category/export');?>?time1=<?php echo ($time1); ?>&time2=<?php echo ($time2); ?>&keywords=<?php echo ($keywords); ?>",'',function(res){
                if(res.status==1){
                    window.open("<?php echo U('Admin/Category/export');?>?time1=<?php echo ($time1); ?>&time2=<?php echo ($time2); ?>&keywords=<?php echo ($keywords); ?>");
                }else{
                    layer.msg(res.info,{icon:5});
                }
            })
        })
    })


    $(function(){
        $('.click').click(function(){
            id=$(this).attr('id');
            pid=$(this).attr('pid');
            cur=$(this);
            $.post("<?php echo U('Admin/TestCategory/updateshow');?>",{id:id,pid:pid},function(response){
                if(response.status){
                    if(response.info==1){
                        layer.msg('更改成功',{icon:1},function(){
                            location='<?php echo U("TestCategory/index");?>';
                        });
                    }
                }
            })
        })
    })



</script>