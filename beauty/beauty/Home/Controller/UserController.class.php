<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class UserController extends Controller
{
    /*链接用户中心的index方法*/
    public function index()
    {

        $this->display('User_Center');
    }


    /*链接用户中心的用户地址address方法*/
    public function address(){

        $this->display('User_address');
    }

    public function addAddress(){
        $data['shengfen']=I('post.province');
        $data['shi']=I('post.city');
        $data['xian']=I('post.county');
        $data['address']=I('post.address');

        $data['username']=I('post.username');
        $data['ecode']=I('post.ecode');
        $data['mobile']=I('post.mobile');
        $User=M('addresses');
        $a=$User->data($data)->add();
        if($a){
            $this->success($data);
        }else{
            $this->error("添加地址失败");
        }


    }


    /*链接用户中心的用户收藏的collect方法*/
    public function collect()
    {
        $this->display('User_Collect');
    }
    public function comment(){
     $this->display('User_Comment');
   }



    /*链接用户中心的我的订单的order方法*/
    public function Orderform()
    {


        $User = M('order'); // 实例化User对象

        //分页
        //$orderList = $User->limit(1)->select();
        $count = $User->where('status=1')->count();// 查询满足要求的总记录数
        $Page = new Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $User->where('')->limit($Page->firstRow.','.$Page->listRows)->select();
        $orderno=$User->where('orderno');


        $this->assign('orsrno',$orderno);// 获取订单编号
        $this->assign('list',$list);// 赋值数据集
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('page',$show);// 赋值分页输出


        $this->display('User_Orderform');
    }
}