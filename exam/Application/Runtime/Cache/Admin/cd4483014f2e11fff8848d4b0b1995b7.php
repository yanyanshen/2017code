<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>客服销售考试信息列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>

    <style type="text/css">
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
            color:#000000;
            border: 1px solid #c2d2d7;
        }
        #page a:hover{
            background:#F27602;
            color:#FF0000;
        }
        #page span{
            background:#F27602;
            color:#FF0000;
            font-weight: bold;
        }
        #page{
            float: right
        }


    </style>

    <script type="text/javascript">
        KE.show({
            id : 'content7',
            cssPath : './index.css'
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(e) {
            $(".select1").uedSelect({
                width : 345
            });
            $(".select2").uedSelect({
                width : 167
            });
            $(".select3").uedSelect({
                width : 100
            });
        });
    </script>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">系统设置</a></li>
    </ul>
</div>

<div class="formbody">


    <div id="usual1" class="usual">



        <div id="tab2" class="tabson">

            <form action="<?php echo U('Pay/Member/index');?>" method="get" class="form">
                <ul class="seachform">
                    <li><label>综合查询</label><input name="keywords" value="<?php echo ($keywords); ?>" type="text" class="scinput" placeholder="请输入应聘者姓名" /></li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                </ul>
            </form>

            <table class="tablelist">
                <thead>
                <tr>
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>应聘者姓名</th>
                    <th>tel</th>
                    <th>考试时间</th>
                    <th>选择题分数</th>
                    <th>简答题分数</th>
                    <th>总分</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($arr)): $k = 0; $__LIST__ = $arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                        <td><?php echo ($k+$firstRows); ?></td>
                        <td><?php echo ($val["name"]); ?></td>
                        <td><?php echo ($val["tel"]); ?> </td>
                        <td><?php echo (date('Y-m-d',$val["time"])); ?> </td>
                        <td>
                            <?php echo ($val["score"]); ?>
                            <a href="<?php echo U('Pay/Member/test_detail',array('userid'=>$val['id']));?>" style="color:#088017">点击查看详情</a>
                        </td>
                        <td>
                            <?php if($val["correct_papers"] == 1): echo ($val["score_short"]); ?>&nbsp;&nbsp;
                                <a href="<?php echo U('Pay/Member/short_list',array('id'=>$val['id']));?>" style="color:#088017">点击查看详情</a>
                                <?php elseif($val["memberorder"] == 0): ?>
                                <a href="<?php echo U('Pay/Member/short_list',array('id'=>$val['id']));?>" style="color:#088017">前去批改</a><?php endif; ?>
                        </td>
                        <td>
                            <?php if($val["correct_papers"] == 1): echo ($val["total_score"]); ?>
                                <?php elseif($val["memberorder"] == 0): ?> 还未合计<?php endif; ?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>

            <div class="pagin">
                <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($nowPage); ?>&nbsp;</i>页</div>
                <div id="page"><?php echo ($Page); ?></div>
            </div>


        </div>

    </div>

    <script type="text/javascript">
        $("#usual1 ul").idTabs();
    </script>

    <script type="text/javascript">
        $('.tablelist tbody tr:odd').addClass('odd');
    </script>





</div>


</body>

</html>