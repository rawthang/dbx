<?php

class pCategory extends Category{

	public function mysqlSelect($id=""){
		if(!$this->dbh())
		return false;
		if (empty($id)){		
			$sql="SELECT * FROM cms_cat";
			$stmt=$this->dbh->prepare($sql);
			$stmt->execute();
			$platforms=array();
				
			foreach($stmt->fetchAll() as $value){

				$p = new pPlatform();
				$p->id($value['id']);
				$p->name($value['cat']);
				$p->dbh=$this->dbh();
				$platforms[$value['id']]=$p;

			}
			return $platforms;
		} else {
			$sql="SELECT * FROM cms_cat WHERE id=?";
			$stmt=$this->dbh->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			$stmt->execute();
			$result=$stmt->fetch(PDO::FETCH_ASSOC);
			$this->id($result['id']);
			$this->name($result['cat']);
				
				
		}
	}

	public function mysqlInsert(){
		if (!$this->dbh())
		return false;
		$sql="INSERT INTO cms_cat ('cat') VALUES ('?')";
		$stmt=$this->dbh->prepare($ql);
		$stmt->bindParam(1, $this->name, PDO::PARAM_STR);
		return $stmt->execute();
	}
	public function mysqlUpdate(){
		if(!$this->dbh())
		return false;
		if (!is_numeric($this->id()))
		return false;
			
		$sql="UPDATE cms_cat SET cat=? WHERE id=?;";
		$stmt=$this->dbh->prepare($sql);
		$stmt->bindParam(1, $this->name, PDO::PARAM_STR);
		$stmt->bindParam(2, $this->id, PDO::PARAM_INT);
		return $stmt->execute();
	}
}
?>