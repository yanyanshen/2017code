<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;
use Think\Controller;
class UserController extends BgController{
    public function UserList(){
        $get=strtolower($_GET['chaXun']);
        if($get){
            $where['username']=array('like',"%$get%");
        }else{
            $where='';
        }
        $User=M('User');
        //$BrandInfo = $Brand->select();
        $count=$User->where($where)->count();//查询记录总数
        $Page=new Page($count,5);//实例化分页类，传入总记录数和每页显示的记录数
        $show=$Page->show();//分页显示
        $nowPage=ceil(($Page->firstRow+1)/5);
        //进行分页数据查询，注意limit方法的参数要使用Page类的属性
        $UserInfo = $User->where($where)->order('beauty_user.id')->limit($Page->firstRow.','.$Page->listRows)->select();
        //$UserInfo['packet']=$User->join('beauty_packet on beauty_packet.mid=beauty_user.id')->where('beauty_packet.mid=beauty_user.id')->field('packtag')->count();
        $this->assign('count', $count);
        $this->assign('UserInfo', $UserInfo);
        //$this->assign('packtag', $UserInfo['packet']);
        $this->assign('nowPage', $nowPage);
        $this->assign('Page',$show);// 赋值分页输出
        $this->display('User/list');
    }

    //发送站内信;
    public function sendUserMessage(){
        if(IS_AJAX){
            $gid=I('post.role');
            //判断收件人信息;
            if($gid==0){
                $midInfo=M('User')->field('id mid')->select();
            }else{
                $midInfo=M('User')->where(array('memberorder'=>$gid))->field('id mid')->select();
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
                    foreach($midInfo as $k=>$v){
                        $info[$k]['receiveId']=$v['mid'];
                        $info[$k]['sendId']=session('aid');
                        $info[$k]['textId']=$id;
                    }
                    foreach($info as $val) {
                        M('MessageUser')->add($val);
                    }
                    $this->success('发送成功');
                }else{
                    $this->error('发送失败');
                }
            }else{
                $this->error('主题或内容不能为空！');
            }
        }else{
            $user=M('UserVipinfo');
            $list=$user->select();
            $this->assign('list',$list);
            $this->display('sendUserMessage');
        }
    }

}