<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <style>
        .paginList a, .paginList span{display: inline-block;width:18px;height:18px ;padding: 5px;margin: 2px;text-decoration: none;text-align: center;line-height: 18px;background: #cccccc;  color:#000000;  border: 1px solid #c2d2d7;  }
        .paginList a:hover{background: mediumblue;color:#fff;  }
        .paginList span{background: mediumblue;color: #fff;font-weight: bold;}

    </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/time/abc/timer/WdatePicker.js"></script>
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

<form action="<?php echo U('search');?>" method="get" id="form1">
    <ul class="seachform">
    <li>
        <label>评价时间：</label>
        <input id="d11" type="text" onClick="WdatePicker()" style="width: 120px;height: 25px;border: 1px solid #cccccc;" name="time1" value="<?php echo ($time1); ?>"/>
        <span style="display: inline-block;">-</span>
        <input name="time2" class="Wdate" type="text" id="d15" value="<?php echo ($time2); ?>" onFocus="WdatePicker({isShowClear:false,readOnly:true})" style="width: 120px;height: 25px;border: 1px solid #cccccc;"/>
    </li>
        <li><label>回复状态：</label>
            <div class="vocation">
                <select class="select3" name="status">
                    <option value="0">全部</option>
                    <option value="1" >未回复</option>
                    <option value="2">已回复</option>
                </select>

            </div>
        </li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
    <li><label>&nbsp;</label><input name="" type="reset" class="scbtn" value="重置"/></li>
    </ul>
 </form>
    
    <table class="tablelist" style="text-align: center;">
    	<thead style="text-align: center;">
    	<tr >
        <th style="text-align: center;">编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th style="text-align: center;">用户</th>
        <th style="text-align: center;">oid</th>
        <th style="text-align: center;">商品名称</th>
        <th style="text-align: center;">状态</th>
        <th style="text-align: center;">类别</th>
        <th style="text-align: center;">回复状态</th>
        <th style="text-align: center;">评价时间</th>
        <th style="text-align: center;">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($commentList)): $k = 0; $__LIST__ = $commentList;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        <td><?php echo ($k+$firstRow); ?></td>
        <td><?php echo ($val["username"]); ?></td>
        <td><?php echo ($val["oid"]); ?></td>
        <td><?php echo ($val["goodsname"]); ?></td>
        <td><?php echo ($val["statusname"]); ?></td>
            <?php if($val["cosid"] == 1): ?><td>好评</td>
                <?php elseif($val["cosid"] == 2): ?>
                <td>中评</td>
                <?php elseif($val["cosid"] == 3): ?>
                <td>差评</td><?php endif; ?>
        <td><?php echo ($val['respid']==2?'已回复':'未回复'); ?></td>
        <td><?php echo (date('Y-m-d H:i:s',$val["coaddtime"])); ?></td>
        <td><a href="<?php echo U('Comment/response',array('oid'=>$val['oid'],'gid'=>$val['gid'],'mid'=>$val['mid'],'coaddtime'=>$val['coaddtime']));?>" class="tablelink"><?php echo ($val['respid']==1?'回复':''); ?></a>
            <a href="<?php echo U('Comment/see',array('oid'=>$val['oid'],'gid'=>$val['gid'],'mid'=>$val['mid'],'coaddtime'=>$val['coaddtime']));?>"><?php echo ($val['respid']==2?'查看评价':''); ?></a>
        </td>
        </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
        </tbody>
    </table>
       <div class="pagin">
        <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue" name="current">&nbsp;<?php echo ($current); ?></i>页</div>
        <ul class="paginList">
            <?php echo ($page); ?>
        </ul>
    </div>
  
    
    </div>  
       
	</div> 
 
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs();

    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
    </div>


</body>

</html>