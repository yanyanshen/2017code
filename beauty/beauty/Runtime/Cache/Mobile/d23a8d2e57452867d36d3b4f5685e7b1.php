<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <title>购物车</title> 
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
  <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','cart2.0','index'],'2015/09/15 16:00:42',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script> 
  <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.cart2_0._all_.v39013.css" type="text/css" />
     <script type="text/javascript" src="/Public/Mobile/js/jquery.min.1.8.2.js"></script>
  <script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>
  <style type="text/css">
.m_header,
.body{max-width: 640px;}
.m_header{left:50%;margin-left: -320px;}
</style> 
  <script type="text/javascript">function remReSize(){var w = $(window).width();try{w = $(parent.window).width();}catch(ex){};if(w>640){w = 640;};$('html').css('font-size',100/640*w+'px');$('#js_style_for_pc').remove();$('body').append('<style id="js_style_for_pc">.m_header{margin-left: -'+w/2+'px;}.m_menu{margin-left: -'+w/2+'px;}</style>');};remReSize();$(window).resize(remReSize);$(document).ready(function() {remReSize();});for(var i=0;i<3;i++){setTimeout(remReSize, 100*i);};</script> 
 </head> 
 <body> 
  <div class="body"> 
   <div class="m_header"> 
    <p> <a class="bt_prev" href="javascript:window.history.back();void(0);"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p> 
    <h1 class="ellipsis bt_title"> 购物车 </h1> 
    <p> <a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p> 
   </div> 
   <div class="m_menu hidden"> 
    <div> 
     <i class="rotate45"></i> 
     <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
     <a href="<?php echo U('Mobile/Category/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
     <a href="<?php echo U('Mobile/MyCart/mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
        <?php if($_SESSION['beauty_']['mid']> '0'): ?><a href="<?php echo U('Mobile/Member/index');?>"><span><i class="m_bg"></i></span>用户中心</a>
            <?php else: ?>
            <a href="<?php echo U('Mobile/Login/Dologin');?>"><span><i class="m_bg"></i></span>用户中心</a><?php endif; ?>
    </div> 
   </div> 
   <div class="lib_content" id="js_lib_content"> 
    <!--购物车有商品--> 
    <div class="car_opera"> 
     <label class="m_radio m_order_checkbox"> <input class="js_select_all" type="checkbox" /> </label>
     <label for="select_all" class="gray6">全选</label>
        <a href="javascript:;" style="float: right;color:black;" class="alldelete">全部删除</a>
    </div>
    <form id="js-form" action="" method="post">
      <?php if(is_array($cartlist)): $i = 0; $__LIST__ = $cartlist;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><div class="goodsbox">
      <ul class="goodslist"> 
       <li> 
        <div class="img"> 
         <label class="m_radio m_order_checkbox m_checked">
             <input type="checkbox" itemid="10780995380" name="gid[<?php echo ($info["gid"]); echo ($info["ml"]); ?>]" value="<?php echo ($info["gid"]); ?>"/>
         </label>
         <div class="img_type">
            <img class="img180" src="/Uploads/<?php echo ($info["imageurl"]); echo ($info["imagename"]); ?>"/>
         </div> 
        </div> 
        <div class="info"> 
         <p class="title"><a class="name gray3" href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$info['gid']));?>"><?php echo ($info["goodsname"]); ?></a></p>
         <span class="gray">型号：<input type="text" value="<?php echo ($info["ml"]); ?>ml" name="ml[<?php echo ($info["gid"]); echo ($info["ml"]); ?>]" readonly style="border: none;width: 60px;"/></span>
         <p class="numbox">
             <a class="del noclick" href="javascript:void(0)">-</a>
             <input class="num" type="text" name="buynum[<?php echo ($info["gid"]); echo ($info["ml"]); ?>]" value="<?php echo ($info["buynum"]); ?>" brandid="1067" itemid="10780995380" data-maxnum="10" />
             <a class="add" href="javascript:void(0)">+</a>
             <i class="clear"></i>
         </p>
        </div> 
        <div class="price">
         <span class="oof">￥</span>
         <span class="js-price"><?php echo ($info["saleprice"]); ?></span>
         <br /> 
         <del>
          <span class="oof">￥</span><?php echo ($info["marketprice"]); ?>
         </del>
         <br /> 
         <span class="f10">X</span>
         <span class="js-num"><?php echo ($info["buynum"]); ?></span><br/>
         <a href="javascript:;" cid="<?php echo ($info["id"]); ?>" class="tocartdelete" style="color: black;margin-top: 15px;display: inline-block;">删除</a>
        </div> 
        <div class="clear"></div> <p class="additional gray9 text-left red">【该商品不支持货到付款】</p> </li> 
      </ul>
      <div class="singletotal gray9">
        数&nbsp;&nbsp;量：
       <span class="js-stnum gray3">0</span>
       <br />总金额：
       <span class="oof orange" >
           <em class="js-stprice">
               ￥<input type="text" value="" name="numprice[<?php echo ($info["gid"]); echo ($info["ml"]); ?>]" readonly style="width: 100%;border: none;color: red;font-size: 16px;"/>
           </em>
       </span>
      </div>
     </div><?php endforeach; endif; else: echo "$empty" ;endif; ?>
     <div class="fixed_price">
      <div class="price_info"> 
       <p class="total" style="padding: 0;line-height: 40px;height: 40px;">
           <label class="m_radio m_order_checkbox"> <input class="js_select_all" type="checkbox" /></label>
           合计：<span class="orange">
           ￥<em>
           <input type="text" value="" name="orderprice" readonly style="background-color: #ffffff;color: black;height: 40px;font-size:26px;line-height: 40px;padding:0;margin-top:0;"/>
            </em>
       </span>
       </p>
       <p class="freight">（不含运费）</p> 
      </div> 
      <input class="submit" type="button" value="结算(2)" />
         <input type="hidden" value="<?php echo (session('mid')); ?>" name="mid"/>
      <em class="clear"></em> 
     </div> 
    </form> 
   </div>
      <script type="text/javascript">
          $(function(){
              $('.alldelete').click(function(){
                  if($('.js_select_all:checked').val()){
                      $.post('<?php echo U("Mobile/MyCart/alldelete");?>',function(response){
                          if(response.status){
                              layer.open({
                                  content: '删除成功'
                                  ,skin: 'msg'
                                  ,time: 2//2秒后自动关闭
                                  ,style:'line-heght:100px;'
                                  ,end:function(){
                                     $('.goodsbox').hide();
                                    location="<?php echo U('Mobile/MyCart/mycart');?>";
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
                      })
                  }else{
                      layer.open({
                          content: '请选中所有的商品'
                          ,skin: 'msg'
                          ,time: 2//2秒后自动关闭
                          ,style:'line-heght:100px;'
                      });
                  }
              })
          })
      </script>
      <script type="text/javascript">
          $(function(){
              $mid=$('input[name="mid"]').val();
              $('.submit').click(function(){
                  if($('.img input:checked').val()){
                      if($mid){
                          $.post("<?php echo U('Mobile/MyCart/toaccount');?>",$('#js-form').serialize(),function(response){
                              if(response.status){
                                  location="<?php echo U('Mobile/MyCart/orderlist');?>"+'?oid='+response.info;
                              }
                          },'json')
                      }else{
                          $.post('<?php echo U("Mobile/Order/carturl");?>',function(res){
                              if(res.status){
                                  location="<?php echo U('Mobile/Login/Dologin');?>";
                              }
                          },'json')
                      }
                  }else{
                      layer.open({
                          content: '请选择要结算的商品哦'
                          ,skin: 'msg'
                          ,time: 2//2秒后自动关闭
                          ,style:'line-heght:100px;'
                      });
                  }
              })
          })
      </script>
   <div class="m_footer clear">
    <a class="m_icon m_icon_gotop hidden" href="javascript:void(0);"></a> 
    <script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>

<div class="userinfo">
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6 ellipsis" href="<?php echo U('Mobile/Member/index');?>"><?php echo (session('mname')); ?></a>
        <?php else: ?> <a style="color:#666666 " href="<?php echo U('Mobile/Login/Dologin');?>"> 登录</a><?php endif; ?>

    <span></span>
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" id="OUT" href="javascript:;">退出</a>
        <?php else: ?><a class="gray6" href="<?php echo U('Mobile/Register/index');?>">注册</a><?php endif; ?>
    <span></span>
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" href="<?php echo U('Mobile/Feedback/index');?>">用户反馈</a>
        <?php else: ?>
        <a class="gray6" href="<?php echo U('Mobile/Login/Dologin');?>">用户反馈</a><?php endif; ?>
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
   <div class="placeholder"></div>
   <div class="placeholder"></div>
   <div class="placeholder"></div>
   <div class="placeholder"></div>
   <div class="placeholder"></div>
   <div class="placeholder"></div>
   <div class="placeholder"></div>
   <div class="placeholder"></div>
   <div class="placeholder"></div>
   <div class="placeholder"></div>
   <div class="placeholder"></div>
   <div class="placeholder"></div>
   <div class="placeholder"></div> 
  </div> 
  <script type="text/javascript" src="/Public/Mobile/js/zip.touch.cart2_0._all_.v3624.js"></script>
 </body>
</html>
<script type="text/javascript">
    $(function(){
        $('.tocartdelete').click(function(){
            if($('.m_radio ').hasClass('m_checked')) {
                //得到购物车中商品的id
                a = $(this);
                id = $(this).attr('cid');
                $.post('<?php echo U("Mobile/MyCart/tocartdelete");?>', {cid: id}, function (resp) {
                    if (resp.status) {
                        layer.open({
                            content: '删除成功'
                            , skin: 'msg'
                            , time: 2//2秒后自动关闭
                            , style: 'line-heght:100px;'
                            , end: function () {
                                a.parents('.goodsbox').hide();
                            }
                        });
                    } else {
                        layer.open({
                            content: '请稍后再进行删除'
                            , skin: 'msg'
                            , time: 2//2秒后自动关闭
                            , style: 'line-heght:100px;'
                        });
                    }
                }, 'json')
            }else{
                layer.open({
                    content:'请选择后再删除'
                    ,skin:'msg'
                    ,time:5
                })
            }
        })
    })

</script>