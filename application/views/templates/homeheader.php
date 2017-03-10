<?php
/*用户中心导航栏视图
 * time:2016/10/13   author:哈哈哈蜜瓜*/
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8" style=" background-color:#fafafa;">
            <nav class="navbar navbar-default ">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="<?php echo base_url().'index.php/userhome/userhome/index';?>">首页</a>
                        <a class="navbar-brand" href="<?php echo base_url().'index.php/userhome/uhinformation/index';?>">账户信息</a>
                        <a class="navbar-brand" href="<?php echo base_url().'index.php/userhome/uhrecharge/index';?>">财务</a>
                        <!--<a class="navbar-brand" href="#">推广概况</a>-->
                        <a class="navbar-brand" href="<?php echo base_url().'index.php/userhome/uhmanage/index';?>">推广管理</a>
                    </div>
                </div>
            </nav>
     </div>
     <div class="col-lg-2"></div>
</div>