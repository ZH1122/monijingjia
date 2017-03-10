<?php
/*用户中心->账户充值视图
 * time:2016/11/15   author:哈哈哈蜜瓜*/?>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8" style=" background-color:#fafafa;">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-user"></span> 账户情况</div>
                    <div class="panel-body">
                       <p> 账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;户：<?php echo $user['user_name'];?> </p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <p>余&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;额：<?php echo $user['user_balance'];?> </p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <form  class="form-inline" role="form" method="post" action="<?php echo base_url().'index.php/userhome/uhrecharge/recharge';?>">
                            <div class="form-group">
                                充&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;值：
                                <input type="number" class="form-control" id="recharge_money" name="recharge_money" placeholder="充值金额（元）">
                            </div>
                            <input  type="submit" class="btn btn-default submit" name="rechargesubmit" value="充值">&nbsp;
                        </form>


                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-heading"><span class="glyphicon glyphicon-usd"></span> 当前帐号充值情况 </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr><td>充值金额</td><td>充值状态</td> <td>申请日期</td></tr>
                        <?php if(empty($recharge)) : ?>
                            <tr><td>您暂时没有充值记录！</td><td></td><td></td></tr>
                        <?php else : ?>
                            <?php foreach($recharge as $row):?>
                                <tr>
                                    <td><?php echo $row['recharge_money'];?></td>
                                    <td><?php
                                        switch($row['recharge_status']){
                                            case 1:$row['recharge_status']="<font class='text-success'>充值成功</font>"; break;
                                            case 0:$row['recharge_status']="<font class='text-warning'>充值中...</font>"; break;
                                            default:$row['recharge_status']="<font class='text-danger'>充值失败</font>";break;
                                        }
                                        echo $row['recharge_status'];?></td>
                                    <td><?php echo $row['recharge_date'];?></td>
                                </tr>
                            <?php endforeach;?>
                        <?php endif;?>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
