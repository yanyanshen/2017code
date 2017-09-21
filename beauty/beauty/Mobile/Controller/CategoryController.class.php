<?php
namespace Mobile\Controller;
use Think\Controller;
class CategoryController extends Controller {

    public function index(){
        $categoryInfo = M('category')->where('pid=0')->select();
        //第一楼
        $one=$this->getGoodsCateBycId(1);
        $one1=$this->getGoodsCateBycId(2);
        $one2=$this->getGoodsCateBycId(7);
        $one3=$this->getGoodsCateBycId(11);
        $one4=$this->getGoodsCateBycId(12);
        $one5=$this->getGoodsCateBycId(17);
        //第二楼
        $two=$this->getGoodsCateBycId(22);
        $two1=$this->getGoodsCateBycId(23);
        $two2=$this->getGoodsCateBycId(24);
        $two3=$this->getGoodsCateBycId(25);
        //第三楼
        $three=$this->getGoodsCateBycId(33);
        $three1=$this->getGoodsCateBycId(34);
        $three2=$this->getGoodsCateBycId(35);
        $three3=$this->getGoodsCateBycId(36);
        $three4=$this->getGoodsCateBycId(37);
        //第四楼
        $four=$this->getGoodsCateBycId(53);
        $four1=$this->getGoodsCateBycId(54);
        $four2=$this->getGoodsCateBycId(55);
        $four3=$this->getGoodsCateBycId(56);
        $four4=$this->getGoodsCateBycId(57);
        //第五楼
        $five=$this->getGoodsCateBycId(70);
        $five1=$this->getGoodsCateBycId(71);
        $five2=$this->getGoodsCateBycId(76);
        $five3=$this->getGoodsCateBycId(80);
        //第六楼
        $six=$this->getGoodsCateBycId(83);
        $six1=$this->getGoodsCateBycId(84);
        $six2=$this->getGoodsCateBycId(85);
        $six3=$this->getGoodsCateBycId(86);
        $six4=$this->getGoodsCateBycId(100);
        //第七楼
        $seven=$this->getGoodsCateBycId(87);
        $seven1=$this->getGoodsCateBycId(93);
        $seven2=$this->getGoodsCateBycId(94);
        $seven3=$this->getGoodsCateBycId(95);
        //第一楼
        $this->assign('one',$one);
        $this->assign('one1',$one1);
        $this->assign('one2',$one2);
        $this->assign('one3',$one3);
        $this->assign('one4',$one4);
        $this->assign('one5',$one5);
        //第二楼
        $this->assign('two',$two);
        $this->assign('two1',$two1);
        $this->assign('two2',$two2);
        $this->assign('two3',$two3);
        //第三楼
        $this->assign('three',$three);
        $this->assign('three1',$three1);
        $this->assign('three2',$three2);
        $this->assign('three3',$three3);
        $this->assign('three4',$three4);
        //第四楼
        $this->assign('four',$four);
        $this->assign('four1',$four1);
        $this->assign('four2',$four2);
        $this->assign('four3',$four3);
        $this->assign('four4',$four4);
        //第五楼
        $this->assign('five',$five);
        $this->assign('five1',$five1);
        $this->assign('five2',$five2);
        $this->assign('five3',$five3);
        //第六楼
        $this->assign('six',$six);
        $this->assign('six1',$six1);
        $this->assign('six2',$six2);
        $this->assign('six3',$six3);
        $this->assign('six4',$six4);
        //第七楼
        $this->assign('seven',$seven);
        $this->assign('seven1',$seven1);
        $this->assign('seven2',$seven2);
        $this->assign('seven3',$seven3);

        $this->assign('cate',$categoryInfo);
        $this->display('cat');
    }


    public function getGoodsCateBycId($cid){
        $where1['id']=$cid;
        $pathArr=M('category')->field('path,id,cname')->where($where1)->find();
        $path=$pathArr['path'];
        //得到 以$path 开头的所有子分类id
        $where2['path']=array('like',"{$path}%");
        $idArr=M('category')->field('id,cname')->where($where2)->select();
        $idStr='';
        foreach($idArr as $v){
            //得到的id是个数组 得到里面的字符串值
            $idStr.=$v['id'].',';
        }
        $idStr=substr($idStr,0,-1);
        $where3['cid']=array('in',"{$idStr}");
        $goods=M('goods')->query("SELECT  g.id as gid,g.goodsname,g.imageurl,g.imagename,g.salenum,g.saleprice from beauty_goods g where
        g.cid in ($idStr) and g.show=1
         ORDER by g.addtime desc limit 0,6");
        return $goods;
    }



    public function showgoods(){
        $categoryInfo = M('category')->where('pid=0')->select();
        foreach ($categoryInfo as $k1 => $v1) {
            $where1['pid'] = $v1['id'];
            $categoryInfo[$k1]['child'] = M('category')->field('id,cname')->where($where1)->select();
            foreach ($categoryInfo[$k1]['child'] as $k2 => $v2) {
                $where2['pid'] = $v2['id'];
                $categoryInfo[$k1]['child'][$k2]['child'] = M('category')->field('id,cname')->where($where2)->select();
            }
        }
        //print_r($categoryInfo);
        $this->assign('categoryInfo', $categoryInfo);
    }

    //品牌分类
    public function brand(){
        $brand=M('brands');
        $brandGoods=$brand->field('bname,blogopath,blogoname,id')->where(array('status'=>1))->select();
        $this->assign('brandGoods',$brandGoods);
        $this->display('brand');
    }
    //模糊匹配
    public function pykey( $py_key){
        $pinyin = 65536 + pys($py_key);
        if ( 45217 <= $pinyin && $pinyin <= 45252 ) {$zimu = "A";return $zimu;}
        if ( 45253 <= $pinyin && $pinyin <= 45760 ) {$zimu = "B";return $zimu;}
        if ( 45761 <= $pinyin && $pinyin <= 46317 ) {$zimu = "C";return $zimu;}
        if ( 46318 <= $pinyin && $pinyin <= 46825 ) {$zimu = "D";return $zimu;}
        if ( 46826 <= $pinyin && $pinyin <= 47009 ) {$zimu = "E";return $zimu;}
        if ( 47010 <= $pinyin && $pinyin <= 47296 ) {$zimu = "F";return $zimu;}
        if ( 47297 <= $pinyin && $pinyin <= 47613 ) {$zimu = "G";return $zimu;}
        if ( 47614 <= $pinyin && $pinyin <= 48118 ) {$zimu = "H";return $zimu;}
        if ( 48119 <= $pinyin && $pinyin <= 49061 ) {$zimu = "J";return $zimu;}
        if ( 49062 <= $pinyin && $pinyin <= 49323 ) {$zimu = "K";return $zimu;}
        if ( 49324 <= $pinyin && $pinyin <= 49895 ) {$zimu = "L";return $zimu;}
        if ( 49896 <= $pinyin && $pinyin <= 50370 ) {$zimu = "M";return $zimu;}
        if ( 50371 <= $pinyin && $pinyin <= 50613 ) {$zimu = "N";return $zimu;}
        if ( 50614 <= $pinyin && $pinyin <= 50621 ) {$zimu = "O";return $zimu;}
        if ( 50622 <= $pinyin && $pinyin <= 50905 ) {$zimu = "P";return $zimu;}
        if ( 50906 <= $pinyin && $pinyin <= 51386 ) {$zimu = "Q";return $zimu;}
        if ( 51387 <= $pinyin && $pinyin <= 51445 ) {$zimu = "R";return $zimu;}
        if ( 51446 <= $pinyin && $pinyin <= 52217 ) {$zimu = "S";return $zimu;}
        if ( 52218 <= $pinyin && $pinyin <= 52697 ) {$zimu = "T";return $zimu;}
        if ( 52698 <= $pinyin && $pinyin <= 52979 ) {$zimu = "W";return $zimu;}
        if ( 52980 <= $pinyin && $pinyin <= 53640 ) {$zimu = "X";return $zimu;}
        if ( 53689 <= $pinyin && $pinyin <= 54480 ) {$zimu = "Y";return $zimu;}
        if ( 54481 <= $pinyin && $pinyin <= 62289 ) {$zimu = "Z";return $zimu;}
        $zimu = $py_key;
        return $zimu;
    }
    public function pys( $pysa ){
        $pyi = "";
        for ( $i = 0; $i < strlen($pysa); $i++) {
            $_obfuscate_8w = ord(substr($pysa, $i, 1));
            if (160 < $_obfuscate_8w) {
                $_obfuscate_Bw = ord(substr($pysa, $i++, 1));
                $_obfuscate_8w = $_obfuscate_8w * 256 + $_obfuscate_Bw - 65536;
            }
            $pyi .= $_obfuscate_8w;
        }
        return $pyi;
        $letter = pykey("韩束");
        echo $letter;
    }
}

