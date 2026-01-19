<?php

/**
 *	Class to manage payments for supplier invoices
 */
class PaiementFourn extends \Paiement
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'payment_supplier';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'paiementfourn';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'payment';
    public $statut;
    //Status of payment. 0 = unvalidated; 1 = validated
    // fk_paiement dans llx_paiement est l'id du type de paiement (7 pour CHQ, ...)
    // fk_paiement dans llx_paiement_facture est le rowid du paiement
    /**
     * Label of payment type
     * @var string
     */
    public $type_label;
    /**
     * Code of Payment type
     * @var string
     */
    public $type_code;
    /**
     * @var string Id of prelevement
     */
    public $id_prelevement;
    /**
     * @var string num_prelevement
     */
    public $num_prelevement;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Load payment object
     *
     *	@param	int		$id         Id if payment to get
     *  @param	string	$ref		Ref of payment to get
     *  @param	int		$fk_bank	Id of bank line associated to payment
     *  @return int		            Return integer <0 if KO, -2 if not found, >0 if OK
     */
    public function fetch($id, $ref = '', $fk_bank = 0)
    {
    }
    /**
     *	Create payment in database
     *
     *	@param		User	   $user        		Object of creating user
     *	@param		int		   $closepaidinvoices   1=Also close payed invoices to paid, 0=Do nothing more
     *  @param      Societe    $thirdparty          Thirdparty
     *	@return     int         					id of created payment, < 0 if error
     */
    public function create($user, $closepaidinvoices = 0, $thirdparty = \null)
    {
    }
    /**
     *	Delete a payment and lines generated into accounts
     *	Si le paiement porte sur un ecriture compte qui est rapprochee, on refuse
     *	Si le paiement porte sur au moins une facture a "payee", on refuse
     *	@TODO Add User $user as first param
     *
     *	@param		int		$notrigger		No trigger
     *	@return     int     Return integer <0 si ko, >0 si ok
     */
    public function delete($notrigger = 0)
    {
    }
    /**
     *	Information on object
     *
     *	@param	int		$id      Id du paiement dont il faut afficher les infos
     *	@return	void
     */
    public function info($id)
    {
    }
    /**
     *	Return list of supplier invoices the payment point to
     *
     *	@param      string	$filter         SQL filter. Warning: This value must not come from a user input.
     *	@return     array|int           		Array of supplier invoice id | <0 si ko
     */
    public function getBillsArray($filter = '')
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *	Return clicable name (with picto eventually)
     *
     *	@param		int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *	@param		string	$option			Sur quoi pointe le lien
     *  @param		string  $mode           'withlistofinvoices'=Include list of invoices into tooltip
     *  @param		int  	$notooltip		1=Disable tooltip
     *  @param		string	$morecss		Add more CSS
     *	@return		string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $mode = 'withlistofinvoices', $notooltip = 0, $morecss = '')
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *	@param	string		$option		''=Create a specimen invoice with lines, 'nolines'=No lines
     *  @return	void
     */
    public function initAsSpecimen($option = '')
    {
    }
    /**
     *      Return next reference of supplier invoice not already used (or last reference)
     *      according to numbering module defined into constant SUPPLIER_PAYMENT_ADDON
     *
     *      @param	   Societe		$soc		object company
     *      @param     string		$mode		'next' for next value or 'last' for last value
     *      @return    string					free ref or last ref
     */
    public function getNextNumRef($soc, $mode = 'next')
    {
    }
    /**
     *	Create a document onto disk according to template model.
     *
     *	@param	    string		$modele			Force template to use ('' to not force)
     *	@param		Translate	$outputlangs	Object lang a utiliser pour traduction
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param   null|array  $moreparams     Array to provide more information
     *  @return     int         				Return integer <0 if KO, 0 if nothing done, >0 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    /**
     * 	get the right way of payment
     *
     * 	@return 	string 	'dolibarr' if standard comportment or paid in dolibarr currency, 'customer' if payment received from multicurrency inputs
     */
    public function getWay()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load the third party of object, from id into this->thirdparty
     *
     *	@param		int		$force_thirdparty_id	Force thirdparty id
     *	@return		int								Return integer <0 if KO, >0 if OK
     */
    public function fetch_thirdparty($force_thirdparty_id = 0)
    {
    }
}