<?php

/**
 * Class for WebPortalPartnership
 */
class WebPortalPartnership extends \Partnership
{
    /**
     * @var string ID of module.
     */
    public $module = 'webportal';
    /**
     * Status list (short label)
     */
    const ARRAY_STATUS_LABEL = array(\Partnership::STATUS_DRAFT => 'Draft', \Partnership::STATUS_VALIDATED => 'Accepted', \Partnership::STATUS_APPROVED => 'Refused', \Partnership::STATUS_REFUSED => 'Suspended', \Partnership::STATUS_CANCELED => 'Terminated');
    /**
     * @var Partnership Partnership for static methods
     */
    protected $partnership_static = \null;
    /**
     *  'type' field format:
     *    'integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]',
     *    'select' (list of values are in 'options'),
     *    'varchar(x)',
     *    'text', 'html',
     *    'double(24,8)', 'price',
     *    'date', 'datetime',
     *    'checkbox', 'radio',
     *    'mail', 'phone', 'url', 'password'
     *        Note: Filter must be a Dolibarr Universal Filter syntax string. Example: "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.status:!=:0) or (t.nature:is:NULL)"
     *  'label' the translation key.
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalInt('MY_SETUP_PARAM') or 'isModEnabled("multicurrency")' ...)
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
     *  'help' and 'helplist' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set a list of values if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel"). Note that type can be 'integer' or 'varchar'
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *    'validate' is 1 if need to validate with $this->validateField()
     *  'copytoclipboard' is 1 or 2 to allow to add a picto to copy value into clipboard (1=picto after label, 2=picto after value)
     *  'showonheader' is 1 to show on the top of the card (header section)
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-5,5>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'visible' => 0, 'noteditable' => 1, 'index' => 1, 'css' => 'left', 'comment' => "Id"), 'ref' => array('type' => 'varchar(128)', 'label' => 'Ref', 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'visible' => 5, 'noteditable' => 1, 'default' => '(PROV)', 'index' => 1, 'searchall' => 1, 'showoncombobox' => 1, 'comment' => "Reference of object", 'showonheader' => 1), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'position' => 15, 'notnull' => 1, 'visible' => -2, 'default' => '1', 'index' => 1), 'fk_type' => array('type' => 'integer:PartnershipType:partnership/class/partnership_type.class.php:0:(active:=:1)', 'label' => 'Type', 'enabled' => 1, 'position' => 20, 'notnull' => 1, 'visible' => 5, 'csslist' => ''), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php:1:((status:=:1) AND (entity:IN:__SHARED_ENTITIES__))', 'label' => 'ThirdParty', 'picto' => 'company', 'enabled' => 1, 'position' => 50, 'notnull' => -1, 'visible' => 5, 'index' => 1, 'css' => '', 'csslist' => ''), 'note_public' => array('type' => 'html', 'label' => 'NotePublic', 'enabled' => 1, 'position' => 61, 'notnull' => 0, 'visible' => 0), 'note_private' => array('type' => 'html', 'label' => 'NotePrivate', 'enabled' => 1, 'position' => 62, 'notnull' => 0, 'visible' => 0), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'position' => 500, 'notnull' => 1, 'visible' => -2), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'position' => 501, 'notnull' => 0, 'visible' => -2), 'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'position' => 510, 'notnull' => 1, 'visible' => -2, 'foreignkey' => 'user.rowid'), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'position' => 511, 'notnull' => -1, 'visible' => -2), 'last_main_doc' => array('type' => 'varchar(255)', 'label' => 'LastMainDoc', 'enabled' => 1, 'position' => 600, 'notnull' => 0, 'visible' => 0), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'position' => 1000, 'notnull' => -1, 'visible' => -2), 'model_pdf' => array('type' => 'varchar(255)', 'label' => 'Model pdf', 'enabled' => 1, 'position' => 1010, 'notnull' => -1, 'visible' => 0), 'date_partnership_start' => array('type' => 'date', 'label' => 'DatePartnershipStart', 'enabled' => 1, 'position' => 52, 'notnull' => 1, 'visible' => 5), 'date_partnership_end' => array('type' => 'date', 'label' => 'DatePartnershipEnd', 'enabled' => 1, 'position' => 53, 'notnull' => 0, 'visible' => 5), 'url_to_check' => array('type' => 'varchar(255)', 'label' => 'UrlToCheck', 'enabled' => 1, 'position' => 70, 'notnull' => 0, 'visible' => -5), 'count_last_url_check_error' => array('type' => 'integer', 'label' => 'CountLastUrlCheckError', 'enabled' => 1, 'position' => 71, 'notnull' => 0, 'visible' => -2, 'default' => '0'), 'last_check_backlink' => array('type' => 'datetime', 'label' => 'LastCheckBacklink', 'enabled' => 1, 'position' => 72, 'notnull' => 0, 'visible' => -2), 'reason_decline_or_cancel' => array('type' => 'text', 'label' => 'ReasonDeclineOrCancel', 'enabled' => 1, 'position' => 73, 'notnull' => 0, 'visible' => -2), 'ip' => array('type' => 'varchar(250)', 'label' => 'Ip', 'enabled' => 1, 'position' => 74, 'notnull' => 0, 'visible' => -2), 'status' => array('type' => 'smallint', 'label' => 'Status', 'enabled' => 1, 'position' => 2000, 'notnull' => 1, 'visible' => 5, 'default' => '0', 'index' => 1, 'arrayofkeyval' => self::ARRAY_STATUS_LABEL, 'showonheader' => 1));
    //public $rowid;
    //public $ref;
    //public $entity;
    //public $fk_type;
    //public $fk_user_creat;
    //public $fk_user_modif;
    //public $last_main_doc;
    //public $import_key;
    //public $model_pdf;
    //public $date_partnership_start;
    //public $date_partnership_end;
    //public $url_to_check;
    //public $count_last_url_check_error;
    //public $last_check_backlink;
    //public $reason_decline_or_cancel;
    //public $fk_soc;
    //public $fk_member;
    //public $ip;
    //public $status;
    // END MODULEBUILDER PROPERTIES
    /**
     * Get partnership for static method
     *
     * @return	Partnership
     */
    protected function getPartnershipStatic()
    {
    }
    /**
     * Constructor
     *
     * @param	DoliDB	$db		Database handler
     */
    public function __construct(\DoliDB $db)
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
     *  Return a link to the object card (with optionally the picto)
     *
     * @param	int		$withpicto				Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     * @param	string	$option					On what the link point to ('nolink', ...)
     * @param	int		$notooltip				1=Disable tooltip
     * @param	string	$morecss				Add more css on link
     * @param	int		$save_lastsearch_value	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     * @return	string	String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *  Return the label of the status
     *
     * @param int $mode 0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @return    string                   Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     * @param int $status Id status
     * @param int $mode 0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     * @return string                   Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
}