<?php

/**
 *    Class to manage generation of HTML components
 *    Only common components for WebPortal must be here.
 */
class FormListWebPortal
{
    /**
     * @var DoliDB Database
     */
    public $db;
    /**
     * @var	AbstractListController Controller handler
     */
    public $controller;
    /**
     * @var string Element (english) : "propal", "order", "invoice"
     */
    public $element = '';
    /**
     * @var string Page context
     */
    public $contextpage = '';
    /**
     * @var string Action
     */
    public $action = '';
    /**
     * @var FormWebPortal  Instance of the Form
     */
    public $form;
    /**
     * @var CommonObject Object
     */
    public $object;
    /**
     * @var string Title key to translate
     */
    public $titleKey = '';
    /**
     * @var string Title desc key to translate
     */
    public $titleDescKey = '';
    /**
     * @var int Limit (-1 to get limit from conf, 0 no limit, or Nb to show)
     */
    public $limit = -1;
    /**
     * @var int Page (1 by default)
     */
    public $page = 1;
    /**
     * @var string		Request SQL for SELECT part
     */
    public $sql_select = '';
    /**
     * @var string		Request SQL for body part (FROM, LEFT JOIN, WHERE, ...)
     */
    public $sql_body = '';
    /**
     * @var string		Request SQL for ORDER BY part (and LIMIT, ...)
     */
    public $sql_order = '';
    /**
     * @var string		Empty value for select filters
     */
    public $emptyValueKey = '';
    /**
     * @var int Offset (0 by default)
     */
    public $offset = 0;
    /**
     * @var string Sort field
     */
    public $sortfield = '';
    /**
     * @var string Sort order
     */
    public $sortorder = '';
    /**
     * @var array<string,array{type?:string,label:string,checked:int<0,1>,visible:int<0,1>,enabled:bool|int<0,1>,position:int,help:string}>	Array of fields
     */
    public $arrayfields = array();
    /**
     * @var array<string,mixed> Search filters
     */
    public $search = array();
    /**
     * @var string Search all
     */
    public $search_all = '';
    /**
     * @var array<string,string> Fields for search all
     */
    public $fields_to_search_all = array();
    /**
     * @var string Params for links
     */
    public $params = '';
    /**
     * @var int Nb total results (0 by default)
     */
    public $nbtotalofrecords = 0;
    /**
     * @var array<int,stdClass> Object records from the SQL request
     */
    public $records = [];
    /**
     * @var int Nb column in the table
     */
    public $nbColumn = 0;
    /**
     * @var array<int,Societe> Company static list (cache)
     */
    public $companyStaticList = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Init
     *
     * @param	AbstractListController	$controller		Controller handler
     * @param	string					$elementEn		Element (english) : "propal", "order", "invoice"
     * @return	void
     */
    public function init(&$controller, $elementEn)
    {
    }
    /**
     * Do actions
     *
     * @return	void
     */
    public function doActions()
    {
    }
    /**
     * Set array fields
     *
     * @return	void
     */
    public function setArrayFields()
    {
    }
    /**
     * Set columns visibility
     *
     * @return	void
     */
    public function setColumnsVisibility()
    {
    }
    /**
     * Set search values
     *
     * @param	bool		$clear		Clear search values
     * @return	void
     */
    public function setSearchValues($clear = \false)
    {
    }
    /**
     * set SQL request
     *
     * @return	void
     */
    public function setSqlRequest()
    {
    }
    /**
     * Load record from SQL request
     *
     * @return	void
     */
    public function loadRecords()
    {
    }
    /**
     * Set params
     *
     * @return	void
     */
    public function setParams()
    {
    }
    /**
     * Print input field for search list
     *
     * @param	string					$field_key		Field key
     * @param	array<string,mixed>		$field_spec		Field specification
     * @return	string									HTML input
     */
    public function printSearchInput($field_key, $field_spec)
    {
    }
    /**
     * Function to load data from a SQL pointer into properties of current object $this
     *
     * @param   stdClass    $record    Contain data of object from database
     * @return	void
     */
    public function setVarsFromFetchObj(&$record)
    {
    }
    /**
     * Print value for list
     *
     * @param	string					$field_key		Field key
     * @param	array<string,mixed>		$field_spec		Field specification
     * @param	stdClass				$record			Contain data of object from database
     * @param	int						$i				Index line (0, 1, 2, ...)
     * @param	array<string,mixed>		$totalarray		Array for total line
     * @return	string									HTML input
     */
    public function printValue($field_key, $field_spec, &$record, $i, &$totalarray)
    {
    }
    /**
     * Set total value for list
     *
     * @param	string					$field_key		Field key
     * @param	array<string,mixed>		$field_spec		Field specification
     * @param	stdClass				$record			Contain data of object from database
     * @param	int						$i				Index line (0, 1, 2, ...)
     * @param	array<string,mixed>		$totalarray		Array for total line
     * @return	void
     */
    public function setTotalValue($field_key, $field_spec, &$record, $i, &$totalarray)
    {
    }
    /**
     * Get class css list
     *
     * @param	string					$field_key		Field key
     * @param	array<string,mixed>		$field_spec		Field specification
     * @param	bool					$for_value		For td of value
     * @return	string									Class used for list <td class="xxxx">
     */
    public function getClasseCssList($field_key, $field_spec, $for_value = \false)
    {
    }
}