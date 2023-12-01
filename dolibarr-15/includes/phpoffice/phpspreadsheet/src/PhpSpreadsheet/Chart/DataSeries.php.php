<?php

namespace PhpOffice\PhpSpreadsheet\Chart;

class DataSeries
{
    const TYPE_BARCHART = 'barChart';
    const TYPE_BARCHART_3D = 'bar3DChart';
    const TYPE_LINECHART = 'lineChart';
    const TYPE_LINECHART_3D = 'line3DChart';
    const TYPE_AREACHART = 'areaChart';
    const TYPE_AREACHART_3D = 'area3DChart';
    const TYPE_PIECHART = 'pieChart';
    const TYPE_PIECHART_3D = 'pie3DChart';
    const TYPE_DOUGHNUTCHART = 'doughnutChart';
    const TYPE_DONUTCHART = self::TYPE_DOUGHNUTCHART;
    // Synonym
    const TYPE_SCATTERCHART = 'scatterChart';
    const TYPE_SURFACECHART = 'surfaceChart';
    const TYPE_SURFACECHART_3D = 'surface3DChart';
    const TYPE_RADARCHART = 'radarChart';
    const TYPE_BUBBLECHART = 'bubbleChart';
    const TYPE_STOCKCHART = 'stockChart';
    const TYPE_CANDLECHART = self::TYPE_STOCKCHART;
    // Synonym
    const GROUPING_CLUSTERED = 'clustered';
    const GROUPING_STACKED = 'stacked';
    const GROUPING_PERCENT_STACKED = 'percentStacked';
    const GROUPING_STANDARD = 'standard';
    const DIRECTION_BAR = 'bar';
    const DIRECTION_HORIZONTAL = self::DIRECTION_BAR;
    const DIRECTION_COL = 'col';
    const DIRECTION_COLUMN = self::DIRECTION_COL;
    const DIRECTION_VERTICAL = self::DIRECTION_COL;
    const STYLE_LINEMARKER = 'lineMarker';
    const STYLE_SMOOTHMARKER = 'smoothMarker';
    const STYLE_MARKER = 'marker';
    const STYLE_FILLED = 'filled';
    /**
     * Series Plot Type.
     *
     * @var string
     */
    private $plotType;
    /**
     * Plot Grouping Type.
     *
     * @var string
     */
    private $plotGrouping;
    /**
     * Plot Direction.
     *
     * @var string
     */
    private $plotDirection;
    /**
     * Plot Style.
     *
     * @var null|string
     */
    private $plotStyle;
    /**
     * Order of plots in Series.
     *
     * @var array of integer
     */
    private $plotOrder = [];
    /**
     * Plot Label.
     *
     * @var array of DataSeriesValues
     */
    private $plotLabel = [];
    /**
     * Plot Category.
     *
     * @var array of DataSeriesValues
     */
    private $plotCategory = [];
    /**
     * Smooth Line.
     *
     * @var bool
     */
    private $smoothLine;
    /**
     * Plot Values.
     *
     * @var array of DataSeriesValues
     */
    private $plotValues = [];
    /**
     * Create a new DataSeries.
     *
     * @param null|mixed $plotType
     * @param null|mixed $plotGrouping
     * @param int[] $plotOrder
     * @param DataSeriesValues[] $plotLabel
     * @param DataSeriesValues[] $plotCategory
     * @param DataSeriesValues[] $plotValues
     * @param null|string $plotDirection
     * @param bool $smoothLine
     * @param null|string $plotStyle
     */
    public function __construct($plotType = null, $plotGrouping = null, array $plotOrder = [], array $plotLabel = [], array $plotCategory = [], array $plotValues = [], $plotDirection = null, $smoothLine = false, $plotStyle = null)
    {
    }
    /**
     * Get Plot Type.
     *
     * @return string
     */
    public function getPlotType()
    {
    }
    /**
     * Set Plot Type.
     *
     * @param string $plotType
     *
     * @return DataSeries
     */
    public function setPlotType($plotType)
    {
    }
    /**
     * Get Plot Grouping Type.
     *
     * @return string
     */
    public function getPlotGrouping()
    {
    }
    /**
     * Set Plot Grouping Type.
     *
     * @param string $groupingType
     *
     * @return DataSeries
     */
    public function setPlotGrouping($groupingType)
    {
    }
    /**
     * Get Plot Direction.
     *
     * @return string
     */
    public function getPlotDirection()
    {
    }
    /**
     * Set Plot Direction.
     *
     * @param string $plotDirection
     *
     * @return DataSeries
     */
    public function setPlotDirection($plotDirection)
    {
    }
    /**
     * Get Plot Order.
     *
     * @return int[]
     */
    public function getPlotOrder()
    {
    }
    /**
     * Get Plot Labels.
     *
     * @return array of DataSeriesValues
     */
    public function getPlotLabels()
    {
    }
    /**
     * Get Plot Label by Index.
     *
     * @param mixed $index
     *
     * @return DataSeriesValues
     */
    public function getPlotLabelByIndex($index)
    {
    }
    /**
     * Get Plot Categories.
     *
     * @return array of DataSeriesValues
     */
    public function getPlotCategories()
    {
    }
    /**
     * Get Plot Category by Index.
     *
     * @param mixed $index
     *
     * @return DataSeriesValues
     */
    public function getPlotCategoryByIndex($index)
    {
    }
    /**
     * Get Plot Style.
     *
     * @return null|string
     */
    public function getPlotStyle()
    {
    }
    /**
     * Set Plot Style.
     *
     * @param null|string $plotStyle
     *
     * @return DataSeries
     */
    public function setPlotStyle($plotStyle)
    {
    }
    /**
     * Get Plot Values.
     *
     * @return array of DataSeriesValues
     */
    public function getPlotValues()
    {
    }
    /**
     * Get Plot Values by Index.
     *
     * @param mixed $index
     *
     * @return DataSeriesValues
     */
    public function getPlotValuesByIndex($index)
    {
    }
    /**
     * Get Number of Plot Series.
     *
     * @return int
     */
    public function getPlotSeriesCount()
    {
    }
    /**
     * Get Smooth Line.
     *
     * @return bool
     */
    public function getSmoothLine()
    {
    }
    /**
     * Set Smooth Line.
     *
     * @param bool $smoothLine
     *
     * @return DataSeries
     */
    public function setSmoothLine($smoothLine)
    {
    }
    public function refresh(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet)
    {
    }
}