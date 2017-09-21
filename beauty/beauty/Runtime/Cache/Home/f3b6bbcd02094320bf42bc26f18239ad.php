<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <style>
        .add_tab{border: 1px solid #CCCCCC;width: 680px; height: 500px;}
        .add_tab li{width: 600px;height: 50px;float: left;line-height: 50px;list-style: none;}
        .add_tab li input{width: 300px;height: 25px;}
        .add_tab .add_dd label.error{font-size: 10px;font-weight: bold;color: red;display:inline-block;text-align: center;}
        .add_tab .add_dd label.ok{display:inline-block; color:green;text-align: center;font-size: 8px;}
    </style>
</head>
<body onload="setup();preselect('河南省');">
<form  method="post" enctype="multipart/form-data" action="" id="Address">
<?php if(is_array($addressInfo)): $i = 0; $__LIST__ = $addressInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><ul class="add_tab">
<li  class="add_dd">
<span>配送地址：</span>
<select class="select" name="province" id="s1">
<option ><?php echo ($val["shengfen"]); ?></option>
</select>
<select class="select" name="city" id="s2">
<option ><?php echo ($val["shi"]); ?></option>
</select>
<select class="select" name="county" id="s3">
<option ><?php echo ($val["xian"]); ?></option>
</select>
</li>
     <input type="hidden" value="<?php echo ($addressid); ?>" name="addressid"/>
<li class="add_dd">收货人姓名:<input type="text"  name="username" value="<?php echo ($val["username"]); ?>"/>&nbsp;<span style="color: red;">*</span></li>
<li class="add_dd">手&nbsp;&nbsp; 机：<input type="text"  name="mobile" value="<?php echo ($val["mobile"]); ?>"/>&nbsp;<span style="color: red;">*</span></li>
<li class="add_dd" style="width: 600px;height: 120px;">详细地址:&nbsp;<textarea type="text"  name="address" style="width: 200px;height: 100px;"><?php echo ($val["address"]); ?></textarea>&nbsp;<span style="color: red;">*</span></li>
<li class="add_dd">电子邮箱:&nbsp;<input type="text"  name="email"  /></li>
<li class="add_dd">邮政编码:&nbsp;<input type="text"  name="ecode" /></li>
<li class="add_dd">电&nbsp;&nbsp; 话：<input type="text"  name="telephone" /></li><br/>
<li class="add_dd" style="text-align: center;"><input  type="submit" value="确认编辑" style="width: 120px;height: 30px;background-color: red;border-radius: 5px;"/></li>
</ul><?php endforeach; endif; else: echo "" ;endif; ?>
</form>
</body>
</html>
<script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/Home/js/geo.js"></script>
<script type="text/javascript">
    $(function(){
    var validate=$('#Address').validate({
        rules:{
            username:{
                required:true
            },
            mobile: {
                required:true,
                mobile:true
            },
            address: {
                required:true
            }
        },
        messages:{
            username:{
                required:'用户名不能为空'
            },
            mobile: {
                required:'手机号码不能为空',
                mobile:"请正确填写您的手机号码"
            },
            address: {
                required:'详细地址不能为空'
            }
        },
        success:function(label) {
            label.addClass("ok").text('验证通过');
        },
        validClass: "ok"
    });

    jQuery.validator.addMethod("mobile", function(value, element) {
        var mobileReg = /^1[34578]{1}[0-9]{9}$/;
        return this.optional(element) || (mobileReg.test(value));
    }, "请正确填写您的手机号码");

    $('#Address').submit(function(){
        if(validate.form()){
            $.post("<?php echo U('Home/MyCart/editorAddress');?>",$('#Address').serialize(),function(response){
                if(response.status==1){
                   layer.msg('编辑成功',{time:500},function(){
                       parent.location.reload();
                   })
                }else{
                    layer.msg(response.info);
                }
            },'json');
        }
        return false;
    })
})
</script>