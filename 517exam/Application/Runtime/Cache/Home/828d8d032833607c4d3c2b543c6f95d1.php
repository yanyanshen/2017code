<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

    <title>★我要去学车客服销售考试★</title>
    <link href="/Public/Home/exam/style/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link href="/Public/Home/exam/style/jquery.mmenu.all.css" rel="stylesheet" />
    <script type="text/javascript" src="/Public/Home/exam/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/js/jquery.hammer.min.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/js/jquery.mmenu.min.all.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/layer/layer.js"></script>
    <script src="/Public/Home/exam/js/wxm-core.js"></script>

    <style>
        #body{
            width:700px;background-color: #f5f5f5;
        }
        li{width: 700px;}
    </style>
</head>
<body id="test1" class="test1">
<div id="content">

    <div class="container" style="width: 1300px;margin: 0 auto">

        <?php if($userid != 0): ?><div  class="panel" style="text-align: center">
                <h1 style="color: green">对不起，您的手机号可能填写有误
                    <a href="<?php echo U('Home/Index/index');?>" style="text-decoration: none">返回查询页</a>
                </h1>
            </div><?php endif; ?>
        <?php if($correct_papers == 0 ): ?><div  class="panel" style="text-align: center">
                <h1 style="color: green">
                    您的简答题还未批改，请稍候再进行查看
                    <a href="<?php echo U('Home/Index/index');?>" style="text-decoration: none">【返回查询页】</a>
                </h1>
            </div><?php endif; ?>
        <?php if($correct_papers == 1): ?><div class="text-center header" >
                <h1 class="bold" style="color: #ff992c">
                    ★简答题★
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
            <form action="#" method="POST" id="form1">
                <div  class="panel" style="width:450px;float: left;">
                    <div id="panel3" class="panel-body">
                        <?php if(is_array($arr)): $k = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k;?><div>
                                <div style="width:  500px;">
                                    <dl>
                                        <dd>
                                            参考答案
                                            &nbsp;&nbsp;
                                            得分: <span style="margin-bottom: 5px;"><?php echo ($data['info']['score']); ?></span>
                                        </dd>
                                        <dd>
                                         <textarea disabled cols="50" rows="10" style="text-align: left;margin-bottom: 10px">
                                            <?php echo ($data["right_answer"]); ?>
                                        </textarea>
                                        </dd>
                                    </dl>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>

                <div id="bd" class="panel" style="width:700px;float: left;">
                    <div id="panel2" class="panel-body">
                        <?php if(is_array($arr)): $k = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k;?><div style="float: left;width: 600px;">
                                <dd><?php echo ($k); ?>.<?php echo ($data["question"]); ?></dd>
                            </div>
                            <div>
                                <div style="width:400px;float: left;">
                                    <dl>
                                        <dd >
                                        <textarea  disabled cols="50" rows="10" style="text-align: left">
                                            <?php echo ($data['info']["answer"]); ?>
                                        </textarea>
                                        </dd>
                                    </dl>
                                </div>
                                <div style="float:left;width: 243px;height: 240px;">
                                    <?php if($data["ifimg"] == 1): ?><img style="width:240px;height: 200px;" src="<?php echo ($server); ?>/uploads/TestShortPic/<?php echo ($data['image']['picurl']); ?>300_<?php echo ($data['image']['picname']); ?>" alt=""/><?php endif; ?>
                                </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </form><?php endif; ?>


    </div>

</div>
</body>
</html>