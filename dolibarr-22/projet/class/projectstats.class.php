<?php

/**
 * Class to manage statistics on projects
 */
class ProjectStats extends \Stats
{
    /**
     * @var Project
     */
    private $project;
    /**
     * @var int
     */
    public $userid;
    /**
     * @var int
     */
    public $socid;
    /**
     * @var int
     */
    public $status;
    /**
     * @var string
     */
    public $opp_status;
    //SQL stat
    /**
     * @var string
     */
    public $field;
    /**
     * @var string
     */
    public $from;
    /**
     * @var string
     */
    public $where;
    /**
     * Constructor
     *
     * @param   DoliDB $db     Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Return all leads grouped by opportunity status.
     * Warning: There is no filter on WON/LOST because we want this for statistics.
     *
     * @param  int             $limit Limit results
     * @return array<array{0:string,1:float}>|int<-1,-1>	Array with value or -1 if error
     * @throws Exception
     */
    public function getAllProjectByStatus($limit = 5)
    {
    }
    /**
     * Return count, and sum of products
     *
     *  @return array<array{year:string,nb:string,nb_diff:float,total?:float,avg?:float,weighted?:float,total_diff?:float,avg_diff?:float,avg_weighted?:float}>    Array of values
     */
    public function getAllByYear()
    {
    }
    /**
     * Build the where part
     *
     * @return string
     */
    public function buildWhere()
    {
    }
    /**
     * Return Project number by month for a year
     *
     * @param 	int 	$year 		Year to scan
     * @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return	array<int<0,11>,array{0:int<1,12>,1:int}>	Array with number by month
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     * Return the Project amount by month for a year
     *
     * @param 	int 	$year 		Year to scan
     * @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     *  @return array<int<0,11>,array{0:int<1,12>,1:int|float}>	Array with amount by month
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     * Return amount of elements by month for several years
     *
     * @param	int		$endyear		Start year
     * @param	int		$startyear		End year
     * @param	int		$cachedelay		Delay we accept for cache file (0=No read, no save of cache, -1=No read but save)
     * @param   int     $wonlostfilter  Add a filter on status won/lost
     * @return int<-1,-1>|array<int<0,11>,array{0:string,1:int,2?:int,3?:int,4?:int}>	Array of values or <0 if error
     */
    public function getWeightedAmountByMonthWithPrevYear($endyear, $startyear, $cachedelay = 0, $wonlostfilter = 1)
    {
    }
    /**
     * Return the Project weighted opp amount by month for a year.
     *
     * @param  int $year               Year to scan
     * @param  int $wonlostfilter      Add a filter on status won/lost
     * @return array<int<0,11>,array{0:int<1,12>,1:int|float}>	Array with amount by month
     */
    public function getWeightedAmountByMonth($year, $wonlostfilter = 1)
    {
    }
    /**
     * Return amount of elements by month for several years
     *
     * @param 	int 		$endyear		End year
     * @param 	int 		$startyear		Start year
     * @param 	int			$cachedelay 	accept for cache file (0=No read, no save of cache, -1=No read but save)
     * @return  array<int<0,11>,array<string|float>>|int<-1,-1>	Array of values or <0 if error
     */
    public function getTransformRateByMonthWithPrevYear($endyear, $startyear, $cachedelay = 0)
    {
    }
    /**
     * Return the Project transformation rate by month for a year
     *
     * @param 	int 	$year 		Year to scan
     * @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return 	array<int<0,11>,array{0:int<1,12>,1:int|float}> 	Array with amount by month
     */
    public function getTransformRateByMonth($year, $format = 0)
    {
    }
    /**
     * Return average of entity by month
     * @param	int     $year           year number
     * @return	array<int<0,11>,array{0:int<1,12>,1:int|float}> 	Array with number by month
     */
    protected function getAverageByMonth($year)
    {
    }
}