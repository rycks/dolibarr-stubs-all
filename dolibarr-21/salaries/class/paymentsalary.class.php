<?php

/**
 *	Class to manage payments of salaries
 */
class PaymentSalary extends \CommonObject
{
    /**
     * @var string 			ID to identify managed object
     */
    public $element = 'payment_salary';
    /**
     * @var string 			Name of table without prefix where object is stored
     */
    public $table_element = 'payment_salary';
    /**
     * @var string 			String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'payment';
    /**
     * @var int chid
     * @deprecated
     * @see $fk_salary
     */
    public $chid;
    /**
     * @var int 			ID of the salary linked to the payment
     */
    public $fk_salary;
    /**
     * @var int|string				Payment creation date
     */
    public $datec = '';
    /**
     * @var int|string		Date of payment
     * @deprecated Use $datep
     * @see $datep
     */
    public $datepaye = '';
    /**
     * @var int|string		Date of payment
     */
    public $datep = '';
    /**
     * @deprecated Use $amount
     * @see $amount
     * @var float|string
     */
    public $total;
    /**
     * @var float	Total amount of payment
     */
    public $amount;
    /**
     * @var array<float|string>	Array of amounts
     */
    public $amounts = array();
    /**
     * @var int 			Payment type ID
     */
    public $fk_typepayment;
    /**
     * @var string
     * @deprecated Use $num_payment
     */
    public $num_paiement;
    /**
     * @var string      Payment reference
     *                  (Cheque or bank transfer reference. Can be "ABC123")
     */
    public $num_payment;
    /**
     * @inheritdoc
     * @var int
     */
    public $fk_bank;
    /**
     * @var int				ID of bank_line
     */
    public $bank_line;
    /**
     * @var int				ID of the user who created the payment
     */
    public $fk_user_author;
    /**
     * @var int				ID of the user who modified the payment
     */
    public $fk_user_modif;
    /**
     * @var int				Payment type
     */
    public $type_code;
    /**
     * @var int				Payment label
     */
    public $type_label;
    /**
     * @var int				Bank account description
     */
    public $bank_account;
    /**
     * @var int|string		Payment validation date
     */
    public $datev = '';
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-5,5>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id'), 'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => 1, 'position' => 10, 'visible' => 1, 'index' => 1, 'comment' => "Reference of object"), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => 0, 'notnull' => 1, 'position' => 20), 'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => 0, 'position' => 30), 'datep' => array('type' => 'date', 'label' => 'Date', 'enabled' => 1, 'visible' => 0, 'position' => 40, 'comment' => 'Date'), 'datev' => array('type' => 'date', 'label' => 'Date', 'enabled' => 1, 'visible' => 0, 'position' => 50, 'comment' => 'Date'), 'fk_user' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'Employee', 'enabled' => 1, 'position' => 60, 'notnull' => 1, 'visible' => 1, 'picto' => 'user'), 'salary' => array('type' => 'double(24,8)', 'label' => 'salary', 'enabled' => 1, 'visible' => 0, 'position' => 70), 'amount' => array('type' => 'double(24,8)', 'label' => 'Amount', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 80), 'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:(fk_statut:=:1)', 'label' => 'Project', 'enabled' => "isModEnabled('project')", 'visible' => 0, 'position' => 90), 'fk_typepayment' => array('type' => 'typepayment', 'label' => 'DefaultPaymentMode', 'enabled' => 1, 'visible' => 1, 'position' => 100, 'comment' => 'Payment type'), 'num_payment' => array('type' => 'string', 'label' => 'Reference', 'enabled' => 1, 'visible' => 0, 'position' => 110, 'comment' => 'Reference'), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'position' => 120, 'notnull' => 0, 'visible' => 1), 'datesp' => array('type' => 'date', 'label' => 'DateStart', 'enabled' => 1, 'visible' => 1, 'position' => 130, 'comment' => 'Date'), 'dateep' => array('type' => 'date', 'label' => 'DateEnd', 'enabled' => 1, 'visible' => 1, 'position' => 140, 'comment' => 'Date'), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => 0, 'position' => 150, 'index' => 1), 'note' => array('type' => 'text', 'label' => 'Note', 'enabled' => 1, 'position' => 160, 'visible' => 0), 'fk_bank' => array('type' => 'integer', 'label' => 'BankId', 'enabled' => 1, 'visible' => 0, 'position' => 170), 'paye' => array('type' => 'smallint(6)', 'label' => 'Status', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 180), 'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => 0, 'position' => 190), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'position' => 200, 'visible' => 0), 'ref_ext' => array('type' => 'varchar(128)', 'label' => 'RefExt', 'enabled' => 1, 'visible' => 0, 'position' => 210), 'note_public' => array('type' => 'text', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 220));
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Create payment of salary into database.
     *  Use this->amounts to have list of lines for the payment
     *
     *  @param      User	$user   				User making payment
     *	@param		int		$closepaidcontrib   	1=Also close paid contributions to paid, 0=Do nothing more
     *  @return     int     						Return integer <0 if KO, id of payment if OK
     */
    public function create($user, $closepaidcontrib = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         Id object
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *  Update database
     *
     *  @param	User	$user        	User that modify
     *  @param  int		$notrigger	    0=launch triggers after, 1=disable triggers
     *  @return int         			Return integer <0 if KO, >0 if OK
     */
    public function update($user = \null, $notrigger = 0)
    {
    }
    /**
     *  Delete object in database
     *
     *  @param	User	$user        	User that delete
     *  @param  int		$notrigger		0=launch triggers after, 1=disable triggers
     *  @return int						Return integer <0 if KO, >0 if OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     *	Load an object from its id and create a new one in database
     *
     *  @param	User	$user		    User making the clone
     *	@param	int		$fromid     	Id of object to clone
     * 	@return	int						New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return int
     */
    public function initAsSpecimen()
    {
    }
    /**
     *      Add record into bank for payment with links between this bank record and invoices of payment.
     *      All payment properties must have been set first like after a call to create().
     *
     *      @param	User	$user               Object of user making payment
     *      @param  string	$mode               'payment_salary'
     *      @param  string	$label              Label to use in bank record
     *      @param  int		$accountid          Id of bank account to do link with
     *      @param  string	$emetteur_nom       Name of transmitter
     *      @param  string	$emetteur_banque    Name of bank
     *      @return int                 		Return integer <0 if KO, >0 if OK
     */
    public function addPaymentToBank($user, $mode, $label, $accountid, $emetteur_nom, $emetteur_banque)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Update the relation between the salary paiment and the line generated in llx_bank
     *
     *  @param	int		$id_bank         Id if bank
     *  @return	int			             >0 if OK, <=0 if KO
     */
    public function update_fk_bank($id_bank)
    {
    }
    /**
     *	Updates the payment date.
     *  Old name of function is update_date()
     *
     *  @param	int	$date   		New date
     *  @return int					Return integer <0 if KO, 0 if OK
     */
    public function updatePaymentDate($date)
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
     *  Return the status
     *
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     *  Return clickable name (with picto eventually)
     *
     *	@param	int		$withpicto					0=No picto, 1=Include picto into link, 2=Only picto
     * 	@param	int		$maxlen						Longueur max libelle
     *  @param  int     $notooltip      			1=Disable tooltip
     *  @param  string  $morecss                    Add more css on link
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string								Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $maxlen = 0, $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     * getTooltipContentArray
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array{picto?:string,ref?:string,refsupplier?:string,label?:string,date?:string,date_echeance?:string,amountht?:string,total_ht?:string,totaltva?:string,amountlt1?:string,amountlt2?:string,amountrevenustamp?:string,totalttc?:string}|array{optimize:string}
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Return clickable link of object (with eventually picto)
     *
     *	@param      string	    			$option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array{string,mixed}		$arraydata				Array of data
     *  @return		string											HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}