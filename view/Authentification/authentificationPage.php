<?php ob_start();?>
<script type="text/javascript">
		function onBtnClick(value){
			var textArea = document.getElementById("text_zone");
			var val = value.innerText;
			textArea.value = textArea.value + val;
		}
		function dell(){
			var textArea = document.getElementById("text_zone");
			textArea.value = "";
		}
</script>
<body>
	<div class="container">
		<div class="title">
			<h4>USER AUTHENTIFICATION</h4>
		</div>
		
		<div class="input_area">
				<div class="password_area">
					<form method="POST" action=<?php echo("index.php?action=checkPassword&user_id=".$_GET["user_id"]);?>>
						<div class="codepin_area">
							<input type="password" name="password" placeholder="code pin" id="text_zone">
							<button name="validate">validate</button>
						</div>
					</form>
					<div class="msg">
						<?php if(isset($_GET['msg']))echo("<span>".$_GET['msg']."</span>");?>
					</div>
				</div>
				<div>
					<button class="btn_cd" onclick="onBtnClick(this)">1</button>
					<button class="btn_cd" onclick="onBtnClick(this)">2</button>
					<button class="btn_cd" onclick="onBtnClick(this)">3</button>
				</div>
				<div>
					<button class="btn_cd" onclick="onBtnClick(this)">4</button>
					<button class="btn_cd" onclick="onBtnClick(this)">5</button>
					<button class="btn_cd" onclick="onBtnClick(this)">6</button>
				</div>
				<div>
					<button class="btn_cd" onclick="onBtnClick(this)">7</button>
					<button class="btn_cd" onclick="onBtnClick(this)">8</button>
					<button class="btn_cd" onclick="onBtnClick(this)">9</button>
				</div>
				<div>
					<button class="btn_cd" onclick="onBtnClick(this)">0</button>
					<button class="btn_cd" onclick="dell()">X</button>
				</div>
		</div>
	</div>
</body>
<?php $bodyContent=ob_get_clean(); ?>
<?php include("view/template.php");?>