<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class with list of lots and properties
 */
class Productlot extends \CommonObject
{
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'productlot';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'product_lot';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'lot';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    public $stats_propale;
    public $stats_commande;
    public $stats_contrat;
    public $stats_facture;
    public $stats_commande_fournisseur;
    public $stats_expedition;
    public $stats_reception;
    public $stats_mo;
    public $stats_bom;
    public $stats_mrptoconsume;
    public $stats_mrptoproduce;
    public $stats_facturerec;
    public $stats_facture_fournisseur;
    /**
     *  'type' if the field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'enabled' is a condition when the field must be managed (Example: 1 or '$conf->global->MY_SETUP_PARAM)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
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
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'noteditable' => 1, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id', 'css' => 'left'),
        'fk_product' => array('type' => 'integer:Product:product/class/product.class.php', 'label' => 'Product', 'enabled' => 1, 'visible' => 1, 'position' => 5, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'picto' => 'product', 'css' => 'maxwidth500 widthcentpercentminusxx', 'csslist' => 'maxwidth150'),
        'batch' => array('type' => 'varchar(30)', 'label' => 'Batch', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'showoncombobox' => 1, 'index' => 1, 'position' => 10, 'comment' => 'Batch', 'searchall' => 1, 'picto' => 'lot'),
        'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'default' => 1, 'notnull' => 1, 'index' => 1, 'position' => 20),
        'sellby' => array('type' => 'date', 'label' => 'SellByDate', 'enabled' => 'empty($conf->global->PRODUCT_DISABLE_SELLBY)?1:0', 'visible' => 5, 'position' => 60),
        'eol_date' => array('type' => 'date', 'label' => 'EndOfLife', 'enabled' => 'empty($conf->global->PRODUCT_ENABLE_TRACEABILITY)?0:1', 'visible' => 5, 'position' => 70),
        'manufacturing_date' => array('type' => 'date', 'label' => 'ManufacturingDate', 'enabled' => 'empty($conf->global->PRODUCT_ENABLE_TRACEABILITY)?0:1', 'visible' => 5, 'position' => 80),
        'scrapping_date' => array('type' => 'date', 'label' => 'DestructionDate', 'enabled' => 'empty($conf->global->PRODUCT_ENABLE_TRACEABILITY)?0:1', 'visible' => 5, 'position' => 90),
        //'commissionning_date'        => array('type'=>'date', 'label'=>'FirstUseDate', 'enabled'=>'empty($conf->global->PRODUCT_ENABLE_TRACEABILITY)?0:1', 'visible'=>5, 'position'=>100),
        //'qc_frequency'        => array('type'=>'varchar(6)', 'label'=>'QCFrequency', 'enabled'=>'empty($conf->global->PRODUCT_ENABLE_QUALITYCONTROL)?1:0', 'visible'=>5, 'position'=>110),
        'eatby' => array('type' => 'date', 'label' => 'EatByDate', 'enabled' => 'empty($conf->global->PRODUCT_DISABLE_EATBY)?1:0', 'visible' => 5, 'position' => 62),
        'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'visible' => 0, 'position' => 215),
        'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'LastMainDoc', 'enabled' => 1, 'visible' => -2, 'position' => 310),
        'datec' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 500),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 501),
        'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'position' => 510, 'foreignkey' => 'llx_user.rowid'),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'position' => 511),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -2, 'notnull' => -1, 'index' => 0, 'position' => 1000),
    );
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var int Product ID
     */
    public $fk_product;
    /**
     * @var string batch ref
     */
    public $batch;
    public $eatby = '';
    public $sellby = '';
    public $eol_date = '';
    public $manufacturing_date = '';
    public $scrapping_date = '';
    //public $commissionning_date = '';
    //public $qc_frequency = '';
    public $datec = '';
    public $tms = '';
    /**
     * @var int user ID
     */
    public $fk_user_creat;
    /**
     * @var int user ID
     */
    public $fk_user_modif;
    /**
     * @var string import key
     */
    public $import_key;
    /**
     * Constructor
     *
     * @param DoliDb $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User $user      User that creates
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     *
     * @return int <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id  			Id of lot/batch
     * @param int    $product_id  	Id of product, batch number parameter required
     * @param string $batch 		batch number
     *
     * @return int <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id = 0, $product_id = 0, $batch = '')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     *
     * @return int <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user      User that deletes
     * @param bool $notrigger false=launch triggers after, true=disable triggers
     *
     * @return int <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User	$user		User making the clone
     * @param   int     $fromid     Id of object to clone
     * @return  int                 New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     *  Charge tableau des stats expedition pour le lot/numéro de série
     *
     * @param  int $socid Id societe
     * @return int                     Array of stats in $this->stats_expedition, <0 if ko or >0 if ok
     */
    public function loadStatsExpedition($socid = 0)
    {
    }
    /**
     *  Charge tableau des stats commande fournisseur pour le lot/numéro de série
     *
     * @param  int $socid Id societe
     * @return int                     Array of stats in $this->stats_expedition, <0 if ko or >0 if ok
     */
    public function loadStatsSupplierOrder($socid = 0)
    {
    }
    /**
     *  Charge tableau des stats expedition pour le lot/numéro de série
     *
     * @param  int $socid Id societe
     * @return int                     Array of stats in $this->stats_expedition, <0 if ko or >0 if ok
     */
    public function loadStatsReception($socid = 0)
    {
    }
    /**
     *  Charge tableau des stats expedition pour le lot/numéro de série
     *
     * @param  int $socid Id societe
     * @return int                     Array of stats in $this->stats_expedition, <0 if ko or >0 if ok
     */
    public function loadStatsMo($socid = 0)
    {
    }
    /**
     *	Return label of status of object
     *
     *	@param      int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *	@return     string      		Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Return label of a given status
     *
     *	@param	int		$status     Status
     *	@param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *	@return string      		Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     * getTooltipContentArray
     *
     * @param 	array 	$params 	Params to construct tooltip data
     * @since 	v18
     * @return 	array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *  Return a link to the a lot card (with optionaly the picto)
     * 	Use this->id,this->lastname, this->firstname
     *
     *	@param	int		$withpicto				Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option					On what the link point to
     *  @param	integer	$notooltip				1=Disable tooltip
     *  @param	int		$maxlen					Max length of visible user name
     *  @param  string  $morecss            	Add more css on link
     *  @param  int     $save_lastsearch_value	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return	string							String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $maxlen = 24, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return void
     */
    public function initAsSpecimen()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     * @param  string    $modele      Force model to use ('' to not force)
     * @param  Translate $outputlangs Object langs to use for output
     * @param  int       $hidedetails Hide details of lines
     * @param  int       $hidedesc    Hide description
     * @param  int       $hideref     Hide ref
     * @return int                         0 if KO, 1 if OK
     */
    public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
}