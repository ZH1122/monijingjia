<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * 实现创意展示的所有数据库操作
 *
 * @author LJX
 *        
 */
class Search_model extends CI_Model
{

    public function __construct()
    { // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }

    /**
     * * 功能：根据关键字查询出符合条件的推广方案
     *
     * @param [string] $keyword
     *            搜索关键字
     * @param unknown $offset            
     * @param unknown $size            
     *
     *
     * @return 返回查询对象
     */
    public function get_idea($keyword, $offset, $size)
    {
        // SELECT * FROM jingjia_unit_kw
        // JOIN jingjia_idea
        // ON jingjia_unit_kw.unit_id=jingjia_idea.unit_id
        // JOIN jingjia_unit
        // ON jingjia_unit.unit_id=jingjia_idea.unit_id
        // JOIN jingjia_plan
        // ON jingjia_plan.plan_id=jingjia_unit.plan_id
        // WHERE jingjia_plan.plan_state=1
        $this->db->select('jingjia_idea.idea_id,jingjia_idea.idea_title,jingjia_idea.idea_describr,jingjia_idea.idea_url');
        $this->db->distinct('jingjia_idea.idea_id');
        $this->db->from('jingjia_unit_kw');
        $this->db->join('jingjia_idea', 'jingjia_unit_kw.unit_id=jingjia_idea.unit_id ');
        $this->db->join('jingjia_unit', 'jingjia_unit.unit_id=jingjia_idea.unit_id');
        $this->db->join('jingjia_plan', 'jingjia_plan.plan_id=jingjia_unit.plan_id');
        $this->db->like('jingjia_unit_kw.unit_kw_keyword', $keyword); // 匹配关键词
        $this->db->or_like('jingjia_idea.idea_title', $keyword); // 匹配创意标题
        $this->db->or_like('jingjia_idea.idea_describr', $keyword); // 匹配创意描述
        $this->db->where('jingjia_plan.plan_state', 1); // 判读状态是否可用
        $this->db->limit($size, $offset); // limit的第一个参数是要读多少条记录数，第二个参数是从第几个开始读
        $this->db->order_by('jingjia_unit_kw.unit_kw_price', 'DESC'); // 按照出价排序
        
        return $this->db->get();
    }

    /**
     * 功能：获取满足条件推广方案的条数
     *
     * @param string $keyword            
     */
    public function get_ideacounts($keyword = '')
    {
        $this->db->select('jingjia_idea.idea_id,jingjia_idea.idea_title,jingjia_idea.idea_describr,jingjia_idea.idea_url');
        $this->db->distinct('jingjia_idea.idea_id');
        $this->db->from('jingjia_unit_kw');
        $this->db->join('jingjia_idea', 'jingjia_unit_kw.unit_id=jingjia_idea.unit_id ');
        $this->db->join('jingjia_unit', 'jingjia_unit.unit_id=jingjia_idea.unit_id');
        $this->db->join('jingjia_plan', 'jingjia_plan.plan_id=jingjia_unit.plan_id');
        $this->db->like('jingjia_unit_kw.unit_kw_keyword', $keyword); // 匹配关键词
        $this->db->or_like('jingjia_idea.idea_title', $keyword); // 匹配创意标题
        $this->db->or_like('jingjia_idea.idea_describr', $keyword); // 匹配创意描述
        $this->db->where('jingjia_plan.plan_state', 1); // 判读状态是否可用
        $this->db->order_by('jingjia_unit_kw.unit_kw_price', 'DESC'); // 按照出价排序
        $query = $this->db->get();
        return $query->num_rows();
    }

    /**
     * 功能：记录创意的展示次数;
     *
     * @param 创意id $id            
     */
    public function idea_showtimesadd($id)
    { // 获得当前展示次数
        $this->db->select('idea_show');
        $this->db->from('jingjia_idea');
        $this->db->where('idea_id', $id);
        $query = $this->db->get();
        $data = $query->result_array();
        // 修改当前展示次数
        $idea_show = (int) $data[0]['idea_show'] + 1;
        $this->db->set('idea_show', $idea_show);
        $this->db->where('idea_id', $id);
        $this->db->update('jingjia_idea');
    }

    /**
     * 功能：记录创意被点击的次数并且修改该创意的消费金额;
     *
     * @param 创意id $id            
     */
    public function idea_clicktimes($id)
    { // 获得当前点击次数
        $this->db->select('idea_click');
        $this->db->from('jingjia_idea');
        $this->db->where('idea_id', $id);
        $query = $this->db->get();
        $data = $query->result_array();
        // 修改当前点击次数
        $idea_click = (int) $data[0]['idea_click'] + 1;
        $this->db->set('idea_click', $idea_click);
        $this->db->where('idea_id', $id);
        $this->db->update('jingjia_idea');
        
        // 获得当前消费金额
        $this->db->select('jingjia_plan.plan_consume,jingjia_plan.plan_id,jingjia_unit_kw.unit_kw_price');
        $this->db->distinct('jingjia_idea.idea_id');
        $this->db->from('jingjia_unit_kw');
        $this->db->join('jingjia_idea', 'jingjia_unit_kw.unit_id=jingjia_idea.unit_id ');
        $this->db->join('jingjia_unit', 'jingjia_unit.unit_id=jingjia_idea.unit_id');
        $this->db->join('jingjia_plan', 'jingjia_plan.plan_id=jingjia_unit.plan_id');
        $this->db->where('jingjia_idea.idea_id', $id);
        $query = $this->db->get();
        $data = $query->result_array();
        // 修改当前消费金额
        $consume = (int) $data[0]['plan_consume'] + (int) $data[0]['unit_kw_price'];
        $this->db->set('plan_consume', $consume);
        $this->db->where('plan_id', (int) $data[0]['plan_id']);
        $this->db->update('jingjia_plan');
    }
}
