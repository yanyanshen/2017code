<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="/Public/Home/css/yhcss/style.css" />
    <!--[if IE 6]>
    <script src="/Public/Home/js/yhjs/iepng.js" type="text/javascript"></script>
    <script type="text/javascript">
        EvPNG.fix('div, ul, img, li, input, a');
    </script>
    <![endif]-->
    <script type="text/javascript" src="/Public/Home/js/yhjs/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/yhjs/menu.js"></script>
    <script type="text/javascript" src="/Public/Home/js/geo.js"></script>
    <script type="text/javascript" src="/Public/Home/js/yhjs/select.js"></script>
    <script type="text/javascript" src="/Public/Home/js/layer/layer.js"></script>
    <style type="text/css">
        #address li{margin-left: 20px;margin-top: 5px}
    </style>
    <div id="div_map_hw" style=" Z-INDEX: 100;visibility:hidden;POSITION: absolute;height:453px;width: 523px;"> <img src="/Public/Home/map/images/china.jpg" alt="中国" width="527" height="457" border="0" usemap="#Map" />
        <map name="Map">
            <area shape="rect" coords="321,423,355,441" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/hainan.htm&#39;);return false;">
            <area shape="rect" coords="368,401,402,418" href="http://www.chinawutong.com/#" onclick="rt(&#39;澳门&#39;);return false;">
            <area shape="rect" coords="398,387,430,403" href="http://www.chinawutong.com/#" onclick="rt(&#39;香港&#39;);return false;">
            <area shape="rect" coords="440,361,476,376" href="http://www.chinawutong.com/#" onclick="rt(&#39;台湾&#39;);return false;">
            <area shape="rect" coords="405,337,441,353" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/fujian.htm&#39;);return false;">
            <area shape="rect" coords="235,364,271,380" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/yunnan.htm&#39;);return false;">
            <area shape="rect" coords="285,335,321,354" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/guizhou.htm&#39;);return false;">
            <area shape="rect" coords="359,368,396,387" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/guangdong.htm&#39;);return false;">
            <area shape="rect" coords="309,370,345,387" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/guangxi.htm&#39;);return false;">
            <area shape="rect" coords="87,245,126,272" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/xizang.htm&#39;);return false;">
            <area shape="rect" coords="334,324,370,342" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/hunan.htm&#39;);return false;">
            <area shape="rect" coords="245,289,282,305" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/sichuan.htm&#39;);return false;">
            <area shape="rect" coords="290,299,327,316" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/chongqing.htm&#39;);return false;">
            <area shape="rect" coords="339,283,374,301" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/hubei.htm&#39;);return false;">
            <area shape="rect" coords="388,276,424,294" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/anhui.htm&#39;);return false;">
            <area shape="rect" coords="381,316,413,333" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/jiangxi.htm&#39;);return false;">
            <area shape="rect" coords="419,301,454,318" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/zhejiang.htm&#39;);return false;">
            <area shape="rect" coords="447,276,483,293" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/shanghai.htm&#39;);return false;">
            <area shape="rect" coords="277,173,321,190" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/neimenggu.htm&#39;);return false;">
            <area shape="rect" coords="343,252,380,269" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/henan.htm&#39;);return false;">
            <area shape="rect" coords="415,253,450,270" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/jiangsu.htm&#39;);return false;">
            <area shape="rect" coords="358,205,394,220" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/hebei.htm&#39;);return false;">
            <area shape="rect" coords="330,221,366,237" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/shanxi.htm&#39;);return false;">
            <area shape="rect" coords="388,220,427,240" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/shandong.htm&#39;);return false;">
            <area shape="rect" coords="370,179,402,196" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/beijing.htm&#39;);return false;">
            <area shape="rect" coords="178,220,228,244" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/qinghai.htm&#39;);return false;">
            <area shape="rect" coords="420,159,454,176" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/liaoning.htm&#39;);return false;">
            <area shape="rect" coords="279,214,316,231" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/ningxia.htm&#39;);return false;">
            <area shape="rect" coords="403,196,438,212" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/tianjin.htm&#39;);return false;">
            <area shape="rect" coords="446,123,480,142" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/jilin.htm&#39;);return false;">
            <area shape="rect" coords="444,90,488,108" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/heilongjiang.htm&#39;);return false;">
            <area shape="rect" coords="191,177,234,200" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/gansu.htm&#39;);return false;">
            <area shape="rect" coords="85,150,126,181" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/xinjiang.htm&#39;);return false;">
            <area shape="rect" coords="301,254,336,271" href="http://www.chinawutong.com/#" onclick="openW(&#39;/WebParts/SelectArea/sx.htm&#39;);return false;">
            <area shape="rect" coords="497,0,526,23" href="http://www.chinawutong.com/#" onclick="document.getElementById(&#39;div_map_hw&#39;).style.visibility=&#39;hidden&#39;;document.getElementById(&#39;frm_map_hw&#39;).style.visibility=&#39;hidden&#39;;return false;">
        </map>
    </div>
    <link href="/Public/Home/map/css/WTMap.css" rel="stylesheet" />
    <link href="/Public/Home/map/css/mapstyle.css" type="text/css" />
    <script type="text/javascript" src="/Public/Home/map/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/Public/Home/map/js/WTMap.min.js"></script>
    <script type="text/javascript" src="/Public/Home/map/js/mapjs.js"></script>
    <title>收货地址</title>
</head>
<body>
<!--Begin Header Begin-->
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
    <div class="logo"><a href="<?php echo U('Index/index');?>"><img src="/Public/Home/images/logo.png" /></a></div>
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
                <!--<li><a  id="cj" name="<?php echo (session('mname')); ?>" href="javascript:;" >抽奖有礼</a><em class="hot_icon"></em></li>-->
                <li><a id="sign" name="<?php echo (session('mname')); ?>" href="javascript:;" target="_blank">签到领金币</a></li>
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
<!--End Header End-->
<div class="i_bg bg_color" >
    <!--Begin 用户中心 Begin -->
    <div class="m_content" style="margin: 0 auto">
        <div class="m_left">
            <div class="left_n">管理中心</div>
            <div class="left_m">
                <div class="left_m_t t_bg1">订单中心</div>
                <ul>
                    <li><a href="<?php echo U('Home/Member/Orderform');?>">我的订单</a></li>
                    <li><a href="<?php echo U('Home/Member/Orderform1');?>">金币兑换订单</a></li>
                    <li><a href="<?php echo U('Home/Member/address');?>" class="now">收货地址</a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg2">会员中心</div>
                <ul>

                    <li><a href="<?php echo U('Home/Member/MemberCentre');?>">用户信息</a></li>
                    <li><a href="<?php echo U('Home/Member/showCollect');?>">我的收藏</a></li>
                    <li><a href="<?php echo U('Home/Member/showcomment');?>">我的评论</a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg3">账户中心</div>
                <ul>
                    <li><a href="<?php echo U('Member/safe');?>">账户安全</a></li>
                    <li><a href="<?php echo U('Member/packet');?>">我的红包</a></li>
                    <li><a href="<?php echo U('Member/money');?>">资金管理</a></li>
                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg4">分销中心</div>
                <ul>
                    <li><a href="<?php echo U('Member/myMember');?>">我的会员</a></li>

                </ul>
            </div>
            <div class="left_m">
                <div class="left_m_t t_bg4">金币中心</div>
                <ul>
                    <li><a href="<?php echo U('Sign/sign');?>">我的金币</a></li>
                </ul>
            </div>
        </div>

        <div class="m_right">
            <p></p>
            <div class="mem_tit">收货地址</div>
            <?php if(is_array($addressList)): $k = 0; $__LIST__ = $addressList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><div class="addressdelete" id="address" style="width: 48%;height:220px; border: 2px solid #f6f6f6;margin-left: 8px;float: left;">
                    <ul>
                        <li><span>收货人姓名：</span><span><?php echo ($val["username"]); ?></span> <a href="javascript:edit(<?php echo ($val['id']); ?>);" class="modify_btn"><span style="float: right;margin-right: 20px;color: #ef5b00">编辑地址</span></a></li>
                        <li><span>&nbsp;&nbsp;&nbsp;配送区域：</span><span><?php echo ($val["area"]); ?></span></li>
                        <li><span>&nbsp;&nbsp;&nbsp;详细地址：</span><span><?php echo ($val["address"]); ?></span></li>
                        <li><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;手机：</span><span><?php echo ($val["mobile"]); ?></span></li>
                        <li><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮编：</span><span><?php echo ($val["ecode"]); ?></span></li>
                        <li><span>&nbsp;&nbsp;&nbsp;电子邮箱：</span><span><?php echo ($val["email"]); ?></span></li>
                    </ul>
                    <div style="float: right">
                    <p align="right" >
                        <?php if($val['isdefault'] == 1): ?><div class="default">
                               <a style="color:blue;">默认地址</a>&nbsp; &nbsp; &nbsp; &nbsp;
                                <a href="javascript:;" class="layer" id="<?php echo ($val["id"]); ?>" style="color:#ff4e00;">删除</a>&nbsp; &nbsp; &nbsp; &nbsp;
                            </div>
                        <?php else: ?>
                            <a href="<?php echo U('Home/Member/set_default',array('id'=>$val['id']));?>"  style="color:#ff4e00;margin-bottom: 10px">设为默认</a>&nbsp; &nbsp; &nbsp; &nbsp;
                            <a href="javascript:;" class="layer" id="<?php echo ($val["id"]); ?> " style="color:#ff4e00;">删除</a>&nbsp; &nbsp; &nbsp; &nbsp;<?php endif; ?>
                    </p>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

            <script type="text/javascript">
                function edit(aid){
                    layer.open({
                        type:2,
                        shade:false,
                        title:"编辑地址",//false为不显示标题
                        area:["700px",'600px'],
                        content:"<?php echo U('Home/MyCart/showAddresslist');?>?aid="+aid
                    });
                }
            </script>


            <script type="text/javascript">
                $(function() {
                    $('.layer').click(function () {
                        var id=$(this).attr('id');
                       // var a=$(this);
                        $.post('<?php echo U("Home/Member/deleteAddress");?>',{id:id},function(res){
                            if(res.status==1){
                                layer.msg('删除成功',{time:1000},function(){
                                  location="<?php echo U('Home/Member/address');?>";
                                   //a.parents('div').hasClass('addressdelete').hide();

                                });
                            }
                        })
                        return false;
                    })
                });
            </script>
            <div class="mem_tit">
                <a href="#"><img src="/Public/Home/images/yhimages/add_ad.gif" /></a>
            </div>
            <form action="" method="post" id="form">
                <table border="0" class="add_tab" style="width:930px;border: 1px solid black"  cellspacing="0" cellpadding="0">
                    <tr>
                       <!-- <td width="135" align="right">配送地区</td>
                        <td colspan="3" style="font-family:'宋体';"></td>-->
                        <td class="chose" width="135" align="right"><label for="port">收货地址</label></td>
                        <td colspan="3" style="font-family:'宋体';"> <input class="qi" id="tc_from" name="area" type="text" placeholder="您的货物要发往哪里？" wtmap="{c:&#39;tc_from&#39;,cb:true}" readonly="readonly" />&nbsp;<span style="color: red;">（必填）</span></td>

                    </tr>
                    <tr>
                        <td align="right">收货人姓名</td>
                        <td style="font-family:'宋体';"><input type="text" value="" name="username"  class="add_ipt" />&nbsp;<span style="color: red;">（必填）</span></td>
                        <td align="right">电子邮箱</td>
                        <td style="font-family:'宋体';"><input type="text" value="" name="email" class="add_ipt" /></td>
                    </tr>
                    <tr>
                        <td align="right">详细地址</td>
                        <td style="font-family:'宋体';"><input type="text" value="" name="address" class="add_ipt" />&nbsp;<span style="color: red;">（必填）</span></td>
                        <td align="right">邮政编码</td>
                        <td style="font-family:'宋体';"><input type="text" value="" name="ecode" class="add_ipt" /></td>
                    </tr>
                    <tr>
                        <td align="right">手机</td>
                        <td style="font-family:'宋体';"><input type="text" value="" name="mobile" class="add_ipt" />&nbsp;<span style="color: red;">（必填）</span></td>
                        <td align="right">电话</td>
                        <td style="font-family:'宋体';"><input type="text" value="" name="telephone" class="add_ipt" /></td>
                    </tr>
                </table>
                <p align="right">
                    &nbsp; &nbsp; <button type="button" class="add_b">确认添加</button>
                </p>
            </form>
        </div>
    </div>
    <!--End 用户中心 End-->
    <!--Begin Footer Begin -->
    <div class="phone_style">
    <div class="index_style">
        <span class="phone_number"><em class="iconfont icon-dianhua"></em>400-4565-345</span><span class="phone_title">客服热线 7X24小时 贴心服务</span>
    </div>
</div>
<div class="footerbox clearfix">
    <div class="clearfix">
        <div class="">
            <dl>
                <dt>新手上路</dt>
                <dd><a href="#">售后流程</a></dd>
                <dd><a href="#">购物流程</a></dd>
                <dd><a href="#">订购方式</a> </dd>
                <dd><a href="#">隐私声明 </a></dd>
                <dd><a href="#">推荐分享说明 </a></dd>
            </dl>
            <dl>
                <dt>配送与支付</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>
            <dl>
                <dt>售后保障</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>
            <dl>
                <dt>支付方式</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>
            <dl>
                <dt>帮助中心</dt>
                <dd><a href="#">保险需求测试</a></dd>
                <dd><a href="#">专题及活动</a></dd>
                <dd><a href="#">挑选保险产品</a> </dd>
                <dd><a href="#">常见问题 </a></dd>
            </dl>
        </div>
    </div>
    <div class="text_link">
        <p>
            <a href="#">关于我们</a>｜ <a href="#">公开信息披露</a>｜ <a href="#">加入我们</a>｜ <a href="#">联系我们</a>｜ <a href="#">版权声明</a>｜ <a href="#">隐私声明</a>｜ <a href="#">网站地图</a></p>
        <p>蜀ICP备11017033号 Copyright ©2011 成都福际生物技术有限公司 All Rights Reserved. Technical support:CDDGG Group</p>
    </div>
</div>
    <!--End Footer End -->
</div>
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


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>

<script type="text/javascript">
    $(function(){
        $('.add_b').click(function(){
            $.post('<?php echo U("Home/Member/addAddress");?>',$('#form').serialize(),function(res){
                if(res.status==1){
                    var str="";
                    str+='<tr> <td align="right" width="80">收货人姓名：</td> <td>'+res.info["username"]+'</td> </tr>';
                    str+='<tr> <td align="right">配送区域：</td> <td>'+res.info["area"]+'</td> </tr>';
                    str+='<tr> <td align="right">详细地址：</td> <td>'+res.info["address"]+'</td> </tr>';
                    str+='<tr> <td align="right">手机：</td> <td>'+res.info["mobile"]+'</td> </tr>';
                    str+='<tr> <td align="right">邮编：</td> <td>'+res.info["ecode"]+'</td> </tr>';
                    str+='<tr> <td align="right">电子邮箱：</td> <td>'+res.info["email"]+'</td> </tr>';
                    $('#add_default').html(str);
                    location="<?php echo U('Member/address');?>";

                }else{
                    if(res.info=="必填项不能为空"){
                            layer.msg('必填项不能为空',{icon: 5, time: 2000 })
                    }else{
                        layer.msg('已达到添加地址上限',{icon: 5, time: 2000 })
                    }
                }
            },'json')
        });

    })
</script>