<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
 <head> 
  <title>限时抢拍列表</title>
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
     <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/base.css"/>
     <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/page.css"/>
     <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/all.css"/>
     <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/mui.min.css"/>
     <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/loaders.min.css"/>
     <link rel="stylesheet" type="text/css" href="/Public/Mobile/list/css/loading.css"/>
     <script src="/Public/Mobile/list/js/jquery.min.1.8.2.js" type="text/javascript"></script>
  <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','list2.0','index'],'2015/09/15 16:17:01',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script> 
  <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.list2_0.index.v3902355.css" type="text/css" /> 
  <script type="text/javascript" src="/Public/Mobile/js/zepto.min.js"></script>
     <script src="/Public/Mobile/layer_mobile/layer.js" type="text/javascript"></script>
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
    <h1 class="ellipsis bt_title" style="margin-top: 3.5%"> 限时抢拍 </h1>
    <p> <a href="<?php echo U('Mobile/Search/index');?>"><i class="m_icon m_icon_search"></i></a> <a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p>
   </div> 
   <div class="m_menu hidden"> 
    <div> 
     <i class="rotate45"></i>
        <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
        <a href="<?php echo U('Mobile/Category/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
        <a href="<?php echo U('Mobile/MyCart/mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
        <a href="<?php echo U('Mobile/Member/index');?>"><span><i class="m_bg"></i></span>beauty中心</a>
    </div> 
   </div> 
   <div class="lib_content" id="js_lib_content"> 

    <div class="m_tab_select">
        <?php if($_SESSION['beauty_']['moren']== 'moren'): ?><a class="orange" href="<?php echo U('Mobile/GoodsList/temai',array('moren'=>'moren'));?>">默认</a>
            <?php else: ?>
            <a  href="<?php echo U('Mobile/GoodsList/temai',array('moren'=>'moren'));?>">默认</a><?php endif; ?>
        <?php if($_SESSION['beauty_']['collect1']== 'g.collectnum'): ?><a class="orange" href="<?php echo U('Mobile/GoodsList/temai',array('collect1'=>'collectnum'));?>">热卖</a>
            <?php else: ?>
            <a  href="<?php echo U('Mobile/GoodsList/temai',array('collect1'=>'collectnum'));?>">热卖</a><?php endif; ?>
        <?php if($_SESSION['beauty_']['price2']== 'g.saleprice'): ?><a class="orange" href="<?php echo U('Mobile/GoodsList/temai',array('price2'=>'saleprice'));?>" >&nbsp;价格</a>
            <?php else: ?>
            <a href="<?php echo U('Mobile/GoodsList/temai',array('price2'=>'saleprice'));?>" >&nbsp;价格</a><?php endif; ?>
        <a href="javascript:;" id="js-filter1">筛选</a>
    </div>
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
    <div class="placeholder"></div> 
    <div class="m_goods">
        <div class="m_goods" id="insert">
            <div id="js_hotgoodslist" class="m_list m_goods_list" >
                <div class="lists clearfloat">
                    <div class="bottom clearfloat">
                    <?php if(is_array($activityInfo)): $i = 0; $__LIST__ = $activityInfo;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div class="lie clearfloat">
                            <input type="hidden" class="input" value="<?php echo ($data['restTime']); ?>"  restTime="<?php echo ($data['restTime']); ?>"/>
                            <a href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                                <div class="tu clearfloat fl">
                                    <img style="" src="/Uploads/<?php echo ($data['imageurl']); echo ($data['imagename']); ?>"/>
                                </div>
                            </a>
                            <a  href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                                <p class="tit" style="font-size: 15px;"><?php echo (mb_substr($data['goodsname'],0,13,utf8)); ?>...</p>
                                <p style="color: #ff662c;margin-top: 3%;margin-bottom: 2%">￥<?php echo ($data['saleprice']); ?></p>
                            </a>
                            <span class="jifen fl over" style="width: 30%;margin-left:2%;margin-top: 2%;">
                                <a style="color:red;">
                                    <?php echo ($data['aname']); ?>
                                </a>
                            </span>
                            <span class="jifen fl over time"
                                  style="width:80%;font-size: 10px;margin-left: 27%">
                                </span>
                            <span>
                                <a style="width:30%;height: 44px;border:1px solid red;background-color: red;
                                padding: 3px;color: white;font-size: 15px;border-radius: 10px;margin-left: 20%;
                                    " href="<?php echo U('Mobile/Goods/goodsdetail',array('gid'=>$data['id']));?>">
                                    马上抢&gt;
                                </a>
                            </span>
                        </div>

                        <script>
                            var a=parseInt('<?php echo ($i-1); ?>');
                            function timer(a){
                                var ts = $(".input").eq(a).attr('restTime'); //设置目标时间，并计算剩余的毫秒数
                                var dd = parseInt(ts/60/60/24);  //计算剩余天数
                                var today=new Date();
                                var hh=today.getHours();
                                var mm=today.getMinutes();
                                var ss=today.getSeconds();
                                $('.time').eq(a).text('还剩:'+dd+'天'+parseInt(24-hh)+'小时'+parseInt(60-mm)+'分'+parseInt(60-ss)+'秒');
                            }
                            setInterval('timer(parseInt("<?php echo ($i-1); ?>"))',1000); // 每隔1S执行一次
                        </script><?php endforeach; endif; else: echo "$empty" ;endif; ?>
                    </div>
                </div>
                <div><?php echo ($page); ?></div>
            </div>
        </div>
    </div>

    </div> 


<div class="m_loading m_loaded"></div>
  <div class="text-center"></div>
      <div class="text-center"></div>
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
  </div> 
  <script type="text/javascript" src="/Public/Mobile/js/zip.touch.list2_0.index.v13619.js"></script>
  <!--<script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script> -->
  <script type="text/javascript">

//倒计时


$("#js-filter1").click(function(){
    $html='<div style="margin:3%;width: 100%;font-size: 16px;color: dimgray">' +
    '<form method="get" id="form1" action="<?php echo U('Mobile/GoodsList/temai');?>">'+
    '<div style="width: 100%";>按分类搜索：' +
        '<ul >' +
        '<?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>'+
            '<li style="display:inline-block;width:23%;font-size:13px;margin-left: 1%;margin-top:2%;color: #000000">' +
            '<input type="radio" name="cid" value="<?php echo ($data["id"]); ?>" style="margin-left: 1%;"/>'+
            '<?php echo ($data["cname"]); ?>' +
                '</li>'+
        '<?php endforeach; endif; else: echo "" ;endif; ?>'+
        '</ul>'+
    '</div>'+
    '<div style="width: 100%;margin-top: 3%">按品牌搜索：' +
        '<ul>' +
        '<?php if(is_array($brand)): $i = 0; $__LIST__ = array_slice($brand,0,12,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>'+
        '<li style="display:inline-block;width:20%;margin-left: 3%;margin-top:2%;vertical-align: middle">' +
            '<input type="radio" name="bid" value="<?php echo ($data["id"]); ?>"  style="width:15%;"/>'+
            '<img style="width:85%;height:auto;vertical-align: middle;" ' +
            'src="/Upload/logo<?php echo ($data["blogopath"]); echo ($data["blogoname"]); ?>" alt=""/>' +
        '</li>'+
        '<?php endforeach; endif; else: echo "" ;endif; ?>'+
        '</ul>'+
    '</div>'+
    '<div style="width: 100%;margin-top: 3%">按价格区间搜索：' +
        '<ul style="margin-top: 3%">' +
            '<li style="display:inline-block;color: #000000;font-size: 13px">' +
                '<input type="radio" name="price3" value="50-100" />'+
                '50-100</li>'+
            '<li style="display:inline-block;color: #000000;margin-left: 5%;font-size: 13px">' +
                '<input type="radio" name="price3"  value="100-300" />'+
                '100-300</li>'+
            '<li style="display:inline-block;color: #000000;margin-left: 5%;font-size: 13px">' +
                '<input type="radio" name="price3"  value="300-500" />'+
                '300-500</li>'+
            '<li style="display:inline-block;color: #000000;margin-left: 5%;font-size: 13px">' +
                '<input type="radio" name="price3"  value="500-1000" />'+
                '500-1000</li>'+
        '</ul>'+
    '<input type="reset"   style="margin-left: 26%;margin-top: 3%" value="重置"/>'+
    '<input type="submit" id="submit"  style="margin-left: 3%;margin-top: 3%" value="提交"/>'+
    '</div>'+
    '</form>'+
    '</div>';
    layer.open({
        type:1
        ,content:$html
        ,anim: 'up'
        , style:'position:fixed; left:0; top:8%; width:100%; height:100%; border: none; -webkit-animation-duration: .5s; ' +
        'animation-duration: .5s;'
    });
});
$("input[type='radio']").live('click',function(){
    $(this).addClass('checked').siblings().removeClass('checked');
});
$("#submit").live('click',function(){
    if($("input:checked").val()) {
        $("#form1").submit();
    }else{
        layer.open({
            type:1
            ,content:'请选择'
            ,skin:'msg'
            ,time:3
        });
        return false;
    }
});

function index(id){
    var id=id?id:1;
    $.get("<?php echo U('temai');?>",{"p":id},function(res){
        $('#insert').html(res);
    })
}
  </script>
 </body>
</html>