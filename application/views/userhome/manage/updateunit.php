<script type="text/javascript" src="<?php echo base_url('static/js/custom/checkAddUnit.js');?>"></script>
<!--修改单元弹出框开始-->
<script type="text/javascript">$(function(){
            $('#updateUnitModal').modal({backdrop: 'static', keyboard: false});
        }
    );</script>

<div class="modal fade bs-example-modal-lg" id="updateUnitModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">修改推广单元</h4>
            </div><br>

            <form class="form-horizontal" role="form" action="<?php echo base_url().'index.php/userhome/uhmanageunit/updateUnit';?>" method="post">
                <?php foreach($getonceUnit as $row):?>
                    <div class="form-group">
                        <label for="plan_budget" class="col-sm-2 control-label">推广单元名称：</label>
                        <div class="col-sm-9">
                            <input type="text" style="display:none" value="<?php echo $row['unit_id'];?>" id="unit_id" name="unit_id" required="required" />
                            <input type="text"class="form-control"  value="<?php echo $row['unit_name'];?>" placeholder="推广单元名称 " id="unit_name" name="unit_name" required="required" /><br>
                            <div class="alert alert-success" role="alert" id="error">请输入推广单元名称</div>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-9">
                            <input  type="submit" class="btn btn-primary submit" name="updateunitsubmit">&nbsp;
                            <a href="<?php echo base_url().'index.php/userhome/uhmanageunit/unit';?>">  <button type="button" class="btn btn-default">取消</button></a>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                <?php endforeach;?>
            </form>


        </div>
    </div>
</div>


<!--修改单元弹出框结束-->

