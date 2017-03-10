<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keyword_model extends CI_Model{
    
    public function __construct(){
    parent::__construct();
    
    $this->load->database();    
    }

    public function getAllKeyword($offset,$limit){
        $query=$this->db->get_where('jingjia_keyword',array(),$limit,$offset);
        $allKeyword=$query->result_array();
        return $allKeyword;
    }
    public function getAllCount(){
        return $this->db->count_all('jingjia_keyword');
    }
    public function getOneKeyword($id){
        $condition['kw_id']=$id;
        $query=$this->db->where($condition)->get('jingjia_keyword');
        $oneKeyword=$query->row_array();
        return $oneKeyword;
    }
    public function update($id,$name,$ranking){
        $condition['kw_id']=$id;
        $data['kw_name']=$name;
        $data['kw_ranking']=$ranking;
        
        if($this->db->where($condition)->update('jingjia_keyword',$data)){
            return true;
        }else{
            return false;
        }
    }
    
    public function insert($name,$ranking){
        
        $data['kw_name']=$name;
        $data['kw_ranking']=$ranking;
        
        if($this->db->insert('jingjia_keyword',$data)){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id){
        $data['kw_id']=$id;
        if($this->db->delete('jingjia_keyword',$data)){
            return true;
        }else{
            return false;
        }
    }
    
}