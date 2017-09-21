<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;
use Think\Model;

class AdminController extends BgController{
    public function index(){
        if (IS_GET) {
            //搜索;
            $keywords = I('get.keywords');
            $where['username'] = array('like', "%$keywords%");
        } else {
            $where = '';
        }
        $admins = M('Admin');
        //总记录数;
        $count = $admins->where($where)->count();
        $page = new Page($count, 5);
        //分页展示;
        $show = $page->show();
        $adminList = $admins->where($where)->order('id')->limit($page->firstRow . ',' . $page->listRows)->select();
        //获得所属的管理员组;
        foreach($adminList as $k=>$v){
            $groupInfo=M('AuthGroupAccess')->alias('a')->join('beauty_auth_group g ON a.group_id=g.id')->field('g.title')->where("a.uid={$v['id']}")->select();
            $str='';
            foreach($groupInfo as $g){
                $str.=$g['title'].',';
            }
            $adminList[$k]['group']=substr($str,0,-1);
        }
        $this->assign('keywords', $keywords);
        $this->assign('firstRow', $page->firstRow);
        $this->assign('curPage',ceil(($page->firstRow+1)/5));
        $this->assign('count',$count);
        $this->assign('adminList', $adminList);
        $this->assign('page', $show);
        $this->display('list');
    }

    public function add(){
        if (IS_AJAX) {
            if(I('post.permissions')>0) {
                $admin = D('Admin');
                $where['username'] = session('username');
                $where['permissions'] = 1;
                //判断管理权限;
                $pmsInfo = $admin->where($where)->field('permissions')->find();
                if ($pmsInfo) {
                    $data = $admin->create();
                    if ($data) {
                        $data['username'] = trim(I('post.username'));
                        $data['password'] = md5(trim(I('post.password')));
                        $data['mobile'] = md5(trim(I('post.mobile')));
                        $data['addtime'] = time();
                        $data['edittime'] = time();
                        $data['permissions'] = I('post.permissions');
                        //添加数据到数据库;
                        $aid = $admin->add($data);
                        if ($aid) {
                            $this->success('添加管理员成功');
                        } else {
                            $this->error('添加管理员失败');
                        }
                    } else {
                        $this->error($data->gerError());
                    }
                } else {
                    $this->error('你没有权限!');
                }
            }else{
                $this->error('请选择添加的管理员类型');
            }
        } else {
            $group=M('AuthGroup')->select();
            $this->assign('group',$group);
            $this->display();
        }
    }

    public function chkUsername(){
        $username = trim(I('post.username'));
        $admin = M('Admin');
        $info = $admin->where(array('username' => $username))->find();
        if ($info) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function loginout(){
        $admin=M('Admin');
        $aid=session('aid');
        $data['online']=0;
        if($admin->where(array('id'=>$aid))->field('online')->save($data)){
            session(null);
            $this->success('退出成功');
        }else{
            $this->error('退出失败');
        }
    }

    //用AJAX方式更改管理员状态;
    public function operate(){
        if (IS_AJAX) {
            $admin = M('Admin');
            $where['permissions'] = 1;
            $where['username'] = session('username');
            //判断管理权限;
            $pmsInfo = $admin->where($where)->field('permissions')->find();
            if ($pmsInfo) {
                //判断你要操作的管理员的权限;
                $data['id'] = I('post.id');
                $psInfo=M('Admin')->where($data)->find();
                //只能操作非超级管理员的权限;
                if($psInfo['permissions']!=1){
                    //更改要操作的管理员状态;
                    $psInfo['status']=($psInfo['status']==0)?1:0;
                    $a=$admin->where($data)->field('status')->save($psInfo);
                    if($a){
                        $this->success('更新管理员状态成功');
                    }else{
                        $this->error('更新管理员状态失败');
                    }
                }else{
                    $this->error('你没有权限');
                }
            }else{
                $this->error('你没有权限');
            }
        }else{
            $this->display();
        }
    }

    //踢号操作;
    public function kick(){
        if (IS_AJAX) {
            $admin = M('Admin');
            $where['permissions'] = 1;
            $where['username'] = session('username');
            //判断管理权限;
            $pmsInfo = $admin->where($where)->field('permissions')->find();
            if ($pmsInfo) {
                //判断你要操作的管理员的权限;
                $data['id'] = I('post.id');
                $psInfo=M('Admin')->where($data)->find();
                //只能操作非超级管理员的权限;
                if($psInfo['permissions']!=1){
                    //更改要操作的管理员状态;
                    $psInfo['online']=0;
                    $a=$admin->where($data)->field('online')->save($psInfo);
                    if($a){
                        $this->success('更新管理员登录状态成功');
                    }else{
                        $this->error('更新管理员登录状态失败');
                    }
                }else{
                    $this->error('你没有权限');
                }
            }else{
                $this->error('你没有权限');
            }
        }else{
            $this->display();
        }
    }

    //修改个人信息操作;
    public function changeInfo(){
        $this->display('Admin/changeInfo');
    }

    //验证手机号;
    public function chkMobile(){
        $where['id']=session('aid');
        $where['mobile']=md5(trim(I('post.mobile')));
        $admin=M('Admin');
        $info=$admin->where($where)->find();
        if($info){
            echo 'true';
        }else{
            echo 'false';
        }
    }

    //验证密码;
    public function chkPwd(){
        $where['id']=session('aid');
        $where['password']=md5(trim(I('post.pwd')));
        $info=M('Admin')->where($where)->find();
        if($info){
            echo 'true';
        }else{
            echo 'false';
        }
    }

    //修改密码操作;
    public function changePwd(){
        if(IS_AJAX){
            $data['id']=session('aid');
            $data['mobile']=md5(trim(I('post.mobile')));
            $admin=M('Admin');
            $info=$admin->where($data)->find();
            if($info){
                $data['password']=md5(trim(I('post.password')));
                if($admin->where(array('id'=>$info['id']))->field('password')->save($data)){
                    $this->success('修改密码成功');
                }else{
                    $this->error('修改密码失败');
                }
            }else{
                $this->error('密保手机错误');
            }
        }else{
            $this->display('Admin/changeInfo');
        }
    }

    //修改手机号操作;
    public function changeMobile(){
        if(IS_AJAX) {
            $aid = session('aid');
            $mobile=md5(trim(I('post.mobile')));
            $admin=M('Admin');
            $info=$admin->where(array('id'=>$aid,'mobile'=>$mobile))->find();
            if($info){
                $data['mobile'] = md5(trim(I('post.newmobile')));
                if($admin->where(array('id'=>$aid))->field('mobile')->save($data)){
                    $this->success('手机号修改成功');
                }else{
                    $this->error('手机号修改失败');
                }
            }else{
                $this->error('密保手机号错误');
            }
        }else{
            $this->display('Admin/changeInfo');
        }
    }

    //编辑操作;
    public function edit(){
        if (IS_AJAX) {
            $admin=M('Admin');
            $username=trim(I('post.username'));
            $password=trim(I('post.password'));
            $id=I('post.id');
            if($username){
                if($password){
                    $data['username']=$username;
                    $data['password']=md5($password);
                }else{
                    $data['username']=$username;
                }
                $data['edittime'] = time();
                $row=$admin->where(array('id'=>$id))->save($data);
                if ($row) {
                    if (I('post.group_id')) {
                        $access = M('AuthGroupAccess');
                        $access->where(array('uid' => $id))->delete();
                        foreach (I('post.group_id') as $v) {
                            $info['uid'] = $id;
                            $info['group_id'] = $v;
                            $access->add($info);
                        }
                    }
                    $this->success('用户编辑成功', U('index'));
                } else {
                    $this->error('用户编辑失败');
                }
            }else{
                $this->error('用户名不能为空');
            }
        } else {
            $admin = D('Admin');
            $id = I('get.id');
            $adminInfo = $admin->getAdminById($id);
            $gid = M('AuthGroupAccess')->field('group_id')->where(array('uid' => $id))->select();
            foreach ($gid as $v) {
                $arr[] = $v['group_id'];
            }
            $adminInfo['gid'] = $arr;
            $groupList = D('AuthGroup')->getGroupList();
            $this->assign('groupList', $groupList);
            $this->assign('adminInfo', $adminInfo);
            $this->display();
        }
    }
}



