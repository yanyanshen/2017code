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
    <script src="/Public/Admin/js/layer/layer.js"></script>

    <script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
  
<!--<script type="text/javascript">
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
            $('.status').click(function(){
                var id=$(this).attr('id');
                $.post("<?php echo U('Pay/operate');?>", {id: id}, function (res) {
                    if (res.status == 1) {
                       layer.msg('管理员状态操作成功',{icon:6,time:2000},function(){
                           location="<?php echo U('Pay/index');?>";
                        });
                    } else {
                        layer.msg('管理员状态操作失败',{icon:5,time:2000},function(){
                           location="<?php echo U('Pay/index');?>"
                       });
                        }
                }, 'json')
            })
            $('.online').click(function(){
                var id=$(this).attr('id');
                $.post("<?php echo U('Pay/kick');?>", {id: id}, function (res) {
                    if (res.status == 1) {
                        layer.msg('管理员登录状态操作成功',{icon:6,time:2000},function(){
                            location="<?php echo U('Pay/index');?>";
                        });
                    } else {
                        layer.msg('管理员登录状态操作失败',{icon:5,time:2000},function(){
                            location="<?php echo U('Pay/index');?>"
                        });
                    }
                }, 'json')
            })
        })

        /*function change(obj) {
            var id = obj.id;
        }*/

    </script>

</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="#">首页</a></li>
    <li><a href="#">系统管理</a></li>
    <li><a href="#">管理员列表</a></li>

    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
  
     
  	<div id="tab2" class="tabson">
    
    <form action="<?php echo U('Pay/index');?>" method="get">
    <ul class="seachform">

    <li><label>管理员查询</label><input name="keywords" value="<?php echo ($keywords); ?>" type="text" class="scinput" /></li>
    <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
    
    </ul>
    </form>
    
    
    <table class="tablelist">
    	<thead>
    	<tr>
        <th>编号</th>
        <th>管理员</th>
        <th>添加时间</th>
        <th>编辑时间</th>
        <th>最近登录</th>
        <th>身份</th>
        <th>所属组</th>
        <th>登录状态</th>
        <th>账号状态</th>
        <th>操作</th>
        </tr>
        </thead>

        <tbody>
        <?php if(is_array($adminList)): $k = 0; $__LIST__ = $adminList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
        <td><?php echo ($k+$firstRow); ?></td>
        <td><?php echo ($val["username"]); ?></td>
        <td><?php echo date('Y-m-d H:i:s',$val['addtime']);?></td>
            <td><?php echo date('Y-m-d H:i:s',$val['edittime']);?></td>
            <td><?php echo date('Y-m-d H:i:s',$val['lastlogin']);?></td>
            <?php if($val["permissions"] == 1): ?><td>超级管理员</td>
                <?php else: ?>
                <td>普通管理员</td><?php endif; ?>
            <td><?php echo ($val["group"]); ?></td>
            <td><?php echo ($val['online']==0?'未登录':'在线'); ?></td>
            <td><?php echo ($val['status']==0?'禁用':'激活'); ?></td>


        <td>
            <a href="#" id="<?php echo ($val["id"]); ?>" class="tablelink status"><?php echo ($val['status']==0?'激活':'禁用'); ?></a>&nbsp;&nbsp;
            <a href="<?php echo U('edit',array('id'=>$val['id']));?>" class="tablelink">编辑</a>&nbsp;&nbsp;
            <a href="#" id="<?php echo ($val["id"]); ?> " class="tablelink online"><?php echo ($val['online']==0?'':'下线'); ?></a>
        </td>


        <!--<td><a href="#" id="<?php echo ($k+$firstRow); ?>" class="tablelink" onclick="change(this)" ><?php echo ($val['status']==0?'激活':'停权'); ?></a></td>-->
        <!--<td><a href="<?php echo U('Pay/operate',array('id'=>$val['id']));?>" class="tablelink"><?php echo ($val['status']==0?'激活':'停权'); ?></a></td>-->



        </tr><?php endforeach; endif; else: echo "" ;endif; ?>


        </tbody>
    </table>

        <div class="pagin">
            <div class="message">共<i class="blue"> <?php echo ($count); ?> </i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($curPage); ?>&nbsp;</i>页</div>
            <div id="page"><?php echo ($page); ?></div>
        </div>
  
    </div>
    </div>  
       
	</div> 
 
	<script type="text/javascript">
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>
</html>