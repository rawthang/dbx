<?php
/**
 *
 *
 *
 * @version 0.3
 * @author ms
 *
 */
abstract class Dbhelper{

	/**Attributes**/
	protected $id;	//db id
	protected $dbh=null; //databasehandle

	protected $tablename; 
	
	public function  superDelete(){
		$sql="DELETE FROM {$this->tablename} WHERE id=?";
		return $sql;
	}
	protected function setTableName($name){
		$this->tablename=$name;
		
	}
	/**SetGetter**/

	public function id($id=""){ if (empty($id)){return $this->id; }else{$this->id=$id; } }
	public function dbh(PDO $dbh=null){
		if (empty($dbh)){
			if($this->dbh === null)
				return false;
			return $this->dbh;
		}else{
			$this->dbh=$dbh;
		}
	}//dbh

}//class