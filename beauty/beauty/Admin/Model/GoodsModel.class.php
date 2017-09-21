<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{

    protected  $_map=array(
        'thirdCate'=>'cid',
        'secondCate'=>'cid',
        'firstCate'=>'cid',
        'bname'=>'bid'
    );

    protected $_validate=array(
        //array('验证字段','验证规则','错误提示',['验证条件','附加规则','验证时间']);
        //验证规则：require 字段值必须、email 邮箱、url URL地址、currency 货币、number 数字、double浮点、integer整数、zip邮政编码、english英文
        //验证条件：0代表字段存在时必须验证、1代表字段必须验证、2代表字段存在而且不为空时验证
        //附加规则:默认为regex,附加规则的值决定了验证规则的值
        //验证时间:1代表添加时验证，2代表更新时验证，3代表任何情况下都验证
        array('goodsname','require','商品名称不能为空',0,'regex',1),
        array('cid',0,'没有选择所属分类',0,'notequal',1),
        array('bid',0,'没有选择所属品牌',0,'notequal',1),
        array('ml','require','商品属性不能为空',0,'regex',1),
        array('marketprice','require','市场价格不能为空',0,'regex',1),
        array('saleprice','require','商城价格不能为空',0,'regex',1),
        array('num','require','库存数量不能为空',0,'regex',1),
    );

    public function addGoods($data){
        $gid= $this->add($data);
        return $gid;
    }


    public function goodsExcel($where){
        $goodsinfo=$this->table('beauty_goods g,beauty_brands b,beauty_category c')->where('g.bid=b.id and g.cid=c.id')->where($where)->select();
        return $goodsinfo;
    }

    public function getGoodsTop($num){
        $list=$this->field('goodsname,salenum')->limit("0,$num")->order('salenum desc')->select();
        return $list;
    }


}