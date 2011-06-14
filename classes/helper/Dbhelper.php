<?php
/**
 * 
 * 
 * 
 * @version 0.1
 * @author ms
 *
 */
class Dbhelper{

	/**Attributes**/
	protected $id;	//db id
	protected $dbh=null; //databasehandle

	/**SetGetter**/

	public function id($id=""){ if (empty($id)){return $this->id; }else{$this->id=$id; } }
	public function dbh( $dbh=""){ if (empty($dbh)){return $this->dbh; }else{$this->dbh=$dbh; } }

}//class