<?php

/**
 * Class for API REST v1
 */
class DolibarrApi
{
    /**
     * @var DoliDb        $db Database object
     */
    protected $db;
    /**
     * @var Restler     $r	Restler object
     */
    public $r;
    /**
     * Constructor
     *
     * @param	DoliDb	$db		        Database handler
     * @param   string  $cachedir       Cache dir
     * @param   boolean $refreshCache   Update cache
     */
    public function __construct($db, $cachedir = '', $refreshCache = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Check and convert a string depending on its type/name.
     *
     * Display a short message an return a http code 200
     *
     * @param	string		$field		Field name
     * @param	string		$value		Value to check/clean
     * @param	stdClass	$object		Object
     * @return 	string					Value cleaned
     */
    protected function _checkValForAPI($field, $value, $object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   Object  $object	Object to clean
     * @return	Object			Object with cleaned properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Check access by user to a given resource
     *
     * @param string	$resource		element to check
     * @param int		$resource_id	Object ID if we want to check a particular record (optional) is linked to a owned thirdparty (optional).
     * @param string	$dbtablename	'TableName&SharedElement' with Tablename is table where object is stored. SharedElement is an optional key to define where to check entity. Not used if objectid is null (optional)
     * @param string	$feature2		Feature to check, second level of permission (optional). Can be or check with 'level1|level2'.
     * @param string	$dbt_keyfield   Field name for socid foreign key if not fk_soc. Not used if objectid is null (optional)
     * @param string	$dbt_select     Field name for select if not rowid. Not used if objectid is null (optional)
     * @return bool
     * @throws RestException
     */
    protected static function _checkAccessToResource($resource, $resource_id = 0, $dbtablename = '', $feature2 = '', $dbt_keyfield = 'fk_soc', $dbt_select = 'rowid')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Return if a $sqlfilters parameter is valid
     * Function no more used. Kept for backward compatibility with old APIs of modules
     *
     * @param  	string   		$sqlfilters     sqlfilter string
     * @param	string			$error			Error message
     * @return 	boolean|string   				True if valid, False if not valid
     */
    protected function _checkFilters($sqlfilters, &$error = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Function to forge a SQL criteria from a Generic filter string.
     * Function no more used. Kept for backward compatibility with old APIs of modules
     *
     * @param  array    $matches    Array of found string by regex search.
     * 								Each entry is 1 and only 1 criteria.
     * 								Example: "t.ref:like:'SO-%'", "t.date_creation:<:'20160101'", "t.date_creation:<:'2016-01-01 12:30:00'", "t.nature:is:NULL", "t.field2:isnot:NULL"
     * @return string               Forged criteria. Example: "t.field like 'abc%'"
     */
    protected static function _forge_criteria_callback($matches)
    {
    }
}