<?php

/**
 * Class for Asset
 */
class Asset extends \CommonObject
{
    /**
     * @var string ID of module.
     */
    public $module = 'asset';
    /**
     * @var string ID to identify managed object.
     */
    public $element = 'asset';
    /**
     * @var string Name of table without prefix where object is stored. This is also the key used for extrafields management.
     */
    public $table_element = 'asset';
    /**
     * @var int  Does this object support multicompany module ?
     * 0=No test on entity, 1=Test with field entity, 'field@table'=Test with link by field@table
     */
    public $ismultientitymanaged = 1;
    /**
     * @var int  Does object support extrafields ? 0=No, 1=Yes
     */
    public $isextrafieldmanaged = 1;
    /**
     * @var string String with name of icon for asset. Must be the part after the 'object_' into object_asset.png
     */
    public $picto = 'asset';
    const STATUS_DRAFT = 0;
    // In progress
    const STATUS_DISPOSED = 9;
    // Disposed
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter[:Sortfield]]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or '$conf->global->MY_SETUP_PARAM)
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
     *  'default' is a default value for creation (can still be overwrote by the Setup of Default Values if field is editable in creation form). Note: If default is set to '(PROV)' and field is 'ref', the default value will be set to '(PROVid)' where id is rowid when a new record is created.
     *  'index' if we want an index in database.
     *  'foreignkey'=>'tablename.field' if the field is a foreign key (it is recommanded to name the field fk_...).
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
    /**
     * @var array  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => '1', 'position' => 1, 'notnull' => 1, 'visible' => 0, 'noteditable' => '1', 'index' => 1, 'css' => 'left', 'comment' => "Id"), 'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => '1', 'position' => 20, 'notnull' => 1, 'visible' => 1, 'noteditable' => '0', 'index' => 1, 'searchall' => 1, 'showoncombobox' => '1', 'validate' => '1', 'comment' => "Reference of object"), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => '1', 'position' => 30, 'notnull' => 1, 'visible' => 1, 'searchall' => 1, 'css' => 'minwidth300', 'cssview' => 'wordbreak', 'showoncombobox' => '2', 'validate' => '1'), 'fk_asset_model' => array('type' => 'integer:AssetModel:asset/class/assetmodel.class.php:1:((status:=:1) and (entity:IN:__SHARED_ENTITIES__))', 'label' => 'AssetModel', 'enabled' => '1', 'position' => 40, 'notnull' => 0, 'visible' => 1, 'index' => 1, 'validate' => '1'), 'qty' => array('type' => 'real', 'label' => 'Qty', 'enabled' => '1', 'position' => 50, 'notnull' => 1, 'visible' => 0, 'default' => '1', 'isameasure' => '1', 'css' => 'maxwidth75imp', 'validate' => '1'), 'acquisition_type' => array('type' => 'smallint', 'label' => 'AssetAcquisitionType', 'enabled' => '1', 'position' => 60, 'notnull' => 1, 'visible' => 1, 'arrayofkeyval' => array('0' => 'AssetAcquisitionTypeNew', '1' => 'AssetAcquisitionTypeOccasion'), 'validate' => '1'), 'asset_type' => array('type' => 'smallint', 'label' => 'AssetType', 'enabled' => '1', 'position' => 70, 'notnull' => 1, 'visible' => 1, 'arrayofkeyval' => array('0' => 'AssetTypeIntangible', '1' => 'AssetTypeTangible', '2' => 'AssetTypeInProgress', '3' => 'AssetTypeFinancial'), 'validate' => '1'), 'not_depreciated' => array('type' => 'boolean', 'label' => 'AssetNotDepreciated', 'enabled' => '1', 'position' => 80, 'notnull' => 0, 'default' => '0', 'visible' => 1, 'validate' => '1'), 'date_acquisition' => array('type' => 'date', 'label' => 'AssetDateAcquisition', 'enabled' => '1', 'position' => 90, 'notnull' => 1, 'visible' => 1), 'date_start' => array('type' => 'date', 'label' => 'AssetDateStart', 'enabled' => '1', 'position' => 100, 'notnull' => 0, 'visible' => -1), 'acquisition_value_ht' => array('type' => 'price', 'label' => 'AssetAcquisitionValueHT', 'enabled' => '1', 'position' => 110, 'notnull' => 1, 'visible' => 1, 'isameasure' => '1', 'validate' => '1'), 'recovered_vat' => array('type' => 'price', 'label' => 'AssetRecoveredVAT', 'enabled' => '1', 'position' => 120, 'notnull' => 0, 'visible' => 1, 'isameasure' => '1', 'validate' => '1'), 'reversal_date' => array('type' => 'date', 'label' => 'AssetReversalDate', 'enabled' => '1', 'position' => 130, 'notnull' => 0, 'visible' => 1), 'reversal_amount_ht' => array('type' => 'price', 'label' => 'AssetReversalAmountHT', 'enabled' => '1', 'position' => 140, 'notnull' => 0, 'visible' => 1, 'isameasure' => '1', 'validate' => '1'), 'disposal_date' => array('type' => 'date', 'label' => 'AssetDisposalDate', 'enabled' => '1', 'position' => 200, 'notnull' => 0, 'visible' => -2), 'disposal_amount_ht' => array('type' => 'price', 'label' => 'AssetDisposalAmount', 'enabled' => '1', 'position' => 210, 'notnull' => 0, 'visible' => -2, 'default' => '0', 'isameasure' => '1', 'validate' => '1'), 'fk_disposal_type' => array('type' => 'sellist:c_asset_disposal_type:label:rowid::active=1', 'label' => 'AssetDisposalType', 'enabled' => '1', 'position' => 220, 'notnull' => 0, 'visible' => -2, 'index' => 1, 'validate' => '1'), 'disposal_depreciated' => array('type' => 'boolean', 'label' => 'AssetDisposalDepreciated', 'enabled' => '1', 'position' => 230, 'notnull' => 0, 'default' => '0', 'visible' => -2, 'validate' => '1'), 'disposal_subject_to_vat' => array('type' => 'boolean', 'label' => 'AssetDisposalSubjectToVat', 'enabled' => '1', 'position' => 240, 'notnull' => 0, 'default' => '0', 'visible' => -2, 'validate' => '1'), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => '1', 'position' => 300, 'notnull' => 0, 'visible' => 0, 'validate' => '1'), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => '1', 'position' => 301, 'notnull' => 0, 'visible' => 0, 'validate' => '1'), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => '1', 'position' => 500, 'notnull' => 1, 'visible' => -2), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => '1', 'position' => 501, 'notnull' => 0, 'visible' => -2), 'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => '1', 'position' => 510, 'notnull' => 1, 'visible' => -2, 'foreignkey' => 'user.rowid'), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => '1', 'position' => 511, 'notnull' => -1, 'visible' => -2), 'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'LastMainDoc', 'enabled' => '1', 'position' => 600, 'notnull' => 0, 'visible' => 0), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => '1', 'position' => 1000, 'notnull' => -1, 'visible' => -2), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => '1', 'position' => 1010, 'notnull' => -1, 'visible' => 0), 'status' => array('type' => 'smallint', 'label' => 'Status', 'enabled' => '1', 'position' => 1000, 'notnull' => 1, 'default' => '0', 'visible' => 2, 'index' => 1, 'arrayofkeyval' => array('0' => 'Draft', '1' => 'Validated', '9' => 'Canceled'), 'validate' => '1'));
    public $rowid;
    public $ref;
    public $label;
    public $fk_asset_model;
    public $reversal_amount_ht;
    public $acquisition_value_ht;
    public $recovered_vat;
    public $reversal_date;
    public $date_acquisition;
    public $date_start;
    public $qty;
    public $acquisition_type;
    public $asset_type;
    public $not_depreciated;
    public $disposal_date;
    public $disposal_amount_ht;
    public $fk_disposal_type;
    public $disposal_depreciated;
    public $disposal_subject_to_vat;
    public $supplier_invoice_id;
    public $note_public;
    public $note_private;
    public $date_creation;
    public $tms;
    public $fk_user_creat;
    public $fk_user_modif;
    public $last_main_doc;
    public $import_key;
    public $model_pdf;
    public $status;
    public $user_cloture_id;
    /**
     * @var Asset object oldcopy
     */
    public $oldcopy;
    /**
     * @var AssetDepreciationOptions	Used for computed fields of depreciation options class.
     */
    public $asset_depreciation_options;
    /**
     * @var array	List of depreciation lines for each mode (sort by depreciation date).
     */
    public $depreciation_lines = array();
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
     * @return int             <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
    {
    }
    /**
     * Clone an object into another one
     *
     * @param  	User 	$user      	User that creates
     * @param  	int 	$fromid     Id of object to clone
     * @return 	mixed 				New object created, <0 if KO
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param int    $id   Id object
     * @param string $ref  Ref
     * @return int         <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Load object lines in memory from the database
     *
     * @return int         <0 if KO, 0 if not found, >0 if OK
     */
    public function fetchLines()
    {
    }
    /**
     * Load list of objects in memory from the database.
     *
     * @param  string      $sortorder    Sort Order
     * @param  string      $sortfield    Sort field
     * @param  int         $limit        limit
     * @param  int         $offset       Offset
     * @param  array       $filter       Filter array. Example array('field'=>'valueforlike', 'customurl'=>...)
     * @param  string      $filtermode   Filter mode (AND or OR)
     * @return array|int                 int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user       User that deletes
     * @param bool $notrigger  false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     * Set asset model
     *
     * @param  User $user      User that creates
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     * @return int             <0 if KO, Id of created object if OK
     */
    public function setDataFromAssetModel(\User $user, $notrigger = \false)
    {
    }
    /**
     * Fetch depreciation lines for each mode in $this->depreciation_lines (sort by depreciation date)
     *
     * @return	int							<0 if KO, Id of created object if OK
     */
    public function fetchDepreciationLines()
    {
    }
    /**
     * If has depreciation lines in bookkeeping
     *
     * @return	int			<0 if KO, 0 if NO, 1 if Yes
     */
    public function hasDepreciationLinesInBookkeeping()
    {
    }
    /**
     * Add depreciation line for a mode
     *
     * @param	string		$mode							Depreciation mode (economic, accelerated_depreciation, ...)
     * @param	string		$ref							Ref line
     * @param	int			$depreciation_date				Depreciation date
     * @param	double		$depreciation_ht				Depreciation amount HT
     * @param	double		$cumulative_depreciation_ht		Depreciation cumulative amount HT
     * @param	string		$accountancy_code_debit			Accountancy code Debit
     * @param	string		$accountancy_code_credit		Accountancy code Credit
     * @return	int											<0 if KO, Id of created line if OK
     */
    public function addDepreciationLine($mode, $ref, $depreciation_date, $depreciation_ht, $cumulative_depreciation_ht, $accountancy_code_debit, $accountancy_code_credit)
    {
    }
    /**
     * Calculation depreciation lines (reversal and future) for each mode
     *
     * @return	int							<0 if KO, Id of created object if OK
     */
    public function calculationDepreciation()
    {
    }
    /**
     * Set last cumulative depreciation for each mode
     *
     * @param	int		$asset_depreciation_id		Asset depreciation line ID
     * @return	int									<0 if KO, >0 if OK
     */
    public function setLastCumulativeDepreciation($asset_depreciation_id)
    {
    }
    /**
     *	Set dispose status
     *
     *	@param	User	$user						Object user that dispose
     *	@param	int		$disposal_invoice_id		Disposal invoice ID
     *  @param	int		$notrigger					1=Does not execute triggers, 0=Execute triggers
     *	@return	int									<0 if KO, 0=Nothing done, >0 if OK
     */
    public function dispose($user, $disposal_invoice_id, $notrigger = 0)
    {
    }
    /**
     *	Set back to validated status
     *
     *	@param	User	$user			Object user that modify
     *  @param	int		$notrigger		1=Does not execute triggers, 0=Execute triggers
     *	@return	int						<0 if KO, 0=Nothing done, >0 if OK
     */
    public function reopen($user, $notrigger = 0)
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     * @param	int     $withpicto                  Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     * @param	string  $option                     On what the link point to ('nolink', ...)
     * @param	int		$maxlen			          	Max length of name
     * @param	int     $notooltip                  1=Disable tooltip
     * @param	string  $morecss                    Add more css on link
     * @param	int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     * @return	string                              String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $maxlen = 0, $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLabelStatus($mode = 0)
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
     *	Load the info information in the object
     *
     *	@param  int		$id       Id of object
     *	@return	void
     */
    public function info($id)
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
     * 	Create an array of lines
     *
     * 	@return array|int		array of lines if OK, <0 if KO
     */
    public function getLinesArray()
    {
    }
    /**
     *  Returns the reference to the following non used object depending on the active numbering module.
     *
     *  @return string      		Object free reference
     */
    public function getNextNumRef()
    {
    }
    /**
     *  Create a document onto disk according to template module.
     *
     *  @param	    string		$modele			Force template to use ('' to not force)
     *  @param		Translate	$outputlangs	objet lang a utiliser pour traduction
     *  @param      int			$hidedetails    Hide details of lines
     *  @param      int			$hidedesc       Hide description
     *  @param      int			$hideref        Hide ref
     *  @param      null|array  $moreparams     Array to provide more information
     *  @return     int         				0 if KO, 1 if OK
     */
    //  public function generateDocument($modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = null)
    //  {
    //      global $conf, $langs;
    //
    //      $result = 0;
    //      $includedocgeneration = 1;
    //
    //      $langs->load("asset@asset");
    //
    //      if (!dol_strlen($modele)) {
    //          $modele = 'standard_asset';
    //
    //          if (!empty($this->model_pdf)) {
    //              $modele = $this->model_pdf;
    //          } elseif (!empty($conf->global->ASSET_ADDON_PDF)) {
    //              $modele = $conf->global->ASSET_ADDON_PDF;
    //          }
    //      }
    //
    //      $modelpath = "core/modules/asset/doc/";
    //
    //      if ($includedocgeneration && !empty($modele)) {
    //          $result = $this->commonGenerateDocument($modelpath, $modele, $outputlangs, $hidedetails, $hidedesc, $hideref, $moreparams);
    //      }
    //
    //      return $result;
    //  }
}