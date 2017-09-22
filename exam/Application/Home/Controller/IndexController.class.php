<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _empty(){
        $this->show('loading...');
    }
    public function index(){
        $count=M('member')->field('id')->count();
        $this->assign('count',$count);
        $this->display();
    }
    public function think(){
        $count=M('member')->field('id')->count();
        $this->assign('count',$count);
        $this->display();
    }

    public function result(){
        $count=M('member')->field('id')->count();
        $this->assign('count',$count);
        $this->display();
    }

    public function short(){
        $count=M('member')->field('id')->count();
        $this->assign('count',$count);
        $this->display();
    }

    //随机抽出20题单选  10题多选
    public function exam_list(){
        if(!session('id')){
            $this->redirect('Home/Index/think');
        }
//单选题
        $oneselect=D('test')->getRandData(0,1,5);//情感5道
        $oneselect1=D('test')->getRandData(0,2,5);//社会5道
        $oneselect2=D('test')->getRandData(0,3,5);//文明5道
        $oneselect3=D('test')->getRandData(0,4,5);//综合5道
//多选题
        $twoselect=D('test')->getRandData(1,1,2);//情感5道
        $twoselect1=D('test')->getRandData(1,2,2);//社会5道
        $twoselect2=D('test')->getRandData(1,3,3);//文明5道
        $twoselect3=D('test')->getRandData(1,4,3);//综合5道
        $arr=array_merge($oneselect,$oneselect1,$oneselect2,$oneselect3,$twoselect,$twoselect1,$twoselect2,$twoselect3);
        shuffle($arr);
        $str='';
        foreach($arr as $key=>$v){
            if($v['ifimg']==1){
                $arr[$key]['pic']=M('test_pic')->field('picname,picurl')->where(array('test_id'=>$v['id']))->find();
            }
            $str.=$v['id'].',';
        }
        $str=substr($str,0,-1);
        $data['question_id']=$str;
        M('member')->where(array('id'=>session('id')))->save($data);
        $server='http://'.C('SERVER');
        $this->assign('server',$server);
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
    }

    public function addMember(){
        $_POST['score_short']=0;
        $_POST['time']=time();
        $idInfo=M('member')->where(array('name'=>$_POST['name'],'tel'=>$_POST['tel'],'sex'=>$_POST['sex']))->field('id')->find();
        if($idInfo){
            M('member')->field('id,name,sex,age,tel,cometime,starttime,stoptime,score_short,time')->save($_POST);
            $id=$idInfo['id'];
            M('member_answer')->where(array('userid'=>$id))->delete();
        }else{
            $id=M('member')->field('name,sex,age,tel,cometime,starttime,stoptime,score_short,time')->add($_POST);
        }
        session('id',$id);
        session('name',$_POST['name']);
        if($id){
            $url=U('Home/Index/exam_list');
            $this->success('信息保存成功，请开始答题',$url);
        }else{
            $this->error('保存失败');
        }
    }

    //简答题查询
    public function short_list(){
        if(!session('id')){
            $this->redirect('Home/Index/index');
        }
        $short=D('test')->getRandData(2,1,1);//情感5道
        $short1=D('test')->getRandData(2,2,1);//社会5道
        $short2=D('test')->getRandData(2,3,1);//文明5道
        $short3=D('test')->getRandData(2,4,2);//综合5道
        $arr=array_merge($short,$short1,$short2,$short3);
        shuffle($arr);
        $str='';
        foreach($arr as $key=>$v){
            if($v['ifimg']==1){
                $arr[$key]['pic']=M('test_picshort')->field('picname,picurl')->where(array('test_id'=>$v['id']))->find();
            }
            $str.=$v['id'].',';
        }
        $str=substr($str,0,-1);
        $data['short_id']=$str;
        M('member')->field('short_id')->where(array('id'=>session('id')))->save($data);
        $server='http://'.C('SERVER');
        $this->assign('server',$server);
        $this->assign('arr',$arr);
        $this->display();
    }

    //提交试卷
    public function submit_exam(){
        $array_key=array_keys($_POST);
        foreach($array_key as $v){
            $data['qid']=$v;
            $data['userid']=session('id');
            $questionInfo=M('test')->field('type,right_answer,score,id')->where(array('id'=>$v))->find();
            $data['type']=$questionInfo['type'];
            //单选
            if($questionInfo['type']==0){
                $data['answer']=$_POST[$v];
                if(strtoupper($questionInfo['right_answer'])!=strtoupper($_POST[$v])){
                    $data['score']=0;
                }else{
                    $data['score']=3;
                }
            }
            //多选
            else{
                $arr_value=array_values($_POST[$v]);
                $str=implode('',$arr_value);
                $data['answer']=$str;
                if(strlen($str)==strlen($questionInfo['right_answer'])){
                    if(strtoupper($str)==strtoupper($questionInfo['right_answer'])){
                        $data['score']=4;//满分
                    }else{
                        $data['score']=0;//0分
                    }
                }else{
                    if(strlen($str)<strlen($questionInfo['right_answer'])){
                        $a=stripos($questionInfo['right_answer'],$str,0);
                        if($a>0){
                            $data['score']=2;//一半分
                        }elseif($a==0){
                            if(is_bool($a)){
                                $data['score']=0;//0分
                            }elseif(is_int($a)){
                                $data['score']=2;//一半分
                            } else{
                                $data['score']=0;//满分
                            }
                        }
                    } else{
                        $data['score']=0;//0分
                    }
                }
            }
            $data['right_answer']=strtoupper($questionInfo['right_answer']);
            M('member_answer')->add($data);
        }
        $id=session('id');
        $scorecount=M('member_answer')->where(array('userid'=>$id))->sum('score');
        if($scorecount){
            $score=$scorecount;
        }else{
            $score=0;
        }
        $memberinfo=M('member')->field('score,time')->where(array('id'=>$id))->save(array('score'=>$score,'time'=>time()));
        $url=U('Home/Index/short_list');
        $this->success($score,$url);
    }
    //提交简答题试卷
    public function short_submit_exam(){
        if(!session('id')) {
            $this->redirect('Home/Index/index');
        }
        $array_key=array_keys($_POST);
        foreach($array_key as $v){
            $data['userid']=session('id');
            $shortInfo=M('testshort')->field('type,right_answer,score')->where(array('id'=>$v))->find();
            $data['qid']=$v;
            $data['type']=$shortInfo['type'];
            $data['right_answer']=$shortInfo['right_answer'];
            $data['answer']=$_POST[$v][0];
            $data['score']=0;
            M('member_answer')->add($data);
        }
        $id=session('id');
        $memberinfo=M('member')->field('score_short,correct_papers,time')->where(array('id'=>$id))->save(array('score_short'=>0,'correct_papers'=>0,'time'=>time()));
        $url=U("Home/Index/think_list?userid=$id");
        session('id',null);
        session('name',null);
        $this->success('提交成功',$url);
    }

    public function think_list(){
        $count=M('member')->field('id')->count();
        $this->assign('count',$count);
        $this->assign('userid',$_GET['userid']);
        $this->display();
    }

    public function test_detail(){
        if($_GET['userid']){
            $userid=$_GET['userid'];
        }else {
            $userid = M('member')->where(array('name' => $_POST['name'], 'tel' => $_POST['tel'],'sex'=>$_POST['sex']))->getField('id');
        }
        if($userid){
            $memberInfo=M('member')->field('question_id,name,score,score_short')->where(array('id'=>$userid))->find();
            $testInfo=M('test')->field('id,question,type,ifImg,a,b,c,d,right_answer')->where(array('id'=>array('in',$memberInfo['question_id'])))->select();
            foreach($testInfo as $k=>$v){
                $testInfo[$k]['info']=M('member_answer')->field('answer,score')->where(array('userid'=>$userid,'type'=>array('neq',2),'qid'=>$v['id']))->find();
                if($v['ifimg']==1){
                    $testInfo[$k]['image']=M('test_pic')->field('picurl,picname')->where(array('test_id'=>$v['id']))->find();
                }
            }
            $server='http://'.C('SERVER');
            $this->assign('server',$server);
            $this->assign('arr',$testInfo);
            $this->assign('name',$memberInfo['name']);
            $this->assign('score',$memberInfo['score']);
            $this->assign('score_short',$memberInfo['score_short']);
            $this->display();
        }else{
            $this->display('shortError');
        }
    }

    public function short_detail(){
        $name=$_POST['name'];
        $tel=$_POST['tel'];
        $userid=M('member')->where(array('name'=>$name,'tel'=>$tel,'sex'=>$_POST['sex']))->getField('id');
        if($userid){
            $memberInfo=M('member')->field('short_id,name,score,score_short,correct_papers')->where(array('id'=>$userid))->find();
            $testInfo=M('testshort')->field('id,question,type,ifImg,right_answer')->where(array('id'=>array('in',$memberInfo['short_id'])))->select();
            foreach($testInfo as $k=>$v) {
                $testInfo[$k]['info'] = M('member_answer')->field('answer,score,qid')->where(array('userid' => $userid, 'type' =>2, 'qid' => $v['id']))->find();
                if ($v['ifimg'] == 1) {
                    $testInfo[$k]['image'] = M('test_picshort')->field('picurl,picname')->where(array('test_id' => $v['id']))->find();
                }
            }
            $server='http://'.C('SERVER');
            $this->assign('server',$server);
            $this->assign('arr',$testInfo);
            $this->assign('name',$memberInfo['name']);
            $this->assign('id',$userid);
            $this->assign('score',$memberInfo['score']);
            $this->assign('score_short',$memberInfo['score_short']);
            $this->assign('correct_papers',$memberInfo['correct_papers']);
            $this->display();
        }else{
            $this->display('shortError');
        }

    }
    public function checkUsername(){
        $username = trim(I('post.name'));
        $admin = M('member');
        $info = $admin->where(array('name' => $username))->find();
        if ($info) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
}