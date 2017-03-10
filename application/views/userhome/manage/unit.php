<?php $this->load->view("userhome/manage/managerightheader",array("unitnavclass"=>'active'));?>
<div class="panel panel-default">
    <form action="<?php echo base_url().'index.php/userhome/uhmanageunit/deleteUnit';?>" method="post">
        <!-- Default panel contents -->
        <div class="panel-heading"><!-- Single button -->
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="modal" data-target="#addunitModal"><span class="glyphicon glyphicon-plus"></span>&nbsp;新建单元</button>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-default" name="deleteUnit"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除单元</button>
            </div>

        </div>

        <table class="table">
            <tr><td></td> <td>推广单元</td><td>推广计划</td><td>状态</td><td colspan="2">编辑</td>  </tr>
            <?php if(empty($data)) : ?>
                <tr><td></td> <td>您暂时没有推广单元！</td><td></td><td></td><td></td></tr>
            <?php else : ?>
                <?php foreach($data as $row):?>
                    <tr><td><input type="checkbox" name="delunit_id[]" value="<?php echo $row['unit_id'];?>"></td>
                        <td><?php echo $row['unit_name'];?></td><td><?php echo $row['plan_name'];?></td>
                        <td><?php
                            switch($row['plan_state']){
                                case 1:$row['plan_state']="<font class='text-success'>有效</font>"; break;
                                case 2:$row['plan_state']="<font class='text-warning'>暂停推广</font>"; break;
                                case 3:$row['plan_state']="<font class='text-warning'>审核中</font>"; break;
                                case 4:$row['plan_state']="<font class='text-danger'>预算不足</font>"; break;
                                case 5:$row['plan_state']="<font class='text-danger'>无效</font>"; break;
                                default:$row['plan_state']="<font class='text-danger'>未知状态</font>";break;
                            }
                            echo $row['plan_state'];?></td>
                        <td><div class="btn-group"><a class="dropdown-toggle"  href="<?php echo base_url().'index.php/userhome/uhmanageunit/getupdateUnit/'.$row['unit_id'];?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;修改</a></div></td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
        </table>
    </form>
</div>

<script type="text/javascript" src="<?php echo base_url('static/js/custom/checkAddUnit.js');?>"></script>
<!--新建单元弹出框开始-->
<div class="modal fade bs-example-modal-lg" id="addunitModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">新建推广单元</h4>
            </div><br>

            <form class="form-horizontal" role="form" action="<?php echo base_url().'index.php/userhome/uhmanageunit/addUnit';?>" method="post">
                <div class="form-group">
                    <label for="unit_name" class="col-sm-2 control-label">选择计划：</label>
                    <div class="col-sm-9">
                    <select class="form-control" name="plan_id">
                        <?php if(empty($plan)) : ?>
                            <option>您暂时没有推广计划！</option>
                        <?php else : ?>
                            <?php foreach($plan as $row):?>
                                    <option value="<?php echo $row['plan_id'];?>"><?php echo $row['plan_name'];?></option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                    <label for="unit_name" class="col-sm-2 control-label">单元名称：</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" placeholder="推广单元名称 " id="unit_name" name="unit_name" required="required" /><br>
                        <div class="alert alert-success" role="alert" id="error">请输入推广单元名称</div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-9">
                        <input  type="submit" class="btn btn-primary submit" name="addunitsubmit">&nbsp;
                        <button type="button" class="btn btn-default" data-dismiss="modal">&nbsp;取消</button>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </form>

        </div>
    </div>
</div>
<!--新建单元弹出框结束-->




<?php $this->load->view("userhome/manage/managefooter");?>
