<?php
 /*用户模型
 /*time:2016/10/09   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{

    public  function __construct(){
        $this->load->database();
    }

    //添加用户
    public function addUser($user_name,$user_number,$user_sex,$user_password){
        $data = array(
            'user_name'=>$user_name,
            'user_number' => $user_number,
            'user_sex' => $user_sex,
            'user_password' => md5($user_password),
        );
        $this->db->insert('jingjia_user', $data);
    }

    //查询用户
    public  function getUser($user_name,$user_password){
       $condition['user_name']=$user_name;
       $condition['user_password']=md5($user_password);
       $query = $this->db->where($condition)->get('jingjia_user');
      return $query->row_array();//返回查询结果，若有数据，只返回一行

    }


}