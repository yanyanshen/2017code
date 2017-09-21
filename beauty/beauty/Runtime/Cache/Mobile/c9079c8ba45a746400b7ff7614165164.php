<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />
<!--允许全屏-->
<meta content="yes" name="apple-mobile-web-app-capable"/>
<meta content="yes" name="apple-touch-fullscreen"/>
<meta content="telephone=no,email=no" name="format-detection"/>
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width"/>
<title>demo</title>
<link href="/Public/Mobile/commentcss/EvaluationOrder.debug.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="/Public/Home/js/webuploader/webuploader.css" />

    <script type="text/javascript" src="/Public/Mobile/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Home/js/webuploader/webuploader.js"></script>
<!--    <script type="text/javascript" src="/Public/Home/js/upload.js"></script>-->
    <script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
    <script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>
<style>
    .list{width: 100%;display: inline-block;}
    .list li{margin: 5px 15px;}
    .list label{display: inline-block;width: 70px;margin: 0;padding: 0;}
    .xubitu1{
        width: 20px;height: 18px;background-image: url(/Public/Home/images/commentimages/comment.png);
        background-position: 0 -100px;background-repeat: no-repeat;display: inline-block;
    }
    .xubitu2{
        width: 20px;height: 18px;background-image: url(/Public/Home/images/commentimages/comment.png);
        background-position: 0 -50px;background-repeat: no-repeat;display: inline-block;
    }
    .xubitu3{
        width: 20px;height: 18px;background-image: url(/Public/Home/images/commentimages/comment.png);
        background-position: 0 0;background-repeat: no-repeat;display: inline-block;
    }
 </style>
</head>
<body>

<script type="text/javascript">
    var uploadUrl = '<?php echo U("uploadGoodsPic");?>';
    var listUrl = '<?php echo U("index");?>';
</script>

<div class="order-list">
    <div class="com-title" >
        <div style="width: 100%;height: 30px;line-height: 30px;text-align: center;background-color: orangered;font-size: 20px;font-weight: bold;">
            <a title="返回" href="<?php echo U('Mobile/Member/myOrder');?>" style="color: white;text-align: center;">
                <span style="height: 30px;display:inline-block;float: left;color: white;font-weight: bold;">&lt;</span>
                &nbsp;&nbsp;<span style="display: inline-block;">评价商品</span>
            </a>
        </div>
    </div>
    <form action="<?php echo U('Mobile/Comment/zuijiasuccess');?>" id="comment" method="post" enctype="multipart/form-data">
    <?php if(is_array($goodsInfo)): $i = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><input type="hidden" name="<?php echo ($v["id"]); ?>[oid]" value="<?php echo ($oid); ?>"/>
        <input type="hidden" name="<?php echo ($v["id"]); ?>[gid]" value="<?php echo ($v["id"]); ?>"/>
        <input type="hidden" name="<?php echo ($v["id"]); ?>[ml]" value="<?php echo ($v["ml"]); ?>"/>
    <section>
        <div class="order-list-top">
            <p class="order-list-top-img">
                <img src="/Uploads/<?php echo ($v["imageurl"]); ?>100_<?php echo ($v["imagename"]); ?>" />
            </p>
            <div class="order-list-top-info">
                <h1> <?php echo ($v["goodsname"]); ?></h1>
                <h2><span>￥</span><?php echo ($v["saleprice"]); ?><span style="margin-left: 15%;display: inline-block;width: 50%;">
                    型号：<input type="text" value="<?php echo ($v["ml"]); ?>ml" name="" style="width:60%;color: red;border: none;" readonly/></span></h2>
            </div>
        </div>
        <div class="order-list-Below">
            <div class="order-list" style="margin: 0;padding: 0;height: 50px;">
                <ul class="list" style="margin: 0;padding: 0;">
                    <li class="good">
                        <label for="rate-good-2472159552941165">
                            <input type="radio" id="rate-good-2472159552941165"  name="<?php echo ($v["id"]); ?>[pingjia][]" value="1" checked />
                            <i title="好评"><span class="xubitu1"></span></i>
                        </label>
                    </li>
                    <li class="normal">
                        <label for="rate-normal-2472159552941165">
                            <input type="radio" id="rate-normal-2472159552941165"   name="<?php echo ($v["id"]); ?>[pingjia][]" value="2" />
                            <i  title="中评"><span class="xubitu2"></span></i>
                        </label>
                    </li>
                    <li class="bad">
                        <label for="rate-bad-2472159552941165">
                            <input type="radio"  id="rate-bad-2472159552941165"   name="<?php echo ($v["id"]); ?>[pingjia][]" value="3" />
                            <i title="差评"><span class="xubitu3"></span></i>
                        </label>
                    </li>
                </ul>
            </div>
            <input type="hidden" name="status" value=""/>
            <div class="order-textbox">
                <textarea placeholder="在此输入商品评价" name="<?php echo ($v["id"]); ?>[content]" style="color: black;"></textarea>
            </div>
            <div class="J_photo_uploader photo-uploader">
                <div class="usercity" style="border:3px dashed #e6e6e6;width:80px;height:80px;position: relative">
                    <p style="width:80px;height:80px;" id="preview<?php echo ($v["id"]); ?>" ><img id="imghead<?php echo ($v["id"]); ?>"  border=0 src='' style="width:80px;height:80px;"></p><span></span>
                    <input type="file" id="image<?php echo ($v["id"]); ?>" name="image<?php echo ($v["id"]); ?>" onchange='previewImage(this,"preview<?php echo ($v["id"]); ?>","imghead<?php echo ($v["id"]); ?>")' style="display:none;width: 80px;height: 80px;" >
                    <label for="image<?php echo ($v["id"]); ?>" class="uploadbut"  style="color:#fff;text-align:center;border-radius:4px;width:50px;height:10px;line-height:10px;font-size:10px;padding:5px;background:#00b7ee;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">晒图</label>
                </div>
            </div>
        </div>
    </section><?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
    <div class="order-button">
        <a href="javascript:void(0);" class="btn">发表追加</a>
    </div>
</div>


<script type="text/javascript">
    $('.order-textbox textarea').blur(function(){
        if(this.value.length<10){
            layer.open({
                content: '评价内容不能低于10个字哦'
                ,skin: 'msg'
                ,time: 2//2秒后自动关闭
                ,style:'line-heght:100px;'
                ,end:function(){
                    return false;
                }
            });
        }else if(this.value.length>200){
            layer.open({
                content: '评价内容最多为200字'
                ,skin: 'msg'
                ,time: 2//2秒后自动关闭
                ,style:'line-heght:100px;'
            });
        }
    })

    //给评价内容改变状态
    $(".item-opinion li").click(function() {
        $(this).prevAll().children('i').removeClass("active");
        $(this).nextAll().children('i').removeClass("active");
        $(this).children('i').addClass("active");
    })
</script>
<script type="text/javascript">
    $(function(){
        $('.btn').click(function(){
            $('#comment').ajaxSubmit(function(res){
                if(res.status==1){
                    layer.open({
                        content: '追加成功'
                        ,skin: 'msg'
                        ,time: 2//2秒后自动关闭
                        ,style:'line-heght:100px;'
                        ,end:function(){
                            location="<?php echo U('Mobile/Member/myOrder');?>";
                        }
                    });
                }
            })
        })
    })

</script>
<script>
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag)
    {
        var MAXWIDTH  = 80;
        var MAXHEIGHT = 80;
        var div = document.getElementById(pre);
        if( !file.value.match( /.jpg|.gif|.png|.bmp/i ) ){
            //$(this).prev('span').text('图片格式无效！');
            $('#'+pre).next('span').css({"color":"red","font-weight":"bold"}).text('图片类型无效！');
            return false;
        }else{
            $('#'+pre).next('span').css({"color":"green","font-weight":"bold"}).text('');
        }
        if (file.files && file.files[0])
        {
            div.innerHTML ='<img id='+imag+'>';
            var img = document.getElementById(imag);
            img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
            }
            var reader = new FileReader();
            reader.onload = function(evt){img.src = evt.target.result;}
            reader.readAsDataURL(file.files[0]);
        }
        else //兼容IE
        {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            file.blur();
            var src = document.selection.createRange().text;
            div.innerHTML ='<img id='+imag+'>';
            var img = document.getElementById(imag);
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
        }

        $(file).next('label').css({margin:0,top:0,position:'absolute',background:'rgba(0,0,0,0.4)',color:'#fff',fontSize:'14px'}).html('重新选择主图');
    }
    function clacImgZoomParam( maxWidth, maxHeight, width, height ){
        var param = {top:0, left:0, width:width, height:height};
        if( width>maxWidth || height>maxHeight )
        {
            rateWidth = width / maxWidth;
            rateHeight = height / maxHeight;

            if( rateWidth > rateHeight )
            {
                param.width =  maxWidth;
                param.height = Math.round(height / rateWidth);
            }else
            {
                param.width = Math.round(width / rateHeight);
                param.height = maxHeight;
            }
        }

        param.left = Math.round((maxWidth - param.width) / 2);
        param.top = Math.round((maxHeight - param.height) / 2);
        return param;
    }
</script>
</body>
</html>