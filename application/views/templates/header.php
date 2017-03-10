<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?php echo base_url('static/css/bootstrap.min.css');?>" type="text/css" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('static/img/ico/1.ico');?>" />
    <script type="text/javascript" src="<?php echo base_url('static/js/jquery.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('static/js/bootstrap.js');?>"></script>
    <!---使得js中能使用绝对路径--->
    <base href="<?=base_url()?>"/>
    <title><?php echo $title;?></title>
    <style type="text/css">
      h1{display: inline}
      h3{display: inline}
    </style>
</head>

<body style='overflow:-Scroll;overflow-x:hidden' >
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url().'index.php/search/search/index';?>"><span class="glyphicon glyphicon-home"></span>&nbsp;搜索首页</a>
        </div>
        <div>
            <div class="hidden-xs ">
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="请输入要搜索的内容" />
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>搜索</button>
                </form>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <?php $user=$this->session->userdata('user');?>
                <?php if(empty($user)) : ?>
                    <li><a class="navbar-brand" href="<?php echo base_url().'index.php/user/user/login';?>">
                            <span class="glyphicon glyphicon-user"></span> &nbsp;登录&nbsp;|</a></li>
                    <li><a class="navbar-brand" href="<?php echo base_url().'index.php/user/user/register';?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;注册</a></li>

                <?php else : ?>
                    <li><a class="navbar-brand" href="<?php echo base_url().'index.php/userhome/userhome/index';?>"><span class="glyphicon glyphicon-user"></span> <?php echo $user['user_name'];?>&nbsp;|</a></li>
                    <li><a class="navbar-brand" href="<?php echo base_url().'index.php/user/user/logout';?>"><span class="glyphicon glyphicon-off"></span>&nbsp;注销</a></li>
                <?php endif;?>

            </ul>
        </div>
    </div>
</nav>
<header>
    <center><h1>网络营销竞价模拟系统</h1><h3><?php echo "「".$title."」";?></h3></center>
</header><br>
