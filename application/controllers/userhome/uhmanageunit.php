<?php
/*用户中心->推广管理->推广单元控制器
 * time:2016/10/19   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class UHmanageunit extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');


    }

    //显示推广单元
    public function unit(){
        $this->load->model('user/User_model');
        $user = $this->session->userdata('user');

        $this->load->model('userhome/Manageplan_model');
        $plan=$this->Manageplan_model->getPlan($user['user_id']);

        $this->load->model('userhome/Manageunit_model');
        $unit=$this->Manageunit_model->getUnit($user['user_id']);

        $this->load->view("templates/header", array('title' => '个人中心'));
        $this->load->view("templates/homeheader");
        $this->load->view("userhome/manage/manageleftheader", array('user' => $user,'data'=>$unit,'plan'=>$plan));
        $this->load->view("userhome/manage/unit", array('user' => $user,'data'=>$unit));
        $this->load->view("templates/footer");
        //print_r($unit);

    }

    //新建推广计划
    public function addUnit(){
        if(!empty($_POST['addunitsubmit']))
        {
            $plan_id=$this->input->post('plan_id',true);
            $unit_name=$this->input->post('unit_name',true);

            //验证数据
            $this->form_validation->set_rules('plan_id','推广计划','trim|required');
            $this->form_validation->set_rules('unit_name','推广单元名称','trim|required|min_length[2]|max_length[20]');

            if($this->form_validation->run()){

                //新建推广成功，插入数据
                $this->load->model('userhome/Manageunit_model');
                $this->Manageunit_model->addUnit($plan_id,$unit_name);
               redirect('userhome/uhmanageUnit/unit');

            }else{
                //注册信息有误，显示错误信息
                echo validation_errors();
               // redirect('uhmanageUnit/unit');
            }
        }else{
            echo "空addunitsubmit";
        }

    }

    //显示修改推广单元
    public function getupdateUnit($unit_id){
        if($unit_id){
            $this->load->model('userhome/Manageunit_model');
            $getonceUnit=$this->Manageunit_model->getonceUnit($unit_id);
            // print_r($getonceUnit);

            $this->load->view("templates/header", array('title' => '个人中心'));
            $this->load->view("templates/homeheader");
            $this->load->view("userhome/manage/updateUnit", array('getonceUnit'=>$getonceUnit));
            $this->load->view("templates/footer");

        }else{
            echo "获取不到unit_id";
        }
    }

    //修改推广单元
    public function updateUnit(){
        if(!empty($_POST['updateunitsubmit']))
        {
            $unit_id=$this->input->post('unit_id');
            $unit_name=$this->input->post('unit_name',true);

            //验证数据
            $this->form_validation->set_rules('unit_name','推广单元','trim|required|min_length[1]|max_length[20]');

            if($this->form_validation->run()){
                //修改推广计划成功，插入数据
                $this->load->model('userhome/Manageunit_model');
                $this->Manageunit_model->updataUnit($unit_id,$unit_name);
                redirect('userhome/uhmanageunit/unit');

            }else{
                //注册信息有误，显示错误信息
                echo validation_errors();
            }
        }else{
            echo "空updatesubmit";
        }

    }


    //删除推广单元
    public function deleteUnit(){
        $delunit_id=$this->input->post('delunit_id');

        if(is_array($delunit_id)){
            //分割$del_id,让sql能拼接为一句执行
            $delunit_id= implode(',',$delunit_id);

            $this->load->model('userhome/Manageunit_model');
            $this->Manageunit_model->deleteUnit($delunit_id);
            redirect('userhome/uhmanageunit/unit');

        }

    }


}

?>