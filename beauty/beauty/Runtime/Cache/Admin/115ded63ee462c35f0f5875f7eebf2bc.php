<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>会员列表页</title>
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

            <form action="<?php echo U('Admin/User/Userlist');?>" method="get" class="form">
                <ul class="seachform">
                    <li><label>综合查询</label><input name="chaXun" type="text" class="scinput" placeholder="请输入用户名" /></li>
                    <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询"/></li>
                </ul>
            </form>
            <!-- <script type="text/javascript">
                 $(function(){
                     $('.scbtn').click(function(){
                         var text=$('.scinput').val();
                         $.get("<?php echo U('Brand/index');?>",'text='+text)

                     })

                 })


             </script>
             -->
            <table class="tablelist">
                <thead>
                <tr>
<!--
                    <th><input name="" type="checkbox" value="" checked="checked"/></th>
-->
                    <th>编号<i class="sort"><img src="/Public/Admin/images/px.gif" /></i></th>
                    <th>会员名称</th>
                    <th>注册时间</th>
                    <th>会员等级</th>
                    <th>消费金额</th>
                    <th>email</th>
                    <th>当前积分</th>
                    <th>最后登录时间</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($UserInfo)): $i = 0; $__LIST__ = $UserInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($val["id"]); ?></td>
                        <td><?php echo ($val["username"]); ?></td>
                        <td><?php echo (date('Y-m-d H:i',$val["regtime"])); ?></td>
                        <td>
                            <?php if($val["memberorder"] == 1): ?>普通会员
                            <?php elseif($val["memberorder"] == 2): ?> 高级会员
                                <?php else: ?> 黄金会员<?php endif; ?>
                        </td>
                        <td><?php echo ($val["monetary"]); ?></td>
                        <td><?php echo ($val["email"]); ?></td>
                        <td><?php echo ($val["score"]); ?></td>
                        <td><?php echo (date('Y-m-d H:i',$val["lastlogin"])); ?></td>
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