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
     * @var string picto
     */
    public $picto = 'calendar';
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element = 'accounting_fiscalyear';
    /**
     * @var string    Name of subtable line
     */
    public $table_element_line = '';
    /**
     * @var string Field with ID of parent key if this field has a parent
     */
    public $fk_element = '';
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
    /**
     * @var int status 0=open, 1=closed
     * @deprecated
     * @see $status
     */
    public $statut;
    /**
     * @var int status 0=open, 1=closed
     */
    public $status;
    /**
     * @var int Entity
     */
    public $entity;
    const STATUS_OPEN = 0;
    const STATUS_CLOSED = 1;
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
     *	@return 	int				Return integer <0 if KO, >0 if OK
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
     * @return	int				Return integer <0 if KO, >0 if OK
     */
    public function fetch($id)
    {
    }
    /**
     *	Delete record
     *
     *	@param	User	$user	User that delete
     *	@return	int				Return integer <0 if KO, >0 if OK
     */
    public function delete($user)
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
     *	Return clickable link of object (with eventually picto)
     *
     *	@param      int			$withpicto                Add picto into link
     *  @param	    int   	    $notooltip		          1=Disable tooltip
     *  @param      int         $save_lastsearch_value    -1=Auto, 0=No save of lastsearch_values when clicking, 1=Save lastsearch_values whenclicking
     *	@return     string          			          String with URL
     */
    public function getNomUrl($withpicto = 0, $notooltip = 0, $save_lastsearch_value = -1)
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
     *	@param	int|string		$datestart	Date start to scan
     *	@param	int|string		$dateend	Date end to scan
     *	@return	int				Number of entries
     */
    public function getAccountancyEntriesByFiscalYear($datestart = '', $dateend = '')
    {
    }
    /**
     *  Return the number of movements by fiscal year
     *
     *  @param	int|string		$datestart	Date start to scan
     *  @param	int|string		$dateend	Date end to scan
     *  @return	int							Number of movements
     */
    public function getAccountancyMovementsByFiscalYear($datestart = '', $dateend = '')
    {
    }
}