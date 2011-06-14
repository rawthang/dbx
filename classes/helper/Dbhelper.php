<?php
/**
 *
 *
 *
 * @version 0.2
 * @author ms
 *
 */
class Dbhelper{

	/**Attributes**/
	protected $id;	//db id
	protected $dbh=null; //databasehandle

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