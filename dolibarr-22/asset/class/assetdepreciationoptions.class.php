<?php

/**
 * Class for AssetDepreciationOptions
 */
class AssetDepreciationOptions extends \CommonObject
{
    /**
     * @var string Name of table without prefix where object is stored. This is also the key used for extrafields management.
     */
    public $table_element = '';
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter[:Sortfield]]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalString("MY_SETUP_PARAM")'
     *  'position' is the sort order of field.
     *  'notnull' is set to 1 if not null in database. Set to -1 if we must set data to null if empty ('' or 0).
     *  'visible' says if field is visible in list (Examples: 0=Not visible, 1=Visible on list and create/update/view forms, 2=Visible on list only, 3=Visible on create/update/view form only (not list), 4=Visible on list and update/view form only (not create). 5=Visible on list and view only (not create/not update). Using a negative value means field is not shown by default on list but can be selected for viewing)
     *  'noteditable' says if field is not editable (1 or 0)
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
     *  'enabled_field' if the mode block or a field is enabled if another field equal a value (="mode_key:field_key:value")
     *  'only_on_asset' is 1 if only a field on a asset
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,6>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array();
    /**
     * @var array<string,array{label:string,table:string,fields:array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-2,5>|string,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,2>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,comment?:string,validate?:int<0,1>}>}>
     *  Note : economic mode is mandatory and is the primary option
     */
    public $deprecation_options_fields = array('economic' => array('label' => 'AssetDepreciationOptionEconomic', 'table' => 'asset_depreciation_options_economic', 'fields' => array('depreciation_type' => array('type' => 'smallint', 'label' => 'AssetDepreciationOptionDepreciationType', 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'visible' => 1, 'default' => '0', 'arrayofkeyval' => array(0 => 'AssetDepreciationOptionDepreciationTypeLinear', 1 => 'AssetDepreciationOptionDepreciationTypeDegressive', 2 => 'AssetDepreciationOptionDepreciationTypeExceptional'), 'validate' => 1), 'degressive_coefficient' => array('type' => 'double(24,8)', 'label' => 'AssetDepreciationOptionDegressiveRate', 'enabled' => 1, 'position' => 20, 'notnull' => 1, 'visible' => 1, 'default' => '0', 'isameasure' => 1, 'validate' => 1, 'enabled_field' => 'economic:depreciation_type:1'), 'duration' => array('type' => 'integer', 'label' => 'AssetDepreciationOptionDuration', 'enabled' => 1, 'position' => 30, 'notnull' => 1, 'visible' => 1, 'default' => '0', 'isameasure' => 1, 'validate' => 1), 'duration_type' => array('type' => 'smallint', 'label' => 'AssetDepreciationOptionDurationType', 'enabled' => 1, 'position' => 40, 'notnull' => 1, 'visible' => 1, 'default' => '0', 'arrayofkeyval' => array(0 => 'AssetDepreciationOptionDurationTypeAnnual', 1 => 'AssetDepreciationOptionDurationTypeMonthly'), 'validate' => 1), 'rate' => array('type' => 'double(24,8)', 'label' => 'AssetDepreciationOptionRate', 'enabled' => 1, 'position' => 50, 'visible' => 3, 'default' => '0', 'isameasure' => 1, 'validate' => 1, 'computed' => '$object->asset_depreciation_options->getRate("economic")'), 'accelerated_depreciation_option' => array('type' => 'boolean', 'label' => 'AssetDepreciationOptionAcceleratedDepreciation', 'enabled' => 1, 'position' => 60, 'column_break' => \true, 'notnull' => 0, 'default' => '0', 'visible' => 1, 'validate' => 1), 'amount_base_depreciation_ht' => array('type' => 'price', 'label' => 'AssetDepreciationOptionAmountBaseDepreciationHT', 'enabled' => 'isset($object) && get_class($object)=="Asset"', 'only_on_asset' => 1, 'position' => 90, 'notnull' => 0, 'required' => 1, 'visible' => 1, 'default' => '$object->reversal_amount_ht > 0 ? $object->reversal_amount_ht : $object->acquisition_value_ht', 'isameasure' => 1, 'validate' => 1), 'amount_base_deductible_ht' => array('type' => 'price', 'label' => 'AssetDepreciationOptionAmountBaseDeductibleHT', 'enabled' => 'isset($object) && get_class($object)=="Asset"', 'only_on_asset' => 1, 'position' => 100, 'notnull' => 0, 'visible' => 1, 'default' => '0', 'isameasure' => 1, 'validate' => 1), 'total_amount_last_depreciation_ht' => array('type' => 'price', 'label' => 'AssetDepreciationOptionTotalAmountLastDepreciationHT', 'enabled' => 'isset($object) && get_class($object)=="Asset"', 'only_on_asset' => 1, 'position' => 110, 'noteditable' => 1, 'notnull' => 0, 'visible' => 1, 'default' => '0', 'isameasure' => 1, 'validate' => 1))), 'accelerated_depreciation' => array('label' => 'AssetDepreciationOptionAcceleratedDepreciation', 'table' => 'asset_depreciation_options_fiscal', 'enabled_field' => 'economic:accelerated_depreciation_option:1', 'fields' => array('depreciation_type' => array('type' => 'smallint', 'label' => 'AssetDepreciationOptionDepreciationType', 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'visible' => 1, 'default' => '0', 'arrayofkeyval' => array(0 => 'AssetDepreciationOptionDepreciationTypeLinear', 1 => 'AssetDepreciationOptionDepreciationTypeDegressive', 2 => 'AssetDepreciationOptionDepreciationTypeExceptional'), 'validate' => 1), 'degressive_coefficient' => array('type' => 'double(24,8)', 'label' => 'AssetDepreciationOptionDegressiveRate', 'enabled' => 1, 'position' => 20, 'notnull' => 1, 'visible' => 1, 'default' => '0', 'isameasure' => 1, 'validate' => 1, 'enabled_field' => 'accelerated_depreciation:depreciation_type:1'), 'duration' => array('type' => 'integer', 'label' => 'AssetDepreciationOptionDuration', 'enabled' => 1, 'position' => 30, 'notnull' => 1, 'visible' => 1, 'default' => '0', 'isameasure' => 1, 'validate' => 1), 'duration_type' => array('type' => 'smallint', 'label' => 'AssetDepreciationOptionDurationType', 'enabled' => 1, 'position' => 40, 'notnull' => 1, 'visible' => 1, 'default' => '0', 'arrayofkeyval' => array(0 => 'AssetDepreciationOptionDurationTypeAnnual', 1 => 'AssetDepreciationOptionDurationTypeMonthly'), 'validate' => 1), 'rate' => array('type' => 'double(24,8)', 'label' => 'AssetDepreciationOptionRate', 'enabled' => 1, 'position' => 50, 'visible' => 3, 'default' => '0', 'isameasure' => 1, 'validate' => 1, 'computed' => '$object->asset_depreciation_options->getRate("accelerated_depreciation")'), 'amount_base_depreciation_ht' => array('type' => 'price', 'label' => 'AssetDepreciationOptionAmountBaseDepreciationHT', 'enabled' => 'isset($object) && get_class($object)=="Asset"', 'only_on_asset' => 1, 'position' => 80, 'column_break' => \true, 'notnull' => 0, 'required' => 1, 'visible' => 1, 'default' => '$object->reversal_amount_ht > 0 ? $object->reversal_amount_ht : $object->acquisition_value_ht', 'isameasure' => 1, 'validate' => 1), 'amount_base_deductible_ht' => array('type' => 'price', 'label' => 'AssetDepreciationOptionAmountBaseDeductibleHT', 'enabled' => 'isset($object) && get_class($object)=="Asset"', 'only_on_asset' => 1, 'position' => 90, 'notnull' => 0, 'visible' => 1, 'default' => '0', 'isameasure' => 1, 'validate' => 1), 'total_amount_last_depreciation_ht' => array('type' => 'price', 'label' => 'AssetDepreciationOptionTotalAmountLastDepreciationHT', 'enabled' => 'isset($object) && get_class($object)=="Asset"', 'only_on_asset' => 1, 'position' => 100, 'noteditable' => 1, 'notnull' => 0, 'visible' => 1, 'default' => '0', 'isameasure' => 1, 'validate' => 1))));
    /**
     * @var int		ID parent asset
     */
    public $fk_asset;
    /**
     * @var int
     */
    public $fk_asset_model;
    /**
     * @var int
     */
    public $fk_user_modif;
    /**
     * @var array<string,array<string,null|int|float|string>>  Array with all deprecation options by mode.
     */
    public $deprecation_options = array();
    /**
     * @var int
     */
    public $depreciation_type;
    /**
     * @var float
     */
    public $degressive_coefficient;
    /**
     * @var int
     */
    public $duration;
    /**
     * @var int
     */
    public $duration_type;
    /**
     * @var int<0,1>
     */
    public $accelerated_depreciation_option;
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     *  Set object infos for a mode
     *
     * @param	string		$mode			Depreciation mode (economic, accelerated_depreciation, ...)
     * @param	int<0,1>	$class_type		Type (0:asset, 1:asset model)
     * @param	bool		$all_field		Get all fields
     * @return	int							Return integer <0 if KO, >0 if OK
     */
    public function setInfosForMode($mode, $class_type = 0, $all_field = \false)
    {
    }
    /**
     *  Fill deprecation_options property of object (using for data sent by forms)
     *
     * @param	int<0,1>			$class_type	Type (0:asset, 1:asset model)
     * @return	int<-1,-1>|int<1,1>				Return integer <0 if KO, >0 if OK
     */
    public function setDeprecationOptionsFromPost($class_type = 0)
    {
    }
    /**
     *  Load deprecation options of a asset or a asset model
     *
     * @param	int		$asset_id			Asset ID to set
     * @param	int		$asset_model_id		Asset model ID to set
     * @return	int							Return integer <0 if KO, >0 if OK
     */
    public function fetchDeprecationOptions($asset_id = 0, $asset_model_id = 0)
    {
    }
    /**
     *  get general depreciation info for a mode (used in depreciation card)
     *
     * @param	string			$mode		Depreciation mode (economic, accelerated_depreciation, ...)
     * @return array{base_depreciation_ht:string,duration:string,duration_type:string,rate:string}|int<-1,-1>		Return integer <0 if KO otherwise array with general depreciation info
     */
    public function getGeneralDepreciationInfoForMode($mode)
    {
    }
    /**
     *	Update deprecation options of a asset or a asset model
     *
     * @param	User	$user				User making update
     * @param	int		$asset_id			Asset ID to set
     * @param	int		$asset_model_id		Asset model ID to set
     * @param	int		$notrigger			1=disable trigger UPDATE (when called by create)
     * @return	int							Return integer <0 if KO, >0 if OK
     */
    public function updateDeprecationOptions($user, $asset_id = 0, $asset_model_id = 0, $notrigger = 0)
    {
    }
    /**
     *  Get rate
     *
     * @param	string			$mode		Depreciation mode (economic, accelerated_depreciation, ...)
     * @return	string						Rate of the provided mode option
     */
    public function getRate($mode)
    {
    }
}