<?php
/*
 * @desc: navigation mit mehreren Seiten
 * @ver: 0.1
 * @requires Class Formgen
 *
 *
 */
/***UML***/
/***UML***/
class Navigation
{

	/**Attributes**/
	private $sites;
	private $itemsPerSite;
	private $nElements;
	private $currentSite;
	private $mysqlStart;
	private $targetUrl;
	private $formgen;
	private $additionalUrlParams;
	/**	 
	 * Mit der Klasse läßt sich eine Listennavigation darstellen
	 * @param $f Instanz der Klasse Formgen
	 */
	public function __construct(Formgen $f ){
		$this->formgen=$f;
	}//__construct
	
	
	/**
	 * id für Button zurück berechnen
	 */
	private function previousSite($n=1){
		$prev=$this->currentSite()-$n;
		$prev<=0 ? $prev=1: $prev=$prev;
		return $prev;
	}
	
	/**
	 * id für Button vorwärts berechnen
	 */
	private function nextSite($n=1){					
		$next=$n+ $this->currentSite();
		$next>=$this->sites()? $next=$this->sites():$next=$next;
		
		return $next;
	}

	
	public function __toString(){
		$back=$this->formgen->getLink("<", $this->targetUrl(), array('site'=> $this->previousSite()) +  $this->additionalUrlParams);
		$back5=$this->formgen->getLink("<<", $this->targetUrl(), array('site'=> $this->previousSite(5)) +  $this->additionalUrlParams);
		$forward=$this->formgen->getLink(">", $this->targetUrl(), array('site'=> $this->nextSite()) +  $this->additionalUrlParams);
		$forward5=$this->formgen->getLink(">>", $this->targetUrl(), array('site'=> $this->nextSite(5)) +  $this->additionalUrlParams);
		$ls="";
		
		for ($i=1; $i<=$this->sites(); $i++ ){
			$link=$this->formgen->getLink($i, $this->targetUrl, array('site'=>$i)+$this->additionalUrlParams)."\n";		
				if ($i==$this->currentSite())
					$link=$i;
				if($i==1 &&$this->currentSite=='')
					$link=1;	
				$ls.=$link;	
					
		}
		if(empty($ls))	
			return "";				
		return "$back5\n $back\n $ls $forward\n $forward5\n" ;				
	}//toString

	public function mysqlStart($mysqlStart=""){		
		$ret=($this->itemsPerSite * $this->currentSite) -$this->itemsPerSite();
		$ret<0 ? $ret=0 : $ret=$ret;
		return $ret;
	}

	
	private function sites(){
	 $sites=$this->nElements()/$this->itemsPerSite();	
	 $this->nElements()%$this->itemsPerSite()!=0 ? $sites+=1 :$sites= $sites;
	 $sites=(int)$sites;
	 $this->sites= $sites;	 	 
	 return $sites;
	}
	
	public function targetUrl($targetUrl=""){ 
		if (empty($targetUrl)){
			if($this->targetUrl=="")
				return "index.php";
			return $this->targetUrl; 
		}else{			
			$this->targetUrl=$targetUrl; 
		} 
	}
	public function currentSite($currentSite=""){ 
		if (empty($currentSite)){
			if ($this->currentSite=="")
				$this->currentSite=1;
			return $this->currentSite; 
		}else{
			$this->currentSite=$currentSite; 
		}
	 }
	/**SetGetter**/
	public function itemsPerSite($itemsPerSite=""){ if (empty($itemsPerSite)){return $this->itemsPerSite; }else{$this->itemsPerSite=$itemsPerSite; } }
	public function nElements($nElements=""){ if (empty($nElements)){return $this->nElements; }else{$this->nElements=$nElements; } }
	

	public function additionalUrlParams(Array $additionalUrlParams=null){ if (empty($additionalUrlParams)){return $this->additionalUrlParams; }else{$this->additionalUrlParams=$additionalUrlParams; } }
}//class
?>
