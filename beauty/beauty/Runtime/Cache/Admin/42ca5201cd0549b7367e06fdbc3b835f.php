<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
<link href="/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/Admin/js/jquery.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/Public/Admin/editor/kindeditor.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.min.1.8.2.js"></script>
<script type="text/javascript" src="/Public/Admin/js/layer/layer.js"></script>
    <script src="/Public/Admin/js/layer/layer.js"></script>

    <script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
  
<!--<script type="text/javascript">
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
</script>-->
    <style>
        #page a,#page span{display: inline-block;width:18px;height:18px;padding: 5px;
            margin: 2px;text-decoration: none;text-align: center;line-height: 18px;
            background: #f0ead8;color:#000000;border: 1px solid #c2d2d7;
        }
        #page a:hover{background:#F27602;color:#FF0000;}
        #page span{background:#F27602;color:#FF0000;font-weight: bold;}
        #page{float: right;}
        .message,.blue{font-size: 15px  }
        .btn1,.btn2,.btn3{width: 100px;height: 25px;border-radius: 6px;background-color: #F5F5F5;float: left;
            text-align: center;line-height: 25px;font-size: 14px;margin:15px 15px 20px 20px;cursor: pointer;border: 1px solid #333333;
        }
        #mail{height: 30px;line-height: 30px;margin: 10px 20px 0;}
        #mail b{font-size: 15px}
        #mail p,#mail span{display: inline-block;font-size: 14px}
        #mail span{color: #A3E356;}
        .read{cursor: pointer}
    </style>

    <script>

        $(function(){
            $('#form').submit(function(){
                var check=$("input:checked").val();
                if(!check){
                    layer.msg('您还没有选择要操作的信息哦',{time:2000,icon:2});
                    return false;
                }
            });

            $('.btn1').click(function(){
                $(this).css({background:'#FF7534',color:'#683B69'});
                $('#form').submit();
                $.post("<?php echo U('Message/delMessage');?>", $('#form').serialize(), function (res) {
                    if (res.status == 1) {
                       layer.msg(res.info,{icon:6,time:2000},function(){
                           location="<?php echo U('Message/index');?>";
                        });
                    } else {
                        layer.msg(res.info,{icon:5,time:2000},function(){
                            location="<?php echo U('Message/index');?>";
                        });
                    }
                }, 'json')
            })
            $('.btn2').click(function(){
                $(this).css({background:'#FF7534',color:'#683B69'});
                $('#form').submit();
                $.post("<?php echo U('Message/packMessage');?>", $('#form').serialize(), function (res) {
                    if (res.status == 1) {
                        layer.msg(res.info,{icon:6,time:2000},function(){
                            location="<?php echo U('Message/index');?>";
                        });
                    } else {
                        layer.msg(res.info,{icon:5,time:2000},function(){
                            location="<?php echo U('Message/index');?>";
                        });
                    }
                }, 'json')
            })
            $('.btn3').click(function(){
                $(this).css({background:'#FF7534',color:'#683B69'});
                $('#form').submit();
                $.post("<?php echo U('Message/readMessage');?>", $('#form').serialize(), function (res) {
                    if (res.status == 1) {
                        layer.msg(res.info,{icon:6,time:2000},function(){
                            location="<?php echo U('Message/index');?>";
                        });
                    } else {
                        layer.msg(res.info,{icon:5,time:2000},function(){
                            location="<?php echo U('Message/index');?>"
                        });
                    }
                }, 'json')
            })
        })
    </script>

</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
        <li><a href="#">首页</a></li>
        <li><a href="#">信息管理</a></li>
        <li><a href="#">我的站内信</a></li>

    </ul>
    </div>
    <form id="form">
    <div id="mail"><b>收件箱 </b><p> (共 <?php echo ($count); ?> 封，其中 <span>未读邮件</span> <?php echo ($count1); ?> 封)</p></div>
    <div><div class="btn1">删除</div><div class="btn2">彻底删除</div><div class="btn3">标为已读</div></div>
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
  
     
  	<div id="tab2" class="tabson">

    <table class="tablelist">
    	<thead>
    	<tr>
        <th><input name="checkAll" type="checkbox" value="" id="checkAll" /></th>
        <th>编号</th>
        <th>发件人</th>
        <th>主题</th>
        <th>内容</th>
        <th>时间</th>
        </tr>
        </thead>

        <tbody>
        <?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($k % 2 );++$k; if($val["status"] == 1): ?><tr style="font-weight: bold">
                    <td><input name="checkbox[]" type="checkbox" class="che" value="<?php echo ($val["id"]); ?>"></td>
                    <td><?php echo ($k+$firstRow); ?></td>
                    <td><?php echo ($val["username"]); ?></td>
                    <td class="read"><a href="<?php echo U('Message/messageContent',array('id'=>$val['id']));?>"><?php echo ($val["title"]); ?></a></td>
                    <td class="read"><a href="<?php echo U('Message/messageContent',array('id'=>$val['id']));?>"><?php echo ($val["content"]); ?></a></td>
                    <td><?php echo date('Y-m-d H:i:s',$val['time']);?></td>
                </tr>
                <?php else: ?>
                <tr>
                    <td><input name="checkbox[]" type="checkbox" class="che" value="<?php echo ($val["id"]); ?>"></td>
                    <td><?php echo ($k+$firstRow); ?></td>
                    <td><?php echo ($val["username"]); ?></td>
                    <td class="read"><a href="<?php echo U('Message/messageContent',array('id'=>$val['id']));?>"><?php echo ($val["title"]); ?></a></td>
                    <td class="read"><a href="<?php echo U('Message/messageContent',array('id'=>$val['id']));?>"><?php echo ($val["content"]); ?></a></td>
                    <td><?php echo date('Y-m-d H:i:s',$val['time']);?></td>
                </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
        <div class="pagin">
            <div class="message">共<i class="blue"> <?php echo ($count); ?> </i>条记录，当前显示第&nbsp;<i class="blue"><?php echo ($curPage); ?>&nbsp;</i>页</div>
            <div id="page"><?php echo ($page); ?></div>
        </div>
  
    </div>
    </div>  
       
	</div>
    </form>

    <script type="text/javascript">
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>

</body>
</html>
<script type="text/javascript">
    $(function(){
        $('#checkAll').toggle(
                function(){$('input[type="checkbox"]').attr('checked','checked')},
                function(){$('input[type="checkbox"]').removeAttr('checked')}
        )
        /*$('#checkAll').click(function(){
            $('#checkAll').toggle(
                    function(){$('input[type="checkbox"]').attr('checked','checked')},
                    function(){$('input[type="checkbox"]').removeAttr('checked')}
            )
        })*/
    })
</script>