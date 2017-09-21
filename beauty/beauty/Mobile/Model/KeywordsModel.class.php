<?php
namespace Mobile\Model;
use Think\Model;
class KeywordsModel extends Model {
    public function keywords(){
       $keywordsInfo=$this->where(array('mid'=>session('mid')))->order('addtime desc')->limit(0,10)->select();
        return $keywordsInfo;
    }
}