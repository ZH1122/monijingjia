<?php
/*用户中心推广管理视图
 * time:2016/10/13   author:哈哈哈蜜瓜*/?>

            <div class="col-lg-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        账&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;户：<?php echo $user['user_number'];?><br><br>
                        状态:<font color="green">正常生效</font>&nbsp;&nbsp;|&nbsp;&nbsp;日预算：50.00 &nbsp;&nbsp;&nbsp;&nbsp;<a href="#">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;推广地区：江苏&nbsp;&nbsp;&nbsp;&nbsp; <a href="#">修改</a>
                    </div>
                    <div class="panel-body">
                        <ul class="nav nav-tabs" role="tablist" id="manageheadernav">
                            <li role="presentation" class=" <?php if(!empty($plannavclass)){echo $plannavclass;}?>"><a href="<?php echo base_url().'index.php/userhome/uhmanageplan/plan';?>">推广计划</a></li>
                            <li role="presentation" class=" <?php if(!empty($unitnavclass)){echo $unitnavclass;}?>"><a href="<?php echo base_url().'index.php/userhome/uhmanageunit/unit';?>">推广单元</a></li>
                            <li role="presentation" class=" <?php if(!empty($ideanavclass)){echo $ideanavclass;}?>"><a href="<?php echo base_url().'index.php/userhome/uhmanageidea/idea';?>">创意</a></li>
                            <li role="presentation" class=" <?php if(!empty($keywordnavclass)){echo $keywordnavclass;}?>"><a href="<?php echo base_url().'index.php/userhome/uhmanagekeyword/keyword';?>">关键词</a></li>
                        </ul><br>