<!--
	作者：601351928@qq.com
	时间：2016-10-11
	描述：注册页面
-->
<div class="col-lg-4"></div>
<div class="col-lg-4">
    <form method="post" action="<?php echo base_url().'index.php/user/user/insertUser';?>">
        <div class="form-group">
            <label class="control-label">用&nbsp;&nbsp;户&nbsp;&nbsp;名:</label>
            <input type="text" class="form-control input-lg" placeholder="请输入用户名" id="user_name" name="user_name" required="required"/><br>
             <?php echo form_error('user_name');?>
        </div>
        <div class="form-group">
            <label class="control-label">学&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;号:</label>
            <input type="text" class="form-control input-lg" placeholder="请输入学号" id="user_number" name="user_number" required="required"/><br>
            <?php echo form_error('user_number');?>
        </div>
        <div class="form-group">
            <label class="control-label">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别:</label>
            &nbsp;&nbsp;男&nbsp;&nbsp;<input type="radio" id="user_sex" value="男" name="user_sex" checked />
            &nbsp;&nbsp;女&nbsp;&nbsp;<input type="radio" id="user_sex"  value="女" name="user_sex"/>
        </div>
        <div class="form-group">
            <label class="control-label">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</label>
            <input type="password" class="form-control input-lg" placeholder="请输入密码" id="user_password" name="user_password" required="required"/><br>
            <?php echo form_error('user_password');?>
        </div>
        <div class="form-group">
            <label class="control-label">确认密码:</label>

            <input type="password" class="form-control input-lg" placeholder="请再次输入密码" id="user_passwordconf" name="user_passwordconf" required="required"/>
        </div>
        <div class="form-group">
            <label class="control-label">验&nbsp;&nbsp;证&nbsp;&nbsp;码:</label><?php echo $cap; ?>
            <input type="text" class="form-control input-lg" placeholder="请输入验证码" id="captcha" name="captcha" required="required"/>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary input-lg" name="submit" id="submit">
            <button type="reset" class="btn btn-warning input-lg">重置</button>
        </div>

    </form>
</div>


<div class="col-lg-4"></div>