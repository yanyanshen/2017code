<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>签到</title>
	<style>
	*{margin:0;padding:0;font:14px/1.8 "Helvetica Neue","microsoft yahei";}
	ul,li{list-style:none;}
	body{background: #fff; }
	.checkin{margin: auto auto auto auto; }
	.clear {clear:both; height:0; overflow:hidden; display:block; line-height:0}
	.clearfix:after {clear:both;font-size:0; height:0; display:block; visibility:hidden; content:" "; line-height:0}
	.clearfix {zoom:1}/* for IE6 IE7 */
	.title{height: 36px;line-height: 36px;font-size: 16px;margin-bottom: 10px;}
	.title p{float: left;width: 80%;height: 36px;line-height: 36px;font-size: 16px;}
	.title a{display: inline-block;width: 20%;height: 36px;line-height: 36px;text-align: center;background: #42941a;border-radius: 5px;color: #fff;text-decoration: none;font-size: 16px;}
	.checkin li{background: #fee684; float: left;padding: 10px;text-align: center;}

	li.able-qiandao{background: #e9c530; }
	li.checked{background:#fee684 url(http://i2.piimg.com/508767/a9576b09fc014d6e.png) no-repeat center;}
	.mask{ width: 100%;height: 100%;position: absolute;top: 0;left: 0; background-color: rgba(0,0,0,0.55);visibility: hidden;transition: all 0.25s ease}
	.modal{background:#fff;width: 450px;height: 400px;border-radius: 10px;position: absolute;margin-top: -200px;margin-left:-225px;left: 50%;top: 50%;border:5px solid #42941a;box-sizing:border-box;overflow: hidden;transform: translateY(-200%);transition: all 0.25s ease}
	a.closeBtn{display: block;position: absolute;right: 10px;top: 5px;font-family: 'simsun';font-size: 18px;text-decoration: none;font-weight: bolder;color: #333}
	.title_h1{text-align: center;font-size: 40px;font-weight: normal;padding-top: 80px;display: block;width: 100%}
	.title_h1 span{display: inline-block;width: 40px;height: 40px;border-radius: 100%;background: #42941a;color: #fff;position: relative;float: left;margin-left: 30%;margin-top: 7px;}
	.title_h1 span::before{width: 10px;height: 2px;background: #fff;position: absolute;left: 8px;top: 23px;display: block;line-height: 0;font-size: 0;content: ""; transform: rotate(52deg);}
	.title_h1 span::after{width: 24px;height: 2px;background: #fff;position: absolute;left: 12px;top: 20px;display: block;line-height: 0;font-size: 0;content: "";transform: rotate(-45deg);}
	.title_h1 em{display: inline-block;font-size: 30px;float: left;margin-left: 10px;}
	.title_h1 i{display: inline-block;font-size: 16px;float: left;margin: 14px 0 0 10px;}
	.title_h2{text-align: center;font-size: 16px;display: block;padding-top: 20px;}
	.title_h2 span{font-size: 36px;color: #b25d06;}
	.trf{visibility: visible;}
	.trf .modal{transform: translateY(0);}
	</style>
    <script type="text/javascript" src="/Public/Home/js/jquery.min.1.8.2.js"></script>
	 
</head>
<body>
	<div class="checkin">
		
	</div>
	<div class="mask">
		<div class="modal">
			<a href="#" class="closeBtn">×</a>
			<h1 class="title_h1 clearfix"><span></span><em>已签到</em> <i>您已签到2天</i></h1>
			<h2 class="title_h2">您获得现金<span>0.88元</span></h2>
		</div>
	</div>
	<script>
	;
	(function($) {
		var Checkin = function(ele, options) {
			this.ele = ele;
			this.opt = options;
			this.defaults = {
				width: 452,
				height: 'auto',
				background: '#f90',
				radius: 10,
				color: '#fff',
				padding: 10,
				dateArray: [1, 2, 4, 6], // 假设已签到的天数+1
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
			_self.css({
				width: this.obj.width + 'px',
				height: this.obj.height,
				background: this.obj.background,
				borderRadius: this.obj.radius,
				color: this.obj.color,
				padding: this.obj.padding
			}).append("<div class='title'><p>" + year + '年' + (month + 1) + '月' + day + '日' + "</p><a class=\'checkBtn\' href=\"javascript:;\">签到</a></div>");
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
				height: 50 + 'px',
				borderRight: '1px solid #f90',
				boxSizing: 'border-box',
				background: '#b25d06'
			});
			$li.css({
				width: (_self.width() / 7) + 'px',
				height: 50 + 'px',
				borderRight: '1px solid #f90',
				borderBottom: '1px solid #f90',
				boxSizing: 'border-box',
				color: "#b25d06"
			});
			_self.find(".calendarList").find("li:nth-child(7n)").css('borderRight', 'none');
			_self.find(".week li:nth-child(7n)").css('borderRight', 'none');
			var monthFirst = new Date(year, month, 1).getDay();
			var d = new Date(year, (month + 1), 0)
			var totalDay = d.getDate(); //获取当前月的天数
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
					$(this).addClass('checked');
					modal(_self);
					isChecked = true;
				}
			});
			var checkBtn = _self.find(".checkBtn");
			checkBtn.click(function(event) {
				modal(_self);
				_self.find('.able-qiandao').addClass('checked');
				isChecked = true;
			});
		}
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
	$(".checkin").Checkin();
	// 元素居中显示，与插件无关，根本自己需要修改；
	$(".checkin").css('marginTop',parseInt(($(window).innerHeight()-$(".checkin").outerHeight())/2)+'px');
	</script>
</body>
</html>