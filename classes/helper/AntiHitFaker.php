<?php
class AntiHitFaker{
	private $id=-1;
	private $session=null;
	public function __construct($id){
		$this->session= Session::getInstance();
	}
	
	public function verified(){
		return true;
	}
	
}