<?php
declare(strict_types=1);


class DBAdministration{
	public static function dbConnected(){
		$dbConnect = new PDO(
			'mysql:host=localhost;dbname=caisse_enregistreuse;charset=utf8',
			'root',
			''
		);
		return $dbConnect;
	}
}