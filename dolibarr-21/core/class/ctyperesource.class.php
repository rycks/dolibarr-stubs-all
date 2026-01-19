<?php

/**
 * Class Ctyperesource
 */
class Ctyperesource extends \CommonDict
{
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'ctyperesource';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'c_type_resource';
    /**
     * @var CtyperesourceLine[] Lines
     */
    public $lines = array();
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      User that creates
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id  Id object
     * @param string $code code
     * @param string $label Label
     *
     * @return int Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $code = '', $label = '')
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param string 		$sortorder 		Sort Order
     * @param string 		$sortfield 		Sort field
     * @param int    		$limit     		Limit
     * @param int    		$offset    		Offset limit
     * @param string|array<string,mixed>  $filter	Filter array
     * @param string 		$filtermode 	filter mode (AND or OR)
     * @return int 							Return integer <0 if KO, >0 if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      	User that modifies
     * @param  int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int 				Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param User 	$user      	User that deletes
     * @param int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int 				Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User	$user		User making the clone
     * @param   int     $fromid     Id of object to clone
     * @return  int                 New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return int
     */
    public function initAsSpecimen()
    {
    }
}
/**
 * Class CtyperesourceLine
 */
class CtyperesourceLine
{
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Sample line property 1
     */
    public $code;
    /**
     * @var string Type resource line label
     */
    public $label;
    /**
     * @var int
     */
    public $active;
}