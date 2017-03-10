<?php $this->load->view("userhome/manage/managerightheader",array("plannavclass"=>'active'));?>
<div class="panel panel-default">
    <form action="<?php echo base_url().'index.php/userhome/uhmanageplan/deletePlan';?>" method="post">
    <!-- Default panel contents -->
    <div class="panel-heading"><!-- Single button -->
        <div class="btn-group">
            <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="modal" data-target="#addplanModal"><span class="glyphicon glyphicon-plus"></span>&nbsp;新建计划</button>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-default" name="deletePlan"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除计划</button>
        </div>

    </div>

    <table class="table">
            <tr><td></td> <td>推广计划</td><td>状态</td><td>消费</td>  <td>预算</td> <td colspan="2">编辑</td>  </tr>
            <?php if(empty($data)) : ?>
                <tr><td></td> <td>您暂时没有推广计划！</td><<td></td><td></td><td></td><td></td></tr>
            <?php else : ?>
                <?php foreach($data as $row):?>
                    <tr><td><input type="checkbox" name="del_id[]" value="<?php echo $row['plan_id'];?>"></td>
                        <td><?php echo $row['plan_name'];?></td>
                        <td>
                            <?php
                            switch($row['plan_state']){
                                case 1:$row['plan_state']="<font class='text-success'>有效</font>"; break;
                                case 2:$row['plan_state']="<font class='text-warning'>暂停推广</font>"; break;
                                case 3:$row['plan_state']="<font class='text-warning'>审核中</font>"; break;
                                case 4:$row['plan_state']="<font class='text-danger'>预算不足</font>"; break;
                                case 5:$row['plan_state']="<font class='text-danger'>无效</font>"; break;
                                default:$row['plan_state']="<font class='text-danger'>未知状态</font>";break;
                            }
                            echo $row['plan_state'];?></td>
                        <td><?php echo $row['plan_consume'];?></td>
                        <td><?php echo $row['plan_budget'];?></td>
                        <td><div class="btn-group"><a class="dropdown-toggle"  href="<?php echo base_url().'index.php/userhome/uhmanageplan/getupdatePlan/'.$row['plan_id'];?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;修改</a></div></td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
    </table>
    </form>
</div>

<script type="text/javascript" src="<?php echo base_url('static/js/custom/checkAddPlan.js');?>"></script>
<!--新建计划弹出框开始-->
<div class="modal fade bs-example-modal-lg" id="addplanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">新建推广计划</h4>
            </div><br>

            <form class="form-horizontal" role="form" action="<?php echo base_url().'index.php/userhome/uhmanageplan/addPlan';?>" method="post">
                <div class="form-group">
                    <label for="plan_name" class="col-sm-2 control-label">名称：</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="推广单元名称 " id="plan_name" name="plan_name" required="required" /><br>
                        <div class="alert alert-success" role="alert" id="error">请输入推广计划名称</div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                    <label for="plan_budget" class="col-sm-2 control-label">预算：</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" placeholder="计划预算（元） " id="plan_budget" name="plan_budget" required="required" /><br>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                        <input  type="submit" class="btn btn-primary submit" name="addplansubmit" value="下一步">&nbsp;
                        <button type="button" class="btn btn-default" data-dismiss="modal">&nbsp;取消</button>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </form>


        </div>
    </div>
</div>


<!--新建计划弹出框结束-->




<?php $this->load->view("userhome/manage/managefooter");?>
