<?php
/*用户中心->推广管理->推广计划控制器
 * time:2016/10/15   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class UHmanageplan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');


    }

    //显示推广计划
    public function plan(){
        $this->load->model('user/User_model');
        $user = $this->session->userdata('user');

        $this->load->model('userhome/Manageplan_model');
        //print_r($user['user_id']);
        $plan=$this->Manageplan_model->getPlan($user['user_id']);

        $this->load->view("templates/header", array('title' => '个人中心'));
        $this->load->view("templates/homeheader");
        $this->load->view("userhome/manage/manageleftheader", array('user' => $user,'data'=>$plan));
        $this->load->view("userhome/manage/plan", array('user' => $user,'data'=>$plan));
        $this->load->view("templates/footer");

    }

    //新建推广计划
    public function addPlan(){
        if(!empty($_POST['addplansubmit']))
        {
            $plan_name=$this->input->post('plan_name',true);
            $plan_budget=$this->input->post('plan_budget',true);

                //验证数据
                $this->form_validation->set_rules('plan_name','推广计划','trim|required|min_length[1]|max_length[30]');
                $this->form_validation->set_rules('plan_budget','计划预算','trim|required|max_length[10]|numeric');

                if($this->form_validation->run()){
                   //获取用户user_id
                    $this->load->model('user/User_model');
                    $userplan= $this->session->userdata('user');
                    $user_id=$userplan['user_id'];

                    //新建推广成功，插入数据
                    $this->load->model('userhome/Manageplan_model');
                    $this->Manageplan_model->addPlan($user_id,$plan_name,$plan_budget);
                    redirect('userhome/uhmanageunit/unit');

                }else{
                    //注册信息有误，显示错误信息
                    echo validation_errors();
                    redirect('userhome/uhmanageplan/plan');
                }
        }else{
            echo "空addsubmit";
        }

    }

    //显示修改推广计划
    public function getupdatePlan($plan_id){
        //$newplan_id=$this->input->get('plan_id');
        if($plan_id){
            $this->load->model('userhome/Manageplan_model');
            $getonceplan=$this->Manageplan_model->getoncePlan($plan_id);
           // print_r($getonceplan);
            $this->load->model('user/User_model');
            $user = $this->session->userdata('user');

            $this->load->model('userhome/Manageplan_model');
            //print_r($user['user_id']);
            $plan=$this->Manageplan_model->getPlan($user['user_id']);

            $this->load->view("templates/header", array('title' => '个人中心'));
            $this->load->view("templates/homeheader");
            $this->load->view("userhome/manage/updateplan", array('getonceplan'=>$getonceplan));
            $this->load->view("templates/footer");
        }else{
            echo "获取不到plan_id";
        }
    }

    //修改推广计划
    public function updatePlan(){
        if(!empty($_POST['updateplansubmit']))
        {
            $plan_id=$this->input->post('plan_id');
            $plan_name=$this->input->post('plan_name',true);
            $plan_budget=$this->input->post('plan_budget',true);

            //验证数据
            $this->form_validation->set_rules('plan_name','推广计划','trim|required|min_length[1]|max_length[30]');
            $this->form_validation->set_rules('plan_budget','计划预算','trim|required|max_length[10]|numeric');

            if($this->form_validation->run()){
                //修改推广计划成功，插入数据
                $this->load->model('userhome/Manageplan_model');
                $this->Manageplan_model->updataPlan($plan_id,$plan_name,$plan_budget);
                redirect('userhome/uhmanageplan/plan');

            }else{
                //注册信息有误，显示错误信息
                echo validation_errors();
            }
        }else{
            echo "空updatesubmit";
        }

    }


    //删除推广计划
    public function deletePlan(){
        $del_id=$this->input->post('del_id');
        //print_r($plan_id);
        if(is_array($del_id)){
            //分割$del_id,让sql能拼接为一句执行
            $plan_id= implode(',',$del_id);

            $this->load->model('userhome/Manageplan_model');
            $this->Manageplan_model->deletePlan($plan_id);
            redirect('userhome/uhmanageplan/plan');
        }else{
            echo "请选择需要删除的计划！";
        }

    }


}

?>