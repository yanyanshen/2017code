<?php
namespace Admin\Model;
use Think\Model;
class BrandsModel extends Model{
    public function getBrandsList(){
        $brandsList=$this->select();
        if($brandsList){
            return $brandsList;
        }else{
            return false;
        }
    }
}