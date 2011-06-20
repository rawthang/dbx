<?php
/***UML***/
#name;

/***UML***/
abstract class Category extends Dbhelper {
	/**Attributes**/

	protected $name;

	/**__construct()**/

	public function __construct() {
		$this->tablename='cms_cat';

	}//__construct

	/**Getter**/
	public function name($name=""){ if (empty($name)){return $this->name; }else{$this->name=$name; } }


	public function __toString(){
		return "{$this->name()}";
	}
}//class