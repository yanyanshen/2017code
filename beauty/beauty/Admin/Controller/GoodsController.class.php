<?php
namespace Admin\Controller;
use Admin\Common\Controller\BgController;
use Think\Page;
use Think\Upload;
use Think\Image;
header('content-type:text/html;charset=utf-8');
class GoodsController extends BgController{
    public function index(){
        $goods=M('Goods');
        $count=$goods->field('g.imagename,g.id,g.goodsname,g.imageurl,g.saleprice,g.marketprice,g.discount,c.cname,b.bname,g.score,g.description,g.num,g.salenum,g.addtime,g.show')
            ->table('beauty_goods g,beauty_category c,beauty_brands b')
            ->where('g.cid=c.id and g.bid=b.id')->count();// 查询满足要求的总记录数
        $Page = new Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数(1)
        $show = $Page->show();// 分页显示输出
            // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
            $goodslist=$goods->field('g.imagename,g.id,g.goodsname,g.imageurl,g.saleprice,g.marketprice,g.discount,c.cname,b.bname,g.score,g.description,g.num,g.salenum,g.addtime,g.show')
                ->table('beauty_goods g,beauty_category c,beauty_brands b')
                ->where('g.cid=c.id and g.bid=b.id')
                ->limit($Page->firstRow.','.$Page->listRows)->order(array('g.addtime'=>'desc'))->select();//查询符合条件的评论列表
        $this->assign('goodslist',$goodslist);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('current',ceil(($Page->firstRow+1)/10));
        $this->assign('count',$count);
        $this->assign('goodslist',$goodslist);
        $this->display('list');
    }

    //在添加活动中    后台清除品牌列表的方法
    public function clearCache(){
        //清单个缓存
        S('goodslist',null);
        $this->success('成功清除');
    }

    //更新商品的上下架
    public function updateshow(){
        $gid=I('post.gid');
        $where['id']=$gid;
            $show=M('Goods')->where($where)->find();
            if($show['show']==1){
                $data['show']=0;
               if(M('Goods')->where($where)->save($data)) {
                   $this->success(0);
               }
            }else{
                    $data['show']=1;
                    if(M('Goods')->where($where)->save($data)){
                        $this->success(1);
                    }
            }
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

    //后台活动发布中的添加活动
    public function brandlist(){
        $brandsList=D('brands')->getBrandsList();
        $this->success($brandsList);
    }

//查询
    public function search(){
        $goods=M('Goods');
        if(IS_GET){
         if(I('get.goodsname')){
                $goodsname=I('get.goodsname');
                $where['g.goodsname']=array('like',"%$goodsname%");
                $this->assign('goodsname',$goodsname);
         }
        if(I('get.time1')&& !I('get.time2')){
            $time1=strtotime(I('get.time1'));
            $where['g.addtime']=array('gt',$time1);
            $this->assign('time1',date('Y-m-d',$time1));
        }elseif(I('get.time2') && !I('get.time1')){
            $time2=strtotime(I('get.time2'));
            $where['g.addtime']=array('lt',$time2);
            $this->assign('time2',date('Y-m-d',$time2));
        }else if(I('get.time2') && I('get.time1')){
            $time1=strtotime(I('get.time1'));
            $time2=strtotime(I('get.time2'));
            $where['g.addtime']=array('between',array($time1,$time2));
        }
        if(I('get.bname')){
            $where['b.bname']=I('get.bname');
            $this->assign('bname',I('get.bname'));
        }
        if(I('get.cname')){
            $where['c.cname']=I('get.cname');
            $this->assign('cname',I('get.cname'));
        }
        if(I('get.saleprice1')&& !I('get.saleprice2')){
            $saleprice1=I('get.saleptice1');
            $where['g.saleprice']=array('gt',$saleprice1);
            $this->assign('saleprice1',$saleprice1);
        }elseif(I('get.saleprice2') && !I('get.saleprice1')){
            $saleprice2=I('get.saleprice2');
            $where['g.saleprice']=array('lt',$saleprice2);
            $this->assign('saleprice2',$saleprice2);
        }else if(I('get.saleprice1') && I('get.saleprice2')){
            $saleprice1=I('get.saleprice1');
            $saleprice2=I('get.saleprice2');
            $where['g.saleprice']=array('between',array($saleprice1,$saleprice2));
        }
        $where['_string']='g.cid=c.id and g.bid=b.id';
        }
        $count=$goods->field('g.id,g.goodsname,g.imagename,g.imageurl,g.saleprice,g.marketprice,g.discount,c.cname,b.bname,g.score,g.description,g.num,g.salenum,g.addtime,g.show')
            ->table('beauty_goods g,beauty_category c,beauty_brands b')
            ->where($where)->count();// 查询满足要求的总记录数
        $Page = new Page($count,12);// 实例化分页类 传入总记录数和每页显示的记录数(1)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $goodslist=$goods->field('g.id,g.goodsname,g.imagename,g.imageurl,g.saleprice,g.marketprice,g.discount,c.cname,b.bname,g.score,g.description,g.num,g.salenum,g.addtime,g.show')
            ->table('beauty_goods g,beauty_category c,beauty_brands b')
            ->limit($Page->firstRow.','.$Page->listRows)->order(array('g.addtime'=>'desc'))->where($where)->select();//查询符合条件的评论列表
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('firstRow',$Page->firstRow);
        $this->assign('current',ceil(($Page->firstRow+1)/2));
        $this->assign('count',$count);
        $this->assign('where',$where);
        $this->assign('empty','<h1 style="font-size: 20px;">没有找到相应的数据</h1>');
        $this->assign('goodslist',$goodslist);
        $this->display('list');
 }

    //添加商品
    public function addAct(){
            if(IS_POST){
                $goods=D('Goods');
                $data=$goods->create();
                if($data){
                    if(I('post.thirdCate')){
                        $cid=I('post.thirdCate');
                    }elseif(I('post.secondCate')){
                        $cid=I('post.secondCate');
                    }else{
                        if(I('post.firstCate')){
                            $cid=I('post.firstCate');
                        }else{
                            $cid=1;
                        }
                    }
                    $bid=I('post.bname');
                    $goodsname=I('post.goodsname');
                    $goodswhere['bid']=$bid;
                    $goodswhere['cid']=$cid;
                    $goodswhere['goodsname']=$goodsname;
                    if(M('Goods')->where($goodswhere)->find()){
                        $this->error('该商品已经存在,请重新添加');
                    }
                    $data['cid']=$cid;
                    $salepricestr=I('post.saleprice');
                    $salepricearr=explode(',',$salepricestr);
                    $data['saleprice']=$salepricearr[0];
                    $common=A('Common');
                    $info=$common->uploadPic();
                    if(is_array($info)){
                        $image=new Image();
                        //获取图片文件路径
                        $filename='./Uploads/'.$info[0]['savepath'].$info[0]['savename'];
                        //缩略
                        $thumb500='./Uploads/'.$info[0]['savepath'].'500_'.$info[0]['savename'];
                        $thumb300='./Uploads/'.$info[0]['savepath'].'300_'.$info[0]['savename'];
                        $thumb100='./Uploads/'.$info[0]['savepath'].'100_'.$info[0]['savename'];
                        $image->open($filename)->thumb('300','300')->save($thumb300);
                        $image->open($filename)->thumb('100','100')->save($thumb100);
                        $image->open($filename)->thumb('500','500')->save($thumb500);

                    }else{
                        $this->error();
                    }
                    $data['addtime']=time();
                    $data['imageurl']=$info[0]['savepath'];
                    $data['imagename']=$info[0]['savename'];
                    $gid=$goods->addGoods($data);
                    if($gid){
                        session('lastGid',$gid);
                        $mlstr=I('post.ml');
                        $mlarr=explode(',',$mlstr);
                        foreach($mlarr as $k=>$ml){
                            $type[$k]['ml']=$ml;
                            $type[$k]['saleprice']=$salepricearr[$k];
                            $type[$k]['gid']=$gid;
                        }
                        foreach($type as $val){
                            M('Type')->add($val);
                        }
                        $this->success('商品添加成功');
                    }else{
                        $this->error('商品添加失败');
                    };
                }else{
                    $this->error($goods->getError());
                }
            }else{
                $this->display();
            }
    }

//上传图片，
    public function uploadGoodsPic(){
        $common=A('Common');
        $info=$common->uploadPic();
        if(is_array($info)){
            $image=new Image();
            //获取图片文件路径
            $filename='./Uploads/'.$info['file']['savepath'].$info['file']['savename'];
            //缩略
            $thumb500='./Uploads/'.$info['file']['savepath'].'500_'.$info['file']['savename'];
            $thumb300='./Uploads/'.$info['file']['savepath'].'300_'.$info['file']['savename'];
            $thumb100='./Uploads/'.$info['file']['savepath'].'100_'.$info['file']['savename'];
            $image->open($filename)->thumb('300','300')->save($thumb300);
            $image->open($filename)->thumb('100','100')->save($thumb100);
            $image->open($filename)->thumb('500','500')->save($thumb500);

            $data['gid']=session('lastGid');
            $data['picname']=$info['file']['savename'];
            $data['picurl']=$info['file']['savepath'];
            M('Pic')->add($data);
        }else{
            $this->error($info);
        }
    }

    //编辑商品
    public function editor(){
        if (IS_POST) {
         //得到需要更新商品的商品id
            $gid=I('post.gid');
            $goods = M('goods');
            $data['addtime'] = time();
            $salepriceinfo=I('post.saleprice');
            $mlinfo=I('post.ml');
            if(is_array($salepriceinfo)){
                $data['saleprice']=$salepriceinfo[0];
            }else{
                $data['saleprice']=$salepriceinfo;
            }
            $data['ismember']=I('post.ismember');
            $data['goodsname']=I('post.goodsname');
            if(I('post.bname')){
                $data['bid']=I('post.bname');
            }else{
                $this->error('请选择商品品牌');
            }
            $data['score']=I('post.score');
            $data['marketprice']=I('post.marketprice');
            $data['discount']=I('post.discount');
            $data['num']=I('post.num');
            if(I('post.thirdCate')){
                $data['cid']=I('post.thirdCate');
            }elseif(I('post.secondCate')){
                $data['cid']=I('post.secondCate');
            }else{
                if(I('post.firstCate')){
                    $data['cid']=I('post.firstCate');
                }else{
                    $data['cid']=1;
                }
            }
            if(I('post.detail')){
                $data['description']=I('post.detail');
            }else{
                $this->error('请填写对商品的描述信息');
            }
            if ($data){
                //显示需要更新的商品信息
                if ($goods->where(array('id'=>$gid))->save($data)){
                    //更新商品的属性表，以及更新的条件
                    $where2['gid']=$gid;
                    foreach($mlinfo as $k=>$ml){
                        $typeml[$k]['ml']=$ml;
                        $typeml[$k]['saleprice']=$salepriceinfo[$k];
                        $typeml[$k]['gid']=$gid;
                    }
                    if(M('Type')->where($where2)->find()){
                        M('Type')->where($where2)->delete();
                        foreach($typeml as $val){
                            M('Type')->add($val);
                        }
                    }
                    //更新图片信息
                    if ($_FILES) {
                        $goodsInfo = $goods->field('imageurl,imagename')->find(I('post.gid'));
                        $upload = new Upload();
                        $upload->maxSize = 3145728;// 设置附件上传大小
                        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型D
                        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
                        $upload->savePath = "{$goodsInfo['imageurl']}";
                        $upload->autoSub = false;
                        $info = $upload->upload();

                        foreach ($info as $key => $val) {
                            $image = new Image();
                            //获取图片文件路径
                            $filename = './Uploads/' . $val['savepath'] . $val['savename'];
                            //缩略
                            $thumb500 = './Uploads/' . $val['savepath'] . '500_' . $val['savename'];
                            $thumb300 = './Uploads/' . $val['savepath'] . '300_' . $val['savename'];
                            $thumb100 = './Uploads/' . $val['savepath'] . '100_' . $val['savename'];
                            $image->open($filename)->thumb('300', '300')->save($thumb300);
                            $image->open($filename)->thumb('100', '100')->save($thumb100);
                            $image->open($filename)->thumb('500', '500')->save($thumb500);

                            //修改主图
                            if ($key == 0) {
                                $data['id'] = I('post.gid');
                                $data['imagename'] = $val['savename'];
                                if ($goods->save($data)) {
                                    //删除原图
                                    unlink('./Uploads/' . $goodsInfo['imageurl'] . $goodsInfo['imagename']);
                                    unlink('./Uploads/' . $goodsInfo['imageurl'] . '500_' . $goodsInfo['imagename']);
                                    unlink('./Uploads/' . $goodsInfo['imageurl'] . '300_' . $goodsInfo['imagename']);
                                    unlink('./Uploads/' . $goodsInfo['imageurl'] . '100_' . $goodsInfo['imagename']);
                                } else {
                                    $this->error('主图更新失败');
                                };
                            } else if ($key > 0) { //修改辅图
                                $pid = $key;
                                $data['id'] = $pid;
                                $data['picname'] = $val['savename'];
                                $data['picurl'] = $val['savepath'];
                                if (M('Pic')->save($data)) {
                                    //echo $goods->getLastSql();
                                    $picInfo = M('Pic')->field('picname')->find($pid);
                                    //删除原图
                                    unlink('./Uploads/' . $goodsInfo['imageurl'] . $picInfo['imagename']);
                                    unlink('./Uploads/' . $goodsInfo['imageurl'] . '500_' . $picInfo['imagename']);
                                    unlink('./Uploads/' . $goodsInfo['imageurl'] . '300_' . $picInfo['imagename']);
                                    unlink('./Uploads/' . $goodsInfo['imageurl'] . '100_' . $picInfo['imagename']);
                                }
                            }
                        }
                    }
                    $this->success('商品更新成功');
                } else {
                    $this->error($gid);
                }
            } else {
                $this->error($goods->getError());
            }
        } else {
            $gid = trim(I('get.gid'));
            $goodsOne = M('goods')->alias('g')->join('beauty_category c ON g.cid=c.id')
                ->where(array('g.id' => $gid))->field('g.*,cname,path')->find();
            $goodsOne['description'] = html_entity_decode($goodsOne['description']);
            $where['id'] = array('in', $goodsOne['path']);
            $cate = M('category')->where($where)->field('id,cname')->select();
            $goodspic = M('Pic')->where(array('gid' => $gid))->select();
            $type['gid']=$gid;
            //显示商品的属性信息
            $type=M('Goods')->table('beauty_type')->field('ml,saleprice')->where($type)->select();
            $this->assign('goodsOne', $goodsOne);
            $this->assign('cate', $cate);
            $this->assign('goodspic',$goodspic);
            $this->assign('type',$type);
            $this->display('editor');
        }
    }

    public function export()
    {
        $file_name="商品列表".date("Y-m-d H:i:s",time());
        $file_suffix = "xls";
        if(I('get.goodsname')){
            $keywords=I('get.goodsname');
            $where['g.goodsname']=array('like',"%$keywords%");
        }
        if(I('get.bname')){
            $where['b.bname']=I('get.bname');
        }
        if(I('get.cname')){
            $where['c.bname']=I('get.cname');
        }
        if(I('get.time1')&& !I('get.time2')){
            $time1=strtotime(I('get.time1'));
            $where['g.addtime']=array('gt',$time1);
        }elseif(I('get.time2') && !I('get.time1')){
            $time2=strtotime(I('get.time2'));
            $where['g.addtime']=array('lt',$time2);
        }else if(I('get.time2') && I('get.time1')){
            $time1=strtotime(I('get.time1'));
            $time2=strtotime(I('get.time2'));
            $where['g.addtime']=array('between',array($time1,$time2));
        }
        if(I('get.saleprice1')&& !I('get.saleprice2')){
            $saleprice1=I('get.saleptice1');
            $where['g.saleprice']=array('gt',$saleprice1);
        }elseif(I('get.saleprice2') && !I('get.saleprice1')){
            $saleprice2=I('get.saleprice2');
            $where['g.saleprice']=array('lt',$saleprice2);
        }else if(I('get.saleprice1') && I('get.saleprice2')){
            $saleprice1=I('get.saleprice1');
            $saleprice2=I('get.saleprice2');
            $where['g.saleprice']=array('between',array($saleprice1,$saleprice2));
        }
        $model=D('Goods');
        $res=$model->goodsExcel($where);
        if(IS_AJAX){
            if($res){
                $this->success();
            }else{
                $this->error('无当前商品列表信息');
            }
        }
        header("Content-Type:application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=$file_name.$file_suffix");
        //根据业务，自己进行模板赋值。
        $this->assign('goodsinfo',$res);
        $this->display();
    }

}