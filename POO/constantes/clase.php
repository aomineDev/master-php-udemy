<?php 
class Usuario{
	private const URL = "http://";
	private $email;
	private $password;

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email; 
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password; 
	}

	public static function getURL(){
		return self::URL;
	}

}
?>

