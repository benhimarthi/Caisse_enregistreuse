<?php
declare(strict_types = 1);

class UserModel{

	static int $USER_COUNT;
	public string $name;
	public string $email;
	public int $id;
	
	/*function __construct(string $name, string $email, int $id):void{
		$this->name = $name;
		$this->email = $email;
		$this->id = $id;
	}*/
	function __construct(){
		$this->name = "";
		$this->email = "";
		$this->id = 0;
	}

 	static function builder(array $infos):UserModel{
		$ele = new UserModel();
		$ele->name = $infos["USER_NAME"];
		$ele->email = $infos["USER_EMAIL"];
		$ele->id = $infos["ID"];
		return $ele;
	}

	function toString():string{
		return $this->name."_".$this->email."_".$this->id;
	}
}