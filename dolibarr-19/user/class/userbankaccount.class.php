<?php

/**
 * 	Class to manage bank accounts description of users
 */
class UserBankAccount extends \Account
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'user_bank_account';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'user_rib';
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
     * User id of bank account
     *
     * @var integer
     */
    public $userid;
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
     * @param	User|null	$user		User
     * @param	int			$notrigger	1=Disable triggers
     * @return	int						Return integer <0 if KO, >= 0 if OK
     */
    public function create(\User $user = \null, $notrigger = 0)
    {
    }
    /**
     *	Update bank account
     *
     *	@param	User|null	$user		Object user
     *	@param	int			$notrigger	1=Disable triggers
     *	@return	int						Return integer <=0 if KO, >0 if OK
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
     * 	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '', $userid = 0)
    {
    }
    /**
     *  Delete user bank account from database
     *
     *  @param	User|null	$user	User deleting
     *  @return int             	Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user = \null)
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
    /**
     * Return if a country of userBank is inside the EEC (European Economic Community)
     * @return     boolean    true = country inside EEC, false = country outside EEC
     */
    public function checkCountryBankAccount()
    {
    }
}