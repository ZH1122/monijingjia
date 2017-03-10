<?php
/*
 * 
 * ___hao
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Adminuser extends CI_Controller{
    public function __construct(){
        //$this->need_login = true;
        parent::__construct();
        $this->load->library('pagination');
        
        $this->load->model('admin/adminuser_model');
    }
    //展示用户
    public function index($offset=''){
        $offset1=intval($offset);
        $count=$this->adminuser_model->getAllCount();
        $row=20;
        $url=site_url('admin/adminuser/index');
        $uri=4;
        $data['page']=$this->page($count, $row, $url, $uri);
        $data['lists']=$this->adminuser_model->getAllUser($offset1,$row);
        $this->load->view("admin/header.html",array('title'=>'用户管理'));
        $this->load->view('admin/indexheader.html');
        $this->load->view('admin/adminuser.html',$data);
    }
    //分页
    public function page_config($count,$row,$url,$uri){
        $config=array(
            'base_url'=>$url,
            'uri_segment'=>$uri,
            'total_rows'=>$count,
            'per_page'=>$row,
            'first_link'=>'首页',
            'last_link'=>'尾页',
            'next_link'=>'下一页>',
            'prev_link'=>'<上一页',
    
        );
        return $config;
    }
    public function page($count, $row, $url,$uri){
        $config=$this->page_config($count, $row, $url,$uri);
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
    }
    
    //重置用户密码
    public function resetPw($id=''){
        if($this->adminuser_model->resetPw($id)){
            
            redirect('admin/adminuser/index');
        }else{
            echo '修改失败';
        }
       // redirect('admin/adminuser/index');
    }
    //删除用户
    public function deleteUser($id='') {
            if($this->adminuser_model->delete($id)){
            echo '删除成功';
            //redirect('admin/adminuser/index');
        }else{
            echo '修改失败';
        }
    }
}