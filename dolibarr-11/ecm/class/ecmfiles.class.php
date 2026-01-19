<?php

/**
 * Class to manage ECM files
 */
class EcmFiles extends \CommonObject
{
    /**
     * @var string Id to identify managed objects
     */
    public $element = 'ecmfiles';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'ecm_files';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'generic';
    /**
     * @var string Ref hash of file path
     */
    public $ref;
    /**
     * hash of file content (md5_file(dol_osencode($destfull))
     * @var string Ecm Files label
     */
    public $label;
    public $share;
    // hash for file sharing, empty by default (example: getRandomPassword(true))
    /**
     * @var int Entity
     */
    public $entity;
    public $filename;
    public $filepath;
    public $fullpath_orig;
    /**
     * @var string description
     */
    public $description;
    public $keywords;
    public $cover;
    public $position;
    public $gen_or_uploaded;
    // can be 'generated', 'uploaded', 'unknown'
    public $extraparams;
    public $date_c = '';
    public $date_m = '';
    /**
     * @var int ID
     */
    public $fk_user_c;
    /**
     * @var int ID
     */
    public $fk_user_m;
    public $acl;
    public $src_object_type;
    public $src_object_id;
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
     * @return int 				<0 if KO, Id of created object if OK
     */
    public function create(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param  int    $id          	   	Id object
     * @param  string $ref         	   	Hash of file name (filename+filepath). Not always defined on some version.
     * @param  string $relativepath    	Relative path of file from document directory. Example: path/path2/file
     * @param  string $hashoffile      	Hash of file content. Take the first one found if same file is at different places. This hash will also change if file content is changed.
     * @param  string $hashforshare    	Hash of file sharing.
     * @param  string $src_object_type 	src_object_type to search (value of object->table_element)
     * @param  string $src_object_id 	src_object_id to search
     * @return int                 	   	<0 if KO, 0 if not found, >0 if OK
     */
    public function fetch($id, $ref = '', $relativepath = '', $hashoffile = '', $hashforshare = '', $src_object_type = '', $src_object_id = 0)
    {
    }
    /**
     * Load object in memory from the database
     *
     * @param string $sortorder Sort Order
     * @param string $sortfield Sort field
     * @param int    $limit     offset limit
     * @param int    $offset    offset limit
     * @param array  $filter    filter array
     * @param string $filtermode filter mode (AND or OR)
     *
     * @return int <0 if KO, >0 if OK
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
     * @return int <0 if KO, >0 if OK
     */
    public function update(\User $user, $notrigger = \false)
    {
    }
    /**
     * Delete object in database
     *
     * @param User $user      User that deletes
     * @param bool $notrigger false=launch triggers after, true=disable triggers
     *
     * @return int <0 if KO, >0 if OK
     */
    public function delete(\User $user, $notrigger = \false)
    {
    }
    /**
     * Load an object from its id and create a new one in database
     *
     * @param	User	$user		User making the clone
     * @param   int     $fromid     Id of object to clone
     * @return  int                 New id of clone
     */
    public function createFromClone(\User $user, $fromid)
    {
    }
    /**
     *  Return a link to the object card (with optionaly the picto)
     *
     *	@param	int		$withpicto			Include picto in link (0=No picto, 1=Include picto into link, 2=Only picto)
     *	@param	string	$option				On what the link point to
     *  @param	int  	$notooltip			1=Disable tooltip
     *  @param	int		$maxlen				Max length of visible user name
     *  @param  string  $morecss            Add more css on link
     *	@return	string						String with URL
     */
    public function getNomUrl($withpicto = 0, $option = '', $notooltip = 0, $maxlen = 24, $morecss = '')
    {
    }
    /**
     *  Retourne le libelle du status d'un user (actif, inactif)
     *
     *  @param	int		$mode          0=libelle long, 1=libelle court, 2=Picto + Libelle court, 3=Picto, 4=Picto + Libelle long, 5=Libelle court + Picto
     *  @return	string 			       Label of status
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return the status
     *
     *  @param	int		$status        	Id status
     *  @param  int		$mode          	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto, 5=Long label + Picto
     *  @return string 			       	Label of status
     */
    public static function LibStatut($status, $mode = 0)
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
}
class EcmfilesLine
{
    /**
     * @var string ECM files line label
     */
    public $label;
    /**
     * @var int Entity
     */
    public $entity;
    public $filename;
    public $filepath;
    public $fullpath_orig;
    /**
     * @var string description
     */
    public $description;
    public $keywords;
    public $cover;
    public $position;
    public $gen_or_uploaded;
    // can be 'generated', 'uploaded', 'unknown'
    public $extraparams;
    public $date_c = '';
    public $date_m = '';
    /**
     * @var int ID
     */
    public $fk_user_c;
    /**
     * @var int ID
     */
    public $fk_user_m;
    public $acl;
    public $src_object_type;
    public $src_object_id;
}