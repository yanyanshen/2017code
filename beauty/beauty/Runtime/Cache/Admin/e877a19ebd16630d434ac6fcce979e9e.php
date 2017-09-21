<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>品牌列表</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>

    <style type="text/css">
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
            float: right
        }


    </style>

<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
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
    <form action="<?php echo U('Brand/index');?>" method="get" class="form">
    <ul class="seachform">
    <li><label>综合查询</label><input name="chaXun" type="text" class="scinput" placeholder="请输入品牌关键字" /></li>
    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
    </ul>
    </form>
    <table class="tablelist">
    	<thead>
            <tr>

            <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
            <th>品牌名称</th>
            <th>品牌LOGO</th>
            <th>发布时间</th>
            <th>品牌展示状态</th>
            <th>操作</th>
            <th>品牌类型</th>
            </tr>
        </thead>
        <tbody>
        <?php if(is_array($BrandInfo)): $k = 0; $__LIST__ = $BrandInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                <td><?php echo ($k+$firstRow); ?></td>
                <td><?php echo ($val["bname"]); ?></td>
                <td><img src="/Upload/logo<?php echo ($val["blogopath"]); echo ($val["blogoname"]); ?>" alt="<?php echo ($val["bname"]); ?>"/></td>
                <td><?php echo ($val["addtime"]); ?></td>
                <td><?php echo ($val['status']==1?'展示':'下架'); ?></td>
                <td><a href="#"  onclick="return false" class="tablelink" id="<?php echo ($val["id"]); ?>" ><?php echo ($val['status']==0?'展示':'下架'); ?></a>
                  <!--  href="<?php echo U('Pay/Brand/upData',array('id'=>$val['id']));?>"-->
                <td>
                <?php if($val["brandtype"] == 1): ?>国际大牌
                    <?php elseif($val["brandtype"] == 2): ?> 推荐品牌
                    <?php elseif($val["brandtype"] == 3): ?> 国货精品<?php endif; ?>
               </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <div class="pagin">
       <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($nowPage); ?>&nbsp;</i>页</div>
        <div id="page"><?php echo ($Page); ?></div>
    </div>
    </div>
	</div> 

       <script>
           $(function() {
               $('.tablelink').click(function () {
                   var id = $(this).attr('id');
                   $.post("<?php echo U('Pay/Brand/upData');?>",{id:id}, function (res) {
                       if (res.status == 1) {
                           layer.msg('品牌状态更改成功', {icon: 6, time: 1000}, function () {
                               location = "<?php echo U('Brand/index');?>";
                           });
                       } else {
                           layer.msg('品牌状态更改失败', {icon: 5, time: 1000}, function () {
                               location = "<?php echo U('Brand/index');?>"
                           });
                       }
                   }, 'json')
               });
           })
        </script>
    </div>


</body>

</html>