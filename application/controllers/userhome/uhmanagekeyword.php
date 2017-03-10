<?php
/*用户中心->推广管理->推广关键词控制器
 * time:2016/10/30   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
class UHmanagekeyword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');

    }

    //显示推广关键词
    public function keyword(){

        $this->load->model('user/User_model');
        $user = $this->session->userdata('user');

        $this->load->model('userhome/Managekeyword_model');
        $keyword=$this->Managekeyword_model->getKeyword($user['user_id']);

        $this->load->view("templates/header", array('title' => '个人中心'));
        $this->load->view("templates/homeheader");
        $this->load->view("userhome/manage/manageleftheader", array('user' => $user,'data'=>$keyword));
        $this->load->view("userhome/manage/keyword", array('user' => $user,'data'=>$keyword));
        $this->load->view("templates/footer");
    }

    //显示添加推广关键词
        public function getAddKeyword(){
            $this->load->model('user/User_model');
            $user = $this->session->userdata('user');

            $this->load->model('userhome/Managekeyword_model');
            $unit=$this->Managekeyword_model->getAddKeywordUnit($user['user_id']);

            $this->load->view("templates/header", array('title' => '个人中心'));
            $this->load->view("templates/homeheader");
            $this->load->view("userhome/manage/addkeyword", array('user' => $user,'data'=>$unit));
            $this->load->view("templates/footer");
        }


    //ajax返回查询关键词
    public function selectKeyword(){
         $postData= $this->input->post('inData', true);

        //验证数据
       $this->form_validation->set_rules('inData','关键词','trim|required|min_length[1]|max_length[20]');
        if($this->form_validation->run()) {

            $this->load->model('userhome/Managekeyword_model');
            $returnData=$this->Managekeyword_model->selectKeyword($postData);

            echo "<tr><td colspan='3'>您搜索的是：<font color='#63bbe1'>".$postData."</font></td></tr>
                <tr><td></td><td>关键词</td><td>百度指数</td></tr>";
            if(empty($returnData)){
                echo "<tr><td colspan='3'>查询不到关于<font color='#63bbe1'>".$postData."</font>的关键词，请更换新的关键词重新查找!</td></tr>";
            }else{
                //循环打印数据
                foreach($returnData as $row){
                  echo "<tr><td><input type='checkbox' name='kw_id[]' onclick='checkboxOnclick()'  value='".$row['kw_id']."'>
                        <td>".$row['kw_name']."</td>
                        <td>".$row['kw_ranking']."</td></tr>";
                        //<td><a  href='".base_url()."index.php/uhmanageidea/getupdateIdea/".$row['kw_id']."'><span class='glyphicon glyphicon-ok'></span>&nbsp;添加</a></td></tr>";
                    //<td> <button type='button' class='btn btn-info' name='keyword'  value='".$row['kw_id']."'>添加</button></td>
                    //<input  type='submit' class="btn btn-primary submit" name="addunitsubmit">
                }
                echo "<tr><td colspan='3'><input type='submit' class='btn btn-info' name='addkeywordsubmit'/></td></tr>
                      <script type='text/javascript' src='".base_url('static/js/custom/addKeyword.js')."'></script>";
            }

        }else{
           echo validation_errors();
        }

    }


    //添加推广关键词
    public function addKeyword(){

        if(!empty($_POST['addkeywordsubmit'])) {

            $kw_id=$this->input->post('kw_id',true);
            $unit_id=$this->input->post('unit_id',true);

            //验证数据
            $this->form_validation->set_rules('kw_id','推广关键词','trim');
            $this->form_validation->set_rules('unit_id','推广单元','trim');

            if($this->form_validation->run()){
                //新建创意成功，插入数据
                $this->load->model('userhome/Managekeyword_model');
                $this->Managekeyword_model->addKeyword($kw_id,$unit_id);
               redirect('userhome/uhmanageKeyword/keyword');

            }else{
                //注册信息有误，显示错误信息
                echo validation_errors();
            }


        }else{
            echo "空addkeywordsubmit";
        }
    }


    //删除关键词
    public function deleteKeyword(){
        //接受删除时传入的kw_id,unit_id
        $delunit_kw_id=$this->input->post('delKeyword_id');
        if( $delunit_kw_id) {
            $delunit_kw_id= implode(',',$delunit_kw_id);

            if($delunit_kw_id){
                $this->load->model('userhome/Managekeyword_model');
                $this->Managekeyword_model->deleteKeyword($delunit_kw_id);
                redirect('userhome/uhmanageKeyword/keyword');
            }

        }else{
            //直接点击删除，没有选项
            redirect('userhome/uhmanageKeyword/keyword');
        }



    }





}