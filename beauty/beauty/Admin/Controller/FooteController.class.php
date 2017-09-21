<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
use Think\Image;
class FooteController extends Controller{
    //展示底部列表
    public function index(){
        if(I('get.pid')){
            $pid=I('get.pid');
        }else{
            $pid=0;
        }
        $count= $fnamelist=M('Foote')->where(array('pid'=>$pid))->count();
        $Page=new Page($count,8);
        $show=$Page->show();
        $fnamelist=M('Foote')->where(array('pid'=>$pid))->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('fnamelist',$fnamelist);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $currentPage=ceil(($Page->firstRow+1)/2);
        $this->assign('currentPage',$currentPage);
        $this->assign('empty','<h1 style="font-weight: bold;font-size: 20px;">没有找到相关数据</h1>');
        $this->display('list');
  }

    //展示添加底部的页面
    public function add(){
        $this->display('add');
    }

    //展示需要编辑的底部分类
    public function editor(){
        $id=I('get.phid');
        $where['id']=$id;
        $catename=M('Foote')->field('fname')->where($where)->find();
        $this->assign('cname',$catename['fname']);
        $this->assign('id',$id);
        $this->display('editor');
    }

    //对底部进行上架下架展示
    public function updateshow(){
        //foote表的id
        $ptid=I('post.ptid');
        //foote表的pid;
       /* $pid=I('post.pid');*/
        $where['id']=$ptid;
        $show=M('Foote')->field('show')->where($where)->find();
        if($show['show']){
                $data['show']=0;
                $pathinfo=M('Foote')->field('path')->where(array('id'=>$ptid))->find();
                $path=$pathinfo['path'].',';
                $childwhere['path']=array('like',"{$path}%");
                $childinfo=M('Foote')->where($childwhere)->select();
                $str=$ptid.',';
                foreach($childinfo as $k=>$v){
                    $str.=$v['id'].',';
                }
                $str=substr($str,0,-1);
                $chwhere['id']=array('in',$str);
                M('Foote')->where($chwhere)->save($data);
                $this->success(0);
        }else{
            $data['show']=1;
            $pathinfo=M('Foote')->field('path')->where(array('id'=>$ptid))->find();
            $path=$pathinfo['path'].',';
            $childwhere['path']=array('like',"{$path}%");
            $childinfo=M('Foote')->where($childwhere)->select();
            $str=$ptid.',';
            foreach($childinfo as $k=>$v){
                $str.=$v['id'].',';
            }
            $str=substr($str,0,-1);
            $chwhere['id']=array('in',$str);
            M('Foote')->where($chwhere)->save($data);
            $this->success(1);
        }
    }

    //进行查询
    public function search(){
        $fname=I('get.fname');
        $where['fname']=array('like',"%$fname%");
        $count= $fnamelist=M('Foote')->where($where)->count();
        $Page=new Page($count,8);
        $show=$Page->show();
        $fnamelist=M('Foote')->where($where)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('fnamelist',$fnamelist);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $currentPage=ceil(($Page->firstRow+1)/2);
        $this->assign('currentPage',$currentPage);
        $this->assign('empty','<h1 style="font-weight: bold;font-size: 20px;">没有找到相关数据</h1>');
        $this->display('list');
    }


    /*显示三级联动分类*/
    public function getCateByPid(){
        $pid=I('post.pid',0);//如果有pid 则用I拿  如果没有则 默认为pid=0
        $cateList=D('Foote')->getCateByPid($pid);//通过实例化CategoryModel类来调用getCateByPid()方法  得到数据
        if($cateList){
            $this->success($cateList);
        }else{
            $this->error("查询失败");
        }
    }

    /*向数据表中添加分类*/
    public function addCateByPid()
    {
        $dijicount=M('Foote')->where(array('pid'=>0))->count();
        if (I('post.secondCate')) {
            $pid = I('post.secondCate');
        } else{
            $pid = I('post.firstCate');
        }
        $fname= I('post.fname');
        if ($fname == '') {
            $this->error("底部分类名不能为空");
        }else{
            if(M('Foote')->query("select fname from beauty_foote where fname='{$fname}'")){
                $this->error('底部分类名已经存在');
            }elseif($dijicount==5){
                $this->error('最多只能添加5条顶级分类哦');
            }
            else{
                $date['fname']=$fname;
                $date['pid']=$pid;
                $date['addtime']=time();
                M('Foote')->data($date)->add();
                $where1['fname']=$fname;
                $lastId=M('Foote')->field('id')->where($where1)->find();
                if($lastId){
                    if($pid==0){
                        $path['path']=$lastId['id'];
                    }else{
                        $where2['id']=$pid;
                        $pathInfo=M('Foote')->field('path')->where($where2)->find();
                        $path['path']=$pathInfo['path'].','.$lastId['id'];
                    }
                    $where3['id']=$lastId['id'];
                    M('Foote')->field('path')->where($where3)->save($path);
                    $this->success('添加成功');
                }
            }
        }
    }
    //对分类的路径进行编辑
    public function editorCateByPid(){
        if (I('post.secondCate')) {
            $pid = I('post.secondCate');
        } else{
            $pid = I('post.firstCate');
        }
        $id=I('post.id');
        $fname=I('post.fname');
        if($pid==0){
            $newpath=$id;/*如果选择的分类的pid=0则让添加的分类新path=它自己的id*/
        }else{
            $where['id']=$pid;
            $pathInfo=M('Foote')->field('path')->where($where)->find();
            $newpath=$pathInfo['path'].','.$id;
        }
        //用此路径代替老路径
        //拿到要修改的路径
        $where1['id']=$id;
        $cateInfo=M('Foote')->field('path')->where($where1)->find();
        $oldpath=$cateInfo['path'];
        //更新分类的cname,pid,path
        $where1['id']=$id;
        $date['path']=$newpath;
        $date['pid']=$pid;
        $date['fname']=$fname;
        $res1=M('Foote')->where($where1)->save($date);
        //更新子分类的path
        $res2=M('Foote')->query("update beauty_foote set path=replace(path,'{$oldpath}','{$newpath}')  where path like '{$oldpath}%'");
        if($res1||$res2){
            $this->success("编辑成功");
        }else{
            $this->error("编辑失败");
        }
    }

    public function news(){
        $id=I('get.id');
        $fnameinfo=M('Foote')->where(array('id'=>$id))->find();
        $this->assign('fname',$fnameinfo['fname']);
        $this->assign('id',$id);
        $this->display('addnews');
    }

    public function addnews(){
        if(IS_POST){
            $goods=D('Foote');
            $data=$goods->create();
            $id=I('get.fid');
            if($data){
                session('lastGid',$id);
                $newtitle=I('post.newtitle');
                $footewhere['newtitle']=$newtitle;
                if(M('Foote')->where($footewhere)->find()){
                    $data1['newcontent']=I('post.newcontent');
                    $data1['addtime']=time();
                    M('Foote')->where(array('id'=>$id))->save($data1);
                }
                $data['newaddtime']=time();
                if(M('Foote')->where(array('id'=>$id))->save($data)){
                    $this->success('添加成功');
                }
        }else{
                $this->error($goods->getError());
            }
    }else{
            $this->display('addnews');
        }
  }

}