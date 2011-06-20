<?php 
/**
 * 
 * 
 * 
 * @version 0.1
 * @author ms
 *
 */
interface CLogin{
	public function validateLogin($usr, $passwd);
}

class HardCodedLogin implements  CLogin{
	private $user, $passwd;
	private $hasher=null;
	
	
	public function __construct(){
		$this->hasher= new PasswordHash(8, FALSE);
		$this->passwd=$this->hasher->HashPassword('nutellamitwurst');
		$this->user="michael";
		//$this->passwd=md5("nutellamitwurst");
	}
	public function validateLogin($user, $passwd){
		$user=htmlspecialchars($user);
		$passwd=htmlspecialchars($passwd);
		
		if ($user==$this->user && $this->hasher->CheckPassword($passwd, $this->passwd))
			return true;
		return false;	
	}//validateLogin				
}//class
