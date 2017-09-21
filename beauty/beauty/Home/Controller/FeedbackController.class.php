<?php
namespace Home\Controller;
use Think\Controller;
class FeedbackController extends Controller {
    public function index()
    {
        //$date['mid']=session('mid');
        if (session('mid')) {
            if (IS_AJAX) {
                if (!I('post.RadioGroup1') && !I('post.RadioGroup2') && !I('post.RadioGroup3') && !I('post.RadioGroup4') && !I('post.idea') && !I('post.conncetname') && !I('post.mobile')) {
                    $this->ajaxReturn('您的反馈信息不完整，请填写完整');
                } else {

                    if (I('post.RadioGroup1') == 1) {
                        $date['satis'] = '非常满意';
                    } elseif (I('post.RadioGroup1') == 2) {
                        $date['satis'] = '满意';

                    } elseif (I('post.RadioGroup1') == 3) {
                        $date['satis'] = '一般';
                    } elseif (I('post.RadioGroup1') == 4) {
                        $date['satis'] = '不满意';
                    } elseif (I('post.RadioGroup1') == 5) {
                        $date['satis'] = '非常不满意';
                    }
                    if (I('post.RadioGroup2') == 1) {
                        $date['total'] = '非常满意';
                    } elseif (I('total.RadioGroup2') == 2) {
                        $date['way'] = '满意';

                    } elseif (I('post.RadioGroup2') == 3) {
                        $date['total'] = '一般';
                    } elseif (I('post.RadioGroup2') == 4) {
                        $date['total'] = '投诉';
                    } elseif (I('post.RadioGroup2') == 5) {
                        $date['way'] = '举报';
                    }

                    if (I('post.RadioGroup3') == 1) {
                        $date['way'] = '非常满意';
                    } elseif (I('post.RadioGroup3') == 2) {
                        $date['way'] = '满意';

                    } elseif (I('post.RadioGroup3') == 3) {
                        $date['way'] = '一般';
                    } elseif (I('post.RadioGroup3') == 4) {
                        $date['way'] = '投诉';
                    } elseif (I('post.RadioGroup3') == 5) {
                        $date['way'] = '举报';
                    }


                    if (I('post.RadioGroup4') == 1) {
                        $date['server'] = '非常满意';
                    } elseif (I('post.RadioGroup4') == 2) {
                        $date['server'] = '满意';

                    } elseif (I('post.RadioGroup4') == 3) {
                        $date['server'] = '一般';
                    } elseif (I('post.RadioGroup4') == 4) {
                        $date['server'] = '不满意';
                    } elseif (I('post.RadioGroup4') == 5) {
                        $date['server'] = '非常不满意';
                    }


                    if (I('post.idea') == 1) {
                        $date['idea'] = '非常满意';
                    } elseif (I('post.idea') == 2) {
                        $date['idea'] = '满意';

                    } elseif (I('post.idea') == 3) {
                        $date['idea'] = '一般';
                    } elseif (I('post.idea') == 4) {
                        $date['idea'] = '不满意';
                    } elseif (I('post.idea') == 5) {
                        $date['idea'] = '非常不满意';
                    }

                    $date['connectname'] = I('post.username');
                    $date['mobile'] = I('post.mobile');
                    $date['idea'] = I('post.idea');
                    $date['backtime'] = time();
                    $date['mname'] = session('mname');
                    $dateObj = M('userfeedback');
                    $dateObj->add($date);
                    $this->ajaxReturn('已收到您的反馈，我们会继续努力的！！！');
                }
            }
            $this->display('Feedback');
        }else{
            $this->redirect('Home/Login/Login');
        }
    }
}