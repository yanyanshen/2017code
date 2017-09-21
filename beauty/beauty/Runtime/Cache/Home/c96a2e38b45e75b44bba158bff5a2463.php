<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/Public/Home/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/fonts/iconfont.css" rel="stylesheet" type="text/css" />
<script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.reveal.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.sumoselect.min.js" type="text/javascript"></script>
<script src="/Public/Home/js/common_js.js" type="text/javascript"></script>
<script src="/Public/Home/js/footer.js" type="text/javascript"></script>
<script src="/Public/Home/js/jquery.jumpto.js" type="text/javascript"></script>
<script src="/Public/Home/js/shoppingCart.js" type="text/javascript"></script>
<script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>
<link rel="stylesheet" href="/Public/Home/css/reset.css" />
<link rel="stylesheet" href="/Public/Home/css/shoppingCart.css" />
<link rel="stylesheet" href="/Public/Home/css/headerAndFooter.css" />
<script src="/Public/Home/js/lrtk.js" type="text/javascript"></script>

<title>beauty</title>
    <style>
        .shop{padding-top: 8px;}
       .li{border: 1px solid #CCCCCC;padding: 0;width: 100px;height:35px;line-height: 35px;text-align: center;
            cursor: pointer;margin: 18px 20px;}
        .zfborder{
            height:35px; line-height:35px; padding:0 14px; overflow:hidden; border:2px solid #ff4e00;width: 100px;
        }
    </style>

</head>

 <script type="text/javascript">
        $(document).ready(function(){
            window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3 });
            window.test = $('.testsel').SumoSelect({okCancelInMulti:true });
        });
    </script>
<body>
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
<div id="Orders" class="Inside_pages  clearfix">
<div class="Process"><img src="/Public/Home/images/Process_img_02.png" /></div>
 <form action="<?php echo U('Home/Order/tosubmit');?>" class="form" method="post" enctype="multipart/form-data" id="formOrder">
  <div class="Orders_style clearfix">
     <div class="address clearfix">
       <div class="title">收货人信息</div>
          <div class="adderss_list clearfix">
              <div class="title_name">选择收货地址 <a href="javascript:addLayer();" id="addAddress">+添加地址</a></div>
            <div class="list" id="select">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><ul class="confirm <?php echo ($val['isdefault']?active:''); ?>" style="position: relative;">
            <input type="radio" value="<?php echo ($val["id"]); ?>" name="address" style="display: none;" />
                <?php if($val['isdefault'] == 1): ?><div class="default">默认地址</div><?php endif; ?>
            <div class="adderss_operating">
             <div class="Operate">
                 <?php if($val['isdefault'] == 0): ?><a href="javascript:;" setaddress="<?php echo ($val["id"]); ?>" class="setaddress" style="color: white;display:inline-block;width: 100px;height: 27px;position: absolute;left: 0;top: 0;background-color: #808080;text-align: center;line-height: 27px;">设为默认</a><?php endif; ?>
                 <a href="#" class="delete_btn" address="<?php echo ($val["id"]); ?>"></a>
                 <a href="javascript:edit(<?php echo ($val['id']); ?>);" class="modify_btn"></a>
             </div>
            </div>
            <div class="user_address">
            <li><input type="text" value="<?php echo ($val["username"]); ?>" style="margin: 5px 0;"/></li>
            <li><input type="text" value="<?php echo ($val["totaladdress"]); ?>" style="margin: 5px 0;"/></li>
            <li><input type="text" value="<?php echo ($val["address"]); ?>" style="margin: 5px 0;"/></li>
            <li><input type="text" value="<?php echo ($val["mobile"]); ?>" style="margin: 5px 0;"/></li>
            </div>
            </ul><?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
           </div>
     </div>
		<fieldset>
            <!--判断收货地址的-->
     <!--快递选择-->
            <script type="text/javascript">
                //编辑地址
                function edit(aid){
                    layer.open({
                        type:2,
                        shade:false,
                        title:"编辑地址",//false为不显示标题
                        area:["700px",'600px'],
                        content:"<?php echo U('Home/Order/showAddresslist');?>?aid="+aid
                    });

                }
                $(function(){
                    $('#select').children('ul').click(function(){
                        $(this).children('input:radio').attr('checked','checked');
                    });

                    //删除地址
                    $('.delete_btn').click(function(){
                        var addressid=$(this).attr('address');
                        /*a=$(this);*/
                        $.post('<?php echo U("Home/Order/deleteAddress");?>',{id:addressid},function(res1){
                            if(res1.status==1){
                                layer.msg('删除成功',{time:1000},function(){
                                   parent.location.reload();
                                });
                            }else{
                                layer.msg('删除失败');
                            }
                        })
                    });

                    //设置默认地址
                    $('.confirm').mouseenter(function(){
                        $(this).children('.setress').show();
                    });
                    $('.confirm').mouseleave(function(){
                        $(this).children('.setress').hide();
                    });
                    //设置默认地址
                    $('.setaddress').click(function(){
                        var addressid=$(this).attr('setaddress');
                        $.post('<?php echo U("Home/Order/setdefault");?>',{id:addressid},function(res2){
                            if(res2.status==1){
                                layer.msg('设置成功',{time:800,icon:1},function(){
                                    parent.location.reload();
                                });
                            }else{
                                layer.msg('请稍后进行设置',{time:500});
                            }
                        })
                    });
                })


            </script>
     <!--付款方式-->
     <div class="payment">
      <div class="title_name" id="zfaccount">支付方式</div>
       <ul style="margin: 0;padding: 0;" id="zf">
           <li id="account" class="li zfborder">余额<img src="/Public/Home/images/yue.jpg" alt="" style="width: 40px;height: 35px;margin: 0;padding: 0;"/>
               <input type="hidden" value="1"/></li>
            <li class="li"><img style="width: 100px;height: 35px;" src="/Public/Home/images/logo_alipay.gif" alt="" />
                <input type="hidden" value="2"/></li>
            <li class="li"><img style="width: 100px;height: 35px;" src="/Public/Home/images/logo_yeepay.gif" alt="" />
                <input type="hidden" value="3"/></li>
            <li class="li"><img style="width: 100px;height: 35px;" src="/Public/Home/images/logo_weixin.gif" alt="" />
                <input type="hidden" value="4"/></li>
           <input type="hidden" name="zhfs"/>

       </ul>
     </div>
            <script type="text/javascript">
                //付款方式的选择
                jQuery(function() {
                    jQuery("#zf").each(function() {
                        var i = jQuery(this);
                        var p= i.find('li');
                        p.click(function() {
                            if (!!jQuery(this).hasClass("zfborder")) {
                                jQuery(this).removeClass("zfborder");
                            } else {
                                jQuery(this).addClass("zfborder").siblings("li").removeClass("zfborder");
                                jQuery(this).siblings('input').val(jQuery(this).children('input').val());
                            }
                        })
                    })

                })
            </script>
            <script type="text/javascript">
                function layerbuy(){
                    addid=$('.list').has(".active").text();
                    account=$('#zf li').hasClass("zfborder");
                    if(addid&&account){
                        $('#formOrder').submit();
                    }else{
                        if(!addid){
                            layer.msg('请选择收货地址',{icon:1});
                        }
                        if(!account){
                            layer.msg('请选择付款方式',{icon:1});
                        }
                    }
                }
            </script>
      <!--发票样式-->
     <!--产品列表-->
     <div class="Product_List">
     <div class="envelopes">
     选择已有红包<select name="somename" class="SlectBox" onclick="console.log($(this).val())" onchange="console.log('change is firing')">
			        <option disabled="disabled" selected="selected">选择红包金额</option>
                    <?php if(is_array($hlist)): $i = 0; $__LIST__ = $hlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hlist): $mod = ($i % 2 );++$i;?><option value="<?php echo ($hlist["id"]); ?>"><?php echo ($hlist["money"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			    </select>
         <input type="hidden" name="hid"/>
     </div>
         <div class="shop frm_sty" style="width: 1200px;">
             <table cellpadding="0" cellspacing="0" class="gwc_tb1">
                 <thead><tr class="title">
                     <td class="name" style="width: 250px;">商品名称</td>
                     <td class="price" style="width: 100px;">型号</td>
                     <td class="price" style="width: 100px;">价格</td>
                     <td class="Quantity" style="width: 100px; ">购买数量</td>
                     <td class="Preferential" style="width: 100px;">优惠价</td>
                     <td class="sumprice" style="width: 100px;">金额</td>
                 </tr>
                 </thead>
             </table>
             <?php if(is_array($orderlist)): $i = 0; $__LIST__ = $orderlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><table cellpadding="0" cellspacing="0" class="gwc_tb2">
                 <tr>
                     <td class="tb2_td2" style="width: 120px;"><a href="#">
                         <img src="/Uploads/<?php echo ($val["imageurl"]); ?>100_<?php echo ($val["imagename"]); ?>"/></a>
                     </td>
                     <td class="tb2_td3" style="width: 170px;">
                         <input type="hidden" name="gid" value="<?php echo ($gid); ?>"/>
                         <input type="hidden" name="oid" value="<?php echo ($oid); ?>"/>
                         <a href="#"><input type="text" value="<?php echo ($val["goodsname"]); ?>" name="goodsname"/></a>
                     </td>
                     <td class="tb1_td4" style="width:110px;"><input type="text" value="<?php echo ($val["ml"]); ?>" name="ml" style="width: 60px;"/></td>
                     <td class="tb1_td4" style="width:110px;"><input type="text" value="<?php echo ($val["saleprice"]); ?>" name="saleprice" style="width: 60px;"/></td>
                     <td class="tb1_td5" style="width:110px;">
                         <input name=""  style=" width:20px; height:18px;border:1px solid #ccc;" type="button" value="-" />
                         <input name="buynum" id="buynum" type="text" value="<?php echo ($val["buynum"]); ?>" class="buynum" style=" width:30px; text-align:center; border:1px solid #ccc;" readonly/>
                         <input name="" style=" width:20px; height:18px;border:1px solid #ccc;" type="button" value="+" />
                         <input type="hidden" value="<?php echo ($val["saleprice"]); ?>" />
                     </td>
                     <td style="width: 120px;"><input  style="width: 60px;" name="discount" type="text" value="<?php echo ($val["discount"]); ?>" style="width: 20px;" class="discount"/></td>
                     <td class="tb1_td6" style="width: 110px;">
                         <label class="tot" style="color:#ff5500;font-size:14px; font-weight:bold;">
                             <!--<input style="width: 60px;" type="text" class="price" name="price" value="<?php echo ($val["price"]); ?>"/>-->
                             <input style="width: 60px;" type="text" class="price" name="price" value="5.1"/>
                         </label>
                     </td>
                 </tr>

             </table><?php endforeach; endif; else: echo "" ;endif; ?>
         </div>
      <div class="Pay_info">
       <label>订单留言:</label><input name="inform" type="text"  onkeyup="checkLength(this);" class="text_name " />
          <span class="wordage">剩余字数：<span id="sy" style="color:Red;">50</span></span>
      </div>
      <!--价格-->
      <div class="price_style">
      <div class="right_direction">
        <ul>
         <li><label>商品总价</label><i>￥</i><input id="totalprice" name="totalprice" value="" style="width: 100px;margin-left: 10px;line-height: 10px;margin-top: 6px;"/></li>
         <li><label>优惠金额</label><i>￥</i><input id="disprice" name="disprice" value="" style="width: 100px;margin-left: 10px;line-height: 10px;margin-top: 6px;"/></li>
         <li><label>红&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;包</label><i>￥</i>
             <input id="hongbao" name="disprice1" value="0" style="width: 100px;margin-left: 5px;line-height: 10px;margin-top: 6px;"/></li>
         <li class="shiji_price"><label>实&nbsp;&nbsp;付&nbsp;&nbsp;款</label><i>￥</i>
             <input id="trueprice" name="trueprice" value="" style="margin-top: 6px;width: 100px;margin-left: 5px;line-height: 10px;"/></li>
        </ul>   
        <div class="btn">
            <a  href="javascript:layerbuy();" style="background-image:url(/Public/Home/images/Button_img.png);display: inline-block;width: 152px;height: 36px;color:#ffffff;text-align: center;line-height: 36px;margin-left: 10px;">提交订单</a>
            <a href="<?php echo U('Home/MyCart/tocart');?>"  style="background-image:url(/Public/Home/images/Button_img.png);display: inline-block;width: 152px;height: 36px;color:#ffffff;text-align: center;line-height: 36px;margin-left: 10px;" class="return_btn"/>返回购物车</a>
        </div>
         <div class="integral right">待订单确认后，你将获得<span>345</span>积分</div>
      </div>
      </div>
     </div>  
     </fieldset>
  </div>
    </form>
</div>
 <div class="slogen">
  <div class="index_style">
    <ul class="wrap">
	 <li>
	  <a href="#"><img src="/Public/Home/images/slogen_34.png" data-bd-imgshare-binded="1"></a>
	  <b>安全保证</b>
	  <span>多重保障机制 认证商城</span>
	 </li>
	 <li><a href="#"><img src="/Public/Home/images/slogen_28.png" data-bd-imgshare-binded="2"></a>
	  <b>正品保证</b>
	  <span>正品行货 放心选购</span>
	 </li>
	 <li>
	  <a href="#"><img src="/Public/Home/images/slogen_30.png" data-bd-imgshare-binded="3"></a>
	  <b>七天无理由退换</b>
	  <span>七天无理由保障消费权益</span>
	 </li>
      <li>
	  <a href="#"><img src="/Public/Home/images/slogen_31.png" data-bd-imgshare-binded="4"></a>
	  <b>天天低价</b>
	  <span>价格更低，质量更可靠</span>
	 </li>
	</ul>
  </div>
 </div>
<!--底部图层-->
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
   <!--右侧菜单栏购物车样式-->

<script type="text/javascript">

/*    alert(123);*/

function checkLength(which) {
	var maxChars = 50; //
	if(which.value.length > maxChars){
		alert("您出入的字数超多限制!");
		// 超过限制的字数了就将 文本框中的内容按规定的字数 截取
		which.value = which.value.substring(0,maxChars);
		return false;
	}else{
		var curr = maxChars - which.value.length; //250 减去 当前输入的
		document.getElementById("sy").innerHTML = curr.toString();
		return true;
	}
}

//得到商品的价格信息的JS

$('select[name="somename"]').change(function(){
    hongbao = parseInt($('select[name="somename"]').val());
    $.post('<?php echo U("Home/Order/money");?>',{money:hongbao},function(res){
        if(res.status==1){
            $('input[name="hid"]').attr('value',hongbao);
            hongbao=res.info;
            $('input[name="disprice1"]').val(hongbao);
            //得到总价格
            totalprice = parseInt($('#totalprice').val());
            disprice = parseInt($('#disprice').val());
            trueprice = totalprice - disprice - hongbao;
            $('#trueprice').val(trueprice);
        }
    })
});

    $(function(){
        var a=$('.gwc_tb2 .tot .price').length;
        var buynum=parseInt($('.buynum').val());
        var totalprice=0;
        for(var i=0;i<a;i++){
            totalprice+=parseInt($('.gwc_tb2 .tot .price').eq(i).val());
        }
        //得到总价格
        $('#totalprice').val(totalprice);

        var b=$('.gwc_tb2 .discount').length;
        var disprice=0;
        for(var j=1;j<=b;j++){
            disprice+=parseInt($('.gwc_tb2 .discount').val());
        }
        $('#disprice').val(disprice);
        hongbao1=parseInt($('input[name="disprice1"]').val());
        trueprice=totalprice-disprice-hongbao1;
        $('#trueprice').val(trueprice);
        if(buynum<=0){
            $('#totalprice').val(0);
            $('#trueprice').val(0);
        }

    })
flag=true;
$('.layui-layer-ico').live({
    click:function(){
        flag=true;
    }
});
function addLayer(){
    if(flag){
        flag=false;
        layer.open({
            type:2,
            shade:false,
            title:"添加地址",//false为不显示标题
            area:["700px",'600px'],
            content:"<?php echo U('Home/Order/layeraddress');?>"
        });
    }
}

//边际地址的弹框



</script>
</body>
</html>