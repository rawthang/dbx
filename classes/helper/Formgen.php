<?php
/*
 * 
 * @desc. damit erzeuge ich formulare, da die richtigen ja noch nicht da sind :/
 * 
 * 
 */
class Formgen{
	/*
	 <h5>Username</h5>
<input type="text" name="username" value="" size="50" />

<h5>Password</h5>
<input type="text" name="password" value="" size="50" />

<h5>Password Confirm</h5>
<input type="text" name="passconf" value="" size="50" />

<h5>Email Address</h5>
<input type="text" name="email" value="" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>
	 */
		
	private $action,$method;
	
	private $fields=array();
	public function __construct($method="get", $action="index.php"){
		$this->method=$method;
		$this->action=$action;
	}
	public function addCheckBox($label, $name="checkbox", $value="false"){
		$this->fields[]="<br><input type=\"Checkbox\" name=\"$name\">$label\n";
		
	}
	public function addTextField($label="Text" , $name="textfield", $value="", $size=50){
		$this->fields[]="<h5>$label</h5>\n<input type=\"text\" name=\"$name\" value=\"$value\" size=\"$size\" />";
		
		
	}
	public function addTextArea($label="Text" , $name="textarea", $text="", $rows=30, $cols=65){
		$this->fields[]="<h5>$label</h5>\n<textarea rows=\"$rows\" cols=\"$cols\" name=\"$name\">$text</textarea>";
		
		
	}
	public function addSelect($label="Select", $name="select", $options=array(1,2,3,4,5)){
		$retval="<h5>$label</h5>\n<select name=\"$name\">";
		foreach ($options as $key =>$value){
			$retval.="<option value=\"$key\">$value</option>\n";
		}
		$retval.="</select>\n";
		
		$this->fields[]=$retval;
	}
	
	public function addUpload($label="upload", $name="upload"){
		$this->fields[]="<h5>$label</h5>\n<input type=\"file\" name=\"$name\">\n";
	}
	
	public function getForm(){
		$retval="<form method=\"{$this->method}\" action=\"{$this->action}\" enctype=\"multipart/form-data\">\n";
		foreach ($this->fields as $field)
			$retval.=$field;
			
		$retval.="<p><input type=\"submit\" value=\"Submit\" />\n";
		$retval.="\n</form>";	
		return $retval;
	}
	
	public function getHeading($text, $order=1){
		return "<h$order>$text</h$order>";
		
		
	}
	public function getLink($text, $reference, $get=array(),$confirmBeforeGo=false,$confirmMsg="confirm before you go"){		
		$vars=array();
		foreach ($get as $key =>$value)
			$vars[]="{$key}={$value}";
					
		$v=implode($vars, "&");

		if ($confirmBeforeGo)
			return "<a href=\"javascript:confirmGo('$confirmMsg','$reference?$v')\">$text</a>";		
		
		
		return "<a href=\"$reference?$v\">$text<a>";
	}
}//class


?>