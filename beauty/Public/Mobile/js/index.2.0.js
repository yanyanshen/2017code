$(document).ready(function(){
	var selectgood={id:goodInfo.ID,size:'',size_id:'',num:1}
	var goodslist=null;
	//滑动图片
	$(".touchslider").touchSlider({mouseTouch: true, autoplay: true});
	$(window).resize(function(e) {
		var height=320;
		$(".touchslider img").each(function(index, element) {
			height=$(element).height()>height?$(element).height():height;
		});
		$(".touchslider .touchslider-viewport").css('height',height+'px');
	}).resize();
	
	

	//限时促销倒计时
	if($('#js-time').length){
		var second = parseInt($('#js-time').attr('second'));
		var _setInterval = setInterval(function(){
			if(--second<=0){
				clearInterval(_setInterval);
				window.location.reload();
			}else{
				var t=parseInt(second/(24*60*60));
				var h=parseInt(second/(60*60)%24);
				var m=parseInt(second/60%60);
				var s=parseInt(second%60);
				t=t>0?t:'0'+t;
				h=h>0?h:'0'+h;
				m=m>0?m:'0'+m;
				s=s>0?s:'0'+s;
				if (Number(t)>0){
					$('#js-time span').html(t+'天'+h+'时'+m+'分');
				}else{
					$('#js-time span').html(h+':'+m+':'+s+'</i>');
				}
			}
		},1000);
	}
	
	//优惠
	$('#offer li b,#offer li i').click(function(){
		$('#offer').hide();
		$('#offer-title').show();
	});
	$('#offer-title').click(function(){
		$('#offer-title').hide();
		$('#offer').show();
	});
	
	
	//运费
	$('#js-freight-select').change(function(){
		var str=$('#js-freight-select option:selected').val();
		str=str.split('_');
		$('#js-freight-val').text(str[0]+'元');
		$('.pxui-select span').text(str[1]);
	});
	
	
	//选择数量
	$('.numselect a').live('click',function(){
		var $div=$(this).parent().parent().parent();
		var num=Number($div.find('.numselect input:eq(0)').val());
//		if ($(this).hasClass('del')&&num==1){
//			var $fav = $('<div class="fixed-favtip"><i class="del"></i>商品数量不能再减少了</div>').appendTo('body');
//			$fav.fadeIn();
//			setTimeout(function(){
//				$fav.fadeOut(function(){$fav.remove();})
//			},1200);
//			return false;	
//		}
		if ($(this).hasClass('noclick')) return false;
		if (!$div.find('.size li.current').length>0){alert('请选择尺码'); return false;}
		var bignum=$div.find('.size li.current a').attr('nums');
		if ($(this).hasClass('del')){
			num=num-1<=1?1:num-1;
		}else if ($(this).hasClass('add')){
			num=num+1>=bignum?bignum:num+1;
		}
		$div.find('.numselect input').val(num);
		$div.find('.numselect a').removeClass('noclick');
		if (num==1){$div.find('.numselect a.del').addClass('noclick');}
		else if (num==bignum){$div.find('.numselect a.add').addClass('noclick');}	
		return false;
	});
	$('.numselect input').live('change',function(){
		var $div=$(this).parent().parent().parent();
		var num=$(this).val();
		var bignum=$div.find('.size li.current a').attr('nums');
		if(!/^[0-9]*$/.test(num)) num=1;
		num=Number(num);
		num=num>bignum?bignum:num;
		num=num==0?1:num;
		$div.find('.numselect input').val(num);
		$div.find('.numselect a').removeClass('noclick');
		if (num==1){$div.find('.numselect a.del').addClass('noclick');}
		else if (num==bignum){$div.find('.numselect a.add').addClass('noclick');}	
	});
	
	//尺码选择
	$('.size li').live('click',function(){
		var $div=$(this).parent();
		$div.find('li').removeClass('current');
		$(this).addClass('current');
		var index=$(this).parent().find('li').index($(this));
		$div.find('.size li:eq('+index+')').addClass('current');
		$div.find('.numselect:eq(0) input').change();
	});
	
	//浮动购物车
    $(window).scroll(function(){
        if ($(document).scrollTop() >= $('.com-title').offset().top+$('.com-title').height()) {
            $('#fixedcart').css({
                'display':'block'
            });
        } else {
            $('#fixedcart').css({
                'display':'none'
            });
        };  
    })
	
	//弹出电话
	$('.jstel').click(function(){
		if (!confirm("呼叫客服：4008 81 82 83")) return false;
	});
	
	
	//收藏
	$('#js-fav').click(function(){
		if (PX_HELP_DATA[0]=='') {
			window.location.href='/Login?url='+escape(window.location.href);
			return false;
		}
		if ($('.fixed-favtip').length>0) return false;
		var url=DOMIN.MAIN+'/cart/ajax?act=favorite&item_id='+goodInfo.ID+'&jsoncallback=?';
		var tip='<div class="fixed-favtip"><i></i>已收藏</div>';
		if ($(this).hasClass('fav')) {
			url=DOMIN.PAIXIE+'/member/user_favorites?act=delItems&id='+goodInfo.ID+'&type=1&jsoncallback=?';
			tip='<div class="fixed-favtip"><i class="del"></i>已取消收藏</div>';
		}
		$('#js-fav').toggleClass('fav');
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'json',
			cache:false,
			timeout: 50000,
			error: function(data){},
			success: function(data){}
		});	
		var $fav = $(tip).appendTo('body');
		$fav.fadeIn();
		setTimeout(function(){
			$fav.fadeOut(function(){$fav.remove();})
		},1200);
	});
	
	
	//选购热点
	$('#js-goodstips a.more').click(function(){
		$(this).hide();
		$('#js-goodstips div').animate({height:'auto'},{queue:false,duration:500,easing:'linear'});
		return false;
	});
	
	
	//购买,加入购物车
	var isbuy=true;
	$('#map-buy,#map-addcart,#map-miaosha').click(function(){
		isbuy=$(this).attr('id').replace('js-','');
		if (isbuy == 'miaosha') {
			if ($(this).attr('Login')>0) {
				if ($(this).attr('phone') == '1') {
					var bindInfo = new BindInfo();
					bindInfo.BindPhone(function() {
						$('#js-miaosha').attr('phone', '0');
						$('#js-miaosha').click();
					});
					return false;
				}
			} else {
				window.location.href = DOMIN.MAIN + "/Login";
				return false;
			}
			if ($(this).hasClass('ready')) return false;
		}
		if(!$('.size:eq(0) li.current').length>0){
			$.documentMask({z:30});
			if (goodslist!=null){
				goodsbox();
			}else{
				$.ajax({
					url: DOMIN.PAIXIE+'/cart/index?jsoncallback=?',
					type: 'post',
					dataType: 'json',
					data:{act:'modify',goods_default:1,item_id:selectgood.id,vid:$('.size:eq(0) li.current a').attr('vid')},
					cache:false,
					timeout: 50000,
					error: function(data){alert(data);},
					success: function(data){
						goodslist=data;
						goodsbox();
					}
				});	
			}
			return false;	
		}
		selectgood.num=$('.numselect:eq(0) input').val();
		selectgood.size=$('.size:eq(0) li.current a').attr('rel');
		selectgood.size_id=$('.size:eq(0) li.current a').attr('vid');
		selectgood.id=goodInfo.ID;
		addcart();
	});
	function goodsbox(){
		var html='';
		html+='<div class="fixed-probox"><div class="selectprobox">'
		html+='	<h2>选择颜色尺码</h2><i class="colse"></i>'
		html+='	<div class="selectproinfo">'
		if (isbuy != 'miaosha') {
			html += '		<div class="title">颜色</div>';
			html += '		<ul class="color">';

			$.each(goodslist, function(index, item) {
				html += '<li ';
				if (item.item_id == goodInfo.ID) {
					html += 'class="current"';
				}
				;
				html += '><a title="' + item.color + '" href="' + item.url + '" item_id="' + item.item_id + '"><img src="' + item.thumbpath + '" alt="' + item.color + '" item_id="' + item.item_id + '" onerror="this.src=http://ued.paixie.net/images/error/8080.jpg" ></a></li>';
			});
			html += '</ul>';
		}
		html+='		<div class="title">尺码 ';
		if ($('#js-sizelink').length>0) html+='<a class="sizelink" href="'+$('#js-sizelink').attr('href')+'">查看尺码对照表</a>';
		html+='</div>';
		html+='		<ul class="size">';
		
		$.each(goodslist[selectgood.id].numamount,function(index,item){
			html+='<li><a nums="'+item.nums+'" vid="'+item.vid+'" rel="'+item.size+'" href="javascript:void(0)">'+item.sizeb+'</a></li>';
		});	

		html+='		</ul>'
		html+='		<div class="numbox">'
		html+='			<div>数量</div>'
		if (isbuy != 'miaosha') {
			html+='			<div class="numselect"><a class="del noclick" href="javascript:void(0)"></a><input type="text" type="number" value="1"><a class="add" href="javascript:void(0)"></a></div>'
		}else{
			html+='			<div class="numselect"><a class="del noclick" href="javascript:void(0)"></a><input type="text" disabled="" type="number" value="1"><a class="add noclick" href="javascript:void(0)"></a></div>'
		}
		html+='		</div>'
		html+='		<a href="#" class="submitpro">确定</a>'
		html+='	</div>'
		html+='</div></div>'
		var $goodsbox = $(html).appendTo('body');
		$goodsbox.find('i.colse').click(function(){
			$('#jquery_addmask').animate({opacity:0},{duration:500,complete:function(){$(this).remove();}});
			$goodsbox.fadeOut(function(){$goodsbox.remove()});
			selectgood.id=goodInfo.ID;
		});
		$goodsbox.find('.color li a').click(function(){
			if ($(this).parent().hasClass('current')) return false;
			$goodsbox.find('.color li').removeClass('current');
			$(this).parent().addClass('current')
			selectgood.id=$(this).attr('item_id');
			html='';
			$.each(goodslist[selectgood.id].numamount,function(index,item){
				html+='<li><a nums="'+item.nums+'" vid="'+item.vid+'" rel="'+item.size+'" href="javascript:void(0)">'+item.sizeb+'</a></li>';
			});	
			$goodsbox.find('.size').html(html);
			return false;
		});
		$goodsbox.find('.submitpro').click(function(){
			if (!$('.fixed-probox .size:eq(0) li.current').length>0){  alert('请选择尺码');return false;}
			selectgood.num=$('.fixed-probox .numselect:eq(0) input').val();
			selectgood.size=$('.fixed-probox .size:eq(0) li.current a').attr('rel');
			selectgood.size_id=$('.fixed-probox .size:eq(0) li.current a').attr('vid');
			addcart();
			return false;
		});
		
	}
	
	function addcart(){
		if (isbuy=='miaosha'){
			window.location.href = DOMIN.MAIN+'/tuan/cart?item_id='+selectgood.id+'&size_id='+selectgood.size_id+'&num='+selectgood.num;
		}else{
			$.ajax({
				url: '/cart/ajax?act=addcart&id='+selectgood.id+'&size='+selectgood.size+'&size_id='+selectgood.size_id+'&num='+selectgood.num+'&jsoncallback=?',
				type: 'GET',
				dataType: 'json',
				cache:false,
				timeout: 50000,
				error: function(data){
					if (isbuy=='buy'){
						window.location.href = '/cart/';
					}else{
						var fav='<div class="fixed-favtip" style="z-index:32"><i></i>恭喜，成功加入购物车</div>'
						if (!data.IsSuccess)fav='<div class="fixed-favtip" style="z-index:32"><i></i>抱歉，未加入购物车</div>';
						var $fav = $(fav).appendTo('body');
						$fav.fadeIn();
						setTimeout(function(){
							$fav.fadeOut(function(){$fav.remove();})
							if ($('.fixed-probox').length>0){
								 $('.fixed-probox').fadeOut(function(){$('.fixed-probox').remove();});
								 $('#jquery_addmask').animate({opacity:0},{duration:500,complete:function(){$(this).remove();}});
							}
						},1200);
					}
				},
				success: function(data){
					if (isbuy=='buy'){
						window.location.href = '/cart/';
					}else{
						var fav='<div class="fixed-favtip" style="z-index:32"><i></i>恭喜，成功加入购物车</div>'
						if (!data.IsSuccess)fav='<div class="fixed-favtip" style="z-index:32"><i></i>抱歉，未加入购物车</div>';
						var $fav = $(fav).appendTo('body');
						$fav.fadeIn();
						setTimeout(function(){
							$fav.fadeOut(function(){$fav.remove();})
							if ($('.fixed-probox').length>0){
								 $('.fixed-probox').fadeOut(function(){$('.fixed-probox').remove();});
								 $('#jquery_addmask').animate({opacity:0},{duration:500,complete:function(){$(this).remove();}});
							}
						},1200);
					}
				}
			});	
		}
	}
	
	
	//评论图片
	$("#js-commentlist").delegate('.img60','click',function(){
		var self = this;
		var img = $(self).find('img');
		var src = img.attr('maxsrc');
		var msgbox = $.message({
			html 	: '<img style="max-width:100%;display: block;margin: auto;" src="'+src+'"/>',
			title	: '查看评论图片',
			height	: 'auto',
			buttons	: [
				{
					disabled:!$(self).prev().length,
					light	:true,
					text	:'  上一张  ',
					click	:function(){
						msgbox.close();
						$(self).prev().click();
					}
				},
				{
					light	:false,
					text	:'  关 闭  ',
					click	:function(){
						msgbox.close();
					}
				},
				{
					disabled:!$(self).next().length||$(self).next().hasClass('show-more'),
					light	:true,
					text	:'  下一张  ',
					click	:function(){
						msgbox.close();
						$(self).next().click();
					}
				}
			]
		});
	})
});
;