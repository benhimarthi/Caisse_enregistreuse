<?php
session_start();
require("controller/AppController.php");

try {
	switch ($_GET['action']) {
		case 'selectedProfil':
			$val = AppController::RetriveAllUser();
			require("view/Authentification/authLink.php");
			break;

		case 'authentification':
			require("view/Authentification/authentificationPage.php");
			break;

		case 'checkPassword':
			if(isset($_POST["validate"])){
				$pass = htmlspecialchars($_POST["password"]);
				$user = AppController::RetriveUser($_GET["user_id"], $pass);
				if($user->name == ""){
					$msg = "The password is incorrect.";
					header("Location:index.php?action=authentification&user_id=".$_GET["user_id"]."&msg=".$msg);
				}else{
					$_SESSION['current_user'] = $user->id;
					header("Location:index.php?action=homePage");
				}
			}
			break;
		case "homePage":
			AppController::ProductCount();
			if(isset($_SESSION['current_user'])){
				$products = AppController::RetriveAllProduct();
				$cell_details = AppController::RetriveVenteDetailByUserId($_SESSION['current_user']);
				$cells = array();
				$cell_detail = array();
				$cnt = 0;
				foreach ($cell_details as $key => $value) {
					$vente_dt = AppController::RetriveVenteById($value->cellId);
					$prod_inf = AppController::RetriveProductById($vente_dt->articleId);
					$cells["title"] = $prod_inf->title;
					$cells["price"] = $prod_inf->price;
					$cells["quantity"] = $value->quantity;
					$cells["total"] = $prod_inf->price * $value->quantity;
					$cells["user"]=$_SESSION["current_user"];
					$cells["statu"] = "Ouvert";
					$cells["date"] = $value->cellDate;
					$cells["edit"] = "";
					$cell_detail[$cnt] = $cells;
					$cnt += 1;
				}
				require("view/HomePage/homePage.php");
			}
			else throw new Exception("Error Processing Request", 1);
			break;
		case "cell":
			if(AppController::InsertNewCell(intval($_GET["article_id"]))==1){
				$t = AppController::RetriveVenteByProductId(intval($_GET["article_id"]));
				$venteDetail = array();
				$venteDetail["cell_id"] = $t->id;
				$venteDetail["cell_date"] = date('Y-m-d');
				$venteDetail["quantity"] = 1;
				$venteDetail["user_id"] = $_SESSION['current_user'];
				AppController::InsertNewCellDetails($venteDetail);
			}else{
				$cell = AppController::RetriveVenteByProductId(intval($_GET["article_id"]));
				$vente_dt = AppController::RetriveVenteDetailByCellId($cell->id);
				AppController::UpdateCellQuantity($vente_dt->cellId, $vente_dt->quantity+1);
			}
			header("Location:index.php?action=homePage");
			break;			
		default:
			break;
	}
} catch (Exception $e) {
	echo ($e);
}