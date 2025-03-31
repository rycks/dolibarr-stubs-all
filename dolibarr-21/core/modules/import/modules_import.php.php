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
    /**
     * @var string
     */
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
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
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
    public $drivererror = array();
    /**
     * @var array<string,string>
     */
    public $liblabel = array();
    /**
     * @var array<string,string>
     */
    public $libversion = array();
    /**
     * @var string charset
     */
    public $charset;
    /**
     * @var array<string,string>|string picto
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
     * @var	array<string,string>	Element mapping from table name
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
     *  @param  int		$maxfilenamelength  Max length of value to show
     *  @return	array<int,string>			List of templates
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
     * @param 	string	$tableNameWithPrefix	Table name with prefix
     * @return 	string							Element name or table element as default
     */
    public function getElementFromTableWithPrefix($tableNameWithPrefix)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Open input file
     *
     *	@param	string	$file       Path of filename
     *  @return int                 Return integer <0 if KO, >=0 if OK
     */
    public function import_open_file($file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return nb of records. File must be closed.
     *
     *	@param	string	$file       Path of filename
     *  @return	int					Return integer <0 if KO, >=0 if OK
     */
    public function import_get_nb_of_lines($file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Input header line from file
     *
     *  @return     int     Return integer <0 if KO, >=0 if OK
     */
    public function import_read_header()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return array of next record in input file.
     *
     *  @return	array<string,array{val:mixed,type:int<-1,1>}>|boolean     Array of field values. Data are UTF8 encoded. [fieldpos] => (['val']=>val, ['type']=>-1=null,0=blank,1=not empty string)
     */
    public function import_read_record()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Close file handle
     *
     *  @return int
     */
    public function import_close_file()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Insert a record into database
     *
     *	@param	array<string,array{val:mixed,type:int<-1,1>}>|boolean	$arrayrecord                    Array of read values: [fieldpos] => (['val']=>val, ['type']=>-1=null,0=blank,1=string), [fieldpos+1]...
     *	@param	array<int|string,string>	$array_match_file_to_database   Array of target fields where to insert data: [fieldpos] => 's.fieldname', [fieldpos+1]...
     *	@param	Object		$objimport                      Object import (contains objimport->array_import_tables, objimport->array_import_fields, objimport->array_import_convertvalue, ...)
     *	@param	int	$maxfields					Max number of fields to use
     *	@param	string		$importid			Import key
     *	@param	string[]	$updatekeys			Array of keys to use to try to do an update first before insert. This field are defined into the module descriptor.
     *	@return	int								Return integer <0 if KO, >0 if OK
     */
    public function import_insert($arrayrecord, $array_match_file_to_database, $objimport, $maxfields, $importid, $updatekeys)
    {
    }
}