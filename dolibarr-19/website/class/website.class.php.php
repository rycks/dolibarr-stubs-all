<?php

//require_once DOL_DOCUMENT_ROOT . '/societe/class/societe.class.php';
//require_once DOL_DOCUMENT_ROOT . '/product/class/product.class.php';
/**
 * Class Website
 */
class Website extends \CommonObject
{
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'website';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'website';
    /**
     * @var int  	Does this object support multicompany module ?
     * 0=No test on entity, 1=Test with field entity, 'field@table'=Test with link by field@table
     */
    public $ismultientitymanaged = 1;
    protected $childtablesoncascade = array();
    /**
     * @var string String with name of icon for website. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'globe';
    /**
     * @var int Entity
     */
    public $entity;
    /**
     * @var string Ref
     */
    public $ref;
    /**
     * @var string description
     */
    public $description;
    /**
     * @var string Main language of web site
     */
    public $lang;
    /**
     * @var string List of languages of web site ('fr', 'es_MX', ...)
     */
    public $otherlang;
    /**
     * @var int Status
     */
    public $status;
    /**
     * @var integer date_creation
     */
    public $date_creation;
    /**
     * @var integer	date_modification
     */
    public $date_modification;
    /**
     * @var integer date_modification
     */
    public $tms;
    /**
     * @var integer Default home page
     */
    public $fk_default_home;
    /**
     * @var int User Create Id
     */
    public $fk_user_creat;
    /**
     * @var int User Modification Id
     */
    public $fk_user_modif;
    /**
     * @var string Virtual host
     */
    public $virtualhost;
    /**
     * @var int Use a manifest file
     */
    public $use_manifest;
    /**
     * @var int	Postion
     */
    public $position;
    /**
     * @var array List of containers
     */
    public $lines;
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
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
     * @param  User $user      	User that creates
     * @param  bool $notrigger 	false=launch triggers after, true=disable triggers
     *
     * @return int 				Return integer <0 if KO, 0 if already exists, ID of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param 	int    $id  	Id object
     * @param 	string $ref 	Ref
     * @return 	int 			Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = \null)
    {
    }
    /**
     * Load object lines in memory from the database
     *
     * @return int         Return integer <0 if KO, 0 if not found, >0 if OK
     */
    public function fetchLines()
    {
    }
    /**
     * Load all object in memory ($this->records) from the database
     *
     * @param 	string 		$sortorder 		Sort Order
     * @param 	string 		$sortfield 		Sort field
     * @param 	int    		$limit     		offset limit
     * @param 	int    		$offset    		offset limit
     * @param 	array  		$filter    		filter array
     * @param 	string 		$filtermode 	filter mode (AND or OR)
     * @return 	array|int                 	int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, array $filter = array(), $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      User that modifies
     * @param  bool $notrigger false=launch triggers after, true=disable triggers
     *
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user      	User that deletes
     * @param bool $notrigger 	false=launch triggers, true=disable triggers
     *
     * @return int Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load a website its id and create a new one in database.
     * This copy website directories, regenerate all the pages + alias pages and recreate the medias link.
     *
     * @param	User	$user		User making the clone
     * @param 	int 	$fromid 	Id of object to clone
     * @param	string	$newref		New ref
     * @param	string	$newlang	New language
     * @return 	mixed 				New object created, <0 if KO
     */
    public function createFromClone($user, $fromid, $newref, $newlang = '')
    {
    }
    /**
     *  Return a link to the user card (with optionally the picto)
     * 	Use this->id,this->lastname, this->firstname
     *
     *	@param	int		$withpicto			Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option				On what the link point to
     *  @param	integer	$notooltip			1=Disable tooltip
     *  @param	int		$maxlen				Max length of visible user name
     *  @param  string  $morecss            Add more css on link
     *	@return	string						String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $maxlen = 24, $morecss = '')
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
     *  Return the label of a given status
     *
     *  @param	int		$status        Id status
     *  @param  int		$mode          0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 6=Long label + Picto
     *  @return string 			       Label of status
     */
    public function LibStatut($status, $mode = 0)
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
     * Generate a zip with all data of web site.
     *
     * @return  string						Path to file with zip or '' if error
     */
    public function exportWebSite()
    {
    }
    /**
     * Open a zip with all data of web site and load it into database.
     *
     * @param 	string		$pathtofile		Full path of zip file
     * @return  int							Return integer <0 if KO, Id of new website if OK
     */
    public function importWebSite($pathtofile)
    {
    }
    /**
     * Rebuild all files of all the pages/containers of a website. Rebuild also the index and wrapper.php file.
     * Note: Files are already regenerated during importWebSite so this function is useless when importing a website.
     *
     * @return 	int						Return integer <0 if KO, >=0 if OK
     */
    public function rebuildWebSiteFiles()
    {
    }
    /**
     * Return if web site is a multilanguage web site. Return false if there is only 0 or 1 language.
     *
     * @return boolean			True if web site is a multilanguage web site
     */
    public function isMultiLang()
    {
    }
    /**
     * Component to select language inside a container (Full CSS Only)
     *
     * @param	array|string	$languagecodes			'auto' to show all languages available for page, or language codes array like array('en','fr','de','es')
     * @param	Translate		$weblangs				Language Object
     * @param	string			$morecss				More CSS class on component
     * @param	string			$htmlname				Suffix for HTML name
     * @return 	string									HTML select component
     */
    public function componentSelectLang($languagecodes, $weblangs, $morecss = '', $htmlname = '')
    {
    }
}