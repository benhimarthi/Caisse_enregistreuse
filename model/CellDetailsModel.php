<?php
declare(strict_types=1);
/**
 * 
 */
class CellDetailsModel
{
	public int $id;
	public int $cellId;
	public string $cellDate;
	public int $quantity;
	public int $user_id;

	function __construct()
	{
		$this->id = 0;
		$this->cellId = 0;
		//echo(date('Y-m-d'));
		$this->cellDate = date('Y-m-d');
		$this->quantity = 0;
		$this->user_id = 0;
	}

	static function Builder(array $data):CellDetailsModel{
		$res = new CellDetailsModel();
		$res->id = $data["ID"];
		$res->cellId = $data["VENTE_ID"];
		$res->cellDate = $data["DATE_VENTE"];
		$res->quantity = $data["QUANTITE"];
		$res->user_id = $data["user_id"];
		return $res;
	} 
}