<?php

namespace PhpOffice\PhpSpreadsheet\Shared\Trend;

class PolynomialBestFit extends \PhpOffice\PhpSpreadsheet\Shared\Trend\BestFit
{
    /**
     * Algorithm type to use for best-fit
     * (Name of this Trend class).
     *
     * @var string
     */
    protected $bestFitType = 'polynomial';
    /**
     * Polynomial order.
     *
     * @var int
     */
    protected $order = 0;
    /**
     * Return the order of this polynomial.
     *
     * @return int
     */
    public function getOrder()
    {
    }
    /**
     * Return the Y-Value for a specified value of X.
     *
     * @param float $xValue X-Value
     *
     * @return float Y-Value
     */
    public function getValueOfYForX($xValue)
    {
    }
    /**
     * Return the X-Value for a specified value of Y.
     *
     * @param float $yValue Y-Value
     *
     * @return float X-Value
     */
    public function getValueOfXForY($yValue)
    {
    }
    /**
     * Return the Equation of the best-fit line.
     *
     * @param int $dp Number of places of decimal precision to display
     *
     * @return string
     */
    public function getEquation($dp = 0)
    {
    }
    /**
     * Return the Slope of the line.
     *
     * @param int $dp Number of places of decimal precision to display
     *
     * @return string
     */
    public function getSlope($dp = 0)
    {
    }
    public function getCoefficients($dp = 0)
    {
    }
    /**
     * Execute the regression and calculate the goodness of fit for a set of X and Y data values.
     *
     * @param int $order Order of Polynomial for this regression
     * @param float[] $yValues The set of Y-values for this regression
     * @param float[] $xValues The set of X-values for this regression
     */
    private function polynomialRegression($order, $yValues, $xValues)
    {
    }
    /**
     * Define the regression and calculate the goodness of fit for a set of X and Y data values.
     *
     * @param int $order Order of Polynomial for this regression
     * @param float[] $yValues The set of Y-values for this regression
     * @param float[] $xValues The set of X-values for this regression
     * @param bool $const
     */
    public function __construct($order, $yValues, $xValues = [], $const = true)
    {
    }
}