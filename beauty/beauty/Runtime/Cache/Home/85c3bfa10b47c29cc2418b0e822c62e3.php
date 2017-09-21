<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=640"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>beauty</title>
    <script type="text/javascript" src="/Public/Home/cj/js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="/Public/Home/cj/js/jQueryRotate.2.2.js"></script>
    <script type="text/javascript" src="/Public/Home/cj/js/script.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
    <style type="text/css">
        .rotate-con-pan{background:url(/Public/Home/cj/images/disk.jpg) no-repeat 0 0;
            background-size:100% 100%;position:relative;width:480px;height:480px;
            box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:
        border-box;margin:0 auto;top:30px;}
        .rotate-con-zhen{width:100px;height:200px;background:url(/Public/Home/cj/images/start.png) no-repeat 0 0;
            background-size:100% 100%;cursor:pointer;position:absolute;left:180px;top:140px;}
    </style>
</head>
<body bgcolor="red">
<div class="rotate-con-pan">
    <div class="rotate-con-zhen"></div>
    <div style="height: 100px;margin-bottom: 10px;color: #ffffff;">
        <?php if($luckytag == 3): ?><span>今日机会已经用完，明天才能继续哦</span>
            <?php else: ?>
            <span>您还有机会哦</span><?php endif; ?>

        <span class="icon-time" ></span>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        $(".rotate-con-zhen").rotate({
            bind:{
                click:function(){
                    var a = runzp();
                    $(this).rotate({
                        duration:3000,               //转动时间
                        angle: 0,                    //起始角度
                        animateTo:1440+a.angle,      //结束的角度
                        easing: $.easing.easeOutSine,//动画效果，需加载jquery.easing.min.js
                        callback: function(){
                            $.get('Lucky/lucky',{prize:a.prize,message:a.message},function(res){
                                layer.msg(res.info+'',{icon:1},function(){
                                    location='<?php echo U("Lucky/index");?>';
                                })
                            });
                        }
                    });
                }
            }
        });
    });
</script>
</body>
</html>