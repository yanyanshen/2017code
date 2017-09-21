var BindInfo = function(){
	var self = this;
	var Bind = function(type,callback,isone,data){
		var $box = $('<div class="com-bind-info"> <style> .com-bind-close, .com-bind-btn, .com-bind-content p a i, .com-bind-content p span i, .com-bind-content p a{background-image:url(http://ued.paixie.net/images/public/get_coupon.gif);} .com-bind-info{z-index:2001;top:700px; background:#fff;left:50%;margin-left:-150px;position:absolute;width:300px;-moz-box-shadow:0px 0px 10px #999; -webkit-box-shadow:0px 0px 10px #999; box-shadow:0px 0px 10px #999;border:1px solid #d7d7d7;} .com-bind-info a{color:#5f99e2;} .com-bind-info a{cursor:pointer;} .com-bind-tab{line-height:50px;height:50px;} .com-bind-tab a{background:#f3f4f6;width:150px;float:left;text-align:center;color:#5d5c5c;font-size:18px;font-family:微软雅黑,雅黑,yahei;} .com-bind-tab a.selected{background:#fff;color:#f53000;} .com-bind-content div{padding:27px 0 0 15px;line-height:33px;color:#333333;font-size:12px;} .com-bind-content p{margin:0;padding:0;overflow:hidden;} .com-bind-content p *{float:left;margin-right:10px;} .com-bind-content p label{line-height: 33px;margin:0;} .com-bind-content p input{outline:none;border:1px solid #cbcbcb;padding:0 5px;line-height:31px;height:31px;margin:0;margin-right:5px;width:100px;} .com-bind-content p input.code{width:94px;} .com-bind-content p span{padding-left: 48px;float:none;clear:both;line-height:26px;color:#999999;margin:0;display:block;height:26px;} .com-bind-content p span.code{padding-left: 0;float:left;clear:none;line-height:33px;display:inline;height:33px;position:relative;} .com-bind-content p span.error{color:red;} .com-bind-content p span.error i{display:inline-block;vertical-align:middle;width:14px;height:14px;background-position:0 -24px;float:none;margin:-3px 4px 0 0;+margin-top:1px;_display:none;} .com-bind-content p a{background-position:0 -43px;line-height:33px;padding-left:12px;overflow:hidden;height:33px;color:#333; margin-right:0px}.com-bind-content p a.waiting{opacity: 0.5;cursor:auto} .com-bind-content p a i{height:33px;display:inline-block;width:2px;margin-left:10px;float:none;margin-right:0;vertical-align:top;background-position:right -43px;+vertical-align:middle;} a.com-bind-btn{width:129px;height:38px;text-align:center;color:#fff;font-size:16px;font-family:微软雅黑,雅黑,yahei;display:block;margin:-10px 0 34px 48px;background-position:-22px 0;line-height:38px;} .com-bind-content ul{margin:0 11px 11px -37px;list-style:none;padding:0;border-top:1px solid #cccccc;line-height:20px;} .com-bind-content li{list-style:none;padding:0;padding-left:22px;color:#999999;} .com-bind-content li b{line-height:30px;display:block;margin-top:7px;font-weight:normal;} .com-bind-close{width:17px;height:19px;position:absolute;top:16px;right:13px;} .com-bind-close:hover{opacity:0.5;} </style> <a class="com-bind-close"></a> <div class="com-bind-tab"> <a class="selected">验证手机</a> <a>验证邮箱</a> </div> <div class="com-bind-content"> <div> <p> <label>手机号：</label> <input class="phone Phone-no" type="text"/> <a class="com-bind-get-code Phone-getcode">发送验证码<i></i></a> <span class="phone Phone-no-error"><i></i>&nbsp;</span> </p> <p> <label>验证码：</label> <input class="code Phone-code" type="text"/> <span class="Phone-code-error">请输入您收到的6位验证码</span> <span>&nbsp;</span> </p> <a class="com-bind-btn Phone-bind">确 定</a></div> <div style="display:none;"> <p> <label>邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</label> <input class="phone Email-no" type="text"/> <a class="com-bind-get-code Email-getcode">发送验证码<i></i></a> <span class="phone Email-no-error">&nbsp;</span> </p> <p> <label>验证码：</label> <input class="code Email-code" type="text"/> <span class="code Email-code-error">请输入您收到的6位验证码</span> <span>&nbsp;</span> </p> <a class="com-bind-btn Email-bind">确 定</a> <ul> <li><b>未收到邮件可能：</b></li> <li>·邮件可能在垃圾邮箱中， 请仔细查找。</li> <li>·网络延迟，若超过10分钟还没有收到邮件，请重新发送。</li> </ul> </div> </div></div>').appendTo('body');
		$box.find('.com-bind-tab a').click(function(){
			if($(this).hasClass('selected'))return;
			$(this).addClass('selected').siblings().removeClass('selected');
			$box.find('.com-bind-content > div:eq('+$(this).index()+')').show().siblings().hide();
		});
		if(type=='Email'){
			$box.find('.com-bind-tab a:eq(0)').hide().next().click().css({'text-align':'left','text-indent':'20px'});
		}else if(type=='Phone'){
			$box.find('.com-bind-tab a:eq(1)').hide().prev().css({'text-align':'left','text-indent':'20px'});
		}
		$box.find('.com-bind-close').click(function(){
			$box.remove();
			$('#js-bind-bg').remove();
		});
		$box.css({top:$(window).scrollTop()+$(window).height()/2-$box.height()/2});
		$.documentMask({z:2000,id:"js-bind-bg"});
		type = type.split(',');
		var Type = {};
		for(var i=0;i<type.length;i++){
			Type[type[i]] = false;
			(function(type){
				var verifyModel = new BindInfo.VerifyModel(
					$box.find('.'+type+'-no'),
					$box.find('.'+type+'-no-error'),
					$box.find('.'+type+'-getcode'),
					$box.find('.'+type+'-code'),
					$box.find('.'+type+'-code-error'),
					type,
					false,
					data
				);
				var isbinding = false;
				$box.find('.'+type+'-bind').click(function(){
					if(isbinding)return;
					verifyModel.Bind(function(isok,error){
						isbinding = false;
						if(isok){
							Type[type] = true;
							var isok = true;
							$.each(Type,function(key,value){
								if(!value){
									isok = false;
									return false;
								}
							});
							if(isok||isone){
								$box.remove();
								$('#js-bind-bg').remove();
								callback();
							}
						}else if(error){
							alert(error);
						}
					});
				});
			})(type[i]);
		}
	};
	self.BindPhoneEmail = function(callback,data){Bind('Email,Phone',callback,false,data);};
	self.BindEmailPhone = function(callback,data){Bind('Email,Phone',callback,false,data);};
	self.BindPhoneOrEmail = function(callback,data){Bind('Email,Phone',callback,true,data);};
	self.BindEmailOrPhone = function(callback,data){Bind('Email,Phone',callback,true,data);};
	self.BindEmail = function(callback,data){Bind('Email',callback,false,data);};
	self.BindPhone = function(callback,data){Bind('Phone',callback,false,data);};
};
BindInfo.EmailLib = window['EmailSevers']||{
	"sina.com.cn"	:"http://mail.sina.com.cn/",
	"sina.com"		:"http://mail.sina.com.cn/",
	"sina.cn"		:"http://mail.sina.com.cn/",
	"vip.sina.com"	:"http://mail.sina.com.cn/",
	"2008.sina.com"	:"http://mail.sina.com.cn/",
	"163.com"		:"http://mail.163.com/",
	"126.com"		:"http://mail.126.com/",
	"popo.163.com"	:"http://popo.163.com/",
	"yeah.net"		:"http://email.163.com/",
	"vip.163.com"	:"http://vip.163.com/",
	"vip.126.com"	:"http://vip.126.com/",
	"188.com"		:"http://188.com/",
	"vip.188.com"	:"http://vip.188.com/",
	"tom.com"		:"http://mail.tom.com/",
	"yahoo.com"		:"http://mail.cn.yahoo.com/",
	"yahoo.com.cn"	:"http://mail.cn.yahoo.com/",
	"yahoo.cn"		:"http://mail.cn.yahoo.com/",
	"sohu.com"		:"http://mail.sohu.com/",
	"hotmail.com"	:"https://Login.live.com/",
	"139.com"		:"http://mail.10086.cn/",
	"gmail.com"		:"https://accounts.google.com",
	"msn.com"		:"https://Login.live.com",
	"51.com"		:"http://passport.51.com/",
	"yougou.com"	:"http://mail.yougou.com/",
	"qq.com"		:"https://mail.qq.com",
	"foxmail.com"	:"http://mail.qq.com",
	"vip.qq.com"	:"http://mail.qq.com"
};
BindInfo.VerifyModel = function($obj,$objError,$sendCode,$code,$codeError,type,forgot,_data){
	var self = this;
	var issend = false;
	var obj = '';
	var objError = ' ';
	var codeError = '请输入您收到的6位验证码';
	var code = '';
	var _setInterval = null;
	var issending = false;
	_data = _data||{};
	if(type!=='Email'&& type!=='Phone'){
		throw new Error('参数错误');
	}
	$obj.unbind('focus change').focus(function(){
		$objError.html(objError=' ').removeClass('error');
	}).change(function(){
		obj = '';
		code = '';
		issend = false;
		issending = false;
		$code.val('');
		$objError.html(objError=' ').removeClass('error');
		$codeError.html(codeError='请输入您收到的6位验证码').removeClass('error');
		clearInterval(_setInterval);
		$obj.data('setTimeout',setTimeout(function(){
			$sendCode.html('发送验证码<i></i>').removeClass('waiting');
		},500));
	});
	$sendCode.unbind('click').click(function(){
		clearTimeout($obj.data('setTimeout'));
		if(issending)return;
		var _obj = $.trim($obj.val());
		issending = true;
		$sendCode.html('正在发送...<i></i>').addClass('waiting');
		var error = '';
		function verifyCallback(isok,error,data){
			if(isok){
				objError=' '
				if(type=='Email'){
					var url = BindInfo.EmailLib[_obj.split('@')[1]];
					if(url){
						url='<a target="_blank" href="'+url+'" style="background: none;display: inline;float: none;line-height: 26px;color: #5d89ca;height: 26px; margin: 0;padding: 0;">进入邮箱</a>';
					}else{
						url = '';
					}
					$objError.html('验证码已发送至您邮箱。'+url).removeClass('error');
				}else{
					$objError.html('验证码已发送至您手机。').removeClass('error');
				}
				issend = true;
				obj = _obj;
				var time = 60;
				_setInterval = setInterval(function(){
					$sendCode.html(time+'后重新获取<i></i>');
					if(--time<0){
						issending = false;
						clearInterval(_setInterval);
						$sendCode.html('发送验证码<i></i>').removeClass('waiting');
					}
				},1000);
			}else{
				issending = false;
				$objError.html('<i></i>'+(objError=error)).addClass('error');
				$sendCode.html('发送验证码<i></i>').removeClass('waiting');
			}
		};
		if(_data.verifyFun){
			error = _data.verifyFun(_obj,forgot,verifyCallback);
		}else{
			error = PXVerify['Send'+type+'Code'](_obj,forgot,verifyCallback,DOMIN.MAIN+'/register?n=1&jsoncallback=?');
		}
		if(error){
			$objError.html('<i></i>'+(objError=error)).addClass('error');
			issending = false;
			$sendCode.html('发送验证码<i></i>').removeClass('waiting');
		}
	});
	$code.unbind('focus blur').focus(function(){
		if(!issend){
			$(this).blur();
			$sendCode.focus();
			$objError.html('<i></i>'+(objError='请先发送验证码!')).addClass('error');
			return;
		}
		$codeError.html(codeError='请输入您收到的6位验证码').removeClass('error');
	}).blur(function(){
		if(!issend){
			return;
		}
		var _code = $.trim($(this).val());
		var error = PXVerify[type+'Code'](obj,_code,false);
		if(error){
			$codeError.html('<i></i>'+(codeError=error)).addClass('error')
		}else{
			code = _code;
			$codeError.html(codeError='请输入您收到的6位验证码').removeClass('error');
		}
	});
	self.Bind = function(callback){
		$code.focus().blur();
		if(obj&&code){
			var error = '';
			function bindCallback(isok,error,data){
				if(isok){
					callback(true,'');
				}else{
					callback(false,error);
				}
			};
			if(_data.bindFun){
				error = _data.bindFun(obj,code,bindCallback);
			}else{
				error = PXVerify['Bind'+type](obj,code,bindCallback);
			}
			if(error){
				callback(false,error);
			}
		}else{
			if ($.trim(codeError)) $codeError.html('<i></i>'+codeError).addClass('error');
			if ($.trim(objError)) $objError.html('<i></i>'+objError).addClass('error');
			callback(false,'');
		}
	};
};
var GetCoupon = function(){
	var self = this;
	var bindInfo = new BindInfo();
	var Get = function(url,callback){
		if(/promote\/coupon\/get_coupon.html\?id=\d+&vc=.+/.test(url)||/promote\/get_coupon\/?\?id=\d+&vc=.+/.test(url)){
			$.ajax({url:url+'&ajax=true&jsoncallback=?',type:'GET',dataType:'json',
				error: function(){
					callback({"IsSuccess":false,"Message":"领取失败，网络原因，可再次点击/刷新领取。"});
				},success:function(data){
					callback(data);
				}
			});
		}else{
			callback({"IsSuccess":false,"Message":"抱歉，当前时间不在活动时段！"});
		}
	};
	this.Result = {
		Success : function(coupon){
			var html = [];
			$.each(coupon,function(index,value){
				html.push(value.Price+'元');
			});
			alert('恭喜，成功领取'+coupon.length+'张面额分别为'+html.join('、')+'的店铺优惠券！');
			html = null;
		},
		NoStart : function(){
			alert('抱歉，活动还未开始！');
		},
		Count : function(){
			alert('抱歉，您今天领取数已超限！');
		},
		End : function(){
			alert('抱歉，活动已经结束！');
		},
		Other : function(msg){
			alert(msg);
		},
		BindEmailPhone : function(){
			bindInfo.BindEmailPhone(function(){self.Get(element,url,callback);});
		},
		BindPhoneEmail : function(){
			bindInfo.BindPhoneEmail(function(){self.Get(element,url,callback);});
		},
		BindPhoneOrEmail : function(){
			bindInfo.BindPhoneOrEmail(function(){self.Get(element,url,callback);});
		},
		BindEmailOrPhone : function(){
			bindInfo.BindPhoneOrEmail(function(){self.Get(element,url,callback);});
		},
		BindEmail : function(){
			bindInfo.BindEmail(function(){self.Get(element,url,callback);});
		},
		BindPhone : function(){
			bindInfo.BindPhone(function(){self.Get(element,url,callback);});
		},
		Login : function(){
			window.location.href = DOMIN.MAIN+'/Login.html?url='+window.location.href;
		}
	};
	this.Load = {
		Ing:function(){
			try{$(this).data('GetCoupon-loading').remove();}catch (e){}
			var left = ($(this).offset().left+$(this).outerWidth()/2);
			$(this).data('GetCoupon-loading',$('<img src="http://img-cdn2.paixie.net/images/loading.gif" width="16" height="16" style="position: absolute;left:'+left+'px;top:'+($(this).offset().top+$(this).outerHeight())+'px;"/>').appendTo($('body')));
		},
		End:function(){
			try{$(this).data('GetCoupon-loading').remove();}catch (e){}
		}
	};
	var url = '';
	var callback = null;
	var element = null;
	this.Get = function(_element,_url,_callback){
		element = _element;
		url = _url;
		self.Load.Ing.call(element);
		callback = _callback;
		Get(url,function(data){
			self.Load.End.call(element);
			if(callback){
				callback(data);
				return;
			}
			if(data.IsSuccess){
				self.Result.Success(data.Coupon);
			}else{
				switch (data.Message){
					case 'BindEmailOrPhone':
					case 'BindPhoneOrEmail':
					case 'BindEmailPhone':
					case 'BindPhoneEmail':
					case 'BindEmail':
					case 'BindPhone':
					case 'Login':
					case 'NoStart':
					case 'End':
					case 'Count':
						self.Result[data.Message]();
					break;
					default :
						self.Result.Other(data.Message);
					break;
				}
			}
		});
	};
};