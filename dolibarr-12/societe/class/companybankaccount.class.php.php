<?php

/**
 * 	Class to manage bank accounts description of third parties
 */
class CompanyBankAccount extends \Account
{
    public $socid;
    public $default_rib;
    public $frstrecur;
    public $rum;
    public $date_rum;
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
     * @param   User   $user		User
     * @param   int    $notrigger   1=Disable triggers
     * @return	int					<0 if KO, >= 0 if OK
     */
    public function create(\User $user = \null, $notrigger = 0)
    {
    }
    /**
     *	Update bank account
     *
     *	@param	User	$user	     Object user
     *  @param  int     $notrigger   1=Disable triggers
     *	@return	int				     <=0 if KO, >0 if OK
     */
    public function update(\User $user = \null, $notrigger = 0)
    {
    }
    /**
     * 	Load record from database
     *
     *	@param	int		$id			Id of record
     * 	@param	int		$socid		Id of company. If this is filled, function will return the first entry found (matching $default and $type)
     *  @param	int		$default	If id of company filled, we say if we want first record among all (-1), default record (1) or non default record (0)
     *  @param	int		$type		If id of company filled, we say if we want record of this type only
     * 	@return	int					<0 if KO, >0 if OK
     */
    public function fetch($id, $socid = 0, $default = 1, $type = 'ban')
    {
    }
    /**
     *  Delete a rib from database
     *
     *	@param		User	$user		User deleting
     *	@param  	int		$notrigger	1=Disable triggers
     *  @return		int		            <0 if KO, >0 if OK
     */
    public function delete(\User $user = \null, $notrigger = 0)
    {
    }
    /**
     * Return RIB
     *
     * @param   boolean     $displayriblabel     Prepend or Hide Label
     * @return	string		RIB
     */
    public function getRibLabel($displayriblabel = \true)
    {
    }
    /**
     * Set a BAN as Default
     *
     * @param   int     $rib    RIB id
     * @return  int             0 if KO, 1 if OK
     */
    public function setAsDefault($rib = 0)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	void
     */
    public function initAsSpecimen()
    {
    }
}