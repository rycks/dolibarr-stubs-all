<?php

/**
 *  Class to manage table ReceptionLineBatch.
 *  Old name was CommandeFournisseurDispatch. This is a transition class.
 */
class CommandeFournisseurDispatch extends \ReceptionLineBatch
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'commandefournisseurdispatch';
    /**
     * @var int ID
     */
    public $fk_commande;
    /**
     * @var int ID
     */
    public $fk_commandefourndet;
    /**
     *  Create object into database
     *
     *  @param	User	$user        User that creates
     *  @param  int		$notrigger   0=launch triggers after, 1=disable triggers
     *  @return int      		   	 Return integer <0 if KO, Id of created object if OK
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from the database
     *
     *  @param	int		$id    	Id object
     *  @param	string	$ref	Ref
     *  @return int          	Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *  Update object into database
     *
     *  @param	User	$user        User that modifies
     *  @param  int		$notrigger	 0=launch triggers after, 1=disable triggers
     *  @return int     		   	 Return integer <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
}