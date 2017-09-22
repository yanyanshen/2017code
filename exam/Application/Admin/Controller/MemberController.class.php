<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;
class MemberController extends BgController{
    /*应聘者列表*/
    public function index(){
        if($_GET['keywords']){
            $where['name']=array('like',"%{$_GET['keywords']}%");
        }else{
            $where='';
        }
        $count=M('member')->where($where)->count();
        $objPage=new Page($count,8);
        $show=$objPage->show();
        $memberInfo=M('member')
            ->where($where)
            ->limit($objPage->firstRow.','.$objPage->listRows)
            ->order('time desc')
            ->select();
        $this->assign('keywords',$_GET['keywords']);
        $this->assign('Page',$show);
        $this->assign('firstRows',$objPage->firstRow);
        $this->assign('arr',$memberInfo);
        $this->display();
    }
    //简答题打分
    public function short_list(){
        $userid=$_GET['id'];
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
    }

    //选择题答题情况
    public function test_detail(){
        $userid=$_GET['userid'];
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
    }


    //计算简答题分数
    public function culScore(){
        $score_short=0;
        $array_key=array_keys($_POST);

        foreach($array_key as $v){
            $data1['score']=$_POST[$v][0];
            M('member_answer')->where(array('userid'=>$_GET['userid'],'type'=>2,'qid'=>$v))->save($data1);
        }
        foreach($_POST as $v){
            $score_short=$score_short+$v[0];
        }
        $info=M('member')->where(array('id'=>$_GET['userid']))->find();
        $data['correct_papers']=1;
        $data['score_short']=$score_short;
        $data['total_score']=$score_short+$info['score'];
        M('member')->where(array('id'=>$_GET['userid']))->save($data);
        $this->success(1);
    }
}