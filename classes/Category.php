<?php
/***UML***/
#name;

/***UML***/
class Category extends Dbhelper{
	/**Attributes**/

	protected $name;

	/**__construct()**/

	public function __construct( $name){
		$this->name= $name;
	}//__construct
	/**Getter**/

	public function name($name=""){ if (empty($name)){return $this->name; }else{$this->name=$name; } }
	
	
	public function __toString(){
		return "id {$this->id()} name {$this->name()}";
	}
}//class

?>

