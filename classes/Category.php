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
		echo $this->superDelete();
	}//__construct
	
	/**Getter**/
	public function name($name=""){ if (empty($name)){return $this->name; }else{$this->name=$name; } }
	
	
	public function __toString(){
		return "id {$this->id()} name {$this->name()}";
	}
}//class

class pCategory extends Category{
	
	public function mysqlSelect($id=""){
		
	}
	
	public function mysqlDelete($id){
		
	}
	
	public function mysqlInsert(){
		
	}
	public function mysqlUpdate(){
		
	}
}
?>
 