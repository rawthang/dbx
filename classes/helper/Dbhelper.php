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

	protected $tablename=''; 
	
	public function  mysqlDelete(){		
		
		if(!$this->dbh() || !is_numeric($this->id()) || $this->tablename=='')
			return false;
		
		$sql="DELETE FROM {$this->tablename} WHERE id=?";
		$stmt=$this->dbh->prepare($sql);
		
		$stmt->bindParam(1, $this->id, PDO::PARAM_INT);
		$stmt->execute();		
		return $sql;
	}
	
	public function mysqlCount(){
		if(!$this->dbh() || $this->tablename=='')
			return false;
		$sql="select COUNT(*) from {$this->tablename};";		
		$stmt=$this->dbh->prepare($sql);
		$stmt->execute();
		$value=$stmt->fetch(PDO::FETCH_ASSOC);			
		if($value==null)
			return 0;					
		return $value['COUNT(*)'];
		
	}
	
	protected function setTableName($name){
		$this->tablename=$name;
		
	}		
	
	public function dbh(PDO $dbh=null){
		if (empty($dbh)){
			if($this->dbh === null)
				return false;
			return $this->dbh;
		}else{
			$this->dbh=$dbh;
		}
	}//dbh
	
	/**SetGetter**/
	public function id($id=""){ if (empty($id)){return $this->id; }else{$this->id=$id; } }
	

}//class