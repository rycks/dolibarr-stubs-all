<?php

/**
 *		Class to manage reception statistics
 */
class ReceptionStats extends \Stats
{
    /**
     * @var string
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
     * @var string
     */
    public $from;
    /**
     * @var string
     */
    public $field;
    /**
     * @var string
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
     *	Return reception number by month for a year
     *
     *	@param	int			$year		Year to scan
     *	@param	int<0,2>	$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     *	@return	array<int<0,11>,array{0:int<1,12>,1:int}>	Array with number by month
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     * Return receptions number per year
     *
     * @return	array<array{0:int,1:int}>	Array with number by year
     *
     */
    public function getNbByYear()
    {
    }
    /**
     * Return the orders amount by month for a year
     *
     * @param	int		$year		Year to scan
     * @param	int<0,2>	$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return	array<int<0,11>,array{0:int<1,12>,1:int|float}>		Array with amount by month
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     * Return the orders amount average by month for a year
     *
     * @param	int		$year	year for stats
     * @return	array<int<0,11>,array{0:int<1,12>,1:int|float}> Array of average each month
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