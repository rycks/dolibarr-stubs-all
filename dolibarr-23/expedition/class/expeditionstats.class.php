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
     * @return	array<int<0,11>,array{0:int<1,12>,1:int}>	Array with number by month
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     * Return shipments number per year
     *
     * @return	array<array{0:int,1:int}>				Array of nb each year
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
     *  @return array<int<0,11>,array{0:int<1,12>,1:int|float}>	Array of values
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     * Return the orders amount average by month for a year
     *
     * @param	int		$year	year for stats
     * @return	array<int<0,11>,array{0:int<1,12>,1:int|float}> 	Array with number by month
     */
    public function getAverageByMonth($year)
    {
    }
    /**
     *	Return nb, total and average
     *
     *  @return array<array{year:string,nb:string,nb_diff:float,total?:float,avg?:float,weighted?:float,total_diff?:float,avg_diff?:float,avg_weighted?:float}>    Array of values
     */
    public function getAllByYear()
    {
    }
}