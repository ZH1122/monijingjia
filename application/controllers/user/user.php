<?php
/*用户控制器
 * time:2016/10/10   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');

    }

    //显示注册页面
   public function register(){
       $this->load->model('captcha/Captcha_model');
       $cap['image']=$this->Captcha_model->cap();
       $this->load->view("templates/header",array('title'=>'用户注册'));
       $this->load->view("user/register",array('cap'=>$cap['image']));
       $this->load->view("templates/footer");
   }

    //注册用户
    public function insertUser(){

        if(!empty($_POST['submit']))
        {
            $user_name=$this->input->post('user_name',true);
            $user_sex=$this->input->post('user_sex',true);
            $user_password=$this->input->post('user_password',true);
            $user_number=$this->input->post('user_number',true);


            //验证验证码
            $capconf = $this->session->userdata('cap');

            $cap=$this->input->post('captcha',true);
            //echo "cap:".$cap."<br>capconf:".$capconf;
            if($cap==$capconf){
                //验证完正确验证码后关闭session
                session_write_close();

                //验证数据
                $this->form_validation->set_rules('user_name','用户名','trim|required');
                $this->form_validation->set_rules('user_password','密码','trim|required|matches[user_passwordconf]');
                $this->form_validation->set_rules('user_passwordconf','确认密码','trim|required');
                $this->form_validation->set_rules('user_number','学号','trim|required|exact_length[10]|numeric');

                if($this->form_validation->run()){
                    //注册用户成功，插入数据
                    $this->load->model('user/User_model');
                    $this->User_model->addUser($user_name,$user_number,$user_sex,$user_password);
                    //注册成功，跳转登陆页面
                    redirect('user/user/login');

                }else{
                    //注册信息有误，显示错误信息
                    $this->load->model('captcha/Captcha_model');
                    $cap2['image']=$this->Captcha_model->cap();
                    $this->load->view("templates/header",array('title'=>'用户注册'));
                    $this->load->view("user/register",array('cap'=>$cap2['image']));
                    $this->load->view("templates/footer");
                }

            }else{
                echo "验证码错误";
            }
        }else{
            echo "空submit";
        }
    }

    //显示登陆页面
    public  function login(){
        $this->load->view("templates/header",array('title'=>'用户登陆'));
        $this->load->view("user/login");
        $this->load->view("templates/footer");
    }

    //登陆
    public function signin(){
        //获取用户的输入
        $user_name=$this->input->post('user_name',true);
        $user_password=$this->input->post('user_password',true);

        $this->load->model('user/User_model');
        if($user=$this->User_model->getUser($user_name,$user_password)){
            //登陆成功，保存用户到session，并跳转到个人中心
            $this->session->set_userdata('user',$user);
            //echo "登陆成功";
            redirect('userhome/userhome/index');
        }else{
            echo "帐号/密码错误";
        }
    }

    public  function logout(){
        $this->session->unset_userdata('user');
        redirect('search/search/index');
    }





}