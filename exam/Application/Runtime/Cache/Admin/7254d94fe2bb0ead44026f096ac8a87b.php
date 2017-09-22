<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>列表页</title>
    <link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
    <script src="/Public/Admin/js/layer/layer.js"></script>

    <script>
        $(function(){
            $('.del').click(function(){
                var id=$(this).attr('id');
                $.post("<?php echo U('AuthRule/del');?>",{id:id},function(res){
                    if(res.status==1){
                        layer.msg('删除成功',{icon:6,time:2000},function(){
                            location="<?php echo U('AuthRule/index');?>";
                        })
                    }else{
                        layer.msg('删除失败',{icon:5,time:2000},function(){
                            location="<?php echo U('AuthRule/index');?>";
                        })
                    }
                })
            })
        })
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
            <table class="tablelist">
                <thead>
                <tr>
                    <th>权限名称</th>
                    <th>权限规则</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($ruleList)): $i = 0; $__LIST__ = $ruleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo str_repeat('&nbsp;',12*($value['level']-1));?>|--<?php echo ($value["title"]); ?></td>
                        <td><?php echo ($value["name"]); ?></td>
                        <td>
                            <a href="<?php echo U('add',array('pid'=>$value['id'],'pname'=>$value['title']));?>" class="tablelink">添加子菜单</a> |
                            <a href="<?php echo U('edit',array('id'=>$value['id']));?>" class="tablelink">编辑</a> |
                            <!--<a href="<?php echo U('delete',array('id'=>$value['id']));?>" class="tablelink">删除</a>-->
                            <a href="#" class="tablelink del" id="<?php echo ($value['id']); ?>">删除</a>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>




        </div>

    </div>

</div>
</body>

<script type="text/javascript">
    $(function(){
        $("#usual1 ul").idTabs();
        $('.tablelist tbody tr:odd').addClass('odd');
    })

</script>
</html>