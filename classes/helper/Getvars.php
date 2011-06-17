<?php
/**
 *
 * @version 0.3
 *
 * Eval $_POST & $_GET Vars
 * @author ms
 *
 */
class Getvars{
	private $requiredVars=array();
	private $assignedVars=array();
	private $missingVars=array();
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
		$returnValue=true;
		foreach($this->requiredVars as $var){
			if(!isset($this->vars[$var])||trim($this->vars[$var])==''){
				$this->missingVars[]=$var;
				$returnValue= false;
			}
		}//each
		return $returnValue;
	}//function


	public function validateString( $str, $length=""){
		return false;
	}
	public function validateUrl($url){
		return false;
	}
	public function validateEmail($email){
		if (! preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i",$email))
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
	/**SetGetter**/
	public function missingVars($missingVars=""){ if (empty($missingVars)){return $this->missingVars; }else{$this->missingVars=$missingVars; } }

}//Getvars
?>