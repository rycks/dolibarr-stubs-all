<?php

/**
 * Class to manage statistics on project tasks
 */
class TaskStats extends \Stats
{
    private $project;
    public $userid;
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
     * @return array|int       Array with value or -1 if error
     * @throws Exception
     */
    public function getAllTaskByStatus($limit = 5)
    {
    }
    /**
     * Return count, and sum of products
     *
     * @return array of values
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
     * @return 	array 				Array of values
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     * Return the Task amount by month for a year
     *
     * @param 	int 	$year 		Year to scan
     * @param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return 	array 				Array with amount by month
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     * Return average of entity by month
     * @param	int     $year           year number
     * @return 	array					array of values
     */
    protected function getAverageByMonth($year)
    {
    }
}