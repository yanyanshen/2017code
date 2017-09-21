<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>我的足迹</title>
    <meta charset="utf-8" />
    <link rel="dns-prefetch" href="//ued.paixie.net" />
    <link rel="dns-prefetch" href="//img-cdn2.paixie.net" />
    <link rel="icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="bookmark" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/Public/Mobile/images/favicon.ico" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="edge" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telphone=no, email=no" />
    <meta name="renderer" content="webkit" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="screen-orientation" content="portrait" />
    <meta name="x5-orientation" content="portrait" />
    <meta name="full-screen" content="yes" />
    <meta name="x5-fullscreen" content="true" />
    <meta name="browsermode" content="application" />
    <meta name="x5-page-mode" content="app" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" />
    <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','cart2.0','index'],'2015/09/15 16:00:42',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script>
    <!--<link rel="stylesheet" href="/Public/Mobile/css/zip.touch.cart2_0._all_.v39013.css" type="text/css" />-->
    <script type="text/javascript" src="/Public/Mobile/js/zepto.min.js"></script>
    <script src="/Public/Mobile/list/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Mobile/layer_mobile/layer.js" type="text/javascript"></script>
    <style type="text/css">
        .m_header,
        .body{max-width: 640px;}
        .m_header{left:50%;margin-left: -320px;}

        ul,li{list-style:none;}
        body{background: #fff; }
        .checkin{margin: auto auto auto auto; }
        .clear {clear:both; height:0; overflow:hidden; display:block; line-height:0}
        .clearfix:after {clear:both; height:0; display:block; visibility:hidden; content:" "; line-height:0}
        .clearfix {zoom:1}/* for IE6 IE7 */
        .title{height: 36px;line-height: 50px;font-size: 0.9rem;margin-bottom: 10px;}
        .title p{float: left;width: 80%;height: 36px;line-height: 36px;font-size: 16px;}
        .title a{display: inline-block;width: 20%;height: 36px;line-height: 36px;text-align: center;background: #42941a;border-radius: 5px;color: #fff;text-decoration: none;font-size: 16px;}
        .checkin li{background: #fee684; float: left;padding: 10px;text-align: center;}

        li.able-qiandao{background: #e9c530; }
        li.checked{background:#fee684 url(http://i2.piimg.com/508767/a9576b09fc014d6e.png) no-repeat center;}
        .mask{ width: 100%;height: 100%;position: absolute;top: 0;left: 0; background-color: rgba(0,0,0,0.55);visibility: hidden;transition: all 0.25s ease}
        .modal{background:#fff;width: 450px;height: 400px;border-radius: 10px;position: absolute;margin-top: -200px;margin-left:-225px;left: 50%;top: 50%;border:5px solid #42941a;box-sizing:border-box;overflow: hidden;transform: translateY(-200%);transition: all 0.25s ease}
        a.closeBtn{display: block;position: absolute;right: 10px;top: 5px;font-family: 'simsun';font-size: 18px;text-decoration: none;
            font-weight: bolder;color: #333}
        .title_h1{text-align: center;font-size: 40px;font-weight: normal;padding-top: 80px;display: block;width: 100%}
        .title_h1 span{display: inline-block;width: 40px;height: 40px;border-radius: 100%;background: #42941a;color: #fff;position: relative;float: left;margin-left: 30%;margin-top: 7px;}
        .title_h1 span::before{width: 10px;height: 2px;background: #fff;position: absolute;left: 8px;top: 23px;display: block;line-height: 0;font-size: 0;content: ""; transform: rotate(52deg);}
        .title_h1 span::after{width: 24px;height: 2px;background: #fff;position: absolute;left: 12px;top: 20px;display: block;line-height: 0;font-size: 0;content: "";transform: rotate(-45deg);}
        .title_h1 em{display: inline-block;font-size: 30px;float: left;margin-left: 10px;}
        .title_h1 i{display: inline-block;font-size: 16px;float: left;margin: 14px 0 0 10px;}
        .title_h2{text-align: center;font-size: 0.1rem;display: block;padding-top: 20px;}
        .title_h2 span{font-size: 36px;color: #b25d06;}
    </style>
    <script type="text/javascript">function remReSize(){var w = $(window).width();try{w = $(parent.window).width();}catch(ex){};if(w>640){w = 640;};$('html').css('font-size',100/640*w+'px');$('#js_style_for_pc').remove();$('body').append('<style id="js_style_for_pc">.m_header{margin-left: -'+w/2+'px;}.m_menu{margin-left: -'+w/2+'px;}</style>');};remReSize();$(window).resize(remReSize);$(document).ready(function() {remReSize();});for(var i=0;i<3;i++){setTimeout(remReSize, 100*i);};</script>
</head>
<body>
<div class="body">
    <!--<div class="m_header">-->
        <!--<p> <a class="bt_prev" href="javascript:window.history.back();void(0);"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p>-->
        <!--<h1 class="ellipsis bt_title"> 足迹 </h1>-->
        <!--<p> <a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p>-->
    <!--</div>-->
    <div class="m_menu hidden">
        <div>
            <i class="rotate45"></i>
            <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
            <a href="<?php echo U('Mobile/Category/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
            <a href="<?php echo U('Mobile/MyCart/Mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
            <a href="<?php echo U('Mobile/Member/index');?>"><span><i class="m_bg"></i></span>我的用户中心</a>
        </div>
    </div>
    <div class="lib_content" id="js_lib_content">
        <!--购物车有商品-->
        <div class="car_opera">

        </div>

            <div style="text-align: center;color: #a9a9a9">

                <div class="checkin" style="width: 100%;height: 400px">

                </div>

            </div>

        <div class="m_footer clear">
            <a class="m_icon m_icon_gotop hidden" href="javascript:void(0);"></a>
            <div class="userinfo">
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6 ellipsis" href="<?php echo U('Mobile/Member/index');?>"><?php echo (session('mname')); ?></a>
        <?php else: ?> <a style="color:#666666 " href="<?php echo U('Mobile/Login/Dologin');?>"> 登录</a><?php endif; ?>

    <span></span>
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" id="OUT" href="javascript:;">退出</a>
        <?php else: ?><a class="gray6" href="<?php echo U('Mobile/Register/index');?>">注册</a><?php endif; ?>
    <span></span>
    <a class="gray6" href="<?php echo U('Mobile/Feedback/index');?>">用户反馈</a>
    <span></span>
    <a class="gray6" href="/help/app.html#button">客户端</a>
</div>
<div class="copyright gray9">© 2007-2015 Paixie All Rights Reserved<br>闽B2-20110084</div>
<script>
    $(function() {
        $('#OUT').click(function () {
            $.post("<?php echo U('Mobile/Login/LoginOut');?>", '', function (res) {
                if (res.status == 1) {
                    layer.open({
                        content: res.info,
                        type:1,
                        skin:'msg',
                        time:3,
                        end: function () {
                            location.href = "<?php echo U('Mobile/index/index');?>";
                        }
                    })
                } else {
                    layer.open({
                        content: res.info,
                        type:1
                    });
                }
            }, 'json')
        });
    })
 </script>
        </div>
        <div style="display:none;">
        </div>
    </div>
    <script type="text/javascript" src="/Public/Mobile/js/zip.touch.cart2_0._all_.v3624.js"></script>
    <!--<script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script>-->
    <input class="signtag" type="hidden" signtag="<?php echo ($sign['signtag']); ?>"/>
</div>
<script>
    $(function(){
        $('.able-qiandao').click(function(){
            $.get('<?php echo U("Home/Sign/addSign");?>',function(res){
                if(res.status==1){
                    $("#sign1").text(res.info['sign']);
                    $("#count").text(res.info['signcount']);
                    var time=new Date();
                    var y=time.getFullYear();
                    var  m1=time.getMonth()+1;
                    var dd=time.getDate();
                    var hh=time.getHours();
                    var  mm=time.getMinutes();
                    var  ss=time.getSeconds();
                    var aa=y+'-'+m1+'-'+dd+' '+hh+':'+mm+':'+ss;
                    $("#time1").text(aa);
                    if(res.info['signcount']<50){
                        var day=parseInt(50-res.info['signcount']);
                        $('#day').text(day);
                        $('#daysign').text(3);
                        layer.open({
                            content:'成功领取1个金币'
                            ,skin:'msg'
                            ,type:1
                            ,time:1
                            ,end:function(){
                                location='<?php echo U("Sign/sign");?>'
                            }
                        })
                    }else if(res.info['signcount']>=50 && res.info['signcount']<200){
                        var day1=parseInt(200-res.info['signcount']);
                        $('#day').text(day1);
                        $('#daysign').text(6);
                        layer.open({
                            content:'成功领取1个金币',
                            skin:'msg',
                            type:1,
                            time:1,
                            end:function(){
                                location='<?php echo U("Sign/sign");?>'
                            }
                        })
                    }else if(res.info['signcount']>=200 && res.info['signcount']<500){
                        var day2=parseInt(500-res.info['signcount']);
                        $('#day').text(day2);
                        $('#daysign').text(10);
                        layer.open({
                            content:'成功领取6个金币',
                            skin:'msg',
                            type:1,
                            time:1,
                            end:function(){
                                location='<?php echo U("Sign/sign");?>'
                            }
                        })
                    }else if(res.info['signcount']>500){
                        layer.open({
                            content:'成功领取10个金币',
                            skin:'msg',
                            type:1,
                            time:1,
                            end:function(){
                                location='<?php echo U("Sign/sign");?>'
                            }
                        })
                    }
                }else{
                    layer.open({
                        content:'明天再来吧'
                        ,skin:'msg'
                        ,type:1
                        ,time:3
                    })
                }
            });
        })
    })





    ;(function($) {

        var Checkin = function(ele, options) {
            this.ele = ele;
            this.opt = options;
            //设置初始值
            this.defaults = {
                width: 100,
                height: 350,
                background: '#f90',
                radius: 10,
                color: '#fff',
                padding: 10,
                dateArray:arr()
            };
            this.obj = $.extend({}, this.defaults, this.opt);
        }
        Checkin.prototype.init = function() {
            var _self = this.ele,
                    html = '',
                    myDate = new Date(),
                    year = myDate.getFullYear(),
                    month = myDate.getMonth(),
                    day = myDate.getDate(),
                    weekText = ['日', '一', '二', '三', '四', '五', '六'];
            if($('.signtag').attr('signtag')==1){
                _self.css({
                    width: this.obj.width + 'px',
                    height: this.obj.height,
                    background: this.obj.background,
                    borderRadius: this.obj.radius,
                    color: this.obj.color,
                    padding: this.obj.padding
                }).append("<div class='title'><p>" + year + '年' + (month + 1) + '月' + day + '日' + "</p>" +
                "<a class=\'checkBtn\' href=\"javascript:;\">已签到</a>" +
                "</div>");
            }else{
                _self.css({
                    width: this.obj.width + 'px',
                    height: this.obj.height,
                    background: this.obj.background,
                    borderRadius: this.obj.radius,
                    color: this.obj.color,
                    padding: this.obj.padding
                }).append("<div class='title'><p>" + year + '年' + (month + 1) + '月' + day + '日' + "</p>" +
                "<a class=\'checkBtn\' href=\"javascript:;\">签到</a>" +
                "</div>");
            }


            $("<ul class='week clearfix'></ul><ul class='calendarList clearfix'></ul>").appendTo(_self);
            for (var i = 0; i < 7; i++) {
                _self.find(".week").append("<li>" + weekText[i] + "</li>")
            };
            for (var i = 0; i < 42; i++) {
                html += "<li></li>"
            };
            _self.find(".calendarList").append(html);
            var $li = _self.find(".calendarList").find("li");
            _self.find(".week li").css({
                width: (_self.width() / 4) + 'px',
                height: 30 + 'px',
                borderRight: '1px solid #f90',
                boxSizing: 'border-box',
                background: '#b25d06'
            });
            //这里是设置css样式的初始化
            $li.css({
                width: (_self.width() / 7) + 'px',
                height: 43+ 'px',
                borderRight: '1px solid #f90',
                borderBottom: '1px solid #f90',
                boxSizing: 'border-box',
                color: "#b25d06"
            });
            _self.find(".calendarList").find("li:nth-child(7n)").css('borderRight', 'none');
            _self.find(".week li:nth-child(7n)").css('borderRight', 'none');

            var monthFirst = new Date(year, month, 1).getDay();//获取一月第一天是周几

            var d = new Date(year, (month + 1), 0)
//			console.log(d);
            var totalDay = d.getDate(); //获取当前月的天数
//			console.log(totalDay);
            for (var i = 0; i < totalDay; i++) {
                $li.eq(i + monthFirst).html(i + 1);
                $li.eq(i + monthFirst).addClass('data' + (i + 1))
                if (isArray(this.obj.dateArray)) {
                    for (var j = 0; j < this.obj.dateArray.length; j++) {
                        if (i == this.obj.dateArray[j]) {
                            // 假设已经签到的
                            $li.eq(i + monthFirst).addClass('checked');
                        }
                    }
                }
            }
            //$li.eq(monthFirst+day-1).css('background','#f7ca8e')
            _self.find($(".data" + day)).addClass('able-qiandao');
        }
        var isChecked = false;
        Checkin.prototype.events = function() {
            var _self = this.ele;
            var $li = _self.find(".calendarList").find("li");
            if ($('.signtag').attr('signtag') == 1) {
                $('.able-qiandao').addClass('checked');
                $('.able-qiandao').addClass('signed');
            }
            $('.signed').addClass('checked');
//            $li.on('click', function(event) {
//                event.preventDefault();
//                /* Act on the event */
//
//
//                    modal(_self);
//                    dateArrayTotal();
//                    isChecked = true;
//                }
//            });
            var checkBtn = _self.find(".checkBtn");
            checkBtn.click(function(event) {
                modal(_self);
                _self.find('.able-qiandao').addClass('checked');
                isChecked = true;
                this.contenteditable="false";
                dateArrayTotal();
            });
        }
        //右上角的签到字样
        var modal = function(e) {
            var mask = e.parents().find(".mask");
            var close = e.parents().find(".closeBtn");
            if (mask && !isChecked) {
                mask.addClass('trf');
            } else {
                return
            };
            close.click(function(event) {
                event.preventDefault();
                mask.removeClass('trf')
            });
            e.parents().find('.checkBtn').text("已签到");

        }
        //获取签到信息并传给后台
        var dateArrayTotal=function(i){
            //返回今天签到的日期
            var checkedDay=$('.checkin').find('.checked:last').text();
            $.ajax({
                type:"get",
                data:{
                    "checkedDay":checkedDay
                },
                url:"",
                async:true,
                success: function(){
                    modal();
                }
            });
        }
        //从数据库获取签到的天数并渲染
        var arr = function(){
            var dateArray = [];
            $.ajax({
                url: "",
                dataType: "json",
                async:false,
                success: function(data){
                    $.each(data,function(i,el){
                        //获取签到的天数
                        dateArray.push(el.checkedDay);
                    });
                }
            });
            return dateArray;
        }

        //插件函数调用
        $.fn.Checkin = function(options) {
            var checkin = new Checkin(this, options);
            var obj = [checkin.init(), checkin.events()]
            return obj
        }
        var isArray = function(arg) {
            return Object.prototype.toString.call(arg) === '[object Array]';
        };
    })(jQuery);
    // 插件调用
    $(".checkin").Checkin({'width':350},{'height':400});
//    $(".checkin").css('marginTop',parseInt(($(window).innerHeight()-$(".checkin").outerHeight())/2)+'px');
    //    $(".checkin").css('marginTop',parseInt(($(window).innerHeight()-$(".checkin").outerHeight())/2)+'px');
</script>
</body>
</html>