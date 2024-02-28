<?php

/**
 * PHPExcel_trendClass
 *
 * @category   PHPExcel
 * @package    PHPExcel_Shared_Trend
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class trendClass
{
    const TREND_LINEAR = 'Linear';
    const TREND_LOGARITHMIC = 'Logarithmic';
    const TREND_EXPONENTIAL = 'Exponential';
    const TREND_POWER = 'Power';
    const TREND_POLYNOMIAL_2 = 'Polynomial_2';
    const TREND_POLYNOMIAL_3 = 'Polynomial_3';
    const TREND_POLYNOMIAL_4 = 'Polynomial_4';
    const TREND_POLYNOMIAL_5 = 'Polynomial_5';
    const TREND_POLYNOMIAL_6 = 'Polynomial_6';
    const TREND_BEST_FIT = 'Bestfit';
    const TREND_BEST_FIT_NO_POLY = 'Bestfit_no_Polynomials';
    /**
     * Names of the best-fit trend analysis methods
     *
     * @var string[]
     **/
    private static $_trendTypes = array(self::TREND_LINEAR, self::TREND_LOGARITHMIC, self::TREND_EXPONENTIAL, self::TREND_POWER);
    /**
     * Names of the best-fit trend polynomial orders
     *
     * @var string[]
     **/
    private static $_trendTypePolyOrders = array(self::TREND_POLYNOMIAL_2, self::TREND_POLYNOMIAL_3, self::TREND_POLYNOMIAL_4, self::TREND_POLYNOMIAL_5, self::TREND_POLYNOMIAL_6);
    /**
     * Cached results for each method when trying to identify which provides the best fit
     *
     * @var PHPExcel_Best_Fit[]
     **/
    private static $_trendCache = array();
    public static function calculate($trendType = self::TREND_BEST_FIT, $yValues, $xValues = array(), $const = \True)
    {
    }
    //	function calculate()
}