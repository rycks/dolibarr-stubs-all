<?php

/**
 *	Class to manage local tax
 */
class Localtax extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'localtax';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'localtax';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'payment';
    public $ltt;
    public $tms;
    public $datep;
    public $datev;
    public $amount;
    /**
     * @var string local tax
     */
    public $label;
    /**
     * @var int ID
     */
    public $fk_bank;
    /**
     * @var int ID
     */
    public $fk_user_creat;
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
     *  Create in database
     *
     *  @param      User	$user       User that create
     *  @return     int      			<0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     *	Update database
     *
     *	@param		User	$user        	User that modify
     *	@param		int		$notrigger		0=no, 1=yes (no update trigger)
     *	@return		int						<0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Load object in memory from database
     *
     *	@param		int		$id		Object id
     *	@return		int				<0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *	Delete object in database
     *
     *	@param		User	$user		User that delete
     *	@return		int					<0 if KO, >0 if OK
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
     *	Hum la fonction s'appelle 'Solde' elle doit a mon avis calcluer le solde de localtax, non ?
     *
     *	@param	int		$year		Year
     *	@return	int					???
     */
    public function solde($year = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Total de la localtax des factures emises par la societe.
     *
     *	@param	int		$year		Year
     *	@return	int					???
     */
    public function localtax_sum_collectee($year = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Total of localtax paid in invoice
     *
     *	@param	int		$year		Year
     *	@return	int					???
     */
    public function localtax_sum_payee($year = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Total of localtax paid
     *
     *	@param	int		$year		Year
     *	@return	int					???
     */
    public function localtax_sum_reglee($year = 0)
    {
    }
    /**
     *	Add a payment of localtax
     *
     *	@param		User	$user		Object user that insert
     *	@return		int					<0 if KO, rowid in localtax table if OK
     */
    public function addPayment($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update the link betwen localtax payment and the line into llx_bank
     *
     *	@param		int		$id		Id bank account
     *	@return		int				<0 if KO, >0 if OK
     */
    public function update_fk_bank($id)
    {
    }
    /**
     *	Returns clickable name
     *
     *	@param		int		$withpicto		0=Link, 1=Picto into link, 2=Picto
     *	@param		string	$option			Sur quoi pointe le lien
     *	@return		string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $option = '')
    {
    }
    /**
     * Retourne le libelle du statut d'une facture (brouillon, validee, abandonnee, payee)
     *
     * @param	int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     * @return  string				Libelle
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Renvoi le libelle d'un statut donne
     *
     * @param   int		$status     Statut
     * @param   int		$mode       0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     * @return	string              Libelle du statut
     */
    public function LibStatut($status, $mode = 0)
    {
    }
}