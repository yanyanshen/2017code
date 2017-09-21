<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/fonts/iconfont.css" rel="stylesheet" type="text/css" />
<script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
<script src="/Public/Home/js/lrtk.js" type="text/javascript"></script>
<title>产品列表</title>
    <style>
        .box{
            width:1200px;
            margin:0px auto;
        }
        #span{
            font-size: 13px;color: orangered;
        }
        .span{
            font-size: 12px;color: dimgray;
        }
        .span1{
            font-size: 15px;color: red;font-weight: bolder;
        }
        #page a,#page span{
            display: inline-block;
            width:18px;
            height:18px ;
            padding: 5px;
            margin: 2px;
            text-decoration: none;
            text-align: center;
            line-height: 18px;
            background: #f0ead8;
            color:#000000;  border: 1px solid #c2d2d7;
        }
        #page a:hover{  background: #333;  color:#fff;  }
        #page span{background: #333;  color: #fff;  font-weight: bold;  }
        .actived{color:#fff;background: #FF4A4A;width: 70px;border-radius: 5px;}


        .gl-item.hover {
            border: 1px solid #ddd;
            z-index: 1;
            border-color: #E9E9E9;
            -webkit-box-shadow: 0 0 2px 2px #F8F8F8;
            -moz-box-shadow: 0 0 2px 2px #f8f8f8;
            box-shadow: 0 0 2px 2px #F8F8F8;
        }


        .em{
            border: 1px solid #ddd;
            z-index: 1;
            border-color: #E9E9E9;
            -webkit-box-shadow: 0 0 2px 2px #F8F8F8;
            -moz-box-shadow: 0 0 2px 2px #f8f8f8;
            box-shadow: 0 0 2px 2px #F8F8F8;
        }
    </style>
</head>
<script>
<!--
 //点击效果start

 function infonav_more_up(index){
  var infonav_height = 85;
  $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:infonav_height});
  $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"> <a class="more" onclick="infonav_more_down('+index+');' +
  'return false;" href="javascript:">更多<em class="pullup"></em></a></p>');
 }
 function onclick(event) {
  info_more_down();
 return false;
 }



</script>




<body>
<!--顶部图层-->
 <div id="header_top">
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/fonts/iconfont.css" rel="stylesheet" type="text/css" />
<!--<script src="/Public/Home/map/jquery-1.9.1.min.map" type="text/javascript"></script>-->
<script src="/Public/Home/js/lrtk.js" type="text/javascript"></script>
<link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/fonts/iconfont.css"  rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
    <script src="/Public/Admin/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script src="/Public/Admin/js/jquery.form.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.lazyload.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.reveal.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.sumoselect.min.js" type="text/javascript"></script>
    <script src="/Public/Home/js/jquery.jumpto.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/search.css">
    <style>
        .Navigation_name { padding:0; margin:0; list-style-type:none;}
        .Navigation_name li { background:#fff;   color:#fff; }
        .Navigation_name li a { display:block;text-align:center;line-height:32px; color:#fff; font-size:13px; text-decoration:none;}
        .cur{ background-color: #d2d2d2;
            padding: 0 5px; font-weight:bold;}
    </style>
</head>
<script>
    $(function() {
        $('#OUT').click(function () {
            $.post("<?php echo U('Home/Login/LoginOut');?>",'', function (res) {
              if (res.status == 1) {
                    layer.msg(res.info,{icon:1},function(){
                        location.href = "<?php echo U('Home/Index/index');?>";
                    });
                } else {
                    layer.open({
                        content: '错误提示',
                        type: 2,
                        skin:'msg'
                    });
                }
            }, 'json')
        });

/*头部我的收藏沈艳艳*/
        $(".s_cart").mouseenter(function(){
            $.post('<?php echo U("Home/Collect/collect");?>',function(res){
                var str='';
                var count=''
                if(res.status==1){
                    for(var i in res.info){
                        str+='<li>'
                        str+='<div class="img">' + '<img src="/Uploads/'+res.info[i]['imageurl']+res.info[i]['imagename']+'">' +
                        '</div>'
                        str+='<div class="content"><p>'
                        str+='<a href="'+'<?php echo U("Home/Order/goodsdetail");?>?gid='+res.info[i]['gid']+'">';
                        str+=res.info[i]['goodsname'].substr(0,10)+'</a></p><p>价格：￥'+res.info[i]['saleprice']+'</p></div>'
                        str+='<div class="Operations">'
                        str+='<p>'
                        str+='<a href="javascript:;" class="deleteCollect" gid="'+res.info[i]['gid']+'">';
                        str+= '删除</a>'
                        str+='</p></div></li>'
                    }if(res.info==1){
                        str='<div class="prompt"></div>' +
                        '<div class="nogoods"><b></b>您的收藏夹还没有宝贝哦，赶紧添加吧！！！！</div>'
                    }
                    $(".p_s_list").html(str);
                }else{
                        str='<div class="prompt"></div>' +
                        '<div class="nogoods"><b></b>登录之后才能看哦！！！</div>'
                         $(".dorpdown-layer").html(str);
                }
            });
        });
            $(".deleteCollect").live('click',function(){
                var a=$(this);
                var gid=$(this).attr('gid');
                $.get("<?php echo U('Collect/deleteCollect');?>?gid="+gid,function(res){
                    a.parents('li').hide();
                })
            });
/*头部我的收藏*/
    })
</script>




<div id="header_top">
    <div id="top">
        <div class="Inside_pages">
            <div class="Collection">您好，欢迎光临<?php echo session('mname')?session('mname'):'';?>！<a id="OUT"  style="color: #ff0000; cursor: pointer"><?php echo session('mname')?'退出':'';?></a>
            </div>
            <div class="hd_top_manu clearfix">
                <ul class="clearfix">
                    <li class="hd_menu_tit zhuce" data-addclass="hd_menu_hover">
                        欢迎光临本店！
                        <a href="<?php echo U('Home/Login/Login');?>" class="red">
                        <?php echo session('mname')?'':'[请登录]';?>
                    </a>
                        <?php echo session('mname')?'':'新用户';?>
                        <a href="<?php echo U('Home/Register/Register');?>" class="red">
                            <?php echo session('mname')?' ':'[免费注册]';?>
                        </a>
                    </li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Index/index');?>">我的首页</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"><a href="<?php echo U('Home/Member/Orderform');?>">我的订单</a></li>
                    <li class="hd_menu_tit" data-addclass="hd_menu_hover"> <a href="<?php echo U('Home/MyCart/tocart');?>">购物车</a> </li>
                    <li class="hd_menu_tit list_name" data-addclass="hd_menu_hover">
                        <a href="#" class="hd_menu">网站导航</a>
                        <div class="hd_menu_list">
                            <ul>
                                <li><a href="<?php echo U('Home/Footprint/footprint');?>">足迹</a></li>
                                <li><a href="<?php echo U('Home/Feedback/index');?>">反馈</a></li>
                                <li><a href="<?php echo U('Home/Member/index');?>">用户中心</a></li>
                                <li><a href="<?php echo U('Home/Member/showCollect');?>">我的收藏</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="hd_menu_tit phone_c" data-addclass="hd_menu_hover"><a href="#" class="hd_menu "><em class="iconfont icon-shouji"></em>手机版</a>
                        <div class="hd_menu_list erweima">
                            <ul>
                                <img src="/Public/Home/images/mobile.png"  width="100px" height="100"/>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    <!--样式-->
    <!--顶部样式2-->
<div id="header "  class="header page_style">
    <div class="logo"><a href="<?php echo U('Index/index');?>"><img style="width: 210px;height: 122px" src="/Public/Mobile/images/Image-1.png" /></a></div>
        <!--结束图层-->
    <form action="<?php echo U('Home/Search/index');?>" method="get">
        <div class="Search">
                <p><input name="keywords" value="<?php echo ($keywords?$keywords:'面膜'); ?>" type="text"  class="text" style="width: 450px;height: 32px"/>
                <input name="" type="submit" value="搜 索"  class="Search_btn" style="padding: 0 15px;height: 38px"/></p>
                <p class="Words">
                    <a href="<?php echo U('Home/Search/index',array('cid'=>1));?>">面部护理</a>
                    <a href="<?php echo U('Home/Search/index',array('cid'=>22));?>">身体护理</a>
                    <a href="<?php echo U('Home/Search/index',array('cid'=>33));?>">香水彩妆</a>
                    <a href="<?php echo U('Home/Search/index',array('cid'=>53));?>">洗发护发</a>
                    <a href="<?php echo U('Home/Search/index',array('cid'=>70));?>">男性护理</a>
                    <a href="<?php echo U('Home/Search/index',array('cid'=>83));?>">推荐品牌</a>
                </p>
        </div>
    </form>
        <!--购物车样式-->
    <div class="hd_Shopping_list" id="Shopping_list">
        <div class="s_cart"><a href="">我的收藏</a> <i class="ci-right">&gt;</i><i id="shopping-amount"></i></div>
        <div class="dorpdown-layer">
            <div class="spacer"></div>
            <ul class="p_s_list">
            </ul>
            <div class="Shopping_style">
                    <div class="p-total"></div>
                    <a href="<?php echo U('Home/Member/showCollect');?>" title="" id="btn-payforgoods" class="Shopping">查看更多</a>
            </div>
        </div>
    </div>
</div>

<div id="Menu" class="clearfix">
    <div class="index_style clearfix">
        <div id="allSortOuterbox">
            <div class="t_menu_img"></div>
        </div>
        <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail"});</script>
        <!--菜单栏-->
        <div class="Navigation" id="Navigation">
            <ul class="Navigation_name" id="Navigation_name">
                <li><a href="<?php echo U('Home/Index/index');?>" target="_blank">首页</a></li>
                <li><a href="<?php echo U('Home/MustSee/index');?>" target="_blank">每日必看</a></li>
                <li><a href="<?php echo U('Home/BuyBrands/groupBuy');?>" target="_blank">限时团购</a></li>
                <li><a href="<?php echo U('Home/MustSee/girl');?>" target="_blank">女士专区</a></li>
                <li><a href="<?php echo U('Home/MustSee/boy');?>" target="_blank">男士专区</a></li>
                <li><a href="<?php echo U('Home/Huiyuan/index');?>" target="_blank">黄金会员专享</a></li>
                <!--<li><a  id="cj" name="<?php echo (session('mname')); ?>" href="javascript:;" >抽奖有礼</a><em class="hot_icon"></em></li>-->
                <!--<li><a id="sign" name="<?php echo (session('mname')); ?>" href="javascript:;" target="_blank">签到领金币</a></li>-->
                <?php if($_SESSION['beauty_']['mid']> 0): ?><li><a  href="<?php echo U('Home/HongBao/showhongbao');?>">双11领红包</a></li>
                    <?php else: ?>
                    <li><a  href="<?php echo U('Home/Login/Login');?>">双11领红包</a></li><?php endif; ?>
            </ul>
        </div>
        <script>$("#Navigation").slide({titCell:".Navigation_nameidcj li"});</script>
        <a href="<?php echo U('Home/Sign/signCity');?>" class="link_bg"  style="color: red;font-size: 20px;font-weight: bolder;
        font-style: italic">
            <img style="vertical-align: middle;margin-bottom:5px;"  src="/Public/Home/images/jin.png" />金币商城
        </a>
    </div>
</div>


<script type="text/javascript">
    var urlstr = location.href;
    //alert((urlstr + '/').indexOf($(this).attr('href')));
    var urlstatus=false;
    $("#Navigation_name a").each(function () {
        if ((urlstr + '/').indexOf($(this).attr('href')) > -1&&$(this).attr('href')!='') {
            $(this).addClass('cur'); urlstatus = true;
        } else {
            $(this).removeClass('cur');
        }
    });
    if (!urlstatus) {$("#Navigation_name a").eq(0).addClass('cur'); }

</script>




<script>



    $(function(){
        $('#sign').click(function(){
            var session1=$(this).attr('name');
            //alert(session);
            if(!session1){
                location="<?php echo U('Home/Login/Login');?>";
            }else{
                location="<?php echo U('Home/Sign/sign');?>";
            }
        });
    })

</script>
<!--菜单导航样式-->
</div>
<!--内容样式-->
<div class="Inside_pages">
 <!--位置-->
  <div class="Location_link">
  <!--<em></em><a href="#">搜索条件</a>  &lt;<a href="#"><?php echo ($keywords); ?></a>-->
 </div>
   <!--筛选样式-->
   <div id="Filter_style">
    <!--推荐-->
    <div class="page_recommend">
      <div class="hd"><em></em>今日推荐<ul></ul></div>
      <div class="bd">
       <ul>
           <?php if(is_array($recommendGoods)): $i = 0; $__LIST__ = $recommendGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><li>
         <div class="img"><a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['id']));?>">
             <img src="/Uploads/<?php echo ($date["imageurl"]); echo ($date["imagename"]); ?>" width="120" height="120" /></a></div>
         <div class="pro_info">
          <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['id']));?>"><?php echo (substr($date["goodsname"],0,18)); ?>...</a>
          <p class="Price">￥<?php echo ($date["saleprice"]); ?></p>
          <p class="Sales">热销：<b><?php echo ($date["salenum"]); ?></b>件</p>
         </div>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
       </ul>
      </div>
      <a class="next" href="javascript:void(0)"><em class="iconfont icon-left"></em></a>
      <a class="prev" href="javascript:void(0)"><em class="iconfont icon-right"></em></a>
    </div>
    <script type="text/javascript">
		jQuery(".page_recommend").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:4,trigger:"click"});
		</script>
  <div class="Filter">
  <div class="Filter_list clearfix">
   <div class="Filter_title"><span>品牌：</span></div>
   <div class="Filter_Entire">
       <?php if($_SESSION['beauty_']['moren1']== 'moren1'): ?><a class="actived" href="<?php echo U('Search/index',array('moren1'=>'moren1'));?>">全部</a>
           <?php else: ?>
           <a style="color:#000000;background-color: #f5f5f5" href="<?php echo U('Search/index',array('moren1'=>'moren1'));?>">全部</a><?php endif; ?>
   </div>
   <div class="p_f_name infonav_hidden">
        <?php if(is_array($brands)): $i = 0; $__LIST__ = $brands;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><p>
                <a href="javascript:;"><?php echo ($date['brandtype']); ?></a>
               <?php if(is_array($date['child'])): $i = 0; $__LIST__ = $date['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i; if($_SESSION['beauty_']['bid']== $date['id']): ?><a class="actived" href="<?php echo U('Search/index',array('bid'=>$date['id']));?>"><?php echo ($date['bname']); ?></a>
                       <?php else: ?>
                       <a href="<?php echo U('Search/index',array('bid'=>$date['id']));?>"><?php echo ($date['bname']); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
           </p><?php endforeach; endif; else: echo "" ;endif; ?>
   </div>
   <p class="infonav_more"><a href="#" class="more" onclick="infonav_more_down(0);return false;">更多<em class="pullup"></em></a></p>
  </div>
  <div class="Filter_list clearfix">
  <div class="Filter_title"><span>价格：</span></div>
  <div class="Filter_Entire">
      <?php if($_SESSION['beauty_']['moren2']== 'moren2'): ?><a class="actived" href="<?php echo U('Search/index',array('moren2'=>'moren2'));?>">全部</a>
          <?php else: ?>
          <a style="color:#000000;background-color: #f5f5f5" href="<?php echo U('Search/index',array('moren2'=>'moren2'));?>">全部</a><?php endif; ?>

  </div>
  <div class="p_f_name">
      <?php if(($_SESSION['beauty_']['low']== '0') AND ($_SESSION['beauty_']['high']== '50')): ?><a class="actived" href="<?php echo U('Search/index',array('price'=>'0-50'));?>">0-50</a>
         <?php else: ?>
            <a href="<?php echo U('Search/index',array('price'=>'0-50'));?>">0-50</a><?php endif; ?>
      <?php if(($_SESSION['beauty_']['low']== '50') AND ($_SESSION['beauty_']['high']== '150')): ?><a class="actived" href="<?php echo U('Search/index',array('price'=>'50-150'));?>">50-150</a>
          <?php else: ?>
          <a href="<?php echo U('Search/index',array('price'=>'50-150'));?>">50-150</a><?php endif; ?>
      <?php if(($_SESSION['beauty_']['low']== '150') AND ($_SESSION['beauty_']['high']== '500')): ?><a class="actived" href="<?php echo U('Search/index',array('price'=>'150-500'));?>">150-500</a>
          <?php else: ?>
          <a href="<?php echo U('Search/index',array('price'=>'150-500'));?>">150-500</a><?php endif; ?>

      <?php if(($_SESSION['beauty_']['low']== '500') AND ($_SESSION['beauty_']['high']== '1000')): ?><a class="actived" href="<?php echo U('Search/index',array('price'=>'500-1000'));?>">500-1000</a>
          <?php else: ?>
          <a href="<?php echo U('Search/index',array('price'=>'500-1000'));?>">500-1000</a><?php endif; ?>
      <?php if(($_SESSION['beauty_']['low']== '1000') AND ($_SESSION['beauty_']['high']== '2000')): ?><a class="actived" href="<?php echo U('Search/index',array('price'=>'1000-2000'));?>">1000-2000</a>
          <?php else: ?>
          <a href="<?php echo U('Search/index',array('price'=>'1000-2000'));?>">1000-2000</a><?php endif; ?>
  </div>
  </div>
 </div>
 </div>
 <!--样式-->
  <div  class="scrollsidebar side_green clearfix" id="scrollsidebar"> 
  <div class="show_btn" id="rightArrow"><span></span></div>
   <div class="page_left_style side_content"  >
  <!--浏览记录-->
   <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
   <div class=" side_list">
   <div class="Record">
     <div class="title_name">浏览记录</div>
	 <ul>

	 <?php if(is_array($footInfo)): $i = 0; $__LIST__ = $footInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><li>
	   <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['gid']));?>">
	   <p><img src="/Uploads/<?php echo ($date["imageurl"]); echo ($date["imagename"]); ?>"></p>
	   <p class="p_name"><?php echo (substr($date["goodsname"],0,18)); ?>...</p>
	   </a>
	   <p><span class="p_Price left">价格:<b>￥<?php echo ($date['saleprice']); ?></b></span><span class="p_Sales right">销量：<?php echo ($date['salenum']); ?>件</span></p>
	  </li><?php endforeach; endif; else: echo "" ;endif; ?>
	 </ul>
   </div>
   <!--销售排行-->
    <div class="pro_ranking">
    <div class="title_name"><em></em>销量排行</div>
    <div class="ranking_list">
     <ul id="tabRank">
         <?php if(is_array($sale)): $k = 0; $__LIST__ = $sale;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($k % 2 );++$k;?><li class="t_p">
              <em class="icon_ranking"><?php echo ($k); ?></em>
              <dt><h3><a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['id']));?>"><?php echo ($date['goodsname']); ?></a></h3></dt>
              <dd class="clearfix">
              <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['id']));?>">
                  <img src="/Uploads/<?php echo ($date['imageurl']); echo ($date['imagename']); ?>" width="90" height="90" /></a>
              <span class="Price">￥<?php echo ($date['saleprice']); ?></span>
              </dd>
              </li><?php endforeach; endif; else: echo "" ;endif; ?>
     </ul>
    </div>
    </div>
    <script type="text/javascript">
	jQuery("#tabRank li").hover(function(){ jQuery(this).addClass("on").siblings().removeClass("on")},function(){ });
    jQuery("#tabRank").slide({ titCell:"dt h3",autoPlay:false,effect:"left",delayTime:300 });	</script>
    </div>
  </div>
  <div class="page_right_style">
 <!--排序样式-->
 <script type="text/javascript"> 
$(function() { 
//	$("#scrollsidebar").fix({
//		float : 'left',
//		//minStatue : true,
//		skin : 'green',
//		durationTime : 600
//	});
});






</script>
 <div id="Sorted" class="fixToTop">
 <div class="Sorted">
  <div class="Sorted_style">
      <?php if($_SESSION['beauty_']['moren']== 'moren'): ?><a  href="<?php echo U('Search/index',array('moren'=>'moren'));?>" class="actived">综合<i class="iconfont icon-pullup"></i></a>
      <?php else: ?>
          <a href="<?php echo U('Search/index',array('moren'=>'moren'));?>" >综合<i class="iconfont icon-pullup"></i></a><?php endif; ?>

      <?php if($_SESSION['beauty_']['saledesc']== 'salenum'): ?><a class="actived " href="<?php echo U('Search/index',array('saledesc'=>'salenum'));?>">
                销量优先<i class="iconfont icon-pullup"></i>
            </a>
      <?php else: ?>
          <a  href="<?php echo U('Search/index',array('saledesc'=>'salenum'));?>">销量优先<i class="iconfont icon-pullup"></i></a><?php endif; ?>


      <?php if($_SESSION['beauty_']['pricedesc']== 'saleprice'): ?><a class="actived" href="<?php echo U('Search/index',array('pricedesc'=>'saleprice'));?>">价格<i class="iconfont icon-pullup"></i></a>
          <?php else: ?>

          <a href="<?php echo U('Search/index',array('pricedesc'=>'saleprice'));?>">价格<i class="iconfont icon-pullup"></i></a><?php endif; ?>

      <?php if($_SESSION['beauty_']['newGoods']== 'addtime'): ?><a class="actived" href="<?php echo U('Search/index',array('newGoods'=>'addtime desc'));?>">新品<i class="iconfont icon-pullup"></i></a>
          <?php else: ?>
          <a  href="<?php echo U('Search/index',array('newGoods'=>'addtime'));?>">新品<i class="iconfont icon-pullup"></i></a><?php endif; ?>
   </div>
   <!--产品搜索-->
   <div class="product_search">
       <form action="<?php echo U('Search/index');?>" method="get">
            <input name="keywords" type="text" class="search_text" value="<?php echo ($keywords?$keywords:'面膜'); ?>"
                   onfocus="this.value=''" onblur="if(!value){value=defaultValue;}">
            <input  type="submit" value=""   class="search_btn">
       </form>
   </div>
   <!--页数-->

   </div>
 </div>
 <!--结束-->
 <!--产品列表样式-->
 <div class="p_list  clearfix">

   <ul>
       <form action="" method="post" id="goods">
       <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><input type="hidden" gid="<?php echo ($date["id"]); ?>" value="<?php echo ($date["id"]); ?>"/>
            <li class="gl-item em">
                <div class="Borders">
                     <div class="img"><a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['id']));?>">
                         <img src="/Uploads/<?php echo ($date['imageurl']); echo ($date['imagename']); ?>" style="width:220px;height:220px"></a></div>
                     <div class="Price"><b>¥<?php echo ($date['saleprice']); ?></b><span>[¥49.01/500g]</span></div>
                     <div class="name"><a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['id']));?>"><?php echo (mb_substr($date['goodsname'],0,13,utf8)); ?>...</a></div>
                     <div class="Review" style="display: inline">已有<a href="javascript:;"><?php echo ($date['collectnum']); ?></a>人收藏&nbsp;&nbsp;</div>
                    <div class="Review" style="display: inline">已有<a href="javascript:;">销量:<?php echo ($date['salenum']); ?></a></div>
                    <a href="javascript:;" class=" "><em></em></a>
                     <div class="p-operate">
                      <a href="javascript:;" id="collect" gid="<?php echo ($date["id"]); ?>" class="p-o-btn Collect"><em ></em>收藏</a>
                     </div>
                 </div>
            </li><?php endforeach; endif; else: echo "$empty" ;endif; ?>
       </form>
   </ul>

   <div class="Paging">
    <div class="Pagination" id="page">
        <?php echo ($page); ?>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
<div class="phone_style">
    <div class="index_style">
        <span class="phone_number"><em class="iconfont icon-dianhua"></em>400-4565-345</span><span class="phone_title">客服热线 7X24小时 贴心服务</span>
    </div>
</div>
<div class="footerbox clearfix">
    <div class="clearfix">
        <div class="">
            <?php if(is_array($footer)): $i = 0; $__LIST__ = $footer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><dl>
                <dt><?php echo ($data["fname"]); ?></dt>
                <?php if(is_array($data["child"])): $i = 0; $__LIST__ = $data["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Home/Index/news',array('id'=>$v['id']));?>" target="_blank"><?php echo ($v["fname"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div class="text_link">
        <p>
            <a href="#">关于我们</a>｜ <a href="#">公开信息披露</a>｜ <a href="#">加入我们</a>｜ <a href="#">联系我们</a>｜ <a href="#">版权声明</a>｜ <a href="#">隐私声明</a>｜ <a href="#">网站地图</a></p>
        <p>蜀ICP备11017033号 Copyright ©2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
    </div>
</div>
   <!--右侧菜单栏购物车样式-->
<style>
    .cartlist{color: black;height: 80px;}
    .cartlist a{color: black;display:inline-block;line-height: 80px;height: 80px;}
    .cartlist a span{color: black;display:inline-block;line-height: 80px;height: 80px;margin: 0 5px;}
    .cartlist span img{margin-top: 10px;vertical-align: middle;width: 50px;height: 50px; }
</style>
<script type="text/javascript">
    $(function(){
        $('.cart_bd').mouseenter(function(){
            $.post('<?php echo U("Home/MyCart/getcartlist");?>',function(res){
                var str='';
                var totalprice=0;
                if(res.info){
                    for(var i in res.info){
                        str+='<dd class="cartlist">';
                        str+='<a href="'+'<?php echo U("Home/Order/goodsdetail");?>?gid='+res.info[i]['gid']+'">';
                        str+='<span><img src="/Uploads/'+res.info[i].imageurl+'/'+'100_'+res.info[i].imagename+'"/></span>';
                        str+='<span style="height: 80px;line-height: 80px;">'+res.info[i].goodsname.substr(1,6)+'</span>';
                        str+='<span>'+res.info[i].ml+'ml</span>';
                        str+='<span>￥'+res.info[i].saleprice+'*'+res.info[i].buynum+'</span>';
                        str+='<span>'+res.info[i].sumprice+'元'+'</span>';
                        str+='</a>';
                        str+= "<a href=javascript:; class='deletecart' style='color:black;' cid=" +res.info[i]['id']+">删除</a>";
                        str+='</dd>';
                        totalprice=totalprice+parseInt(res.info[i].sumprice);
                    }
                }
                if(res.info==''){
                       str='<dd class="message1" style="height: 40px;margin-top: 20px;line-height:40px;margin-left:30px;background: url(/Public/Home/images/settleup-nogoods.png) no-repeat">购物车内暂无商品，赶紧选购吧!</dd>';
                }

                $('.good_cart').text(res.info.length);
                $('.totalgoods').html('共&nbsp;'+res.info.length+'&nbsp;件商品');
                $('.message dl').html(str);
                $('.total').html('共计:&nbsp;'+totalprice+'&nbsp;元');
            },'json');
        });

        $('.deletecart').live('click',function(){
             a=$(this);
             id=$(this).attr('cid');
            $.post('<?php echo U("Home/MyCart/deletecart");?>',{cid:id},function(respon){
              if(respon.status){
                 a.parent().hide();
                 layer.msg('删除成功',{time:500});
              }
            })
        })
    })
</script>
<div class="fixedBox" >
    <ul class="fixedBoxList">
        <li class="fixeBoxLi user"><a id="user_btn" name="<?php echo (session('mname')); ?>" > <span class="fixeBoxSpan iconfont icon-yonghu"></span> <strong>用户</strong></a> </li>
        <li class="fixeBoxLi cart_bd" style="display:block;" id="cartboxs">
            <p class="good_cart">0</p>
            <span class="fixeBoxSpan iconfont icon-cart"></span> <strong><a href="<?php echo U('Home/MyCart/tocart');?>">购物车</a></strong>
            <div class="cartBox">
                <div class="bjfff">
                </div>
                <div class="message"  style="color: #808080">
                    <dl class="dl">

                    </dl>
                    <span class="totalgoods"></span>
                    <span class="total" style="margin:0 25px;"></span>
                    <a class='tocart'  href='<?php echo U("Home/MyCart/tocart");?>' style="background-color: red;color: white;display:inline-block;width: 60px;height: 30px;border-radius:5px;margin-top: 0;line-height: 30px;">去购物车</a>
                </div>
            </div>
        </li>

        <li class="fixeBoxLi Service "> <span class="fixeBoxSpan iconfont icon-service"></span> <strong>客服</strong>
            <div class="ServiceBox">
                <div class="bjfffs"></div>
                <dl onclick="javascript:;">
                    <dt><img style="width:80px;height:60px" src="/Public/Home/images/logo.png"></dt>
                    <dd><strong>艳艳</strong>
                        <p class="p1">9:00-22:00</p>
                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1932314889&site=qq&menu=yes">
                            <img border="0" src="http://wpa.qq.com/pa?p=2:1932314889:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
                    </dd>
                </dl>
                <dl onclick="javascript:;">
                    <dt><img style="width:80px;height:60px" src="/Public/Home/images/logo.png"></dt>
                    <dd> <strong>贝贝</strong>
                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=1875431157&site=qq&menu=yes">
                            <img border="0" src="http://wpa.qq.com/pa?p=2:1932314889:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
                        </a>
                    </dd>
                </dl>
            </div>
        </li>

        <li class="fixeBoxLi code cart_bd " style="display:block;" id="cartboxs">
            <span class="fixeBoxSpan iconfont icon-erweima"></span> <strong>微信</strong>
            <div class="cartBox">
                <div class="bjfff"></div>
                <div class="QR_code">
                    <p><img src="/Public/Home/images/2wm.png" width="150px" height="150px" style=" margin-top:10px;" /></p>
                    <p>微信扫一扫，关注我们</p>
                </div>
            </div>
        </li>

        <li class="fixeBoxLi cart_bd" id="collectGoods" name="<?php echo (session('mname')); ?>">
            <div class="collect"></div>
            <span class="fixeBoxSpan iconfont  icon-shoucang"></span> <strong >收藏</strong>
        </li>
        <li class="fixeBoxLi Home" id="footprint" name="<?php echo (session('mname')); ?>"> <span class="fixeBoxSpan iconfont  icon-zuji"></span> <strong>足迹</strong> </a> </li>
        <li class="fixeBoxLi Home" id="feedback" name="<?php echo (session('mname')); ?>"> <span class="fixeBoxSpan iconfont  icon-fankui"></span> <strong>反馈</strong> </a> </li>
        <li class="fixeBoxLi BackToTop"> <span class="fixeBoxSpan iconfont icon-top"></span> <strong>返回顶部</strong> </li>
    </ul>
</div>
<script>
    //点击用户，如果没有登录，则跳到登录页面
    $(function(){
        $('#user_btn').click(function(){
            var session1=$(this).attr('name');
            //alert(session);
            if(!session1){
                    location="<?php echo U('Home/Login/Login');?>";
            }else{
                location="<?php echo U('Home/Member/index');?>";
            }
        });
        /*点击收藏   如果是登录状态跳到用户中心  否则跳到登录页*/
        $('#collectGoods').click(function(){
            var session=$(this).attr('name');
            if(!session){
                    location.href="<?php echo U('Home/Login/Login');?>";
            }else{
                location.href="<?php echo U('Home/Member/showCollect');?>";
            }
        });


        /*点击反馈*/
        $('#feedback').click(function(){
            var session=$(this).attr('name');
            if(!session){
                    location.href="<?php echo U('Home/Login/Login');?>";
            }else{
                location.href="<?php echo U('Home/Feedback/index');?>";
            }
        })
    });

/*点击足迹*/
    $('#footprint').click(function(){
        var session=$(this).attr('name');
        if(!session){
                location.href="<?php echo U('Home/Login/Login');?>";
        }else{
            location.href="<?php echo U('Home/Footprint/footprint');?>";
        }
    });

</script>
</body>
</html>
<script>

    $(function(){
        $(".Collect").click(function(){
            var gid=$(this).attr('gid');
            $.get("<?php echo U('Home/Collect/collectGoods');?>",{gid:gid},function(res){
                if(res.status==1){
                    layer.msg('您已成功收藏该商品',{icon:1},function(){
                        location='<?php echo U("Search/index");?>'
                    });
                }else{
                    if(res.info=='该商品已经在收藏夹里哦'){
                        layer.msg(res.info);
                    }else if(res.info=='请先登录'){
                        location.href='<?php echo U("Login/Login");?>'
                    }
                }
            })
        })
    })
</script>