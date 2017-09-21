<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <title>会员中心 - 我的订单</title> 
  <meta name="keywords" content="" /> 
  <meta name="description" content="" /> 
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
  <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','member2.0','orderlist'],'2015/09/15 16:13:27',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script> 
  <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.member2_0.orderlist.v3907.css" type="text/css" /> 
  <script type="text/javascript" src="/Public/Mobile/js/zepto.min.js"></script>
     <link rel="stylesheet" href="/Public/Mobile/layer_mobile/need/layer.css" type="text/css" />
     <script type="text/javascript" src="/Public/Mobile/layer_mobile/layer.js"></script>
     <style type="text/css">
.m_header,.body{max-width: 640px;}
.m_header{left:50%;margin-left: -320px;}
.reason,.js_close{cursor: pointer}
.m_tab a{width: 16%}
     </style>
     <script>
         $(function(){
             $('.m_tab a').click(function(){
                 $(this).addClass('selected').sibling().removeClass('selected');
             })
         })
     </script>
  <script type="text/javascript">function remReSize(){var w = $(window).width();try{w = $(parent.window).width();}catch(ex){};if(w>640){w = 640;};$('html').css('font-size',100/640*w+'px');$('#js_style_for_pc').remove();$('body').append('<style id="js_style_for_pc">.m_header{margin-left: -'+w/2+'px;}.m_menu{margin-left: -'+w/2+'px;}</style>');};remReSize();$(window).resize(remReSize);$(document).ready(function() {remReSize();});for(var i=0;i<3;i++){setTimeout(remReSize, 100*i);};</script> 
 </head> 
 <body> 
  <div class="body"> 
   <div class="m_header"> 
<!--
    <p> <a class="bt_prev" href="javascript:window.history.back();void(0);"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p>
-->
       <p> <a class="bt_prev" href="<?php echo U('Member/index');?>"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p>
       <h1 class="ellipsis bt_title"> 我的订单 </h1>
    <p> <a id="js_order_search"><i class="m_icon m_icon_search"></i></a> <a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p> 
   </div> 
   <div class="m_menu hidden"> 
    <div> 
     <i class="rotate45"></i>
        <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
        <a href="<?php echo U('Mobile/Category/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
        <a href="<?php echo U('Mobile/MyCart/mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
        <a href="<?php echo U('Mobile/Member/index');?>"><span><i class="m_bg"></i></span>用户中心</a>
    </div> 
   </div> 
   <div class="lib_content" id="js_lib_content"> 
    <form autocomplete="off" id="js_search" method="get" action="<?php echo U('Member/myOrder');?>">
     <input type="hidden" name="type" value="0" /> 
     <div class="m_search" id="js_order_searchbox"> 
      <div class="m_search_box"> 
       <i class="m_icon m_icon_searchbox"></i> 
       <input class="m_search_input" name="key" id="js_search_input" type="text" placeholder="搜索全部订单" /> 
      </div> 
      <span id="js_search_cancel" class="gray9">取消</span> 
      <input id="js_search_ok" class="m_search_ok hidden" type="submit" value="确定" /> 
     </div> 
    </form>
       <div class="m_tab m_tab_full m_tab_full5 bg_white">
           <?php if($status == 1): ?><a class="selected" href="<?php echo U('Member/myOrder');?>">全部</a>
               <?php else: ?>
               <a class="" href="<?php echo U('Member/myOrder');?>">全部</a><?php endif; ?>
           <?php if($status == 2): ?><a class="selected" href="<?php echo U('Member/dfk');?>">待付款</a>
               <?php else: ?>
               <a class="" href="<?php echo U('Member/dfk');?>">待付款</a><?php endif; ?>
           <?php if($status == 3): ?><a class="selected" href="<?php echo U('Member/dfh');?>">待发货</a>
               <?php else: ?>
               <a class="" href="<?php echo U('Member/dfh');?>">待发货</a><?php endif; ?>
           <?php if($status == 4): ?><a class="selected" href="<?php echo U('Member/dsh');?>">待收货</a>
               <?php else: ?>
               <a class="" href="<?php echo U('Member/dsh');?>">待收货</a><?php endif; ?>
           <?php if($status == 5): ?><a class="selected" href="<?php echo U('Member/dpj');?>">待评价</a>
               <?php else: ?>
               <a class="" href="<?php echo U('Member/dpj');?>">待评价</a><?php endif; ?>
           <?php if($status == 6): ?><a class="selected" href="<?php echo U('Member/ypj');?>">已评价</a>
               <?php else: ?>
               <a class="" href="<?php echo U('Member/ypj');?>">已评价</a><?php endif; ?>
       </div>
       <form action="" method="post" id="js_form" autocomplete="off">
					    <div class="placeholder"></div>
		<!--多个物流包-->
        <?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "没有找到数据" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div id="order_2015091516111878298" class="m_order">
                <div class="m_order_title">
                    <span class="m_order_pay gray6">订单号：
                        <a href="<?php echo U('Member/detail',array('oid'=>$val['id']));?>" class="gray6"><?php echo ($val["orderno"]); ?></a>
                    </span>
                    <span class="m_order_static"><?php echo ($val["statusname"]); ?></span>
                </div>

                <?php if($status != 6): ?><ul class="m_list m_list_top_line bg_white m_order_list">
                    <?php if(is_array($val['goods'])): $i = 0; $__LIST__ = $val['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><li data-goodsid="1115589" class="link">
                        <a href="">
                            <img truesrc="http://img1.paishoes.com/nike/guronglu/201508/27/ed39821be0_thumb_8080.jpg" fffsrc="http://ued.paixie.net/statics/site_touch//Public/Mobile/images/public/goods.png" src="/Uploads/<?php echo ($v2["imageurl"]); echo ($v2["imagename"]); ?>" class="img100">
                            <div class="info">
                                <p class="name gray3"><?php echo ($v2["goodsname"]); ?></p>
                                <p class="sku gray9"><?php echo ($v2["ml"]); ?>ml</p>
                            </div>
                            <div class="price">
                                <p class="">¥ <?php echo ($v2["saleprice"]); ?></p>
                                <p>x<?php echo ($v2["buynum"]); ?></p>
                            </div>
                        </a>
                    </li><?php endforeach; endif; else: echo "没有找到数据" ;endif; ?>
                </ul>
                <div class="pay">
                    <span class="freight gray9" style="float: left;margin-top: 4px">订单时间：<?php echo date('Y-m-d H:i:s',$val['create_time']);?></span>
                    <span class="freight gray9">共 <?php echo ($val["buynum"]); ?> 件，实付款</span>
                    <span class="payprice orange">¥ <?php echo ($val["price"]); ?></span>
                </div>

                    <?php else: ?>
                        <ul class="m_list m_list_top_line bg_white m_order_list">
                            <li data-goodsid="1115589" class="link">
                                <a href="">
                                    <img truesrc="http://img1.paishoes.com/nike/guronglu/201508/27/ed39821be0_thumb_8080.jpg" fffsrc="http://ued.paixie.net/statics/site_touch//Public/Mobile/images/public/goods.png" src="/Uploads/<?php echo ($val["imageurl"]); echo ($val["imagename"]); ?>" class="img100">
                                    <div class="info">
                                        <p class="name gray3"><?php echo ($val["goodsname"]); ?></p>
                                        <p class="sku gray9"><?php echo ($val["ml"]); ?>ml</p>
                                    </div>
                                    <div class="price">
                                        <p class="">¥ <?php echo ($val["saleprice"]); ?></p>
                                        <p>x<?php echo ($val["buynum"]); ?></p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="pay">
                        <span class="freight gray9" style="float: left;margin-top: 4px">评价时间：<?php echo date('Y-m-d H:i:s',$val['coaddtime']);?></span>
                        <span class="freight gray9">共 <?php echo ($val["buynum"]); ?> 件，实付款</span>
                        <span class="payprice orange">¥ <?php echo ($val["saleprice"]); ?></span>
                        </div><?php endif; ?>

                <div class="buttons">
                <?php switch($val["status"]): case "1": ?><a data-orderid="<?php echo ($val["id"]); ?>" href="javascript:void(0);" class="m_button js_cancle">取消订单</a>
                        <a href="<?php echo U('',array('oid'=>$val.id));?>" class="m_button m_button_orange">立即付款</a><?php break;?>
                    <?php case "2": ?><a href="<?php echo U('',array('oid'=>$val.id));?>" class="m_button m_button_orange">提醒发货</a><?php break;?>
                    <?php case "3": ?><a href="" class="m_button m_button_orange receipt" id="<?php echo ($val["id"]); ?>" >确认收货</a><?php break;?>
                    <?php case "4": ?><a href="<?php echo U('Mobile/Comment/commentgoods',array('oid'=>$val['id']));?>" class="m_button m_button_orange">评价</a><?php break;?>
                    <?php case "5": ?><a href="<?php echo U('Mobile/Comment/zuijiacomment',array('oid'=>$val['id']));?>" class="m_button m_button_orange">追加评价</a><?php break;?>
                    <?php case "6": ?><a href="javascript:;" class="m_button m_button_orange" id="deleteorder" >删除订单</a><?php break; endswitch;?>
                </div>

            </div>
            <input type="hidden" name="oid" value="<?php echo ($val["id"]); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
           <script type="text/javascript">
               $(function(){
                   oid=$('input[name="oid"]').val();
                   $('#deleteorder').click(function(){
                       $.post("<?php echo U('Mobile/Comment/deleteorder');?>",{oid:oid},function(res){
                           if(res.status==1){
                               layer.open({
                                   content: '删除成功'
                                   ,skin: 'msg'
                                   ,time: 2//2秒后自动关闭
                                   ,style:'line-heght:100px;'
                                   ,end:function(){
                                       location="<?php echo U('Mobile/Member/myOrder');?>";
                                   }
                               });

                           }else{
                               layer.open({
                                   content: '请稍后再试'
                                   ,skin: 'msg'
                                   ,time: 2//2秒后自动关闭
                                   ,style:'line-heght:100px;'
                               });
                           }
                       },'json')
                   })
               })
           </script>
		<div class="placeholder"></div>
	<div class="placeholder"></div>
					</form> 
    <div class="text-center"> 
     <a class="m_button m_button_radius js_more" href="javascript:void(0);">查看更多<i class="m_icon m_icon_down"></i></a> 
    </div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
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
  <script type="text/javascript" src="/Public/Mobile/js/zip.touch.member2_0.orderlist.v3621.js"></script>
  <script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script>
  <div class="p_order_canclereason" data-orderid="">
   <p class="reason" data-reasonid="1">我不想买了</p> 
   <p class="reason" data-reasonid="2">信息填写错误，重新拍</p> 
   <p class="reason" data-reasonid="3">卖家缺货</p> 
   <p class="reason" data-reasonid="4">面对面交易</p> 
   <p class="reason" data-reasonid="5">其他原因</p> 
   <div class="placeholder"></div> 
   <p class="js_close">取消</p> 
  </div> 
  <script type="text/javascript">
	var _type = 0;
	var _page = 1;
	var _total_page = 1;
    var _key = "";
</script>
  <link rel="stylesheet" href="/Public/Mobile/layer_mobile/need/layer.css" type="text/css" />
  <script type="text/javascript" src="/Public/Mobile/layer_mobile/layer.js"></script>
  <script>
     $("body").on("touchend mousedown", ".p_order_canclereason .reason", function() {
         var $this = $(this);
         var _orderid = $(this).parent().data("orderid");
         var _reasonid = $this.data("reasonid");
         //var _isdetail = $(".m_order_bottom").find(".js_cancle").data("isdetail");
         var url = "<?php echo U('Member/cancelOrder');?>";
         $(".m_mask").hide();
         $this.parent().hide();
         $.ajax({url: url, type: 'post', data: {order_id: _orderid, reasonid: _reasonid, act: 'cancel'}, dataType: 'json', error: function() {
             layer.msg('取消订单失败!');
         }, success: function(data) {
             window.location.reload();
             layer.msg('取消订单成功!',{icon:1});
         }});
     });
      $(function(){
          $('.receipt').click(function(){
              var oid=$(this).attr('id');
              $.post("<?php echo U('Member/receipt');?>",{oid:oid},function(res){
                  if(res.status == 1){
                      layer.open({
                          content:res.info,
                          skin:'msg',
                          type:1,
                          time:3,
                          location:"<?php echo U('Member/myOrder');?>"
                      })
                  }else{
                      layer.open({
                          content:res.info,
                          skin:'msg',
                          type:1,
                          time:3,
                          location:"<?php echo U('Member/myOrder');?>"
                      })
                  }
              })
          })
      })
 </script>
 </body>
</html>