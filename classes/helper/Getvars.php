<?php
/**
 * 
 * @version 0.2
 * 
 * $_POST & $_GET Variablen auswerten :)
 * @author ms
 *
 */
class Getvars{
	private $requiredVars=array();
	private $assignedVars=array();
	private $vars=array();
	
	public function __construct(){
		$this->vars=$_REQUEST;
	}//construct

	/**
	 * Value is required for further processing
	 * @param a value passed to the script by Post or Get
	 */
	public function requireVar($var){
		if (is_array($var)){			
			$this->requiredVars= array_merge($this->requiredVars, $var);
		}
		if (!is_array($var)){
			$this->requiredVars[]=$var;
		}		
	}//requireVar
	
	public function assignVar($var){
		if(is_array($var)){
			$this->assignedVars= array_merge($var, $this->assignedVars);
		}
		if (!is_array($var)){
			$this->assignedVars[]=$var;
		}
		
	}
	public function validateVars(){		
		foreach($this->requiredVars as $var){				
			if(!isset($this->vars[$var])||trim($this->vars[$var])==''){		
				return false;			
			}
		}//each
		return true;
	}//function


	public function validateString( $str, $length=""){
		return false;
	}
	public function validateUrl($url){
		return false;
	}
	public function validateEmail($email){
		if (! ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'.'@'.'[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.'.'[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $email))
		{$i="0";}
		else {$i="1";}
		return $i;
	}

	private function escacpeVar($var){
		return htmlspecialchars($var);
	}//escapeVar
	public function __call($meth, $args){
		$var=preg_replace('/get_/', '', $meth);
		if (isset($this->vars[$var])){
			return  $this->escacpeVar( $this->vars[$var]);
		}else if (isset($this->assignedVars[$var])) {
			return $this->escacpeVar($this->vars[$var]);
		}else {
			return false;
		}
	
	}

}//Getvars
?>