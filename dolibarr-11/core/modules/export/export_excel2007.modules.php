<?php

/**
 *	Class to build export files with Excel format
 */
class ExportExcel2007 extends \ExportExcel
{
    /**
     * @var string ID
     */
    public $id;
    /**
     * @var string label
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
    // Handle fichier
    public $worksheet;
    // Handle onglet
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Close Excel file
     *
     *  @return		int							<0 if KO, >0 if OK
     */
    public function close_file()
    {
    }
}