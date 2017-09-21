<?php if (!defined('THINK_PATH')) exit();?><html xmlns:o="urn:schemas-microsoft-com:office:office"
      xmlns:x="urn:schemas-microsoft-com:office:excel"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta name=ProgId content=Excel.Sheet>
    <meta name=Generator content="Microsoft Excel 11">
</head>
<body>
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
            <td><?php echo (date('Y-m-d',$date["addtime"])); ?></td>
            <td><?php echo ($date['show']?'展示':'下架'); ?></td>
            <td><a href="<?php echo U('Pay/Category/showCate',array('id'=>$date['id']));?>" class="tablelink"><?php echo ($date['show']?'下架':'展示'); ?></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Pay/Category/editorCate',array('id'=>$date['id']));?>" class="tablelink">编辑</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    </tbody>
</table>

</body>
</html>