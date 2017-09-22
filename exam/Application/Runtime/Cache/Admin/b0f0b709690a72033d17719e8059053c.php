<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台首页</title>
    <link href="/test/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/test/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript" src="/test/Public/Admin/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript">
        $(function(){
            $('.tablelist tbody tr:even').addClass('odd');
        })
    </script>
    <style>
        .ratio1{float: left;height: 16px;margin-left: 10px;margin-top: 10px;background: #71B565;}
        .ratio2{float: left;height: 16px;margin-top: 10px;background: #DADADA;}
        .ratio3{float: left;height: 16px;margin-left: 10px;margin-top: 10px;background: #ef5b00;}
        .ratio4{float: left;height: 16px;margin-top: 10px;background: #ef5b00;}
    </style>
</head>
<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
    </ul>
</div>

<div class="mainindex">

    <?php if(is_array($userInfo)): $i = 0; $__LIST__ = $userInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="welinfo">
            <span><img src="/test/Public/Admin/images/sun.png" alt="天气" /></span>
            <b><?php echo ($val["username"]); ?>  早上好，欢迎使用后台管理系统</b>
        </div>

        <div class="welinfo">
            <span><img src="/test/Public/Admin/images/time.png" alt="时间" /></span>
            <i>您上次登录的时间：<?php echo date('Y-m-d H:i:s',$val['lastlogin']);?></i> <i>您上次登录IP：<?php echo ($val["lastip"]); ?></i> 如非本人操作，请及时更改密码
        </div><?php endforeach; endif; else: echo "" ;endif; ?>

    <!--<ul class="iconlist">
    <li><img src="/test/Public/Admin/images/ico01.png" /><p><a href="#">管理设置</a></p></li>
    <li><img src="/test/Public/Admin/images/ico02.png" /><p><a href="#">发布文章</a></p></li>
    <li><img src="/test/Public/Admin/images/ico03.png" /><p><a href="#">数据统计</a></p></li>
    <li><img src="/test/Public/Admin/images/ico04.png" /><p><a href="#">文件上传</a></p></li>
    <li><img src="/test/Public/Admin/images/ico05.png" /><p><a href="#">目录管理</a></p></li>
    <li><img src="/test/Public/Admin/images/ico06.png" /><p><a href="#">查询</a></p></li>
    </ul>


    <div class="xline"></div> -->

    <!--<div class="box"></div>

    <div class="welinfo">
        <span><img src="/test/Public/Admin/images/dp.png" alt="提醒" /></span>
        <b>服务器信息</b>
    </div>

    <ul class="infolist">
    <li><span>服务器软件：</span></li>
    <li><span>开发语言：</span></li>
    <li><span>数据库:</span></li>
    </ul>

    <div class="xline"></div>

    <div class="uimakerinfo"><b>版权所有：易购网</b>(<a href="http://www.egoods.com" target="_blank">www.egoods.com</a>)</div>-->

    <div class="xline"></div>

    <div class="box"></div>
    <div class="welinfo">
        <span><img src="/test/Public/Admin/images/icon10.png" alt="提醒" /></span>
        <b>商品销售信息</b>
    </div>
    <div id="main" style="width: 100%;height:400px;"></div>


    <div class="welinfo">
        <span><img src="/test/Public/Admin/images/ico03.png" alt="提醒" /></span>
        <b>商品销量信息</b>
    </div>
    <table class="tablelist">
        <tr>
            <th width="5%">编号</th>
            <th width="35%">商品名称</th>
            <th width="20%">商品销量</th>
            <th width="40%">商品销售率</th>
        </tr>
        <?php if(is_array($goodsList1)): $k = 0; $__LIST__ = $goodsList1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($k % 2 );++$k;?><tr>
                <td><?php echo ($k); ?></td>
                <td><?php echo ($v1["goodsname"]); ?></td>
                <td><?php echo ($v1["salenum"]); ?></td>
                <td>
                    <div class="ratio1" style="width: <?php echo ($v1['salenum']/($v1['salenum']+$v1['num'])*400); ?>px"></div>
                    <?php if($v1['salenum']/($v1['salenum']+$v1['num'])*100 < 50): ?><div class="ratio2" style="width: <?php echo -$v1['salenum']/($v1['salenum']+$v1['num'])*400+400;?>px"></div>
                        <?php else: ?>
                        <div class="ratio4" style="width: <?php echo -$v1['salenum']/($v1['salenum']+$v1['num'])*400+400;?>px"></div><?php endif; ?>
                    <?php echo (round($v1['salenum']/($v1['salenum']+$v1['num'])*100,2)); ?>%
                </td>
                <!--<td>
                    <div class="ratio1" style="width: <?php echo ($v1['salenum']/($v1['salenum']+$v1['num'])*400); ?>px"></div>
                    <div class="ratio2" style="width: <?php echo -$v1['salenum']/($v1['salenum']+$v1['num'])*400+400;?>px"></div>
                    <?php echo (round($v1['salenum']/($v1['salenum']+$v1['num'])*100,2)); ?>%
                </td>-->
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>


    <div class="box"></div>
    <div class="welinfo">
        <span><img src="/test/Public/Admin/images/dingdan.png" alt="提醒" /></span>
        <b>商品库存量信息</b>
    </div>
    <table class="tablelist">
        <thead>
        <tr>
            <th width="5%">编号</th>
            <th width="35%">商品名称</th>
            <th width="20%">商品库存量</th>
            <th width="40%">商品库存率</th>
        </tr>
        </thead>
        <?php if(is_array($goodsList2)): $k = 0; $__LIST__ = $goodsList2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($k % 2 );++$k;?><tbody>
            <tr>
                <td><?php echo ($k); ?></td>
                <td><?php echo ($v2["goodsname"]); ?></td>
                <td><?php echo ($v2["num"]); ?></td>
                <td>
                    <?php if($v2['num']/($v2['salenum']+$v2['num'])*100 > 50): ?><div class="ratio1" style="width: <?php echo ($v2['num']/($v2['salenum']+$v2['num'])*400); ?>px"></div>
                        <?php else: ?>
                        <div class="ratio3" style="width: <?php echo ($v2['num']/($v2['salenum']+$v2['num'])*400); ?>px"></div><?php endif; ?>
                    <div class="ratio2" style="width: <?php echo -$v2['num']/($v2['salenum']+$v2['num'])*400+400;?>px"></div>
                    <?php echo (round($v2['num']/($v2['salenum']+$v2['num'])*100,2)); ?>%
                </td>
                <!--<td>
                    <div class="ratio1" style="width: <?php echo ($v2['num']/($v2['salenum']+$v2['num'])*400); ?>px"></div>
                    <div class="ratio2" style="width: <?php echo -$v2['num']/($v2['salenum']+$v2['num'])*400+400;?>px"></div>
                    <?php echo (round($v2['num']/($v2['salenum']+$v2['num'])*100,2)); ?>%
                </td>-->
            </tr>
            </tbody><?php endforeach; endif; else: echo "" ;endif; ?>

    </table>

</div>
</body>
<script type="text/javascript" src="/test/Public/Admin/js/echarts.min.js"></script>
<script type="text/javascript">
    // 基于准备好的dom，初始化echarts实例
    var myChart = echarts.init(document.getElementById('main'));

    // 指定图表的配置项和数据
    /* var option = {
     title: {
     text: '商品销量TOP10'
     },
     tooltip: {},
     legend: {
     data:['销量']
     },
     xAxis: {
     data: []
     },
     yAxis: {},
     series: [{
     name: '销量',
     type: 'line',
     data: []
     }]
     };*/

    var option = {
        title : {
            text: '商品销量Top10',
            //subtext: '销量Top10',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient : 'vertical',
            x : 'left',
            data:['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']
        },
        toolbox: {
            show : true,
            feature : {
                mark : {show: true},
                dataView : {show: true, readOnly: false},
                magicType : {
                    show: true,
                    type: ['pie', 'funnel'],
                    option: {
                        funnel: {
                            x: '25%',
                            width: '50%',
                            funnelAlign: 'left',
                            max: 1548
                        }
                    }
                },
                restore : {show: true},
                saveAsImage : {show: true}
            }
        },
        calculable : true,
        series : [
            {
                name:'访问来源',
                type:'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:335, name:'直接访问'},
                    {value:310, name:'邮件营销'},
                    {value:234, name:'联盟广告'},
                    {value:135, name:'视频广告'},
                    {value:1548, name:'搜索引擎'}
                ]
            }
        ]
    };

    // 异步加载数据
    /*  $.get('<?php echo U("getGoodsTop");?>').done(function (data) {
     // 填入数据
     myChart.setOption({
     xAxis: {
     data: data.info.x
     },
     series: [{
     // 根据名字对应到相应的系列
     name: '销量1',
     data: data.info.y
     }]
     });
     });*/

    $.get('<?php echo U("getGoodsTop");?>').done(function (data) {
        // 填入数据
        myChart.setOption({
            legend: {
                orient : 'vertical',
                x : 'left',
                data:data.info.x
            },
            series : [
                {
                    name:'访问来源',
                    type:'pie',
                    radius : '55%',
                    center: ['50%', '60%'],
                    data:data.info.y
                }
            ]
        });
    });

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
</html>