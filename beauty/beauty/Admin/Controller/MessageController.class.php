<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;

class MessageController extends BgController{
    public function index(){
        $aid=session('aid');
        $message=M('MessageAdmin');
        $messageList=$message->table('beauty_message_admin a,beauty_messagetext t,beauty_admin ad')
            ->where('a.textId=t.id and a.sendId=ad.id and a.status!=3')->where(array('a.receiveId'=>$aid))
            ->order('t.id desc')->field('a.id,a.status,t.title,t.content,t.time,ad.username')
            ->select();
        $count=$message->where(array('receiveId'=>$aid))->where('status!=3')->count();
        $count1=$message->where(array('receiveId'=>$aid))->where('status=1')->count();
        $page=new Page($count,10);
        $show=$page->show();
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('count1',$count1);
        $this->assign('firstRow',$page->firstRow);
        $this->assign('curPage',ceil(($page->firstRow+1)/10));
        $this->assign('list',$messageList);
        $this->display('list');
    }

    //发送站内信;
    public function sendMessage(){
        if(IS_AJAX){
            $aid=session('aid');
            $where['id']=array('neq',$aid);
            $gid=I('post.role');
            //判断收件人信息;
            if($gid==0){
                $uidInfo=M('Pay')->where($where)->field('id as uid')->select();
            }else{
                $uidInfo=M('AuthGroupAccess')->where(array('group_id'=>$gid))->field('uid')->select();
            }
            //处理站内信主题和内容;
            $title=trim(I('title'));
            $content=trim(I('content'));
            if($title && $content){
                $data['title']=$title;
                $data['content']=$content;
                $data['time']=time();
                $id=M('Messagetext')->add($data);
                //插入站内信主表;
                if($id){
                    foreach($uidInfo as $k=>$v){
                        $info[$k]['receiveId']=$v['uid'];
                        $info[$k]['sendId']=session('aid');
                        $info[$k]['textId']=$id;
                    }
                    foreach($info as $val) {
                        M('MessageAdmin')->add($val);
                    }
                    $this->success('发送成功');
                }else{
                    $this->error('发送失败');
                }
            }else{
                $this->error('主题或内容不能为空！');
            }
        }else{
            $group=M('AuthGroup');
            $list=$group->select();
            $this->assign('list',$list);
            $this->display('sendMessage');
        }
    }

    //删除站内信;
    public function delMessage(){
        $message=M('MessageAdmin');
        $idGroup=I('post.checkbox');
        if($idGroup) {
            foreach ($idGroup as $k1 => $v1) {
                $info[$k1]['mailid'] = $v1;
                $info[$k1]['status'] = 3;
            }
            if ($info) {
                foreach ($info as $v2) {
                    $message->where(array('id' => $v2['mailid']))->field('status')->save($v2);
                }
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        }else{
            $this->error('您还没有选择要删除的信息哦');
        }
    }

    //彻底删除站内信;
    public function packMessage(){
        $message=M('MessageAdmin');
        $idGroup=I('post.checkbox');
        if($idGroup) {
            foreach ($idGroup as $k1 => $v1) {
                $info[$k1]['mailid'] = $v1;
            }
            if ($info) {
                foreach ($info as $v2) {
                    $message->where(array('id' => $v2['mailid']))->delete($v2);
                }
                $this->success('删除成功');
            } else {
                $this->error('删除失败');
            }
        }else{
            $this->error('您还没有选择要删除的信息哦');
        }
    }

    //全部标为已读;
    public function readMessage(){
        $message=M('MessageAdmin');
        $idGroup=I('post.checkbox');
        if($idGroup) {
            foreach ($idGroup as $k1 => $v1) {
                $info[$k1]['mailid'] = $v1;
                $info[$k1]['status'] = 2;
            }
            if ($info) {
                foreach ($info as $v2) {
                    $message->where(array('id' => $v2['mailid']))->field('status')->save($v2);
                }
                $this->success('操作成功');
            } else {
                $this->error('操作失败');
            }
        }else{
            $this->error('您还没有选择要标记的信息哦');
        }
    }

    //站内信内容;
    public function messageContent(){
        $id = I('get.id');
        $message = M('MessageAdmin');
        $info = $message->where(array('id' => $id))->find();
        if ($info['status'] = 1) {
            $info['status'] = 2;
            $message->where(array('id'=>$id))->field('status')->save($info);
        }
        $list = $message->table('beauty_message_admin m,beauty_admin a,beauty_messagetext t')
            ->where('m.sendId=a.id and m.textId=t.id')->where(array('m.id' => $id))
            ->field('a.username,t.title,t.content')->find();
        $this->assign('username', $list['username']);
        $this->assign('title', $list['title']);
        $this->assign('content', $list['content']);
        $this->display('messageContent');
    }
}