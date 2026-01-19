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
    public $sepa_xml_pti_in_ctti;
    public $emetteur_iban;
    public $emetteur_bic;
    public $emetteur_ics;
    public $user_trans;
    public $user_credit;
    public $total;
    public $fetched;
    public $labelStatus = array();
    public $factures = array();
    /**
     * @var array<int,string>
     */
    public $methodes_trans = array();
    public $invoice_in_error = array();
    public $thirdparty_in_error = array();
    /**
     * @var resource	Handler of the file for direct debit or credit transfer order
     */
    public $file;
    /**
     * @var string filename
     */
    public $filename;
    const STATUS_DRAFT = 0;
    const STATUS_TRANSFERED = 1;
    const STATUS_CREDITED = 2;
    // STATUS_CREDITED and STATUS_DEBITED is same. Difference is in ->type
    const STATUS_DEBITED = 2;
    // STATUS_CREDITED and STATUS_DEBITED is same. Difference is in ->type
    /**
     *  'type' field format:
     *  	'integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]',
     *  	'select' (list of values are in 'options'),
     *  	'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter[:Sortfield]]]]',
     *  	'chkbxlst:...',
     *  	'varchar(x)',
     *  	'text', 'text:none', 'html',
     *   	'double(24,8)', 'real', 'price',
     *  	'date', 'datetime', 'timestamp', 'duration',
     *  	'boolean', 'checkbox', 'radio', 'array',
     *  	'mail', 'phone', 'url', 'password', 'ip'
     *		Note: Filter must be a Dolibarr filter syntax string. Example: "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.status:!=:0) or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or '$conf->global->MY_SETUP_PARAM' or 'isModEnabled("multicurrency")' ...)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'alwayseditable' says if field can be modified also when status is not draft ('1' or '0')
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 or 2 if field can be used for measure. Field type must be summable like integer or double(24,8). Use 1 in most cases, or 2 if you don't want to see the column total into list (for example for percentage)
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'css'=>'minwidth300 maxwidth500 widthcentpercentminusx', 'cssview'=>'wordbreak', 'csslist'=>'tdoverflowmax200'
     *  'help' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set a list of values if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel"). Note that type can be 'integer' or 'varchar'
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *	'validate' is 1 if need to validate with $this->validateField()
     *  'copytoclipboard' is 1 or 2 to allow to add a picto to copy value into clipboard (1=picto after label, 2=picto after value)
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'visible' => 0), 'ref' => array('type' => 'varchar(12)', 'label' => 'Ref', 'enabled' => 1, 'position' => 15, 'notnull' => 0, 'visible' => -1, 'csslist' => 'tdoverflowmax150', 'showoncombobox' => 1), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'position' => 25, 'notnull' => 0, 'visible' => -1), 'amount' => array('type' => 'double(24,8)', 'label' => 'Amount', 'enabled' => 1, 'position' => 30, 'notnull' => 0, 'visible' => -1), 'statut' => array('type' => 'smallint(6)', 'label' => 'Statut', 'enabled' => 1, 'position' => 500, 'notnull' => 0, 'visible' => -1, 'arrayofkeyval' => array(0 => 'Wait', 1 => 'Transfered', 2 => 'Credited')), 'credite' => array('type' => 'smallint(6)', 'label' => 'Credite', 'enabled' => 1, 'position' => 40, 'notnull' => 0, 'visible' => -1), 'note' => array('type' => 'text', 'label' => 'Note', 'enabled' => 1, 'position' => 45, 'notnull' => 0, 'visible' => -1), 'date_trans' => array('type' => 'datetime', 'label' => 'Datetrans', 'enabled' => 1, 'position' => 50, 'notnull' => 0, 'visible' => -1), 'method_trans' => array('type' => 'smallint(6)', 'label' => 'Methodtrans', 'enabled' => 1, 'position' => 55, 'notnull' => 0, 'visible' => -1), 'fk_user_trans' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fkusertrans', 'enabled' => 1, 'position' => 60, 'notnull' => 0, 'visible' => -1, 'css' => 'maxwidth500 widthcentpercentminusxx', 'csslist' => 'tdoverflowmax150'), 'date_credit' => array('type' => 'datetime', 'label' => 'Datecredit', 'enabled' => 1, 'position' => 65, 'notnull' => 0, 'visible' => -1), 'fk_user_credit' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Fkusercredit', 'enabled' => 1, 'position' => 70, 'notnull' => 0, 'visible' => -1, 'css' => 'maxwidth500 widthcentpercentminusxx', 'csslist' => 'tdoverflowmax150'), 'type' => array('type' => 'varchar(16)', 'label' => 'Type', 'enabled' => 1, 'position' => 75, 'notnull' => 0, 'visible' => -1), 'fk_bank_account' => array('type' => 'integer', 'label' => 'Fkbankaccount', 'enabled' => 1, 'position' => 80, 'notnull' => 0, 'visible' => -1, 'css' => 'maxwidth500 widthcentpercentminusxx'));
    public $rowid;
    public $ref;
    public $datec;
    public $amount;
    /**
     * @var int	Status
     * @deprecated
     */
    public $statut;
    /**
     * @var int	Status
     */
    public $status;
    public $credite;
    public $note;
    public $date_trans;
    /**
     * @var int Current transport method, index to $methodes_trans
     */
    public $method_trans;
    public $fk_user_trans;
    public $date_credit;
    public $fk_user_credit;
    public $type;
    public $fk_bank_account;
    // END MODULEBUILDER PROPERTIES
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      	Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Add invoice to withdrawal
     *
     * @param	int		$invoice_id 	ID of invoice to add or ID of salary to add
     * @param	int		$client_id  	id invoice customer
     * @param	string	$client_nom 	customer name
     * @param	int		$amount 		amount of invoice
     * @param	string	$code_banque 	code of bank withdrawal
     * @param	string	$code_guichet 	code of bank's office
     * @param	string	$number bank 	account number
     * @param	string	$number_key 	number key of account number
     * @param	string	$type			'debit-order' or 'bank-transfer'
     * @param   string  $sourcetype     'salary' for salary, '' for invoices
     * @return	int						>0 if OK, <0 if KO
     */
    public function AddFacture($invoice_id, $client_id, $client_nom, $amount, $code_banque, $code_guichet, $number, $number_key, $type = 'debit-order', $sourcetype = '')
    {
    }
    /**
     *	Add line to withdrawal
     *
     *	@param	int		$line_id 		ID of line added (returned parameter)
     *	@param	int		$client_id  	ID of thirdparty for invoices, ID of user for salaries
     *	@param	string	$client_nom 	customer name
     *	@param	int		$amount 		amount of invoice
     *	@param	string	$code_banque 	code of bank withdrawal
     *	@param	string	$code_guichet 	code of bank's office
     *	@param	string	$number 		bank account number
     *	@param  string	$number_key 	number key of account number
     *  @param  string  $sourcetype     'salary' for salary, '' for invoices
     *	@return	int						>0 if OK, <0 if KO
     */
    public function addline(&$line_id, $client_id, $client_nom, $amount, $code_banque, $code_guichet, $number, $number_key, $sourcetype = '')
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
     *	@return	int					>0 if OK, 0=Not found, <0 if KO
     */
    public function fetch($rowid, $ref = '')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  int 	$notrigger 0=launch triggers after, 1=disable triggers
     * @return int             Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set direct debit or credit transfer order to "paid" status.
     *  Then create the payment for each invoice or salary of the prelemevement_bon.
     *
     *	@param	User	$user			Id of user
     *	@param 	int		$date			date of action
     *  @param  string  $type        	'salary' for type=salary
     *	@return	int						>0 if OK, <0 if KO
     */
    public function set_infocredit($user, $date, $type = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Set withdrawal to transmitted status
     *
     *	@param	User		$user		Id of user
     *	@param 	int			$date		Date of action
     *	@param	int			$method		Method of transmission to bank (0=Internet, 1=Api...)
     *	@return	int						>0 if OK, <0 if KO
     */
    public function set_infotrans($user, $date, $method)
    {
    }
    /**
     *	Get invoice or salary list (with amount or not)
     *
     *  @param 	int		$amounts 	If you want to get the amount of the order for each invoice or salary
     *  @param  string  $type       'salary' for type=salary
     *	@return	array 				Array(Id of invoices/salary, Amount to pay)
     */
    private function getListInvoices($amounts = 0, $type = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Returns amount waiting for direct debit payment or credit transfer payment
     *
     *	@param	string	$mode		'direct-debit' or 'bank-transfer'
     *  @param  string  $type        for type=salary
     *	@return	double	 			Return integer <O if KO, Total amount
     */
    public function SommeAPrelever($mode = 'direct-debit', $type = '')
    {
    }
    /**
     *	Get number of invoices waiting for payment
     *
     *	@param	string	$mode		'direct-debit' or 'bank-transfer'
     *  @param  string  $type        for salary invoice
     *	@return	int					Return integer <O if KO, number of invoices if OK
     */
    public function nbOfInvoiceToPay($mode = 'direct-debit', $type = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Get number of invoices to pay
     *
     *	@param	string	$type		'direct-debit' or 'bank-transfer'
     *  @param  int     $forsalary  0= for facture & facture_supplier, 1=for salary
     *	@return	int					Return integer <O if KO, number of invoices if OK
     */
    public function NbFactureAPrelever($type = 'direct-debit', $forsalary = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Create a BAN payment order:
     *  - Select waiting requests from prelevement_demande (or use $did if provided)
     *  - Check BAN values
     *  - Then create a direct debit order or a credit transfer order
     *  - Link the order with the prelevement_demande lines
     *  TODO delete params banque and agence when not necessary
     *
     *	@param 	int		$banque				dolibarr mysoc bank
     *	@param	int		$agence				dolibarr mysoc bank office (guichet)
     *	@param	string	$mode				real=do action, simu=test only
     *  @param	string	$format				FRST, RCUR or ALL
     *  @param  string  $executiondate		Date to execute the transfer
     *  @param	int	    $notrigger			Disable triggers
     *  @param	string	$type				'direct-debit' or 'bank-transfer'
     *  @param	int		$did				ID of an existing payment request. If $did is defined, we use the existing payment request.
     *  @param	int		$fk_bank_account	Bank account ID the receipt is generated for. Will use the ID into the setup of module Direct Debit or Credit Transfer if 0.
     *  @param	string	$sourcetype			'invoice' or 'salary'
     *	@return	int							Return integer <0 if KO, No of invoice included into file if OK
     */
    public function create($banque = 0, $agence = 0, $mode = 'real', $format = 'ALL', $executiondate = '', $notrigger = 0, $type = 'direct-debit', $did = 0, $fk_bank_account = 0, $sourcetype = 'invoice')
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
    /**
     *	Delete a notification def by id
     *
     *	@param	int		$rowid		id of notification
     *	@return	int					0 if OK, <0 if KO
     */
    public function deleteNotificationById($rowid)
    {
    }
    /**
     *	Delete a notification
     *
     *	@param	int|User	$user		notification user
     *	@param	string		$action		notification action
     *	@return	int						>0 if OK, <0 if KO
     */
    public function deleteNotification($user, $action)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Add a notification
     *
     *	@param	DoliDB		$db			database handler
     *	@param	int|User	$user		notification user
     *	@param	string		$action		notification action
     *	@return	int						0 if OK, <0 if KO
     */
    public function addNotification($db, $user, $action)
    {
    }
    /**
     * Generate a direct debit or credit transfer file.
     * Generation Formats:
     * - Europe: SEPA (France: CFONB no more supported, Spain: AEB19 if external module EsAEB is enabled)
     * - Others countries: Warning message
     * File is generated with name this->filename
     *
     * @param	string	$format				FRST, RCUR or ALL
     * @param 	int 	$executiondate		Timestamp date to execute transfer
     * @param	string	$type				'direct-debit' or 'bank-transfer'
     * @param	int		$fk_bank_account	Bank account ID the receipt is generated for. Will use the ID into the setup of module Direct Debit or Credit Transfer if 0.
     * @param   int  	$forsalary          If the SEPA is to pay salaries
     * @return	int							>=0 if OK, <0 if KO
     */
    public function generate($format = 'ALL', $executiondate = 0, $type = 'direct-debit', $fk_bank_account = 0, $forsalary = 0)
    {
    }
    /**
     * Generate dynamically a RUM number for a customer bank account
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
     *	@param	int		$rowid			id of line
     *	@param	string	$client_nom		name of customer
     *	@param	string	$rib_banque		code of bank
     *	@param	string	$rib_guichet 	code of bank office
     *	@param	string	$rib_number		bank account
     *	@param	float	$amount			amount
     *	@param	string	$ref		ref of invoice
     *	@param	int		$facid			id of invoice
     *  @param	string	$rib_dom		bank address
     *  @param	string	$type			'direct-debit' or 'bank-transfer'
     *	@return	void
     *  @see EnregDestinataireSEPA()
     */
    public function EnregDestinataire($rowid, $client_nom, $rib_banque, $rib_guichet, $rib_number, $amount, $ref, $facid, $rib_dom = '', $type = 'direct-debit')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Write recipient (thirdparty concerned by request)
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
     *	@param	float		$row_somme			pl.amount AS somme,
     *	@param	string		$row_ref			Invoice ref (f.ref) or Salary ref
     *	@param	int			$row_idfac			p.fk_facture AS idfac or p.fk_facture_fourn or p.fk_salary,
     *	@param	string		$row_iban			rib.iban_prefix AS iban,
     *	@param	string		$row_bic			rib.bic AS bic,
     *	@param	string		$row_datec			rib.datec,
     *	@param	string		$row_drum			rib.rowid used to generate rum
     * 	@param	string		$row_rum			rib.rum Rum defined on company bank account
     *  @param	string		$type				'direct-debit' or 'bank-transfer'
     *  @param  string      $row_comment		A free text string for the Unstructured data field
     *	@return	string							Return string with SEPA part DrctDbtTxInf
     *  @see EnregDestinataire()
     */
    public function EnregDestinataireSEPA($row_code_client, $row_nom, $row_address, $row_zip, $row_town, $row_country_code, $row_cb, $row_cg, $row_cc, $row_somme, $row_ref, $row_idfac, $row_iban, $row_bic, $row_datec, $row_drum, $row_rum, $type = 'direct-debit', $row_comment = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Write sender of request (me).
     *
     *  @param	string		$type				'direct-debit' or 'bank-transfer'
     *	@return	void
     *  @see EnregEmetteurSEPA()
     */
    public function EnregEmetteur($type = 'direct-debit')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Write sender of request (me).
     *  Note: The tag PmtInf is opened here but closed into caller
     *
     *	@param	Conf	$configuration		conf
     *	@param	int     $ladate				Date
     *	@param	int		$nombre				0 or 1
     *	@param	float	$total				Total
     *	@param	string	$CrLf				End of line character
     *  @param	string	$format				FRST or RCUR or ALL
     *  @param	string	$type				'direct-debit' or 'bank-transfer'
     *  @param	int		$fk_bank_account	Bank account ID the receipt is generated for. Will use the ID into the setup of module Direct Debit or Credit Transfer if 0.
     *	@return	string						String with SEPA Sender
     *  @see EnregEmetteur()
     */
    public function EnregEmetteurSEPA($configuration, $ladate, $nombre, $total, $CrLf = '\\n', $format = 'FRST', $type = 'direct-debit', $fk_bank_account = 0)
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
     *  Return status label of object
     *
     *  @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * 	@return	string     			Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return status label for a status
     *
     *  @param	int		$status     Id status
     *  @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * 	@return	string  		    Label
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *      Load indicators for dashboard (this->nbtodo and this->nbtodolate)
     *
     *      @param      User	$user       	Object user
     *      @param		string	$mode			Mode 'direct_debit' or 'credit_transfer'
     *      @return 	WorkboardResponse|int 	Return integer <0 if KO, WorkboardResponse if OK
     */
    public function load_board($user, $mode)
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
    /**
     * Check if is bon prelevement for salary invoice
     *
     * @return  int  	1 if OK, O if K0
     */
    public function checkIfSalaryBonPrelevement()
    {
    }
}