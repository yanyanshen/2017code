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

    <div id="div_map_hw" style=" Z-INDEX: 100;visibility:hidden;POSITION: absolute;height:453px;width: 523px;"> <img src="/Public/Home/map/images/china.jpg" alt="中国" width="527" height="457" border="0" usemap="#Map" />
        <map name="Map">
            <area shape="rect" coords="321,423,355,441" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/hainan.htm&#39;);return false;">
            <area shape="rect" coords="368,401,402,418" href="http://www.chinawutong.com/#" onclick="rt(&#39;澳门&#39;);return false;">
            <area shape="rect" coords="398,387,430,403" href="http://www.chinawutong.com/#" onclick="rt(&#39;香港&#39;);return false;">
            <area shape="rect" coords="440,361,476,376" href="http://www.chinawutong.com/#" onclick="rt(&#39;台湾&#39;);return false;">
            <area shape="rect" coords="405,337,441,353" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/fujian.htm&#39;);return false;">
            <area shape="rect" coords="235,364,271,380" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/yunnan.htm&#39;);return false;">
            <area shape="rect" coords="285,335,321,354" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/guizhou.htm&#39;);return false;">
            <area shape="rect" coords="359,368,396,387" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/guangdong.htm&#39;);return false;">
            <area shape="rect" coords="309,370,345,387" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/guangxi.htm&#39;);return false;">
            <area shape="rect" coords="87,245,126,272" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/xizang.htm&#39;);return false;">
            <area shape="rect" coords="334,324,370,342" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/hunan.htm&#39;);return false;">
            <area shape="rect" coords="245,289,282,305" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/sichuan.htm&#39;);return false;">
            <area shape="rect" coords="290,299,327,316" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/chongqing.htm&#39;);return false;">
            <area shape="rect" coords="339,283,374,301" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/hubei.htm&#39;);return false;">
            <area shape="rect" coords="388,276,424,294" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/anhui.htm&#39;);return false;">
            <area shape="rect" coords="381,316,413,333" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/jiangxi.htm&#39;);return false;">
            <area shape="rect" coords="419,301,454,318" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/zhejiang.htm&#39;);return false;">
            <area shape="rect" coords="447,276,483,293" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/shanghai.htm&#39;);return false;">
            <area shape="rect" coords="277,173,321,190" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/neimenggu.htm&#39;);return false;">
            <area shape="rect" coords="343,252,380,269" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/henan.htm&#39;);return false;">
            <area shape="rect" coords="415,253,450,270" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/jiangsu.htm&#39;);return false;">
            <area shape="rect" coords="358,205,394,220" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/hebei.htm&#39;);return false;">
            <area shape="rect" coords="330,221,366,237" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/shanxi.htm&#39;);return false;">
            <area shape="rect" coords="388,220,427,240" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/shandong.htm&#39;);return false;">
            <area shape="rect" coords="370,179,402,196" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/beijing.htm&#39;);return false;">
            <area shape="rect" coords="178,220,228,244" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/qinghai.htm&#39;);return false;">
            <area shape="rect" coords="420,159,454,176" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/liaoning.htm&#39;);return false;">
            <area shape="rect" coords="279,214,316,231" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/ningxia.htm&#39;);return false;">
            <area shape="rect" coords="403,196,438,212" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/tianjin.htm&#39;);return false;">
            <area shape="rect" coords="446,123,480,142" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/jilin.htm&#39;);return false;">
            <area shape="rect" coords="444,90,488,108" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/heilongjiang.htm&#39;);return false;">
            <area shape="rect" coords="191,177,234,200" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/gansu.htm&#39;);return false;">
            <area shape="rect" coords="85,150,126,181" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/xinjiang.htm&#39;);return false;">
            <area shape="rect" coords="301,254,336,271" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/sx.htm&#39;);return false;">
            <area shape="rect" coords="497,0,526,23" href="http://www.chinawutong.com/#" onclick="document.getElementById(&#39;div_map_hw&#39;).style.visibility=&#39;hidden&#39;;document.getElementById(&#39;frm_map_hw&#39;).style.visibility=&#39;hidden&#39;;return false;">
        </map>
    </div>
    <link href="/Public/Home/map/css/WTMap.css" rel="stylesheet" />
    <link href="/Public/Home/map/css/mapstyle.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/map/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/Public/Home/map/js/WTMap.min.js"></script>
    <script type="text/javascript" src="/Public/Home/map/js/mapjs.js"></script>
</head>
<body>
<form id="Address" method="post" enctype="multipart/form-data" action="">
 <ul class="add_tab">
<li  class="add_dd"><span class="chose" width="135" align="right"><label for="port">配送地址:</label></span>
    <span colspan="3" style="font-family:'宋体';">
    <input class="qi" id="tc_from" name="area" style="margin-left: 9px" type="text" value="您的货物要发往哪里？" wtmap="{c:&#39;tc_from&#39;,cb:true}" readonly="readonly" /></span>
    &nbsp;<span style="color: red;">*</span>
</li>
<li class="add_dd">收货人姓名:<input type="text"  name="username"/>&nbsp;<span style="color: red;">*</span></li>
<li class="add_dd">手&nbsp;&nbsp; 机：<input type="text"  name="mobile"/>&nbsp;<span style="color: red;">*</span></li>
<li class="add_dd" style="width: 600px;height: 120px;">详细地址:&nbsp;<textarea type="text"  name="address" style="width: 200px;height: 100px;"></textarea>&nbsp;<span style="color: red;">*</span></li>
<li class="add_dd">电子邮箱:&nbsp;<input type="text"  name="email"  /></li>
<li class="add_dd">邮政编码:&nbsp;<input type="text"  name="ecode" /></li>
<li class="add_dd">电&nbsp;&nbsp; 话：<input type="text"  name="telephone" /></li><br/>
<li class="add_dd" style="text-align: center;"><input  type="submit" value="添加地址" style="width: 120px;height: 30px;background-color: red;border-radius: 5px;"/></li>
</ul>
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
            $.post("<?php echo U('Home/Member/addAddress');?>",$('#Address').serialize(),function(response){
                if(response.status==1){
                   layer.msg('添加成功',{time:500},function(){
                       parent.location.reload();
                   })
                }else{
                    alert.msg('最多只能添加3条地址');
                }
            },'json');
        }
        return false;
    })
})
</script>