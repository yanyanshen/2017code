<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content=" width = device-width , initial-scale = 1.0 , maximum-scale = 1.0 , user-scalable = no " id="viewport" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <title>签到</title>
    <style>
        *{margin:0;padding:0;font:14px/1.8 "Helvetica Neue","microsoft yahei";}
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
        li.checked{background:#fee684 url(/Public/Home/images/ok.png) no-repeat bottom;}
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

        .able-qiandao{
            cursor: pointer;
        }

        #test {
            font-size: 20px;font-style: italic;margin-top: 15px;margin: 0 auto;
            width: 100%;height: 150px;color: #f5f5f5;line-height: 30px ;
            word-spacing: 5px;
            overflow:hidden;
            padding: 5px;
        }
    </style>
    <script src="/Public/Mobile/js/jquery.min.1.8.2.js"></script>
    <script src="/Public/Mobile/layer_mobile/layer.js" type="text/javascript"></script>

</head>
<body>
<div class="m_header" style="width: 100%;height: 35px;border: 1px solid red;background-color: orangered;
color: #f5f5f5;text-align: center;">
    <p> <a class="bt_prev" href="javascript:window.history.back();void(0);">
        <span class="prev rotate45">
        </span> <span class="prev rotate135">
    </span>
    </a>
    </p>
    <h1 style="margin-left: 5%;float: left">
        <a style="font-size: 18px;text-decoration: none;color: #f5f5f5" href="<?php echo U('Mobile/Index/index');?>">&lt;</a> </h1>
    <h1 style="font-size: 18px;"> 今日签到 </h1>
    <p> <a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p>
</div>
<div class="checkin" style="width: 100%;height: 400px">

</div>
<div class="checkin2" style="border:1px solid red;float: left;width: 86%;margin-left: 10px;margin-top: 1%;
            height:240px;background: #FE9C37;border-radius: 11px;padding: 13px">
                <span style="margin-left:7px;text-align: center;color:#dfdfdf;font-size: 15px">
                    签到总次数为
                    <span id="count" style="font-size: 15px;color: red"><?php echo ($sign['signcount']?$sign['signcount']:0); ?></span>
                    <?php if(($sign['signcount'] > 0) && ($sign['signcount'] < 500) ): ?><br><span style="margin-left:7px;font-size: 15px;color:#dfdfdf">再坚持</span>
                        <span id="day" style="font-size: 15px;color: red "><?php echo ($day); ?></span>天每天就可领取
                        <span id="daysign" style="font-size: 15px;color: red "><?php echo ($daysign); ?></span>金币<br>
                        <?php elseif($sign['signcount'] > 500): ?>
                        <p style="font-size: 15px;color: red">恭喜您可享有每天领取10金币的权限</p><?php endif; ?>
                </span>
                <span  style="margin:0 5px;text-align: center;color:#dfdfdf;font-size: 15px" >
                    最后签到时间为: <span id="time1" style="font-size: 15px;color: #f5f5f5"><?php echo (date('Y-m-d H:i:s',$sign['signtime'])); ?></span>
                </span>
    <div id="test" style="margin-top: 5px;font-size: 15px;color:#fffecc ">
        <div id="test1" style="margin-top: 5px;font-size: 12px">
            <span style="text-align: center;font-size: 16px">签到规则</span><br>
            1)每天签到都有金币相送,金币可以兑换商品哦<br>
            2)数量有限，每天只能签到一次<br>
            3)每次签到我们都会统计您的签到总次数<br>
            4)签到次数小于<span style="color: red"> 50 </span>时每次签到相送 <span style="color: red">1</span> 个金币<br>
            5)签到次数大于<span style="color: red"> 50 </span>小于<span style="color: red"> 200 </span>时每次签到相送<span style="color: red"> 3 </span>个金币<br>
            6)签到次数大于<span style="color: red"> 200 </span>小于<span style="color: red"> 500 </span>时每次签到相送<span style="color: red"> 6 </span>个金币<br>
            7)签到次数大于<span style="color: red"> 500 </span>时享有每天领取<span style="color: red"> 10 </span>金币的权限<br>
        </div>
        <div id="test2" style="font-size: 15px"></div>
    </div>
</div>
<div class="mask">
</div>
<input class="signtag" type="hidden" signtag="<?php echo ($sign['signtag']); ?>"/>
<script>
    var test=document.getElementById("test");
    var test1=document.getElementById("test1");
    var test2=document.getElementById("test2");

    test2.innerHTML=test1.innerHTML;
    function move(){
        if(test1.offsetHeight - test.scrollTop <= 0){
            test.scrollTop-=test1.offsetHeight;
        }
        test.scrollTop++;
    }
    setInterval("move()", 100);



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
                            ,time:2
                        })
                    }else if(res.info['signcount']>=50 && res.info['signcount']<200){
                        var day1=parseInt(200-res.info['signcount']);
                        $('#day').text(day1);
                        $('#daysign').text(6);
                        layer.open({
                            content:'成功领取3个金币',
                            skin:'msg',
                            type:1,
                            time:2
                        })
                    }else if(res.info['signcount']>=200 && res.info['signcount']<500){
                        var day2=parseInt(500-res.info['signcount']);
                        $('#day').text(day2);
                        $('#daysign').text(10);
                        layer.open({
                            content:'成功领取6个金币',
                            skin:'msg',
                            type:1,
                            time:2
                        })
                    }else if(res.info['signcount']>500){
                        layer.open({
                            content:'成功领取10个金币',
                            skin:'msg',
                            type:1,
                            time:2
                        })
                    }
                }else{
                    layer.open({
                        content:'明天再来吧'
                        ,skin:'msg'
                        ,type:1
                        ,time:2
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
                width: (_self.width() / 7) + 'px',
                height: 40 + 'px',
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
            $li.on('click', function(event) {
                event.preventDefault();
                /* Act on the event */
                if ($(this).hasClass('able-qiandao')) {
                    $('.able-qiandao').addClass('checked');
                    modal(_self);
                    dateArrayTotal();
                    isChecked = true;
                }

            });
            if($('.signtag').attr('signtag')==1){
                $('.able-qiandao').addClass('checked');
            }
            $('.sign').addClass('checked');
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
    $(".checkin").Checkin({'width':330},{'height':320});
    $(".checkin").css('marginTop',parseInt(($(window).innerHeight()-$(".checkin").outerHeight())/25)+'px');
//    $(".checkin").css('marginTop',parseInt(($(window).innerHeight()-$(".checkin").outerHeight())/2)+'px');
</script>
</body>
</html>