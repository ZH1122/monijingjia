<?php
/*用户中心->用户充值控制器
 * time:2016/11/15   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class UHrecharge extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');

    }

    //显示充值页面
    public function index(){
        $this->load->model('user/User_model');
        $user=$this->session->userdata('user');

        $this->load->model('userhome/UHrecharge_model');
        $recharge=$this->UHrecharge_model->getrecharge($user['user_id']);
        //print_r($recharge);
        $this->load->view("templates/header",array('title'=>'个人中心'));
        $this->load->view("templates/homeheader");
        $this->load->view("userhome/recharge",array('user'=>$user,'recharge'=>$recharge));
        $this->load->view("templates/footer");


    }

    //充值
    public function recharge(){
        if(!empty($_POST['rechargesubmit']))
        {
            $recharge_money=$this->input->post('recharge_money',true);

            //验证数据
            $this->form_validation->set_rules('recharge_money','充值金额','trim|required|numeric');

            if($this->form_validation->run()){
                //获取用户user_id
                $this->load->model('user/User_model');
                $userplan= $this->session->userdata('user');
                $user_id=$userplan['user_id'];

                date_default_timezone_set('Asia/Shanghai');
                $recharge_date=date('y-m-d h:i:s',time());

                //插入数据
                $this->load->model('userhome/UHrecharge_model');
                $this->UHrecharge_model->recharge($user_id,$recharge_money,$recharge_date);
                redirect('userhome/uhrecharge/index');

            }else{
                //注册信息有误，显示错误信息
                echo validation_errors();
            }
        }else{
            echo "空rechargesubmit";
        }

    }



}