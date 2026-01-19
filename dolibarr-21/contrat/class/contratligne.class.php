<?php

/**
 *	Class to manage lines of contracts
 */
class ContratLigne extends \CommonObjectLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'contratdet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'contratdet';
    /**
     * @see CommonObjectLine
     */
    public $parent_element = 'contrat';
    /**
     * @see CommonObjectLine
     */
    public $fk_parent_attribute = 'fk_contrat';
    /**
     * @var string 	Name to use for 'features' parameter to check module permissions user->rights->feature with restrictedArea().
     * 				Undefined means same value than $element. Can be use to force a check on another element for example for class of line, we mention here the parent element.
     */
    public $element_for_permission = 'contrat';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Ref
     */
    public $ref;
    /**
     * @var int ID
     */
    public $fk_contrat;
    /**
     * @var int ID
     */
    public $fk_product;
    /**
     * @var int 0 inactive, 4 active, 5 closed
     */
    public $statut;
    /**
     * @var int 0 for product, 1 for service
     */
    public $type;
    /**
     * @var string
     * @deprecated
     */
    public $label;
    /**
     * @var string
     * @deprecated
     */
    public $libelle;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var int 0 for product, 1 for service
     */
    public $product_type;
    /**
     * @var string
     */
    public $product_ref;
    /**
     * @var string
     */
    public $product_label;
    /**
     * @var int|string
     */
    public $date_commande;
    /**
     * @var int|string date start planned
     */
    public $date_start;
    /**
     * @var int|string date start real
     */
    public $date_start_real;
    /**
     * @var int|string date end planned
     */
    public $date_end;
    /**
     * @var null|int|string date end real
     */
    public $date_end_real;
    /**
     * @var float|string
     */
    public $tva_tx;
    /**
     * @var string
     */
    public $vat_src_code;
    /**
     * @var string|float
     */
    public $localtax1_tx;
    /**
     * @var string|float
     */
    public $localtax2_tx;
    /**
     * @var string Local tax 1 type
     */
    public $localtax1_type;
    /**
     * @var string Local tax 2 type
     */
    public $localtax2_type;
    /**
     * @var float
     */
    public $qty;
    /**
     * @var float|string
     */
    public $remise_percent;
    /**
     * @var float|string
     * @deprecated
     */
    public $remise;
    /**
     * @var int ID
     */
    public $fk_remise_except;
    /**
     * Unit price before taxes
     * @var float
     */
    public $subprice;
    /**
     * @var float
     * @deprecated Use $price_ht instead
     * @see $price_ht
     */
    public $price;
    /**
     * @var float price without tax
     */
    public $price_ht;
    /**
     * @var float
     */
    public $total_ht;
    /**
     * @var float
     */
    public $total_tva;
    /**
     * @var float
     */
    public $total_localtax1;
    /**
     * @var float
     */
    public $total_localtax2;
    /**
     * @var float
     */
    public $total_ttc;
    /**
     * @var int 	ID
     */
    public $fk_fournprice;
    /**
     * @var float
     */
    public $pa_ht;
    /**
     * @var int		Info bits
     */
    public $info_bits;
    /**
     * @var int 	ID of user that insert the service
     */
    public $fk_user_author;
    /**
     * @var int 	ID of user opening the service
     */
    public $fk_user_ouverture;
    /**
     * @var int 	ID of user closing the service
     */
    public $fk_user_cloture;
    /**
     * @var string	Comment
     */
    public $commentaire;
    /**
     * @var int line rank
     */
    public $rang = 0;
    const STATUS_INITIAL = 0;
    const STATUS_OPEN = 4;
    const STATUS_CLOSED = 5;
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-5,5>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 30, 'index' => 1),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 35),
        'qty' => array('type' => 'integer', 'label' => 'Quantity', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 35, 'isameasure' => 1),
        'total_ht' => array('type' => 'integer', 'label' => 'AmountHT', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 36, 'isameasure' => 1),
        'total_tva' => array('type' => 'integer', 'label' => 'AmountVAT', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 37, 'isameasure' => 1),
        'total_ttc' => array('type' => 'integer', 'label' => 'AmountTTC', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 38, 'isameasure' => 1),
        //'datec' =>array('type'=>'datetime', 'label'=>'DateCreation', 'enabled'=>1, 'visible'=>-1, 'position'=>40),
        //'fk_soc' =>array('type'=>'integer:Societe:societe/class/societe.class.php', 'label'=>'ThirdParty', 'enabled'=>1, 'visible'=>-1, 'notnull'=>1, 'position'=>70),
        'fk_contrat' => array('type' => 'integer:Contrat:contrat/class/contrat.class.php', 'label' => 'Contract', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 70),
        'fk_product' => array('type' => 'integer:Product:product/class/product.class.php:1', 'label' => 'Product', 'enabled' => 1, 'visible' => -1, 'position' => 75),
        //'fk_user_author' =>array('type'=>'integer:User:user/class/user.class.php', 'label'=>'Fk user author', 'enabled'=>1, 'visible'=>-1, 'notnull'=>1, 'position'=>90),
        'note_private' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 105),
        'note_public' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 110),
        //'model_pdf' =>array('type'=>'varchar(255)', 'label'=>'Model pdf', 'enabled'=>1, 'visible'=>0, 'position'=>115),
        //'import_key' =>array('type'=>'varchar(14)', 'label'=>'ImportId', 'enabled'=>1, 'visible'=>-2, 'position'=>120),
        //'extraparams' =>array('type'=>'varchar(255)', 'label'=>'Extraparams', 'enabled'=>1, 'visible'=>-1, 'position'=>125),
        'fk_user_ouverture' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserStartingService', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 135),
        'fk_user_cloture' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserClosingService', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 135),
        'statut' => array('type' => 'smallint(6)', 'label' => 'Statut', 'enabled' => 1, 'visible' => -1, 'position' => 500, 'arrayofkeyval' => array(0 => 'Draft', 4 => 'Open', 5 => 'Closed')),
        'rang' => array('type' => 'integer', 'label' => 'Rank', 'enabled' => 1, 'visible' => 0, 'position' => 500, 'default' => '0'),
    );
    // END MODULEBUILDER PROPERTIES
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Return label of this contract line status
     *
     *  @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string      		Label of status
     */
    public function getLibStatut($mode)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return label of a contract line status
     *
     *  @param	int		$status     Id status
     *  @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *	@param	int		$expired	0=Not expired, 1=Expired, -1=Both or unknown
     *  @param	string	$moreatt	More attribute
     *  @param	string	$morelabel	More label
     *  @return string      		Label of status
     */
    public static function LibStatut($status, $mode, $expired = -1, $moreatt = '', $morelabel = '')
    {
    }
    /**
     * getTooltipContentArray
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array<string,string>
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Return clickable name (with picto eventually) for ContratLigne
     *
     *  @param	int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *  @param	int		$maxlength		Max length
     *  @return	string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $maxlength = 0)
    {
    }
    /**
     *  Load object in memory from database
     *
     *  @param	int		$id         Id object
     *  @param	string	$ref		Ref of contract line
     *  @return int         		Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *      Update database for contract line
     *
     *      @param	User	$user        	User that modify
     *      @param  int		$notrigger	    0=no, 1=yes (no update trigger)
     *      @return int         			Return integer <0 if KO, >0 if OK
     */
    public function update($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update in database the fields total_xxx of lines
     *	Used by migration process
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function update_total()
    {
    }
    /**
     * Inserts a contrat line into database
     *
     * @param int $notrigger Set to 1 if you don't want triggers to be fired
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function insert($notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Activate a contract line
     *
     * @param   User 		$user 		Object User who activate contract
     * @param  	int 		$date 		Date real activation
     * @param  	int|string 	$date_end 	Date planned end. Use '-1' to keep it unchanged.
     * @param   string 		$comment 	A comment typed by user
     * @return 	int                    	Return integer <0 if KO, >0 if OK
     */
    public function active_line($user, $date, $date_end = '', $comment = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Close a contract line
     *
     * @param    User 	$user 			Object User who close contract
     * @param  	 int 	$date_end_real 	Date end
     * @param    string $comment 		A comment typed by user
     * @param    int	$notrigger		1=Does not execute triggers, 0=Execute triggers
     * @return int                    	Return integer <0 if KO, >0 if OK
     */
    public function close_line($user, $date_end_real, $comment = '', $notrigger = 0)
    {
    }
}