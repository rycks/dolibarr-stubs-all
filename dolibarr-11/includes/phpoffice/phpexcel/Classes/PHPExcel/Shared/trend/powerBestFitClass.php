<?php

/**
 * PHPExcel_Power_Best_Fit
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared_Trend
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Power_Best_Fit extends \PHPExcel_Best_Fit
{
    /**
     * Algorithm type to use for best-fit
     * (Name of this trend class)
     *
     * @var	string
     **/
    protected $_bestFitType = 'power';
    /**
     * Return the Y-Value for a specified value of X
     *
     * @param	 float		$xValue			X-Value
     * @return	 float						Y-Value
     **/
    public function getValueOfYForX($xValue)
    {
    }
    //	function getValueOfYForX()
    /**
     * Return the X-Value for a specified value of Y
     *
     * @param	 float		$yValue			Y-Value
     * @return	 float						X-Value
     **/
    public function getValueOfXForY($yValue)
    {
    }
    //	function getValueOfXForY()
    /**
     * Return the Equation of the best-fit line
     *
     * @param	 int		$dp		Number of places of decimal precision to display
     * @return	 string
     **/
    public function getEquation($dp = 0)
    {
    }
    //	function getEquation()
    /**
     * Return the Value of X where it intersects Y = 0
     *
     * @param	 int		$dp		Number of places of decimal precision to display
     * @return	 string
     **/
    public function getIntersect($dp = 0)
    {
    }
    //	function getIntersect()
    /**
     * Execute the regression and calculate the goodness of fit for a set of X and Y data values
     *
     * @param	 float[]	$yValues	The set of Y-values for this regression
     * @param	 float[]	$xValues	The set of X-values for this regression
     * @param	 boolean	$const
     */
    private function _power_regression($yValues, $xValues, $const)
    {
    }
    //	function _power_regression()
    /**
     * Define the regression and calculate the goodness of fit for a set of X and Y data values
     *
     * @param	 float[]	$yValues	The set of Y-values for this regression
     * @param	 float[]	$xValues	The set of X-values for this regression
     * @param	 boolean	$const
     */
    function __construct($yValues, $xValues = array(), $const = \True)
    {
    }
    //	function __construct()
}