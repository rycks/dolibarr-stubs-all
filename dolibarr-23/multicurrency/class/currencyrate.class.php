<?php

/**
 * Class CurrencyRate
 */
class CurrencyRate extends \CommonObjectLine
{
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'multicurrency_rate';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'multicurrency_rate';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var double Rate
     */
    public $rate;
    /**
     * @var double Rate Indirect
     */
    public $rate_indirect;
    /**
     * @var integer    Date synchronisation
     */
    public $date_sync;
    /**
     * @var int Id of currency
     */
    public $fk_multicurrency;
    /**
     * @var int Id of entity
     */
    public $entity;
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
     * @param	User	$user				User making the deletion
     * @param  	int		$fk_multicurrency	Id of currency
     * @param  	int 	$notrigger 			0=launch triggers after, 1=disable triggers
     * @return 	int 						Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, int $fk_multicurrency, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param 	int    $id  Id object
     * @return 	int 		Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     * Update object into database
     *
     * @param	User	$user		User making the deletion
     * @param  	int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return 	int 				Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param	User	$user		User making the deletion
     * @param  	int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return 	int 				Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
}