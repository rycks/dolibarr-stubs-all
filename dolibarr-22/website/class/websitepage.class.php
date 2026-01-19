<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class Websitepage
 */
class WebsitePage extends \CommonObject
{
    /**
     * @var string 		Id to identify managed objects
     */
    public $element = 'websitepage';
    /**
     * @var string 		Name of table without prefix where object is stored
     */
    public $table_element = 'website_page';
    /**
     * @var string 		String with name of icon for websitepage. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'file-code';
    /**
     * @var string 		Field with ID of parent key if this field has a parent or for child tables
     */
    public $fk_element = 'fk_website_page';
    /**
     * @var string[]	List of child tables. To know object to delete on cascade.
     */
    protected $childtablesoncascade = array('categorie_website_page');
    /**
     * @var int 		Website ID
     */
    public $fk_website;
    /**
     * @var ?int 		Page ID
     */
    public $fk_page;
    // If translation of another page
    /**
     * @var string 		Page url
     */
    public $pageurl;
    /**
     * @var string 		Alias alt
     */
    public $aliasalt;
    /**
     * @var string 		Container type
     */
    public $type_container;
    /**
     * @var string 		Title
     */
    public $title;
    /**
     * @var string 		Description
     */
    public $description;
    /**
     * @var string 		Image (deprecated)
     */
    public $image;
    /**
     * @var string 		Keywords
     */
    public $keywords;
    /**
     * @var string 		Language code ('en', 'fr', 'en-gb', ..)
     */
    public $lang;
    /**
     * @var int 		Page allowed in frames
     */
    public $allowed_in_frames;
    /**
     * @var string		Disable WAF ('all', 'NOSCANAUDIOFORINJECTION,NOSCANIFRAMEFORINJECTION,NOSCANOBJECTFORINJECTION')
     */
    public $disable_waf = 'NOSCANAUDIOFORINJECTION,NOSCANIFRAMEFORINJECTION,NOSCANOBJECTFORINJECTION';
    // TODO Manage field in page setup
    /**
     * @var string 		Page html header
     */
    public $htmlheader;
    /**
     * @var string 		Page content
     */
    public $content;
    /**
     * @var string 		Url page was grabbed from
     */
    public $grabbed_from;
    /**
     * @var int<0,1>	Status online or offline
     */
    public $status;
    /**
     * @var int 		ID use of creation
     */
    public $fk_user_creat;
    /**
     * @var int 		ID user of last modification
     */
    public $fk_user_modif;
    /**
     * @var string 		Author alias
     */
    public $author_alias;
    /**
     * @var string 		Path of external object
     */
    public $object_type;
    /**
     * @var string 		Id of external object
     */
    public $fk_object;
    /**
     * @var int			Another ID that is the but with an offset so that ID of pages of the website start at 1
     */
    public $newid;
    const STATUS_DRAFT = 0;
    // offline
    const STATUS_VALIDATED = 1;
    // online
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
     *  'comment' is not used. You can store here any text of your choice. It is not used by application.
     *
     *  Note: To have value dynamic, you can set value to 0 in definition and edit the value on the fly into the constructor.
     */
    // BEGIN MODULEBUILDER PROPERTIES
    /**
     * @var array<string,array{type:string,label:string,enabled:int<0,2>|string,position:int,notnull?:int,visible:int<-6,6>|string,alwayseditable?:int<0,1>,noteditable?:int<0,1>,default?:string,index?:int,foreignkey?:string,searchall?:int<0,1>,isameasure?:int<0,1>,css?:string,csslist?:string,help?:string,showoncombobox?:int<0,4>,disabled?:int<0,1>,arrayofkeyval?:array<int|string,string>,autofocusoncreate?:int<0,1>,comment?:string,copytoclipboard?:int<1,2>,validate?:int<0,1>,showonheader?:int<0,1>}>  Array with all fields and their property. Do not use it as a static var. It may be modified by constructor.
     */
    public $fields = array(
        'rowid' => array('type' => 'integer', 'label' => 'TechnicalID', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'index' => 1, 'position' => 1, 'comment' => 'Id'),
        'pageurl' => array('type' => 'varchar(16)', 'label' => 'WEBSITE_PAGENAME', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'index' => 1, 'position' => 10, 'searchall' => 1, 'comment' => 'Ref/alias of page'),
        'aliasalt' => array('type' => 'varchar(255)', 'label' => 'AliasAlt', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'index' => 0, 'position' => 11, 'searchall' => 0, 'comment' => 'Alias alternative of page'),
        'type_container' => array('type' => 'varchar(16)', 'label' => 'Type', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'index' => 0, 'position' => 12, 'comment' => 'Type of container'),
        'title' => array('type' => 'varchar(255)', 'label' => 'Label', 'enabled' => 1, 'visible' => 1, 'position' => 30, 'searchall' => 1, 'help' => 'UseTextBetween5And70Chars'),
        'description' => array('type' => 'varchar(255)', 'label' => 'Description', 'enabled' => 1, 'visible' => 1, 'position' => 30, 'searchall' => 1),
        'image' => array('type' => 'varchar(255)', 'label' => 'Image', 'enabled' => 1, 'visible' => 1, 'position' => 32, 'searchall' => 0, 'help' => 'Relative path of media. Used if Type is "blogpost"'),
        'keywords' => array('type' => 'varchar(255)', 'label' => 'Keywords', 'enabled' => 1, 'visible' => 1, 'position' => 45, 'searchall' => 0),
        'lang' => array('type' => 'varchar(6)', 'label' => 'Lang', 'enabled' => 1, 'notnull' => -1, 'visible' => 1, 'position' => 45, 'searchall' => 0),
        //'status'        =>array('type'=>'integer',      'label'=>'Status',           'enabled'=>1, 'visible'=>1,  'index'=>true,   'position'=>1000),
        'fk_website' => array('type' => 'integer', 'label' => 'WebsiteId', 'enabled' => 1, 'visible' => 1, 'notnull' => 1, 'position' => 40, 'searchall' => 0, 'foreignkey' => 'websitepage.rowid'),
        'fk_page' => array('type' => 'integer', 'label' => 'ParentPageId', 'enabled' => 1, 'visible' => 1, 'notnull' => -1, 'position' => 45, 'searchall' => 0, 'foreignkey' => 'website.rowid'),
        'allowed_in_frames' => array('type' => 'integer', 'label' => 'AllowedInFrames', 'enabled' => 1, 'visible' => -1, 'position' => 48, 'searchall' => 0, 'default' => '0'),
        'htmlheader' => array('type' => 'html', 'label' => 'HtmlHeader', 'enabled' => 1, 'visible' => 0, 'position' => 50, 'searchall' => 0),
        'content' => array('type' => 'mediumtext', 'label' => 'Content', 'enabled' => 1, 'visible' => 0, 'position' => 51, 'searchall' => 0),
        'grabbed_from' => array('type' => 'varchar(255)', 'label' => 'GrabbedFrom', 'enabled' => 1, 'visible' => 1, 'index' => 1, 'position' => 400, 'comment' => 'URL page content was grabbed from'),
        'date_creation' => array('type' => 'datetime', 'label' => 'DateCreation', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 500),
        'tms' => array('type' => 'timestamp', 'label' => 'DateModification', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 501),
        //'date_valid'    =>array('type'=>'datetime',     'label'=>'DateValidation',     'enabled'=>1, 'visible'=>-1, 'position'=>502),
        'fk_user_creat' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserAuthor', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 510),
        'author_alias' => array('type' => 'varchar(64)', 'label' => 'AuthorAlias', 'enabled' => 1, 'visible' => -1, 'index' => 0, 'position' => 511, 'comment' => 'Author alias'),
        'fk_user_modif' => array('type' => 'integer:User:user/class/user.class.php', 'label' => 'UserModif', 'enabled' => 1, 'visible' => -1, 'position' => 512),
        //'fk_user_valid' =>array('type'=>'integer',      'label'=>'UserValidation',        'enabled'=>1, 'visible'=>-1, 'position'=>512),
        'import_key' => array('type' => 'varchar(14)', 'label' => 'ImportId', 'enabled' => 1, 'visible' => -1, 'index' => 1, 'position' => 1000, 'notnull' => -1),
        'object_type' => array('type' => 'varchar(255)', 'label' => 'ObjectType', 'enabled' => 1, 'visible' => 0, 'position' => 46, 'searchall' => 0, 'help' => ''),
        'fk_object' => array('type' => 'varchar(255)', 'label' => 'ObjectId', 'enabled' => 1, 'visible' => 0, 'position' => 47, 'searchall' => 0, 'help' => ''),
        'status' => array('type' => 'integer', 'label' => 'Status', 'enabled' => 1, 'visible' => -1, 'notnull' => 1, 'position' => 510),
    );
    // END MODULEBUILDER PROPERTIES
    /**
     * Constructor
     *
     * @param DoliDB $db Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object into database
     *
     * @param  User		$user      User that creates
     * @param  int<0,1> $notrigger 0=launch triggers after, 1=disable triggers
     * @return int      	       Return integer <0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param 	int       	$id             		Id object.
     *                                  			- If this is 0, the value into $page will be used. If not found or $page not defined, the default page of website_id will be used or the first page found if not set.
     *                                  			- If value is < 0, we must exclude this ID.
     * @param 	?string    	$website_id     		Web site id (page name must also be filled if this parameter is used)
     * @param 	?string    	$page           		Page name (website id must also be filled if this parameter is used). Example 'myaliaspage' or 'fr/myaliaspage'
     * @param 	?string    	$aliasalt       		Alternative alias to search page (slow)
     * @param	int			$translationparentid	Translation parent ID (a main language page ID to get the translated page). Parameter $translationparentlang must also be set.
     * @param	string		$translationparentlang	Translation parent Lang (a language lang to search the translation of the main page ID). Parameter $translationparentid must also be set.
     * @return 	int<-1,1>							Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $website_id = \null, $page = \null, $aliasalt = \null, $translationparentid = 0, $translationparentlang = '')
    {
    }
    /**
     * Return array of all web site pages.
     *
     * @param  string|int  	$websiteid   	Web site ID
     * @param  string      	$sortorder   	Sort Order
     * @param  string      	$sortfield    	Sort field
     * @param  int         	$limit        	limit
     * @param  int         	$offset       	Offset
     * @param  string|string[]	$filter       	Filter as an Universal Search string.
     *                                          Example: '((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
     * @param  string      	$filtermode   	No more used
     * @return WebSitePage[]|int<-1,-1>    	int <0 if KO, array of pages if OK
     */
    public function fetchAll($websiteid = '', $sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
    {
    }
    /**
     * Count objects in the database.
     *
     * @param  string      	$websiteid    	Web site
     * @param  string|string[]	$filter       	Filter as an Universal Search string.
     *                                          Example: '((client:=:1) OR ((client:>=:2) AND (client:<=:3))) AND (client:!=:8) AND (nom:like:'a%')'
     * @param  string      	$filtermode   	Filter mode (AND or OR)
     * @return int         		         	int <0 if KO, array of pages if OK
     */
    public function countAll($websiteid, $filter = '', $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User		$user		User that modifies
     * @param  int<0,1>	$notrigger	0=launch triggers after, 1=disable triggers
     * @return int					Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param User 	$user       User that deletes
     * @param int 	$notrigger  0=launch triggers after, 1=disable triggers
     * @return int             	Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User		$user				User making the clone
     * @param 	int 		$fromid 			Id of object to clone
     * @param	string		$newref				New ref/alias of page
     * @param	string		$newlang			New language
     * @param	int			$istranslation		1=New page is a translation of the cloned page.
     * @param	int			$newwebsite			0=Same web site, >0=Id of new website
     * @param	string		$newtitle			New title
     * @param	?Website	$website			Website
     * @return 	self|int<-1,-1>					New object created, <0 if KO
     */
    public function createFromClone(\User $user, $fromid, $newref, $newlang = '', $istranslation = 0, $newwebsite = 0, $newtitle = '', $website = \null)
    {
    }
    /**
     *  Return a link to the user card (with optionally the picto)
     * 	Use this->id,this->lastname, this->firstname
     *
     *	@param	int<0,2>	$withpicto			Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string		$option				On what the link point to
     *  @param	int<0,1>	$notooltip			1=Disable tooltip
     *  @param	int			$maxlen				Max length of visible user name
     *  @param  string		$morecss            Add more css on link
     *	@return	string							String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $maxlen = 24, $morecss = '')
    {
    }
    /**
     *  Return the label of the status
     *
     *  @param  int<0,6>	$mode	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return	string 				Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the label of a given status
     *
     *  @param	int			$status		Id status
     *  @param  int<0,6>	$mode		0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 					Label of status
     */
    public function LibStatut($status, $mode = 0)
    {
    }
    /**
     * Sets object to given categories.
     *
     * Deletes object from existing categories not supplied.
     * Adds it to non existing supplied categories.
     * Existing categories are left untouch.
     *
     * @param 	int[]|int 	$categories 	Category ID or array of Categories IDs
     * @return	int							Return integer <0 if KO, >0 if OK
     */
    public function setCategories($categories)
    {
    }
    /**
     * Initialise object with example values
     * Id must be 0 if object instance is a specimen
     *
     * @return int
     */
    public function initAsSpecimen()
    {
    }
}