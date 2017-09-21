$(document).ready(function(e) {
	$('.page-title .return').click(function(){
		if(!document.referrer){
			window.location.href = 'http://m.paixie.net/';
			return false;
		}
	});
	$(window).resize(function(){
		var width=$('.page-title').width();
		$('.touchslider-item a').css('width',width);
		$('.touchslider-viewport').css('height',300*(width/640));
	}).resize();	
	$(".touchslider").touchSlider({mouseTouch: true, autoplay: true});
	$('.page-title a.styles').click(function(){
		$('.style-box').fadeIn();
		$('<div></div>').appendTo('.com-content').css({"position":"absolute","top":"0","left":"0","right":"0","bottom":"0",background:"#000",'z-index':998,opacity: 0}).click(function(){
			$(this).fadeOut(function(){$(this).remove();});
			$('.style-box').fadeOut();
		}).fadeTo(500,0.6);
	});
	$('.style-box i').live('click',function(){
		if($(this).parent().hasClass('open')){
			$(this).parent().removeClass('open').addClass('close').next().removeClass('open').addClass('close');
			return false;
		}else if($(this).parent().hasClass('close')){
			$(this).parent().removeClass('close').addClass('open').next().removeClass('close').addClass('open');
			return false;
		}
	});
	$('.msign .infobox div').click(function(){
		$('.shop-info-box').fadeIn();
		$('<div></div>').appendTo('.com-content').css({"position":"absolute","top":"0","left":"0","right":"0","bottom":"0",background:"#000",'z-index':898,opacity: 0}).click(function(){
			$(this).fadeOut(function(){$(this).remove();});
			$('.shop-info-box').fadeOut();
		}).fadeTo(500,0.6);
	});
});