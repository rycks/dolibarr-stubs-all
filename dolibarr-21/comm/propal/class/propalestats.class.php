<?php

/**
 *	Class to manage proposals statistics
 */
class PropaleStats extends \Stats
{
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element;
    /**
     * @var int ID
     */
    public $socid;
    /**
     * @var int ID
     */
    public $userid;
    /**
     * @var string sql from
     */
    public $from;
    /**
     * @var string sql fields
     */
    public $field;
    /**
     * @var string sql where
     */
    public $where;
    /**
     * @var string sql join
     */
    public $join;
    /**
     * Constructor
     *
     * @param 	DoliDB	$db		    Database handler
     * @param 	int		$socid	    Id third party for filter. This value must be forced during the new to external user company if user is an external user.
     * @param   int		$userid     Id user for filter (creation user)
     * @param 	string	$mode	    Option ('customer', 'supplier')
     * @param	int		$typentid   Id typent of thirdpary for filter
     * @param	int		$categid    Id category of thirdpary for filter
     */
    public function __construct($db, $socid = 0, $userid = 0, $mode = 'customer', $typentid = 0, $categid = 0)
    {
    }
    /**
     * Return propals number by month for a year
     *
     * @param	int		$year		Year to scan
     *	@param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return	array<int<0,11>,array{0:int<1,12>,1:int}>	Array with number by month
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     * Return propals number per year
     *
     * @return	array<array{0:int,1:int}>				Array of nb each year
     *
     */
    public function getNbByYear()
    {
    }
    /**
     * Return the propals amount by month for a year
     *
     * @param	int		$year		Year to scan
     * @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return array<int<0,11>,array{0:int<1,12>,1:int|float}>	Array with amount by month
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     * Return the propals amount average by month for a year
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
     *  @return array<array{year:string,nb:string,nb_diff:float,total?:float,avg?:float,weighted?:float,total_diff?:float,avg_diff?:float,avg_weighted?:float}>    Array with nb, total amount, average for each year
     */
    public function getAllByYear()
    {
    }
    /**
     *	Return nb, amount of predefined product for year
     *
     *	@param	int		$year		Year to scan
     *  @param  int     $limit      Limit
     *	@return	array<int<0,11>,array{0:int<1,12>,1:int|float}>	Array of values
     */
    public function getAllByProduct($year, $limit = 10)
    {
    }
}