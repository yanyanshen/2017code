<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>试题发布</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.form.js"></script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 352
            });
            $(".select3").uedSelect({
                width : 100
            });


            $('select[name="firstCate"]').change(function(){
                var a=$('select[name="firstCate"]').val();
                if(a==1){
                    $('.input').show();
                    $("textarea[name='textarea']").hide();
                    $(".right").show();
                    $(".right").attr("placeholder","至少选2个答案，例如 A,B 答案用逗号隔开");
                }else if(a==0){
                    $('.input').show();
                    $("textarea[name='textarea']").hide();
                    $(".right").show();
                    $(".right").attr("placeholder","选1个答案");
                }else{
                    $('.input').hide();
                    $(".right").hide();
                    $("textarea[name='textarea']").show();
                }

            });


        });


    </script>


</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">试题管理</a></li>
        <li><a href="#">试题发布</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab1" class="tabson">

            <form action="<?php echo U('Admin/Test/test_add');?>" method="post" id="form1" enctype="multipart/form-data">
                <input type="hidden" name="qimg"  value=""/>
                <ul class="forminfo">
                    <li>
                        <label>问题<b>*</b></label>
                        <input name="qname" type="text" class="dfinput" value=""  placeholder="请填写您的问题"   style="width:352px;"/>
                        <input type="button" class="addimg btn" value="添加图片" style="width:80px;height:30px;border-radius: 4px"/>
                    </li>
                    <li>
                        <label>
                            试题类型<b>*</b>
                        </label>
                        <div class="vocation">
                            <select class="select2" name="firstCate">
                                <option value="0">单选题</option>
                                <option value="1">多选题</option>
                                <option value="2">简答题</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <label>
                            试题分类<b>*</b>
                        </label>
                        <div class="vocation">
                            <select class="select2" name="category_id">
                                <option value="0" selected>请选择</option>
                                <?php if(is_array($test_category)): $i = 0; $__LIST__ = $test_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data['id']); ?>"><?php echo ($data['cname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </li>

                    <li class="input">
                        <label>A选项<b>*</b></label>
                        <input name="aname" type="text" class="dfinput input" value=""  style="width:352px;"/>

                    </li>
                    <li class="input">
                        <label >B选项<b>*</b></label>
                        <input name="bname" type="text" class="dfinput input" value=""    style="width:352px;"/>

                    </li>
                    <li class="input">
                        <label class="label">C选项<b>*</b></label>
                        <input name="cname" type="text" class="dfinput input" value=""    style="width:352px;"/>

                    </li>
                    <li class="input">
                        <label>D选项<b>*</b></label>
                        <input name="dname" type="text" class="dfinput input" value=""    style="width:352px;"/>

                    </li>
                    <li class="img" style="display:none">
                        <label>问题图片<b>*</b></label>
                        <div class="usercity" style="border:3px dashed #e6e6e6;width:352px;height:300px;position: relative;margin-bottom: 15px">
                            <p id="preview1" ><img id="imghead1"  border=0 src=''></p><span></span>
                            <input type="file" id="image1" name="image" onchange="previewImage(this,'preview1','imghead1')" style="display:none;" >
                            <label for="image1"  style="margin:130px 100px;color:#fff;text-align:center;border-radius:4px;width:130px;height:26px;line-height:26px;font-size:18px;background:#00b7ee;padding:8px 16px;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">点击选择主图</label>
                        </div>
                        <input type="button" class="packupimg btn" value="收起" style="width:80px;height:30px;border-radius: 4px"/>
                    </li>
                    <li>
                        <label class="label">正确答案<b>*</b></label>
                        <input name="rname" type="text" class="dfinput right" value="" placeholder="选一个答案，例如选 A"   style="width:352px;text-align: left;outline: none"/>
                        <textarea name="textarea"   cols="55" rows="15" style="border:1px solid #a9a9a9;display: none;padding: 0;margin: 0" >

                        </textarea>
                    </li>
                    <li><label>&nbsp;</label>
                        <input type="button" class="btn" id="addtest" value="马上添加"/>
                        <a href="<?php echo U('Admin/Test/testlistshow');?>">
                            <input type="button" class="btn" style="margin-left: 20px;" value="excel表格导入数据"/>
                        </a>
                    </li>

                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>


<script>
    $('#addtest').click(function(){
        $('#form1').ajaxSubmit(function(res) {
            if(res.status==0){
                layer.msg(res.info);
            }else{
                layer.msg(res.info,{icon:6,time:2000},function(){
                    location="<?php echo U('Admin/Test/addtestshow');?>";
                });
            }

        },'json')
    });

    $(".addimg").click(function(){
        $("input[name='qimg']").attr("value","qimg");
        $('.img').show();
    });

    $(".packupimg").click(function(){
        $("input[name='qimg']").attr("value","");
        $('.img').hide();
    });




function previewImage(file,pre,imag) {
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