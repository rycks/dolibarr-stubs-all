<?php

/**
 * Class ProductAttributeValue
 * Used to represent a product attribute value
 */
class ProductAttributeValue extends \CommonObjectLine
{
    /**
     * @var string ID of module.
     */
    public $module = 'variants';
    /**
     * @var string ID to identify managed object.
     */
    public $element = 'productattributevalue';
    /**
     * @var string Name of table without prefix where object is stored. This is also the key used for extrafields management.
     */
    public $table_element = 'product_attribute_value';
    /**
     *  'type' field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'sellist:TableName:LabelFieldName[:KeyFieldName[:KeyFieldParent[:Filter]]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'text:none', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
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
     *  'isameasure' must be set to 1 if you want to have a total on list for this field. Field type must be summable like integer or double(24,8).
     *  'css' and 'cssview' and 'csslist' is the CSS style to use on field. 'css' is used in creation and update. 'cssview' is used in view mode. 'csslist' is used for columns in lists. For example: 'maxwidth200', 'wordbreak', 'tdoverflowmax200'
     *  'help' is a 'TranslationString' to use to show a tooltip on field. You can also use 'TranslationString:keyfortooltiponlick' for a tooltip on click.
     *  'showoncombobox' if value of the field must be visible into the label of the combobox that list record
     *  'disabled' is 1 if we want to have the field locked by a 'disabled' attribute. In most cases, this is never set into the definition of $fields into class, but is set dynamically by some part of code.
     *  'arrayofkeyval' to set list of value if type is a list of predefined values. For example: array("0"=>"Draft","1"=>"Active","-1"=>"Cancel")
     *  'autofocusoncreate' to have field having the focus on a create form. Only 1 field should have this property set to 1.
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'visible' => 0, 'noteditable' => 1, 'index' => 1, 'css' => 'left', 'comment' => "Id"), 'fk_product_attribute' => array('type' => 'integer:ProductAttribute:variants/class/ProductAttribute.class.php', 'label' => 'ProductAttribute', 'enabled' => 1, 'visible' => 0, 'position' => 10, 'notnull' => 1, 'index' => 1), 'ref' => array('type' => 'varchar(255)', 'label' => 'Ref', 'visible' => 1, 'enabled' => 1, 'position' => 20, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'comment' => "Reference of object", 'css' => ''), 'value' => array('type' => 'varchar(255)', 'label' => 'Value', 'enabled' => 1, 'position' => 30, 'notnull' => 1, 'visible' => 1, 'searchall' => 1, 'css' => 'minwidth300', 'help' => "", 'showoncombobox' => 1), 'position' => array('type' => 'integer', 'label' => 'Rank', 'enabled' => 1, 'visible' => 0, 'default' => '0', 'position' => 200, 'notnull' => 1));
    /**
     * ID of the ProductAttributeValue
     * @var int
     */
    public $id;
    /**
     * ID of the parent attribute (ex: ID of the attribute "COLOR")
     * @var int
     */
    public $fk_product_attribute;
    /**
     * Reference of the ProductAttributeValue (ex: "BLUE_1" or "RED_3")
     * @var string
     */
    public $ref;
    /**
     * Label of the ProductAttributeValue (ex: "Dark blue" or "Chili Red")
     * @var string
     */
    public $value;
    /**
     * Sorting position of the ProductAttributeValue
     * @var int
     */
    public $position;
    /**
     * Constructor
     *
     * @param   DoliDB $db     Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Creates a value for a product attribute
     *
     * @param  User $user      Object user
     * @param  int  $notrigger Do not execute trigger
     * @return int Return integer <0 KO >0 OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Gets a product attribute value
     *
     * @param int $id Product attribute value id
     * @return int Return integer <0 KO, >0 OK
     */
    public function fetch($id)
    {
    }
    /**
     * Returns all product attribute values of a product attribute
     *
     * @param 	int 	$prodattr_id	 	Product attribute id
     * @param 	bool 	$only_used 			Fetch only used attribute values
     * @param	int<0,1>	$returnonlydata		0: return object, 1: return only data
     * @return 	ProductAttributeValue[]|stdClass[]	Array of object
     */
    public function fetchAllByProductAttribute($prodattr_id, $only_used = \false, $returnonlydata = 0)
    {
    }
    /**
     * Updates a product attribute value
     *
     * @param  User	$user	   Object user
     * @param  int  $notrigger Do not execute trigger
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Deletes a product attribute value
     *
     * @param  User $user      Object user
     * @param  int  $notrigger Do not execute trigger
     * @return int Return integer <0 KO, >0 OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Test if used by a product
     *
     * @return int Return integer <0 KO, =0 if No, =1 if Yes
     */
    public function isUsed()
    {
    }
}