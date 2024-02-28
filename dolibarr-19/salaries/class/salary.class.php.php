<?php

/**
 *  Class to manage salary payments
 */
class Salary extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'salary';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'salary';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'salary';
    public $tms;
    // /**
    //  * @var array	List of child tables. To test if we can delete object.
    //  */
    protected $childtables = array('payment_salary' => array('name' => 'SalaryPayment', 'fk_element' => 'fk_salary'));
    // /**
    //  * @var array    List of child tables. To know object to delete on cascade.
    //  *               If name matches '@ClassNAme:FilePathClass;ParentFkFieldName' it will
    //  *               call method deleteByParentField(parentId, ParentFkFieldName) to fetch and delete child object
    //  */
    //protected $childtablesoncascade = array('mymodule_myobjectdet');
    /**
     * @var int User ID
     */
    public $fk_user;
    public $datep;
    public $datev;
    public $salary;
    public $amount;
    /**
     * @var int ID
     */
    public $fk_project;
    public $type_payment;
    /**
     * @var string salary payments label
     */
    public $label;
    public $datesp;
    public $dateep;
    /**
     * @var int ID
     */
    public $fk_bank;
    /**
     * @var int
     * @see $accountid
     */
    public $fk_account;
    /**
     * @var int
     */
    public $accountid;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var user	User
     */
    public $user;
    /**
     * 1 if salary paid COMPLETELY, 0 otherwise (do not use it anymore, use statut and close_code)
     */
    public $paye;
    const STATUS_UNPAID = 0;
    const STATUS_PAID = 1;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Update database
     *
     * @param   User	$user        	User that modify
     * @param	int		$notrigger	    0=no, 1=yes (no update trigger)
     * @return  int         			Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         id object
     *  @param  User	$user       User that load
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $user = \null)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param	User	$user       User that delete
     *  @param  bool 	$notrigger 	false=launch triggers after, true=disable triggers
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
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
    /**
     *  Create in database
     *
     *  @param      User	$user       User that create
     *  @return     int      			Return integer <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update link between payment salary and line generate into llx_bank
     *
     *  @param	int		$id_bank    Id bank account
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function update_fk_bank($id_bank)
    {
    }
    /**
     * getTooltipContentArray
     *
     * @param array 	$params 		params to construct tooltip data
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Send name clicable (with possibly the picto)
     *
     *	@param	int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *	@param	string	$option						link option
     *  @param	int  	$notooltip					1=Disable tooltip
     *  @param  string  $morecss            		Add more css on link
     *  @param  int     $save_lastsearch_value    	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								Chaine with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     * 	Return amount of payments already done
     *
     *  @param 		int 			$multicurrency 		Return multicurrency_amount instead of amount. -1=Return both.
     *	@return		float|int|array						Amount of payment already done, <0 and set ->error if KO
     */
    public function getSommePaiement($multicurrency = 0)
    {
    }
    /**
     * Information on record
     *
     * @param	int		$id      Id of record
     * @return	void
     */
    public function info($id)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Tag social contribution as payed completely
     *
     *	  @deprecated
     *    @see setPaid()
     *    @param    User    $user       Object user making change
     *    @return   int					Return integer <0 if KO, >0 if OK
     */
    public function set_paid($user)
    {
    }
    /**
     *    Tag social contribution as payed completely
     *
     *    @param    User    $user       Object user making change
     *    @return   int					Return integer <0 if KO, >0 if OK
     */
    public function setPaid($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Remove tag payed on social contribution
     *
     *    @param	User	$user       Object user making change
     *    @return	int					Return integer <0 if KO, >0 if OK
     */
    public function set_unpaid($user)
    {
    }
    /**
     * Return label of current status
     *
     * @param	int			$mode       	0=label long, 1=labels short, 2=Picto + Label short, 3=Picto, 4=Picto + Label long, 5=Label short + Picto
     * @param   double		$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommand to put here amount payed if you have it, 1 otherwise)
     * @return  string						Label
     */
    public function getLibStatut($mode = 0, $alreadypaid = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of a given status
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=short label + picto, 6=Long label + picto
     *  @param  double	$alreadypaid	0=No payment already done, >0=Some payments were already done (we recommand to put here amount payed if you have it, 1 otherwise)
     *  @return string        			Label
     */
    public function LibStatut($status, $mode = 0, $alreadypaid = -1)
    {
    }
    /**
     *	Return clicable link of object (with eventually picto)
     *
     *	@param      string	    $option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array		$arraydata				Array of data
     *  @return		string								HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a withdrawal request for a direct debit order or a credit transfer order.
     *  Use the remain to pay excluding all existing open direct debit requests.
     *
     *	@param      User	$fuser      				User asking the direct debit transfer
     *  @param		float	$amount						Amount we request direct debit for
     *  @param		string	$type						'direct-debit' or 'bank-transfer'
     *  @param		string	$sourcetype					Source ('facture' or 'supplier_invoice')
     *  @param		int		$checkduplicateamongall		0=Default (check among open requests only to find if request already exists). 1=Check also among requests completely processed and cancel if at least 1 request exists whatever is its status.
     *	@return     int         						Return integer <0 if KO, 0 if a request already exists, >0 if OK
     */
    public function demande_prelevement($fuser, $amount = 0, $type = 'direct-debit', $sourcetype = 'salaire', $checkduplicateamongall = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Remove a direct debit request or a credit transfer request
     *
     *  @param  User	$fuser      User making delete
     *  @param  int		$did        ID of request to delete
     *  @return	int					Return integer <0 if OK, >0 if KO
     */
    public function demande_prelevement_delete($fuser, $did)
    {
    }
}