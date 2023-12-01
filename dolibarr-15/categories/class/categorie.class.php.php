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
    protected $MAP_CAT_FK = array('customer' => 'soc', 'supplier' => 'soc', 'contact' => 'socpeople', 'bank_account' => 'account');
    /**
     * @var array Category tables mapping from type string (llx_categorie_...) when value does not match
     *
     * @note Move to const array when PHP 5.6 will be our minimum target
     */
    protected $MAP_CAT_TABLE = array('customer' => 'societe', 'supplier' => 'fournisseur', 'bank_account' => 'account');
    /**
     * @var array Object class mapping from type string
     *
     * @note Move to const array when PHP 5.6 will be our minimum target
     */
    protected $MAP_OBJ_CLASS = array(
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
     * @var array Object table mapping from type string (table llx_...) when value of key does not match table name.
     *
     * @note Move to const array when PHP 5.6 will be our minimum target
     */
    protected $MAP_OBJ_TABLE = array(
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
     * @var array Categories table in memory
     */
    public $cats = array();
    /**
     * @var array Mother of table
     */
    public $motherof = array();
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
     * 	@return		int				<0 if KO, >0 if OK
     */
    public function fetch($id, $label = '', $type = \null, $ref_ext = '')
    {
    }
    /**
     *  Add category into database
     *
     *  @param	User	$user		Object user
     *  @return	int 				-1 : SQL error
     *          					-2 : new ID unknown
     *          					-3 : Invalid category
     * 								-4 : category already exists
     */
    public function create($user)
    {
    }
    /**
     * 	Update category
     *
     *	@param	User	$user		Object user
     * 	@return	int		 			1 : OK
     *          					-1 : SQL error
     *          					-2 : invalid category
     */
    public function update(\User $user)
    {
    }
    /**
     * 	Delete a category from database
     *
     * 	@param	User	$user		Object user that ask to delete
     *	@param	int		$notrigger	1=Does not execute triggers, 0= execute triggers
     *	@return	int                 <0 KO >0 OK
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
     *
     * @return  int          1 if OK, -1 if KO
     */
    public function del_type($obj, $type)
    {
    }
    /**
     * Return list of fetched instance of elements having this category
     *
     * @param   string     	$type       Type of category ('customer', 'supplier', 'contact', 'product', 'member', ...)
     * @param   int        	$onlyids    Return only ids of objects (consume less memory)
     * @param	int			$limit		Limit
     * @param	int			$offset		Offset
     * @param	string		$sortfield	Sort fields
     * @param	string		$sortorder	Sort order ('ASC' or 'DESC');
     * @return  array|int              	-1 if KO, array of instance of object if OK
     * @see containsObject()
     */
    public function getObjectsInCateg($type, $onlyids = 0, $limit = 0, $offset = 0, $sortfield = '', $sortorder = 'ASC')
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
     * @return	array|int			Array of categories, 0 if no cat, -1 on error
     */
    public function getListForItem($id, $type = 'customer', $sortfield = "s.rowid", $sortorder = 'ASC', $limit = 0, $page = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Return direct childs id of a category into an array
     *
     * @return	array|int   <0 KO, array ok
     */
    public function get_filles()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * 	Load the array this->motherof that is array(id_son=>id_parent, ...)
     *
     *	@return		int		<0 if KO, >0 if OK
     */
    protected function load_motherof()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Rebuilding the category tree as an array
     * Return an array of table('id','id_mere',...) trie selon arbre et avec:
     *                id = id de la categorie
     *                id_mere = id de la categorie mere
     *                id_children = tableau des id enfant
     *                label = nom de la categorie
     *                fulllabel = nom avec chemin complet de la categorie
     *                fullpath = chemin complet compose des id
     *
     * @param   string                  $type                   Type of categories ('customer', 'supplier', 'contact', 'product', 'member', ...)
     * @param   int|string|array        $markafterid            Keep only or removed all categories including the leaf $markafterid in category tree (exclude) or Keep only of category is inside the leaf starting with this id.
     *                                                          $markafterid can be an :
     *                                                          - int (id of category)
     *                                                          - string (categories ids separated by comma)
     *                                                          - array (list of categories ids)
     * @param   int                     $include                [=0] Removed or 1=Keep only
     * @return  array|int               Array of categories. this->cats and this->motherof are set, -1 on error
     */
    public function get_full_arbo($type, $markafterid = 0, $include = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	For category id_categ and its childs available in this->cats, define property fullpath and fulllabel.
     *  It is called by get_full_arbo()
     *  This function is a memory scan only from $this->cats and $this->motherof, no database access must be done here.
     *
     * 	@param		int		$id_categ		id_categ entry to update
     * 	@param		int		$protection		Deep counter to avoid infinite loop
     *	@return		void
     *  @see get_full_arbo()
     */
    public function build_path_from_id_categ($id_categ, $protection = 1000)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Display content of $this->cats
     *
     *	@return	void
     */
    public function debug_cats()
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
     * 	Check if no category with same label already exists for this cat's parent or root and for this cat's type
     *
     * 	@return		integer		1 if already exist, 0 otherwise, -1 if error
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
     * @param	string	$addpicto	 Add picto into link
     * @return	array
     */
    public function print_all_ways($sep = '&gt;&gt;', $url = '', $nocolor = 0, $addpicto = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Returns an array containing the list of parent categories
     *
     *	@return	int|array <0 KO, array OK
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
     *	Return name and link of category (with picto)
     *  Use ->id, ->ref, ->label, ->color
     *
     *	@param		int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *	@param		string	$option			Sur quoi pointe le lien ('', 'xyz')
     * 	@param		int		$maxlength		Max length of text
     *  @param		string	$moreparam		More param on URL link
     *	@return		string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $maxlength = 0, $moreparam = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Deplace fichier uploade sous le nom $files dans le repertoire sdir
     *
     *  @param      string	$sdir       Repertoire destination finale
     *  @param      string	$file		Nom du fichier uploade
     *	@return		void
     */
    public function add_photo($sdir, $file)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *    Return tableau de toutes les photos de la categorie
     *
     *    @param      string	$dir        Repertoire a scanner
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
     *
     *	@return		int		<0 if KO, >0 if OK
     */
    public function setMultiLangs($user)
    {
    }
    /**
     *	Load array this->multilangs
     *
     *	@return		int		<0 if KO, >0 if OK
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
     *  @return	void
     */
    public function initAsSpecimen()
    {
    }
    /**
     * Function used to replace a thirdparty id with another one.
     *
     * @param DoliDB $db Database handler
     * @param int $origin_id Old thirdparty id
     * @param int $dest_id New thirdparty id
     * @return bool
     */
    public static function replaceThirdparty(\DoliDB $db, $origin_id, $dest_id)
    {
    }
    /**
     * Return the addtional SQL JOIN query for filtering a list by a category
     *
     * @param string	$type			The category type (e.g Categorie::TYPE_WAREHOUSE)
     * @param string	$rowIdName		The name of the row id inside the whole sql query (e.g. "e.rowid")
     * @return string					A additional SQL JOIN query
     */
    public static function getFilterJoinQuery($type, $rowIdName)
    {
    }
    /**
     * Return the addtional SQL SELECT query for filtering a list by a category
     *
     * @param string	$type			The category type (e.g Categorie::TYPE_WAREHOUSE)
     * @param string	$rowIdName		The name of the row id inside the whole sql query (e.g. "e.rowid")
     * @param Array		$searchList		A list with the selected categories
     * @return string					A additional SQL SELECT query
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