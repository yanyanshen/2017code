<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品成功加入购物车</title>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/public.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css">
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/search.css">
    <style type="text/css">
        #cart td{
            border: 0;
            text-align: left;
            color: #666;
            font-size: 16px;
        }
    </style>
    <script type="text/javascript" src="/Public/Home/js/jQuery.1.8.2.min.js"></script>
</head>
<body>
<!--  头部开始 -->
<!-- 头部结束 -->

<div style="margin-bottom:20px;padding:45px;height: 300px">
    <div class="box">
        <h1 style="color:#71B247;height:150px;line-height:150px;padding-left:100px;margin:10px 0;display: inline-block;" name="orderno">订单<?php echo ($orderno); ?>支付成功！</h1>
        <a href="<?php echo U('Home/Index/index');?>" style="background-color: red;display: inline-block;width: 150px;padding:15px 30px;color: #ffffff;font-size: 16px;text-align: center;" target="_self" >返回首页继续购物</a>
        <a href="<?php echo U('Home/Member/Orderform');?>" style="background-color: red;margin-left:50px;display: inline-block;width: 150px;padding:15px 30px;color: #ffffff;font-size: 16px;text-align: center;" target="_self" >我的订单</a>
        <dl style="margin-left: 50px;font-size:14px;">
            <dt>温馨提示：</dt>
            <dd> &nbsp;</dd>
            <dd>1. 请保持手机畅通，以便快递公司和您联系，确保收件顺利</dd>
            <dd> &nbsp;</dd>
            <dd>2. 如有疑问，请拨打客服电话：400-6666-8888</dd>
        </dl>

    </div>
</div>

<div class="pxlistcon box">
    <div class="pxlist" >
        <h3>推荐用户购买</h3>
            <ul>
                <?php if(is_array($goodsInfo)): $i = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                    <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$v['id']));?>" title="">
                        <img src="/Uploads/<?php echo ($v["imageurl"]); echo ($v["imagename"]); ?>" alt="" />
                        <span><?php echo ($v["goodsname"]); ?></span>
                    </a>
                    <p>￥<?php echo ($v["saleprice"]); ?><del style="color: #ccc;margin-left: 20px;"><?php echo ($v["marketprice"]); ?></del></p>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
    </div>

</div>
<div style="clear:both;"></div>
<!-- 尾部开始 -->
<div class="footer">

    <p>手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖 | 手机热卖</p>
    <p>版权所有：河南云和数据信息技术有限公司</p>
    <p>© CopyRight2016 All rights reserved.</p>
    <p>豫ICP备14003305号</p>
</div>
<!-- 尾部结束 -->
<!--返回顶部开始-->
<a href="#" class="goTop">返回顶部</a>
<!--返回顶部结束-->
</body>
<script type="text/javascript">
    $(function() {
        $('.cateList').hide();
    });

    function sort(v) {
        $(v).addClass('active').siblings().removeClass('active');
    }
</script>
</html>