<?php

/**
 *  Class to manage various payments
 */
class PaymentVarious extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'variouspayment';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'payment_various';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'payment';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Ref
     */
    public $ref;
    public $tms;
    public $datep;
    public $datev;
    public $sens;
    public $amount;
    public $type_payment;
    public $num_payment;
    public $category_transaction;
    /**
     * @var string various payments label
     */
    public $label;
    public $accountancy_code;
    public $subledger_account;
    /**
     * @var int ID
     */
    public $fk_project;
    /**
     * @var int ID
     */
    public $fk_bank;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_modif;
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
     * @param   int		$notrigger      0=no, 1=yes (no update trigger)
     * @return  int         			<0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         id object
     *  @param  User	$user       User that load
     *  @return int         		<0 if KO, >0 if OK
     */
    public function fetch($id, $user = \null)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param	User	$user       User that delete
     *	@return	int					<0 if KO, >0 if OK
     */
    public function delete($user)
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
     *  @param   User   $user   User that create
     *  @return  int            <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update link between payment various and line generate into llx_bank
     *
     *  @param  int     $id_bank    Id bank account
     *	@return int                 <0 if KO, >0 if OK
     */
    public function update_fk_bank($id_bank)
    {
    }
    /**
     * Retourne le libelle du statut
     *
     * @param	int		$mode   	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     * @return  string   		   	Libelle
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi le libelle d'un statut donne
     *
     *  @param	int		$statut     Id status
     *  @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *  @return string      		Libelle
     */
    public function LibStatut($statut, $mode = 0)
    {
    }
    /**
     *	Send name clicable (with possibly the picto)
     *
     *	@param  int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *	@param  string	$option						link option
     *  @param  int     $save_lastsearch_value	 	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param	int  	$notooltip		 			1=Disable tooltip
     *	@return string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $save_lastsearch_value = -1, $notooltip = 0)
    {
    }
    /**
     * Information on record
     *
     * @param  int      $id      Id of record
     * @return void
     */
    public function info($id)
    {
    }
}