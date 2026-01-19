<?php

/**
 * 	Class to manage bank accounts description of third parties
 */
class UserBankAccount extends \Account
{
    public $socid;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * Date modification record (tms)
     *
     * @var integer
     */
    public $datem;
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create bank information record
     *
     * @param	User	$user		User
     * @param	int		$notrigger	1=Disable triggers
     * @return	int					<0 if KO, >= 0 if OK
     */
    public function create(\User $user = \null, $notrigger = 0)
    {
    }
    /**
     *	Update bank account
     *
     *	@param	User	$user		Object user
     *	@param	int		$notrigger	1=Disable triggers
     *	@return	int					<=0 if KO, >0 if OK
     */
    public function update(\User $user = \null, $notrigger = 0)
    {
    }
    /**
     * 	Load record from database
     *
     *	@param	int		$id			Id of record
     *	@param	string	$ref		Ref of record
     *  @param  int     $userid     User id
     * 	@return	int					<0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '', $userid = 0)
    {
    }
    /**
     * Return RIB
     *
     * @param   boolean     $displayriblabel     Prepend or Hide Label
     * @return  string      RIB
     */
    public function getRibLabel($displayriblabel = \true)
    {
    }
}