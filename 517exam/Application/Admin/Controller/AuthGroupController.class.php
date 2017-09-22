<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
class AuthGroupController extends BgController {

    //管理组列表;
    public function index(){
        $group=D('AuthGroup');
        $groupList=$group->getGroupList();
        foreach($groupList as $k=>$v){
            $adminInfo=M('AuthGroupAccess')->alias('g')->join('exam_admin a ON g.uid=a.id')->field('a.username')->where("g.group_id={$v['id']}")->select();
            $str='';
            foreach($adminInfo as $a){
                $str.=$a['username'].',';
            }
            $groupList[$k]['member']=substr($str,0,-1);
        }
        $this->assign('groupList',$groupList);
        $this->display();
    }

    //添加管理组;
    public function add(){
        if(IS_AJAX){
            $group=D('AuthGroup');
            $data=$group->create();
            if($data){
                $gid=$group->addGroup($data);
                if($gid){
                    $this->success('管理组添加成功',U('index'));
                }else{
                    $this->error('管理组添加失败');
                }
            }else{
                $this->error($group->getError());
            };
        }else{
            $this->display();
        }
    }

    //向管理组中添加成员;
    public function addMember(){
        if(IS_AJAX){
            //填写的管理员名字;
            if(I('post.username')) {
                $gid = I('post.gid');
                $username = trim(I('post.username'));
                $userInfo = M('Pay')->where(array('username' => $username))->find();
                if ($userInfo) {
                    $data['uid'] = $userInfo['id'];
                    $data['group_id'] = $gid;
                    $accessInfo = M('AuthGroupAccess')->where($data)->find();
                    //判断管理员是否已经在管理组中;
                    if (!$accessInfo) {
                        if (M('AuthGroupAccess')->add($data)) {
                            $this->success('添加成功');
                        } else {
                            $this->error('添加失败');
                        }
                    } else {
                        $this->error('添加组员已在管理组中');
                    }
                } else {
                    $this->error('添加的管理员不存在');
                }
            //勾选的管理员名字;
            }elseif(I('post.uid')){
                $access=M('AuthGroupAccess');
                foreach(I('post.uid') as $v1){
                    $data['uid']=$v1;
                    $data['group_id']=I('post.gid');
                    //判断管理员是否已经在管理组中;
                    $access->where($data)->delete();
                    $info=$access->add($data);
                }
                if($info){
                    $this->success('添加成功');
                }else{
                    $this->error('添加失败');
                }
            }
        }else{
            /*$gid=I('get.gid');
            $admins=M('Pay')->select();
            $this->assign('gid',$gid);
            $this->assign('admins',$admins);
            $this->display('addMember');*/

            $gid=I('get.gid');
            $admins=M('Pay')->select();
            $accessInfo=M('AuthGroupAccess')->table('exam_admin a,exam_auth_group_access g')->where(array('g.group_id'=>$gid))->where('a.id=g.uid')->select();
            $uid = M('AuthGroupAccess')->field('uid')->where(array('group_id' => $gid))->select();

            foreach ($uid as $v) {
                $arr[] = $v['uid'];
            }
            $accessInfo['uid'] = $arr;
            $this->assign('gid',$gid);
            $this->assign('admins',$admins);
            $this->assign('accessInfo',$accessInfo);
            $this->display('addMember');
        }
    }

    //给管理组分配权限;
    public function allocateRule(){
        $group=D('AuthGroup');
        if(IS_AJAX){
            $data['id']=I('post.id');
            $data['rules']=implode(',',I('post.rules'));
            $row=$group->editRule($data);
            if($row){
                $this->success('分配成功',U('index'));
            }else{
                $this->error('分配失败');
            }
        }else{
            //获取所有权限规则
            $rule=D('AuthRule');
            $ruleList=$rule->getRuleTree();
            /* echo "<pre>";
             print_r($ruleList);*/
            //获取组信息
            $id=I('get.gid');
            $groupInfo=$group->find($id);
            $groupInfo['rules']=explode(',',$groupInfo['rules']);

            $this->assign('ruleList',$ruleList);
            $this->assign('groupInfo',$groupInfo);
            $this->display();
        }

    }

    //删除管理组;
    public function del(){
        if(IS_AJAX) {
            $id = I('post.id');
            $group = M('AuthGroup');
            $access=M('AuthGroupAccess');
            $groupInfo=$group->where(array('id' => $id))->find();
            $accessInfo=$access->where(array('group_id'=>$id))->select();
            //判断管理组以及组员是否存在,然后分别删除;
            if($groupInfo) {
                if($accessInfo) {
                    $group->startTrans();
                    if (!$group->where(array('id' => $id))->delete()) {
                        $group->rollback();
                    }
                    if(!$access->delete(array('group_id'=>$id))->delete()){
                        $group->rollback();
                    }
                    if($group->commit()){
                        $this->success('删除成功');
                    }else{
                        $this->error('删除失败');
                    }
                }else{
                    if($group->delete($accessInfo)){
                        $this->success('删除成功');
                    }else{
                        $this->error($id);
                    }
                }
            }else{
                $this->error('没有查到数据');
            }
        }else{
            $this->display('index');
        }
    }

    //编辑管理组;
    public function edit(){
        if(IS_AJAX) {
            $id = I('post.id');
            $data['title'] = trim(I('post.title'));
            if (M('AuthGroup')->where(array('id' => $id))->field('title')->save($data)) {
                $this->success('编辑成功');
            } else {
                $this->error('编辑失败');
            }
        }else{
            $id=I('get.id');
            $authGroupInfo=M('AuthGroup')->where(array('id'=>$id))->find();
            $title=$authGroupInfo['title'];
            $this->assign('id',$id);
            $this->assign('title',$title);
            $this->display();
        }
    }

}