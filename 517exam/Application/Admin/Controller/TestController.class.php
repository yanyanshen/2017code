<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Upload;
use Think\Image;
use Think\Page;
class TestController extends BgController{
    public function addtestshow(){ //试题增加页面展示
        $this->test_category();//试题的分类
        $this->display('addtest1');
    }

    public function editorTest(){

        $id=$_GET['tid'];
        $type=$_GET['type'];
        $ifImg=$_GET['ifImg'];
        $res=$this->selectTble($id,$type,$ifImg);
        $this->test_category();
        $this->assign('data1',$res);
        $this->display('editorTest');
    }
//简答题编辑
    public function editorShortTest(){
        $id=$_GET['tid'];
        $type=$_GET['type'];
        $ifImg=$_GET['ifImg'];
        $res=$this->selectTble($id,$type,$ifImg);
        $this->test_category();
        $this->assign('data1',$res);
        $this->display('editorShortTest');
    }

    //编辑问题
    public function editorAddData()
    {
        $tid=$_POST['test_id'];
        if ($_POST['question'] == '') {
            $this->error('请填写问题');
        } elseif ($_POST['category'] == 0) {
            $this->error('请选择试题分类');
        }elseif($_POST['type']==0||$_POST['type']==1){
            if($_POST['right_answer'] == ''){
                $this->error('请填写正确答案');
            }
            if ($_POST['aname'] == '' || $_POST['bname'] == '' || $_POST['cname'] == '' || $_POST['dname'] == '') {
                $this->error('请将选项补充完成');
            }elseif($_POST['type']==0){
                $data['score']=3;
                $rname = preg_match('/^[a-dA-D]{1}+$/', $_POST['right_answer']);
                if (!$rname) {
                    $this->error('请在ABCD中选择一个答案');
                }
            }elseif($_POST['type']==1){
                $data['score']=4;
                $rname = preg_match('/^[a-dA-D]{2,4}+$/', $_POST['right_answer']);
                if (!$rname) {
                    $this->error('请在ABCD中至少选择2个答案');
                }
            }
        }elseif($_POST['type']==2){
            if($_POST['right_answer'] == ''){
                $this->error('请填写正确答案');
            }
        }

        $data['question']=$_POST['question'];
        $data['type']=$_POST['type'];
        $data['category']=$_POST['category'];
        $data['right_answer']=$_POST['right_answer'];
        $data['create_time']=time();
        if($_POST['type']==2){
            $res=M('testshort')
                ->where(array('id'=>$tid))
                ->field('question,type,category,right_answer')
                ->save($data);
        }else{
            $_data['A']=$_POST['aname'];
            $_data['B']=$_POST['bname'];
            $_data['C']=$_POST['cname'];
            $_data['D']=$_POST['dname'];
            $res=M('test')
                ->where(array('id'=>$tid))
                ->field('question,type,category,A,B,C,D,right_answer,score')
                ->save($data);
        }

        if($_POST['ifImg']==0){
            if($res){
                $this->success('更改成功');
            }else{
                $this->error('更改失败');
            }
        }else{
            $res1=$this->editorPic($_POST['pid'],$_POST['type']);
            if($res1){
                $this->success('更改成功');
            }else {
                $this->error('更改失败');

            }
        }

    }


    public function selectTble($id,$type,$ifImg){
        if($type==2){
            if($ifImg==1){
                $where['_string']="a.id=$id and a.category=b.id and type=$type and ifImg=$ifImg and p.test_id=a.id";
                $res=M('testshort')
                    ->table('exam_testshort a,exam_test_category b,exam_test_picshort p')
                    ->where($where)
                    ->field('a.id,a.ifImg,a.question,b.cname,a.right_answer,a.create_time,p.picurl,p.picname,p.id as pid,a.type')
                    ->find();
            }else{
                $where['_string']="a.id=$id and a.category=b.id and type=$type and ifImg=$ifImg";
                $res=M('testshort')
                    ->table('exam_testshort a,exam_test_category b,exam_test_picshort p')
                    ->field('a.ifImg,a.question,a.right_answer,a.id,a.type,b.cname,b.id as bid,a.type')
                    ->where($where)
                    ->find();
            }

        }else{

            if($ifImg==1){
                $where['_string']="a.id=$id and a.category=b.id and type=$type and ifImg=$ifImg and p.test_id=a.id";
                $res=M('test')
                    ->table('exam_test a,exam_test_category b,exam_test_pic p')
                    ->where($where)
                    ->field('a.id,a.ifImg,a.question,b.cname,a.A,a.B,a.C,a.D,a.right_answer,a.create_time,p.picurl,p.picname,p.id as pid,a.type')
                    ->find();
            }else{
                $where['_string']="a.id=$id and a.category=b.id and type=$type and ifImg=$ifImg ";
                $res=M('test')
                    ->table('exam_test a,exam_test_category b')
                    ->field('a.ifImg,a.A,a.B,a.C,a.D,a.question,a.right_answer,a.id,a.type,b.cname,b.id as bid,a.type')
                    ->where($where)
                    ->find();
            }
        }

        return $res;
    }

    public function testlistshow(){//试题列表页面展示
        $server='http://'.C('SERVER');
        $this->assign('server',$server);
        $category=D('test_category')->test_category();
        $this->assign('category',$category);
        $this->display('excel');
    }
    //上传excel表格
    public function import_excel(){ //试题增加页面展示
        if(empty($_FILES['excelname'])){//判断上传文件是否为空
            $this->error('null');
        }else{//文件不为空时
            $file=$_FILES['excelname'];
            $file_array=explode('.',$file['name']);
            $file_extension=$file_array[count($file_array)-1];//获取文件后缀名
            //判断是否是 excel文件
            if(strtolower($file_extension)!='xls'){
                $this->error('type');
            }
            //以时间来命名上传的文件

            //设置上传路径
            $Exceldest="./Uploads/Exceldest/file".date('Y-m-d',time());
            if(!file_exists($Exceldest)){
                mkdir("$Exceldest");
            }
            //把文件移到指定目录
            $tmp_name=$file['tmp_name'];
            $result=move_uploaded_file($tmp_name,$Exceldest.'/'.$file['name'].'_'.date('Y-m-d',time()));
            //判断文件是否上传成功
            if(!$result){
                $this->error('file_error');
            }
            /*上传成功后厚的excel的数据*/
            $data=ImportExcel($Exceldest.'/'.$file['name'].'_'.date('Y-m-d',time()));
            $data=array_slice($data,1);
            $result=D('test')->table_test_addData($data);
            $this->success(1);
        }
    }

    /**
     * 将多选的答案用逗号分开
     * @param  string $table1 表一
     * @param  string $table2 表二
     * @param  string $where 条件
     * @param  string $order 排序
     * @return $excelData       数组
     */

    //没有图片的单选
    public function one_list(){
        $count=M('test')
            ->table('exam_test a,exam_test_category b')
            ->where('a.category=b.id and ifImg=0 and type=0')
            ->count();
        $pageObj=new Page($count,12);
        $show=$pageObj->show();//显示分页
        $res=M('test')
            ->table('exam_test a,exam_test_category b')
            ->where('a.category=b.id and ifImg=0 and type=0')
            ->field('a.id,a.question,b.cname,a.A,a.B,a.C,a.D,a.right_answer,a.status,a.create_time,a.type,a.ifImg')
            ->order('create_time desc')
            ->limit($pageObj->firstRow.','.$pageObj->listRows)
            ->select();
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('res',$res);
        $this->display();
    }
//有图片的单选
    public function one_pic_list(){
        $count=M('test')
            ->table('exam_test a,exam_test_category b,exam_test_pic p')
            ->where('a.category=b.id and a.id=p.test_id and ifImg=1 and type=0')
            ->count();
        $pageObj=new Page($count,12);
        $show=$pageObj->show();//显示分页
        $res=M('test')
            ->table('exam_test a,exam_test_category b,exam_test_pic p')
            ->where('a.category=b.id and a.id=p.test_id and ifImg=1 and type=0')
            ->field('a.id,a.ifImg,a.question,b.cname,a.A,a.B,a.C,a.D,a.right_answer,a.status,a.create_time,p.picurl,p.picname,p.id as pid,a.type')
            ->order('a.create_time desc')
            ->limit($pageObj->firstRow.','.$pageObj->listRows)
            ->select();
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('res',$res);
        $this->display();
    }
//无图片的多选
    public function two_list(){
        $count=M('test')
            ->table('exam_test a,exam_test_category b')
            ->where('a.category=b.id and ifImg=0 and type=1')
            ->count();
        $pageObj=new Page($count,12);
        $show=$pageObj->show();//显示分页
        $res=M('test')
            ->table('exam_test a,exam_test_category b')
            ->where('a.category=b.id and ifImg=0 and type=1')
            ->field('a.id,a.ifImg,a.question,b.cname,a.A,a.B,a.C,a.D,a.right_answer,a.status,a.create_time,a.type')
            ->order('create_time desc')
            ->limit($pageObj->firstRow.','.$pageObj->listRows)
            ->select();
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('res',$res);
        $this->display();
    }
    //有图片的多选
    public function two_pic_list(){
        $count=M('test')
            ->table('exam_test a,exam_test_category b,exam_test_pic p')
            ->where('a.category=b.id and a.id=p.test_id and ifImg=1 and type=1')
            ->count();
        $pageObj=new Page($count,12);
        $show=$pageObj->show();//显示分页
        $res=M('test')
            ->table('exam_test a,exam_test_category b,exam_test_pic p')
            ->where('a.category=b.id and a.id=p.test_id and ifImg=1 and type=1')
            ->field('a.id,a.ifImg,a.question,a.type,b.cname,a.A,a.B,a.C,a.D,a.right_answer,a.status,a.create_time,p.picurl,p.picname,p.id as pid')
            ->order('a.create_time desc')
            ->limit($pageObj->firstRow.','.$pageObj->listRows)
            ->select();
        $server='http://'.C('SERVER');
        $this->assign('server',$server);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('res',$res);
        $this->display();
    }

    //没有图片的简答题
    public function short_list(){
        $count=M('testshort')
            ->table('exam_testshort a,exam_test_category b')
            ->where('a.category=b.id and ifImg=0')
            ->count();
        $pageObj=new Page($count,12);
        $show=$pageObj->show();//显示分页
        $res=M('testshort')
            ->table('exam_testshort a,exam_test_category b')
            ->where('a.category=b.id and ifImg=0')
            ->field('a.id,a.ifImg,a.question,b.cname,a.right_answer,a.status,a.create_time,a.type')
            ->order('create_time desc')
            ->limit($pageObj->firstRow.','.$pageObj->listRows)
            ->select();
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('res',$res);
        $this->display();
    }
    //有图片的简答题
    public function short_pic_list(){
        $count=M('testshort')
            ->table('exam_testshort a,exam_test_category b,exam_test_picshort p')
            ->where('a.category=b.id and a.id=p.test_id and ifImg=1')
            ->count();
        $pageObj=new Page($count,12);
        $show=$pageObj->show();//显示分页
        $res=M('testshort')
            ->table('exam_testshort a,exam_test_category b,exam_test_picshort p')
            ->where('a.category=b.id and a.id=p.test_id and ifImg=1')
            ->field('a.id,a.ifImg,a.question,b.cname,a.right_answer,a.status,a.create_time,p.picurl,p.picname,p.id as pid,a.type')
            ->order('a.create_time desc')
            ->limit($pageObj->firstRow.','.$pageObj->listRows)
            ->select();
        $server='http://'.C('SERVER');
        $this->assign('server',$server);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('res',$res);
        $this->display();
    }
    //试题是否展示
    public function updateshow(){
        $type=$_POST['type'];
        $tid=$_POST['tid'];
        if($type==2){
            $table='testshort';
        }else{
            $table='test';
        }
        $info=M($table)->where(array('id'=>$tid))->find();
        if($info['status']==1){
            $data['status']=0;
        }else{
            $data['status']=1;
        }
        $res=M($table)->where(array('id'=>$tid))->save($data);
        if($res){
            $this->success('更改成功');
        }else{
            $this->error('更改失败');
        }
    }

    public function test_category(){
        $test_category=D('test_category')->test_category();
        $this->assign('test_category',$test_category);
    }

    //添加问题
    public function test_add()
    {
        $where['question'] = $_POST['qname'];
//判断问题和试题分类是否为空
        if ($_POST['qname'] == '') {
            $this->error('请填写问题');
        } elseif ($_POST['category_id'] == 0) {
            $this->error('请选择试题分类');
        }
//答案和选项是否为空  问题是否已经存在
        if ($_POST['firstCate'] == 2) {
            if (strlen($_POST['textarea'])==''){
                $this->error(strlen($_POST['textarea']));
            }

            $res = D('Testshort')->Testshort($where);

            if ($res) {
                $this->error('此问题已存在，请重新添加');
            }

        }else {
            if ($_POST['aname'] == '' || $_POST['bname'] == '' || $_POST['cname'] == '' || $_POST['dname'] == '') {
                $this->error('请将选项补充完成');
            } elseif ($_POST['rname'] == '') {
                $this->error('请填写正确答案');
            }

            $res = D('test')->findDate($where);
            if ($res) {
                $this->error('此问题已存在，请重新添加');
            }


        }

        if ($_POST['firstCate'] == 0) {
            $rname = preg_match('/^[a-dA-D]{1}+$/', $_POST['rname']);
            if (!$rname) {
                $this->error('请在ABCD中选择一个答案');
            }
        }

        if ($_POST['firstCate'] == 1) {
            $rname = preg_match('/^[a-dA-D]{2,4}+$/', $_POST['rname']);
            if (!$rname) {
                $this->error('请在ABCD中至少选择2个答案');
            }
        }

        if ($_POST['qimg'] == 'qimg') {
            if ($_FILES['image'] == '') {
                $this->error('你还没有上传图片');
            }
            $_POST['ifImg']=1;
            $_POST['Imgurl']=1;
        }else{
            $_POST['ifImg']=0;
            $_POST['Imgurl']=0;
        }
        $res= $this->test_addData($_POST);
        if($res) {
            $this->success('添加成功');
        }
    }


//分割字符串
    /**
     * 将多选的答案用逗号分开
     * @param  string $str 字符串
     * @param  string $count 从第几个开始
     * @param  string $number 取几个
     * @return $excelData       数组
     */
    public function getStr($str,$count=0,$number=1,$type=-1){
        $str1='';
        for($i=0;$i<strlen($str);$i++){
            $str1.=substr($str,$i,$number).',';
        }
        $str1=substr($str1,$count,$type);

        return $str1;
    }

    /**
     * 单选题、多选题添加
     * @param  string $type 添加类型
     * @param  string $encode 编码
     * @return $excelData       数组
     */

    public function test_addData($data){
        $type=$data['firstCate'];
        $adddata['type']=$type;
        $adddata['status']=1;
        $adddata['question']=htmlspecialchars($data['qname']);
        $adddata['category']=$data['category_id'];
        $adddata['ifImg']=$data['ifImg'];
        $adddata['Imgurl']=$data['Imgurl'];
        $adddata['right_answer']=$data['rname'];
        $adddata['create_time']=time();

        if($type==2){
            //简答
            $adddata['right_answer']=$data['textarea'];
            $adddata['score']=20;//简答题是20分
            $id=M('testshort')->add($adddata);
        }else{
            $adddata['A']=strtoupper($_POST['aname']);
            $adddata['B']=strtoupper($_POST['bname']);
            $adddata['C']=strtoupper($_POST['cname']);
            $adddata['D']=strtoupper($_POST['dname']);
            if($type==0){
                //单选
                $adddata['score']=3;//单选是一体3分
            }elseif($type==1){
                //多选
                $adddata['score']=4;//多选是一体4分
            }
            $id=M('test')->add($adddata);
        }

        if($data['qimg']=='qimg'){
            $res=$this->UploadPic($id,$data['firstCate']);
        }else{
            $res=$id;
        }
        return $res;
    }

    public function UploadPic($id,$firstCate){
        $upload = new Upload();
        $upload->maxSize = 3145728;
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
        $img=new Image();
        if($firstCate==2){
            $upload->rootPath = './Uploads/TestShortPic/';
            $table='test_picshort';
        }else{
            $upload->rootPath='./Uploads/TestPic/';
            $table='test_pic';
        }
        if (!file_exists($upload->rootPath)) {
            mkdir($upload->rootPath);
        }
        $info=$upload->upload();
        if(!$info){
            $res=$upload->getError();
        }else{
            //缩略
            //图片路径
            $filename=$upload->rootPath.$info['image']['savepath'].$info['image']['savename'];
            $thumb100=$upload->rootPath.$info['image']['savepath'].'100_'.$info['image']['savename'];
            $thumb200=$upload->rootPath.$info['image']['savepath'].'200_'.$info['image']['savename'];
            $thumb250=$upload->rootPath.$info['image']['savepath'].'250_'.$info['image']['savename'];
            $thumb300=$upload->rootPath.$info['image']['savepath'].'300_'.$info['image']['savename'];

            $img->open($filename)->thumb('100','100')->save($thumb100);
            $img->open($filename)->thumb('200','200')->save($thumb200);
            $img->open($filename)->thumb('250','250')->save($thumb250);
            $img->open($filename)->thumb('300','300')->save($thumb300);
            $data['test_id']=$id;
            $data['create_time']=time();
            $data['picurl']=$info['image']['savepath'];
            $data['picname']=$info['image']['savename'];
            $res=M($table)->add($data);
        }

        //创建上传文件夹;
        return $res;
    }

    public function editorPic($pid,$type){
        //更新图片信息
        $upload = new Upload();
        $img = new Image();
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型D
        if($type==2){
            $picInfo=M('test_picshort')->field('picurl,picname')->where(array('id'=>$pid))->find();
            $upload->rootPath = './Uploads/TestShortPic/';
            $table='test_picshort';
        }else{
            $picInfo=M('test_pic')->field('picurl,picname')->where(array('id'=>$pid))->find();

            $upload->rootPath='./Uploads/TestPic/';
            $table='test_pic';
        }
//        $upload->savePath = "{$picInfo['imageurl']}";
        $info = $upload->upload();
        if(!$info){
            $res=$upload->getError();
        }else{
            $filename=$upload->rootPath.$info['image']['savepath'].$info['image']['savename'];
            $thumb100=$upload->rootPath.$info['image']['savepath'].'100_'.$info['image']['savename'];
            $thumb200=$upload->rootPath.$info['image']['savepath'].'200_'.$info['image']['savename'];
            $thumb250=$upload->rootPath.$info['image']['savepath'].'250_'.$info['image']['savename'];
            $thumb300=$upload->rootPath.$info['image']['savepath'].'300_'.$info['image']['savename'];

            $img->open($filename)->thumb('100','100')->save($thumb100);
            $img->open($filename)->thumb('200','200')->save($thumb200);
            $img->open($filename)->thumb('250','250')->save($thumb250);
            $img->open($filename)->thumb('300','300')->save($thumb300);
            $where['id']=$pid;
            $data['create_time']=time();
            $data['picurl']=$info['image']['savepath'];
            $data['picname']=$info['image']['savename'];
            if ($res=M($table)->where($where)->save($data)) {
                //删除原图
                unlink($upload->rootPath. $picInfo['picurl'] . $picInfo['picname']);
                unlink($upload->rootPath . $picInfo['picurl'] . '100_' . $picInfo['picname']);
                unlink($upload->rootPath. $picInfo['picurl'] . '200_' . $picInfo['picname']);
                unlink($upload->rootPath. $picInfo['picurl'] . '250_' . $picInfo['picname']);
                unlink($upload->rootPath. $picInfo['picurl'] . '300_' . $picInfo['picname']);
            } else {
                $res=$this->error('图片更新失败');
            };
        }
        return $res;
    }




}
