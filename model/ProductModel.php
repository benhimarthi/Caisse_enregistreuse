<?php
declare(strict_types=1);
class ProductModel{
	static int $PRODUCT_COUNT;

	public string $image;
	public string $title;
	public float $price;
	public int $id;

	function __construct(){
		$this->image = "";
		$this->title = "";
		$this->price = 0;
		$this->id = 0;
	}

	public static function Builder(array $data):ProductModel{
		$res = new ProductModel();
		$res->image = $data["ARTICLE_IMAGE_LINK"];
		$res->title = $data["ARTICLE_TITLE"];
		$res->price = $data["ARTICLE_PRICE"];
		$res->id = $data["ID"];
		return $res;
	}

}