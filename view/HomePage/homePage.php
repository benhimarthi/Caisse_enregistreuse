
<?php ob_start();?>
<body>
	<div class="product">
		<div class="taskBar">
			<div class="user_profile">
			</div>
		</div>
		<div class="container product_section">
			<?php foreach ($products as $key => $value):?>
				<div class="product_item">
					<div class="circle_avatar prod">
						<img src=<?php //echo($img_link);?>>
					</div>
					<div class="product_info">
						<div class="product_title">
						<?php echo($value->title);?>
						</div>
						<h4 class="price">
							<a href=<?php echo("index.php?action=cell&article_id=".$value->id)?>>
								<?php echo($value->price." MAD");?>
							</a>
						</h4>
					</div>
				</div>
			<?php endforeach;?>
		</div>
		<?php include_once("ProductDetailsPage.php");?>
		<div class="tab">
			<div class="header">
				<button class="btn_cd act">X</button>
				<button class="btn_cd act">+</button>
				<input type="number" name="" class="btn_cd vl act" disabled>
				<button class="btn_cd act">-</button>
				<button class="btn_cd vl act">validate cell</button>
			</div>
			<?php echo($product_details_table);?>
		</div>
	</div>
	
</body>
<?php $bodyContent = ob_get_clean();?>
<?php include("homePageHeader.php");?>
<?php include("view/template.php");?>
