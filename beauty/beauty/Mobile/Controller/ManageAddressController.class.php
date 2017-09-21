<?php
namespace Mobile\Controller;
use Think\Controller;
class ManageAddressController extends Controller{
    public function manageaddress(){
        $address=A('Address');
        $address->numaddresslist();
        $this->display('manageAddress');
    }

    //展示添加地址的页面
    public function addAddress(){
        $address=A('Address');
        $address->numaddresslist();
        $this->display('addAddress');
    }


//添加地址
    public function add()
    {
        $mid=session('mid');
        $data['area'] = I('post.province') . '-' . I('post.country') . '-' . I('post.city');
        $data['mobile'] = I('post.mobile');
        $data['username'] = I('post.username');
        $data['address'] = I('post.address');
        $data['addtime'] = time();
        $data['isdefault'] = I('post.isdefault');
        $data['mid'] = $mid;
        if (I('post.ecode')) {
            $ecode = I('post.ecode');
            $data['ecode']=$ecode;
        }
        if (I('post.isdefault') == 1) {
            $savedata['isdefault'] = 0;
            M('Addresses')->where(array('mid' => $mid))->save($savedata);
        }
        $aid = M('Addresses')->add($data);
        if ($aid) {
            $this->success();
        } else {
            $this->error();
        }
    }

//需要编辑的地址列表
    public function editorlist()
    {
        $id = I('get.id');
        $addressInfo = M('addresses')->where(array('id' => $id))->select();
        $this->assign('addressInfo', $addressInfo);
        $this->assign('addressid', $id);
        $this->display("editAddress");
    }

    public function editAddress()
    {
        if (IS_POST) {
            $id = I('post.addressid');
            $address = M('Addresses');
            if (I('post.area')) {
                $data['area'] = I('post.area');
            } else {
                $data['area'] = I('post.province'). '-'. I('post.country') .'-'.I('post.city');
            }
            $data['username'] = I('post.username');
            $data['mobile'] = I('post.mobile');
            $data['address'] = I('post.address');
            if ($address->where(array('id' => $id))->save($data)) {
                $this->success();
            } else {
                $this->error($id);
            }
        }
    }

//删除地址
    public function deleteAddress()
    {
        $id = I('post.id');
        if (M('addresses')->where(array('id' => $id))->delete()) {
            $this->success();
        } else {
            $this->error('删除失败');
        }
    }

//设置默认地址
    public function setdefault()
    {
        $id = I('post.id');
        $mid = session('mid');
        //设置默认地址，并将该用户其他的isdefault属性设置为0
        $where1['mid'] = $mid;
        $where1['id'] = $id;
        $data1['isdefault'] = 1;
        //更新除了设置该地址的其他的地址的isdefault值
        $where2['mid'] = $mid;
        $where2['id'] = array('notin', $id);
        $data2['isdefault'] = 0;
        if (M('addresses')->where($where1)->save($data1)) {
            M('addresses')->where($where2)->save($data2);
            $this->success('设置成功');
        } else {
            $this->error('请稍后再进行设置');
        }
    }
}