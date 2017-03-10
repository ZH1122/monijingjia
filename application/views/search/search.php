<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!--
	作者：LJX
	时间：2016-10-11
	描述：搜索首页
-->
<div class="col-lg-12">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<form method="get" name="myform"  action="<?php  echo urldecode(site_url('search/Search/show_list'))?>">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<input name="keyword" type="text" class="form-control input-lg" placeholder="请输入要搜索的内容" />
			</div>
			<div class="col-lg-2 hidden-sm hidden-xs">
				<button type="submit" class="btn btn-info input-lg">点击搜索</button>
			</div>
		</form>
	</div>
	<div class="col-lg-2"></div>
</div>


