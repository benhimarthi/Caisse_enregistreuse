<?php ob_start();?>
<body>
	<?php //print_r($v);?>
	<div class="container">
		<div class="title">
			<h3>USER AUTHENTIFICATION</h3>
		</div>
		<form>
			<div class="taskBar">
			<div>
				<select>
					<option>
						By data
					</option>
					<option>
						A-z
					</option>
				</select>
			</div>
			<div>
				<div class="search_bar">
					<input type="text" name="">
					<a href="">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  						<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					</svg>
					</a>
				</div>
			</div>
			</div>
		</form>
		<div class="users">
			<?php foreach ($val as $key => $value):?>
				<div class="user_profile">
					<div class="circle_avatar">
						<!--<img src="">-->
					</div>
					<h4 class="title">
						<a href=<?php echo("index.php?action=authentification&user_id=".$value->id)?>>
							<?php echo($value->name);?>
						</a>
					</h4>
				</div>
			<?php endforeach;?>
		</div>
		<div class="pagination">
			<div></div>
		</div>
	</div>
</body>
<?php $bodyContent = ob_get_clean();?>
