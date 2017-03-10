<?php $this->load->view("userhome/manage/managerightheader",array("ideanavclass"=>'active'));?>

<div class="panel panel-default">
    <form action="<?php echo base_url().'index.php/userhome/uhmanageidea/deleteIdea';?>" method="post">
        <!-- Default panel contents -->
        <div class="panel-heading"><!-- Single button -->
            <div class="btn-group">
                <a href="<?php echo base_url().'index.php/userhome/uhmanageidea/getAddIdea/';?>"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>&nbsp;新建创意</button></a>
            </div>

            <div class="btn-group">
                <button type="submit" class="btn btn-default" name="deleteIdea"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除创意</button>
            </div>

        </div>

        <table class="table">
            <tr><td></td> <td>推广单元</td> <td>标题</td><td>URL</td> <td>展现</td> <td>点击</td> <td colspan="2">编辑</td>  </tr>
            <?php if(empty($data)) : ?>
                <tr><td></td> <td>您暂时没有推广创意！</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            <?php else : ?>
                <?php foreach($data as $row):?>
                    <tr><td><input type="checkbox" name="delIdea_id[]" value="<?php echo $row['idea_id'].",".$row['unit_id'];?>">
                        <td><?php echo $row['unit_name'];?></td>
                        <td><?php echo $row['idea_title'];?></td>
                        <td><?php echo $row['idea_url'];?></td><td><?php echo $row['idea_show'];?></td><td><?php echo $row['idea_click'];?></td>
                        <td><div class="btn-group"><a class="dropdown-toggle"  href="<?php echo base_url().'index.php/userhome/uhmanageidea/getupdateIdea/'.$row['idea_id'];?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;修改</a></div></td>
                    </tr>
                <?php endforeach;?>
            <?php endif;?>
        </table>
    </form>
</div>

<?php $this->load->view("userhome/manage/managefooter");?>
