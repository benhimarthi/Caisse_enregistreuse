<?php ob_start();?>
<div class="user_profile">
	<!--<div class="circle_avatar">
		<img src=<?php echo($img_link);?>>
	</div>-->
	<h4 class="title">
		<?php echo($title);?>
	</h4>
</div>
<?php $profile = ob_get_clean();?>