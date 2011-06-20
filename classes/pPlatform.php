<?php
class pPlatform extends Platform{
	/**
	 * 
	 * obacht, die Methode ist nicht sauber
	 * wenn der Parameter id nicht uebergeben wird ein Array mit 
	 * allen Platformobjekten zurückgegeben die in der DB vorhanden sind :)
	 * @param Primary Key $id
	 */
	public function mysqlSelect($id=""){
		if(!$this->dbh())
			return false;
		if (empty($id)){				
			$sql="SELECT * FROM cms_platform";
			$stmt=$this->dbh->prepare($sql);
			$stmt->execute();
			$platforms=array();
					
			foreach($stmt->fetchAll() as $value){
				
				$p = new pPlatform();
				$p->id($value['id']);
				$p->name($value['name']);
				$p->dbh=$this->dbh();
				$platforms[$value['id']]=$p;
				
			}
			return $platforms;
		} else {		
			$sql="SELECT * FROM cms_platform WHERE id=?";			
			$stmt=$this->dbh->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			$stmt->execute();
			$result=$stmt->fetch(PDO::FETCH_ASSOC);
			$this->id($result['id']);
			$this->name($result['name']);
			
			
			
		}
	}//SELECT

	/**
	 * @todo implement me
	 * Enter description here ...
	 */
	public function mysqlInsert(){		
		if(!$this->dbh())
			return false;
		$sql='INSERT INTO `cms_platform` (`name`) VALUES (`?`)';
		$stmt=$this->dbh->prepare($sql);
		$stmt->bindParam(1,$this->name, PDO::PARAM_STR);
		return $stmt->execute();
	}//Insert
	
	public function mysqlUpdate(){				
		if(!$this->dbh())
			return false;
		if (!is_numeric($this->id()))
			return false;		
			
		$sql="UPDATE cms_platform SET name=? WHERE id=?;";
		$stmt=$this->dbh->prepare($sql);
		$stmt->bindParam(1, $this->name, PDO::PARAM_STR);			
		$stmt->bindParam(2, $this->id, PDO::PARAM_INT);
		return $stmt->execute();
		
	}//Update
}//class
?>