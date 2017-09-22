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
    <style type="text/css">
        body{background:#111302 url("/Public/Home/exam/images/abcd.jpg") top center no-repeat !important;background-size:100% auto !important}body .avatar .img-circle{background:#347433 !important}body form .btn{background:#347433 !important;border-color:#347433 !important}#header h1,#header p{background:none !important}
    </style>
    <script type="text/javascript" src="/Public/Home/exam/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/js/jquery.hammer.min.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/js/jquery.mmenu.min.all.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/layer/layer.js"></script>
    <script src="/Public/Home/exam/js/wxm-core.js"></script>
    <script>


        $(function(){
                $(".start_exam").click(function(){
                    $('.start_exam').attr('disabled','disabled');
                    $.post('<?php echo U("Home/Index/short_submit_exam");?>',$("#form1").serialize(),function(res){
                        if(res.status){
                            layer.msg(res.info,{icon:1,time:1000},function(){
                                location=res.url;
                            })
                        }
                },'json')
            })
        })

        //在线考试时间
        var h=0;  //设置考试时间(小时单位)
        var m=30;  //设置考试时间(分钟单位)
        var timeShowId="timeshow"; //设置时间显示层ID
        var TimeNum=h*60*60+m*60; //+m*60
        var timeStr;
        function ChangeTime()
        {
            TimeNum--;
            if(TimeNum > 0)
            {
                timeStr=setTimeout("ChangeTime()",1000);
            }
            else
            {

//                这里应该怎么写呢?当时间为0时自动提交试卷(就是让提交试卷按钮自动提交,不用人为单击);

            }
            document.getElementById(timeShowId).innerHTML="系统提示：你的时间还剩&nbsp;&nbsp;<span style='color: #ff9e50'>"+Math.floor(TimeNum/60)+"分"+TimeNum%60+"秒</span>";
        }
        timeStr=setTimeout("ChangeTime()",1000);
    </script>

    <style>
        #body{
            width:700px;background-color: #f5f5f5;
        }
        li{width: 700px;}
    </style>
</head>
<body id="test1" class="test1">
<div id="content">
    <div id="header_bar"></div>
    <div class="container">
        <div id="header" class="text-center">
            <div style="height: 65px;"></div>
            <div class="container">
                <div class="text-center header">
                    <h1 class="bold" style="color: #ff992c">
                        ★我要去学车客服销售考试★
                    </h1>
                    <span style="padding:4px;">
                        <p style="color: #f5f5f5" id="timeshow">
                            <!--你还有 <span style="color: #ff9e50" >30</span> 分钟的时间-->
                        </p>
                    </span>
                </div>

                <div id="bd" class="panel">
                    <div id="panel2" class="panel-body">
                        <form action="#" method="POST" id="form1">
                            <!--<input type="hidden" name="str" value="<?php echo ($str); ?>"/>-->
                            <div>
                                <dl>
                                    <dd>简答（5道单选，每题20分）</dd>
                                    <dd>总分100分</dd>
                                </dl>
                            </div>
                            <?php if(is_array($arr)): $k = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k;?><div style="margin-left: 55px;">
                                    <div style="width:  700px;float: left">
                                        <dl>
                                            <dd><?php echo ($k); ?>.<?php echo ($data["question"]); ?></dd>
                                        </dl>
                                                <textarea name="<?php echo ($data["id"]); ?>[]" id="" cols="90" rows="10" style="margin-bottom: 20px">

                                                </textarea>
                                    </div>
                                    <?php if($data["ifimg"] == 1): ?><div style="float:left;margin-left: 20px;margin-top: 40px">
                                            <img style="width:240px;height: 200px;" src="<?php echo ($server); ?>/uploads/TestShortPic/<?php echo ($data['pic']['picurl']); ?>300_<?php echo ($data['pic']['picname']); ?>" alt=""/>
                                        </div><?php endif; ?>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <input class="btn btn-lg btn-success start_exam"  type="button" value="提交试卷" style="color:#fdfd88;width: 100%;margin-top:10px;"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>