<?php
class Session{
	private $loggedIn=false;
	private $user;
	private $password;
	
	private $login=null;
	public function __construct(CLogin $login){
		session_start();
	}//__construct

	public function validateLogin($user, $password){				
		
		$this->loggedIn=$this->login->validateLogin($user, $password);		
		if (!$this->loggedIn){
			//session already started?
			$user=$_SESSION['user'] ;
			$password=$_SESSION['password'] ;
			$this->loggedIn=$this->login->validateLogin($user, $password);
		}		
		if($this->loggedIn){
			$_SESSION['user'] = $user;
			$_SESSION['password'] = $password;									
		}
		return $this->loggedIn;					
	}//validateLogin

	public function logout($logoutVar){
		$logoutVar=htmlspecialchars($logoutVar);
		if (isset($logoutVar) && $logoutVar){
			session_destroy();
			$this->login=false;
		}
	}
	public function loggedIn(){
		return $this->loggedIn;
	}
}
?>