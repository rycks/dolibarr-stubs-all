<?php

/**
 *	Class to manage donations statistics
 */
class DonationStats extends \Stats
{
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element;
    /**
     * @var int
     */
    public $socid;
    /**
     * @var int
     */
    public $userid;
    /**
     * @var string FROM
     */
    public $from;
    /**
     * @var string field
     */
    public $field;
    /**
     * @var string WHERE
     */
    public $where;
    /**
     * @var string JOIN
     */
    public $join;
    /**
     * Constructor
     *
     * @param	DoliDB	$db      	Database handler
     * @param 	int		$socid	   	Id third party for filter
     * @param 	string	$mode	   	Option (not used)
     * @param   int		$userid    	Id user for filter (creation user)
     * @param   int		$typentid  	Id of type of third party for filter
     * @param   int		$status    	Status of donation for filter
     */
    public function __construct($db, $socid, $mode, $userid = 0, $typentid = 0, $status = 4)
    {
    }
    /**
     *  Return shipment number by month for a year
     *
     *  @param	int		$year		Year to scan
     *  @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
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
     * Return the number of subscriptions by month for a given year
     *
     * @param   int		$year       Year
     * @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     *  @return array<int<0,11>,array{0:int<1,12>,1:int|float}>	Array of amount each month
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     * Return average amount each month
     *
     * @param   int		$year       Year
     * @return	array<int<0,11>,array{0:int<1,12>,1:int|float}> 	Array with number by month
     */
    public function getAverageByMonth($year)
    {
    }
    /**
     *  Return nb, total and average
     *
     *  @return array<array{year:string,nb:string,nb_diff:float,total?:float,avg?:float,weighted?:float,total_diff?:float,avg_diff?:float,avg_weighted?:float}>    Array of values
     */
    public function getAllByYear()
    {
    }
}