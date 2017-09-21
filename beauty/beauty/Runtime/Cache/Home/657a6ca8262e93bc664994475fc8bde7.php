<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <title>beauty</title>
    <meta charset="utf-8"/>
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <style>
        .a {color: #808080}
        .ul{position: fixed;top: 400px;left: 50px;}
        .ul a{width:30px;height:30px;font-size:15px;line-height:30px;margin:10px 0;border-radius: 30px;background-color: #dfc155;padding:5px ;display: block;text-align: center}
        .ul a:hover {cursor: pointer}
        .li{background-color: #ff0000;color:#ffffff }

        .Navigation_name { padding:0; margin:0; list-style-type:none;}
        .Navigation_name li { background:#fff;   color:#fff; }
        .Navigation_name li a { display:block;text-align:center;line-height:32px; color:#fff; font-size:13px; text-decoration:none;}
        .cur{ background-color: #d2d2d2;
            padding: 0 5px; font-weight:bold;}
    </style>

<body>
<script>
    /*划到几楼就让几高亮显示*/
    $(function(){
        $(".ul .li1").addClass('li');
        $(window).scroll(function(){
            if($(window).scrollTop()>200) {
                $(".ul").fadeIn(1000);
            }else{
                $(".ul").fadeOut(1000);
            }
            if($(window).scrollTop()>200){
                $(".ul .li1").addClass('li');
                $(".ul .li1").siblings().removeClass('li');
                $(".ul .li1").text('活动');
                $(".ul .li2").text(2);
            }
            if($(window).scrollTop()>=800){
                $(".ul .li2").addClass('li');
                $(".ul .li2").siblings().removeClass('li');
                $(".ul .li1").text(1);
                $(".ul .li2").text('品牌');
                $(".ul .li3").text(3);
                /*$(".ul a").hasClass("li2").text('品牌')*/
            }
            if($(window).scrollTop()>=1300){
                $(".ul .li3").addClass('li');
                $(".ul .li3").siblings().removeClass('li');
                $(".ul .li2").text(2);
                $(".ul .li3").text('专卖');
                $(".ul .li4").text(4);
            }
            if($(window).scrollTop()>=2900){
                $(".ul .li4").addClass('li');
                $(".ul .li4").siblings().removeClass('li');
                $(".ul .li4").text('喜欢');
                $(".ul .li3").text(3);
            }
        });
    });
    /*划到几楼就让几高亮显示*/

    $(function(){
        $(".Menu_name").mouseenter(function(){
            var a=$(this).attr('cid');
            //alert(a)
            $.get('<?php echo U("Home/Index/goodsImg/");?>',{cid:a},function(res){
                if(res.status==1){
                    var str='';
                    for(var i=0;i<res.info.length ; i++){
                        str+='<a href="'+'<?php echo U("Home/Order/goodsdetail");?>?gid='+res.info[i]['id']+'" class="AD_3">' +
                        '<img style="width:150px;height: 120px;" src="/Uploads/'+res.info[i]['imageurl']+res.info[i]['imagename']+'" /></a>';

                    }
//                    for(var i in res.info){
//                        str+='<a href="'+'<?php echo U("Home/Order/goodsdetail");?>?gid='+res.info[i]['id']+'" class="AD_3">' +
//                        '<img style="width:150px;height: 120px;" src="/Uploads/'+res.info[i]['imageurl']+res.info[i]['imagename']+'" /></a>';
//                    }
                    //console.log(str);
                    $(" .Brands").html(str);
                }
            })
        });
        //alert(13)

        $('img.lazy').lazyload({effect:"fadeIn"});

    })

    $(function(){
        $('#sign').click(function(){
            var session1=$(this).attr('name');
            //alert(session);
            if(!session1){
                location="<?php echo U('Home/Login/Login');?>";
            }else{
                location.href="<?php echo U('Home/Sign/sign');?>";
            }
        });
    })

    //做懒加载，先引入懒加载插件

</script>
<div class="ul">
    <a class="li1" href="#one" target="_self">1</a>
    <a class="li2" href="#two" target="_self">2</a>
    <a class="li3" href="#three" target="_self">3</a>
    <a class="li4" href="#four" target="_self">4</a>
</div>

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

</head>
<script>
    $(function() {
        $('#OUT').click(function () {
            $.post("<?php echo U('Home/Login/LoginOut');?>",'', function (res) {
                if (res.status == 1) {
                    layer.open({
                        content: res.info,
                        icon: 1,
                        yes: function () {
                            location.href = "<?php echo U('Home/index/index');?>";
                        }
                    })
                } else {
                    layer.open({
                        content: res.info,
                        icon: 2,
                        title: '错误提示'
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

    <div class="logo"><a href="<?php echo U('Index/index');?>">

        <img style="width: 210px;height: 122px" src="/Public/Mobile/images/Image-1.png" /></a></div>
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
    <!--菜单导航样式-->
    <div id="Menu" class="clearfix">
        <div class="index_style clearfix">
            <div id="allSortOuterbox">
                <div class="t_menu_img"></div>
                <div class="Category"><a href="#"><em></em>所有产品分类</a></div>
                <div class="hd_allsort_out_box_new">
                    <!--左侧栏目开始-->
                    <?php if(is_array($categoryInfo)): $i = 0; $__LIST__ = $categoryInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><ul class="Menu_list">
                            <li class="name">
                                <div class="Menu_name" cid="<?php echo ($date['id']); ?>"><a href="<?php echo U('Home/Search/index',array('cid'=>$date['id']));?>" ><?php echo ($date["cname"]); ?></a> <span>&lt;</span></div>
                                <div class="link_name">
                                    <p>
                                        <?php if(is_array($date["child"])): $i = 0; $__LIST__ = $date["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date1): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Search/index',array('cid'=>$date1['id']));?>" target="_blank"><?php echo ($date1["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </p>
                                </div>
                                <div class="menv_Detail">
                                    <div class="cat_pannel clearfix">
                                        <div class="hd_sort_list">
                                            <dl class="clearfix" data-tpc="1">
                                                <?php if(is_array($date["child"])): $i = 0; $__LIST__ = $date["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date2): $mod = ($i % 2 );++$i;?><dt>
                                                        <a href="<?php echo U('Home/Search/index',array('cid'=>$date2['id']));?>" target="_blank">
                                                            <?php echo ($date2["cname"]); ?>
                                                            <i>></i>
                                                        </a>
                                                    </dt>

                                                    <dd>
                                                        <?php if(is_array($date2["child"])): $i = 0; $__LIST__ = $date2["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date3): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Home/Search/index',array('cid'=>$date3['id']));?>" target="_blank"><?php echo ($date3["cname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </dd><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </dl>
                                        </div>
                                        <div class="Brands">
                                            <!--<a href="#" class="AD_3"><img style="width:150px;height: 90px;" class='lazy'  data-original="/Uploads/<?php echo ($val['imageurl']); echo ($val['imagename']); ?>" /></a>-->
                                        </div>
                                    </div>
                                    <!--品牌-->
                                </div>
                            </li>
                        </ul><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <script>$("#allSortOuterbox").slide({ titCell:".Menu_list li",mainCell:".menv_Detail"});</script>
            <!--菜单栏-->

            <div class="Navigation" id="Navigation">
                <ul class="Navigation_name">
                <li><a href="<?php echo U('Home/Index/index');?>" >首页</a></li>
                <li><a href="<?php echo U('Home/MustSee/index');?>" target="_blank">每日必看</a></li>
                <li><a href="<?php echo U('Home/BuyBrands/groupBuy');?>" target="_blank" >限时团购</a><em class="hot_icon"></em></li>
                <li><a href="<?php echo U('Home/MustSee/girl');?>" target="_blank">女士专区</a></li>
                <li><a href="<?php echo U('Home/MustSee/boy');?>" target="_blank">男士专区</a></li>
                    <li><a href="<?php echo U('Home/Huiyuan/index');?>" target="_blank">黄金会员专享</a></li>
                <!--<li><a  id="cj" name="<?php echo (session('mname')); ?>"  href="javascript:;">抽奖有礼</a><em class="hot_icon"></em></li>-->
              

                <?php if($_SESSION['beauty_']['mid']> 0): ?><li><a  href="<?php echo U('Home/HongBao/showhongbao');?>" target="_blank">双11领红包</a></li>
                    <?php else: ?>
                    <li><a  href="<?php echo U('Home/Login/Login');?>" target="_blank">双11领红包</a></li><?php endif; ?>


            </ul>
                </ul>
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
            <script>$("#Navigation").slide({titCell:".Navigation_nameidcj li"});</script>



            <a href="<?php echo U('Home/Sign/signCity');?>" class="link_bg" style="color: red;font-size: 20px;font-weight: bolder;font-style: italic;" target="_blank">
                <img style="vertical-align: middle;margin-bottom:5px;"  src="/Public/Home/images/jin.png" />金币商城
            </a>
        </div>
    </div>
    <!--幻灯片样式-->
    <div id="slideBox" class="slideBox">
        <div class="hd">
            <ul class="smallUl"></ul>
        </div>
        <div class="bd">
            <ul>
                <?php if(is_array($advertise1)): $i = 0; $__LIST__ = $advertise1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val1): $mod = ($i % 2 );++$i;?><li><a href="#" target="_blank"><div style="background:url('/Uploads/Advertises/<?php echo ($val1["picurl"]); echo ($val1["picname"]); ?>')
                    no-repeat; background-position:center ; width:100%; height:460px;">
                    </div></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <!-- 下面是前/后按钮代码，如果不需要删除即可 -->
        <a class="prev" href="javascript:void(0)"></a>
        <a class="next" href="javascript:void(0)"></a>

        <script type="text/javascript">
            jQuery(".slideBox").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true});
        </script>
    </div>
    <div class="index_style clearfix">
        <a name="one"></a>
        <!--限时特卖-->
        <div class="Limit_p">
            <div class="name" style="color: red;font-size: 20px;font-weight: bolder;margin-top: 20px">
              <?php if(is_array($activityInfo)): $i = 0; $__LIST__ = array_slice($activityInfo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i; echo ($date['aname']); endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="Limit_title">
                <?php if(is_array($activityInfo)): $i = 0; $__LIST__ = array_slice($activityInfo,0,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><a href="<?php echo U('BuyBrands/goodsdetail',array('gid'=>$date['id'],'man'=>$date['rules'][0][0],'jian'=>$date['rules'][0][1]));?>" target="_blank"><img width="230" height="400"  class='lazy'  data-original="/Uploads/<?php echo ($date["imageurl"]); ?>500_<?php echo ($date["imagename"]); ?>" src="/Public/Home/images/loading.gif"/></a>
                    <div class="title_name" style="margin-top: 100px ">
                        <h2 style="color: #000000; font-weight: bolder">满<?php echo ($date['rules'][0][0]); ?>减<?php echo ($date['rules'][0][1]); ?></h2>
                        <h2 style="color: orangered; ">LIMIT BUY</h2><h3>品牌优惠促销</h3>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="Limit_list">
                <ul class="p_t_list">
                    <?php if(is_array($activityInfo)): $i = 0; $__LIST__ = array_slice($activityInfo,1,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><input class="input" type="hidden" restTime="<?php echo ($date['restTime']); ?>"/>
                        <script>
                            var a=parseInt('<?php echo ($i-1); ?>');
                            function timer(a){
                                var ts = $(".input").eq(a).attr('restTime'); //设置目标时间，并计算剩余的毫秒数
                                var dd = parseInt(ts/60/60/24);  //计算剩余天数
                                var today=new Date();
                                var hh=today.getHours();
                                var mm=today.getMinutes();
                                var ss=today.getSeconds();
                                $('.icon-time').eq(a).text('还剩:'+dd+'天'+parseInt(24-hh)+'小时'+parseInt(60-mm)+'分'+parseInt(60-ss)+'秒');
                            }
                            setInterval('timer(parseInt("<?php echo ($i-1); ?>"))',1000); // 每隔1S执行一次
                        </script>
                        <li>
                            <a href="<?php echo U('BuyBrands/goodsdetail',array('gid'=>$date['id'],'man'=>$date['rules'][0][0],'jian'=>$date['rules'][0][1]));?>" target="_blank">
                            <span><?php echo (mb_substr($date["goodsname"],0,15,utf8)); ?>... </span>
                                <img   src="/Uploads/<?php echo ($date["imageurl"]); echo ($date["imagename"]); ?>"  width="180" height="170" />

                                <div class="time">
                                    <em class="iconfont icon-time" style="font-size: 16px">
                                    </em>
                                </div>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    <li class="Limit_name">
                        <?php if(is_array($activityInfo)): $i = 0; $__LIST__ = array_slice($activityInfo,7,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><input class="input" type="hidden" restTime="<?php echo ($date['restTime']); ?>"/>
                            <a href="<?php echo U('BuyBrands/goodsdetail',array('gid'=>$date['id'],'man'=>$date['rules'][0][0],'jian'=>$date['rules'][0][1]));?>" target="_blank">
                                <img  src="/Uploads/<?php echo ($date["imageurl"]); echo ($date["imagename"]); ?>"  width="243" height="399" />
                            </a><?php endforeach; endif; else: echo "" ;endif; ?>

                    </li>
                </ul>
            </div>
        </div>
        <!--限时特卖-->
        <!--品牌展示-->
        <div class="Brand_Show" id="Brand_Show">
            <a name="two"></a>
            <div class="parHd  Toggle">
                <ul>
                    <li><a class="a" href="" onclick="return false">国际大牌</a><em></em></li>
                    <li><a class="a" href="" onclick="return false">推荐品牌</a><em></em></li>
                    <li><a class="a" href="" onclick="return false">国货精品</a><em></em></li>
                </ul>
            </div>
            <div class="parBd list">
                <div class="parBdIn">
                    <ul>
                        <li class="brand_list">
                            <?php if(is_array($logoInfo)): $i = 0; $__LIST__ = $logoInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('BrandGoods/showBrand',array('bid'=>$val['id']));?>" class="brand_logo" target="_blank">
                                    <img style="width:180px;height: 90px" class='lazy'  src="/Upload/logo<?php echo ($val["blogopath"]); echo ($val["blogoname"]); ?>" />
                                    <span><?php echo ($val["bname"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                        <li class="brand_ad">
                            <div class="AD_slideBox" id="AD_slideBox">
                                <div class="hd"><ul></ul></div>
                                <div class="bd">
                                    <ul>
                                        <?php if(is_array($one)): $i = 0; $__LIST__ = array_slice($one,0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Order/goodsdetail',array('gid'=>$date['gid']));?>" target="_blank">
                                                <img width="260" height="290" src="/Uploads/<?php echo ($date["imageurl"]); ?>300_<?php echo ($date["imagename"]); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </div>
                            </div>
                            <script type="text/javascript">
                                jQuery(".AD_slideBox").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:5000});
                            </script>
                        </li>
                    </ul>
                    <ul>
                        <li class="brand_list">
                            <?php if(is_array($logoInfo1)): $i = 0; $__LIST__ = $logoInfo1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('BrandGoods/showBrand',array('bid'=>$val['id']));?>" class="brand_logo" target="_blank">
                                    <img style="width:180px;height: 90px"  src="/Upload/logo<?php echo ($val["blogopath"]); echo ($val["blogoname"]); ?>" /><span><?php echo ($val["bname"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                    </ul>
                    <ul>
                        <li class="brand_list">
                            <?php if(is_array($logoInfo2)): $i = 0; $__LIST__ = $logoInfo2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a href="<?php echo U('BrandGoods/showBrand',array('bid'=>$val['id']));?>" class="brand_logo" target="_blank">
                                    <img style="width:180px;height: 90px"  src="/Upload/logo<?php echo ($val["blogopath"]); echo ($val["blogoname"]); ?>"  width="160" /><span><?php echo ($val["bname"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
            <a class="prev" href="javascript:void(0)"><em class="iconfont icon-left"></em></a>
            <a class="next" href="javascript:void(0)"><em class="iconfont icon-right"></em></a>
        </div>
        <script type="text/javascript">jQuery("#Brand_Show").slide({titCell:".parHd li",mainCell:".parBdIn",trigger:"click"});</script>
        <!--产品版块-->
        <div class="p_Section clearfix">
            <a name="three"></a>
            <div class="Section_title">
                <div class="name">
                    <em>1F</em>
                    <?php if(is_array($one)): $i = 0; $__LIST__ = array_slice($one,6,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i; echo ($date['cname']['cname']); endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="p_link">
                    <?php if(is_array($one)): $i = 0; $__LIST__ = array_slice($one,7,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Search/index',array('cid'=>$date['cname']['id']));?>" target="_blank"><?php echo ($date['cname']['cname']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="Section_info clearfix">
                <div class="pro_ad_slide">
                    <div class="hd">
                        <ul></ul>
                    </div>
                    <div class="bd">
                        <ul>
                            <?php if(is_array($advertise2)): $i = 0; $__LIST__ = $advertise2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val2): $mod = ($i % 2 );++$i;?><li><a href="#">
                                    <img class='lazy'  data-original="/Uploads/Advertises/<?php echo ($val2["picurl"]); echo ($val2["picname"]); ?>" src="/Public/Home/images/loading.gif" width="598" height="449"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <!--<li><a href="#"><img class='lazy'  data-original="/Public/Home/images/AD-p-5.jpg"  width="598" height="449"/></a></li>
                            <li><a href="#"><img class='lazy'  data-original="/Public/Home/images/AD-p-6.jpg"  width="598" height="449"/></a></li>-->
                        </ul>
                    </div>
                    <a class="prev" href="javascript:void(0)"><em class="arrow"></em></a>
                    <a class="next" href="javascript:void(0)"><em class="arrow"></em></a>
                </div>
                <script type="text/javascript">
                    jQuery(".pro_ad_slide").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:6000});
                </script>
                <!--产品列表-->
                <div class="pro_list">
                    <ul>
                        <?php if(is_array($one)): $i = 0; $__LIST__ = array_slice($one,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><li>
                                <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['gid']));?>" target="_blank">
                                    <img class='lazy'  data-original="/Uploads/<?php echo ($date["imageurl"]); ?>300_<?php echo ($date["imagename"]); ?>" src="/Public/Home/images/loading.gif" width="160px" height="140px" /></a>
                                <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['gid']));?>" target="_blank" class="p_title_name"><?php echo (mb_substr($date["goodsname"],0,13,utf8)); ?>...</a>
                                <div class="Numeral">
                                    <span class="price"><i>￥</i><?php echo ($date["saleprice"]); ?></span><span class="Sales">销量<i><?php echo ($date["salenum"]); ?></i>件</span></div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>

            </div>
        </div>
        <!--产品版块-->
        <div class="p_Section clearfix">
            <div class="Section_title">
                <div class="name"><em>2F</em>
                    <?php if(is_array($two)): $i = 0; $__LIST__ = array_slice($two,6,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i; echo ($date['cname']['cname']); endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="p_link">
                    <?php if(is_array($two)): $i = 0; $__LIST__ = array_slice($two,7,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Search/index',array('cid'=>$date['cname']['id']));?>" target="_blank"><?php echo ($date['cname']['cname']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="Section_info clearfix">
                <div class="pro_ad_slide">
                    <div class="hd">
                        <ul></ul>
                    </div>
                    <div class="bd">
                        <ul>
                            <?php if(is_array($advertise3)): $i = 0; $__LIST__ = $advertise3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val3): $mod = ($i % 2 );++$i;?><li><a href="#"><img class='lazy'  data-original="/Uploads/Advertises/<?php echo ($val3["picurl"]); echo ($val3["picname"]); ?>" src="/Public/Home/images/loading.gif" width="598" height="449"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <a class="prev" href="javascript:void(0)"><em class="arrow"></em></a>
                    <a class="next" href="javascript:void(0)"><em class="arrow"></em></a>
                </div>
                <script type="text/javascript">
                    jQuery(".pro_ad_slide").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:6000});
                </script>
                <!--产品列表-->
                <div class="pro_list">
                    <ul>
                        <?php if(is_array($two)): $i = 0; $__LIST__ = array_slice($two,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><li>
                                <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['gid']));?>" target="_blank"><img class='lazy'  data-original="/Uploads/<?php echo ($date["imageurl"]); ?>300_<?php echo ($date["imagename"]); ?>" src="/Public/Home/images/loading.gif" width="160px" height="140px" /></a>
                                <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['gid']));?>" class="p_title_name" target="_blank"><?php echo (mb_substr($date["goodsname"],0,13,utf8)); ?>...</a>
                                <div class="Numeral"><span class="price"><i>￥</i><?php echo ($date["saleprice"]); ?></span><span class="Sales">销量<i><?php echo ($date["salenum"]); ?></i>件</span></div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>

                    </ul>
                </div>


            </div>
        </div>
        <!--产品版块-->
        <div class="p_Section clearfix">
            <div class="Section_title">
                <div class="name"><em>3F</em>
                    <?php if(is_array($three)): $i = 0; $__LIST__ = array_slice($three,6,1,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i; echo ($date['cname']['cname']); endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="p_link">
                    <?php if(is_array($three)): $i = 0; $__LIST__ = array_slice($three,7,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Search/index',array('cid'=>$date['cname']['id']));?>" target="_blank"><?php echo ($date['cname']['cname']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
            <div class="Section_info clearfix">
                <div class="pro_ad_slide">
                    <div class="hd">
                        <ul></ul>
                    </div>
                    <div class="bd">
                        <ul>
                            <?php if(is_array($advertise4)): $i = 0; $__LIST__ = $advertise4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val4): $mod = ($i % 2 );++$i;?><li><a href="#"><img class='lazy'  data-original="/Uploads/Advertises/<?php echo ($val4["picurl"]); echo ($val4["picname"]); ?>" src="/Public/Home/images/loading.gif" width="598" height="449"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <!--<li><a href="#"><img class='lazy'  data-original="/Public/Home/images/AD-p-5.jpg"  width="598" height="449"/></a></li>
                            <li><a href="#"><img class='lazy'  data-original="/Public/Home/images/AD-p-6.jpg"  width="598" height="449"/></a></li>-->
                        </ul>
                    </div>
                    <a class="prev" href="javascript:void(0)"><em class="arrow"></em></a>
                    <a class="next" href="javascript:void(0)"><em class="arrow"></em></a>
                </div>
                <script type="text/javascript">
                    jQuery(".pro_ad_slide").slide({titCell:".hd ul",mainCell:".bd ul",autoPlay:true,autoPage:true,interTime:6000});
                </script>
                <!--产品列表-->
                <div class="pro_list">
                    <ul>
                        <?php if(is_array($three)): $i = 0; $__LIST__ = array_slice($three,0,6,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$date): $mod = ($i % 2 );++$i;?><li>
                                <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['gid']));?>" target="_blank"><img class='lazy'  data-original="/Uploads/<?php echo ($date["imageurl"]); ?>300_<?php echo ($date["imagename"]); ?>" src="/Public/Home/images/loading.gif" width="160px" height="140px" /></a>
                                <a href="<?php echo U('Home/Order/goodsdetail',array('gid'=>$date['gid']));?>" class="p_title_name" target="_blank"><?php echo (mb_substr($date["goodsname"],0,13,utf8)); ?>...</a>
                                <div class="Numeral"><span class="price"><i>￥</i><?php echo ($date["saleprice"]); ?></span><span class="Sales">销量<i><?php echo ($date["salenum"]); ?></i>件</span></div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>


            </div>
        </div>
        <!--猜你喜欢样式-->
        <a name="four"></a>
        <div class="like_p">
            <div class="title_name"><span>猜你喜欢</span></div>
            <div class="list">
                <ul class="list_style">
                    <?php if(is_array($goodsLike)): $i = 0; $__LIST__ = array_slice($goodsLike,0,8,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="p_info_u">
                            <a href="<?php echo U('Order/goodsdetail',array('gid'=>$val['gid']));?>" class="p_img" target="_blank"><img style="width:220px;height:200px" class='lazy'  data-original="/Uploads/<?php echo ($val["imageurl"]); ?>300_<?php echo ($val["imagename"]); ?>" src="/Public/Home/images/loading.gif"/></a>
                            <a href="<?php echo U('Order/goodsdetail',array('gid'=>$val['gid']));?>" class="name" target="_blank"><?php echo (mb_substr($val["goodsname"],0,18,utf8)); ?>...</a>
                            <div class="Numeral"><span class="price"><i>￥</i><?php echo ($val["saleprice"]); ?></span><span class="Sales">销量<i><?php echo ($val["salenum"]); ?></i>件</span></div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <!---->
    <!--底部图层-->
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
    <!--右侧菜单栏购物车样式-->
</div>
</body>
</html>
<script type="text/javascript">


    //浮动导航
    function float_nav(dom){
        var right_nav=$(dom);
        var nav_height=right_nav.height();
        function right_nav_position(bool){
            var window_height=$(window).height();
            var nav_top=(window_height-nav_height)/2;
            if(bool){
                right_nav.stop(true,false).animate({top:nav_top+$(window).scrollTop()},400);
            }else{
                right_nav.stop(true,false).animate({top:nav_top},300);
            }
            right_nav.show();
        }

        if(!+'\v1' && !window.XMLHttpRequest ){
            $(window).bind('scroll resize',function(){
                if($(window).scrollTop()>300){
                    right_nav_position(true);
                }else{
                    right_nav.hide();
                }
            })
        }else{
            $(window).bind('scroll resize',function(){
                if($(window).scrollTop()>300){
                    right_nav_position();
                }else{
                    right_nav.hide();
                }
            })
        }
    }
    float_nav('#float');
    float_nav('#left_nav');






</script>