<?php $this->load->view("userhome/manage/managerightheader",array("keywordnavclass"=>'active'));?>

<div class="panel panel-default">
    <form action="<?php echo base_url().'index.php/userhome/uhmanagekeyword/deleteKeyword';?>" method="post">
        <!-- Default panel contents -->
        <div class="panel-heading"><!-- Single button -->
            <div class="btn-group">
                <a href="<?php echo base_url().'index.php/userhome/uhmanagekeyword/getAddKeyword/';?>"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>&nbsp;新建关键词</button></a>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-default" name="deleteKeyword"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除关键词</button>
            </div>

        </div>

        <table class="table">
            <tr><td></td> <td>关键词</td> <td>推广单元</td> <td>状态</td><td>出价</td> </tr>
            <?php if(empty($data)) : ?>
                <tr><td></td> <td>您暂时没有关键词！</td><td></td><td></td><td></td></tr>
            <?php else : ?>
                <?php foreach($data as $row):?>
                    <tr><td><input type="checkbox" name="delKeyword_id[]" value="<?php echo $row['unit_kw_id'];?>">
                        <td><?php echo $row['unit_kw_keyword'];?></td>
                        <td><?php echo $row['unit_name'];?></td>
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
                        <td><?php echo $row['unit_kw_price'];?></td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
        </table>
    </form>
</div>

<?php $this->load->view("userhome/manage/managefooter");?>
