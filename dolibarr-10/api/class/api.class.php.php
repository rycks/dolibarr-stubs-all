<?php

/**
 * Class for API REST v1
 */
class DolibarrApi
{
    /**
     * @var DoliDb        $db Database object
     */
    protected static $db;
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
    /**
     * Executed method when API is called without parameter
     *
     * Display a short message an return a http code 200
     *
     * @return array
     */
    /* Disabled, most APIs does not share same signature for method index
       function index()
       {
           return array(
               'success' => array(
                   'code' => 200,
                   'message' => __class__.' is up and running!'
               )
           );
       }*/
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Clean sensible object datas
     *
     * @param   object  $object	Object to clean
     * @return	array	Array of cleaned object properties
     */
    protected function _cleanObjectDatas($object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Check user access to a resource
     *
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
     *
     * @param  string   $sqlfilters     sqlfilter string
     * @return boolean                  True if valid, False if not valid
     */
    protected function _checkFilters($sqlfilters)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Function to forge a SQL criteria
     *
     * @param  array    $matches       Array of found string by regex search. Example: "t.ref:like:'SO-%'" or "t.date_creation:<:'20160101'" or "t.nature:is:NULL"
     * @return string                  Forged criteria. Example: "t.field like 'abc%'"
     */
    protected static function _forge_criteria_callback($matches)
    {
    }
}