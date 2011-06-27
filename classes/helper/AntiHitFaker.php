<?php
/**
 * @author ms
 * @desc Quick n Dirty 
 * bei aufruf von counted wird geprüft, ob id in $_SESSION steht
 * ja? bereits gezählt nein? rein damit und false redour :)
 * @see classes/helper/Session.php 
 * 
 *
 */
class AntiHitFaker{
	private $id;
	private $session=null;
	/**
	 * 
	 * Database Id
	 * @param integer $id
	 */
	public function __construct($id){
		$this->session= Session::getInstance();
		
		$this->id=$id;
	}
	/**
	 * 
	 *article / side / already counted for this user during session
	 */
	public function counted(){
		$name='a'.$this->id;
		
		
		if ((!$this->session->$name)){					
			$this->session->$name='true';
				return false;
		}		
		return true;
	}
	
}