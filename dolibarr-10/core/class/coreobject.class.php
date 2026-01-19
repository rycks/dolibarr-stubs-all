<?php

// TODO Remove this class (used in Expensereportik and ExpenseReportRule
/**
 * CoreObject
 */
class CoreObject extends \CommonObject
{
    public $withChild = \true;
    /**
     *  @var Array $_fields Fields to synchronize with Database
     */
    protected $fields = array();
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct(\DoliDB &$db)
    {
    }
    /**
     * Function to init fields
     *
     * @return bool
     */
    protected function init()
    {
    }
    /**
     * Test type of field
     *
     * @param   string  $field  name of field
     * @param   string  $type   type of field to test
     * @return  boolean         value of field or false
     */
    private function checkFieldType($field, $type)
    {
    }
    /**
     *	Get object and children from database
     *
     *	@param      int			$id       		Id of object to load
     * 	@param		bool		$loadChild		used to load children from database
     *	@return     int         				>0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($id, $loadChild = \true)
    {
    }
    /**
     * Function to instantiate a new child
     *
     * @param   string  $tabName        Table name of child
     * @param   int     $id             If id is given, we try to return his key if exist or load if we try_to_load
     * @param   string  $key            Attribute name of the object id
     * @param   bool    $try_to_load    Force the fetch if an id is given
     * @return                          int
     */
    public function addChild($tabName, $id = 0, $key = 'id', $try_to_load = \false)
    {
    }
    /**
     * Function to set a child as to delete
     *
     * @param   string  $tabName        Table name of child
     * @param   int     $id             Id of child to set as to delete
     * @param   string  $key            Attribute name of the object id
     * @return                          bool
     */
    public function removeChild($tabName, $id, $key = 'id')
    {
    }
    /**
     * Function to fetch children objects
     *
     * @return void
     */
    public function fetchChild()
    {
    }
    /**
     * Function to update children data
     *
     * @param   User    $user   user object
     * @return void
     */
    public function saveChild(\User &$user)
    {
    }
    /**
     * Function to update object or create or delete if needed
     *
     * @param   User    $user   user object
     * @return                  < 0 if ko, > 0 if ok
     */
    public function update(\User &$user)
    {
    }
    /**
     * Function to create object in database
     *
     * @param   User    $user   user object
     * @return                  < 0 if ko, > 0 if ok
     */
    public function create(\User &$user)
    {
    }
    /**
     * Function to delete object in database
     *
     * @param   User    $user   user object
     * @return                  < 0 if ko, > 0 if ok
     */
    public function delete(\User &$user)
    {
    }
    /**
     * Function to get a formatted date
     *
     * @param   string  $field  Attribute to return
     * @param   string  $format Output date format
     * @return          string
     */
    public function getDate($field, $format = '')
    {
    }
    /**
     * Function to set date in field
     *
     * @param   string  $field  field to set
     * @param   string  $date   formatted date to convert
     * @return                  mixed
     */
    public function setDate($field, $date)
    {
    }
    /**
     * Function to update current object
     *
     * @param   array   $Tab    Array of values
     * @return                  int
     */
    public function setValues(&$Tab)
    {
    }
}