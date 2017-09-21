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
    <style>
        table.tablelist tr td{

            border: dotted 1px #c7c7c7;
        }
    </style>
</head>

<body>

<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">权限管理</a></li>
        <li><a href="#">管理组列表</a></li>
    </ul>
</div>

<div class="formbody">
    <div id="usual1" class="usual">
        <div id="tab2" class="tabson">
           <form action="<?php echo U('allocateRule');?>" method="post" id="form1">
               <input type="hidden" name='id' value="<?php echo ($_GET['gid']); ?>"/>
            <table class="tablelist" border="1" style="padding: 5px;border:1px solid #ccc;">
                <thead>
                <tr>
                    <th colspan="2">为<?php echo ($_GET['name']); ?>分配权限</th>
                </tr>
                </thead>
                <tbody style="padding: 5px;border:1px solid #ccc;">
                 <?php if(is_array($ruleList)): $i = 0; $__LIST__ = $ruleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><tr class="chkList">
                        <td width="10%">
                            <label for="<?php echo ($v1["id"]); ?>"><?php echo ($v1["title"]); ?>
                                <input id="<?php echo ($v1["id"]); ?>" type="checkbox" value="<?php echo ($v1["id"]); ?>" name="rules[]" onclick="checkAll(this)"  <?php echo in_array($v1['id'],$groupInfo['rules'])?"checked":'';?> />
                            </label>
                        </td>
                        <td>
                          <?php if(!empty($v1["child"])): if(is_array($v1["child"])): $i = 0; $__LIST__ = $v1["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($i % 2 );++$i;?><table width="100%" cellpadding="20"   style="margin: 15px;">
                                    <tr class="chkList">
                                        <td width="10%">
                                            <label for="<?php echo ($v2["id"]); ?>"><?php echo ($v2["title"]); ?>
                                                <input id="<?php echo ($v2["id"]); ?>" type="checkbox" value="<?php echo ($v2["id"]); ?>" name="rules[]" onclick="checkAll(this)"  <?php echo in_array($v2['id'],$groupInfo['rules'])?"checked":'';?>  />
                                            </label>
                                        </td>
                                        <td >
                                            <?php if(!empty($v2["child"])): if(is_array($v2["child"])): $i = 0; $__LIST__ = $v2["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i;?><label for="<?php echo ($v3["id"]); ?>"><?php echo ($v3["title"]); ?>
                                                        <input id="<?php echo ($v3["id"]); ?>" type="checkbox" value="<?php echo ($v3["id"]); ?>" name="rules[]"  <?php echo in_array($v3['id'],$groupInfo['rules'])?"checked":'';?>  />
                                                    </label><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                        </td>
                                    </tr>
                                </table><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <tr>
                        <td></td>
                        <td  style="padding:15px;">
                            <input type="submit" value="确定分配" class="btn"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            </form>
        </div>
    </div>

</div>
</body>

<script type="text/javascript">

    function checkAll(obj){
        $(obj).parents('.chkList').eq(0).find("input[type='checkbox']").prop('checked', $(obj).prop('checked'));
    }
    $(function(){
        $('#form1').submit(function(){
            $.post("<?php echo U('allocateRule');?>",$(this).serialize(),function(res){
                if(res.status==1){
                    layer.msg(res.info, {icon:1}, function(){
                        location.href=res.url;
                    });
                }else{
                    layer.msg(res.info,{icon:5});
                }
            })
            return false;
        })
    })

</script>

</html>