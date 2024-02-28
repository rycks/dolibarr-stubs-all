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
     *  Return shipment number by month for a year
     *
     *  @param	int		$year		Year to scan
     *  @param	int		$format		0=Label of absiss is a translated text, 1=Label of absiss is month number, 2=Label of absiss is first letter of month
     *  @return	array				Array with number by month
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
     *  Return nb, total and average
     *
     *  @return	array	Array of values
     */
    public function getAllByYear()
    {
    }
}