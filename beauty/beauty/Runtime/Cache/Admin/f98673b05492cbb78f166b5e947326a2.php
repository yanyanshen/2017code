<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <style>
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
            background: #333;
            color:#fff;
        }

        #page span{
            background: #333;
            color: #fff;
            font-weight: bold;
        }
        #deleteFeed{cursor: pointer}
    </style>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script src="/Public/Home/js/jquery.min.1.8.2.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/time/abc/timer/WdatePicker.js"></script>
    <script src="/Public/Home/js/layer/layer.js" type="text/javascript"></script>

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

            <form action="<?php echo U('Pay/Feedback/index');?>" method="get" >
                <ul class="seachform">
                    <li>
                        <label>按发布时间：</label>
                        <input id="d11" type="text" name="time1" value="<?php echo (date('Y-m-d',$time1?$time1:'')); ?>"  onClick="WdatePicker()" style="width: 120px;height: 25px;border: 1px solid #cccccc;"/>
                        <span style="display: inline-block;">-</span>
                        <input class="Wdate" name="time2" value="<?php echo (date('Y-m-d',$time2?$time2:'')); ?>" type="text" id="d15" onFocus="WdatePicker({isShowClear:false,readOnly:true})" style="width: 120px;height: 25px;border: 1px solid #cccccc;"/>
                    </li>

                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                    <li><label>&nbsp;</label><input name="" type="reset" class="scbtn" value="重置"/></li>

                </ul>
            </form>

            <table class="tablelist" style="text-align: center;">
                <thead style="text-align: center;">
                <tr >
                    <th style="text-align: center;">反馈编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th style="text-align: center;">用户名</th>
                    <th style="text-align: center;">联系人</th>
                    <th style="text-align: center;">商品列表满意程度</th>
                    <th style="text-align: center;">快速留言方式</th>
                    <th style="text-align: center;">网站总体满意程度</th>
                    <th style="text-align: center;">对本站的服务</th>
                    <th style="text-align: center;">对本站的意见</th>
                    <th style="text-align: center;">用户电话</th>
                    <th style="text-align: center;">发布时间</th>
                    <th style="text-align: center;">操作</th>
                </tr>
                </thead>
                <tbody>
                <form action="" method="post" id="form1" >
                    <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k;?><tr>
                            <td><?php echo ($k+$firstRow); ?></td>
                            <td><?php echo ($val["mname"]); ?></td>
                            <td><?php echo ($val["connectname"]); ?></td>
                            <td><?php echo ($val["satis"]); ?></td>
                            <td><?php echo ($val["way"]); ?></td>
                            <td><?php echo ($val["total"]); ?></td>
                            <td><?php echo ($val["server"]); ?></td>
                            <td><?php echo (mb_substr($val["idea"],0,15,utf8)); ?>...</td>
                            <td><?php echo ($val["mobile"]); ?></td>
                            <td><?php echo (date('Y-m-d',$val["backtime"])); ?></td>
                            <td>
                                <a href="javascript:;" class="delete" id="<?php echo ($val['id']); ?>">删除</a>
                                <a href="<?php echo U('Feedback/see',array('id'=>$val['id']));?>">查看详情</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </form>
                </tbody>
            </table>
            <div class="pagin">
                <div class="message">共<i class="blue"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue">2&nbsp;</i>页</div>
                <ul class="paginList" id="page">
                    <?php echo ($page); ?>
                </ul>
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
<script>
    $(".delete").click(function(){
        id=$(this).attr('id');
        a=$(this);
        $.get("<?php echo U('Pay/Feedback/deleteFeed');?>",{id:id},function(res){
                if(res.status==1){
                    layer.msg('删除成功',{icon:1});
                    a.parents('tr').hide();
                }else{
                    layer.msg('删除失败',{icon:2});
                }
        })
    })
</script>
</html>