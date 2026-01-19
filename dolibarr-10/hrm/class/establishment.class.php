<?php

/**
 * Class to manage establishments
 */
class Establishment extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'establishment';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'establishment';
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = '';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = 'fk_establishment';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    public $picto = 'building';
    /**
     * @var int ID
     */
    public $id;
    /**
     * @var string Ref
     */
    public $ref;
    /**
     * @var int ID
     */
    public $rowid;
    public $name;
    /**
     * @var string Address
     */
    public $address;
    public $zip;
    public $town;
    /**
     * @var int Status 0=open, 1=closed
     */
    public $status;
    /**
     * @var int Entity
     */
    public $entity;
    public $country_id;
    public $statuts = array();
    public $statuts_short = array();
    /**
     * Constructor
     *
     * @param	DoliDB		$db		Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Create object in database
     *
     *	@param		User	$user   User making creation
     *	@return 	int				<0 if KO, >0 if OK
     */
    public function create($user)
    {
    }
    /**
     *	Update record
     *
     *	@param	User	$user		User making update
     *	@return	int					<0 if KO, >0 if OK
     */
    public function update($user)
    {
    }
    /**
     * Load an object from database
     *
     * @param	int		$id		Id of record to load
     * @return	int				<0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *	Delete record
     *
     *	@param	int		$id		Id of record to delete
     *	@return	int				<0 if KO, >0 if OK
     */
    public function delete($id)
    {
    }
    /**
     * Give a label from a status
     *
     * @param	int		$mode   	0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     * @return  string   		   	Label
     */
    public function getLibStatut($mode = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Give a label from a status
     *
     *  @param	int		$status     Id status
     *  @param  int		$mode       0=long label, 1=short label, 2=Picto + short label, 3=Picto, 4=Picto + long label, 5=Short label + Picto
     *  @return string      		Label
     */
    public function LibStatut($status, $mode = 0)
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
    /**
     * Get on record Establishment
     *
     * @param	int		$id      Id of record
     * @return	Object
     */
    public function getEstablishment($id)
    {
    }
    /**
     *  Return clicable name (with picto eventually)
     *
     *  @param      int     $withpicto      0=No picto, 1=Include picto into link, 2=Only picto
     *  @return     string                  String with URL
     */
    public function getNomUrl($withpicto = 0)
    {
    }
    /**
     *  Return clicable name (with picto eventually)
     *
     *  @param		int		$id				Id of record
     *  @param      int     $withpicto      0=No picto, 1=Include picto into link, 2=Only picto
     *  @return     string                  String with URL
     */
    public function getNomUrlParent($id = 0, $withpicto = 0)
    {
    }
    /**
     * 	Return account country code
     *
     *	@return		string		country code
     */
    public function getCountryCode()
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