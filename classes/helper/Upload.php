<?php
/**
 * upload file
 * @author ms
 * @version 0.2
 */
class Upload{
	/**Attributes**/
	private $login=null;
	private $uploaddir;

	private $ilegal=array('#','$','%','^','&','*','?', ' ');
	private $legal=array('no','dollar'	,'percent'	,'tilde','and','','','');

	/**__construct()**/

	public function __construct(Login $log=null){
		$this->login=$log;
	}//__construct
	public function upload(){
		$this->uploadfromPC();
		$this->uploadFromUrl();
	}
	public function delete($file){
		 return @unlink($file);
		
	}
	private function uploadfromPC(){
		if (@$_FILES['file']['name']){
			$this->fileHandle=$_FILES['file']['name'];
			$safe=str_replace($this->ilegal, $this->legal, $_FILES['file']['name']);
			$dest=$this->uploaddir.$safe;
			$source=$_FILES['file']['tmp_name'];
			$this->copy($source, $dest);
		}
	}

	private function uploadFromUrl(){
		$validUrl=@$_POST['link'];
		if(@$_POST['link'] && $this->fileExists(@$_POST['link'])&& $validUrl){
			$handle=fopen($_POST['link'], 'r');

			$safe=str_replace($this->ilegal, $this->legal, $_POST['link']);
			$safe=basename($safe);
			$dest=$this->uploaddir.$safe;
			$source=$_POST['link'];
			$this->copy($source, $dest);
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
		$files=$this->listImages();

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