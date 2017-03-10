<script type="text/javascript" src="<?php echo base_url('static/js/custom/checkAddPlan.js');?>"></script>
<!--修改计划弹出框开始-->
<script type="text/javascript">$(function(){
            $('#updateModal').modal({backdrop: 'static', keyboard: false});
        }
    );</script>

<div class="modal fade bs-example-modal-lg" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">修改推广计划</h4>
            </div><br>

            <form class="form-horizontal" role="form" action="<?php echo base_url().'index.php/userhome/uhmanageplan/updatePlan';?>" method="post">
                <?php foreach($getonceplan as $row):?>
                <div class="form-group">
                    <label for="plan_name" class="col-sm-2 control-label">名称：</label>
                    <div class="col-sm-9">
                        <input type="text" style="display:none" value="<?php echo $row['plan_id'];?>" id="plan_id" name="plan_id" required="required" />
                        <input type="text" class="form-control"  value="<?php echo $row['plan_name'];?>" placeholder="推广单元名称 " id="plan_name" name="plan_name" required="required" /><br>
                        <div class="alert alert-success" role="alert" id="error">请输入推广计划名称</div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                    <label for="plan_budget" class="col-sm-2 control-label">预算：</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" value="<?php echo $row['plan_budget'];?>" placeholder="计划预算（元） " id="plan_budget" name="plan_budget" required="required" /><br>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                        <input  type="submit" class="btn btn-primary submit" name="updateplansubmit">&nbsp;
                        <a href="<?php echo base_url().'index.php/userhome/uhmanageplan/plan';?>"> <button type="button" class="btn btn-default">取消</button></a>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <?php endforeach;?>
            </form>


        </div>
    </div>
</div>


<!--修改计划弹出框结束-->

