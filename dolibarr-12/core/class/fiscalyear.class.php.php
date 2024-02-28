<?php

/**
 * Class to manage fiscal year
 */
class Fiscalyear extends \CommonObject
{
    /**
     * @var string ID to identify managed object
     */
    public $element = 'fiscalyear';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'accounting_fiscalyear';
    /**
     * @var int    Name of subtable line
     */
    public $table_element_line = '';
    /**
     * @var int Field with ID of parent key if this field has a parent
     */
    public $fk_element = '';
    /**
     * 0=No test on entity, 1=Test with field entity, 2=Test with link by societe
     * @var int
     */
    public $ismultientitymanaged = 1;
    /**
     * @var int ID
     */
    public $rowid;
    /**
     * @var string fiscal year label
     */
    public $label;
    /**
     * Date start (date_start)
     *
     * @var integer
     */
    public $date_start;
    /**
     * Date end (date_end)
     *
     * @var integer
     */
    public $date_end;
    /**
     * Date creation record (datec)
     *
     * @var integer
     */
    public $datec;
    public $statut;
    // 0=open, 1=closed
    /**
     * @var int Entity
     */
    public $entity;
    public $statuts = array();
    public $statuts_short = array();
    /**
     * Constructor
     *
     * @param	DoliDB		$db		Database handler
     */
    public function __construct(\DoliDB $db)
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
     *  Return the number of entries by fiscal year
     *
     *	@param	int		$datestart	Date start to scan
     *	@param	int		$dateend	Date end to scan
     *	@return	string				Number of entries
     */
    public function getAccountancyEntriesByFiscalYear($datestart = '', $dateend = '')
    {
    }
    /**
     *  Return the number of movements by fiscal year
     *
     *  @param	int		$datestart	Date start to scan
     *  @param	int		$dateend	Date end to scan
     *  @return	string				Number of movements
     */
    public function getAccountancyMovementsByFiscalYear($datestart = '', $dateend = '')
    {
    }
}