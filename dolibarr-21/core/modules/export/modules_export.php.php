<?php

/**
 *	Parent class for export modules
 */
class ModeleExports extends \CommonDocGenerator
{
    /**
     * @var string ID ex: csv, tsv, excel...
     */
    public $id = 'NOT IMPLEMENTED';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var array<string,string>
     */
    public $driverlabel = array();
    /**
     * @var array<string,string>
     */
    public $driverdesc = array();
    /**
     * @var array<string,string>
     */
    public $driverversion = array();
    /**
     * @var array<string,string>
     */
    public $liblabel = array();
    /**
     * @var array<string,string>
     */
    public $libversion = array();
    /**
     * @var string picto
     */
    public $picto;
    /**
     * @var array<string,string> Module key/picto pairs
     */
    public $pictos;
    /**
     * @var string description
     */
    public $desc;
    /**
     * @var string escape
     */
    public $escape;
    /**
     * @var string enclosure
     */
    public $enclosure;
    /**
     * @var int col
     */
    public $col;
    /**
     * @var int<0,1> disabled
     */
    public $disabled;
    /**
     *  Load into memory list of available export format
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	string[]					List of templates (same content as array this->driverlabel)
     */
    public function listOfAvailableExportFormat($db, $maxfilenamelength = 0)
    {
    }
    /**
     *  Return picto of export driver
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Picto string
     */
    public function getPictoForKey($key)
    {
    }
    /**
     *  Return label of driver export
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Label
     */
    public function getDriverLabelForKey($key)
    {
    }
    /**
     *  Renvoi le descriptif d'un driver export
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Description
     */
    public function getDriverDescForKey($key)
    {
    }
    /**
     *  Renvoi version d'un driver export
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Driver version
     */
    public function getDriverVersionForKey($key)
    {
    }
    /**
     *  Renvoi label of driver lib
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Label of library
     */
    public function getLibLabelForKey($key)
    {
    }
    /**
     *  Return version of driver lib
     *
     *  @param	string	$key	Key of driver
     *  @return	string			Version of library
     */
    public function getLibVersionForKey($key)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Output record line into file
     *
     *  @param	array<string,string>	$array_selected_sorted	Array with list of field to export
     *  @param	Resource				$objp					A record from a fetch with all fields from select
     *  @param	Translate				$outputlangs			Object lang to translate values
     *  @param	array<string,string>	$array_types			Array with types of fields
     * 	@return	int												Return integer <0 if KO, >0 if OK
     */
    public function write_record($array_selected_sorted, $objp, $outputlangs, $array_types)
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
    /**
     * getDriverExtension
     *
     * @return string
     */
    public function getDriverExtension()
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
     *  @param	array<string,string>	$array_export_fields_label	Array with list of label of fields
     *  @param	array<string,string>	$array_selected_sorted		Array with list of field to export
     *  @param	Translate				$outputlangs    			Object lang to translate values
     *  @param	array<string,string>	$array_types				Array with types of fields
     * 	@return	int													Return integer <0 if KO, >0 if OK
     */
    public function write_title($array_export_fields_label, $array_selected_sorted, $outputlangs, $array_types)
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
}