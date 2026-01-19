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
     * @var string[]	List of child tables. To know object to delete on cascade.
     */
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
     * @var int	Position
     */
    public $position;
    /**
     * @var string name of template
     */
    public $name_template;
    const STATUS_DRAFT = 0;
    const STATUS_VALIDATED = 1;
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
     * @param  User $user      	User that creates
     * @param  int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int 				Return integer <0 if KO, 0 if already exists, ID of created object if OK
     */
    public function create(\User $user, $notrigger = 0)
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
     * Load all object in memory ($this->records) from the database
     *
     * @param 	string 			$sortorder 		Sort Order
     * @param 	string 			$sortfield 		Sort field
     * @param 	int    			$limit     		limit
     * @param 	int    			$offset    		offset limit
     * @param 	string|array<string,string>	$filter  filter array
     * @param 	string 			$filtermode 	filter mode (AND or OR)
     * @return 	Website[]|int<-1,-1> 	       	int <0 if KO, array of pages if OK
     */
    public function fetchAll($sortorder = '', $sortfield = '', $limit = 0, $offset = 0, $filter = '', $filtermode = 'AND')
    {
    }
    /**
     * Update object into database
     *
     * @param  User $user      	User that modifies
     * @param  int 	$notrigger 	0=launch triggers after, 1=disable triggers
     * @return int 				Return integer <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = 0)
    {
    }
    /**
     * Delete object in database
     *
     * @param User 	$user      	User that deletes
     * @param int 	$notrigger 	0=launch triggers, 1=disable triggers
     * @return int 				Return integer <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = 0)
    {
    }
    /**
     * Purge website
     * Delete website directory content and all pages and medias. Differs from delete() because it does not delete the website entry and no trigger is called.
     *
     * @param User 	$user      	User that deletes
     * @return int 				Return integer <0 if KO, >0 if OK
     */
    public function purge(\User $user)
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
     * @return int
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
     * @param	string[]|'auto'	$languagecodes			'auto' to show all languages available for page, or language codes array like array('en','fr','de','es')
     * @param	Translate		$weblangs				Language Object
     * @param	string			$morecss				More CSS class on component
     * @param	string			$htmlname				Suffix for HTML name
     * @return 	string									HTML select component
     */
    public function componentSelectLang($languagecodes, $weblangs, $morecss = '', $htmlname = '')
    {
    }
    /**
     * Overite template by copying all files
     *
     * @param	string	$pathtotmpzip		Path to the tmp zip file
     * @param   string  $exportPath         Relative path of directory to export files into (specified by the user)
     * @return 	int							Return integer <0 if KO, >0 if OK
     */
    public function overwriteTemplate(string $pathtotmpzip, $exportPath = '')
    {
    }
    /**
     * extract num of page
     * @param  string  $filename   name of file
     * @return int 1 if OK, -1 if KO
     */
    protected function extractNumberFromFilename($filename)
    {
    }
    /**
     * update name_template in table after import template
     * @param  string    $name_template   name of template
     * @return int     1 if OK, -1 if KO
     */
    public function setTemplateName($name_template)
    {
    }
    /**
     * check previous state for file
     * @param  string   $pathname  path of file
     * @return  array|mixed
     */
    public function checkPreviousState($pathname)
    {
    }
    /**
     * Save state for File
     * @param mixed $etat   state
     * @param string $pathname  path of file
     * @return int|false
     */
    public function saveState($etat, $pathname)
    {
    }
    /**
     * Compare two files has not same name but same content
     * @param  string   $dossierSource        filepath of folder source
     * @param  string   $dossierDestination   filepath of folder dest
     * @param  array{fullname:string}   $fichierModifie       files modified
     * @return array<mixed,mixed|mixed>    empty if KO, array if OK
     */
    public function compareFichierModifie($dossierSource, $dossierDestination, $fichierModifie)
    {
    }
    /**
     * Remove spaces in string
     * @param   string   $str    string
     * @return string
     */
    private function normalizeString($str)
    {
    }
    /**
     * show difference between to string
     * @param string  $str1   first string
     * @param string  $str2   second string
     * @param int[]  $exceptNumPge    num of page files we don't want to change
     * @return array<mixed,mixed|mixed>      Array
     */
    protected function showDifferences($str1, $str2, $exceptNumPge = array())
    {
    }
    /**
     * Replace line by line in file using numbers of the lines
     *
     * @param 	string 		$inplaceFile	path of file to modify in place
     * @param 	array<int|string,string|array<string,string>> 	$differences 	array of differences between files
     * @return 	int<-2,0>					Return 0 if we can replace, <0 if not (-2=not writable)
     */
    protected function replaceLineUsingNum($inplaceFile, $differences)
    {
    }
}