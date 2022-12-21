<?php
declare(strict_types=1);
require("model/UserModel.php");
require("controller/DBAdministration.php");
require("model/ProductModel.php");
require("model/CellModel.php");
require("model/CellDetailsModel.php");

class AppController{
	static int $lim = 6;
	static int $curren_limit = 6;

	static function ProductCount():void{
		$db = DBAdministration::dbConnected();
		$query = "SELECT COUNT(*) AS nb FROM article";
		$req = $db->prepare($query);
		$req->execute();
		$data = $req->fetchAll();
		ProductModel::$PRODUCT_COUNT = $data[0]["nb"];
	}

	static function RetriveAllUser():array{
		$currentP = AppController::$curren_limit - AppController::$lim;
		$db = DBAdministration::dbConnected();
		$query = "SELECT * FROM users WHERE `users`.`ID` > ".$currentP." AND `users`.`ID` <= ".AppController::$lim;
		$req = $db->prepare($query);
		$req->execute();
		$data = $req->fetchAll();
		$dt = array();
		
		//filtrage of double elements.
		foreach ($data as $key => $value){
			$user = $value;
			$vl = array();
			foreach ($value as $keys => $value) {
				if(is_integer($keys) == 0){
					$vl[$keys]=$value;
				}
			}
			$current_user = UserModel::builder($vl);
			$dt[$key] = $current_user;
		}
		//print_r($dt);
		return $dt;
	}

	static function RetriveAllProduct():array{
		$currentP = AppController::$curren_limit - AppController::$lim;
		$db = DBAdministration::dbConnected();
		$query = "SELECT * FROM article WHERE `article`.`ID` > ".$currentP." AND `article`.`ID` <= ".AppController::$lim;
		$req = $db->prepare($query);
		$req->execute();
		$data = $req->fetchAll();
		$dt = array();
		
		//filtrage of double elements.
		foreach ($data as $key => $value){
			$user = $value;
			$vl = array();
			foreach ($value as $keys => $value) {
				if(is_integer($keys) == 0){
					$vl[$keys]=$value;
				}
			}
			$current_user = ProductModel::Builder($vl);
			$dt[$key] = $current_user;
		}
		//print_r($dt);
		return $dt;
	}

	static function RetriveProductById(int $id):ProductModel{
		$db = DBAdministration::dbConnected();
		$query = "SELECT * FROM article WHERE `article`.`ID` = ".$id;
		$req = $db->prepare($query);
		$req->execute();
		$data = $req->fetchAll();
		
		$current_user = ProductModel::Builder($data[0]);
		return $data == null ? new ProductModel() : $current_user;
	}

	static function RetriveUser(int $id, string $password): UserModel{
		$db = DBAdministration::dbConnected();
		$query = "SELECT * FROM users WHERE `users`.`ID` = :id AND `users`.`USER_PASSWORD` = :passw";
		$req = $db->prepare($query);
		$req->execute(["id"=>$id, "passw"=>$password]);
		$data = $req->fetchAll();
		return $data != null ? UserModel::builder($data[0]) : new UserModel();
	}

	static function RetriveVenteByProductId(int $id):Cell{
		$db = DBAdministration::dbConnected();
		$query = "SELECT * FROM vente WHERE `vente`.`ARTICLE_ID` = :id";
		$req = $db->prepare($query);
		$req->execute(["id"=>$id]);
		$data = $req->fetchAll();
		return $data != null ? Cell::builder($data[0]) : new Cell();
	}

	static function RetriveVenteById(int $id):Cell{
		$db = DBAdministration::dbConnected();
		$query = "SELECT * FROM vente WHERE `vente`.`ID` = :id";
		$req = $db->prepare($query);
		$req->execute(["id"=>$id]);
		$data = $req->fetchAll();
		return $data != null ? Cell::builder($data[0]) : new Cell();
	}

	static function InsertNewCell(int $id):bool{
		//Check if the element already exist in the database
		if(AppController::RetriveVenteByProductId($id)->articleId != 0)return false;
		$db = DBAdministration::dbConnected();
		$query = "INSERT INTO `vente` (ID, ARTICLE_ID) VALUES (null, :nm)";
		$req = $db->prepare($query);
		return $req->execute([
			"nm"=>$id,
		]);
	}

	static function RetriveVenteDetailByCellId(int $id):CellDetailsModel{
		$db = DBAdministration::dbConnected();
		$query = "SELECT * FROM detail_vente WHERE `detail_vente`.`VENTE_ID` = :id";
		$req = $db->prepare($query);
		$req->execute(["id"=>$id]);
		$data = $req->fetchAll();
		return $data != null ? CellDetailsModel::builder($data[0]) : new CellDetailsModel();
	}

	static function RetriveVenteDetailByUserId(int $id):array{
		$db = DBAdministration::dbConnected();
		$query = "SELECT * FROM detail_vente WHERE `detail_vente`.`user_id` = :id";
		$req = $db->prepare($query);
		$req->execute(["id"=>$id]);
		$data = $req->fetchAll();
		$dt = array();
		//filtrage of double elements.
		foreach ($data as $key => $value){
			$user = $value;
			$vl = array();
			foreach ($value as $keys => $value) {
				if(is_integer($keys) == 0){
					$vl[$keys]=$value;
				}
			}
			$current_user = CellDetailsModel::builder($vl);
			$dt[$key] = $current_user;
		}
		return $dt;
	}
	

	static function RetriveVenteDetail():array{
		$currentP = AppController::$curren_limit - AppController::$lim;
		$db = DBAdministration::dbConnected();
		$query = "SELECT * FROM detail_vente";
		$req = $db->prepare($query);
		$req->execute();
		$data = $req->fetchAll();
		$dt = array();
		
		//filtrage of double elements.
		foreach ($data as $key => $value){
			$user = $value;
			$vl = array();
			foreach ($value as $keys => $value) {
				if(is_integer($keys) == 0){
					$vl[$keys]=$value;
				}
			}
			$current_productDetail = CellDetailsModel::builder($vl);
			$dt[$key] = $current_productDetail;
		}
		return $dt;
	}

	static function InsertNewCellDetails(array $dt):bool{
		if(AppController::RetriveVenteDetailByCellId($dt["cell_id"])->cellId != 0)return false;
		$db = DBAdministration::dbConnected();
		$query = "INSERT INTO `detail_vente` (ID, VENTE_ID, DATE_VENTE, QUANTITE, user_id) VALUES (null, :vente_id, :date_vente, :quantity, :user_id)";
		$req = $db->prepare($query);
		return $req->execute([
			"vente_id"=>$dt["cell_id"],
			"date_vente"=>$dt["cell_date"],
            "quantity"=>$dt["quantity"],
            "user_id"=>$dt["user_id"]
		]);
	}
	static function UpdateCellQuantity(int $id, int $qt):bool{
		$db = DBAdministration::dbConnected();
		$query = "UPDATE `detail_vente` SET `QUANTITE`= :val WHERE `detail_vente`.`VENTE_ID` = :id";
		$req = $db->prepare($query);
		return $req->execute([
			"val"=>$qt,
			"id"=>$id
		]);
	}
}