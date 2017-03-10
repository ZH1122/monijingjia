<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keyword extends CI_Controller{
    public function __construct(){
        //$this->need_login = true;
        parent::__construct();
        $this->load->library('pagination');
        
        $this->load->model('admin/keyword_model');
    }
    //显示所有关键词
    public function index($offset=''){
        $offset1=intval($offset);
        $count=$this->keyword_model->getAllCount();
        $row=20;
        $url=site_url('admin/keyword/index');
        $uri=4;
        $data['page']=$this->page($count, $row, $url, $uri);
        $data['lists']=$this->keyword_model->getAllKeyword($offset1,$row);
        //echo $da
        
        $this->load->view("admin/header.html",array('title'=>'关键词管理'));
        $this->load->view('admin/indexheader.html');
        $this->load->view('admin/keyword.html',$data);
    }
    //添加关键词
    public function add() {
        $this->load->view("admin/header.html",array('title'=>'关键词增加'));
        $this->load->view('admin/indexheader.html');
        $this->load->view('admin/keyword_add.html');
    }
    //编辑关键词
    public function insert(){
        $name=$this->input->post('name');
        $ranking=$this->input->post('ranking');
        if($this->keyword_model->insert($name,$ranking)){
            redirect('admin/keyword/index');
        }else{
            redirect('admin/keyword/insert');
        }
        
    }
    public function edit($id=''){
        $data['kw']=$this->keyword_model->getOneKeyword($id);
        $this->load->view("admin/header.html",array('title'=>'关键词修改'));
        $this->load->view('admin/indexheader.html');
        $this->load->view('admin/keyword_edit.html',$data);
    }
    public function update(){
        $name=$this->input->post('name');
        $ranking=$this->input->post('ranking');
        $id=$this->input->post('id');
        if($this->keyword_model->update($id,$name,$ranking)){
            redirect('admin/keyword/index');
        }else{
            redirect('admin/keyword/edit');
        }
    }
    //删除关键词
    public function delete($id=''){
        $this->keyword_model->delete($id);
        redirect('admin/keyword/index');
    }
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
}