<?php

/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared_Trend
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Best_Fit
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared_Trend
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Best_Fit
{
    /**
     * Indicator flag for a calculation error
     *
     * @var	boolean
     **/
    protected $_error = \False;
    /**
     * Algorithm type to use for best-fit
     *
     * @var	string
     **/
    protected $_bestFitType = 'undetermined';
    /**
     * Number of entries in the sets of x- and y-value arrays
     *
     * @var	int
     **/
    protected $_valueCount = 0;
    /**
     * X-value dataseries of values
     *
     * @var	float[]
     **/
    protected $_xValues = array();
    /**
     * Y-value dataseries of values
     *
     * @var	float[]
     **/
    protected $_yValues = array();
    /**
     * Flag indicating whether values should be adjusted to Y=0
     *
     * @var	boolean
     **/
    protected $_adjustToZero = \False;
    /**
     * Y-value series of best-fit values
     *
     * @var	float[]
     **/
    protected $_yBestFitValues = array();
    protected $_goodnessOfFit = 1;
    protected $_stdevOfResiduals = 0;
    protected $_covariance = 0;
    protected $_correlation = 0;
    protected $_SSRegression = 0;
    protected $_SSResiduals = 0;
    protected $_DFResiduals = 0;
    protected $_F = 0;
    protected $_slope = 0;
    protected $_slopeSE = 0;
    protected $_intersect = 0;
    protected $_intersectSE = 0;
    protected $_Xoffset = 0;
    protected $_Yoffset = 0;
    public function getError()
    {
    }
    //	function getBestFitType()
    public function getBestFitType()
    {
    }
    //	function getBestFitType()
    /**
     * Return the Y-Value for a specified value of X
     *
     * @param	 float		$xValue			X-Value
     * @return	 float						Y-Value
     */
    public function getValueOfYForX($xValue)
    {
    }
    //	function getValueOfYForX()
    /**
     * Return the X-Value for a specified value of Y
     *
     * @param	 float		$yValue			Y-Value
     * @return	 float						X-Value
     */
    public function getValueOfXForY($yValue)
    {
    }
    //	function getValueOfXForY()
    /**
     * Return the original set of X-Values
     *
     * @return	 float[]				X-Values
     */
    public function getXValues()
    {
    }
    //	function getValueOfXForY()
    /**
     * Return the Equation of the best-fit line
     *
     * @param	 int		$dp		Number of places of decimal precision to display
     * @return	 string
     */
    public function getEquation($dp = 0)
    {
    }
    //	function getEquation()
    /**
     * Return the Slope of the line
     *
     * @param	 int		$dp		Number of places of decimal precision to display
     * @return	 string
     */
    public function getSlope($dp = 0)
    {
    }
    //	function getSlope()
    /**
     * Return the standard error of the Slope
     *
     * @param	 int		$dp		Number of places of decimal precision to display
     * @return	 string
     */
    public function getSlopeSE($dp = 0)
    {
    }
    //	function getSlopeSE()
    /**
     * Return the Value of X where it intersects Y = 0
     *
     * @param	 int		$dp		Number of places of decimal precision to display
     * @return	 string
     */
    public function getIntersect($dp = 0)
    {
    }
    //	function getIntersect()
    /**
     * Return the standard error of the Intersect
     *
     * @param	 int		$dp		Number of places of decimal precision to display
     * @return	 string
     */
    public function getIntersectSE($dp = 0)
    {
    }
    //	function getIntersectSE()
    /**
     * Return the goodness of fit for this regression
     *
     * @param	 int		$dp		Number of places of decimal precision to return
     * @return	 float
     */
    public function getGoodnessOfFit($dp = 0)
    {
    }
    //	function getGoodnessOfFit()
    public function getGoodnessOfFitPercent($dp = 0)
    {
    }
    //	function getGoodnessOfFitPercent()
    /**
     * Return the standard deviation of the residuals for this regression
     *
     * @param	 int		$dp		Number of places of decimal precision to return
     * @return	 float
     */
    public function getStdevOfResiduals($dp = 0)
    {
    }
    //	function getStdevOfResiduals()
    public function getSSRegression($dp = 0)
    {
    }
    //	function getSSRegression()
    public function getSSResiduals($dp = 0)
    {
    }
    //	function getSSResiduals()
    public function getDFResiduals($dp = 0)
    {
    }
    //	function getDFResiduals()
    public function getF($dp = 0)
    {
    }
    //	function getF()
    public function getCovariance($dp = 0)
    {
    }
    //	function getCovariance()
    public function getCorrelation($dp = 0)
    {
    }
    //	function getCorrelation()
    public function getYBestFitValues()
    {
    }
    //	function getYBestFitValues()
    protected function _calculateGoodnessOfFit($sumX, $sumY, $sumX2, $sumY2, $sumXY, $meanX, $meanY, $const)
    {
    }
    //	function _calculateGoodnessOfFit()
    protected function _leastSquareFit($yValues, $xValues, $const)
    {
    }
    //	function _leastSquareFit()
    /**
     * Define the regression
     *
     * @param	float[]		$yValues	The set of Y-values for this regression
     * @param	float[]		$xValues	The set of X-values for this regression
     * @param	boolean		$const
     */
    function __construct($yValues, $xValues = array(), $const = \True)
    {
    }
    //	function __construct()
}