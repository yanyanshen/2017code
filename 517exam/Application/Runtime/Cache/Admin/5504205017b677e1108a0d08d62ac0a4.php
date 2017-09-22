<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="/test/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/test/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/test/Public/Admin/js/jQuery-1.8.2.min.js"></script>
<script type="text/javascript" src="/test/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/test/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/test/Public/Admin/js/layer/layer.js"></script>
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

        //添加三级联动;
        var getRule=function(pid,name){
            $.post('<?php echo U("Pay/AuthRule/getRuleByPid");?>',{pid:pid},function(res){
                if(res.status){
                    var str='<option value="0" selected>请选择</option>';
                    for(var i in res.info){
                        str+='<option value="'+res.info[i].id +'">' + res.info[i].title+ '</option>';
                    }
                    $('select[name="'+name+'"]').html(str);
                    $('select[name="'+name+'"]').parent().find(".uew-select-text").text($('select[name="'+name+'"]').find(':selected').text());
                }
            })
        };
        getRule(0,'firstRule');

        $('select[name="firstRule"]').change(function(){
            getRule($(this).find(':selected').val(),'secondRule');
            $(this).parents('.vocation').next('.vocation').show();
            $('select[name="thirdRule"]').empty().parents('.vocation').hide();
        });

        $('select[name="secondRule"]').change(function(){
            getRule($(this).val(),'thirdRule');
            $(this).parents('.vocation').next('.vocation').show();
        });

        //向分类表中添加分类
        $('.btn').click(function(){
            $('.btn').attr('disabled','disabled');
            $.post('<?php echo U("Pay/AuthRule/editRule");?>',$("#form1").serialize(),function(res){
             if(res.info=='编辑成功'){
                    layer.msg('编辑成功',{icon:6,time:2000},function(){
                        location='<?php echo U("AuthRule/index");?>'
                    });
                }if(res.info=='编辑失败'){
                    layer.msg('编辑失败',{icon:5,time:2000},function(){
                        location='<?php echo U("AuthRule/edit");?>'
                    });
                }
            })
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
        <div id="tab1" class="tabson">
            <form action="" method="post" id="form1">
                <ul class="forminfo">
                    <li><label>权限名称<b>*</b></label><input name="title" type="text" class="dfinput" value="<?php echo ($title); ?>"    style="width:240px;"/></li>
                    <li><label>权限规则<b>*</b></label><input name="name" type="text" class="dfinput" value="<?php echo ($name); ?>"    style="width:240px;"/></li>
                    <li><label>上级权限<b>*</b></label>
                        <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                        <div class="vocation">
                            <select class="select2" name="firstRule">
                            </select>
                        </div>
                        <div class="vocation" style="display:none">
                            <select class="select2" name="secondRule" >

                            </select>
                        </div>
                        <div class="vocation" style="display:none">
                            <select class="select2" name="thirdRule" >
                            </select>
                        </div>
                    </li>
                    <li><label>&nbsp;</label><input type="button" class="btn" value="马上编辑"/></li>
                </ul>
            </form>
        </div>
    </div>
</div>

</body>

</html>