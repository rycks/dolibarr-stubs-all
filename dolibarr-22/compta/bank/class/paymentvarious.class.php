<?php

/**
 *  Class to manage various payments
 */
class PaymentVarious extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'payment_various';
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
    /**
     * @var int timestamp
     */
    public $datep;
    /**
     * @var int timestamp
     */
    public $datev;
    /**
     * @var int<0,1> Payment direction (debit or credit)
     */
    public $sens;
    /**
     * @var float
     */
    public $amount;
    /**
     * @var int Payment type (fk_typepayment)
     */
    public $type_payment;
    /**
     * @var string      Payment reference
     *                  (Cheque or bank transfer reference. Can be "ABC123")
     */
    public $num_payment;
    /**
     * @var string Name of cheque writer
     */
    public $chqemetteur;
    /**
     * @var string Bank of cheque writer
     */
    public $chqbank;
    /**
     * @var int Category id
     */
    public $category_transaction;
    /**
     * @var string various payments label
     */
    public $label;
    /**
     * @var string accountancy code
     */
    public $accountancy_code;
    /**
     * @var string subledger account
     */
    public $subledger_account;
    /**
     * @var int ID
     */
    public $fk_project;
    /**
     * @var int Bank account ID
     */
    public $fk_account;
    /**
     * @var int Bank account ID
     * @deprecated See fk_account
     */
    public $accountid;
    /**
     * @var int ID record into llx_bank
     */
    public $fk_bank;
    /**
     * @var int transaction category
     */
    public $categorie_transaction;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int ID
     */
    public $fk_user_modif;
    /**
     * @var	int		Type of bank account if the payment is on a bank account
     */
    public $fk_type;
    /**
     * @var int		1 if the payment is on a bank account line that is conciliated
     */
    public $rappro;
    /**
     * @var	string	ID of bank receipt
     */
    public $bank_num_releve;
    /**
     *  'type' if the field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalString("MY_SETUP_PARAM")'
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommended to name the field fk_...).
     *  'searchall' is 1 if we want to search in this field when making a search from the quick search button.
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' is the CSS style to use on field. For example: 'maxwidth200'
     *  'help' is a string visible as a tooltip on field
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,6>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array();
    // END MODULEBUILDER PROPERTIES
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Update database
     *
     * @param   User	$user        	User that modify
     * @param   int		$notrigger      0=no, 1=yes (no update trigger)
     * @return  int         			Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         id object
     *  @param  ?User	$user       User that load
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $user = \null)
    {
    }
    /**
     *  Delete object in database
     *
     *	@param	User	$user       User that delete
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function delete($user)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	int
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Check if a miscellaneous payment can be created into database
     *
     * @return	boolean		True or false
     */
    public function check()
    {
    }
    /**
     *  Create in database
     *
     *  @param   User   $user   User that create
     *  @return  int            Return integer <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update link between payment various and line generate into llx_bank
     *
     *  @param  int     $id_bank    Id bank account
     *	@return int                 Return integer <0 if KO, >0 if OK
     */
    public function update_fk_bank($id_bank)
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
     *	Send name clickable (with possibly the picto)
     *
     *	@param  int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     *	@param  string	$option						link option
     *  @param  int     $save_lastsearch_value	 	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @param	int  	$notooltip		 			1=Disable tooltip
     *  @param	string  $morecss                    morecss string
     *	@return string								String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $save_lastsearch_value = -1, $notooltip = 0, $morecss = '')
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
    /**
     *	Return if a various payment linked to a bank line id was dispatched into bookkeeping
     *
     *	@param		int		$mode		0=Return nb of record, 1=return the transaction ID (piece_num)
     *	@return     int         		Return integer <0 if KO, 0=no, 1=yes or ID transaction
     */
    public function getVentilExportCompta($mode = 0)
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param      string	    			$option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		?array<string,mixed>	$arraydata				Array of data
     *  @return		string											HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
    /**
     * Return General accounting account with defined length (used for product and miscellaneous)
     *
     * @param 	string	$account		General accounting account
     * @return	string          		String with defined length
     */
    public function lengthAccountg($account)
    {
    }
    /**
     * Return Auxiliary accounting account of thirdparties with defined length
     *
     * @param 	string	$account		Auxiliary accounting account
     * @return	string          		String with defined length
     */
    public function lengthAccounta($account)
    {
    }
}