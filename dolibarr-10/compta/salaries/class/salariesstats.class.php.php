<?php

/**
 *	Classe permettant la gestion des stats des salaires
 */
class SalariesStats extends \Stats
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
     * @param   DoliDB      $db        Database handler
     * @param   int         $socid     Id third party
     * @param   mixed       $userid    Id user for filter or array of user ids
     * @return  void
     */
    public function __construct($db, $socid = 0, $userid = 0)
    {
    }
    /**
     *  Return the number of salary by year
     *
     *	@return		array	Array of values
     */
    public function getNbByYear()
    {
    }
    /**
     *  Return the number of salary by month, for a given year
     *
     *	@param	string	$year		Year to scan
     *	@param	int		$format		0=Label of absiss is a translated text, 1=Label of absiss is month number, 2=Label of absiss is first letter of month
     *	@return	array				Array of values
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     * 	Return amount of salaries by month for a given year
     *
     *	@param	int		$year		Year to scan
     *	@param	int		$format		0=Label of absiss is a translated text, 1=Label of absiss is month number, 2=Label of absiss is first letter of month
     *	@return	array				Array of values
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     *	Return average amount
     *
     *	@param	int		$year		Year to scan
     *	@return	array				Array of values
     */
    public function getAverageByMonth($year)
    {
    }
    /**
     *	Return nb, total and average
     *
     *	@return	array				Array of values
     */
    public function getAllByYear()
    {
    }
}