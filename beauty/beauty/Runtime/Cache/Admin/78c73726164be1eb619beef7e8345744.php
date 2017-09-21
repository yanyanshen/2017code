<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/time/abc/timer/WdatePicker.js"></script>
    <script src="/Public/Admin/js/jquery.form.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script src="/Public/Home/js/jquery.validate.min.js" type="text/javascript"></script>


    <style>
        input.error { border: 1px solid #EA5200;background: #ffdbb3;}
        div.error{
            display:inline-block ;
            color:#ff0300;
            font-weight: bold;
            font-size: 14px;
        }
        div.ok {
            color:green;
        }
    </style>

    <script type="text/javascript">
        $(function(){
            var validate=$('#form1').validate({
                rules:{
                    catename: {
                        required: true,
                        remote: {
                            url: '<?php echo U("chkBname");?>',
                            type: 'post'
                        }
                    }
                },
                messages:{
                    catename: {
                        required: '品牌名必填',
                        remote: '品牌已添加'
                    }
                },
                success: function(div) {
                    div.addClass("ok").text('通过验证');
                },
                validClass:'ok',
                errorElement:'div'
            })



            $('.btn').click(function(){
                if(validate.form()) {
                    $("#form1").ajaxSubmit(function (res) {
                        if (res.status == 1) {
                            layer.open({
                                icon: 1,
                                content: res.info,
                                yes: function () {
                                    location.href = "<?php echo U('AddBrand/add');?>";
                                }
                            })
                        }
                    })
                }
                return false;

            })

        })


    </script>
    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
        });
    </script>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">

            <ul class="forminfo">
                <form action="<?php echo U('AddBrand/addbrands');?>" method="post" id="form1" enctype="multipart/form-data">
                    <li><label>品牌名称<b>*</b></label><input name="catename" type="text" class="dfinput" value=""  style="width:518px;"/></li>
                    <li><label>品牌类型<b>*</b></label>
                        <select name="brandtype" style="width: 200px;height: 35px;border: 1px #bfbfbf solid;border-left: 1px #d7d7d7 solid;border-bottom: 1px #d7d7d7 solid;opacity: 1">
                            <option value="0" selected>请选择</option>
                            <option value="1">国际大牌</option>
                            <option value="2">推荐品牌</option>
                            <option value="3">国货精品</option>
                        </select>
                    </li>
                    <li>
                    <label>添加时间<b>*</b></label>
                    <input id="d11" name="time1" value="" type="text" onClick="WdatePicker()" style="width: 120px;height: 30px;border: 1px solid #cccccc;margin-left: 0px;margin-bottom: 15px"/>
                    </li>
                    <li>
                        <label>品牌主图<b>*</b></label>
                        <div class="usercity" style="border:3px dashed #e6e6e6;width:520px;height:300px;position: relative">
                            <p id="preview1" ><img id="imghead1"  border=0 src=''></p><span></span>
                            <input type="file" id="image1" name="rules" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                            <label for="image1"  style="margin:130px 180px;color:#fff;text-align:center;border-radius:4px;width:130px;height:26px;line-height:26px;font-size:18px;background:#00b7ee;padding:8px 16px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击选择主图</label>
                        </div>
                    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="点击添加"/></li>
                </form>
            </ul>
        </div>

    </div>
</div>
</body>

<script>
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag)
    {
        var MAXWIDTH  = 300;
        var MAXHEIGHT = 300;
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

</html>