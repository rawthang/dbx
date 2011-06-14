<?php
/***UML***/
#name;

/***UML***/
class Platform extends Dbhelper
{

	/**Attributes**/
	protected $name;

	/**__construct()**/
	public function __construct( $name=""){
		$this->name= $name;
	}//__construct
	
	public function __toString(){
		return $this->name;
	}
	/**SetGetter**/
	public function name($name=""){ if (empty($name)){return $this->name; }else{$this->name=$name; } }

}//class

?>
