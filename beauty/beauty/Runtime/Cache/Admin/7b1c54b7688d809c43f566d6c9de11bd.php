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
        <th style="font-size: 10px;">编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
        <th style="font-size: 10px;">图片</th>
        <th style="font-size: 10px;">名称</th>
        <th style="font-size: 10px;">分类</th>
        <th style="font-size: 10px;">品牌</th>
        <th style="font-size: 10px;">市场价格</th>
        <th style="font-size: 10px;">所需积分</th>
        <th style="font-size: 10px;">描述</th>
        <th style="font-size: 10px;">库存</th>
        <th style="font-size: 10px;">销售数量</th>
        <th style="font-size: 10px;">发布时间</th>
        <th style="font-size: 10px;">是否展示</th>
        <th style="font-size: 10px;">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(is_array($goodslist)): $k = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
            <td style="font-size: 10px;"><?php echo ($k+$firstRow); ?></td>
            <td><img src="/Uploads/<?php echo ($val["imageurl"]); ?>100_<?php echo ($val["imagename"]); ?>" alt="" width="50" height="50"/></td>
            <td style="font-size: 10px;"><?php echo mb_substr($val['goodsname'],0,10,'utf-8');?>...</td>
            <td style="font-size: 10px;"><?php echo ($val["cname"]); ?></td>
            <td style="font-size: 10px;"><?php echo ($val["bname"]); ?></td>
            <td style="font-size: 10px;"><?php echo ($val["marketprice"]); ?></td>
            <td style="font-size: 10px;"><?php echo ($val["saleprice"]); ?></td>
            <td style="font-size: 10px;"><?php echo ($val["description"]); ?></td>
            <td style="font-size: 10px;"><?php echo ($val["num"]); ?></td>
            <td style="font-size: 10px;"><?php echo ($val["salenum"]); ?></td>
            <td style="font-size: 10px;"><?php echo date('Y-m-d H:i:s',$val['addtime']);?></td>
            <td style="font-size: 10px;"><?php echo ($val['show']==1?'展示':'下架'); ?></td>
            <td style="font-size: 10px;"><a href="<?php echo U('Pay/Golds/editor',array('gid'=>$val['id']));?>" class="tablelink">编辑&nbsp;&nbsp;&nbsp;&nbsp;</a><a href="<?php echo U('Pay/Golds/updateshow',array('gid'=>$val['id']));?>" class="tablelink"><?php echo ($val['show']==1?'下架':'展示'); ?></a></td>
        </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
    </tbody>
</table>

<table border=1 cellpadding=0 cellspacing=0 width="100%" >

    <tr>
        <td style='width:54pt' align="center">编号</td>
        <td style='width:54pt' align="center">名称</td>
        <td style='width:54pt' align="center">分类</td>
        <td style='width:54pt' align="center">品牌</td>
        <td style='width:54pt' align="center">市场价格</td>
        <td style='width:54pt' align="center">所需积分</td>
        <td style='width:54pt' align="center">描述</td>
        <td style='width:54pt' align="center">库存</td>
        <td style='width:54pt' align="center">销售数量</td>
    </tr>
    <?php if(is_array($goodsinfo)): $k = 0; $__LIST__ = $goodsinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?><tr>
            <td style="font-size: 10px;"><?php echo ($k); ?></td>
            <td style="text-align: center;width: 240px;"><?php echo ($v["goodsname"]); ?></td>
            <td style="text-align: center;width: 200px;"><?php echo ($v["cname"]); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($v["bname"]); ?></td>
            <td style="text-align: center;width: 60px;"><?php echo ($v["marketprice"]); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($v["saleprice"]); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($v["description"]); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($v["num"]); ?></td>
            <td style="text-align: center;width: 100px;"><?php echo ($v["salenum"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</body>
</html>