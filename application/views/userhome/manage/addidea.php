<script type="text/javascript" src="<?php echo base_url('static/js/custom/checkAddIdea.js');?>"></script>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8" style=" background-color:#fafafa;">

        <div class="col-lg-6">
        <div class=" panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;创意填写</h3>
            </div>
            <div class="panel-body">
                  <form  role="form" action="<?php echo base_url().'index.php/userhome/uhmanageidea/addIdea';?>" method="post">
                    <div class="form-group">
                        <label for="idea_title">选择推广单元</label>
                        <select class="form-control input-lg" name="unit_id">
                            <?php if(empty($data)) : ?>
                                <option>您暂时没有单元！</option>
                            <?php else : ?>
                                <?php foreach($data as $row):?>
                                    <option value="<?php echo $row['unit_id'];?>"><?php echo $row['unit_name'];?></option>
                                <?php endforeach;?>
                            <?php endif;?>
                        </select>
                    </div>

                    <div class="form-group  has-feedback" id="idea_titlepearent">
                        <label for="idea_title" class="control-label">创意标题</label>
                        <input type="text" class="form-control input-lg" id="idea_title" name="idea_title" placeholder="标题字符在2-20之间" maxlength="20">
                        <span id="state_title" class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback" id="idea_urlpearent">
                        <label for="idea_url" class="control-label ">创意URL</label>
                        <input type="text" class="form-control input-lg" id="idea_url" name="idea_url" placeholder="请填写可访问的url" maxlength="30">
                        <span id="state_url" class="glyphicon form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback" id="idea_describrpearent">
                       <label for="idea_describr" class="control-label ">创意描述</label>
                       <textarea class="form-control" id="idea_describr" name="idea_describr" rows="3" placeholder="标题描述在2-80之间" maxlength="80"></textarea>
                        <span id="state_describr" class="glyphicon form-control-feedback"></span>
                    </div>
                     <input  type="submit" class="btn btn-default submit input-lg" name="addideasubmit">
                      <a href="<?php echo base_url().'index.php/userhome/uhmanageidea/idea';?>"  style='color:black'><button type="button" class="btn btn-default input-lg">取消</button></a>
                </form>

            </div>
        </div>
        </div>

        <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-check"></span>&nbsp;&nbsp;效果预览</h3>
            </div>
            <div class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                       <a href="#" id="showTitle">百度一下,你就知道</a><br>
                       <p id="showDescribr"> 全球最大的中文搜索引擎、致力于让网民更便捷地获取信息，找到所求。百度超过千亿的中文网页数据库，可以瞬间找到相关的搜索结果。</p>
                       <p id="showUrl">www.baidu.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="col-lg-2"></div>
</div>

<?php $this->load->view("userhome/manage/managefooter");?>
