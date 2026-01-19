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
}