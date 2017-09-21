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

    <!--<script type="text/javascript" src="/Public/Home/js/yhjs/jquery-1.8.2.min.js"></script>-->

    <script type="text/javascript" src="/Public/Home/js/yhjs/menu.js"></script>
    <script type="text/javascript" src="/Public/Home/js/yhjs/select.js"></script>
    <title>beauty</title>
    <!--<script type="text/javascript" src="/Public/Home/js/jquery.min.1.8.2.js"></script>-->
    <style>
        ul,li{list-style:none;}
        body{background: #fff; }
        .checkin{margin: auto auto auto auto; }
        .clear {clear:both; height:0; overflow:hidden; display:block; line-height:0}
        .clearfix:after {clear:both;font-size:0; height:0; display:block; visibility:hidden; content:" "; line-height:0}
        .clearfix {zoom:1}/* for IE6 IE7 */
        .title{height: 36px;line-height: 36px;font-size: 24px;margin-bottom: 10px;}
        .title p{float: left;width: 80%;height: 36px;line-height: 36px;font-size: 24px;}
        .title a{display: inline-block;width: 20%;height: 36px;line-height: 36px;text-align: center;background: #42941a;border-radius: 5px;color: #fff;text-decoration: none;font-size: 24px;}
        .checkin li{background: #fee684; float: left;padding: 10px;text-align: center;}

        li.able-qiandao{background: #e9c530; }
        li.checked{background:#fee684 url(/Public/Home/images/ok.png) no-repeat bottom;}
        .mask{ width: 100%;height: 100%;position: absolute;top: 0;left: 0; background-color: rgba(0,0,0,0.55);visibility: hidden;transition: all 0.25s ease}
        .modal{background:#fff;width: 450px;height: 400px;border-radius: 10px;position: absolute;margin-top: -200px;margin-left:-225px;left: 50%;top: 50%;border:5px solid #42941a;box-sizing:border-box;overflow: hidden;transform: translateY(-200%);transition: all 0.25s ease}
        a.closeBtn{display: block;position: absolute;right: 10px;top: 5px;font-family: 'simsun';font-size: 18px;text-decoration: none;font-weight: bolder;color: #333}
        .title_h1{text-align: center;font-size: 40px;font-weight: normal;padding-top: 80px;display: block;width: 100%}
        .title_h1 span{display: inline-block;width: 40px;height: 40px;border-radius: 100%;background: #42941a;color: #fff;position: relative;float: left;margin-left: 30%;margin-top: 7px;}
        .title_h1 span::before{width: 10px;height: 2px;background: #fff;position: absolute;left: 8px;top: 23px;display: block;line-height: 0;font-size: 0;content: ""; transform: rotate(52deg);}
        .title_h1 span::after{width: 24px;height: 2px;background: #fff;position: absolute;left: 12px;top: 20px;display: block;line-height: 0;font-size: 0;content: "";transform: rotate(-45deg);}
        .title_h1 em{display: inline-block;font-size: 30px;float: left;margin-left: 10px;}
        .title_h1 i{display: inline-block;font-size: 16px;float: left;margin: 14px 0 0 10px;}
        .title_h2{text-align: center;font-size: 16px;display: block;padding-top: 20px;}
        .title_h2 span{font-size: 36px;color: #b25d06;}

        #test {
            font-size: 20px;font-style: italic;margin-top: 15px;margin: 0 auto;
            width: 379px;height: 240px;color: #f5f5f5;line-height: 30px ;
            word-spacing: 5px;
            overflow:hidden;
            padding: 5px;
        }

        .able-qiandao{
            cursor: pointer;
        }
    </style>
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
<!--End Header End-->
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
    <div class="m_content" style="margin: 0 auto">
        <div class="m_left">
            <div class="left_n">管理中心</div>
            <div class="left_m">
                <div class="left_m_t t_bg1">订单中心</div>
                <ul>
                    <li><a href="<?php echo U('Home/Member/Orderform');?>">我的订单</a></li>
                    <li><a href="<?php echo U('Home/Member/Orderform1');?>">金币兑换订单</a></li>
                    <li><a href="<?php echo U('Home/Member/address');?>">收货地址</a></li>
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
                    <li><a class="now" href="<?php echo U('Sign/sign');?>">我的金币</a></li>
                </ul>
            </div>
        </div>
        <div class="m_right">

            <div class="m_des">
                <table border="0" style="width:870px; line-height:22px;" cellspacing="0" cellpadding="0">
                    <tr valign="top">
                        <td width="115"><img src="/UserImg/photo<?php echo ($imgpath); echo ($imgname); ?>" width="90" height="90" id="photo"/>
                            <a href="<?php echo U('Member/addImg');?>" style="color: orange; cursor: pointer; display: block;margin-left: -10px " >点击更换头像</a></td>
                        <td>
                            <div class="m_user"><?php echo (session('mname')); ?></div>
                            <p>
                                <!--等级：<?php echo ($order); ?> <br />-->
                                <font color="#ff4e00">您当前金币&nbsp;&nbsp;
                                    <?php if($sign['sign'] > 0): ?><span id="sign1"><?php echo ($sign['sign']); ?></span>&nbsp;&nbsp;!
                                        <?php else: ?>
                                        <span>0</span>&nbsp;&nbsp;!<?php endif; ?>
                                        <a href="<?php echo U('Home/Sign/signCity');?>" style="color: red;font-size: 20px;font-weight: bolder">点击这里</a>
                                        <span> <a href="<?php echo U('Home/Sign/signCity');?>">
                                            <img style="vertical-align: middle;margin-bottom:5px;"  src="/Public/Home/images/jin.png" />
                                        </a>进入金币商城兑换礼品吧！！</span>
                                </font><br />

                                <!--最后签到时间: <?php echo (date('Y-m-d H:i:s',$signtime)); ?><br />-->
                            </p>
                            <!--<span style="margin-left:30px;text-align: center;color: purple;font-size: 16px">签到总次数<?php echo ($sign['signcount']); ?></span>-->
                            <div class="m_notice">
                                用户中心公告！
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="checkin" style="float: left">
            </div>
            <div class="checkin2" style="float: left;width: 430px;margin-left: 10px;
            height:405px;background: #FE9C37;border-radius: 11px;padding: 13px">
                <span style="margin-left:30px;text-align: center;color:#dfdfdf;font-size: 18px">
                    签到总次数为
                    <span id="count" style="font-size: 18px;color: red"><?php echo ($sign['signcount']?$sign['signcount']:0); ?></span>
                    <?php if(($sign['signcount'] > 0) && ($sign['signcount'] < 500) ): ?><br><span style="margin-left:30px;font-size: 18px;color:#dfdfdf">再坚持</span>
                        <span id="day" style="font-size: 18px;color: red "><?php echo ($day); ?></span>天每天就可领取
                        <span id="daysign" style="font-size: 18px;color: red "><?php echo ($daysign); ?></span>金币<br>
                        <?php elseif($sign['signcount'] > 500): ?>
                        <p style="font-size: 16px;color: red">恭喜您可享有每天领取10金币的权限</p><?php endif; ?>
                </span>
                <span  style="margin-left:30px;text-align: center;color:#dfdfdf;font-size: 20px" >
                    最后签到时间为: <span id="time1" style="font-size: 16px;color: #f5f5f5"><?php echo (date('Y-m-d H:i:s',$sign['signtime'])); ?></span>
                </span>
                <div id="test" style="margin-top: 20px;font-size: 16px;color:#fffecc ">
                    <div id="test1" style="margin-top: 20px;font-size: 16px">
                        <span style="text-align: center;font-size: 16px">签到规则</span><br>
                        1)每天签到都有金币相送,金币可以兑换商品哦<br>
                        2)数量有限，每天只能签到一次<br>
                        3)每次签到我们都会统计您的签到总次数<br>
                        4)签到次数小于<span style="color: red"> 50 </span>时每次签到相送 <span style="color: red">1</span> 个金币<br>
                        5)签到次数大于<span style="color: red"> 50 </span>小于<span style="color: red"> 200 </span>时每次签到相送<span style="color: red"> 3 </span>个金币<br>
                        6)签到次数大于<span style="color: red"> 200 </span>小于<span style="color: red"> 500 </span>时每次签到相送<span style="color: red"> 6 </span>个金币<br>
                        7)签到次数大于<span style="color: red"> 500 </span>时享有每天领取<span style="color: red"> 10 </span>金币的权限<br>
                    </div>
                    <div id="test2" style="margin-top: 20px;font-size: 16px"></div>
                </div>
            </div>
        </div>

    </div>
    <input class="signtag" type="hidden" signtag="<?php echo ($sign['signtag']); ?>"/>
    <input class="day" type="hidden" day="<?php echo ($sign['day']); ?>"/>
    <!--End 用户中心 End-->
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

<script>
    var test=document.getElementById("test");
    var test1=document.getElementById("test1");
    var test2=document.getElementById("test2");

    test2.innerHTML=test1.innerHTML;
    function move(){
        if(test1.offsetHeight - test.scrollTop <= 0){
            test.scrollTop-=test1.offsetHeight;
        }
        test.scrollTop++;
    }
    setInterval("move()", 100);

    $(function(){
        $('.able-qiandao').click(function(){
                $.get('<?php echo U("Home/Sign/addSign");?>',function(res){
                    if(res.status==1){
                        $("#sign1").text(res.info['sign']);
                        $("#count").text(res.info['signcount']);
                        var time=new Date();
                        var y=time.getFullYear();
                        var  m1=time.getMonth()+1;
                        var dd=time.getDate();
                        var hh=time.getHours();
                        var  mm=time.getMinutes();
                        var  ss=time.getSeconds();
                        var aa=y+'-'+m1+'-'+dd+' '+hh+':'+mm+':'+ss;
                        $("#time1").text(aa);
                        if(res.info['signcount']<50){
                            var day=parseInt(50-res.info['signcount']);
                            $('#day').text(day);
                            $('#daysign').text(3);
                            layer.msg('成功领取1个金币',{icon:1})
                        }else if(res.info['signcount']>=50 && res.info['signcount']<200){
                            var day1=parseInt(200-res.info['signcount']);
                            $('#day').text(day1);
                            $('#daysign').text(6);
                            layer.msg('成功领取3个金币',{icon:1})
                        }else if(res.info['signcount']>=200 && res.info['signcount']<500){
                            var day2=parseInt(500-res.info['signcount']);
                            $('#day').text(day2);
                            $('#daysign').text(10);
                            layer.msg('成功领取6个金币',{icon:1})
                        }else if(res.info['signcount']>500){
                            layer.msg('成功领取10个金币',{icon:1})
                        }
                    }else{
                        layer.msg('明天再来吧',{icon:2})
                    }
                });
        })
    })




</script>


<script>

    ;(function($) {

        var Checkin = function(ele, options) {
            this.ele = ele;
            this.opt = options;
            //设置初始值
            this.defaults = {
                width: 453,
                height: 410,
                background: '#f90',
                radius: 10,
                color: '#fff',
                padding: 10,
                dateArray:arr()
            };
            this.obj = $.extend({}, this.defaults, this.opt);
        }
        Checkin.prototype.init = function() {
            var _self = this.ele,
                    html = '',
                    myDate = new Date(),
                    year = myDate.getFullYear(),
                    month = myDate.getMonth(),
                    day = myDate.getDate(),
                    weekText = ['日', '一', '二', '三', '四', '五', '六'];

            if($('.signtag').attr('signtag')==1){
                _self.css({
                    width: this.obj.width + 'px',
                    height: this.obj.height,
                    background: this.obj.background,
                    borderRadius: this.obj.radius,
                    color: this.obj.color,
                    padding: this.obj.padding
                }).append("<div class='title'><p>" + year + '年' + (month + 1) + '月' + day + '日' + "</p>" +
                "<a class=\'checkBtn\' href=\"javascript:;\">已签到</a>" +
                "</div>");
            }else{
                _self.css({
                    width: this.obj.width + 'px',
                    height: this.obj.height,
                    background: this.obj.background,
                    borderRadius: this.obj.radius,
                    color: this.obj.color,
                    padding: this.obj.padding
                }).append("<div class='title'><p>" + year + '年' + (month + 1) + '月' + day + '日' + "</p>" +
                "<a class=\'checkBtn\' href=\"javascript:;\">签到</a>" +
                "</div>");
            }



            $("<ul class='week clearfix'></ul><ul class='calendarList clearfix'></ul>").appendTo(_self);
            for (var i = 0; i < 7; i++) {
                _self.find(".week").append("<li>" + weekText[i] + "</li>")
            };
            for (var i = 0; i < 42; i++) {
                html += "<li></li>"
            };
            _self.find(".calendarList").append(html);
            var $li = _self.find(".calendarList").find("li");
            _self.find(".week li").css({
                width: (_self.width() / 7) + 'px',
                height: 50 + 'px',
                borderRight: '1px solid #f90',
                boxSizing: 'border-box',
                background: '#b25d06'
            });
            //这里是设置css样式的初始化
            $li.css({
                width: (_self.width() / 7) + 'px',
                height: 47 + 'px',
                borderRight: '1px solid #f90',
                borderBottom: '1px solid #f90',
                boxSizing: 'border-box',
                color: "#b25d06"
            });
            _self.find(".calendarList").find("li:nth-child(7n)").css('borderRight', 'none');
            _self.find(".week li:nth-child(7n)").css('borderRight', 'none');

            var monthFirst = new Date(year, month, 1).getDay();//获取一月第一天是周几

            var d = new Date(year, (month + 1), 0)
//			console.log(d);
            var totalDay = d.getDate(); //获取当前月的天数
//			console.log(totalDay);
            for (var i = 0; i < totalDay; i++) {
                $li.eq(i + monthFirst).html(i + 1);
                $li.eq(i + monthFirst).addClass('data' + (i + 1))
                if (isArray(this.obj.dateArray)) {
                    for (var j = 0; j < this.obj.dateArray.length; j++) {
                        if (i == this.obj.dateArray[j]) {
                            // 假设已经签到的
                            $li.eq(i + monthFirst).addClass('checked');
                        }
                    }
                }
            }
            //$li.eq(monthFirst+day-1).css('background','#f7ca8e')
            _self.find($(".data" + day)).addClass('able-qiandao');

        }
        var isChecked = false;
        Checkin.prototype.events = function() {
            var _self = this.ele;
            var $li = _self.find(".calendarList").find("li");
            $li.on('click', function(event) {
                event.preventDefault();
                /* Act on the event */
                if ($(this).hasClass('able-qiandao')) {
                    $('.able-qiandao').addClass('checked');
                    modal(_self);
                    dateArrayTotal();
                    isChecked = true;
                }

            });
            if($('.signtag').attr('signtag')==1){
                $('.able-qiandao').addClass('checked');
            }
            $('.sign').addClass('checked');
            var checkBtn = _self.find(".checkBtn");
            checkBtn.click(function(event) {
                modal(_self);
                _self.find('.able-qiandao').addClass('checked');
                isChecked = true;
                this.contenteditable="false";
                dateArrayTotal();
            });
        }
        //右上角的签到字样
        var modal = function(e) {
            var mask = e.parents().find(".mask");
            var close = e.parents().find(".closeBtn");
            if (mask && !isChecked) {
                mask.addClass('trf');
            } else {
                return
            };
            e.parents().find('.checkBtn').text("已签到");

        }
        //获取签到信息并传给后台
        var dateArrayTotal=function(i){
            //返回今天签到的日期
            var checkedDay=$('.checkin').find('.checked:last').text();
            $.ajax({
                type:"get",
                data:{
                    "checkedDay":checkedDay
                },
                url:"../list-data-json-bypage1.php",
                async:true,
                success: function(){
//					modal(_self);
                }
            });
        }
        //从数据库获取签到的天数并渲染
        var arr = function(){
            var dateArray = [];
            $.ajax({
                url: "../list-data-json-pagecount1.php",
                dataType: "json",
                async:false,
                success: function(data){
                    $.each(data,function(i,el){
                        //获取签到的天数
                        dateArray.push(el.checkedDay);
                    });
                }
            });
            return dateArray;
        }

        //插件函数调用
        $.fn.Checkin = function(options) {
            var checkin = new Checkin(this, options);
            var obj = [checkin.init(), checkin.events()]
            return obj
        }
        var isArray = function(arg) {
            return Object.prototype.toString.call(arg) === '[object Array]';
        };
    })(jQuery);
    // 插件调用
    $(".checkin").Checkin({'width':460});
//    $(".checkin").css('marginTop',parseInt(($(window).innerHeight()-$(".checkin").outerHeight()))+'px');
</script>
</html>