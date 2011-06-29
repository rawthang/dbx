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
	public function __construct(){
		$this->formgen=new Formgen();
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

	/**
	 * 
	 * ein Element erzeugen. Die aktuelle Seite ist nicht mit einem Link versehen
	 * @param integer $n
	 */
	private function generateNode($n){
			$link=$this->formgen->getLink($n, $this->targetUrl, array('site'=>$n)+$this->additionalUrlParams)."\n";		
				if ($n==$this->currentSite())
					$link=$n;
				if($n==1 &&$this->currentSite=='')
					$link=1;	
			return $link;				
	}
	
	public function __toString(){
		$back=$this->formgen->getLink("<", $this->targetUrl(), array('site'=> $this->previousSite()) +  $this->additionalUrlParams);
		$back5=$this->formgen->getLink("<<", $this->targetUrl(), array('site'=> $this->previousSite(5)) +  $this->additionalUrlParams);
		$forward=$this->formgen->getLink(">", $this->targetUrl(), array('site'=> $this->nextSite()) +  $this->additionalUrlParams);
		$forward5=$this->formgen->getLink(">>", $this->targetUrl(), array('site'=> $this->nextSite(5)) +  $this->additionalUrlParams);
		$ls="";
		
		//Nicht mehr als 10 Seiten Treffer
		if($this->sites()<10){
		for ($i=1; $i<=$this->sites(); $i++ )
			$ls.=$this->generateNode($i);															
		
		/**
		 * Mehr als 10 seiten
		 * 
		 * |< << 1 2 3 ...13 14 |15| 16 17... 77 78 79 > >>|
		 * 
		 * 
		 */		
		}else {
			//always show pages 1-3			
			foreach(range(1,3) as $i)
				$ls.=$this->generateNode($i);	
										
			//between
			
			//zwischenbereich
			if ($this->currentSite()>3  && $this->currentSite()<6){
				foreach (range(4,5) as $i)
					$ls.=$this->generateNode($i);				
				$ls.='...';
			}
			
			//...  i ... 
			else if ($this->currentSite()>=6 && $this->currentSite() <=$this->sites()-7){
				$ls.='...';
				foreach (range($this->currentSite() -2,$this->currentSite() +2) as $i)
					$ls.=$this->generateNode($i);									
				$ls.='...';
			}//fi

			
			//zwischenbereich			
			else if($this->currentSite()>=$this->sites()-6 && $this->currentSite()<=$this->sites()-4){
				echo "in";
				$ls.='...';
				foreach (range($this->sites()-6 ,$this->sites()-4) as $i)
					$ls.=$this->generateNode($i);				
				
			
			} 
			else {			
				$ls.='...';
			}
				
			//always show last 3 pages 	
			foreach (range($this->sites()-3, $this->sites()) as $i)
				$ls.=$this->generateNode($i);		
		}//else
				
		if(empty($ls))	
			return "";				
		return "$back5\n $back\n $ls $forward\n $forward5\n" ;				
	}//toString
	/**
	 * 
	 * helper for the sql LIMIT command. (select * from limit Naviagtion::mysqlStart(), Navigation::itemsPerSite())
	 * @param $mysqlStart
	 */
	public function mysqlStart($mysqlStart=""){		
		$ret=($this->itemsPerSite * $this->currentSite) -$this->itemsPerSite();
		$ret<0 ? $ret=0 : $ret=$ret;
		return $ret;
	}

	/**
	 * 
	 * number of sites
	 */
	private function sites(){		
	 $this->sites=ceil($this->nElements()/$this->itemsPerSite())+0;		//typecast
	 return $this->sites;
	
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
	/**
	 * 
	 * Set or get current Page for the navigation
	 * @param integer $currentSite current Page 
	 */
	 
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
