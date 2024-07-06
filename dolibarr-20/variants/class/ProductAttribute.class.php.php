<?php

/**
 * Class ProductAttribute
 * Used to represent a Product attribute
 * Examples:
 * - Attribute 'color' (of type ProductAttribute) with values 'white', 'blue' or 'red' (each of type ProductAttributeValue).
 * - Attribute 'size' (of type ProductAttribute) with values 'S', 'L' or 'XL' (each of type ProductAttributeValue).
 */
class ProductAttribute extends \CommonObject
{
    /**
     * Database handler
     * @var DoliDB
     */
    public $db;
    /**
     * @var string ID of module.
     */
    public $module = 'variants';
    /**
     * @var string ID to identify managed object.
     */
    public $element = 'productattribute';
    /**
     * @var string Name of table without prefix where object is stored. This is also the key used for extrafields management.
     */
    public $table_element = 'product_attribute';
    /**
     * @var string    Name of sub table line
     */
    public $table_element_line = 'product_attribute_value';
    /**
     * @var string Field with ID of parent key if this field has a parent or for child tables
     */
    public $fk_element = 'fk_product_attribute';
    /**
     * @var string String with name of icon for conferenceorbooth. Must be the part after the 'object_' into object_conferenceorbooth.png
     */
    public $picto = 'product';
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
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'position' => 1, 'notnull' => 1, 'visible' => 0, 'noteditable' => 1, 'index' => 1, 'css' => 'left', 'comment' => "Id"), 'ref' => array('type' => 'varchar(255)', 'label' => 'Ref', 'visible' => 1, 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'index' => 1, 'searchall' => 1, 'comment' => "Reference of object", 'css' => 'width200'), 'ref_ext' => array('type' => 'varchar(255)', 'label' => 'ExternalRef', 'enabled' => 1, 'visible' => 0, 'position' => 20, 'searchall' => 1), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'position' => 30, 'notnull' => 1, 'visible' => 1, 'searchall' => 1, 'css' => 'minwidth300', 'help' => "", 'showoncombobox' => 1), 'position' => array('type' => 'integer', 'label' => 'Rank', 'enabled' => 1, 'visible' => 0, 'default' => '0', 'position' => 40, 'notnull' => 1));
    /**
     * @var int rowid
     */
    public $id;
    /**
     * @var string ref
     */
    public $ref;
    /**
     * @var string external ref
     */
    public $ref_ext;
    /**
     * @var string label
     */
    public $label;
    /**
     * @var int position
     * @deprecated
     * @see $position
     */
    public $rang;
    /**
     * @var int position
     */
    public $position;
    /**
     * @var ProductAttributeValue[]
     */
    public $lines = array();
    /**
     * @var ProductAttributeValue
     */
    public $line;
    /**
     * @var int		Number of product that use this attribute
     */
    public $is_used_by_products;
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Creates a product attribute
     *
     * @param   User    $user      Object user
     * @param   int     $notrigger Do not execute trigger
     * @return 					int Return integer <0 KO, Id of new variant if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Fetches the properties of a product attribute
     *
     * @param int $id Attribute id
     * @return int Return integer <1 KO, >1 OK
     */
    public function fetch($id)
    {
    }
    /**
     * Returns an array with all the ProductAttribute objects of a given entity
     *
     * @return ProductAttribute[]
     */
    public function fetchAll()
    {
    }
    /**
     * Updates a product attribute
     *
     * @param   User            $user           User who updates the attribute
     * @param   0|1             $notrigger      1 = Do not execute trigger (0 by default)
     * @return 	int<min,-1>|1                   <0 if KO, 1 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Deletes a product attribute
     *
     * @param   User    $user      Object user
     * @param   int     $notrigger Do not execute trigger
     * @return 	int Return integer <0 KO, >0 OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Load array lines
     *
     * @param	string		$filters	Filter on other fields
     * @return	int						Return integer <0 if KO, >0 if OK
     */
    public function fetch_lines($filters = '')
    {
    }
    /**
     * 	Retrieve an array of proposal lines
     *	@param  string              $filters        Filter on other fields
     *
     * 	@return int		>0 if OK, <0 if KO
     */
    public function getLinesArray($filters = '')
    {
    }
    /**
     *    	Add a proposal line into database (linked to product/service or not)
     *      The parameters are already supposed to be appropriate and with final values to the call
     *      of this method. Also, for the VAT rate, it must have already been defined
     *      by whose calling the method get_default_tva (societe_vendeuse, societe_acheteuse, '' product)
     *      and desc must already have the right value (it's up to the caller to manage multilanguage)
     *
     * @param	string	$ref			Ref of the value
     * @param	string	$value			Value
     * @param	int		$position		Position of line
     * 	@param	int		$notrigger		disable line update trigger
     * @return	int						>0 if OK, <0 if KO
     */
    public function addLine($ref, $value, $position = -1, $notrigger = 0)
    {
    }
    /**
     *  Update a line
     *
     * @param	int		$lineid       	Id of line
     * @param	string	$ref			Ref of the value
     * @param	string	$value			Value
     * @param	int		$notrigger		disable line update trigger
     * @return	int     	        	>=0 if OK, <0 if KO
     */
    public function updateLine($lineid, $ref, $value, $notrigger = 0)
    {
    }
    /**
     *  Delete a line
     *
     * @param   User    $user      Object user
     * @param	int		$lineid			Id of line to delete
     * @param	int		$notrigger		disable line update trigger
     * @return	int         			>0 if OK, <0 if KO
     */
    public function deleteLine(\User $user, $lineid, $notrigger = 0)
    {
    }
    /**
     * Returns the number of values for this attribute
     *
     * @return int
     */
    public function countChildValues()
    {
    }
    /**
     * Return the number of product variants using this attribute
     *
     * @return int<-1,max>		-1 if K0, nb of variants using this attribute
     */
    public function countChildProducts()
    {
    }
    /**
     * Test if this attribute is used by a Product
     *
     * @return -1|0|1			Return -1 if KO, 0 if not used, 1 if used
     */
    public function isUsed()
    {
    }
    /**
     *  Save a new position (field position) for details lines.
     *  You can choose to set position for lines with already a position or lines without any position defined.
     *
     * @param	boolean		$renum			   True to renum all already ordered lines, false to renum only not already ordered lines.
     * @param	string		$rowidorder		   ASC or DESC
     * @return	int                            Return integer <0 if KO, >0 if OK
     */
    public function attributeOrder($renum = \false, $rowidorder = 'ASC')
    {
    }
    /**
     * 	Update position of line (rang)
     *
     * @param	int		$rowid		Id of line
     * @param	int		$position	Position
     * @return	int					Return integer <0 if KO, >0 if OK
     */
    public function updatePositionOfAttribute($rowid, $position)
    {
    }
    /**
     * 	Get position of attribute
     *
     * @param	int		$rowid		Id of line
     * @return	int     			Value of position in table of attributes
     */
    public function getPositionOfAttribute($rowid)
    {
    }
    /**
     * 	Update a attribute to have a higher position
     *
     * @param	int		$rowid		Id of line
     * @return	int					Return integer <0 KO, >0 OK
     */
    public function attributeMoveUp($rowid)
    {
    }
    /**
     * 	Update a attribute to have a lower position
     *
     * @param	int		$rowid		Id of line
     * @return	int					Return integer <0 KO, >0 OK
     */
    public function attributeMoveDown($rowid)
    {
    }
    /**
     * 	Update position of attribute (up)
     *
     * @param	int		$rowid		Id of line
     * @param	int		$position	Position
     * @return	void
     */
    public function updateAttributePositionUp($rowid, $position)
    {
    }
    /**
     * 	Update position of attribute (down)
     *
     * @param	int		$rowid		Id of line
     * @param	int		$position	Position
     * @param	int		$max		Max
     * @return	void
     */
    public function updateAttributePositionDown($rowid, $position, $max)
    {
    }
    /**
     * 	Get max value used for position of attributes
     *
     * @return     int  			Max value of position in table of attributes
     */
    public function getMaxAttributesPosition()
    {
    }
    /**
     * 	Update position of attributes with ajax
     *
     * 	@param	array	$rows	Array of rows
     * 	@return	void
     */
    public function attributesAjaxOrder($rows)
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
     *  Return the label of the status
     *
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 			       Label of status
     */
    public function getLabelStatus($mode = 0)
    {
    }
    /**
     * Return label of status of product attribute
     *
     * @param      int			$mode        0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     * @return     string		Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return label of a status
     *
     * @param      int			$status		Id status
     * @param      int			$mode      	0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     * @return     string		Label
     */
    public function LibStatut($status, $mode = 1)
    {
    }
    // --------------------
    // TODO: All functions here must be redesigned and moved as they are not business functions but output functions
    // --------------------
    /* This is to show add lines */
    /**
     *	Show add free and predefined products/services form
     *
     *  @param	int		        $dateSelector       1=Show also date range input fields
     *  @param	Societe			$seller				Object thirdparty who sell
     *  @param	Societe			$buyer				Object thirdparty who buy
     *  @param	string			$defaulttpldir		Directory where to find the template
     *	@return	void
     */
    public function formAddObjectLine($dateSelector, $seller, $buyer, $defaulttpldir = '/variants/tpl')
    {
    }
    /* This is to show array of line of details */
    /**
     *	Return HTML table for object lines
     *	TODO Move this into an output class file (htmlline.class.php)
     *	If lines are into a template, title must also be into a template
     *	But for the moment we don't know if it's possible as we keep a method available on overloaded objects.
     *
     *	@param	string		$action				Action code
     *	@param  Societe		$seller            	Object of seller third party
     *	@param  Societe  	$buyer             	Object of buyer third party
     *	@param	int			$selected		   	Object line selected
     *	@param  int	    	$dateSelector      	1=Show also date range input fields
     *  @param	string		$defaulttpldir		Directory where to find the template
     *  @param	int			$addcreateline		1=Add create line
     *	@return	void
     */
    public function printObjectLines($action, $seller, $buyer, $selected = 0, $dateSelector = 0, $defaulttpldir = '/variants/tpl', $addcreateline = 0)
    {
    }
    /**
     *	Return HTML content of a detail line
     *	TODO Move this into an output class file (htmlline.class.php)
     *
     *	@param	string      		$action				GET/POST action
     *	@param  CommonObjectLine 	$line			    Selected object line to output
     *	@param  string	    		$var               	Is it a an odd line (true)
     *	@param  int		    		$num               	Number of line (0)
     *	@param  int		    		$i					I
     *	@param  int		    		$dateSelector      	1=Show also date range input fields
     *	@param  Societe	    		$seller            	Object of seller third party
     *	@param  Societe	    		$buyer             	Object of buyer third party
     *	@param	int					$selected		   	Object line selected
     *  @param  Extrafields			$extrafields		Object of extrafields
     *  @param	string				$defaulttpldir		Directory where to find the template (deprecated)
     *	@return	void
     */
    public function printObjectLine($action, $line, $var, $num, $i, $dateSelector, $seller, $buyer, $selected = 0, $extrafields = \null, $defaulttpldir = '/variants/tpl')
    {
    }
    /* This is to show array of line of details of source object */
}