<?php 

interface CLogin{
	public function validateLogin($usr, $passwd);
}

class HardCodetLogin implements  CLogin{
	private $user, $passwd;
	
	public function __construct(){
		$this->user="michael";
		$this->passwd=md5("nutellamitwurst");
	}
	public function validateLogin($user, $passwd){
		$user=htmlspecialchars($user);
		$passwd=htmlspecialchars($passwd);
		
		if ($user==$this->user && md5($passwd) == $this->passwd)
			return true;
		return false;	
	}//validateLogin				
}//class













?>