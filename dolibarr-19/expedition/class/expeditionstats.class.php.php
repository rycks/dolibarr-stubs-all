<?php

/**
 *		Class to manage shipment statistics
 */
class ExpeditionStats extends \Stats
{
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element;
    /**
     * @var int ID thirdparty
     */
    public $socid;
    /**
     * @var int ID user
     */
    public $userid;
    /**
     * @var string sql part from
     */
    public $from;
    /**
     * @var string sql part join
     */
    public $join;
    /**
     * @var string sql part fields
     */
    public $field;
    /**
     * @var string sql part where
     */
    public $where;
    /**
     * Constructor
     *
     * @param	DoliDB	$db      	Database handler
     * @param 	int		$socid	   	Id third party for filter
     * @param 	string	$mode	   	Option (not used)
     * @param   int		$userid    	Id user for filter (creation user)
     */
    public function __construct($db, $socid, $mode, $userid = 0)
    {
    }
    /**
     * Return shipment number by month for a year
     *
     * @param	int		$year		Year to scan
     *	@param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return	array				Array with number by month
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     * Return shipments number per year
     *
     * @return	array	Array with number by year
     *
     */
    public function getNbByYear()
    {
    }
    /**
     * Return the orders amount by month for a year
     *
     * @param	int		$year		Year to scan
     * @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return	array				Array with amount by month
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     * Return the orders amount average by month for a year
     *
     * @param	int		$year	year for stats
     * @return	array			array with number by month
     */
    public function getAverageByMonth($year)
    {
    }
    /**
     *	Return nb, total and average
     *
     *	@return	array	Array of values
     */
    public function getAllByYear()
    {
    }
}