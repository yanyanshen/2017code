<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html >
<head>
    <title>beauty</title>
    <meta charset="utf-8" />
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="expires" content="Thu, 01 Jan 1970 00:00:01 GMT" />
    <meta name="spm-id" content="a1z0b" />
    <style>
        #page {width: 950px;min-height: 400px;        }

        .xubitu1{
            width: 20px;height: 18px;background-image: url(/Public/Home/images/commentimages/comment.png);
            background-position: 0 -100px;background-repeat: no-repeat;display: inline-block;
        }
        .xubitu2{
            width: 20px;height: 18px;background-image: url(/Public/Home/images/commentimages/comment.png);
            background-position: 0 -50px;background-repeat: no-repeat;display: inline-block;
        }
        .xubitu3{
            width: 20px;height: 18px;background-image: url(/Public/Home/images/commentimages/comment.png);
            background-position: 0 0;background-repeat: no-repeat;display: inline-block;
        }
    </style>
    <link rel="stylesheet" href="/Public/Home/css/commentcss/global-min.css">
    <link rel="stylesheet" href="/Public/Home/css/commentcss/common-min.css"/>
    <link rel="stylesheet" type="text/css" href="/Public/Home/js/webuploader/webuploader.css" />
    <link rel="stylesheet" href="/Public/Home/css/commentcss/index-min.css"/>
 <script type="text/javascript" src="/Public/Home/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.form.js"></script>
<script type="text/javascript" src="/Public/Home/js/webuploader/webuploader.js"></script>
<script type="text/javascript" src="/Public/Home/js/upload.js"></script>
</head>
<body data-spm="8135601">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/fonts/iconfont.css" rel="stylesheet" type="text/css" />
<!--<script src="/Public/Home/js/jquery-1.9.1.min.js" type="text/javascript"></script>-->
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

<!-- S GLOBAL HTML -->
<div id="J_SiteNav" class="site-nav">
    <div id="J_SiteNavBd" class="site-nav-bd">
        <ul id="J_SiteNavBdL" class="site-nav-bd-l"></ul>
        <ul id="J_SiteNavBdR" class="site-nav-bd-r"></ul>
    </div>
</div>
<!-- -->
<!-- 全网顶通 -->
<!-- E GLOBAL HTML   -->
<div id="page">
    <div id="content">
        <form class="tb-rate-pt-l" id="rateListForm" name="addfeedback" target="_top" novalidate  method="post" action="<?php echo U('Home/Member/commentgoods');?>">
            <div class="tb-rate-con-tabbed-box">
                <div class="tabbed-box-hd">
                    <h3 class="title">评价宝贝</h3>
                    <ul class="help-nav">
                        <!--<li>
                            卖家：
                            <a href="<?php echo U('Home/Index/index');?>" target="_blank">宏颜知己</a>
                            <span class="J_WangWang" data-nick="宏颜知己"></span>
                        </li>-->
                        <li class="tb-rate-hover-drop">
                            <a href="javascript:;">评价须知 <i class="tb-rate-icf">&#xe606;</i></a>
                            <div class="dropping">

                                <div class="tb-rate-eula">
                                    <h3>评价须知（2009-2-15开始实行）：</h3>
                                    <p>请您根据本次交易，给予真实、客观、仔细地评价。您的评价将是其他会员的参考，也将影响卖家的信用。</p>
                                    <p><strong>累积信用计分规则：</strong>中评不计分，但会影响卖家的好评率，请慎重给予。每个自然月中，相同买家和卖家之间的信用评价计分不超过6分。评价后30天内，您有一次机会删除给对方的中评或差评，或者修改成好评。</p>
                                    <p><strong>动态店铺评分计分规则：</strong>店铺评分是匿名的。每个自然月中，相同买家和卖家之间的店铺评分计分次数不超过3次。店铺评分成功后无法修改。</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="tabbed-box-bd">
                    <?php if(is_array($goodsInfo)): $i = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><input type="hidden" name="<?php echo ($v["id"]); echo ($v["ml"]); ?>[oid]" value="<?php echo ($oid); ?>"/>
                        <input type="hidden" name="<?php echo ($v["id"]); echo ($v["ml"]); ?>[gid]" value="<?php echo ($v["id"]); ?>"/>
                        <input type="hidden" name="<?php echo ($v["id"]); echo ($v["ml"]); ?>[ml]" value="<?php echo ($v["ml"]); ?>"/>
                      <!--  <input type="hidden" name="gid[]" value="<?php echo ($v["id"]); ?>"/>-->
                    <div class="itemlist">
                        <ul class="rate-list">
                            <li data-id="2472159552941165" class="rate-box" data-prompt="亲，写点评价吧，你的评价对其他买家有很大帮助的。">
                                <div>
                                </div>
                                <div class="item-rate-info" data-spm="1000328">
                                    <div class="item-detail">
                                        <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$v['id']));?>" target="_blank" class="item-d-img">
                                            <img src="/Uploads/<?php echo ($v["imageurl"]); ?>100_<?php echo ($v["imagename"]); ?>" />
                                        </a>
                                        <?php echo ($v["ml"]); ?>ml
                                        <div class="item-title">
                                            <a href="//trade.taobao.com/trade/detail/trade_snap.htm?trade_id=2472159552941165" target="_blank" title="巴黎香榭水果茶果粒茶果味茶罐装花果茶450g洛神花茶法国进口配方"><?php echo ($v["goodsname"]); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-rate-main">
                                    <div class="item-rate-act">
                                        <div class="rate-control">
                                            <ul id="lis">
                                                <li class="good">
                                                    <label for="rate-good-2472159552941165">
                                                        <input type="radio" class="good-rate" id="rate-good-2472159552941165"  name="<?php echo ($v["id"]); echo ($v["ml"]); ?>[pingjia][]" value="1" checked />
                                                        <i class="tb-rate-ico ico-good" title="好评"><span class="xubitu1"></span></i>
                                                    </label>
                                                </li>
                                                <li class="normal">
                                                    <label for="rate-normal-2472159552941165">
                                                        <input type="radio" class="noraml-rate" id="rate-normal-2472159552941165"   name="<?php echo ($v["id"]); echo ($v["ml"]); ?>[pingjia][]" value="2" />
                                                        <i class="tb-rate-ico ico-neutral" title="中评"><span class="xubitu2"></span></i>
                                                    </label>
                                                </li>
                                                <li class="bad">
                                                    <label for="rate-bad-2472159552941165">
                                                        <input type="radio" class="bad-rate" id="rate-bad-2472159552941165"   name="<?php echo ($v["id"]); echo ($v["ml"]); ?>[pingjia][]" value="3" />
                                                        <i class="tb-rate-ico ico-bad" title="差评"><span class="xubitu3"></span></i>
                                                    </label>
                                                </li>
                                            </ul>
                                            <p id="inner" style="color: #999;"></p>
                                        </div>
                                    </div>
                                    <div class="msg">
                                        <ul class="stop">
                                            <li>中评或差评时，需要填写评论内容；</li>
                                        </ul>
                                    </div>
                                    <div class="rate-msg-box">

                                        <div class="bd">
                                            <div class="textinput ph-hide">
                                                <span class="ph-label"></span>
                                                <textarea name="<?php echo ($v["id"]); echo ($v["ml"]); ?>[content]" maxlength="500" aria-labelby="label-ti-2472159552941165" placeholder="请填写对商品的评价" class="rate-msg"></textarea>
                                                <div class="text-counter"><strong class="r-t-counter">500</strong>字</div>
                                            </div>
                                        </div>
                                        <div class="ft">
                                            <div class="J_photo_uploader photo-uploader">
                                                    <div class="usercity" style="border:3px dashed #e6e6e6;width:80px;height:80px;position: relative">
                                                        <p style="width:80px;height:80px;" id="preview<?php echo ($v["id"]); echo ($v["ml"]); ?>" ><img id="imghead<?php echo ($v["id"]); echo ($v["ml"]); ?>"  border=0 src='' style="width:80px;height:80px;"></p><span></span>
                                                        <input type="file" id="image<?php echo ($v["id"]); echo ($v["ml"]); ?>" name="image<?php echo ($v["id"]); echo ($v["ml"]); ?>" onchange='previewImage(this,"preview<?php echo ($v["id"]); echo ($v["ml"]); ?>","imghead<?php echo ($v["id"]); echo ($v["ml"]); ?>")' style="display:none;width: 80px;height: 80px;" >
                                                        <label for="image<?php echo ($v["id"]); echo ($v["ml"]); ?>" class="uploadbut"  style="color:#fff;text-align:center;border-radius:4px;width:50px;height:10px;line-height:10px;font-size:10px;padding:5px;background:#00b7ee;cursor:pointer;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);">晒图</label>
                                                    </div>
                                            </div>
                                            <div class="share-box">
                                                <label for="privacy-radio-public-2472159552941165">
                                                    <input type="radio" name="<?php echo ($v["id"]); echo ($v["ml"]); ?>['anony2472159552941165'][]" value="0" id="privacy-radio-public-2472159552941165" class="privacy-control" /> 公开
                                                </label>
                                                <label for="privacy-radio-anony-2472159552941165">
                                                    <input type="radio" name="<?php echo ($v["id"]); echo ($v["ml"]); ?>['anony2472159552941165'][]" value="1" id="privacy-radio-anony-2472159552941165" class="privacy-control" checked /> 匿名
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="share-selector invisible">
                                        <span class="sns-site-holder"></span>
                                        <a class="sns-setting" href="//t.taobao.com/cooperate/connect/connect_manager.htm">设置</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="submitbox">
                <a class="btn" style="width: 120px;background-color: red;color:white;text-decoration:none;cursor:pointer;height: 25px;border-radius: 5px;display: inline-block;line-height: 25px;text-align: center;">发表评论</a>
            </div>
        </form>
    </div>
</div>


</body>
<script>
var good=document.getElementById("rate-good-2472159552941165"),nor=document.getElementById("rate-normal-2472159552941165"),
        bad=document.getElementById("rate-bad-2472159552941165"),ul=document.getElementById("lis"),lis=ul.getElementsByTagName("li");
console.log(lis.length);
for(var i=0;i<lis.length;i++){
   /* lis[i].*/
   /* lis[i].addEventListene("click",function(){
    }});*/
    lis[i].onclick=function(){
        var inner=document.getElementById("inner");
        if(good.checked) {
            good.parentNode.parentNode.setAttribute("class"," good rate-checked");
            nor.parentNode.parentNode.setAttribute("class"," good ");
            bad.parentNode.parentNode.setAttribute("class"," good ");
            inner.innerHTML="亲，好评无法修改和删除，请验货后再对商品和购物感受做出评论。";
/* alert("123456789");*/
        }else if(nor.checked) {
           nor.parentNode.parentNode.setAttribute("class"," good rate-checked");
            good.parentNode.parentNode.setAttribute("class"," good ");
            bad.parentNode.parentNode.setAttribute("class"," good ");
            inner.innerHTML="亲，很抱歉没能给您带来良好的购物体验，如有不满，您可联系卖家协商或发起售后维权。";
            /* alert("123456789");*/
        }else if(bad.checked) {
            bad.parentNode.parentNode.setAttribute("class"," good rate-checked");
            nor.parentNode.parentNode.setAttribute("class"," good ");
            good.parentNode.parentNode.setAttribute("class"," good ");
            inner.innerHTML="亲，很抱歉没能给您带来良好的购物体验，如有不满，您可联系卖家协商或发起售后维权。";
            /* alert("123456789");*/
        }
    }

}

</script>

<script type="text/javascript">
    $(function(){
        $('.btn').click(function(){
            if($('.tabbed-box-bd textarea').val().length<10){
                layer.msg('评价内容不能低于10个字',{time:800,icon:1});
            }else{
                $('#rateListForm').ajaxSubmit(function(res){
                    if(res.status==1){
                        layer.msg('评价成功',{time:500},function(){
                            location='<?php echo U("Home/Member/showcomment");?>';
                        });
                    }
                })
            }
        })
    })

</script>
</html>
<script>
    //图片上传预览    IE是用了滤镜。
    function previewImage(file,pre,imag)
    {
        var MAXWIDTH  = 80;
        var MAXHEIGHT = 80;
        var div = document.getElementById(pre);
        if( !file.value.match( /.jpg|.gif|.png|.bmp/i ) ){
            //$(this).prev('span').text('图片格式无效！');
            $('#'+pre).next('span').css({"color":"red","font-weight":"bold"}).text('图片类型无效！');
            return false;
        }else{
            $('#'+pre).next('span').css({"color":"green","font-weight":"bold"}).text('');
        }
        if (file.files && file.files[0])
        {
            div.innerHTML ='<img id='+imag+'>';
            var img = document.getElementById(imag);
            img.onload = function(){
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                img.width  =  rect.width;
                img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                img.style.marginTop = rect.top+'px';
            }
            var reader = new FileReader();
            reader.onload = function(evt){img.src = evt.target.result;}
            reader.readAsDataURL(file.files[0]);
        }
        else //兼容IE
        {
            var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
            file.select();
            file.blur();
            var src = document.selection.createRange().text;
            div.innerHTML ='<img id='+imag+'>';
            var img = document.getElementById(imag);
            img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
            var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
            status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
        }

        $(file).next('label').css({margin:0,top:0,position:'absolute',background:'rgba(0,0,0,0.4)',color:'#fff',fontSize:'14px'}).html('重新选择主图');
    }
    function clacImgZoomParam( maxWidth, maxHeight, width, height ){
        var param = {top:0, left:0, width:width, height:height};
        if( width>maxWidth || height>maxHeight )
        {
            rateWidth = width / maxWidth;
            rateHeight = height / maxHeight;

            if( rateWidth > rateHeight )
            {
                param.width =  maxWidth;
                param.height = Math.round(height / rateWidth);
            }else
            {
                param.width = Math.round(width / rateHeight);
                param.height = maxHeight;
            }
        }

        param.left = Math.round((maxWidth - param.width) / 2);
        param.top = Math.round((maxHeight - param.height) / 2);
        return param;
    }
</script>