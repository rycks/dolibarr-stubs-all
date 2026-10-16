<?php

/**
 *	Class to manage categories
 */
class Categorie extends \CommonObject
{
    // Categories types (we use string because we want to accept any modules/types in a future)
    const TYPE_PRODUCT = 'product';
    const TYPE_SUPPLIER = 'supplier';
    const TYPE_CUSTOMER = 'customer';
    const TYPE_MEMBER = 'member';
    const TYPE_CONTACT = 'contact';
    const TYPE_USER = 'user';
    const TYPE_PROJECT = 'project';
    const TYPE_ACCOUNT = 'bank_account';
    const TYPE_BANK_LINE = 'bank_line';
    const TYPE_WAREHOUSE = 'warehouse';
    const TYPE_ACTIONCOMM = 'actioncomm';
    const TYPE_WEBSITE_PAGE = 'website_page';
    const TYPE_TICKET = 'ticket';
    const TYPE_KNOWLEDGEMANAGEMENT = 'knowledgemanagement';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'category';
    /**
     * @var array Table of mapping between type string and ID used for field 'type' in table llx_categories
     */
    protected $MAP_ID = array('product' => 0, 'supplier' => 1, 'customer' => 2, 'member' => 3, 'contact' => 4, 'bank_account' => 5, 'project' => 6, 'user' => 7, 'bank_line' => 8, 'warehouse' => 9, 'actioncomm' => 10, 'website_page' => 11, 'ticket' => 12, 'knowledgemanagement' => 13);
    /**
     * @var array Code mapping from ID
     *
     * @note This array should be removed in future, once previous constants are moved to the string value. Deprecated
     */
    public static $MAP_ID_TO_CODE = array(0 => 'product', 1 => 'supplier', 2 => 'customer', 3 => 'member', 4 => 'contact', 5 => 'bank_account', 6 => 'project', 7 => 'user', 8 => 'bank_line', 9 => 'warehouse', 10 => 'actioncomm', 11 => 'website_page', 12 => 'ticket', 13 => 'knowledgemanagement');
    /**
     * @var array Foreign keys mapping from type string when value does not match
     *
     * @todo Move to const array when PHP 5.6 will be our minimum target
     */
    public $MAP_CAT_FK = array('customer' => 'soc', 'supplier' => 'soc', 'contact' => 'socpeople', 'bank_account' => 'account');
    /**
     * @var array Category tables mapping from type string (llx_categorie_...) when value does not match
     *
     * @note Move to const array when PHP 5.6 will be our minimum target
     */
    public $MAP_CAT_TABLE = array('customer' => 'societe', 'supplier' => 'fournisseur', 'bank_account' => 'account');
    /**
     * @var array Object class mapping from type string
     *
     * @note Move to const array when PHP 5.6 will be our minimum target
     */
    public $MAP_OBJ_CLASS = array(
        'product' => 'Product',
        'customer' => 'Societe',
        'supplier' => 'Fournisseur',
        'member' => 'Adherent',
        'contact' => 'Contact',
        'user' => 'User',
        'account' => 'Account',
        // old for bank account
        'bank_account' => 'Account',
        'project' => 'Project',
        'warehouse' => 'Entrepot',
        'actioncomm' => 'ActionComm',
        'website_page' => 'WebsitePage',
        'ticket' => 'Ticket',
        'knowledgemanagement' => 'KnowledgeRecord',
    );
    /**
     * @var array Title Area mapping from type string
     *
     * @note Move to const array when PHP 5.6 will be our minimum target
     */
    public static $MAP_TYPE_TITLE_AREA = array(
        'product' => 'ProductsCategoriesArea',
        'customer' => 'CustomersCategoriesArea',
        'supplier' => 'SuppliersCategoriesArea',
        'member' => 'MembersCategoriesArea',
        'contact' => 'ContactsCategoriesArea',
        'user' => 'UsersCategoriesArea',
        'account' => 'AccountsCategoriesArea',
        // old for bank account
        'bank_account' => 'AccountsCategoriesArea',
        'project' => 'ProjectsCategoriesArea',
        'warehouse' => 'StocksCategoriesArea',
        'actioncomm' => 'ActioncommCategoriesArea',
        'website_page' => 'WebsitePageCategoriesArea',
    );
    /**
     * @var array 	Object table mapping from type string (table llx_...) when value of key does not match table name.
     * 				This array may be completed by external modules with hook "constructCategory"
     */
    public $MAP_OBJ_TABLE = array(
        'customer' => 'societe',
        'supplier' => 'societe',
        'member' => 'adherent',
        'contact' => 'socpeople',
        'account' => 'bank_account',
        // old for bank account
        'project' => 'projet',
        'warehouse' => 'entrepot',
        'knowledgemanagement' => 'knowledgemanagement_knowledgerecord',
    );
    /**
     * @var string ID to identify managed object
     */
    public $element = 'category';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'categorie';
    /**
     * @var int ID
     */
    public $fk_parent;
    /**
     * @var string Category label
     */
    public $label;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var string     Color
     */
    public $color;
    /**
     * @var int Position
     */
    public $position;
    /**
     * @var int Visible
     */
    public $visible;
    /**
     * @var int		  Id of thirdparty when CATEGORY_ASSIGNED_TO_A_CUSTOMER is set
     */
    public $socid;
    /**
     * @var string	Category type
     *
     * @see Categorie::TYPE_PRODUCT
     * @see Categorie::TYPE_SUPPLIER
     * @see Categorie::TYPE_CUSTOMER
     * @see Categorie::TYPE_MEMBER
     * @see Categorie::TYPE_CONTACT
     * @see Categorie::TYPE_USER
     * @see Categorie::TYPE_PROJECT
     * @see Categorie::TYPE_ACCOUNT
     * @see Categorie::TYPE_BANK_LINE
     * @see Categorie::TYPE_WAREHOUSE
     * @see Categorie::TYPE_ACTIONCOMM
     * @see Categorie::TYPE_WEBSITE_PAGE
     * @see Categorie::TYPE_TICKET
     */
    public $type;
    /**
     * @var array<int,array{rowid:int,id:int,fk_parent:int,label:string,description:string,color:string,position:string,visible:int,ref_ext:string,picto:string,fullpath:string,fulllabel:string}>  Categories table in memory
     */
    public $cats = array();
    /**
     * @var array Mother of table
     */
    public $motherof = array();
    /**
     * @var array children
     */
    public $childs = array();
    /**
     * @var ?array{string,array{label:string,description:string,note?:string}} multilangs
     */
    public $multilangs;
    /**
     * @var int imgWidth
     */
    public $imgWidth;
    /**
     * @var int imgHeight
     */
    public $imgHeight;
    /**
     *  'type' if the field format ('integer', 'integer:ObjectClass:PathToClass[:AddCreateButtonOrNot[:Filter]]', 'varchar(x)', 'double(24,8)', 'real', 'price', 'text', 'html', 'date', 'datetime', 'timestamp', 'duration', 'mail', 'phone', 'url', 'password')
     *         Note: Filter can be a string like "(t.ref:like:'SO-%') or (t.date_creation:<:'20160101') or (t.nature:is:NULL)"
     *  'label' the translation key.
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
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int,noteditable?:int,default?:string,index?:int,foreignkey?:string,searchall?:int,isameasure?:int,css?:string,csslist?:string,help?:string,showoncombobox?:int,disabled?:int,arrayofkeyval?:array<int,string>,comment?:string}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -2, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id'), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'default' => '1', 'notnull' => 1, 'index' => 1, 'position' => 5), 'label' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'visible' => 1, 'showoncombobox' => 1, 'position' => 15, 'csslist' => 'tdoverflowmax250'));
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db     Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Get map list
     *
     * @return	array
     */
    public function getMapList()
    {
    }
    /**
     * 	Load category into memory from database
     *
     * 	@param		int		$id      Id of category
     *  @param		string	$label   Label of category
     *  @param		string	$type    Type of category ('product', '...') or (0, 1, ...)
     *  @param		string	$ref_ext External reference of object
     * 	@return		int				Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $label = '', $type = \null, $ref_ext = '')
    {
    }
    /**
     *  Add category into database
     *
     *  @param	User	$user		Object user
     *  @param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *  @return	int 				-1 : SQL error
     *          					-2 : new ID unknown
     *          					-3 : Invalid category
     * 								-4 : category already exists
     */
    public function create($user, $notrigger = 0)
    {
    }
    /**
     * 	Update category
     *
     *	@param	User	$user		Object user
     *  @param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     * 	@return	int		 			1 : OK
     *          					-1 : SQL error
     *          					-2 : invalid category
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * 	Delete a category from database
     *
     * 	@param	User	$user		Object user that ask to delete
     *	@param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return	int                 Return integer <0 KO >0 OK
     */
    public function delete($user, $notrigger = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Link an object to the category
     *
     * @param   CommonObject 	$obj  	Object to link to category
     * @param   string     		$type 	Type of category ('product', ...). Use '' to take $obj->element.
     * @return  int                		1 : OK, -1 : erreur SQL, -2 : id not defined, -3 : Already linked
     * @see del_type()
     */
    public function add_type($obj, $type = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Delete object from category
     *
     * @param   CommonObject $obj  Object
     * @param   string       $type Type of category ('customer', 'supplier', 'contact', 'product', 'member')
     * @return  int          1 if OK, -1 if KO
     * @see add_type()
     */
    public function del_type($obj, $type)
    {
    }
    /**
     * Return list of fetched instance of elements having this category
     *
     * @param   string     	$type       	Type of category ('customer', 'supplier', 'contact', 'product', 'member', 'knowledge_management', ...)
     * @param   int        	$onlyids    	Return only ids of objects (consume less memory)
     * @param	int			$limit			Limit
     * @param	int			$offset			Offset
     * @param	string		$sortfield		Sort fields
     * @param	string		$sortorder		Sort order ('ASC' or 'DESC');
     * @param  	string		$filter       	Filter as an Universal Search string.
     * 										Example: '((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
     * @param  	string      $filtermode   	No more used
     * @return  CommonObject[]|int[]|int    Return -1 if KO, array of instance of object if OK
     * @see containsObject()
     */
    public function getObjectsInCateg($type, $onlyids = 0, $limit = 0, $offset = 0, $sortfield = '', $sortorder = 'ASC', $filter = '', $filtermode = 'AND')
    {
    }
    /**
     * Check for the presence of an object in a category
     *
     * @param   string $type      		Type of category ('customer', 'supplier', 'contact', 'product', 'member')
     * @param   int    $object_id 		Id of the object to search
     * @return  int                     Number of occurrences
     * @see getObjectsInCateg()
     */
    public function containsObject($type, $object_id)
    {
    }
    /**
     * List categories of an element id
     *
     * @param	int		$id			Id of element
     * @param	string	$type		Type of category ('member', 'customer', 'supplier', 'product', 'contact')
     * @param	string	$sortfield	Sort field
     * @param	string	$sortorder	Sort order
     * @param	int		$limit		Limit for list
     * @param	int		$page		Page number
     * @return  int<-1,0>|array<int,array{id:int,fk_parent:int,label:string,description:string,color:string,position:int,socid:int,type:string,entity:int,array_options:array<string,mixed>,visible:int,ref_ext:string,multilangs?:array{string,array{label:string,description:string,note?:string}}}> Array of categories, 0 if no cat, -1 on error
     */
    public function getListForItem($id, $type = 'customer', $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return direct children ids of a category into an array
     *
     * @return	array|int   Return integer <0 KO, array ok
     */
    public function get_filles()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Load the array this->motherof that is array(id_son=>id_parent, ...)
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    protected function load_motherof()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Rebuilding the category tree as an array
     * Return an array of table('id','id_mere',...) sorted to have a human readable tree, with
     *                id = id of category
     *                id_mere = id of parent category
     *                id_children = array of child ids
     *                label = name of category
     *                fulllabel = Name with full path for the category
     *                fullpath = Full path built with the id's
     *
     * @param   string              $type               Type of categories ('customer', 'supplier', 'contact', 'product', 'member', ...)
     * @param   int|string|array	$fromid        		Keep only or Exclude (depending on $include parameter) all categories (including the leaf $fromid) into the tree after this id $fromid.
     *                                                  $fromid can be an :
     *                                                  - int (id of category)
     *                                                  - string (categories ids separated by comma)
     *                                                  - array (list of categories ids)
     * @param   int                 $include            [=0] Removed or 1=Keep only
     * @return  int<-1,-1>|array<int,array{rowid:int,id:int,fk_parent:int,label:string,description:string,color:string,position:string,visible:int,ref_ext:string,picto:string,fullpath:string,fulllabel:string}>              					Array of categories. this->cats and this->motherof are set, -1 on error
     */
    public function get_full_arbo($type, $fromid = 0, $include = 0)
    {
    }
    /**
     *	For category id_categ and its children available in this->cats, define property fullpath and fulllabel.
     *  It is called by get_full_arbo()
     *  This function is a memory scan only from $this->cats and $this->motherof, no database access must be done here.
     *
     * 	@param		int		$id_categ		id_categ entry to update
     * 	@param		int		$protection		Deep counter to avoid infinite loop
     *	@return		int<-1,1>				Return integer <0 if KO, >0 if OK
     *  @see get_full_arbo()
     */
    private function buildPathFromId($id_categ, $protection = 1000)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Returns all categories
     *
     *	@param	int			$type		Type of category (0, 1, ...)
     *	@param	boolean		$parent		Just parent categories if true
     *	@return	array|int				Table of Object Category, -1 on error
     */
    public function get_all_categories($type = \null, $parent = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Returns the top level categories (which are not child)
     *
     *	@param		int		$type		Type of category (0, 1, ...)
     *	@return		array
     */
    public function get_main_categories($type = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Check if a category with same label already exists for this cat's parent or root and for this cat's type
     *
     * 	@return		integer		1 if record already exist, 0 otherwise, -1 if error
     */
    public function already_exists()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Returns the path of the category, with the names of the categories
     * separated by $sep (" >> " by default)
     *
     * @param	string	$sep	     Separator
     * @param	string	$url	     Url ('', 'none' or 'urltouse')
     * @param   int     $nocolor     0
     * @param	int		$addpicto	 Add picto into link
     * @return	array
     */
    public function print_all_ways($sep = '&gt;&gt;', $url = '', $nocolor = 0, $addpicto = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Returns an array containing the list of parent categories
     *
     *	@return	int|array Return integer <0 KO, array OK
     */
    public function get_meres()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Returns in a table all possible paths to get to the category
     * 	starting with the major categories represented by Tables of categories
     *
     *	@return	array
     */
    public function get_all_ways()
    {
    }
    /**
     * Return list of categories (object instances or labels) linked to element of id $id and type $type
     * Should be named getListOfCategForObject
     *
     * @param   int    		$id     Id of element
     * @param   string|int	$type   Type of category ('customer', 'supplier', 'contact', 'product', 'member') or (0, 1, 2, ...)
     * @param   string 		$mode   'id'=Get array of category ids, 'object'=Get array of fetched category instances, 'label'=Get array of category
     *                      	    labels, 'id'= Get array of category IDs
     * @return  Categorie[]|int     Array of category objects or < 0 if KO
     */
    public function containing($id, $type, $mode = 'object')
    {
    }
    /**
     * 	Returns categories whose id or name match
     * 	add wildcards in the name unless $exact = true
     *
     * 	@param		int			$id			Id
     * 	@param		string		$nom		Name
     * 	@param		string		$type		Type of category ('member', 'customer', 'supplier', 'product', 'contact'). Old mode (0, 1, 2, ...) is deprecated.
     * 	@param		boolean		$exact		Exact string search (true/false)
     * 	@param		boolean		$case		Case sensitive (true/false)
     * 	@return		Categorie[]|int			Array of Categorie, -1 if error
     */
    public function rechercher($id, $nom, $type, $exact = \false, $case = \false)
    {
    }
    /**
     *  Return if at least one photo is available
     *
     * @param  string $sdir Directory to scan
     * @return boolean                 True if at least one photo is available, False if not
     */
    public function isAnyPhotoAvailable($sdir)
    {
    }
    /**
     * getTooltipContentArray
     * @param array $params params to construct tooltip data
     * @since v18
     * @return array
     */
    public function getTooltipContentArray($params)
    {
    }
    /**
     *	Return name and link of category (with picto)
     *  Use ->id, ->ref, ->label, ->color
     *
     *	@param		int		$withpicto				0=No picto, 1=Include picto into link, 2=Only picto
     *	@param		string	$option					On what the link point to ('nolink', ...)
     * 	@param		int		$maxlength				Max length of text
     *  @param		string	$moreparam				More param on URL link
     *  @param  	int     $notooltip      		1=Disable tooltip
     *  @param  	string  $morecss                Add more css on link
     *  @param  	int     $save_lastsearch_value	-1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return		string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $maxlength = 0, $moreparam = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Add the image uploaded as $file to the directory $sdir/<category>-<id>/photos/
     *
     *  @param      string	$sdir       Root destination directory
     *  @param      array	$file		Uploaded file name
     *	@return		void
     */
    public function add_photo($sdir, $file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return an array with all photos inside the directory
     *
     *    @param      string	$dir        Dir to scan
     *    @param      int		$nbmax      Nombre maximum de photos (0=pas de max)
     *    @return     array       			Tableau de photos
     */
    public function liste_photos($dir, $nbmax = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Efface la photo de la categorie et sa vignette
     *
     *    @param	string		$file		Path to file
     *    @return	void
     */
    public function delete_photo($file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Load size of image file
     *
     *  @param    	string	$file        Path to file
     *  @return		void
     */
    public function get_image_size($file)
    {
    }
    /**
     *	Update ou cree les traductions des infos produits
     *
     *	@param	User	$user		Object user
     *  @param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function setMultiLangs(\User $user, $notrigger = 0)
    {
    }
    /**
     *	Load array this->multilangs
     *
     *	@return		int		Return integer <0 if KO, >0 if OK
     */
    public function getMultiLangs()
    {
    }
    /**
     *	Return label of contact status
     *
     *	@param      int		$mode       0=Long label, 1=Short label, 2=Picto + Short label, 3=Picto, 4=Picto + Long label, 5=Short label + Picto, 6=Long label + Picto
     * 	@return 	string				Label of contact status
     */
    public function getLibStatut($mode)
    {
    }
    /**
     *  Initialise an instance with random values.
     *  Used to build previews or test instances.
     *	id must be 0 if object instance is a specimen.
     *
     *  @return	int
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param 	DoliDB 	$dbs 		Database handler, because function is static we name it $dbs not $db to avoid breaking coding test
     * @param 	int 	$origin_id 	Old thirdparty id
     * @param 	int 	$dest_id 	New thirdparty id
     * @return 	bool
     */
    public static function replaceThirdparty(\DoliDB $dbs, $origin_id, $dest_id)
    {
    }
    /**
     * Return the additional SQL JOIN query for filtering a list by a category
     *
     * @param string	$type			The category type (e.g Categorie::TYPE_WAREHOUSE)
     * @param string	$rowIdName		The name of the row id inside the whole sql query (e.g. "e.rowid")
     * @return string					A additional SQL JOIN query
     * @deprecated	search on some categories must be done using a WHERE EXISTS or NOT EXISTS and not a LEFT JOIN. @TODO Replace with getWhereQuery($type, $searchCategoryList)
     */
    public static function getFilterJoinQuery($type, $rowIdName)
    {
    }
    /**
     * Return the additional SQL SELECT query for filtering a list by a category
     *
     * @param string	$type			The category type (e.g Categorie::TYPE_WAREHOUSE)
     * @param string	$rowIdName		The name of the row id inside the whole sql query (e.g. "e.rowid")
     * @param Array		$searchList		A list with the selected categories
     * @return string					A additional SQL SELECT query
     * @deprecated	search on some categories must be done using a WHERE EXISTS or NOT EXISTS and not a LEFT JOIN
     */
    public static function getFilterSelectQuery($type, $rowIdName, $searchList)
    {
    }
    /**
     *      Count all categories
     *
     *      @return int                             Number of categories, -1 on error
     */
    public function countNbOfCategories()
    {
    }
}