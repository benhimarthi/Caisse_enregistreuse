<?php ob_start();?>
<script type="text/javascript">
	function act(element){
		alert(element.checked);
	}
</script>
<div class="table">
	<table>
		<thead>
			<tr>
				<th>Title</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total amount</th>
				<th>User</th>
				<th>Statu</th>
				<th>Date</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($cell_detail as $key => $value):?>
				<tr>
					<?php foreach ($value as $keys => $valu): ?>
						<td>
							<?php if($keys == "edit"):?>
								<input type="checkbox" name="" onclick="act(this)">
							<?php endif;?>
							<?php
							if($keys == "price" || $keys == "total"){
								echo $valu." MAD";
							}else{
								echo $valu;
							}
							?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php $product_details_table = ob_get_clean();?>