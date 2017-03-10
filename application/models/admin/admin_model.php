<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model{
    public  function __construct(){
        $this->load->database();
    }
    //��ѯ�û�
    public  function getUser($user_name,$user_password){
       $condition['admin_name']=$user_name;
       $condition['admin_password']=$user_password;
       $query = $this->db->where($condition)->get('jingjia_admin');
      return $query->row_array();

    }


    
}