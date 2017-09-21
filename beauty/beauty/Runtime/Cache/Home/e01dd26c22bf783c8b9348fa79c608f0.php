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
    <script type="text/javascript" src="/Public/Home/js/yhjs/select.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.min.1.8.2.js"></script>


    <title>我的订单</title>
    <style type="text/css" >
        #page a,#page span{display: inline-block; width:18px;height:18px ;  padding: 5px;  margin: 2px;  text-decoration: none;  text-align: center;  line-height: 18px;  background: #f0ead8;  color:#000000;  border: 1px solid #c2d2d7;  }
        #page a:hover{background: #EDF6FA;color:#333;}
        #page span{background: #333;color: #fff;font-weight: bold;}
        #page div{float:right;}
        .seachform{margin-top: 30px;margin-bottom: 20px;height: 40px}
        .seachform li{float: left;line-height: 40px;font-size: 15px;margin-left: 10px;margin-right: 15px}
        .seachform li label{font-size: 16px}
        .order_tab tr td a{color: #ef5b00;padding: 0}
        .order_tab tr td a:hover{color: #00ffff}
    </style>
    <script>
        $(function(){
            $('.delOrder').click(function(){
                oid=$(this).attr('id');
                gid=$(this).attr('name');
                /*alert(oid);
                alert(gid);*/
                $.post("<?php echo U('Member/delOrder');?>",{oid:oid,gid:gid},function(res){
                    if(res.status==1){
                        layer.msg('订单商品删除成功',{icon:6,time:2000},function(){
                            location="<?php echo U('Member/Orderform');?>";
                        })
                    }else{
                        layer.msg('订单商品删除失败',{icon:5,time:2000},function(){
                            location="<?php echo U('Member/Orderform');?>";
                        })
                    }
                })
            })
        })
    </script>
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
<!--End Header End-->
<div class="i_bg bg_color">
    <!--Begin 用户中心 Begin -->
    <div class="m_content" style="margin: 0 auto">
        <div class="m_left">
            <div class="left_n">管理中心</div>
            <div class="left_m">
                <div class="left_m_t t_bg1">订单中心</div>
                <ul>
                    <li><a href="<?php echo U('Home/Member/Orderform');?>" class="now">我的订单</a></li>
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
                    <li><a href="<?php echo U('Sign/sign');?>">我的金币</a></li>
                </ul>
            </div>
        </div>
        <div class="m_right">
            <div>
                <form action="<?php echo U('Home/Member/orderform');?>" method="get">
                    <ul class="seachform">
                        <li><label>订单编号查询</label>
                            &nbsp;<input name="keywords1" type="text"  class="scinput" value="<?php echo ($keywords1); ?>"/></li>
                        <li><label>订单状态查询</label>
                            &nbsp;<select name="keywords2" id="" style="width: 150px;height: 28px;">
                                <option value="0">请选择</option>
                                <option value="1">待付款</option>
                                <option value="2">已付款</option>
                                <option value="3">已发货</option>
                                <option value="4">已收货</option>
                                <option value="5">已评价</option>
                            </select>
                        </li>
                        <li><label>&nbsp;</label><input type="submit" class="scbtn" value="查询"/></li>
                    </ul>
                </form>
            </div>

            <table border="0" class="order_tab" style="width:930px;text-align:center;margin-bottom:30px;margin-top: 35px;" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="15%">订单号</td>
                    <td width="15%">图片</td>
                    <td width="15%">商品名称</td>
                    <td width="20%">下单时间</td>
                    <td width="10%">商品价格</td>
                    <td width="10%">订单状态</td>
                    <td width="15%">订单操作</td>
                </tr>
                <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><input type="hidden" name="oid" value="<?php echo ($val["id"]); ?>"/>
                    <tr>
                        <td><font color="#ff4e00"><?php echo ($val["orderno"]); ?></font></td>
                        <td><img src="/Uploads/<?php echo ($val["imageurl"]); echo ($val["imagename"]); ?>" width="50" height="50"/></td>
                        <td><?php echo mb_substr($val['goodsname'],0,9,utf8);?>...</td>
                        <td><?php echo (date('Y-m-d H:i:s',$val['create_time'])); ?></td>
                        <td>￥<?php echo ($val["saleprice"]); ?></td>
                        <td><?php echo ($val["statusname"]); ?></td>
                        <td>
                            <?php switch($val["memberstatus"]): case "付款": ?><a href="<?php echo U('Home/Member/topay1',array('oid'=>$val['id']));?>">付款</a>
                                    <a href="#" class="delOrder" id="<?php echo ($val["id"]); ?>" name="<?php echo ($val["gid"]); ?>">删除</a><?php break;?>
                                <?php case "查看物流详情": ?><a href="#">查看物流</a><?php break;?>
                                <?php case "确认收货": ?><a href="<?php echo U('Home/Member/confirm_goods',array('oid'=>$val['id'],'gid'=>$val['gid']));?>">确认收货</a><?php break;?>
                                <?php case "交易完成": ?><a href="#">交易完成</a><?php break;?>
                                <?php case "评价": ?><a href="<?php echo U('Home/Member/usercomment',array('oid'=>$val['id'],'gid'=>$val['gid']));?>">评价</a><?php break;?>
                                <?php case "追加评价": ?><a href="<?php echo U('Home/Member/zuijiacomment',array('oid'=>$val['id'],'gid'=>$val['gid']));?>">追加评价</a><?php break;?>
                                <?php case "删除订单": ?><a href="javascript:;" class="deleteorder">删除订单</a><?php break; endswitch;?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <div id="page"><?php echo ($page); ?></div>
        </div>
    </div>
    <script type="text/javascript">
        $(function(){
            oid=$('input[name="oid"]').val();
            $('.deleteorder').click(function(){
                $.post("<?php echo U('Home/Member/deleteorder');?>",{oid:oid},function(res){
                    if(res.status){
                        layer.msg('删除成功',{time:800,icon:1},function(){
                            location="<?php echo U('Home/Member/Orderform');?>";
                        });
                    }else{
                        layer.msg('请稍后再试',{time:800,icon:1});
                    }
                })
            })
        })
    </script>
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