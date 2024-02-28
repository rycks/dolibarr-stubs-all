<?php

/**
 *		Class to manage reception statistics
 */
class ReceptionStats extends \Stats
{
    public $table_element;
    public $socid;
    public $userid;
    public $from;
    public $field;
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
     * Return reception number by month for a year
     *
     * @param	int		$year		Year to scan
     * @return	array				Array with number by month
     */
    public function getNbByMonth($year)
    {
    }
    /**
     * Return receptions number per year
     *
     * @return	array	Array with number by year
     *
     */
    public function getNbByYear()
    {
    }
    /**
     *  Return nb, total and average
     *
     *  @return	array	Array of values
     */
    public function getAllByYear()
    {
    }
}