<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>

<!--<script type="text/javascript">
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
</script>-->
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
            background:#F27602;
            color:#FF0000;
        }
        #page span{
            background:#F27602;
            color:#FF0000;
            font-weight: bold;
        }
        #page{
            float: right;
        }
        .tablelink{
            cursor: pointer;
        }
        .message,.blue{
            font-size: 15px
        }
    </style>
    <script>
        $(function(){
            $('.operate').click(function(){
                var id=$(this).attr('id');
                $.post("<?php echo U('Advertise/operate');?>",{id:id},function(res){
                    if (res.status == 1) {
                        layer.msg('广告状态更改成功',{icon:6,time:2000},function(){
                            location="<?php echo U('Advertise/index');?>";
                        });
                    } else {
                        layer.msg('广告状态更改失败',{icon:5,time:2000},function(){
                            location="<?php echo U('Advertise/index');?>"
                        });
                    }
                },'json')
            });
            $('.delete').click(function(){
                var id=$(this).attr('id');
                $.post("<?php echo U('Advertise/delAdvertise');?>",{id:id},function(res){
                    if (res.status == 1) {
                        layer.msg('广告删除成功',{icon:6,time:2000},function(){
                            location="<?php echo U('Advertise/index');?>";
                        });
                    } else {
                        layer.msg('广告删除失败',{icon:5,time:2000},function(){
                            location="<?php echo U('Advertise/index');?>"
                        });
                    }
                },'json')
            })

        })
    </script>

</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">广告管理</a></li>
    <li><a href="#">广告列表</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
  
     
  	<div id="tab2" class="tabson">
    
    <form action="<?php echo U('Advertise/index');?>" type="get" id="form">
    <ul class="seachform">
    <li><label>综合查询</label><input name="keywords" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
    </ul>
    </form>

        <table class="tablelist">

    	<thead>
    	<tr>
        <th><input name="" type="checkbox" value="" checked="checked"/></th>
        <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th>广告标题</th>
        <th>广告图片</th>
        <th>广告描述</th>
        <th>广告位置</th>
        <th>发布时间</th>
        <th>状态</th>
        <th>操作</th>
        </tr>
        </thead>

        <tbody>

        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        <td><input name="" type="checkbox" value="" /></td>
        <td><?php echo ($k+$firstRow); ?></td>
        <td><?php echo ($val["title"]); ?></td>
        <td><img src="/Uploads/Advertises/<?php echo ($val["picurl"]); echo ($val["picname"]); ?>" alt="" width="100" height="50"/></td>
        <td><?php echo ($val["detail"]); ?></td>
            <?php if($val["position"] == 1): ?><td>轮播广告</td>
                <?php elseif($val["position"] == 2): ?>
                <td>一楼广告</td>
                <?php elseif($val["position"] == 3): ?>
                <td>二楼广告</td>
                <?php elseif($val["position"] == 4): ?>
                <td>三楼广告</td>
                <?php elseif($val["position"] == 5): ?>
                <td>手机广告</td>
                <?php else: ?>
                <td>其他广告</td><?php endif; ?>
        <td><?php echo date('Y-m-d H:i:s',$val['addtime']);?></td>
        <td><?php echo ($val['status']==0?'下架':'展示'); ?></td>
        <td><a href="#" class="tablelink operate" id="<?php echo ($val["id"]); ?>" ><?php echo ($val['status']==0?'展示':'下架'); ?></a>
                &nbsp;&nbsp;&nbsp;
            <a href="<?php echo U('Advertise/edit',array('id'=>$val['id']));?>" class="tablelink" > 编辑</a>
                &nbsp;&nbsp;&nbsp;
            <a href="#" class="tablelink delete" id="<?php echo ($val["id"]); ?> " > 删除</a>
        </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>

        <div class="pagin">
            <div class="message">共<i class="blue"> <?php echo ($count); ?> </i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($curPage); ?>&nbsp;</i>页</div>
            <div id="page"><?php echo ($page); ?></div>
        </div>
  
    
    </div>  
       
	</div> 
 
	<!--<script type="text/javascript">
      $("#usual1 ul").idTabs(); 
    </script>-->
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
    
    
    
    
    
    </div>


</body>

</html>