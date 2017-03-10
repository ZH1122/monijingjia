<?php
/*用户中心->推广管理->推广创意控制器
 * time:2016/10/25   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class UHmanageidea extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');

    }

    //显示推广创意
    public function idea(){

        $this->load->model('user/User_model');
        $user = $this->session->userdata('user');

        $this->load->model('userhome/Manageidea_model');
        $idea=$this->Manageidea_model->getIdea($user['user_id']);

        $this->load->view("templates/header", array('title' => '个人中心'));
        $this->load->view("templates/homeheader");
        $this->load->view("userhome/manage/manageleftheader", array('user' => $user,'data'=>$idea));
        $this->load->view("userhome/manage/idea", array('user' => $user,'data'=>$idea));
        $this->load->view("templates/footer");
    }

    //显示添加推广创意
    public function getAddIdea(){
        $this->load->model('user/User_model');
        $user = $this->session->userdata('user');

        $this->load->model('userhome/Manageidea_model');
        $unit=$this->Manageidea_model->getAddIdeaUnit($user['user_id']);

        $this->load->view("templates/header", array('title' => '个人中心'));
        $this->load->view("templates/homeheader");
        $this->load->view("userhome/manage/addidea", array('user' => $user,'data'=>$unit));
        $this->load->view("templates/footer");
    }


    //添加推广创意 addIdea($unit_id,$idea_name,$idea_title,$idea_describr)
    public function addIdea(){

        if(!empty($_POST['addideasubmit'])) {

        $unit_id=$this->input->post('unit_id',true);
        $idea_title=$this->input->post('idea_title',true);
        $idea_url=$this->input->post('idea_url',true);
        $idea_describr=$this->input->post('idea_describr',true);

        //验证数据
        $this->form_validation->set_rules('idea_title','创意标题','trim|required|min_length[2]|max_length[20]');
        $this->form_validation->set_rules('idea_url','创意URL','trim|required|min_length[2]|max_length[50]');
        $this->form_validation->set_rules('idea_describr','创意描述','trim|required|min_length[2]|max_length[80]');

            if($this->form_validation->run()){
                //新建创意成功，插入数据
                $this->load->model('userhome/Manageidea_model');
                $this->Manageidea_model->addIdea($unit_id,$idea_title,$idea_url,$idea_describr);
                redirect('userhome/uhmanageIdea/idea');

            }else{
                //注册信息有误，显示错误信息
                echo validation_errors();
                // redirect('uhmanageUnit/unit');
            }
        }else{
            echo "空addideasubmit";
        }
    }

    //显示修改推广创意
    public function getupdateIdea($idea_id){
        if($idea_id){
            $this->load->model('userhome/Manageidea_model');
            $getonceIdea=$this->Manageidea_model-> getonceIdea($idea_id);

            $this->load->view("templates/header", array('title' => '个人中心'));
            $this->load->view("templates/homeheader");
            $this->load->view("userhome/manage/updateidea", array('data'=>$getonceIdea));
            $this->load->view("templates/footer");

        }else{
            echo "获取不到unit_id";
        }
    }

    //修改推广创意
    public function updateIdea(){
        if(!empty($_POST['updateideasubmit']))
        {
            $idea_id=$this->input->post('idea_id',true);
            $unit_id=$this->input->post('unit_id',true);
            $idea_title=$this->input->post('idea_title',true);
            $idea_url=$this->input->post('idea_url',true);
            $idea_describr=$this->input->post('idea_describr',true);

            //验证数据
            $this->form_validation->set_rules('idea_title','创意标题','trim|required|min_length[2]|max_length[20]');
            $this->form_validation->set_rules('idea_url','创意URL','trim|required|min_length[2]|max_length[30]');
            $this->form_validation->set_rules('idea_describr','创意描述','trim|required|min_length[2]|max_length[80]');

            if($this->form_validation->run()){
                $this->load->model('userhome/Manageidea_model');
                $this->Manageidea_model->updateIdea($idea_id,$unit_id,$idea_title,$idea_url,$idea_describr);
                redirect('userhome/uhmanageIdea/idea');

            }else{
                echo validation_errors();
            }

        }else{
            echo "空updateideasubmit";
        }

    }


    //删除推广创意
    public function deleteIdea(){
        //接受删除时传入的ideaid_id,unit_id
        $delidea_id=$this->input->post('delIdea_id');
       if( $delidea_id) {
           $data1= implode(',',$delidea_id);
           $data2=explode(',',$data1);

           //将数组按照下标的奇偶分成两个数组
           for($i=0;$i<count($data2);$i++){
               if($i%2==0){
                   $idea_id[]=$data2[$i];//传入的删除创意的idea_id
               }else{
                   $unit_id[]=$data2[$i];//传入的删除创意的unit_id
               }
           }

           //将数组转换为1，2，3....格式
           $idea_id=implode(',',$idea_id);
           $unit_id=implode(',',$unit_id);

           if($idea_id&&$unit_id){
               $this->load->model('userhome/Manageidea_model');
               $this->Manageidea_model->deleteIdea($idea_id,$unit_id);
               redirect('userhome/uhmanageIdea/idea');
           }
       }else{
           //直接点击删除，没有选项
           redirect('userhome/uhmanageIdea/idea');
       }



    }





}