<?php

/*************************************************************************************************************************/

/**
 * 
 * Abstract datatype for an html cell
 * 
 * @author ms
 *
 */
class  HtmlTableCell{
	/**
	 * 
	 * A <td> element
	 * @var const string
	 */
	const TABLE_DATA='td';
	/**
	 * 
	 * A <th> element
	 * @var const string
	 */
	const TABLE_HEADING='th';

	/**Attributes**/
	private $data;
	private $type;
	private $cssClass;

	
	/**
	 * 
	 * Creates a new HtmlCell
	 * @param string $data
	 * @param string $cssClass
	 * @param string $type
	 */	
	public function __construct( $data,$cssClass='', $type=self::TABLE_DATA){
		$this->data= $data;
		$this->type= $type;
		$this->cssClass= $cssClass;
	}//__construct

	public function __toString(){

		$this->cssClass==''?$css='': $css=" class=\"$this->cssClass\"";
		$retval="<{$this->type}$css>{$this->data}</{$this->type}>";


		return $retval;
	}//toString
	
	
	/**SetGetter**/
	public function data($data=""){ if (empty($data)){return $this->data; }else{$this->data=$data; } }
	public function type($type=self::TABLE_DATA){ if (empty($type)){return $this->type; }else{$this->type=$type; } }
	public function cssClass($cssClass=""){ if (empty($cssClass)){return $this->cssClass; }else{$this->cssClass=$cssClass; } }
	
}//class

/*************************************************************************************************************************/
/**
 * 
 * A <tr> element
 * @author ms
 *
 */
class HtmlTableRow{


	private $cells=array();
	private $cssClass;

	/**
	 * 
	 * Creates a new table row
	 * @param string $cssClass
	 */
	public function __construct($cssClass=''){
		$this->cssClass= $cssClass;
	}//__construct

	/**
	 * 
	 * Add a new cell to the row
	 * @param HtmlTableCell $cell
	 */
	public function addCell(HtmlTableCell $cell){
		$this->cells[]=$cell;
	}//addCell

	public function __toString(){
		$this->cssClass==''?$css='': $css=" class=\"$this->cssClass\"";
		$retval="<tr$css>";
		foreach ($this->cells as $cell){
			$retval.=$cell;
		}
		return $retval."</tr>\n";
	}//toString

	/**SetGetter**/
	public function cssClass($cssClass=""){ if (empty($cssClass)){return $this->cssClass; }else{$this->cssClass=$cssClass; } }
	public function cells($cells=""){ if (empty($cells)){return $this->cells; }else{$this->cells=$cells; } }

}//HtmlTableRow

/*************************************************************************************************************************/

/**
 * 
 * you can handle html tables with this class
 * @author ms
 *
 */
class HtmlTable{
	private $heading;
	private $rows=array();
	private $cssClass;

	/**
	 * 
	 * New Table
	 * @param string $cssClass
	 */
	public function __construct($cssClass=''){
		$this->cssClass= $cssClass;
		
	}//__construct
	
	/**
	 * 
	 * Adds a new row to the table
	 * @param string $cssClass
	 */
	public function addRow($cssClass=''){
		$this->rows[]= new HtmlTableRow($cssClass);
	}
	
	/**
	 * 
	 * Adds a new data cell to the current row
	 * @param HtmlTableCell $cell
	 */
	public function addDataCell(HtmlTableCell $cell){
		$cell->type(HtmlTableCell::TABLE_DATA);
		$this->addCell($cell);
	}
	
	/**
	 * 
	 * Adds a new cell to the table heading
	 * @param HtmlTableCell $cell
	 * @param string $cssClass
	 */
	public function addHeadingCell(HtmlTableCell $cell, $cssClass=''){
		if(!isset($this->rows['heading']))
			$this->rows['heading'] = new HtmlTableRow($cssClass);
		
		$cell->type(HtmlTableCell::TABLE_HEADING);
		$this->rows['heading']->addCell($cell);		
	}
	
	private function addCell(HtmlTableCell $cell){		
		end($this->rows);
		$this->rows[ key($this->rows) ]->addCell($cell);
	}
	
	public function __toString(){
		$this->cssClass==''?$css='': $css=" class=\"$this->cssClass\"";
		$retval="<table$css>\n";
		
		if(isset($this->rows['heading'])){
			$retval.=$this->rows['heading'];
			unset($this->rows['heading']);
		}
				
		foreach ($this->rows as $row){
			$retval.=$row;
		}
		return $retval."</table>\n";
	}
	

}//HtmlTable

/*************************************************************************************************************************/
