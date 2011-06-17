<?php
/**
 * upload file
 * @author ms
 * @todo variablen sind hard codet, net gut, prüfung auf schreibrechte im ordner
 * @todo remote uppen geht noch nicht
 * @version 0.3
 */
class Upload{
	/**Attributes**/
	private $remoteVar, $filevar;
	
	
	private $file;	//pfad zur datei;
	private $uploaddir;
	

	private $ilegal=array('#','$','%','^','&','*','?', ' ');
	private $legal=array('no','dollar'	,'percent'	,'tilde','and','','','');

	/**__construct()**/

	public function __construct(){
	
	}//__construct
	public function upload(){		
		$this->uploadfromPC();
		$this->uploadFromUrl();
		
		return $this->file;
	}
	public function delete($file){
		 return @unlink($file);
		
	}
	private function listFiles(){
		$files=array();
		$handle=opendir($this->uploaddir());
		while (false !== ($file=readdir($handle))){
			if ($file !='.' && $file !='..')
			$files[]=$this->uploaddir().$file;

		}
		return $files;
	}
	private function uploadfromPC(){
		if ($_FILES['file']['name']){
			echo "<h1>here</h1>";
			$this->fileHandle=$_FILES['file']['name'];
			$safe=str_replace($this->ilegal, $this->legal, $_FILES['file']['name']);
			$dest=$this->uploaddir.$safe;
			$source=$_FILES['file']['tmp_name'];
			$this->copy($source, $dest);
			$this->file=$dest;
		}
	}

	private function uploadFromUrl(){
		$validUrl=@$_POST['url_upload'];
		if(@$_POST['url_upload'] && $this->fileExists(@$_POST['url_upload'])&& $validUrl){
			$handle=fopen($_POST['url_upload'], 'r');

			$safe=str_replace($this->ilegal, $this->legal, $_POST['url_upload']);
			$safe=basename($safe);
			$dest=$this->uploaddir.$safe;
			$source=$_POST['url_upload'];
			$this->copy($source, $dest);
			$this->file=$dest;
		}
	}
	/**
	 *
	 * Copy uploadet file to the image folder
	 * @param PathToImage $source
	 * @param PathToImage $dest
	 */
	private function copy($source, $dest){
		$shaSource=sha1_file($source);
		$files=$this->listFiles();

		//filename in use?
		$filenameInuse=false;
		if(in_array($dest,$files))
		$filenameInuse=true;
			
		//file exists?
		$exists=false;

		foreach ($files as $file){
			if(sha1_file($file) == $shaSource){
				$this->lastimage=$file;
				$exists=true;
				break;
			}
		}
		//filename is in use, but the image is a different one -
		if($filenameInuse && !$exists){
			$pathinfo=pathinfo(basename($dest));
			$dest=$this->uploaddir. $shaSource .'.'.  $pathinfo['extension'];

		}
		//file isn't on the machine
		if (!$exists){
			if(copy( $source, $dest)){
				$this->lastimage=$dest;
				return true;
			}
		}
		return false;
			
	}
	private function fileExists($url){
		/**
		 *
		 * check for remote upload
		 * file exists? 200 : 404
		 * @var unknown_type
		 */
		$AgetHeaders = @get_headers($url);
		if (preg_match("|200|", $AgetHeaders[0]))
		return true;
		return false;

	}	
	public function uploaddir($uploaddir=""){
		if (empty($uploaddir)){
			return $this->uploaddir;
		}else{
			if (substr($uploaddir, -1,1)!='/')
			$uploaddir.='/';
			$this->uploaddir=$uploaddir;
		}
	}
	private function isValidURL($url){
		return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
	}

}//class

?>