<?php 
require_once 'baseMethods.php';
class User extends baseMethods{
	private $name;
	private $surname;
	private $email;
	private $password;

	public function __construct(){
		parent::__construct();
	}

	public function getName(){
		return $this->ame;
	}

	public function setName($ame){
		$this->ame = $ame;
	}

	public function getSurname(){
		return $this->surname;
	}

	public function setSurname($surname){
		$this->surname = $surname;
	}

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

}
?>