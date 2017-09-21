<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Controller;
use Think\Model;
use Think\Page;

class CategoryController extends BgController{
    /*分类列表*/
    public function index()
    {
        if(IS_GET){
            if(I('get.time1')&& !I('get.time2')){
                $time1=strtotime(I('get.time1'));
                $where1['addtime']=array('gt',$time1);
            }elseif(I('get.time2') && !I('get.time1')){
                $time2=strtotime(I('get.time2'));
                $where1['addtime']=array('lt',$time2);
            }else if(I('get.time2') && I('get.time1')){
                $time1=strtotime(I('get.time1'));
                $time2=strtotime(I('get.time2'));
                $where1['addtime']=array('between',array($time1,$time2));
            }
            $keywords=I('get.keywords');
            $where1['cname']=array('like',"%$keywords%");
        }else{
            $where1='';
        }
        $c=M('Category');
        $count=$c->where($where1)->count();
        $Page=new Page($count,8);
        $show=$Page->show();

        //进行分页数据查询，注意limit方法的参数要使用Page类的属性
        /*where($where1)->limit($Page->firstRow.','.$Page->listRows)->*/

        $list1=$c->where($where1)->limit($Page->firstRow.','.$Page->listRows)->select();
        $list2=array();
        $list3=array();

        foreach($list1 as $v1){
            $where['id']=array('in',$v1['path']);
            $list2[]=$c->where($where)->select();
        }
        foreach($list2 as $k=>$v2){
            foreach($v2 as $v3){
                $list3[$k]['path'].=$v3['cname'].'->';
            }
        }

        $this->assign('list1',$list1);
        $this->assign('list3',$list3);
        $this->assign('page',$show);
        $this->assign('keywords',$keywords);
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('count',$count);
        $currentPage=ceil(($Page->firstRow+1)/2);
        $this->assign('currentPage',$currentPage);
        $this->display('list');
    }


    public function add()
    {
        $this->display('add');
    }

    /*显示三级联动分类*/
    public function getCateByPid(){
        $pid=I('post.pid',0);//如果有pid 则用I拿  如果没有则 默认为pid=0
        $cateList=D('Category')->getCateByPid($pid);//通过实例化CategoryModel类来调用getCateByPid()方法  得到数据
        if($cateList){
            $this->success($cateList);
        }else{
            $this->error("查询失败");
        }
    }


/*向数据表中添加分类*/
    public function addCateByPid()
    {
        if (I('post.thirdCate')) {
            $pid = I('post.thirdCate');
        } elseif (I('post.secondCate')) {
            $pid = I('post.secondCate');
        } else {
            $pid = I('post.firstCate');
        }
        $cname = I('post.cname');
        if ($cname == '') {
            $this->error("分类名不能为空");
        }else{
            if(M('category')->query("select cname from beauty_category where cname='{$cname}'")){
                $this->error('分类名已经存在');
            }else{
                $date['cname']=$cname;
                $date['pid']=$pid;
                $date['addtime']=time();
                M('category')->data($date)->add();
                $where1['cname']=$cname;
                $lastId=M('category')->field('id')->where($where1)->find();
                if($lastId){
                    if($pid==0){
                        $path['path']=$lastId['id'];
                    }else{
                        $where2['id']=$pid;
                        $pathInfo=M('category')->field('path')->where($where2)->find();
                        $path['path']=$pathInfo['path'].','.$lastId['id'];
                        //$this->success($path);
                    }
                    $where3['id']=$lastId['id'];
                    M('category')->field('path')->where($where3)->save($path);
                    $this->success("添加成功");
                }
            }

        }
    }


    public function updateshow(){
        //foote表的id
        $ptid=I('post.id');
        //foote表的pid;
        /* $pid=I('post.pid');*/
        $where['id']=$ptid;
        $show=M('category')->field('show')->where($where)->find();
        if($show['show']==1){
            $data['show']=0;
            $pathinfo=M('category')->field('path')->where(array('id'=>$ptid))->find();
            $path=$pathinfo['path'].',';
            $childwhere['path']=array('like',"{$path}%");
            $childinfo=M('category')->where($childwhere)->select();
            $str=$ptid.',';
            foreach($childinfo as $k=>$v){
                $str.=$v['id'].',';
            }
            $str=substr($str,0,-1);
            $chwhere['id']=array('in',$str);
            M('category')->where($chwhere)->save($data);
            $where1['cid']=array('in',$str);
            M('goods')->where($where1)->save($data);
            $this->success(0);
        }else{
            $data['show']=1;
            $pathinfo=M('category')->field('path')->where(array('id'=>$ptid))->find();
            $path=$pathinfo['path'].',';
            $childwhere['path']=array('like',"{$path}%");
            $childinfo=M('category')->where($childwhere)->select();
            $str=$ptid.',';
            foreach($childinfo as $k=>$v){
                $str.=$v['id'].',';
            }
            $str=substr($str,0,-1);
            $chwhere['id']=array('in',$str);
            M('category')->where($chwhere)->save($data);
            $where1['cid']=array('in',$str);
            M('goods')->where($where1)->save($data);
            $this->success(1);
        }
    }

/*分类上架下架*/
    public function showCate(){
        $categoryObj=D('category');
// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $where['id']=I('id');
        $date=$categoryObj->where($where)->field('show')->find();
        //print_r($date);
        if($date['show']==0){
            $date['show']=1;
            $categoryObj->where($where)->field('show')->save($date);
        }else{
            $date['show']=0;
            $categoryObj->where($where)->field('show')->save($date);
        }
        $this->index();
    }
/*分类上架下架结束*/
/*点击编辑显示编辑页*/
    public function editorCate(){
        $id=I('id');
        $where['id']=$id;
        $catename=M('category')->field('cname')->where($where)->find();
        $this->assign('cname',$catename['cname']);
        $this->assign('id',$id);
        $this->display('editor');
    }
/*分类编辑*/
    public function editorCateByPid(){
        if (I('post.thirdCate')) {
            $pid = I('post.thirdCate');
        } elseif (I('post.secondCate')) {
            $pid = I('post.secondCate');
        } else {
            $pid = I('post.firstCate');
        }
        $id=I('post.id');
        $cname=I('post.cname');
        if($pid==0){
            $newpath=$id;/*如果选择的分类的pid=0则让添加的分类新path=它自己的id*/
        }else{
            $where['id']=$pid;
            $pathInfo=M('category')->field('path')->where($where)->find();
            $newpath=$pathInfo['path'].','.$id;
        }
        //用此路径代替老路径
        //拿到要修改的路径
        $where1['id']=$id;
        $cateInfo=M('category')->field('path')->where($where1)->find();
        $oldpath=$cateInfo['path'];
        //更新分类的cname,pid,path
        $where1['id']=$id;
        $date['path']=$newpath;
        $date['pid']=$pid;
        $date['cname']=$cname;
        $res1=M('category')->where($where1)->save($date);
        //更新子分类的path
        $res2=M('category')->execute("update beauty_category set path=replace(path,'{$oldpath}','{$newpath}')  where path like '{$oldpath}%'");
        if($res1||$res2){
            $this->success("编辑成功");
        }else{
            $this->error("编辑失败");
        }
    }

    public function export()
    {
        $file_name="分类列表".date("Y-m-d H:i:s",time());
        $file_suffix = "xls";
        $where='';
        if(IS_GET){
            if(I('get.time1')&& !I('get.time2')){
                $time1=strtotime(I('get.time1'));
                $where1['addtime']=array('gt',$time1);
            }elseif(I('get.time2') && !I('get.time1')){
                $time2=strtotime(I('get.time2'));
                $where1['addtime']=array('lt',$time2);
            }else if(I('get.time2') && I('get.time1')){
                $time1=strtotime(I('get.time1'));
                $time2=strtotime(I('get.time2'));
                $where1['addtime']=array('between',array($time1,$time2));
            }
            $keywords=I('get.keywords');
            $where1['cname']=array('like',"%$keywords%");
        }
        $c=M('Category');
        $list1=$c->where($where1)->select();
        $list2=array();
        $list3=array();
        foreach($list1 as $v1){
            $where['id']=array('in',$v1['path']);
            $list2[]=$c->where($where)->select();
        }
        foreach($list2 as $k=>$v2){
            foreach($v2 as $v3){
                $list3[$k]['path'].=$v3['cname'].'->';
            }
        }
        if(IS_AJAX){
            if($list1&&$list2&&$list3){
                $this->success();
            }else{
                $this->error('无当前商品列表信息');
            }
        }
        header("Content-Type:application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=$file_name.$file_suffix");
        //根据业务，自己进行模板赋值。
        $this->assign('list1',$list1);
        $this->assign('list3',$list3);
        $this->display('export');
    }

}