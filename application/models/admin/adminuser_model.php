<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * 用户管理
 * __hao
 */
class Adminuser_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    
        $this->load->database();
    }
    //展示用户
    public function getAllUser($offset,$limit){
        $query=$this->db->get_where('jingjia_user',array(),$limit,$offset);
        $allUser=$query->result_array();
        return $allUser;
    }
    //重置用户密码
    public function resetPw($id=''){
        $condition['user_id']=$id;
        $data['user_password']=md5('123456');
        
        if($this->db->where($condition)->update('jingjia_user',$data)){
            return true;
        }else{
            return false;
        }
    }
    //删除用户
//     public function delete($id){
//         $data['user_id']=$id;
//         if($this->db->delete('jingjia_user',$data)){
//             return true;
//         }else{
//             return false;
//         }
//     }
    public function getAllCount(){
        return $this->db->count_all('jingjia_user');
    }
}