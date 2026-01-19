<?php

/**
 * Class to manage the ticket stats
 */
class TicketStats extends \Stats
{
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element;
    /**
     * @var int thirdparty ID
     */
    public $socid;
    /**
     * @var int User ID
     */
    public $userid;
    /**
     * Constructor
     *
     * @param  DoliDB $db     Database handler
     * @param  int    $socid  Id third party
     * @param  int|int[]  $userid Id user for filter or array of user ids
     * @return void
     */
    public function __construct($db, $socid = 0, $userid = 0)
    {
    }
    /**
     *     Renvoie le nombre de tickets par annee
     *
     *    @return array<array{0:int,1:int}>		Array of values
     */
    public function getNbByYear()
    {
    }
    /**
     *  Return the number of tickets per month for a given year
     *
     *  @param  int 	$year 		Year to scan
     *	@param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return	array<int<0,11>,array{0:int<1,12>,1:int}>	Array with number by month
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     *  Return the number of tickets for a month and a given year
     *
     *  @param  int 	$year 		Year to scan
     *	@param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     *  @return array<int<0,11>,array{0:int<1,12>,1:int|float}>	Array of values
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     *    Return average amount
     *
     *    @param  int $year Year to scan
     *    @return array<int<0,11>,array{0:int<1,12>,1:int|float}>		Array of values
     */
    public function getAverageByMonth($year)
    {
    }
    /**
     *    Return nb, total and average
     *
     *  @return array<array{year:string,nb:string,nb_diff:float,total?:float,avg?:float,weighted?:float,total_diff?:float,avg_diff?:float,avg_weighted?:float}>    Array of values
     */
    public function getAllByYear()
    {
    }
}