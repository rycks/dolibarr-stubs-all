<?php

/**
 *	Class to build export files with Excel format
 */
class ExportExcel2007 extends \ModeleExports
{
    /**
     * @var string ID
     */
    public $id;
    /**
     * @var string Export Excel label
     */
    public $label;
    public $extension;
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    public $label_lib;
    public $version_lib;
    /** @var Spreadsheet */
    public $workbook;
    // Handle file
    public $worksheet;
    // Handle sheet
    public $styleArray;
    public $row;
    public $col;
    public $file;
    // To save filename
    /**
     *	Constructor
     *
     *	@param	    DoliDB	$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * getDriverId
     *
     * @return string
     */
    public function getDriverId()
    {
    }
    /**
     * getDriverLabel
     *
     * @return 	string			Return driver label
     */
    public function getDriverLabel()
    {
    }
    /**
     * getDriverLabel
     *
     * @return 	string			Return driver label
     */
    public function getDriverLabelBis()
    {
    }
    /**
     * getDriverDesc
     *
     * @return string
     */
    public function getDriverDesc()
    {
    }
    /**
     * getDriverExtension
     *
     * @return string
     */
    public function getDriverExtension()
    {
    }
    /**
     * getDriverVersion
     *
     * @return string
     */
    public function getDriverVersion()
    {
    }
    /**
     * getLibLabel
     *
     * @return string
     */
    public function getLibLabel()
    {
    }
    /**
     * getLibVersion
     *
     * @return string
     */
    public function getLibVersion()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Open output file
     *
     * 	@param		string		$file			File name to generate
     *  @param		Translate	$outputlangs	Output language object
     *	@return		int							Return integer <0 if KO, >=0 if OK
     */
    public function open_file($file, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Write header
     *
     *  @param      Translate	$outputlangs        Object lang to translate values
     * 	@return		int								Return integer <0 if KO, >0 if OK
     */
    public function write_header($outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output title line into file
     *
     *  @param      array		$array_export_fields_label   	Array with list of label of fields
     *  @param      array		$array_selected_sorted       	Array with list of field to export
     *  @param      Translate	$outputlangs    				Object lang to translate values
     *  @param		array		$array_types					Array with types of fields
     * 	@return		int											Return integer <0 if KO, >0 if OK
     */
    public function write_title($array_export_fields_label, $array_selected_sorted, $outputlangs, $array_types)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output record line into file
     *
     *  @param      array		$array_selected_sorted      Array with list of field to export
     *  @param      resource	$objp                       A record from a fetch with all fields from select
     *  @param      Translate	$outputlangs                Object lang to translate values
     *  @param		array		$array_types				Array with types of fields
     * 	@return		int										Return integer <0 if KO, >0 if OK
     */
    public function write_record($array_selected_sorted, $objp, $outputlangs, $array_types)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Write footer
     *
     * 	@param		Translate	$outputlangs	Output language object
     * 	@return		int							Return integer <0 if KO, >0 if OK
     */
    public function write_footer($outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Close Excel file
     *
     * 	@return		int							Return integer <0 if KO, >0 if OK
     */
    public function close_file()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Clean a cell to respect rules of Excel file cells
     *
     * @param 	string	$newvalue	String to clean
     * @return 	string				Value cleaned
     */
    public function excel_clean($newvalue)
    {
    }
    /**
     * Convert a column to letter (1->A, 0->B, 27->AA, ...)
     *
     * @param 	int		$c		Column position
     * @return 	string			Letter
     */
    public function column2Letter($c)
    {
    }
    /**
     * Set cell value and automatically merge if we give an endcell
     *
     * @param string $val cell value
     * @param string $startCell starting cell
     * @param string $endCell  ending cell
     * @return int 1 if success -1 if failed
     */
    public function setCellValue($val, $startCell, $endCell = '')
    {
    }
    /**
     * Set border style
     *
     * @param string $thickness style \PhpOffice\PhpSpreadsheet\Style\Border
     * @param string $color     color \PhpOffice\PhpSpreadsheet\Style\Color
     * @return int 1 if ok
     */
    public function setBorderStyle($thickness, $color)
    {
    }
    /**
     * Set font style
     *
     * @param bool   $bold  true if bold
     * @param string $color color \PhpOffice\PhpSpreadsheet\Style\Color
     * @return int 1
     */
    public function setFontStyle($bold, $color)
    {
    }
    /**
     * Set alignment style (horizontal, left, right, ...)
     *
     * @param string $horizontal PhpOffice\PhpSpreadsheet\Style\Alignment
     * @return int 1
     */
    public function setAlignmentStyle($horizontal)
    {
    }
    /**
     * Reset Style
     * @return int 1
     */
    public function resetStyle()
    {
    }
    /**
     * Make a NxN Block in sheet
     *
     * @param string $startCell starting cell
     * @param array  $TDatas array(ColumnName=>array(Row value 1, row value 2, etc ...))
     * @param bool   $boldTitle true if bold headers
     * @return int 1 if OK, -1 if KO
     */
    public function setBlock($startCell, $TDatas = array(), $boldTitle = \false)
    {
    }
    /**
     * Make a 2xN Tab in Sheet
     *
     * @param string $startCell A1
     * @param array  $TDatas    array(Title=>val)
     * @param bool   $boldTitle true if bold titles
     * @return int 1 if OK, -1 if KO
     */
    public function setBlock2Columns($startCell, $TDatas = array(), $boldTitle = \false)
    {
    }
    /**
     * Enable auto sizing for column range
     *
     * @param string $firstColumn first column to autosize
     * @param string $lastColumn  to last column to autosize
     * @return int 1
     */
    public function enableAutosize($firstColumn, $lastColumn)
    {
    }
    /**
     * Set a value cell and merging it by giving a starting cell and a length
     *
     * @param string $val       Cell value
     * @param string $startCell Starting cell
     * @param int    $length    Length
     * @param int    $offset    Starting offset
     * @return string Coordinate or -1 if KO
     */
    public function setMergeCellValueByLength($val, $startCell, $length, $offset = 0)
    {
    }
}