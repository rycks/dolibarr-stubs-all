<?php

/**
 * Class to manage intracomm report
 */
class IntracommReport extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'intracommreport';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'intracommreport';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_intracommreport';
    /**
     * @var string 	String with name of icon for intracommreport. Must be a 'fa-xxx' fontawesome code (or 'fa-xxx_fa_color_size') or 'intracommreport@monmodule' if picto is file 'img/object_intracommreport.png'.
     */
    public $picto = 'intracommreport';
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
    const STATUS_CANCELED = 9;
    /**
     *  'type' field format:
     *  	'integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter[:Sortfield]]]',
     *  	'select' (list of values are in 'options'. for integer list of values are in 'arrayofkeyval'),
     *  	'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter[:CategoryIdType[:CategoryIdList[:SortField]]]]]]',
     *  	'chkbxlst:...',
     *  	'varchar(x)',
     *  	'text', 'text:none', 'html',
     *   	'double(24,8)', 'real', 'price', 'stock',
     *  	'date', 'datetime', 'timestamp', 'duration',
     *  	'boolean', 'checkbox', 'radio', 'array',
     *  	'mail', 'phone', 'url', 'password', 'ip'
     *		Note: Filter must be a Dolibarr Universal Filter syntax string. Example: "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.status:!=:0) or (t.nature:is:NULL)"
     *  'length' the length of field. Example: 255, '24,8'
     *  'label' the translation key.
     *  'alias' the alias used into some old hard coded SQL requests
     *  'picto' is code of a picto to show before value in forms
     *  'enabled' is a condition when the field must be managed (Example: 1 or 'getDolGlobalInt("MY_SETUP_PARAM")' or 'isModEnabled("multicurrency")' ...)
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
     *	'validate' is 1 if you need to validate the field with $this->validateField(). Need MAIN_ACTIVATE_VALIDATION_RESULT.
     *  'copytoclipboard' is 1 or 2 to allow to add a picto to copy value into clipboard (1=picto after label, 2=picto after value)
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-5,5>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>	Array of properties of field to show
     */
    public $fields = array("rowid" => array("type" => "integer", "label" => "TechnicalID", "enabled" => 1, 'position' => 10, 'notnull' => 1, "visible" => "0"), "ref" => array("type" => "varchar(30)", "label" => "Ref", "enabled" => 1, 'position' => 15, 'notnull' => 1, "visible" => 1, "csslist" => "tdoverflowmax150", "showoncombobox" => 1), "type_declaration" => array("type" => "varchar(32)", "label" => "TypeOfDeclaration", "enabled" => 1, 'position' => 25, 'notnull' => 0, "visible" => 1, 'arrayofkeyval' => array("deb" => "DEB", "des" => "DES")), "periods" => array("type" => "varchar(32)", "label" => "Periods", "enabled" => 1, 'position' => 30, 'notnull' => 0, "visible" => -1), "mode" => array("type" => "varchar(32)", "label" => "Mode", "enabled" => 1, 'position' => 35, 'notnull' => 0, "visible" => -1), "content_xml" => array("type" => "text", "label" => "Contentxml", "enabled" => 1, 'position' => 40, 'notnull' => 0, "visible" => -1), "type_export" => array("type" => "varchar(10)", "label" => "TypeOfExport", "enabled" => 1, 'position' => 45, 'notnull' => 0, "visible" => -1, 'arrayofkeyval' => array("in" => "Input", "out" => "Output")), "datec" => array("type" => "datetime", "label" => "DateCreation", "enabled" => 1, 'position' => 50, 'notnull' => 0, "visible" => -1), "tms" => array("type" => "timestamp", "label" => "DateModification", "enabled" => 1, 'position' => 55, 'notnull' => 1, "visible" => -1));
    /**
     * @var int
     */
    public $rowid;
    /**
     * @var string
     */
    public $ref;
    /**
     * @var string
     */
    public $type_declaration;
    /**
     * @var string
     */
    public $periods;
    /**
     * @var string
     */
    public $mode;
    /**
     * @var string
     */
    public $content_xml;
    /**
     * @var string
     */
    public $type_export;
    /**
     * @var int|string
     */
    public $datec;
    /**
     * @var int
     */
    public $tms;
    // END MODULEBUILDER PROPERTIES
    /**
     * @var string ref ???
     */
    public $label;
    /**
     * @var string
     */
    public $period;
    /**
     * @var string
     */
    public $declaration;
    /**
     * @var string declaration number
     */
    public $declaration_number;
    /**
     * @var string
     */
    public $numero_declaration;
    /**
     * DEB - Product
     */
    const TYPE_DEB = 0;
    /**
     * DES - Service
     */
    const TYPE_DES = 1;
    /**
     * Constructor
     *
     * @param DoliDB $db Database handle
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Function create
     *
     * @param 	User 	$user 		User
     * @param 	int 	$notrigger 	notrigger
     * @return 	int
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     * Function fetch
     *
     * @param 	int 	$id 			object ID
     * @param 	string 	$ref  			Ref
     * @param	int		$noextrafields	0=Default to load extrafields, 1=No extrafields
     * @param	int		$nolines		0=Default to load extrafields, 1=No extrafields
     * @return 	int     				Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null, $noextrafields = 0, $nolines = 0)
    {
    }
    /**
     * Function delete
     *
     * @param 	User 	$user 		User
     * @param 	int 	$notrigger 	notrigger
     * @return 	int
     */
    public function delete($user, $notrigger = 0)
    {
    }
    /**
     * Generate XML file
     *
     * @param string		$mode 				'O' for create, R for regenerate (Look always 0 meant toujours 0 within the framework of XML exchanges according to documentation)
     * @param string		$type 				Declaration type by default - introduction or expedition (always 'expedition' for Des)
     * @param string		$period_reference	Period of reference
     * @return string|false						Return a well-formed XML string based on SimpleXML element, false or 0 if error
     */
    public function getXML($mode = 'O', $type = 'introduction', $period_reference = '')
    {
    }
    /**
     * Generate XMLDes file
     *
     * @param int		$period_year		Year of declaration
     * @param int		$period_month		Month of declaration
     * @param string	$type_declaration	Declaration type by default - 'introduction' or 'expedition' (always 'expedition' for Des)
     * @return string|false					Return a well-formed XML string based on SimpleXML element, false or 0 if error
     */
    public function getXMLDes($period_year, $period_month, $type_declaration = 'expedition')
    {
    }
    /**
     *  Add line from invoice
     *
     *  @param	SimpleXMLElement	$declaration		Reference declaration
     *  @param	string				$type				Declaration type by default - 'introduction' or 'expedition' (always 'expedition' for Des)
     *  @param	int					$period_reference	Reference period
     *  @param	string				$exporttype	    	'deb' for DEB, 'des' for DES
     *  @return	int       			  					Return integer <0 if KO, >0 if OK
     */
    public function addItemsFact(&$declaration, $type, $period_reference, $exporttype = 'deb')
    {
    }
    /**
     *  Add invoice line
     *
     *  @param      string	$type				Declaration type by default - introduction or expedition (always 'expedition' for Des)
     *  @param      int		$period_reference	Reference declaration
     *  @param      string	$exporttype	    	deb=DEB, des=DES
     *  @return     string       			  	Return integer <0 if KO, >0 if OK
     */
    public function getSQLFactLines($type, $period_reference, $exporttype = 'deb')
    {
    }
    /**
     *	Add item for DEB
     *
     * 	@param	SimpleXMLElement	$declaration		Reference declaration
     * 	@param	stdClass			$res				Result of request SQL
     *  @param	int					$i					Line Id
     * 	@param	string				$code_douane_spe	Specific customs authorities code
     *  @return	void
     */
    public function addItemXMl(&$declaration, &$res, $i, $code_douane_spe = '')
    {
    }
    /**
     *	Add item for DES
     *
     * 	@param	SimpleXMLElement	$declaration		Reference declaration
     * 	@param	stdClass			$res				Result of request SQL
     *  @param	int					$i					Line Id
     *  @return	void
     */
    public function addItemXMlDes($declaration, &$res, $i)
    {
    }
    /**
     *	This function adds an item by retrieving the customs code of the product with the highest amount in the invoice
     *
     * 	@param	SimpleXMLElement	$declaration		Reference declaration
     * 	@param	Object[]			$TLinesFraisDePort	Data of shipping costs line
     *  @param	string	    		$type				Declaration type by default - introduction or expedition (always 'expedition' for Des)
     *  @param	Categorie			$categ_fraisdeport	category of shipping costs
     *  @param	int		    		$i					Line Id
     *  @return	void
     */
    public function addItemFraisDePort(&$declaration, &$TLinesFraisDePort, $type, &$categ_fraisdeport, $i)
    {
    }
    /**
     *	Return next reference of declaration not already used (or last reference)
     *
     *	@return    string					free ref or last ref
     */
    public function getNextDeclarationNumber()
    {
    }
    /**
     *	Verify declaration number. Positive integer of a maximum of 6 characters recommended by the documentation
     *
     *	@param     	string		$number		Number to verify / convert
     *	@return		string 				Number
     */
    public static function getDeclarationNumber($number)
    {
    }
    /**
     *	Generate XML file
     *
     *  @param		string		$content_xml	Content
     *	@return		void
     */
    public function generateXMLFile($content_xml)
    {
    }
    /**
     *  Return a link to the object card (with optionally the picto)
     *
     *  @param  int     $withpicto                  Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *  @param  string  $option                     On what the link point to ('nolink', ...)
     *  @param  int     $notooltip                  1=Disable tooltip
     *  @param  string  $morecss                    Add more css on link
     *  @param  int     $save_lastsearch_value      -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *  @return	string                              String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = -1)
    {
    }
    /**
     *	Return a thumb for kanban views
     *
     *	@param      string	    			$option                 Where point the link (0=> main card, 1,2 => shipment, 'nolink'=>No link)
     *  @param		array{string,mixed}		$arraydata				Array of data
     *  @return		string											HTML Code for Kanban thumb.
     */
    public function getKanbanView($option = '', $arraydata = \null)
    {
    }
}