<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Crypt\Driver\Think;
use Think\Page;
use Org\Yh\AjaxPage;
class SaleController extends BgController{
    /*后台活动发布中的活动列表*/
    public function index(){
        $activityObj=D('activity');
/*当时间过期时自动更新状态*/
        $stoptime=$activityObj->field('stoptime')->select();
        foreach($stoptime as $v){
            if($v['stoptime']<time()){
                $date['astatus']=0;
                $where1['stoptime']=$v['stoptime'];$activityObj->where($where1)->save($date);
                $activityObj->where($where1)->save($date);
            }else{
                $date['astatus']=1;
                $where2['stoptime']=$v['stoptime'];
                D('activity')->where($where2)->save($date);
            }
        }
        $count      = $activityObj->table('beauty_brands b,beauty_activity a')
            ->where('b.id=a.bid')->count();// 查询满足要求的总记录数
        $Page       = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list=$activityObj->table('beauty_brands b,beauty_activity a')
            ->where('b.id=a.bid')
            ->order('a.addtime desc')
            ->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('count',$count);
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $currentPage=ceil(($Page->firstRow+1)/2);
        $this->assign('currentPage',$currentPage);
        $this->display('list'); // 输出模板
    }

    public function search(){
        $activityObj=D('activity');
        if (IS_GET) {
            if(I('get.time1')&&I('get.time2')){
                $time1=strtotime(I('get.time1'));
                $time2=strtotime(I('get.time2'));
                $where['a.addtime']=array('between',array($time1,$time2));
            }elseif(I('get.time2')){
                $time2=strtotime(I('get.time2'));
                $where['a.addtime']=array('lt',$time2);
            }elseif(I('get.time1')){
                $time1=strtotime(I('get.time1'));
                $where['a.addtime']=array('gt',$time1);
            }
            if($keywords = I('get.keywords')){
                $where['a.aname'] = array('like',"%$keywords%");
            }

            $count      = $activityObj->table('beauty_brands b,beauty_activity a')
                ->where('b.id=a.bid')
                ->where($where)
                ->count();// 查询满足要求的总记录数
            $Page       = new Page($count,8);// 实例化分页类 传入总记录数和每页显示的记录数(25)
            $show       = $Page->show();// 分页显示输出
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
//            print_r($where);
            $list=$activityObj->table('beauty_brands b,beauty_activity a')
                ->where('b.id=a.bid')
                ->where($where)
                ->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('count',$count);
            $this->assign('firstRow',$Page->firstRow);
            $this->assign('list',$list);// 赋值数据集
            $this->assign('page',$show);// 赋值分页输出
            $currentPage=ceil(($Page->firstRow+1)/2);
            $this->assign('currentPage',$currentPage);
            $this->assign('keywords',I('keywords'));
            $this->assign('time1',I('time1'));
            $this->assign('time2',I('time2'));
            $this->display('list'); // 输出模板
        }
    }


//后台活动发布中的活动列表的编辑
    public function editor(){
        $id=I('get.id');
        $where['a.id']=$id;
        $activityObj=D('activity');
        $date=$activityObj->table('beauty_brands b,beauty_activity a')->where($where)->where('b.id=a.bid')->field('a.bid,a.aname,a.rules,b.bname,a.starttime,a.stoptime')->find();
        $this->assign('bname',$date['bname']);
        $this->assign('aname',$date['aname']);
        $this->assign('rules',$date['rules']);
        $this->assign('bid',$date['bid']);
        $this->assign('starttime',$date['starttime']);
        $this->assign('stoptime',$date['stoptime']);
        $this->assign('id',$id);
        $brandsList=D('Brands')->getBrandsList();
        $this->assign('bransList',$brandsList);
        $this->display('editor');
    }


    public function update(){
        $where['bname']=I('bname');
        $brandInfo=M('brands')->field('id')->where($where)->find();
            if( strtotime(I('post.time1'))<strtotime(I('post.time2'))){
                $date['starttime']=strtotime(I('time1'));
                $date['stoptime']=strtotime(I('time2'));
                $date['aname']=I('aname');
                $date['rules']=I('rules');
                $date['astaus']=1;
                $date['bid']=$brandInfo['id'];
                $id=I('id');
                $where2['id']=$id;
                M('activity')->where($where2)->save($date);
                $this->success();
            }else{
                $this->error(2);
            }
        }


//后台活动发布中的添加活动  得到品牌列表
    public function add(){
//        $brandsList=D('brands')->getBrandsList();
        if(S('brandsList')){
            $brandsList=S('brandsList');
        }else{
            $brandsList=D('brands')->getBrandsList();
            S('brandsList',$brandsList,20);
        }
        $this->assign('brandsList',$brandsList);
        $this->display('add');
    }
//在添加活动中    后台清除品牌列表的方法
    public function clearCache(){
        //清单个缓存
        S('brandsList',null);
        //清除快速缓存
        //F('goods',null);
        //清除所有缓存
        // \Think\Cache::getInstance()->clear();

        $this->success('成功清除');
    }

/*添加活动*/
    public function addActivity(){
        if(I('post.bname')&&I('post.rules')&&I('post.aname')){
            $aname=I('post.aname');
            $date['rules']=I('rules');
            if( strtotime(I('post.time1'))<strtotime(I('post.time2'))&&strtotime(I('post.time2'))>time()){
                $date['aname']=$aname;
                $date['starttime']=strtotime(I('post.time1'));
                $date['stoptime']=strtotime(I('post.time2'));
                $where['bname']=I('post.bname');
                $brandInfo= M('brands')->field('id')->where($where)->find();
                $where2['aname']=$aname;
                $where2['bid']=$brandInfo['id'];
                $date['bid']=$brandInfo['id'];
                $aInfo= M('activity')->field('id')->where($where2)->find();
                if($aInfo){
                    $this->error(3);
                }else{
                    $date['addtime']=time();
                    M('activity')->add($date);
                    $this->success(1);
                }
            }else{
                $this->error(2);
            }
        }else{
            $this->error(1);
        }
    }
}