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
    public $socid;
    public $userid;
    public $from;
    public $field;
    public $where;
    /**
     * Constructor
     *
     * @param 	DoliDB	$db		   Database handler
     * @param 	int		$socid	   Id third party for filter. This value must be forced during the new to external user company if user is an external user.
     * @param   int		$userid    Id user for filter (creation user)
     * @param 	string	$mode	   Option ('customer', 'supplier')
     */
    public function __construct($db, $socid = 0, $userid = 0, $mode = 'customer')
    {
    }
    /**
     * Return propals number by month for a year
     *
     * @param	int		$year		Year to scan
     *	@param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     * @return	array				Array with number by month
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     * Return propals number per year
     *
     * @return	array	Array with number by year
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
     * @return	array				Array with amount by month
     */
    public function getAmountByMonth($year, $format)
    {
    }
    /**
     * Return the propals amount average by month for a year
     *
     * @param	int		$year	year for stats
     * @return	array			array with number by month
     */
    public function getAverageByMonth($year)
    {
    }
    /**
     *	Return nb, total and average
     *
     *	@return	array	Array of values
     */
    public function getAllByYear()
    {
    }
    /**
     *	Return nb, amount of predefined product for year
     *
     *	@param	int		$year	Year to scan
     *	@return	array	Array of values
     */
    public function getAllByProduct($year)
    {
    }
}