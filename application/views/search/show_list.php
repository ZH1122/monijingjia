<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
	$("p a").click(function() {
		var id = $(this).attr("rel");
		 $.ajax({
		      type:"POST",
		      url:"<?php  echo site_url('search/Search/handleclick')?>",
		      data:"id="+id,
		      cache:false,
		      success:{}
		  });
	});
});
</script>

<!--
	作者：LJX
	时间：2016-10-11
	描述：显示搜索结果页面
-->

<div class="col-lg-12">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<form method="get" name="myform"
			action="<?php  echo urldecode(site_url('search/Search/show_list'))?>">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<input name="keyword" type="text" class="form-control input-lg"
					placeholder="请输入要搜索的内容" />
			</div>
			<div class="col-lg-2 hidden-sm hidden-xs">
				<button type="submit" class="btn btn-info input-lg">点击搜索</button>
			</div>
		</form>
	</div>
	<div class="col-lg-2"></div>
</div>
<div class="col-lg-12">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<h3>搜索内容</h3>
		<?php if (empty($result)):?>
			<p><?php  echo $tie;?></p>
		<?php else :?>
		
		<table>
			<?php foreach ($result as $row) : ?>
			<tr>
				<td>
					<h4>
						<p>
							<a rel="<?php echo $row['idea_id'];?>"
								href="<?php echo $row['idea_url'];?>"><?php echo $row['idea_title'];?></a>
						</p>
					</h4>
				</td>
			</tr>
			<tr>
				<td><p><?php echo $row['idea_describr'];?></p></td>
			</tr>
			<tr>
				<td><p>
						网站：<a rel="<?php echo $row['idea_id'];?>"
							href="<?php echo $row['idea_url'];?>"><?php echo $row['idea_url'];?></a>
					</p></td>
			</tr>
			<?php endforeach;?>
			<tr>
				<td><?php  echo $page;?></td>
			</tr>
		</table>

		<?php endif;?>
	</div>
</div>