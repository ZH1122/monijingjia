<!--
	作者：601351928@qq.com
	时间：2016-10-11
	描述：登录页面
-->
<div class="col-lg-4"></div>
<div class="col-lg-4">
    <form method="post" action="<?php echo base_url().'index.php/user/user/signin';?>">
        <div class="form-group">
            <label class="control-label">用&nbsp;&nbsp;户&nbsp;&nbsp;名:</label>

            <input type="text" class="form-control input-lg" placeholder="请输入用户名" id="user_name" name="user_name"/>
        </div>
        <div class="form-group">
            <label class="control-label">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:</label>

            <input type="password" class="form-control input-lg" placeholder="请输入密码" id="user_password" name="user_password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary input-lg">提交</button>
            <button type="reset" class="btn btn-warning input-lg">重置</button>
        </div>

    </form>
</div>
<div class="col-lg-4"></div>
