<?php
declare(strict_types=1);
class Cell{

	public int $articleId;
	public int $id;

	public function __construct(){
		$this->articleId = 0;
		$this->id = 0;
	}

	static function builder(array $data):Cell{
		$res = new Cell();
		$res->articleId = $data["ARTICLE_ID"];
		$res->id = $data["ID"];
		return $res;
	}
}