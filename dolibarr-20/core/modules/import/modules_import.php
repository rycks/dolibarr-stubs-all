<?php

/**
 *	Parent class for import file readers
 */
class ModeleImports
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $datatoimport;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * @var string[] warnings codes (or messages)
     */
    public $warnings = array();
    /**
     * @var string Code of driver
     */
    public $id;
    /**
     * @var string label of driver
     */
    public $label;
    /**
     * @var string Extension of files imported by driver
     */
    public $extension;
    /**
     * Dolibarr version of driver
     * @var string
     */
    public $version = 'dolibarr';
    /**
     * PHP minimal version required by driver
     * @var array{0:int,1:int}
     */
    public $phpmin = array(7, 0);
    /**
     * Label of external lib used by driver
     * @var string
     */
    public $label_lib;
    /**
     * Version of external lib used by driver
     * @var string
     */
    public $version_lib;
    // Array of all drivers
    public $driverlabel = array();
    public $driverdesc = array();
    public $driverversion = array();
    public $drivererror = array();
    public $liblabel = array();
    public $libversion = array();
    /**
     * @var string charset
     */
    public $charset;
    /**
     * @var string picto
     */
    public $picto;
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
     * @var Societe thirdparty
     */
    public $thirdpartyobject;
    /**
     * @var	array	Element mapping from table name
     */
    public static $mapTableToElement = \MODULE_MAPPING;
    /**
     *  Constructor
     */
    public function __construct()
    {
    }
    /**
     * getDriverId
     *
     * @return string		Code of driver
     */
    public function getDriverId()
    {
    }
    /**
     *	getDriverLabel
     *
     *	@return string	Label
     */
    public function getDriverLabel()
    {
    }
    /**
     *	getDriverDesc
     *
     *	@return string	Description
     */
    public function getDriverDesc()
    {
    }
    /**
     * getDriverExtension
     *
     * @return string	Driver suffix
     */
    public function getDriverExtension()
    {
    }
    /**
     *	getDriverVersion
     *
     *	@return string	Driver version
     */
    public function getDriverVersion()
    {
    }
    /**
     *	getDriverLabel
     *
     *	@return string	Label of external lib
     */
    public function getLibLabel()
    {
    }
    /**
     * getLibVersion
     *
     *	@return string	Version of external lib
     */
    public function getLibVersion()
    {
    }
    /**
     *  Load into memory list of available import format
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public function listOfAvailableImportFormat($db, $maxfilenamelength = 0)
    {
    }
    /**
     *  Return picto of import driver
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getPictoForKey($key)
    {
    }
    /**
     *  Return label of driver import
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getDriverLabelForKey($key)
    {
    }
    /**
     *  Return description of import drivervoi la description d'un driver import
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getDriverDescForKey($key)
    {
    }
    /**
     *  Renvoi version d'un driver import
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getDriverVersionForKey($key)
    {
    }
    /**
     *  Renvoi libelle de librairie externe du driver
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getLibLabelForKey($key)
    {
    }
    /**
     *  Renvoi version de librairie externe du driver
     *
     *	@param	string	$key	Key
     *	@return	string
     */
    public function getLibVersionForKey($key)
    {
    }
    /**
     * Get element from table name with prefix
     *
     * @param 	string	$tableNameWithPrefix		Table name with prefix
     * @return 	string	Element name or table element as default
     */
    public function getElementFromTableWithPrefix($tableNameWithPrefix)
    {
    }
}