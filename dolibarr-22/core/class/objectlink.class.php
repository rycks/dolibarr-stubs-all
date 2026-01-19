<?php

/**
 *	Parent class of all other business classes (invoices, contracts, proposals, orders, ...)
 *
 * @phan-forbid-undeclared-magic-properties
 */
class ObjectLink extends \CommonObject
{
    const TRIGGER_PREFIX = 'OBJECTLINK';
    /**
     * @var string ID to identify managed object
     */
    public $element = 'objectlink';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'element_element';
    /**
     * @var int source id is a foreign key
     */
    public $fk_source;
    /**
     * @var string source type
     */
    public $sourcetype;
    /**
     * @var int target id is a foreign key
     */
    public $fk_target;
    /**
     * @var string source type
     */
    public $targettype;
    /**
     * @var  null|string relation type, not sure if ever used, but it is in the database
     */
    public $relationtype;
    /**
     * Constructor of the class
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Get object link from database.
     *
     *	@param      int			$rowid       	row Id of object link
     *	@return     int         				>0 if OK, <0 if KO, 0 if not found
     */
    public function fetch($rowid)
    {
    }
    /**
     *	fetch object link By Values, not id
     *
     *  @param		int		$fk_source		source id of object we link from
     *  @param		string	$sourcetype		type of the source object
     *  @param		int		$fk_target		target id of object we link to
     *  @param		string	$targettype 	type of the target object
     *  @param		string	$relationtype 	type of the relation, usually null
     *	@return 	int			        	Return integer <0 if KO, >0 if OK
     */
    public function fetchByValues($fk_source, $sourcetype, $fk_target, $targettype, $relationtype = \null)
    {
    }
    /**
     *	Delete the object link
     *
     *	@param	User	$user		User object
     *	@param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     * 	@return	int					Return integer <=0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *	Create object link
     *
     *	@param		User	$user			Object user that make creation
     *  @param		int		$fk_source		source id of object we link from
     *  @param		string	$sourcetype		type of the source object
     *  @param		int		$fk_target		target id of object we link to
     *  @param		string	$targettype 	type of the target object
     *  @param		string	$relationtype 	type of the relation, usually null
     *	@param		int	    $notrigger		Disable all triggers
     *	@return 	int			        	Return integer <0 if KO, >0 if OK
     */
    public function create($user, $fk_source, $sourcetype, $fk_target, $targettype, $relationtype = \null, $notrigger = 0)
    {
    }
    /**
     * Creates an object of the right kind and try to fetch it to make sure the id exists
     *
     * Return 1 if created, -1 if it does not exist
     *
     * @param   int         $objectid       ID of the object
     * @param   string      $objecttype     ID of the object
     * @return  int							1 if created, -1 if it does not exist
     *
     */
    private function _makeobject($objectid, $objecttype)
    {
    }
}