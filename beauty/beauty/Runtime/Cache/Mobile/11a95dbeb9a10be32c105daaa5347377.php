<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title> 资金账户 </title>
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
    <script>var imgonload =function(){};var urls = window.location.href.split("#");try{ if(/^url:.+/.test(urls[1])){window.location.href=urls[1].slice(4);}}catch(e){}var _hmt = _hmt || [];var PX_HELP_DATA=['416148489@qq.com','i2jioq5184gbv9ts2qudnsgth4',['touch','member2.0','orderlist'],'2015/09/15 16:13:27',0]; var DOMIN = {MAIN:"http://www.paixie.net",HELP:"http://help.paixie.net",TUAN:"http://tuan.paixie.net",WAP:"http://wap.paixie.net",UNION:"http://union.weixiaodian.com",VIPSHOP:"http://go.paixie.net"};var DOMINS = {"main":"http://www.paixie.net","tuan":"http://tuan.paixie.net","help":"http://help.paixie.net","union":"http://union.weixiaodian.com","wap":"http://wap.paixie.net","touch":"http://m.paixie.net","vipshop":"http://go.paixie.net","ued":"http://ued.paixie.net"};</script>
    <link rel="stylesheet" href="/Public/Mobile/css/zip.touch.member2_0.orderlist.v3907.css" type="text/css" />
    <script type="text/javascript" src="/Public/Mobile/js/zepto.min.js"></script>
    <link rel="stylesheet" href="/Public/Mobile/layer_mobile/need/layer.css" type="text/css" />
    <script type="text/javascript" src="/Public/Mobile/layer_mobile/layer.js"></script>
    <style type="text/css">
        .m_header,.body{max-width: 640px;}
        .m_header{left:50%;margin-left: -320px;}
        .text-center table{width:90%;font-size: 16px; text-align:center;margin: 10px auto}
        .text-center table tr{margin-top: 10px;height: 50px;}
        .text-center table tr a{color: #F27602;cursor: pointer}
    </style>
    <script>
        $(function(){
            $('.m_tab a').click(function(){
                $(this).addClass('selected').sibling().removeClass('selected');
            })
        });

//        $(document).getElementById("2").addClass('selected').sibling().removeClass('selected');
    </script>
    <script type="text/javascript">function remReSize(){var w = $(window).width();try{w = $(parent.window).width();}catch(ex){};if(w>640){w = 640;};$('html').css('font-size',100/640*w+'px');$('#js_style_for_pc').remove();$('body').append('<style id="js_style_for_pc">.m_header{margin-left: -'+w/2+'px;}.m_menu{margin-left: -'+w/2+'px;}</style>');};remReSize();$(window).resize(remReSize);$(document).ready(function() {remReSize();});for(var i=0;i<3;i++){setTimeout(remReSize, 100*i);};</script>
    <script>
        $(function(){
            $('.operate').click(function(){
                var id=$(this).attr('id');
                $.post("<?php echo U('Account/record');?>",{id:id},function(res){
                    alert(res.status);
                    if(res.status==1){
                        layer.open({
                            content:'操作成功',
                            skin:'msg',
                            type:1,
                            time:3
                        })
                    }else{
                        layer.open({
                            content:'操作失败',
                            skin:'msg',
                            type:1,
                            time:3
                        })
                    }
                })

            })
        })
    </script>
</head>
<body>
<div class="body">
    <div class="m_header">
<!--
        <p> <a class="bt_prev" href="javascript:window.history.back();void(0);"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p>
-->
        <p> <a class="bt_prev" href="<?php echo U('Account/index');?>"> <span class="prev rotate45"></span> <span class="prev rotate135"></span> </a> </p>
        <h1 class="ellipsis bt_title"> 资金账户 </h1>
        <p><a class="bt_menu" href="javascript:void(0)"> <span class="menu"></span> </a> </p>
    </div>
    <div class="m_menu hidden">
        <div>
            <i class="rotate45"></i>
            <a href="<?php echo U('Mobile/Index/index');?>"><span><i class="m_bg"></i></span>首页</a>
            <a href="<?php echo U('Mobile/Category/index');?>"><span><i class="m_bg"></i></span>分类搜索</a>
            <a href="<?php echo U('Mobile/MyCart/mycart');?>"><span><i class="m_bg"></i></span>购物车</a>
            <a href="<?php echo U('Mobile/Member/index');?>"><span><i class="m_bg"></i></span>用户中心</a>
        </div>
    </div>
    <div class="lib_content" id="js_lib_content">
        <div class="m_tab m_tab_full m_tab_full5 bg_white">
            <?php if($status == 1): ?><a class="selected" href="<?php echo U('Account/record');?>">资金余额</a>
                <?php else: ?>
                <a href="<?php echo U('Account/record');?>">资金余额</a><?php endif; ?>
            <?php if($status == 2): ?><a class="selected" href="<?php echo U('Account/rechargeRecord');?>">充值记录</a>
                <?php else: ?>
                <a class="" href="<?php echo U('Account/rechargeRecord');?>">充值记录</a><?php endif; ?>
            <?php if($status == 3): ?><a class="selected" href="<?php echo U('Account/cashRecord');?>">提现记录</a>
                <?php else: ?>
                <a class="" href="<?php echo U('Account/cashRecord');?>">提现记录</a><?php endif; ?>
            <?php if($status == 4): ?><a class="selected" href="<?php echo U('Account/tradeRecord');?>">消费记录</a>
                <?php else: ?>
                <a class="" href="<?php echo U('Account/tradeRecord');?>">消费记录</a><?php endif; ?>
        </div>
        <div class="text-center">

            <?php switch($status): case "1": ?><table>
                <tr>
                    <td width="20%">最后交易时间</td>
                    <td width="15%">充值总额</td>
                    <td width="15%">提现总额</td>
                    <td width="15%">消费总额</td>
                    <td width="15%">余额</td>
                    <td width="8%">状态</td>
                    <td width="12%">操作</td>
                </tr>
                <tr>
                    <td><?php echo date('Y-m-d',$account['time']);?></td>
                    <td><?php echo ($recharge['rechargesum']); ?></td>
                    <td><?php echo ($cash['cashsum']); ?></td>
                    <td><?php echo ($trade['tradesum']); ?></td>
                    <td><?php echo ($account['balance']); ?></td>
                    <td><?php echo ($account['status']==0?'冻结':'激活'); ?></td>
                    <td><a class="operate" id="<?php echo ($account["id"]); ?>"><?php echo ($account['status']==0?'激活':'冻结'); ?></a></td>
                </tr>
            </table><?php break;?>
                <?php case "2": ?><table>
                        <tr>
                            <td width="10%">编号</td>
                            <td width="30%">充值时间</td>
                            <td width="20%">充值金额</td>
                            <td width="20%">充值总额</td>
                        </tr>
                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                            <td><?php echo ($k); ?></td>
                            <td><?php echo date('Y-m-d H:i:s',$val['rechargetime']);?></td>
                            <td><?php echo ($val['rechargemoney']); ?></td>
                            <td><?php echo ($val['rechargesum']); ?></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table><?php break;?>
                <?php case "3": ?><table>
                        <tr>
                            <td width="10%">编号</td>
                            <td width="30%">取现时间</td>
                            <td width="20%">取现金额</td>
                            <td width="20%">取现总额</td>
                        </tr>
                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                                <td><?php echo ($k); ?></td>
                                <td><?php echo date('Y-m-d H:i:s',$val['cashtime']);?></td>
                                <td><?php echo ($val['cashmoney']); ?></td>
                                <td><?php echo ($val['cashsum']); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table><?php break;?>
                <?php case "4": ?><table>
                        <tr>
                            <td width="10%">编号</td>
                            <td width="30%">消费时间</td>
                            <td width="20%">消费金额</td>
                            <td width="20%">消费总额</td>
                        </tr>
                        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                                <td><?php echo ($k); ?></td>
                                <td><?php echo date('Y-m-d H:i:s',$val['tradetime']);?></td>
                                <td><?php echo ($val['trademoney']); ?></td>
                                <td><?php echo ($val['tradesum']); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table><?php break; endswitch;?>
        </div>
        <!--<div class="text-center">
            <a class="m_button m_button_radius js_more" href="javascript:void(0);">查看更多<i class="m_icon m_icon_down"></i></a>
        </div>-->
        <div class="placeholder"></div>
        <div class="placeholder"></div>
    </div>
    <div class="m_footer clear">
        <a class="m_icon m_icon_gotop hidden" href="javascript:void(0);"></a>
        <div class="userinfo">
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6 ellipsis" href="<?php echo U('Mobile/Member/index');?>"><?php echo (session('mname')); ?></a>
        <?php else: ?> <a style="color:#666666 " href="<?php echo U('Mobile/Login/Dologin');?>"> 登录</a><?php endif; ?>

    <span></span>
    <?php if($_SESSION['beauty_']['mid']> 0): ?><a class="gray6" id="OUT" href="javascript:;">退出</a>
        <?php else: ?><a class="gray6" href="<?php echo U('Mobile/Register/index');?>">注册</a><?php endif; ?>
    <span></span>
    <a class="gray6" href="<?php echo U('Mobile/Feedback/index');?>">用户反馈</a>
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
</body>
<script type="text/javascript" src="/Public/Mobile/js/zip.touch.member2_0._all_.v36.js"></script>
<script type="text/javascript" src="/Public/Mobile/js/jweixin-1.0.0.js"></script>
</html>