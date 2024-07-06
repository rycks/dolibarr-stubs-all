<?php

/**
 *	Class to manage statistics of members
 */
class AdherentStats extends \Stats
{
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element;
    public $memberid;
    public $socid;
    public $userid;
    public $from;
    public $field;
    public $where;
    /**
     *	Constructor
     *
     *	@param 		DoliDB		$db			Database handler
     * 	@param 		int			$socid	   	Id third party
     * 	@param   	int			$userid    	Id user for filter
     */
    public function __construct($db, $socid = 0, $userid = 0)
    {
    }
    /**
     * Return the number of proposition by month for a given year
     *
     * @param   int		$year       Year
     *	@param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return	array				Array of nb each month
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     * Return the number of subscriptions by year
     *
     * @return	array				Array of nb each year
     */
    public function getNbByYear()
    {
    }
    /**
     * Return the number of subscriptions by month for a given year
     *
     * @param   int		$year       Year
     * @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return	array				Array of amount each month
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     * Return average amount each month
     *
     * @param   int		$year       Year
     * @return	array				Array of average each month
     */
    public function getAverageByMonth($year)
    {
    }
    /**
     *	Return nb, total and average
     *
     * 	@return		array					Array with nb, total amount, average for each year
     */
    public function getAllByYear()
    {
    }
    /**
     *	Return count of member by status group by adh type, total and average
     *
     *	@param	int		$numberYears    Number of years to scan (0 = all)
     *	@return	array<int|string,array{label:string,members_draft:int,members_pending:int,members_uptodate:int,members_expired:int,members_excluded:int,members_resiliated:int,all?:float|int,total_adhtype:float|int}>		Array with total of draft, pending, uptodate, expired, resiliated for each member type
     */
    public function countMembersByTypeAndStatus($numberYears = 0)
    {
    }
    /**
     *	Return count of member by status group by adh type, total and average
     *
     * @param	int		$numberYears    Number of years to scan (0 = all)
     * @return	array<string,array{label:string,members_draft:int,members_pending:0,members_uptodate:int,members_expired:int,members_excluded:int,members_resiliated:int,all?:float|int,total_adhtag:float|int}>		Array with total of draft, pending, uptodate, expired, resiliated for each member tag
     */
    public function countMembersByTagAndStatus($numberYears = 0)
    {
    }
}