<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />
		
    <title>★我要去学车职位应聘考试★</title>
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
    <script type="text/javascript" src="/Public/Home/exam/laydate/laydate.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/layer/layer.js"></script>
    <script src="/Public/Home/exam/js/wxm-core.js"></script>
</head>
<body id="test1" class="test1">
    <div id="content">
        <div id="header_bar">
        </div>
        <div class="container">
            <div id="header" class="text-center">
                <div style="height: 65px;"></div>
				
				 <div class="container">
                <div class="text-center header">
                    <h1 class="bold" style="color: #ff992c">
                         ★考试结束，期望你成功！！！★
                    </h1>
                        <span style="padding:4px;background-color: #000;">
                            <p style="color: #f5f5f5">
                                已有 <span style="color: #ff9e50"><?php echo ($count); ?></span> 人参与测试
                            </p>
                        </span>
                    </div>
                     <div id="bd" class="panel">
                        <div id="panel1" class="panel-body">
                                <div class="form-group avatar text-center">
                                    <label for="" class="sr-only">前言</label>
                                    <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;text-align: center; width: 100%; padding-top: 18px;">
                                        <img src="/Public/Home/exam/images/xueche.jpg" style="margin-bottom: 10px;"></span> </a>
                                </div>
                            <a href="<?php echo U('Home/Index/test_detail',array('userid'=>$userid));?>">
                                <input class="btn btn-lg btn-success start_exam"  type="button" value="点击可查看您的答题情况" style="color:#fdfd88;width: 100%;margin-top:10px;"/>
                            </a>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
</div>
    <script>
        ;!function(){

            laydate({
                elem: '#demo'
            })

        }();
    </script>
</body>
</html>