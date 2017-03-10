<?php
/*用户中心账户信息视图
 * time:2016/10/13   author:哈哈哈蜜瓜*/?>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8" style=" background-color:#fafafa;">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">账户资料</div>
                    <div class="panel-body">
                        <p>账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;户：<?php echo $user['user_name'];?></p>
                        <p>学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号：<?php echo $user['user_number'];?></p>
                        <p>性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<?php  echo $user['user_sex'];?></p>
                        <p>余&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;额：<?php echo $user['user_balance'];?></p>
                        <p>登&nbsp;录&nbsp;&nbsp;IP&nbsp;：<?php echo $this->input->ip_address();?></p>
                        <form method="post" action="<?php echo base_url().'index.php/userhome/userhome/updateInformation';?>">
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>&nbsp;修改资料</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">当前帐号消费情况</div>
                    <div class="panel-body">
                        <p>暂无数据</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
