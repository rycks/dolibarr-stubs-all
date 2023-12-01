<?php

/**
 *	Class to manage stats for invoices (customer and supplier)
 */
class FactureStats extends \Stats
{
    public $socid;
    public $userid;
    /**
     * @var string Name of table without prefix where object is stored
     */
    public $table_element;
    public $from;
    public $field;
    public $where;
    public $join;
    /**
     * 	Constructor
     *
     * 	@param	DoliDB		$db			Database handler
     * 	@param 	int			$socid		Id third party for filter. This value must be forced during the new to external user company if user is an external user.
     * 	@param 	string		$mode	   	Option ('customer', 'supplier')
     * 	@param	int			$userid    	Id user for filter (creation user)
     * 	@param	int			$typentid   Id typent of thirdpary for filter
     * 	@param	int			$categid    Id category of thirdpary for filter
     */
    public function __construct($db, $socid, $mode, $userid = 0, $typentid = 0, $categid = 0)
    {
    }
    /**
     * 	Return orders number by month for a year
     *
     *	@param	int		$year		Year to scan
     *	@param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     *	@return	array				Array of values
     */
    public function getNbByMonth($year, $format = 0)
    {
    }
    /**
     * 	Return invoices number per year
     *
     *	@return		array	Array with number by year
     */
    public function getNbByYear()
    {
    }
    /**
     * 	Return the invoices amount by month for a year
     *
     *	@param	int		$year		Year to scan
     *	@param	int		$format		0=Label of abscissa is a translated text, 1=Label of abscissa is month number, 2=Label of abscissa is first letter of month
     *	@return	array				Array with amount by month
     */
    public function getAmountByMonth($year, $format = 0)
    {
    }
    /**
     *	Return average amount
     *
     *	@param	int		$year	Year to scan
     *	@return	array			Array of values
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
     *	@param	int		$year		Year to scan
     *  @param  int     $limit      Limit
     *	@return	array				Array of values
     */
    public function getAllByProduct($year, $limit = 10)
    {
    }
}