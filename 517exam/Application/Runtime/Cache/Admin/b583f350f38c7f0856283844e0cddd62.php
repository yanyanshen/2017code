<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

    <title>★我要去学车客服销售考试★</title>
    <link href="/Public/Admin/exam/style/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link href="/Public/Admin/exam/style/jquery.mmenu.all.css" rel="stylesheet" />
    <script type="text/javascript" src="/Public/Admin/exam/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/exam/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/exam/js/jquery.hammer.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/exam/js/jquery.mmenu.min.all.js"></script>
    <script type="text/javascript" src="/Public/Admin/exam/layer/layer.js"></script>
    <script src="/Public/Admin/exam/js/wxm-core.js"></script>
    <style>

        li{width: 390px;float: left}
    </style>
</head>
<body id="test1" class="test1">
<div id="content" >
    <div class="container" style="width: 95%">
        <div class="text-center header" >
            <h1 class="bold" style="color: #ff992c">
                ★选择题★
            </h1>
            <span>
                <p style="color: #464646" id="timeshow">
                    <div>
                        <dl>
                            <dd>姓名:<?php echo ($name); ?>&nbsp;&nbsp;
                                <?php if($score_short != 0): ?>简答题得分:<?php echo ($score_short); ?>&nbsp;&nbsp;<?php endif; ?>
                                选择题得分:<?php echo ($score); ?>
                            </dd>
                        </dl>
                    </div>
                </p>
            </span>
        </div>

        <div id="bd" class="panel">
            <div id="panel2" class="panel-body" >
                <?php if(is_array($arr)): $k = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k; if($data["type"] == 1): ?><div style="width:400px;float: left;margin-left: 40px">
                            <dl style="text-align: left">
                                <dd><?php echo ($k); ?>.<?php echo ($data["question"]); ?> (多选题)</dd>
                            </dl>
                            <ul class="list-group" style="text-align: left;float:left;">
                                <li class="list-group-item" >
                                    A.<?php echo ($data["a"]); ?>
                                </li>
                                <li class="list-group-item">
                                    B.<?php echo ($data["b"]); ?>
                                </li>
                                <li class="list-group-item">
                                    C.<?php echo ($data["c"]); ?>
                                </li>
                                <li class="list-group-item" >
                                    D.<?php echo ($data["d"]); ?>
                                </li>
                                <li class="list-group-item" >
                                    正确选项：<?php echo ($data["right_answer"]); ?> &nbsp;&nbsp;&nbsp;您的选项是：
                                    <?php if(($data['info']['score'] == 0) or ($data['info']['score'] == 2)): ?><span style="color: red"><?php echo ($data['info']['answer']); ?></span>
                                        <?php else: ?>
                                        <span style="color: green"><?php echo ($data['info']['answer']); ?></span><?php endif; ?>
                                    <?php if($data['info']['answer'] == ''): ?><span style="color: red">答案为空</span><?php endif; ?>
                                </li>
                            </ul>
                        </div>
                        <div style="float:left;margin-top: 40px;width:243px;height: 210px;margin-left: 20px">
                            <?php if($data["ifimg"] == 1): ?><img style="width:240px;height: 180px;" src="<?php echo ($server); ?>/uploads/TestPic/<?php echo ($data['image']['picurl']); ?>300_<?php echo ($data['image']['picname']); ?>" alt=""/><?php endif; ?>
                        </div><?php endif; ?>

                    <?php if($data["type"] == 0): ?><div style="width:400px;float: left;margin-left: 40px">
                            <dl style="text-align: left">
                                <dd><?php echo ($k); ?>.<?php echo ($data["question"]); ?> (单选题)</dd>
                            </dl>
                            <ul class="list-group" style="text-align: left;float:left;">
                                <li class="list-group-item" >
                                    A.<?php echo ($data["a"]); ?>
                                </li>
                                <li class="list-group-item">
                                    B.<?php echo ($data["b"]); ?>
                                </li>
                                <li class="list-group-item">
                                    C.<?php echo ($data["c"]); ?>
                                </li>
                                <li class="list-group-item" >
                                    D.<?php echo ($data["d"]); ?>
                                </li>
                                <li class="list-group-item" >
                                    正确选项：<?php echo ($data["right_answer"]); ?> &nbsp;&nbsp;&nbsp;您的选项是：
                                    <?php if(($data['info']['score'] == 0) or ($data['info']['score'] == 2)): ?><span style="color: red"><?php echo ($data['info']['answer']); ?></span>
                                        <?php else: ?>
                                        <span style="color: green"><?php echo ($data['info']['answer']); ?></span><?php endif; ?>
                                    <?php if($data['info']['answer'] == ''): ?><span style="color: red">答案为空</span><?php endif; ?>
                                </li>
                            </ul>
                        </div>
                        <div style="float:left;margin-top: 40px;width:243px;height: 210px;margin-left: 20px">
                            <?php if($data["ifimg"] == 1): ?><img style="width:240px;height: 180px;" src="<?php echo ($server); ?>/uploads/TestPic/<?php echo ($data['image']['picurl']); ?>300_<?php echo ($data['image']['picname']); ?>" alt=""/><?php endif; ?>
                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>