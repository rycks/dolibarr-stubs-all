<?php

/**
 *	Class to manage withdrawal receipts
 */
class BonPrelevement extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'widthdraw';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'prelevement_bons';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'payment';
    public $date_echeance;
    public $raison_sociale;
    public $reference_remise;
    public $emetteur_code_guichet;
    public $emetteur_numero_compte;
    public $emetteur_code_banque;
    public $emetteur_number_key;
    public $emetteur_iban;
    public $emetteur_bic;
    public $emetteur_ics;
    public $total;
    public $fetched;
    public $statut;
    // 0-Wait, 1-Trans, 2-Done
    public $labelstatut = array();
    public $invoice_in_error = array();
    public $thirdparty_in_error = array();
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      	Database handler
     *  @param		string		$filename	Filename of withdraw receipt
     */
    public function __construct($db, $filename = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Add invoice to withdrawal
     *
     * @param	int		$facture_id 	id invoice to add
     * @param	int		$client_id  	id invoice customer
     * @param	string	$client_nom 	customer name
     * @param	int		$amount 		amount of invoice
     * @param	string	$code_banque 	code of bank withdrawal
     * @param	string	$code_guichet 	code of bank's office
     * @param	string	$number bank 	account number
     * @param	string	$number_key 	number key of account number
     * @return	int						>0 if OK, <0 if KO
     */
    public function AddFacture($facture_id, $client_id, $client_nom, $amount, $code_banque, $code_guichet, $number, $number_key)
    {
    }
    /**
     *	Add line to withdrawal
     *
     *	@param	int		$line_id 		id line to add
     *	@param	int		$client_id  	id invoice customer
     *	@param	string	$client_nom 	customer name
     *	@param	int		$amount 		amount of invoice
     *	@param	string	$code_banque 	code of bank withdrawal
     *	@param	string	$code_guichet 	code of bank's office
     *	@param	string	$number 		bank account number
     *	@param  string	$number_key 	number key of account number
     *	@return	int						>0 if OK, <0 if KO
     */
    public function addline(&$line_id, $client_id, $client_nom, $amount, $code_banque, $code_guichet, $number, $number_key)
    {
    }
    /**
     *	Return error string
     *
     *  @param	int		$error 		 Id of error
     *	@return	string               Error string
     */
    public function getErrorString($error)
    {
    }
    /**
     *	Get object and lines from database
     *
     *	@param	int		$rowid		Id of object to load
     *  @param	string	$ref		Ref of direct debit
     *	@return	int					>0 if OK, <0 if KO
     */
    public function fetch($rowid, $ref = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Set credite and set status of linked invoices. Still used ??
     *
     * @return		int		<0 if KO, >=0 if OK
     */
    public function set_credite()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set direct debit order to "credited" status.
     *
     *	@param	User	$user			Id of user
     *	@param 	int		$date			date of action
     *	@return	int						>0 if OK, <0 if KO
     */
    public function set_infocredit($user, $date)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set withdrawal to transmited status
     *
     *	@param	User		$user		id of user
     *	@param 	int	$date		date of action
     *	@param	string		$method		method of transmision to bank
     *	@return	int						>0 if OK, <0 if KO
     */
    public function set_infotrans($user, $date, $method)
    {
    }
    /**
     *	Get invoice list
     *
     *  @param 	int		$amounts 	If you want to get the amount of the order for each invoice
     *	@return	array 				Id of invoices
     */
    private function getListInvoices($amounts = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Returns amount of withdrawal
     *
     *	@return		double	 	Total amount
     */
    public function SommeAPrelever()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Get number of invoices to withdrawal
     *	TODO delete params banque and agence when not necesary
     *
     *	@param	int		$banque		dolibarr mysoc bank
     *	@param	int		$agence		dolibarr mysoc agence
     *	@return	int					<O if KO, number of invoices if OK
     */
    public function NbFactureAPrelever($banque = 0, $agence = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a withdraw
     *  TODO delete params banque and agence when not necesary
     *
     *	@param 	int		$banque		dolibarr mysoc bank
     *	@param	int		$agence		dolibarr mysoc bank office (guichet)
     *	@param	string	$mode		real=do action, simu=test only
     *  @param	string	$format		FRST, RCUR or ALL
     * @param       string  $executiondate	Date to execute the transfer
     *	@return	int					<0 if KO, nbre of invoice withdrawed if OK
     */
    public function Create($banque = 0, $agence = 0, $mode = 'real', $format = 'ALL', $executiondate = '')
    {
    }
    /**
     *  Get object and lines from database
     *
     *  @param	User	$user		Object user that delete
     *  @param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return	int					>0 if OK, <0 if KO
     */
    public function delete($user = \null, $notrigger = 0)
    {
    }
    /**
     *	Returns clickable name (with picto)
     *
     *  @param  int     $withpicto                  Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param  string  $option                     On what the link point to ('nolink', ...)
     *  @param  int     $notooltip                  1=Disable tooltip
     *  @param  string  $morecss                    Add more css on link
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								URL of target
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Delete a notification def by id
     *
     *	@param	int		$rowid		id of notification
     *	@return	int					0 if OK, <0 if KO
     */
    public function DeleteNotificationById($rowid)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Delete a notification
     *
     *	@param	int	$user		notification user
     *	@param	string	$action		notification action
     *	@return	int					>0 if OK, <0 if KO
     */
    public function DeleteNotification($user, $action)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add a notification
     *
     *	@param	DoliDB	$db			database handler
     *	@param	int	$user		notification user
     *	@param	string	$action		notification action
     *	@return	int					0 if OK, <0 if KO
     */
    public function AddNotification($db, $user, $action)
    {
    }
    /**
     * Generate a withdrawal file.
     * Generation Formats:
     * - Europe: SEPA (France: CFONB no more supported, Spain: AEB19 if external module EsAEB is enabled)
     * - Others countries: Warning message
     * File is generated with name this->filename
     *
     *  @param		string	$format		FRST, RCUR or ALL
     * @param string $executiondate		Date to execute transfer
     *	@return		int					0 if OK, <0 if KO
     */
    public function generate($format = 'ALL', $executiondate = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Write recipient of request (customer)
     *
     *	@param	int		$rowid			id of line
     *	@param	string	$client_nom		name of customer
     *	@param	string	$rib_banque		code of bank
     *	@param	string	$rib_guichet 	code of bank office
     *	@param	string	$rib_number		bank account
     *	@param	float	$amount			amount
     *	@param	string	$ref		ref of invoice
     *	@param	int		$facid			id of invoice
     *  @param	string	$rib_dom		rib domiciliation
     *	@return	void
     */
    public function EnregDestinataire($rowid, $client_nom, $rib_banque, $rib_guichet, $rib_number, $amount, $ref, $facid, $rib_dom = '')
    {
    }
    /**
     * Build RUM number for a customer bank account
     *
     * @param	string		$row_code_client	Customer code (soc.code_client)
     * @param	int			$row_datec			Creation date of bank account (rib.datec)
     * @param	string		$row_drum			Id of customer bank account (rib.rowid)
     * @return 	string		RUM number
     */
    public static function buildRumNumber($row_code_client, $row_datec, $row_drum)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Write recipient of request (customer)
     *
     *	@param	string		$row_code_client	soc.code_client as code,
     *	@param	string		$row_nom			pl.client_nom AS name,
     *	@param	string		$row_address		soc.address AS adr,
     *	@param	string		$row_zip			soc.zip
     *  @param	string		$row_town			soc.town
     *	@param	string		$row_country_code	c.code AS country,
     *	@param	string		$row_cb				pl.code_banque AS cb,		Not used for SEPA
     *	@param	string		$row_cg				pl.code_guichet AS cg,		Not used for SEPA
     *	@param	string		$row_cc				pl.number AS cc,			Not used for SEPA
     *	@param	string		$row_somme			pl.amount AS somme,
     *	@param	string		$row_ref			f.ref
     *	@param	string		$row_idfac			pf.fk_facture AS idfac,
     *	@param	string		$row_iban			rib.iban_prefix AS iban,
     *	@param	string		$row_bic			rib.bic AS bic,
     *	@param	string		$row_datec			rib.datec,
     *	@param	string		$row_drum			rib.rowid used to generate rum
     * 	@param	string		$row_rum			rib.rum Rum defined on company bank account
     *	@return	string							Return string with SEPA part DrctDbtTxInf
     */
    public function EnregDestinataireSEPA($row_code_client, $row_nom, $row_address, $row_zip, $row_town, $row_country_code, $row_cb, $row_cg, $row_cc, $row_somme, $row_ref, $row_idfac, $row_iban, $row_bic, $row_datec, $row_drum, $row_rum)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Write sender of request (me)
     *
     *	@return	void
     */
    public function EnregEmetteur()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Write sender of request (me).
     *  Note: The tag PmtInf is opened here but closed into caller
     *
     *	@param	string	$configuration	conf
     *	@param	int	$ladate			Date
     *	@param	int		$nombre			0 or 1
     *	@param	float	$total			Total
     *	@param	string	$CrLf			End of line character
     *  @param	string	$format			FRST or RCUR or ALL
     *	@return	string					String with SEPA Sender
     */
    public function EnregEmetteurSEPA($configuration, $ladate, $nombre, $total, $CrLf = '\\n', $format = 'FRST')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Write end
     *
     *	@param	int		$total	total amount
     *	@return	void
     */
    public function EnregTotal($total)
    {
    }
    /**
     *    Return status label of object
     *
     *    @param    int		$mode   0=Label, 1=Picto + label, 2=Picto, 3=Label + Picto
     * 	  @return	string     		Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return status label for a status
     *
     *  @param	int		$statut     id statut
     *  @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * 	@return	string  		    Label
     */
    public function LibStatut($statut, $mode = 0)
    {
    }
}