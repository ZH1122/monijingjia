<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 创意展示的控制器
 * 2016-12-19更新：实现查询分页
 *@
 * @author LJX
 *        
 */
class Search extends CI_Controller
{

    /*
     * 实现基本站内搜索
     * 按付费竞价排序
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('search/Search_model', 'search');
    }

    public function index()
    {
        $this->load->view("templates/header", array(
            'title' => '搜索页面'
        ));
        $this->load->view('search/search');
    }

    /**
     * 展示创意
     */
    public function show_list()
    {
        $keyword = $this->input->get('keyword');
        
        if (! empty($keyword)) {
            
            $page_size = 8;
            // 用intval使空格转0，显示出来0,获得路由第四段的值，然后偏移量=当前的页数*分页的大小
            $offset = intval($this->uri->segment(4)) * $page_size;
            // 获得该页的数据
            $query = $this->search->get_idea($keyword, $offset, $page_size);
            // 将数据保存到数组
            $data['result'] = $query->result_array();
            // 获得总记录数
            $rows = $this->search->get_ideacounts($keyword);
            // 当前controller的地址
            $current_controller_url = 'search/search/show_list';
            // 获取page
            $data['page'] = $this->mypage($page_size, $rows, $current_controller_url);
            
            $data['tie'] = '';
            if (empty($data['result'])) {
                $data['tie'] = "非常抱歉！找不到您所要搜索的内容！";
            } else {
                // 展示次数自增1
                foreach ($data['result'] as $id) {
                    $this->search->idea_showtimesadd((int) $id['idea_id']);
                }
            }
            $this->load->view("templates/header", array(
                'title' => '搜索结果页面'
            ));
            $this->load->view('search/show_list', $data);
        } else {
            
            $this->load->view("templates/header", array(
                'title' => '搜索页面'
            ));
            $this->load->view('search/search');
        }
    }

    /**
     * 处理用户点击创意：
     * 点击量增加一
     * 记录消费金额
     */
    public function handleclick()
    {
        $id = $this->input->post('id');
        if (! empty($id)) {
            $this->search->idea_clicktimes($id);
        }
    }

    /**
     *
     * 功能：自定义分页类
     *
     * @param unknown $page_size            
     * @param unknown $rows            
     * @param unknown $current_controller_url            
     */
    public function mypage($page_size, $rows, $current_controller_url)
    {
        $this->load->library('pagination');
        $this->load->helper('url'); // 载入网站路由
        $config['base_url'] = site_url($current_controller_url);
        $config['reuse_query_string'] = true; // 设置查询的字段是否添加到分页链接中
        $config['uri_segment'] = 4; // 设置url上第几段用于传递分页器的偏移量
                                    
        // 把结果包在ul标签里
        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';
        // 自定义数字
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        // 当前页
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a><li>';
        // 前一页
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        // 后一页
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '<li>';
        
        // 这里可以自定义分页的css样式
        // $config['attributes'] = array(
        // 'class' => 'myclass'
        // ); // 给所有<a>标签加上class
        
        // 每一页显示的数据条数
        $config['per_page'] = $page_size;
        $config['first_link'] = '首页';
        $config['next_link'] = '下一页';
        $config['prev_link'] = '上一页';
        $config['last_link'] = '末页';
        
        // 记录总数
        $config['total_rows'] = $rows;
        
        // 初始化配置
        $this->pagination->initialize($config);
        
        // 生成分页链接
        return $this->pagination->create_links();
    }
}
