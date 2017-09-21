<?php
namespace Mobile\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function login(){
        $this->display('Login');
    }
     public function Dologin(){
         if(IS_AJAX){
             $m=M('User');
             $username=trim($_POST['username']);
             $password=md5($_POST['password']);
             $where['username']=$username;
             $where['password']=$password;
             $data=$m->field('id,username,password')->where($where)->find();
             $mid=$data['id'];
             if($data) {
                 session('mid',$mid);
                 session('mname',$username);
                 $time['lastlogin'] = time();
                 $m->where($where)->save($time);
                 //周贝贝的session('mycart2')开始
                 if(session('mycart2')){
                     $mid=session('mid');
                     foreach(session('mycart2') as $v){
                         $v['mid']=$mid;
                         $gid=$v['gid'];
                         $ml=$v['ml'];
                         //判断购物车数据表中是否存在该用户添加购物车的数据信息
                         $res1=M('Cart')->field('gid,buynum,sumprice,ml')->where(array('mid'=>$mid,'gid'=>$gid,'ml'=>$ml))->find();
                         if($res1){
                             $buynum=$res1['buynum']+$v['buynum'];
                             $sumprice=$res1['sumprice']+$v['sumprice'];
                             $cartwhere['mid']=$mid;
                             $cartwhere['gid']=$res1['gid'];
                             $cartwhere['ml']=$res1['ml'];
                             M('Cart')->where($cartwhere)->save(array('buynum'=>$buynum,'sumprice'=>$sumprice));
                         }else{
                             $res2=M('Cart')->where(array('mid'=>$mid))->add($v);
                         }
                         //添加购物车表中之后就进行删除session
                         if($res2){
                             session('mycart2',null);
                         }
                     }
                 }
                 //周贝贝的session('mycart1')结束
                 if(session('carturl')){
                     $carturl=session('carturl');
                     session('carturl',null);
                     $this->success($carturl);
                 }elseif(session('collectUrl')){
                         $url=session('collectUrl');
                         session('collectUrl',null);
                         $this->success($url);
                 }elseif(session('collectUrl1')){
                     $url=session('collectUrl1');
                     session('collectUrl1',null);
                     $this->success($url);
                 }
                 else{
                     $index=U('Mobile/Index/index');
                     $this->success($index);
                 }
                 $this->success('登陆成功');
             }else{
                 $this->error('用户名或密码错误');
             }
         }else {
             $this->display('Login');
         }
     }

    public function LoginOut(){
            session(null);
            $this->success('退出成功');
            //$this->display('Index/index')
    }

}