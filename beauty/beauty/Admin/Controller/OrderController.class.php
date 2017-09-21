<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;
class OrderController extends BgController{
    public function index(){
        if(IS_GET){
            $keywords=I('get.keywords');
            if($keywords){
                $where['o.orderno']=array('like',"%$keywords%");
            }else{
                $where='';
            }
        if(I('get.time1')&& !I('get.time2')){
                $time1=strtotime(I('get.time1'));
                $where['o.create_time']=array('gt',$time1);
            }elseif(I('get.time2') && !I('get.time1')){
                $time2=strtotime(I('get.time2'));
                $where['o.create_time']=array('lt',$time2);
            }else if(I('get.time2') && I('get.time1')){
                $time1=strtotime(I('get.time1'));
                $time2=strtotime(I('get.time2'));
                $where['o.create_time']=array('between',array($time1,$time2));
            }
        }
        $User = M('order'); // 实例化User对象
        $count = $User
            ->table('beauty_order o')
            ->where($where)
            ->count();// 查询满足要求的总记录数
        $Page = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        //进行分页数据查询 注意limit方法的参数要使用Page类的属性
//        $where['o.status']='os.id';
//        $where['u.id']='o.mid';
        $where['_string']='o.status=os.id and u.id=o.mid';
        $list = $User
            ->table('beauty_order_status os,beauty_order o,beauty_user u')
            ->where($where)
            ->field('o.price,o.orderno,o.create_time,u.username,os.adminstatus,os.statusname,o.id')
            ->order('o.id desc')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('keywords',$keywords);
        $this->display('list');
    }
    public function detial(){
        $oid=I('get.oid');
        $User=M('order');
        $list=$User
            ->table(array('beauty_order'=>'o','beauty_addresses'=>'a'))
            ->where(' o.address=a.id')
            ->where(array('o.id'=>$oid))
            ->field('a.username,a.area,a.address,o.create_time,a.mobile,a.ecode,o.orderno,o.id')
            ->select();
        foreach($list as $k=>$v){
            $list[$k]['goods']=$User
                ->table(array('beauty_order_goods'=>'og','beauty_goods'=>'g'))
                ->where(array('og.oid'=>$v['id']))
                ->field('g.goodsname,og.buynum,og.saleprice,g.imagename,g.imageurl')
                ->where('og.gid=g.id')
                ->select();
        }
        $this->assign('list',$list);
        $this->display('detial');
    }

    public function dfk(){
        if(IS_GET){
            $keywords=I('get.keywords');
            $where['orderno']=array('like',"%$keywords%");
        }else{
            $where='';
        }
        if(I('get.time1')&& !I('get.time2')){
            $time1=strtotime(I('get.time1'));
            $where['o.create_time']=array('gt',$time1);
        }elseif(I('get.time2') && !I('get.time1')){
            $time2=strtotime(I('get.time2'));
            $where['o.create_time']=array('lt',$time2);
        }else if(I('get.time2') && I('get.time1')){
            $time1=strtotime(I('get.time1'));
            $time2=strtotime(I('get.time2'));
            $where['o.create_time']=array('between',array($time1,$time2));
        }
        $User = M('order'); // 实例化User对象
        $count = $User->where($where)->where('status=1')->count();// 查询满足要求的总记录数
        $Page = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list=$User
            ->table(array('beauty_order_status'=>'os','beauty_order'=>'o','beauty_user'=>'u'))
            ->where('os.id=o.status and status=1 and o.mid=u.id ')
            ->field('o.price,o.orderno,o.create_time,u.username,os.adminstatus,os.statusname,o.id')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->order('o.id desc')
            ->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('keywords',$keywords);
        $this->display('dfk');
    }


    public function dfh(){
        if(IS_GET){
            $keywords=I('get.keywords');
            $where['orderno']=array('like',"%$keywords%");
        }else{
            $where='';
        }
        if(I('get.time1')&& !I('get.time2')){
            $time1=strtotime(I('get.time1'));
            $where['o.create_time']=array('gt',$time1);
        }elseif(I('get.time2') && !I('get.time1')){
            $time2=strtotime(I('get.time2'));
            $where['o.create_time']=array('lt',$time2);
        }else if(I('get.time2') && I('get.time1')){
            $time1=strtotime(I('get.time1'));
            $time2=strtotime(I('get.time2'));
            $where['o.create_time']=array('between',array($time1,$time2));
        }
        $User = M('order'); // 实例化User对象
        $count = $User->where($where)->where('status=2')->count();// 查询满足要求的总记录数
        $Page = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list=$User
            ->table(array('beauty_order_status'=>'os','beauty_order'=>'o','beauty_user'=>'u'))
            ->field('o.price,o.orderno,o.create_time,u.username,os.adminstatus,os.statusname,o.id')
            ->where('os.id=o.status and status=2 and o.mid=u.id ')
            ->order('o.id desc')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('keywords',$keywords);
        $this->display('dfh');
    }


    public function yfh(){
        if(IS_GET){
            $keywords=I('get.keywords');
            $where['orderno']=array('like',"%$keywords%");
        }else{
            $where='';
        }
        if(I('get.time1')&& !I('get.time2')){
            $time1=strtotime(I('get.time1'));
            $where['o.create_time']=array('gt',$time1);
        }elseif(I('get.time2') && !I('get.time1')){
            $time2=strtotime(I('get.time2'));
            $where['o.create_time']=array('lt',$time2);
        }else if(I('get.time2') && I('get.time1')){
            $time1=strtotime(I('get.time1'));
            $time2=strtotime(I('get.time2'));
            $where['o.create_time']=array('between',array($time1,$time2));
        }
        $User = M('order'); // 实例化User对象
        $count = $User->where($where)->where('status=3')->count();// 查询满足要求的总记录数
        $Page = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list=$User
            ->table(array('beauty_order_status'=>'os','beauty_order'=>'o','beauty_user'=>'u'))
            ->field('o.price,o.orderno,o.create_time,u.username,os.adminstatus,os.statusname,o.id')
            ->where('os.id=o.status and status=3 and o.mid=u.id ')
            ->order('o.id desc')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('keywords',$keywords);
        $this->display('yfh');
    }


    public function ysh(){
        if(IS_GET){
            $keywords=I('get.keywords');
            $where['orderno']=array('like',"%$keywords%");
        }else{
            $where='';
        }
        if(I('get.time1')&& !I('get.time2')){
            $time1=strtotime(I('get.time1'));
            $where['o.create_time']=array('gt',$time1);
        }elseif(I('get.time2') && !I('get.time1')){
            $time2=strtotime(I('get.time2'));
            $where['o.create_time']=array('lt',$time2);
        }else if(I('get.time2') && I('get.time1')){
            $time1=strtotime(I('get.time1'));
            $time2=strtotime(I('get.time2'));
            $where['o.create_time']=array('between',array($time1,$time2));
        }
        $User = M('order'); // 实例化User对象
        $count = $User->where($where)->where('status=4')->count();// 查询满足要求的总记录数
        $Page = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list=$User
            ->table(array('beauty_order_status'=>'os','beauty_order'=>'o','beauty_user'=>'u'))
            ->field('o.price,o.orderno,o.create_time,u.username,os.adminstatus,os.statusname,o.id')
            ->where('os.id=o.status and status=4 and o.mid=u.id ')
            ->order('o.id desc')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('keywords',$keywords);
        $this->display('ysh');
    }


    public function ypj(){
        if(IS_GET){
            $keywords=I('get.keywords');
            $where['orderno']=array('like',"%$keywords%");
        }else{
            $where='';
        }
        if(I('get.time1')&& !I('get.time2')){
            $time1=strtotime(I('get.time1'));
            $where['o.create_time']=array('gt',$time1);
        }elseif(I('get.time2') && !I('get.time1')){
            $time2=strtotime(I('get.time2'));
            $where['o.create_time']=array('lt',$time2);
        }else if(I('get.time2') && I('get.time1')){
            $time1=strtotime(I('get.time1'));
            $time2=strtotime(I('get.time2'));
            $where['o.create_time']=array('between',array($time1,$time2));
        }
        $User = M('order'); // 实例化User对象
        $count = $User->where($where)->where('status=5')->count();// 查询满足要求的总记录数
        $Page = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出

// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list=$User
            ->table(array('beauty_order_status'=>'os','beauty_order'=>'o','beauty_user'=>'u'))
            ->field('o.price,o.orderno,o.create_time,u.username,os.adminstatus,os.statusname,o.id')
            ->where('os.id=o.status and status=5 and o.mid=u.id ')
            ->order('o.id desc')
            ->limit($Page->firstRow.','.$Page->listRows)
            ->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('keywords',$keywords);
        $this->display('ysh');
    }

    public function sendGoods(){
        if(IS_AJAX){
            $User = M("order"); // 实例化User对象
            $id=I('post.id');
            //$where['id']=array('id'=>$id);
            //$where['mid']=session('mid');
            $data=$User->where(array('id'=>$id))->find();
            //$this->success($where);
            if($data['status']==2){
                $data['status']=3;
                $info=$User->where(array('id'=>$id))->field('status')->save($data); // 根据条件更新记录
                if($info){
                    $this->success("成功");
                }else{
                    $this->error("失败");
                }
            }else{
                $this->error("失败");
            }
        }else{
            $this->display('list');
        }
    }


    public function export()
    {
        $file_name="订单列表".date("Y-m-d H:i:s",time());
        $file_suffix = "xls";
        //$where='';

        if(IS_GET){
            $keywords=I('get.keywords');
            if($keywords){
                $where['o.orderno']=array('like',"%$keywords%");
            }else{
                $where='';
            }
            if(I('get.time1')&& !I('get.time2')){
                $time1=strtotime(I('get.time1'));
                $where['o.create_time']=array('gt',$time1);
            }elseif(I('get.time2') && !I('get.time1')){
                $time2=strtotime(I('get.time2'));
                $where['o.create_time']=array('lt',$time2);
            }else if(I('get.time2') && I('get.time1')){
                $time1=strtotime(I('get.time1'));
                $time2=strtotime(I('get.time2'));
                $where['o.create_time']=array('between',array($time1,$time2));
            }
        }

        $where['_string']='o.status=os.id and u.id=o.mid';
        $list =  M('order')
            ->table('beauty_order_status os,beauty_order o,beauty_user u')
            ->where($where)
            ->field('o.price,o.orderno,o.create_time,u.username,os.adminstatus,os.statusname,o.id')
            ->order('o.id desc')
            ->select();
        if(IS_AJAX){
            if($list){
                $this->success();
            }else{
                $this->error('无当前订单信息');
            }
        }
        header("Content-Type:application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=$file_name.$file_suffix");
        //根据业务，自己进行模板赋值。
        $this->assign('list',$list);
        $this->display('export');
    }


}