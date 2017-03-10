<script type="text/javascript" src="<?php echo base_url('static/js/custom/selectKeyword.js');?>"></script>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8" style=" background-color:#fafafa;">

        <div class="col-lg-3">
            <div class=" panel panel-default">

                <div class="panel-heading">推广流程</div>
                <div class="panel-body">
                    新建计划<br><span class="glyphicon glyphicon-chevron-down"></span><br>
                    新建单元<br><span class="glyphicon glyphicon-chevron-down"></span><br>
                    新建创意<br><span class="glyphicon glyphicon-chevron-down"></span><br>
                    添加关键词<br><span class="glyphicon glyphicon-chevron-down"></span><br>
                    提交审核<br><span class="glyphicon glyphicon-chevron-down"></span><br>
                    创意展出

                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;选取关键词</h3>
                </div>
                <div class="panel-body">
                    <form  role="form" action="<?php echo base_url().'index.php/userhome/uhmanagekeyword/addKeyword';?>" method="post">
                        <div class="row">
                            <div class="col-lg-3"><label for="idea_title">选择推广单元：</label></div>
                            <div class="col-lg-9">
                            <select class="form-control" name="unit_id">
                                <?php if(empty($data)) : ?>
                                    <option>您暂时没有单元！</option>
                                <?php else : ?>
                                    <?php foreach($data as $row):?>
                                        <option value="<?php echo $row['unit_id'];?>"><?php echo $row['unit_name'];?></option>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </select>
                            </div>
                        </div><br>

                            <div class="row">
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" placeholder="请输入要添加的关键词，长度在1-20" id="getKeyword" name="getKeyword" maxlength="20"/>
                                </div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-info " id="getKeywordSubmit" name="getKeywordSubmit" value="test">适配关键词</button>
                                </div>
                            </div><br>


                        <table class="table" id="test">
                            <tr><td>关键词</td><td>百度指数</td><td>操作</td></tr>
                            <tr><td colspan="3">请输入查询推广关键词！</td></tr>

                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-2"></div>
</div>

<?php $this->load->view("userhome/manage/managefooter");?>
