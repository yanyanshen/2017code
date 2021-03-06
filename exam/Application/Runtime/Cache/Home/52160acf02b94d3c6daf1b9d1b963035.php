<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes" />

    <title>★我要去学车客服销售选择题考试结果★</title>
    <link href="/Public/Home/exam/style/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <link href="/Public/Home/exam/style/jquery.mmenu.all.css" rel="stylesheet" />
    <style type="text/css">

        body{background:#111302 url("/Public/Home/exam/images/abcd.jpg") top center no-repeat !important;background-size:100% auto !important}body .avatar .img-circle{background:#347433 !important}body form .btn{background:#347433 !important;border-color:#347433 !important}#header h1,#header p{background:none !important}

        input{
            margin-bottom: 6px;
        }
        lable.error{
            font-size: 14px;
            font-weight: bold;
            color: #FF0000;
        }
        lable.ok{
            font-size: 14px;
            font-weight: bold;
            color: #38D63B;
        }

    </style>
    <script type="text/javascript" src="/Public/Home/exam/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/js/jquery.validate.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/js/jquery.hammer.min.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/js/jquery.mmenu.min.all.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/laydate/laydate.js"></script>
    <script type="text/javascript" src="/Public/Home/exam/layer/layer.js"></script>
    <script src="/Public/Home/exam/js/wxm-core.js"></script>
    <script>
        function check() {
            var radio = document.getElementsByName("sex");
            check = false;
            for (var i = 0; i < radio.length; i++) {
                if (radio[i].checked == true) {
                    check = true;
                }
            }
            if (check) {
                return true;
            } else {
                layer.alert("请选择性别",{icon:2,time:3000},function(){
                    location = "<?php echo U('Home/Index/result');?>";
                });
                return false;
            }
        }
        $(function(){
            var validate=$('#form1').validate({
                rules:{
                    tel:{
                        required:true,
                        tel:true
                    },
                    name:{
                        required:true,
                        remote: {
                            url: "<?php echo U('Home/Index/checkUsername');?>",
                            type: 'post'
                        }
                    }
                },
                messages:{
                    tel:{
                        required:' * 手机号不能为空！',
                        tel:' * 手机号码格式不正确！'
                    },
                    name:{
                        required:' * 姓名不能为空！',
                        remote:' * 你还没有进行考试'
                    }
                },
                success:function(lable){
                    lable.addClass('ok').text(' * 通过验证');
                },
                validClass:'ok',
                errorElement:'lable'
            });
            // 手机号码验证
            jQuery.validator.addMethod("tel", function(value, element) {
                var mobileReg = /^1[34578]{1}[0-9]{9}$/;
                return this.optional(element) || (mobileReg.test(value));
            }, "请正确填写您的手机号码");

                $('#form1').submit(function(){
                    if(validate.form()){
                        $('.start_exam').attr('disabled','disabled');
                    }
                });

        });


    </script>
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
                        ★我要去学车客服销售考试选择题结果查看★
                    </h1>
                <span style="padding:4px;background-color: #000;">
                    <p style="color: #f5f5f5">
                        已有 <span style="color: #ff9e50"><?php echo ($count); ?></span> 人参与测试
                    </p>
                </span>
                </div>
                <!-- E header -->
                <div id="bd" class="panel">
                    <div id="panel1" class="panel-body">
                        <form action='<?php echo U("Home/Index/test_detail");?>' id="form1" method="post">
                            <div class="form-group avatar text-center">
                                <label for="" class="sr-only">前言</label>
                                <a href="javascript:void(0)" class="img-circle" name="1"><span style="float: left;text-align: center; width: 100%; padding-top: 18px;">
                                <img src="/Public/Home/exam/images/ks.jpg" style="margin-bottom: 10px;"></span> </a>
                            </div>
                            <dl>
                                <dd>
                                    您的姓名：<input type="text" value="" name="name" style="width: 192px;"/><br>
                                    您的性别：
                                    男<input type="radio" value="0" id="b" name="sex" style="margin-top: 5px;width: 30px;"/>
                                    女<input type="radio" value="1"  id='g' name="sex" style="width: 30px;margin-right: 90px"/>
                                    <br>
                                    联系电话：<input type="text" value="" name="tel" style="margin-top: 5px;width: 192px;"/><br>
                                </dd>
                            </dl>
                            <div class="buttons">
                                <input class="btn btn-lg btn-success start_exam" onclick="check();"   type="submit" value="选择题查看" style="color:#fdfd88;width: 100%;margin-top:10px;"/>
                                <a href="<?php echo U('Home/Index/index');?>">
                                    <input class="btn btn-lg btn-success" value="返回首页" style="color:#fdfd88;width: 100%;margin-top:10px;"/>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    ;!function(){

//laydate.skin('molv');

        laydate({
            elem: '#demo'
        })

    }();
</script>
</body>
</html>