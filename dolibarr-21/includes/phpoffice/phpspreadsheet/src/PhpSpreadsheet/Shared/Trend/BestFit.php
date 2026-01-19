<?php

namespace PhpOffice\PhpSpreadsheet\Shared\Trend;

class BestFit
{
    /**
     * Indicator flag for a calculation error.
     *
     * @var bool
     */
    protected $error = false;
    /**
     * Algorithm type to use for best-fit.
     *
     * @var string
     */
    protected $bestFitType = 'undetermined';
    /**
     * Number of entries in the sets of x- and y-value arrays.
     *
     * @var int
     */
    protected $valueCount = 0;
    /**
     * X-value dataseries of values.
     *
     * @var float[]
     */
    protected $xValues = [];
    /**
     * Y-value dataseries of values.
     *
     * @var float[]
     */
    protected $yValues = [];
    /**
     * Flag indicating whether values should be adjusted to Y=0.
     *
     * @var bool
     */
    protected $adjustToZero = false;
    /**
     * Y-value series of best-fit values.
     *
     * @var float[]
     */
    protected $yBestFitValues = [];
    protected $goodnessOfFit = 1;
    protected $stdevOfResiduals = 0;
    protected $covariance = 0;
    protected $correlation = 0;
    protected $SSRegression = 0;
    protected $SSResiduals = 0;
    protected $DFResiduals = 0;
    protected $f = 0;
    protected $slope = 0;
    protected $slopeSE = 0;
    protected $intersect = 0;
    protected $intersectSE = 0;
    protected $xOffset = 0;
    protected $yOffset = 0;
    public function getError()
    {
    }
    public function getBestFitType()
    {
    }
    /**
     * Return the Y-Value for a specified value of X.
     *
     * @param float $xValue X-Value
     *
     * @return bool Y-Value
     */
    public function getValueOfYForX($xValue)
    {
    }
    /**
     * Return the X-Value for a specified value of Y.
     *
     * @param float $yValue Y-Value
     *
     * @return bool X-Value
     */
    public function getValueOfXForY($yValue)
    {
    }
    /**
     * Return the original set of X-Values.
     *
     * @return float[] X-Values
     */
    public function getXValues()
    {
    }
    /**
     * Return the Equation of the best-fit line.
     *
     * @param int $dp Number of places of decimal precision to display
     *
     * @return bool
     */
    public function getEquation($dp = 0)
    {
    }
    /**
     * Return the Slope of the line.
     *
     * @param int $dp Number of places of decimal precision to display
     *
     * @return float
     */
    public function getSlope($dp = 0)
    {
    }
    /**
     * Return the standard error of the Slope.
     *
     * @param int $dp Number of places of decimal precision to display
     *
     * @return float
     */
    public function getSlopeSE($dp = 0)
    {
    }
    /**
     * Return the Value of X where it intersects Y = 0.
     *
     * @param int $dp Number of places of decimal precision to display
     *
     * @return float
     */
    public function getIntersect($dp = 0)
    {
    }
    /**
     * Return the standard error of the Intersect.
     *
     * @param int $dp Number of places of decimal precision to display
     *
     * @return float
     */
    public function getIntersectSE($dp = 0)
    {
    }
    /**
     * Return the goodness of fit for this regression.
     *
     * @param int $dp Number of places of decimal precision to return
     *
     * @return float
     */
    public function getGoodnessOfFit($dp = 0)
    {
    }
    /**
     * Return the goodness of fit for this regression.
     *
     * @param int $dp Number of places of decimal precision to return
     *
     * @return float
     */
    public function getGoodnessOfFitPercent($dp = 0)
    {
    }
    /**
     * Return the standard deviation of the residuals for this regression.
     *
     * @param int $dp Number of places of decimal precision to return
     *
     * @return float
     */
    public function getStdevOfResiduals($dp = 0)
    {
    }
    /**
     * @param int $dp Number of places of decimal precision to return
     *
     * @return float
     */
    public function getSSRegression($dp = 0)
    {
    }
    /**
     * @param int $dp Number of places of decimal precision to return
     *
     * @return float
     */
    public function getSSResiduals($dp = 0)
    {
    }
    /**
     * @param int $dp Number of places of decimal precision to return
     *
     * @return float
     */
    public function getDFResiduals($dp = 0)
    {
    }
    /**
     * @param int $dp Number of places of decimal precision to return
     *
     * @return float
     */
    public function getF($dp = 0)
    {
    }
    /**
     * @param int $dp Number of places of decimal precision to return
     *
     * @return float
     */
    public function getCovariance($dp = 0)
    {
    }
    /**
     * @param int $dp Number of places of decimal precision to return
     *
     * @return float
     */
    public function getCorrelation($dp = 0)
    {
    }
    /**
     * @return float[]
     */
    public function getYBestFitValues()
    {
    }
    protected function calculateGoodnessOfFit($sumX, $sumY, $sumX2, $sumY2, $sumXY, $meanX, $meanY, $const)
    {
    }
    /**
     * @param float[] $yValues
     * @param float[] $xValues
     * @param bool $const
     */
    protected function leastSquareFit(array $yValues, array $xValues, $const)
    {
    }
    /**
     * Define the regression.
     *
     * @param float[] $yValues The set of Y-values for this regression
     * @param float[] $xValues The set of X-values for this regression
     * @param bool $const
     */
    public function __construct($yValues, $xValues = [], $const = true)
    {
    }
}