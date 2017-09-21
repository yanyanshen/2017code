<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <title>首页</title> 
  <meta name="keywords" content="拍鞋网,拍鞋网官方网站,拍鞋网商城" /> 
  <meta name="description" content="买鞋子哪个网站好，当然首选拍鞋网!中国最早成立的正品鞋子购物网站,国内最大的品牌鞋子销售广场。所售鞋子100%厂家授权,全国包邮,货到付款,提供最完美的购物体验！" /> 
  <meta charset="utf-8" /> 
  <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport" /> 

  <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.home._all_.v390312.css 

" type="text/css" /> 
  <!--<script type="text/javascript" src="/Public/Mobile/map/zepto.min.map"></script>-->
  <script type="text/javascript" src="/Public/Mobile/js/jquery.min.1.8.2.js"></script>
     <script type="text/javascript" src="/Public/Mobile/js/layer_mobile/layer.js"></script>
     <script type="text/javascript">function remReSize(){var w = $(window).width();try{w = $(parent.window).width();}catch(ex){};if(w>1200){w = 1200;};$('html').css('font-size',100/640*w+'px');};remReSize();$(window).resize(remReSize);$(document).ready(function() {remReSize();});for(var i=0;i<3;i++){setTimeout(remReSize, 100*i);};</script>
 </head> 
 <body> 
  <div class="body"> 
   <div class="m_header m_head"> 
    <div class="head_content"> 
     <a class="logo" href="index.html"> <img src="/Public/Mobile/images/Image-1.png" /> </a>
     <a class="search" href="<?php echo U('Mobile/Search/index');?>"> <i class="m_icon m_icon m_icon_search"></i> 热门搜索 </a>
        <?php if($_SESSION['beauty_']['mid']> '0'): ?><a href="<?php echo U('Mobile/Member/index');?>">
                <i class="m_icon m_icon_head_user"></i>
            </a>
            <?php else: ?>
            <a href="<?php echo U('Mobile/Login/Dologin');?>">
                <i class="m_icon m_icon_head_user"></i>
            </a><?php endif; ?>

     <img class="m_head_bg" src="/Public/Mobile/images/1440741194a58a4c.png" /> 
    </div> 
   </div> 
   <div class="lib_content" id="js_lib_content">
    <div class="placeholder"></div> 
    <div class="p_notice"> 
     <i class="m_icon m_icon_notice"></i> 
     <ul class="p_notice_list"> 
      <!--<li><a href="javascript:;">【beauty一岁啦！】</a></li>
      <li><a href="javascript:;">【谨防诈骗温馨提醒】</a></li>-->
         <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li><a href="javascript:;">【<?php echo ($val["title"]); ?>】</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
     </ul> 
    </div> 
    <div class="p_navegate"> 
     <div class="m_zepto_slide" data-auto="ture" data-time="3000" data-type="left" data-index="0"> 
      <div class="content" data-link="ture">
<!--顶部广告-->
      <?php if(is_array($advertise1)): $i = 0; $__LIST__ = array_slice($advertise1,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a class="item" href="<?php echo U('Mobile/Category/index');?>"><img src="/Uploads/Advertises/<?php echo ($data['picurl']); echo ($data['picname']); ?>" /><dfn></dfn></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </div> 
      <p class="index"> <a class="selected" href="http://m.paixie.net/topic/8903.html?site=pc"></a> <a href="http://m.paixie.net/topic/9107.html?site=pc"></a> <a href="http://m.paixie.net/spike"></a> </p> 
     </div> 
     <div class="placeholder"></div> 
     <div class="p_menu"> 
      <a href="<?php echo U('Mobile/Category/index');?>"> <i class="m_icon m_icon_menu"></i> <span>分类</span> </a>
      <a href="<?php echo U('Mobile/MyCart/mycart');?>"> <i class="m_icon m_icon_car"></i> <span>购物车</span> </a>
      <a href="<?php echo U('Mobile/Huiyuan/index');?>"> <i class="m_icon m_icon_logistics"></i> <span>黄金会员专享</span> </a>
      <a href="javascript:;" class="sign"> <i class="m_icon m_icon_coin"></i> <span>每日签到</span> </a>
         <input type="hidden" value="<?php echo (session('mid')); ?>" name="mid"/>
     </div> 
    </div>
       <script type="text/javascript">
           mid=$('input[name="mid"]').val();
           $('.sign').click(function(){
               if(mid){
                   location="<?php echo U('Mobile/Sign/sign');?>";
               }else{
                   location="<?php echo U('Mobile/Login/Dologin');?>";
               }
           })
       </script>
    <div class="placeholder"></div> 
    <div class="placeholder"></div>
       <div class="time" style="font-size: 15px;">
           <span style="margin: 0 5%;font-size: 16px;color: red">限时抢购</span>
           <span style="" class="day"></span>:
           <span class="house1"></span>:
           <span class="minite1"></span>:
           <span class="second1"></span>
           <span style="border:1px solid red;margin-left: 75%;border-radius: 5px;background-color: red;color: #f5f5f5">
               <a href="<?php echo U('Mobile/GoodsList/temai',array('temai'=>'temai'));?>" style="color: #f5f5f5">立即抢购&gt;</a>
           </span>
       </div>
       <script>
           function timer(){
               var ts = $(".input").attr('restTime'); //设置目标时间，并计算剩余的毫秒数
               var dd = parseInt(ts/60/60/24);  //计算剩余天数
               var today=new Date();
               var hh=today.getHours();
               var mm=today.getMinutes();
               var ss=today.getSeconds();
//                 $('.icon-time').eq(a).text('还剩:'+dd+'天'+parseInt(24-hh)+'小时'+parseInt(60-mm)+'分'+parseInt(60-ss)+'秒')
               $(".day").text(dd+'天');
               $(".house1").text(parseInt(24-hh));
               $(".minite1").text(60-mm);
               $(".second1").text(60-ss)
           }
           setInterval('timer()',1000); // 每隔1S执行一次
       </script>
    <ul class="limit_list">
        <?php if(is_array($activityInfo)): $i = 0; $__LIST__ = $activityInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><input type="hidden" class="input" restTime="<?php echo ($data['restTime']); ?>"/>
             <li style="width:30%;">
                 <a href="<?php echo U('Mobile/GoodsList/temai',array('temai'=>'temai'));?>">
                    <img class="img200" style="width: 100%;"
                      src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" /><br>
                         <span style="color:black;font-size: 0.05rem">惊人价:</span>
                     <span style="font-size: 0.05rem"><?php echo ($data['rules']); ?></span>
                 </a>
             </li><?php endforeach; endif; else: echo "" ;endif; ?>
     <li class="clock" style="width:31%;">
         <a href="<?php echo U('Mobile/GoodsList/temai');?>">
         <img style="width: 100%;" src="/Public/Mobile/images/goods.png"/>
        </a>
     </li>
    </ul> 

    <div class="p_title">
     <i class="m_icon m_icon_especially"></i> 女士专区
    </div>
       <div class="ad_field_two">
           <?php if(is_array($girl)): $i = 0; $__LIST__ = $girl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a href="<?php echo U('GoodsList/girl',array('girl'=>'lady'));?>"> <img style="width:80%;" src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>"/> </a><?php endforeach; endif; else: echo "" ;endif; ?>
       </div>
       <div class="p_title" style="float: left">
           <i class="m_icon m_icon_especially"></i> 男士专区
       </div>
       <div class="ad_field_two">
           <div class="ad_field_two">
               <?php if(is_array($boy)): $i = 0; $__LIST__ = $boy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a href="<?php echo U('GoodsList/boy',array('boy'=>'man'));?>">
                       <img style="width:80%;" src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>"/>
                   </a><?php endforeach; endif; else: echo "" ;endif; ?>
           </div>
       </div>
    <div class="placeholder"></div>
    <div class="placeholder"></div>
    <div class="p_title"> 
     <i class="m_icon m_icon_brand"></i> 品牌优惠
    </div>
    <div class="brand"> 
     <div class="brand_left_feild">
         <?php if(is_array($brandGoods)): $i = 0; $__LIST__ = array_slice($brandGoods,0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><a href="<?php echo U('GoodsList/brandList',array('bid'=>$date['id']));?>"><img src="/Upload/logo<?php echo ($date['blogopath']); echo ($date['blogoname']); ?>" /></a><?php endforeach; endif; else: echo "" ;endif; ?>
     </div>
     <div class="brand_right_feild">
         <?php if(is_array($brandGoods)): $i = 0; $__LIST__ = array_slice($brandGoods,9,2,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><a href="<?php echo U('GoodsList/index',array('bid'=>$date['id']));?>"><img src="/Upload/logo<?php echo ($date['blogopath']); echo ($date['blogoname']); ?>" /></a><?php endforeach; endif; else: echo "" ;endif; ?>
     </div> 
    </div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div>
<!--广告图片-->
    <div class="ad_field_one">

        <?php if(is_array($advertise2)): $i = 0; $__LIST__ = array_slice($advertise2,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a class="item" href="<?php echo U('Mobile/Category/index');?>"><img src="/Uploads/Advertises/<?php echo ($data['picurl']); echo ($data['picname']); ?>" /><dfn></dfn></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
    <div class="p_home_menu"> 
     <div>
         <?php if(is_array($one)): $i = 0; $__LIST__ = $one;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Mobile/GoodsList/goodslist',array('cid'=>$v1['cid']));?>" style="font-size:0.2rem;text-align: center;"><?php echo ($v1['cname']); ?>
          <img src="/Uploads/<?php echo ($v1["imageurl"]); echo ($v1["imagename"]); ?>" style="width: 1.23rem;vertical-align: middle;margin-left: 20%;"/> </a><?php endforeach; endif; else: echo "" ;endif; ?>
         <?php if(is_array($two)): $i = 0; $__LIST__ = $two;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Mobile/GoodsList/goodslist',array('cid'=>$v2['cid']));?>" style="font-size:0.2rem;text-align: center"><?php echo ($v2['cname']); ?>
             <img src="/Uploads/<?php echo ($v2["imageurl"]); echo ($v2["imagename"]); ?>" style="width: 1.13rem;vertical-align: middle;margin-left: 20%;"/> </a><?php endforeach; endif; else: echo "" ;endif; ?>
     </div>
     <div>
         <?php if(is_array($three)): $i = 0; $__LIST__ = $three;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Mobile/GoodsList/goodslist',array('cid'=>$v3['cid']));?>" style="font-size:0.2rem;text-align: center"><?php echo ($v3['cname']); ?>
             <img src="/Uploads/<?php echo ($v3["imageurl"]); echo ($v3["imagename"]); ?>" style="width: 1.13rem;vertical-align: middle;margin-left: 20%;"/> </a><?php endforeach; endif; else: echo "" ;endif; ?>
         <?php if(is_array($senven)): $i = 0; $__LIST__ = $senven;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v7): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Mobile/GoodsList/goodslist',array('cid'=>$v7['cid']));?>" style="font-size:0.2rem;text-align: center"><?php echo ($v7['cname']); ?>
                 <img src="/Uploads/<?php echo ($v7["imageurl"]); echo ($v7["imagename"]); ?>" style="width: 1.13rem;vertical-align: middle;margin-left: 20%;"/> </a><?php endforeach; endif; else: echo "" ;endif; ?>
     </div>
     <div>
         <?php if(is_array($five)): $i = 0; $__LIST__ = $five;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v5): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Mobile/GoodsList/goodslist',array('cid'=>$v5['cid']));?>" style="font-size:0.2rem;text-align: center"><?php echo ($v5['cname']); ?>
             <img src="/Uploads/<?php echo ($v5["imageurl"]); echo ($v5["imagename"]); ?>" style="width: 1.13rem;vertical-align: middle;margin-left: 20%;"/> </a><?php endforeach; endif; else: echo "" ;endif; ?>
             <?php if(is_array($six)): $i = 0; $__LIST__ = $six;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v6): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Mobile/GoodsList/goodslist',array('cid'=>$v6['cid']));?>" style="font-size:0.2rem;text-align: center"><?php echo ($v6['cname']); ?>
                 <img src="/Uploads/<?php echo ($v6["imageurl"]); echo ($v6["imagename"]); ?>" style="width: 1.13rem;vertical-align: middle;margin-left: 20%;"/> </a><?php endforeach; endif; else: echo "" ;endif; ?>
     </div>
    </div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
    <div class="p_favorite"> 
     <span>您可能会喜欢</span> 
    </div> 
    <div class="m_list m_goods_list">
     <?php if(is_array($goodsInfo)): $i = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="m_goods_cell">
             <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                <img class="img" src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>" />
                <p class="title f26 gray6 ellipsis"><?php echo (mb_substr($data['goodsname'],0,10,utf8)); ?>...</p>
                 <span class="fact_price f28 orange">&yen;<?php echo ($data['saleprice']); ?></span>
             </a>
         </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div>
    <div class="placeholder"></div>
       <!--底部广告-->
    <div class="ad_field_one">
        <?php if(is_array($advertise3)): $i = 0; $__LIST__ = array_slice($advertise3,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><a class="item" href="<?php echo U('Mobile/Category/index');?>"><img src="/Uploads/Advertises/<?php echo ($data['picurl']); echo ($data['picname']); ?>" /><dfn></dfn></a><?php endforeach; endif; else: echo "" ;endif; ?>
    </div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
   </div> 
   <div class="m_footer clear"> 
    <a class="m_icon m_icon_gotop hidden" href="javascript:void(0);"></a> 
    <div class="home_links"> 
     <p>  <a href="http://m.haosou.com/" target="_blank">360好搜</a> <a href="http://m.baidu.com" target="_blank">百度</a> <a href="http://123hw.com/" rel="nofollow" target="_blank">123好网址</a> <a href="http://dh.sogou.com/?fr=0005-001s" rel="nofollow" target="_blank">搜狗网址导航</a> <a href="http://m.hao123.com" rel="nofollow" target="_blank">好123</a> </p>

    </div>
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
  </div>
  <script type="text/javascript" src="/Public/Mobile/js/zip.touch.home._all_.v36912.js"></script> 
  <script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script> 

 </body>
</html>