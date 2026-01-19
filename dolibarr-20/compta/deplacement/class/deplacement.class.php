<?php

/**
 *		Class to manage trips and working credit notes
 */
class Deplacement extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'deplacement';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'deplacement';
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = '';
    /**
     * @var string Fieldname with ID of parent key if this field has a parent
     */
    public $fk_element = '';
    public $fk_soc;
    public $date;
    public $type;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    /**
     * Date (dated)
     *
     * @var integer
     */
    public $dated;
    /**
     * @var int ID
     */
    public $fk_user_author;
    /**
     * @var int User ID
     */
    public $fk_user;
    /**
     * @var float km value formatted
     */
    public $km;
    /**
     * @var int Thirdparty id
     */
    public $socid;
    /**
     * @var int Status 0=draft, 1=validated, 2=Refunded
     */
    public $statut;
    public $extraparams = array();
    /**
     * Draft status
     */
    const STATUS_DRAFT = 0;
    /**
     * Validated status
     */
    const STATUS_VALIDATED = 1;
    /**
     * Refunded status
     */
    const STATUS_REFUNDED = 2;
    /**
     * Constructor
     *
     * @param	DoliDB		$db		Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    /**
     * Create object in database
     * TODO Add ref number
     *
     * @param	User	$user	User that creates
     * @return 	int				Return integer <0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     *	Update record
     *
     *	@param	User	$user		User making update
     *	@return	int					Return integer <0 if KO, >0 if OK
     */
    public function update($user)
    {
    }
    /**
     * Load an object from database
     *
     * @param	int		$id		Id of record to load
     * @param	string	$ref	Ref of record
     * @return	int				Return integer <0 if KO, >0 if OK
     */
    public function fetch($id, $ref = '')
    {
    }
    /**
     *	Delete record
     *
     *	@param	User	$user		USer that Delete
     *	@return	int				Return integer <0 if KO, >0 if OK
     */
    public function delete($user)
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
     *	Return clicable name (with picto eventually)
     *
     *	@param		int		$withpicto		0=No picto, 1=Include picto into link, 2=Only picto
     *	@return		string					Chaine avec URL
     */
    public function getNomUrl($withpicto = 0)
    {
    }
    /**
     * List of types
     *
     * @param	int		$active		Active or not
     * @return	array
     */
    public function listOfTypes($active = 1)
    {
    }
    /**
     * Information on record
     *
     * @param	int		$id      Id of record
     * @return	void
     */
    public function info($id)
    {
    }
}