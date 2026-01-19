<?php

/**
 * Class Cpaiement
 */
class Cpaiement extends \CommonDict
{
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'cpaiement';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'c_paiement';
    /**
     * @var string
     * @deprecated Use $label
     * @see $label
     */
    public $libelle;
    /**
     * @var string
     */
    public $type;
    /**
     * @var int<0,1>
     */
    public $active;
    /**
     * @var string
     */
    public $accountancy_code;
    /**
     * @var string
     */
    public $module;
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
     * @param  User $user      	User that creates
     * @param  int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int 				Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id  Id object
     * @param string $ref Ref
     *
     * @return int Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Update object into database
     *
     * @param  User		$user      	User that modifies
     * @param  int<0,1> $notrigger 	0=launch triggers after, 1=disable triggers
     * @return int					Return integer <0 if KO, >0 if OK
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
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return int
     */
    public function initAsSpecimen()
    {
    }
}