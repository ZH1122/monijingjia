<?php
/*用户中心首页视图
 * time:2016/10/13   author:哈哈哈蜜瓜*/
?>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8" style=" background-color:#fafafa;">
        <div class="row">
           <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">我的账户</div>
                <div class="panel-body">
                    <p>账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;户：<?php echo $user['user_name'];?></p>
                    <p>余&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;额：<?php echo $user['user_balance'];?></p>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                        <p>搜索推广</p>
                        <p>余&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;额：</p>
                        <p>预计消费：</p>
                    </li>

                </ul>
            </div>
            </div>

            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">推广情况</div>
                    <div class="panel-body">
                        <p>暂无数据</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-2"></div>
</div>