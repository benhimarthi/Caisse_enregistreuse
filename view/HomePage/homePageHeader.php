<?php ob_start(); ?>
<header class="hd">
	<div class="title hm">
		<h2>Cash register</h2>
	</div>
	<div class="u_sb">
		<div class="search_bar">
					<input type="text" name="">
					<a href="">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  						<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					</svg>
					</a>
		</div>
		<div class="user_profile">
					<div class="circle_avatar h_p">
						<!--<img src="">-->
					</div>
		</div>
	</div>
</header>
<?php $header = ob_get_clean(); ?>