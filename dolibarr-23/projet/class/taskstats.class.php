<?php

/**
 * Class to manage statistics on project tasks
 */
class TaskStats extends \Stats
{
    /**
     * @var Project
     */
    private $project;
    // @phpstan-ignore-line
    /**
     * @var int ID of User
     */
    public $userid;
    /**
     * @var int ID of Societe
     */
    public $socid;
    /**
     * @var int priority
     */
    public $priority;
    /**
     * Constructor of the class
     *
     * @param   DoliDB  $db     Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * Return all tasks grouped by status.
     *
     * @param  int             $limit Limit results
     * @return array<int,array{0:int|string,1:int}>|int<-1,-1>	Array with value or -1 if error
     * @throws Exception
     */
    public function getAllTaskByStatus($limit = 5)
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
     * Return Task number by month for a year
     *
     * @param 	int 	$year 		Year to scan
     * @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return	array<int<0,11>,array{0:int<1,12>,1:int}>	Array with number by month
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     * Return the Task amount by month for a year
     *
     * @param 	int 	$year 		Year to scan
     * @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     *  @return array<int<0,11>,array{0:int<1,12>,1:int|float}>	Array of values
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     * Return average of entity by month
     * @param	int     $year           year number
     * @return	array<int<0,11>,array{0:int<1,12>,1:int|float}> Array of average each month
     */
    protected function getAverageByMonth($year)
    {
    }
}