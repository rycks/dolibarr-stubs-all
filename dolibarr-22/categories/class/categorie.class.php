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
    const TYPE_FICHINTER = 'fichinter';
    const TYPE_ORDER = 'order';
    const TYPE_INVOICE = 'invoice';
    const TYPE_SUPPLIER_ORDER = 'supplier_order';
    const TYPE_SUPPLIER_INVOICE = 'supplier_invoice';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'category';
    /**
     * @var array<string,int> 	Table of mapping between type string and type ID used for field 'type' in table llx_categories
     */
    public $MAP_ID = array('product' => 0, 'service' => 0, 'supplier' => 1, 'customer' => 2, 'member' => 3, 'contact' => 4, 'bank_account' => 5, 'project' => 6, 'user' => 7, 'bank_line' => 8, 'warehouse' => 9, 'actioncomm' => 10, 'website_page' => 11, 'ticket' => 12, 'knowledgemanagement' => 13, 'fichinter' => 14, 'order' => 16, 'invoice' => 17, 'supplier_order' => 20, 'supplier_invoice' => 21);
    /**
     * @var array<int,string> 	Code mapping from ID
     *
     * @deprecated	This array should be removed in future, once previous constants are moved to the string value.
     */
    public static $MAP_ID_TO_CODE = array(0 => 'product', 1 => 'supplier', 2 => 'customer', 3 => 'member', 4 => 'contact', 5 => 'bank_account', 6 => 'project', 7 => 'user', 8 => 'bank_line', 9 => 'warehouse', 10 => 'actioncomm', 11 => 'website_page', 12 => 'ticket', 13 => 'knowledgemanagement', 14 => 'fichinter', 16 => 'order', 17 => 'invoice', 20 => 'supplier_order', 21 => 'supplier_invoice');
    /**
     * @var array<string,string> Foreign keys mapping from type string when value does not match
     *
     * @todo Move to const array when PHP 5.6 will be our minimum target
     */
    public $MAP_CAT_FK = array('customer' => 'soc', 'supplier' => 'soc', 'contact' => 'socpeople', 'bank_account' => 'account');
    /**
     * @var array<string,string> Category tables mapping from type string (llx_categorie_...) when value does not match
     *
     * @note Move to const array when PHP 5.6 will be our minimum target
     */
    public $MAP_CAT_TABLE = array('customer' => 'societe', 'supplier' => 'fournisseur', 'bank_account' => 'account');
    /**
     * @var array<string,string> Object class mapping from type string
     *
     * @note Move to const array when PHP 5.6 will be our minimum target
     */
    public $MAP_OBJ_CLASS = array(
        'product' => 'Product',
        'service' => 'Product',
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
        'fichinter' => 'Fichinter',
        'order' => 'Commande',
        'invoice' => 'Facture',
        'supplier_order' => 'CommandeFournisseur',
        'supplier_invoice' => 'FactureFournisseur',
    );
    /**
     * @var array<string,string> 	Title/Label mapping from type string
     *
     * @note Move to const array when PHP 5.6 will be our minimum target
     */
    public static $MAP_TYPE_TITLE_AREA = array(
        'product' => 'Products',
        'service' => 'Services',
        'customer' => 'ProspectsOrCustomers',
        'supplier' => 'Suppliers',
        'member' => 'Members',
        'contact' => 'Contacts',
        'user' => 'Users',
        'account' => 'Accounts',
        // old for bank account
        'bank_account' => 'BankAccounts',
        'bank_line' => 'BankTransactions',
        'project' => 'Projects',
        'warehouse' => 'Warehouse',
        'actioncomm' => 'AgendaEvents',
        'website_page' => 'WebsitePages',
        'ticket' => 'Tickets',
        'knowledgemanagement' => 'KnowledgeRecords',
        'fichinter' => 'Interventions',
        'order' => 'Orders',
        'invoice' => 'Invoices',
        'supplier_order' => 'SuppliersOrders',
        'supplier_invoice' => 'SuppliersInvoices',
    );
    /**
     * @var array<string,string> 	Object table mapping from type string (table llx_...) when value of key does not match table name.
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
        'fichinter' => 'fichinter',
        'order' => 'commande',
        'invoice' => 'facture',
        'supplier_order' => 'commande_fournisseur',
        'supplier_invoice' => 'facture_fourn',
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
     * @see Categorie::TYPE_FICHINTER
     * @see Categorie::TYPE_ORDER
     * @see Categorie::TYPE_INVOICE
     * @see Categorie::TYPE_SUPPLIER_ORDER
     * @see Categorie::TYPE_SUPPLIER_INVOICE
     */
    public $type;
    /**
     * @var array<int,array{rowid:int,id:int,fk_parent:int,label:string,description:string,color:string,position:string,visible:int,ref_ext:string,picto:string,fullpath:string,fulllabel:string,level:?int}>  Categories table in memory
     */
    public $cats = array();
    /**
     * @var array<int,int> Mother of table
     */
    public $motherof = array();
    /**
     * @var Categorie[] children
     */
    public $childs = array();
    /**
     * @var ?array<string,array{label:string,description:string,note?:string}>	Array for multilangs
     */
    public $multilangs = array();
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
    public $fields = array('rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'position' => 10, 'notnull' => 1, 'visible' => 0), 'entity' => array('type' => 'integer', 'label' => 'Entity', 'enabled' => 1, 'visible' => 0, 'default' => '1', 'notnull' => 1, 'index' => 1, 'position' => 5), 'fk_parent' => array('type' => 'integer', 'label' => 'ParentCategory', 'enabled' => 1, 'position' => 20, 'notnull' => 1, 'visible' => 0, 'css' => 'maxwidth500 widthcentpercentminusxx'), 'label' => array('type' => 'varchar(180)', 'label' => 'Ref', 'enabled' => 1, 'position' => 25, 'notnull' => 1, 'visible' => 1, 'alwayseditable' => 1, 'css' => 'minwidth300', 'cssview' => 'wordbreak', 'csslist' => 'tdoverflowmax150', 'showoncombobox' => 1), 'ref_ext' => array('type' => 'varchar(255)', 'label' => 'RefExt', 'enabled' => 1, 'position' => 30, 'notnull' => 0, 'visible' => 0, 'alwayseditable' => 1), 'type' => array('type' => 'integer', 'label' => 'Type', 'enabled' => 1, 'position' => 35, 'notnull' => 1, 'visible' => 0, 'alwayseditable' => 1), 'description' => array('type' => 'text', 'label' => 'Description', 'enabled' => 1, 'position' => 40, 'notnull' => 0, 'visible' => 1, 'alwayseditable' => 1), 'color' => array('type' => 'varchar(8)', 'label' => 'Color', 'enabled' => 1, 'position' => 45, 'notnull' => 0, 'visible' => 1, 'alwayseditable' => 1), 'position' => array('type' => 'integer', 'label' => 'Position', 'enabled' => 1, 'position' => 50, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), 'fk_soc' => array('type' => 'integer:Societe:societe/class/societe.class.php', 'label' => 'ThirdParty', 'picto' => 'company', 'enabled' => 1, 'position' => 55, 'notnull' => 0, 'visible' => 0, 'alwayseditable' => 1, 'css' => 'maxwidth500 widthcentpercentminusxx', 'csslist' => 'tdoverflowmax150'), 'visible' => array('type' => 'integer', 'label' => 'Visible', 'enabled' => 1, 'position' => 60, 'notnull' => 1, 'visible' => 0, 'alwayseditable' => 1), 'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'position' => 900, 'notnull' => 0, 'visible' => -2, 'alwayseditable' => 1), 'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'position' => 70, 'notnull' => 0, 'visible' => -1, 'alwayseditable' => 1), 'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'position' => 75, 'notnull' => 1, 'visible' => -1, 'alwayseditable' => 1), 'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'position' => 80, 'notnull' => 0, 'visible' => -2, 'alwayseditable' => 1, 'css' => 'maxwidth500 widthcentpercentminusxx', 'csslist' => 'tdoverflowmax150'), 'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'position' => 85, 'notnull' => -1, 'visible' => -2, 'alwayseditable' => 1, 'css' => 'maxwidth500 widthcentpercentminusxx', 'csslist' => 'tdoverflowmax150'));
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
     * @return	array<array{id:int,code:string,cat_fk:string,cat_table:string,obj_class:string,obj_table:string}>
     */
    public function getMapList()
    {
    }
    /**
     * Get MAP_ID
     *
     * @return	array<string,int>
     */
    public function getMapId()
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
     * Return list of fetched instances of elements having the current category.
     * WARNING: Do not use this. It can return an array with a very high number of element making an out of memory. Try by using instead getListForItem() or containing().
     *
     * @param   string     	$type       	Type of category ('customer', 'supplier', 'contact', 'product', 'member', 'knowledge_management', ...)
     * @param   int        	$onlyids    	Return only ids of objects (consume less memory)
     * @param	int			$limit			Limit
     * @param	int			$offset			Offset
     * @param	string		$sortfield		Sort fields
     * @param	string		$sortorder		Sort order ('ASC' or 'DESC');
     * @param  	string		$filter       	Filter as an Universal Search string.
     * 										Example: 	'((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
     * 										For multilingual fields, use: 	'(ol.label:like:'%value%')' and set $filterlang parameter
     * @param  	string      $filtermode   	No more used
     * @param   string		$filterlang     Language to use in Universal Search for multilingual fields ('fr_FR', 'en_US'...)
     * @return  CommonObject[]|int[]|int    Return -1 if KO, array of instance of object if OK
     * @see containsObject()
     */
    public function getObjectsInCateg($type, $onlyids = 0, $limit = 0, $offset = 0, $sortfield = '', $sortorder = 'ASC', $filter = '', $filtermode = 'AND', $filterlang = '')
    {
    }
    /**
     * Check for the presence of a given object in the current category
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
     * Return the list of the categories of a given element (a product, a customer, ...).
     * Warning, this load/fetch all qualified categories.
     *
     * @param	int		$id			Id of element
     * @param	string	$type		Type of category ('member', 'customer', 'supplier', 'product', 'contact')
     * @param	string	$sortfield	Sort field
     * @param	string	$sortorder	Sort order
     * @param	int		$limit		Limit for list
     * @param	int		$page		Page number
     * @return  int<-1,0>|array<int,array{id:int,fk_parent:int,label:string,description:string,color:string,position:int,socid:int,type:string,entity:int,array_options:array<string,mixed>,visible:int,ref_ext:string,multilangs?:array<string,array{label:string,description:string,note?:string}>}> Array of categories, 0 if no cat, -1 on error
     */
    public function getListForItem($id, $type = 'customer', $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return direct children ids of a category into an array. Only first level of children.
     *
     * @return	Categorie[]|int   Return integer <0 KO, array ok
     */
    public function get_filles()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Load the array this->motherof that is array(id_son=>id_parent, ...), so array of all child categories and ID of their parent.
     *  TODO Add a filter on the type of category.
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
     * @param   int|string|int[]	$fromid        		Keep only or Exclude (depending on $include parameter) all categories (including the leaf $fromid) into the tree after this id $fromid.
     *                                                  $fromid can be an :
     *                                                  - int (id of category)
     *                                                  - string (categories ids separated by comma)
     *                                                  - array (list of categories ids)
     * @param   int<0,1>            $include            [=0] Removed or 1=Keep only the ID into $fromid
     * @param	string				$forcelangcode		Lang code to force ('fr_FR', 'en_US', ...) or 'none'
     * @return  int<-1,-1>|array<int,array{rowid:int,id:int,fk_parent:int,label:string,description:string,color:string,position:string,visible:int,ref_ext:string,picto:string,fullpath:string,fulllabel:string,level:?int}>              					Array of categories. this->cats and this->motherof are set, -1 on error
     */
    public function get_full_arbo($type, $fromid = 0, $include = 0, $forcelangcode = '')
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
     *	@param	?int		$type		Type of category (0, 1, ...)
     *	@param	boolean		$parent		Just parent categories if true
     *	@return	array<int,Categorie>|int<-1,-1>	Table of Object Category, -1 on error
     */
    public function get_all_categories($type = \null, $parent = \false)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Returns the first level categories (which are not child)
     *
     *	@param	?int		$type		Type of category (0, 1, ...)
     *	@return	array<int,Categorie>|int<-1,-1>	Table of Object Category, -1 on error
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
     * @return	string[]
     */
    public function print_all_ways($sep = '&gt;&gt;', $url = '', $nocolor = 0, $addpicto = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Returns an array containing the list of parent categories
     *  Note: A category can only have one parent but this method return an array to work the same way the get_filles is working.
     *
     *	@return	int|Categorie[] Return integer <0 KO, array OK
     */
    public function get_meres()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Returns in a array all possible paths to go to the category
     * 	starting with the major categories represented by Tables of categories
     *
     *	@return	Categorie[][]
     */
    public function get_all_ways()
    {
    }
    /**
     * Return list of categories (object instances or labels) linked to a given object having id $id and type $type.
     * Should be named getListOfCategForObject.
     * Try to use it only with parameter $mode = 'id' or 'label'.
     *
     * @param   int    		$id                 Id of element
     * @param   string|int	$type               Type of category ('customer', 'supplier', 'contact', 'product', 'member') or (0, 1, 2, ...)
     * @param   string 		$mode               'id'=Get array of category IDs, 'label'=Get array of category labels, 'object'=Get array of fetched category instances
     * @return  Categorie[]|int[]|string[]|int  Array of category objects, labels or IDs or < 0 if KO
     */
    public function containing($id, $type, $mode = 'object')
    {
    }
    /**
     * 	Returns categories whose id or name matches.
     * 	It add wildcards in the name unless $exact = true
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
     * @param array<string,mixed> $params params to construct tooltip data
     * @since v18
     * @return array{picto?:string,ref?:string,refsupplier?:string,label?:string,date?:string,date_echeance?:string,amountht?:string,total_ht?:string,totaltva?:string,amountlt1?:string,amountlt2?:string,amountrevenustamp?:string,totalttc?:string}|array{optimize:string}
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
     *	@return		string							String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $maxlength = 0, $moreparam = '', $notooltip = 0, $morecss = '', $save_lastsearch_value = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Add the image uploaded as $file to the directory $sdir/<category>-<id>/photos/
     *
     *  @param	string								$sdir       Root destination directory
     *  @param	array{name:string,tmp_name:string}	$file		Uploaded file name
     *	@return	void
     */
    public function add_photo($sdir, $file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return an array with all photos inside the directory
     *
     *    @param	string	$dir        Dir to scan
     *    @param	int		$nbmax      Nombre maximum de photos (0=pas de max)
     *    @return	array<int,array{photo:string,photo_vignette:string}>	Table with images
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
     *	Create or Update translations of categories labels
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
     * Delete a language for this category
     *
     * @param string $langtodelete Language code to delete
     * @param User   $user         Object user making delete
     *
     * @return int                            Return integer <0 if KO, >0 if OK
     */
    public function delMultiLangs($langtodelete, $user)
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
     * @param string[]	$searchList		A list with the selected categories
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