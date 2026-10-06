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
     * @var string[]|array<int,array<string,string>> Error codes (or messages)
     */
    public $errors = array();
    /**
     * @var string[]|array<int,array<string,string>> warnings codes (or messages)
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
     * Trigger mode for import:
     * - strict_line: fire standard business trigger per row (default)
     * - fast_bulk: skip per-row triggers and emit one IMPORT_BULK_DONE at end
     *
     * @var string
     */
    public $importtriggermode = '';
    /**
     * Simulation mode flag (step 4):
     * - 0: definitive import
     * - 1: simulation only (no trigger execution)
     *
     * @var int
     */
    public $importissimulation = 0;
    /**
     * Reused trigger interface instance to avoid re-instantiation on each imported row.
     *
     * @var ?Interfaces
     */
    public $importtriggerinterface;
    /**
     * Aggregated stats used by fast_bulk trigger mode.
     *
     * @var array<string,mixed>
     */
    public $importbulkstats = array();
    /**
     * Cached trigger prototype objects by table element for strict_line mode.
     *
     * @var array<string,object>
     */
    public $importtriggerobjectprototypes = array();
    /**
     * Cache hook-resolved actions by table/operation/element/objectclass for import trigger dispatch.
     *
     * @var array<string,string[]>
     */
    public $importtriggeractionshookcache = array();
    /**
     * Array to cache list of values resolved after conversion rules.
     *
     * @var array<string,array<string,mixed>>
     */
    public $cacheconvert = array();
    /**
     * Array to cache list of values loaded from field@table rules.
     *
     * @var array<string,array<int|string,mixed>>
     */
    public $cachefieldtable = array();
    /**
     * Number of inserted rows during current import.
     *
     * @var int
     */
    public $nbinsert = 0;
    /**
     * Number of updated rows during current import.
     *
     * @var int
     */
    public $nbupdate = 0;
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
    /**
     * Return effective trigger mode for import flow.
     *
     * @return string
     */
    protected function getImportTriggerMode()
    {
    }
    /**
     * Register one SQL operation into bulk trigger stats.
     *
     * @param string $tablename		Table name with prefix
     * @param string $operation		insert|update
     * @return void
     */
    protected function registerImportBulkEvent($tablename, $operation)
    {
    }
    /**
     * Execute one global trigger for fast_bulk mode.
     *
     * @param	string		$importid	Import key
     * @param	User		$user		User
     * @param	Translate	$langs		Langs
     * @param	Conf		$conf		Conf
     * @return	int
     */
    public function runImportBulkTrigger($importid, $user, $langs, $conf)
    {
    }
    /**
     * Return trigger actions to execute for an import operation done in SQL legacy mode.
     *
     * @param	string	$tableElement	Table name without database prefix
     * @param	string	$operation		Operation insert|update
     * @param	string	$element		Element name
     * @param	object|null $object		Object context
     * @return	string[]				List of trigger action codes
     */
    protected function getImportTriggerActions($tableElement, $operation, $element, $object = \null)
    {
    }
    /**
     * Build trigger action code from prefix and operation.
     *
     * @param string $triggerprefix Trigger prefix (for example COMPANY or LINEORDER)
     * @param string $operation     SQL operation (insert|update)
     * @return string               Trigger action code, empty string if no match
     */
    protected function buildImportTriggerActionFromPrefix($triggerprefix, $operation)
    {
    }
    /**
     * Return trigger prefix from a business object.
     *
     * @param object $object Business object
     * @return string        Trigger prefix
     */
    protected function getImportTriggerPrefixFromObject($object)
    {
    }
    /**
     * Return generic trigger prefix derived from element or table.
     *
     * @param string $element      Object element name
     * @param string $tableElement Table name without DB prefix
     * @return string              Trigger prefix
     */
    protected function getImportGenericTriggerPrefix($element, $tableElement)
    {
    }
    /**
     * Resolve import trigger actions from hooks.
     *
     * Hook signature:
     * - context: import
     * - method: getImportTriggerActions
     * - expected output (one of):
     *   - $hookmanager->resArray['actions'] = array('ACTION_A', 'ACTION_B')
     *   - $hookmanager->resArray['actions'] = 'ACTION_A,ACTION_B'
     *   - $hookmanager->resArray['action'] = 'ACTION_A'
     *
     * @param	string	$tableElement	Table name without prefix
     * @param	string	$operation		insert|update
     * @param	string	$element		Element name
     * @param	object|null $object		Object context
     * @return	string[]
     */
    protected function getImportTriggerActionsFromHooks($tableElement, $operation, $element, $object = \null)
    {
    }
    /**
     * Execute triggers for SQL legacy import.
     *
     * @param	string		$tablename		Table name with database prefix
     * @param	string		$operation		Operation insert|update
     * @param	int			$rowid			Row id if available, 0 otherwise
     * @param	string		$importid		Import key
     * @param	User		$user			User
     * @param	Translate	$langs			Langs object
     * @param	Conf		$conf			Conf object
     * @return	int							1 on success, <0 on trigger error
     */
    protected function triggerImportSqlOperation($tablename, $operation, $rowid, $importid, $user, $langs, $conf)
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
    /**
     * Shared implementation of import_insert for CSV/XLSX.
     *
     * @param	array<int,array{val:mixed,type:int}>|array<string,array{val:mixed,type:int}>|bool	$arrayrecord					Array of read values
     * @param	array<int|string,string>	$array_match_file_to_database	Array of target fields where to insert data
     * @param	Object						$objimport						Object import descriptor
     * @param	int							$maxfields						Max number of fields to use
     * @param	string						$importid						Import key
     * @param	string[]					$updatekeys						Array of keys used to update first before insert
     * @param	int							$recordpositionbase				0 when $arrayrecord starts at 0, 1 when starts at 1
     * @return	int															Return integer <0 if KO, >0 if OK
     */
    protected function commonImportInsert($arrayrecord, $array_match_file_to_database, $objimport, $maxfields, $importid, $updatekeys, $recordpositionbase = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Insert a record into database
     *
     *	@param	array<string,array{val:mixed,type:int<-1,1>}>|boolean	$arrayrecord                    Array of read values: [fieldpos] => (['val']=>val, ['type']=>-1=null,0=blank,1=string), [fieldpos+1]...
     *	@param	array<int|string,string>	$array_match_file_to_database   Array of target fields where to insert data: [fieldpos] => 's.fieldname', [fieldpos+1]...
     *	@param	Object						$objimport                      Object import (contains objimport->array_import_tables, objimport->array_import_fields, objimport->array_import_convertvalue, ...)
     *	@param	int							$maxfields						Max number of fields to use
     *	@param	string						$importid						Import key
     *	@param	string[]					$updatekeys						Array of keys to use to try to do an update first before insert. This field are defined into the module descriptor.
     *	@return	int															Return integer <0 if KO, >0 if OK
     */
    public function import_insert($arrayrecord, $array_match_file_to_database, $objimport, $maxfields, $importid, $updatekeys)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Output header of an example file for this format
     *
     * 	@param	Translate	$outputlangs		Output language
     *  @return	string							Empty string
     */
    public function write_header_example($outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Output title line of an example file for this format
     *
     * 	@param	Translate	$outputlangs		Output language
     *  @param	string[]	$headerlinefields	Array of fields name
     * 	@return	string							String output
     */
    public function write_title_example($outputlangs, $headerlinefields)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Output record of an example file for this format
     *
     * 	@param	Translate	$outputlangs		Output language
     * 	@param	mixed[]		$contentlinevalues	Array of lines
     * 	@return	string							Empty string
     */
    public function write_record_example($outputlangs, $contentlinevalues)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Output footer of an example file for this format
     *
     * 	@param	Translate	$outputlangs		Output language
     *  @return	string							String output
     */
    public function write_footer_example($outputlangs)
    {
    }
}