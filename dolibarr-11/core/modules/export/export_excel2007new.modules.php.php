<?php

/**
 *	Class to build export files with Excel format
 */
class ExportExcel2007new extends \ModeleExports
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
    public $workbook;
    // Handle file
    public $worksheet;
    // Handle sheet
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
     *	@return		int							<0 if KO, >=0 if OK
     */
    public function open_file($file, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Write header
     *
     *  @param      Translate	$outputlangs        Object lang to translate values
     * 	@return		int								<0 if KO, >0 if OK
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
     * 	@return		int											<0 if KO, >0 if OK
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
     * 	@return		int										<0 if KO, >0 if OK
     */
    public function write_record($array_selected_sorted, $objp, $outputlangs, $array_types)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Write footer
     *
     * 	@param		Translate	$outputlangs	Output language object
     * 	@return		int							<0 if KO, >0 if OK
     */
    public function write_footer($outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Close Excel file
     *
     * 	@return		int							<0 if KO, >0 if OK
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
}