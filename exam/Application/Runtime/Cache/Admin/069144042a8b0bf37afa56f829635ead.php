<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>列表页</title>
<link href="/test/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/test/Public/Admin/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/test/Public/Admin/js/jquery.min.1.8.2.js"></script>
<script type="text/javascript" src="/test/Public/Admin/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="/test/Public/Admin/js/select-ui.min.js"></script>
<script type="text/javascript" src="/test/Public/Admin/js/kindeditor/kindeditor-all.js"></script>
<script type="text/javascript" src="/test/Public/Admin/js/time/abc/timer/WdatePicker.js"></script>
    <script type="text/javascript" src="/test/Public/Admin/js/layer/layer.js"></script>
    <style type="text/css">
        .paginList a, .paginList span{display: inline-block;width:18px;height:18px ;padding: 5px;margin: 2px;text-decoration: none;text-align: center;line-height: 18px;background: #cccccc;  color:#000000;  border: 1px solid #c2d2d7;  }
        .paginList a:hover{background: mediumblue;color:#fff;  }
        .paginList span{background: mediumblue;color: #fff;font-weight: bold;}
    </style>
<script type="text/javascript">
    $(document).ready(function(e) {
        KindEditor.ready(function (K) {
            K.create('#content7', {
                allowFileManager: true,
                afterBlur: function () {  //利用该方法处理当富文本编辑框失焦之后，立即同步数据
                    this.sync("#content7");
                }
            });
        });
    })
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
    <li><a href="#">商品管理</a></li>
    <li><a href="#">商品列表</a></li>
    </ul>
    </div>
    <div class="formbody">
        <div id="usual1" class="usual">
            <div id="tab2" class="tabson">
<form action="<?php echo U('Pay/Goods/search');?>" method="get" id="form1">
    <ul class="seachform">
        <li><label>试卷问题</label><input name="qname" type="text" class="scinput" value="<?php echo ($qname); ?>" style="width: 60px;height: 25px;"/></li>
        <li><label>试题类型</label><input name="type" type="text" class="scinput" value="<?php echo ($type); ?>" style="width: 60px;height: 25px;"/></li>
        <li>
            <label>发布时间：</label>
            <input id="d11" type="text" onClick="WdatePicker()" style="width: 80px;height:25px;border: 1px solid #cccccc;" name="time1" value="<?php echo ($time1); ?>"/>
            <span style="display: inline-block;">-</span>
            <input name="time2" class="Wdate" type="text" id="d15" onFocus="WdatePicker({isShowClear:false,readOnly:true})" style="width: 80px;height: 25px;border: 1px solid #cccccc;" value="<?php echo ($time2); ?>"/>
        </li>
        <li><label>&nbsp;</label><input name="" type="submit" class="scbtn" value="查询" style="width: 60px;height: 25px;"/></li>
        <li><label>&nbsp;</label>
            <input name="" type="button" class="scbtn" id="exportdata" value="Excel表导出" style="width: 90px;height: 25px;margin:0;padding: 0;"/>
        </li>
        <li><label>&nbsp;</label>
            <a href="<?php echo U('Pay/Test/testlistshow');?>">
                <input name="" type="button" class="scbtn"  value="Excel表导入" style="width: 90px;height: 25px;margin:0;padding: 0;"/>
            </a>
        </li>
    </ul>
    </form>
    <table class="tablelist">
    	<thead>
    	<tr>
        <th style="font-size: 10px;">编号<i class="sort"><img src="/test/Public/Admin/images/px.gif" /></i></th>
        <th style="font-size: 10px;">问题图片</th>
        <th style="font-size: 10px;">试卷问题</th>
        <th style="font-size: 10px;">选项A</th>
        <th style="font-size: 10px;">选项B</th>
        <th style="font-size: 10px;">选项C</th>
        <th style="font-size: 10px;">选项D</th>
        <th style="font-size: 10px;">正确答案</th>
        <th style="font-size: 10px;">发布时间</th>
        <th style="font-size: 10px;">是否展示</th>
        <th style="font-size: 10px;">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($res)): $k = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "$empty" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k;?><tr>
        <td style="font-size: 10px;"><?php echo ($k+$firstRow); ?></td>
            <?php if($data['ifImg'] == 1): ?><td><img src="/Uploads/TestPic/{data.picurl}100_{data.picname}" alt="" width="50" height="50"/></td>
                </else>
                <td>此问题无图片</td><?php endif; ?>
        <td style="font-size: 10px;"><?php echo mb_substr($data['question'],0,10,'utf-8');?>...</td>
        <td style="font-size: 10px;"><?php echo ($data["A"]); ?></td>
        <td style="font-size: 10px;"><?php echo ($data["B"]); ?></td>
        <td style="font-size: 10px;"><?php echo ($data["C"]); ?></td>
        <td style="font-size: 10px;"><?php echo ($data["D"]); ?></td>
        <td style="font-size: 10px;"><?php echo ($data["right_answer"]); ?></td>
        <td style="font-size: 10px;"><?php echo date('Y-m-d H:i:s',$data['create_timetime']);?></td>
        <td style="font-size: 10px;" class="zhuangtai"><?php echo ($data['status']==1?'展示':'取消'); ?></td>
        <td style="font-size: 10px;" class="par">
            <a href="<?php echo U('Pay/Goods/editor',array('tid'=>$data['test_id']));?>" class="tablelink">编辑&nbsp;&nbsp;&nbsp;&nbsp;</a>
            <a tid="<?php echo ($data['id']); ?>" class="tablelink updashow" style="cursor: pointer;"><?php echo ($data['status']==1?'取消':'展示'); ?></a></td>
        </tr><?php endforeach; endif; else: echo "$empty" ;endif; ?>
        </tbody>
    </table>
       <div class="pagin">
        <div class="message">共<i class="blue" name="count"><?php echo ($count); ?></i>条记录，当前显示第&nbsp;<i class="blue current">&nbsp;<?php echo ($current); ?></i>页</div>
      <div class="paginList">
          <?php echo ($page); ?>
      </div>
    </div>
    </div>
	</div>
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
        $(function(){
            $('.updashow').click(function(){
                gid=$(this).attr('gid');
                cur=$(this);
                $.post("<?php echo U('Pay/Goods/updateshow');?>",{gid:gid},function(response){
                    if(response.status){
                        if(response.info==1){
                            cur.text('下架');
                            cur.parents('.par').prev('.zhuangtai').text('展示');
                        }if(response.info==0){
                            cur.text('展示');
                            cur.parents('.par').prev('.zhuangtai').text('下架');
                        }
                    }
                })
            })
        })
	</script>
    </div>


</body>

</html>
<script type="text/javascript">
    $(function(){
        $("#exportdata").click(function(){
            $.post("<?php echo U('Goods/export');?>?goodsname=<?php echo ($goodsname); ?>&bname=<?php echo ($bname); ?>&cname=<?php echo ($cname); ?>&time1=<?php echo ($time1); ?>&time2=<?php echo ($time2); ?>&price1=<?php echo ($price1); ?>&price2=<?php echo ($price2); ?>",'',function(res){
                if(res.status==1){
                    window.open("<?php echo U('Goods/export');?>?goodsname=<?php echo ($goodsname); ?>&bname=<?php echo ($bname); ?>&cname=<?php echo ($cname); ?>&time1=<?php echo ($time1); ?>&time2=<?php echo ($time2); ?>&price1=<?php echo ($price1); ?>&price2=<?php echo ($price2); ?>");
                }else{
                    layer.msg(res.info,{icon:5});
                }
            })
        })
    })
</script>