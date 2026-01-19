<?php

/**
 *  Class to manage order lines
 */
class OrderLine extends \CommonOrderLine
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'commandedet';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'commandedet';
    /**
     * @var OrderLine
     */
    public $oldline;
    /**
     * Id of parent order
     * @var int
     */
    public $fk_commande;
    /**
     * Id of parent order
     * @var int
     * @deprecated Use fk_commande
     * @see $fk_commande
     */
    public $commande_id;
    /**
     * @var int
     */
    public $fk_parent_line;
    /**
     * @var int Id of invoice
     */
    public $fk_facture;
    /**
     * @var string External ref
     */
    public $ref_ext;
    /**
     * @var int
     */
    public $fk_remise_except;
    /**
     * @var int line rank
     */
    public $rang = 0;
    /**
     * @var int
     */
    public $fk_fournprice;
    /**
     * Buy price without taxes
     * @var float|int|string	Can be '' when we do not provide any buying price.
     */
    public $pa_ht;
    /**
     * @var int|float|string
     */
    public $marge_tx;
    /**
     * @var float|string
     */
    public $marque_tx;
    /**
     * @var float|string
     * @deprecated
     * @see $remise_percent, $fk_remise_except
     */
    public $remise;
    /**
     * Start date of line
     * @var int|string
     */
    public $date_start;
    /**
     * End date of line
     * @var int|string
     */
    public $date_end;
    /**
     * Skip update price total for special lines
     * @var int
     */
    public $skip_update_total;
    /**
     * @var float
     */
    public $packaging;
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,6>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 10),
        'ref' => array('type' => 'varchar(50)', 'label' => 'Ref', 'enabled' => 1, 'visible' => -1, 'showoncombobox' => 1, 'position' => 15, 'searchall' => 1),
        'ref_ext' => array('type' => 'varchar(255)', 'label' => 'RefExt', 'enabled' => 1, 'visible' => 0, 'position' => 20),
        'ref_customer' => array('type' => 'varchar(50)', 'label' => 'RefCustomer', 'enabled' => 1, 'visible' => -1, 'position' => 25, 'searchall' => 1),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'default' => '1', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 30, 'index' => 1),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 35),
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'position' => 40),
        'fk_commande' => array('type' => 'integer:Commande:commande/class/commande.class.php', 'label' => 'Order', 'enabled' => 'isModEnabled("societe")', 'visible' => -1, 'notnull' => 1, 'position' => 70),
        'fk_projet' => array('type' => 'integer:Project:projet/class/project.class.php:1:(fk_statut:=:1)', 'label' => 'Project', 'enabled' => "isModEnabled('project')", 'visible' => -1, 'position' => 75),
        'fk_product' => array('type' => 'integer:Product:product/class/product.class.php:1', 'label' => 'ProductOrService', 'enabled' => "isModEnabled('product') || isModEnabled('service')", 'visible' => -1, 'position' => 76),
        //'fk_commercial_signature' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'SaleRepresentative Signature', 'enabled' => 1, 'visible' => -1, 'position' => 80),
        //'fk_commercial_suivi' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'SaleRepresentative follower', 'enabled' => 1, 'visible' => -1, 'position' => 85),
        'fk_user_author' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 90),
        'total_ht' => array('type' => 'double(24,8)', 'label' => 'TotalHT', 'enabled' => 1, 'visible' => -1, 'position' => 125, 'isameasure' => 1),
        'total_tva' => array('type' => 'double(24,8)', 'label' => 'VAT', 'enabled' => 1, 'visible' => -1, 'position' => 130, 'isameasure' => 1),
        'localtax1' => array('type' => 'double(24,8)', 'label' => 'LocalTax1', 'enabled' => 1, 'visible' => -1, 'position' => 135, 'isameasure' => 1),
        'localtax2' => array('type' => 'double(24,8)', 'label' => 'LocalTax2', 'enabled' => 1, 'visible' => -1, 'position' => 140, 'isameasure' => 1),
        'total_ttc' => array('type' => 'double(24,8)', 'label' => 'TotalTTC', 'enabled' => 1, 'visible' => -1, 'position' => 145, 'isameasure' => 1),
        'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'visible' => 0, 'position' => 105, 'searchall' => 1),
        'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'visible' => 0, 'position' => 110, 'searchall' => 1),
        'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 115),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'position' => 120),
        'extraparams' => array('type' => 'varchar(255)', 'label' => 'Extraparams', 'enabled' => 1, 'visible' => -1, 'position' => 125),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 135),
        'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'Last main doc', 'enabled' => 1, 'visible' => -1, 'position' => 140),
        'statut' => array('type' => 'smallint(6)', 'label' => 'Statut', 'enabled' => 1, 'visible' => -1, 'position' => 500, 'notnull' => 1, 'arrayofkeyval' => array(0 => 'Draft', 1 => 'Validated', 2 => 'Closed')),
    );
    // END MODULEBUILDER PROPERTIES
    /**
     *      Constructor
     *
     *      @param     DoliDB	$db      handler d'acces base de donnee
     */
    public function __construct($db)
    {
    }
    /**
     *  Load line order
     *
     *  @param  int		$rowid          Id line order
     *  @return	int						Return integer <0 if KO, >0 if OK
     */
    public function fetch($rowid)
    {
    }
    /**
     * 	Delete line in database
     *
     *	@param      User	$user        	User that modify
     *  @param      int		$notrigger	    0=launch triggers after, 1=disable triggers
     *	@return	 int  Return integer <0 si ko, >0 si ok
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Insert line into database. This also set $this->id.
     *
     *	@param      User	$user        	User that modify
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int						Return integer <0 if KO, >0 if OK
     */
    public function insert($user = \null, $notrigger = 0)
    {
    }
    /**
     *	Update the line object into db
     *
     *	@param      User	$user        	User that modify
     *	@param      int		$notrigger		1 = disable triggers
     *	@return		int		Return integer <0 si ko, >0 si ok
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Update DB line fields total_xxx
     *	Used by migration
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function update_total()
    {
    }
}