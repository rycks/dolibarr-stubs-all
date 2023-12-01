<?php

namespace PhpOffice\PhpSpreadsheet\Chart;

class Chart
{
    /**
     * Chart Name.
     *
     * @var string
     */
    private $name = '';
    /**
     * Worksheet.
     *
     * @var Worksheet
     */
    private $worksheet;
    /**
     * Chart Title.
     *
     * @var Title
     */
    private $title;
    /**
     * Chart Legend.
     *
     * @var Legend
     */
    private $legend;
    /**
     * X-Axis Label.
     *
     * @var Title
     */
    private $xAxisLabel;
    /**
     * Y-Axis Label.
     *
     * @var Title
     */
    private $yAxisLabel;
    /**
     * Chart Plot Area.
     *
     * @var PlotArea
     */
    private $plotArea;
    /**
     * Plot Visible Only.
     *
     * @var bool
     */
    private $plotVisibleOnly = true;
    /**
     * Display Blanks as.
     *
     * @var string
     */
    private $displayBlanksAs = '0';
    /**
     * Chart Asix Y as.
     *
     * @var Axis
     */
    private $yAxis;
    /**
     * Chart Asix X as.
     *
     * @var Axis
     */
    private $xAxis;
    /**
     * Chart Major Gridlines as.
     *
     * @var GridLines
     */
    private $majorGridlines;
    /**
     * Chart Minor Gridlines as.
     *
     * @var GridLines
     */
    private $minorGridlines;
    /**
     * Top-Left Cell Position.
     *
     * @var string
     */
    private $topLeftCellRef = 'A1';
    /**
     * Top-Left X-Offset.
     *
     * @var int
     */
    private $topLeftXOffset = 0;
    /**
     * Top-Left Y-Offset.
     *
     * @var int
     */
    private $topLeftYOffset = 0;
    /**
     * Bottom-Right Cell Position.
     *
     * @var string
     */
    private $bottomRightCellRef = 'A1';
    /**
     * Bottom-Right X-Offset.
     *
     * @var int
     */
    private $bottomRightXOffset = 10;
    /**
     * Bottom-Right Y-Offset.
     *
     * @var int
     */
    private $bottomRightYOffset = 10;
    /**
     * Create a new Chart.
     *
     * @param mixed $name
     * @param null|Title $title
     * @param null|Legend $legend
     * @param null|PlotArea $plotArea
     * @param mixed $plotVisibleOnly
     * @param mixed $displayBlanksAs
     * @param null|Title $xAxisLabel
     * @param null|Title $yAxisLabel
     * @param null|Axis $xAxis
     * @param null|Axis $yAxis
     * @param null|GridLines $majorGridlines
     * @param null|GridLines $minorGridlines
     */
    public function __construct($name, \PhpOffice\PhpSpreadsheet\Chart\Title $title = null, \PhpOffice\PhpSpreadsheet\Chart\Legend $legend = null, \PhpOffice\PhpSpreadsheet\Chart\PlotArea $plotArea = null, $plotVisibleOnly = true, $displayBlanksAs = '0', \PhpOffice\PhpSpreadsheet\Chart\Title $xAxisLabel = null, \PhpOffice\PhpSpreadsheet\Chart\Title $yAxisLabel = null, \PhpOffice\PhpSpreadsheet\Chart\Axis $xAxis = null, \PhpOffice\PhpSpreadsheet\Chart\Axis $yAxis = null, \PhpOffice\PhpSpreadsheet\Chart\GridLines $majorGridlines = null, \PhpOffice\PhpSpreadsheet\Chart\GridLines $minorGridlines = null)
    {
    }
    /**
     * Get Name.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Get Worksheet.
     *
     * @return Worksheet
     */
    public function getWorksheet()
    {
    }
    /**
     * Set Worksheet.
     *
     * @param Worksheet $pValue
     *
     * @return Chart
     */
    public function setWorksheet(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pValue = null)
    {
    }
    /**
     * Get Title.
     *
     * @return Title
     */
    public function getTitle()
    {
    }
    /**
     * Set Title.
     *
     * @param Title $title
     *
     * @return Chart
     */
    public function setTitle(\PhpOffice\PhpSpreadsheet\Chart\Title $title)
    {
    }
    /**
     * Get Legend.
     *
     * @return Legend
     */
    public function getLegend()
    {
    }
    /**
     * Set Legend.
     *
     * @param Legend $legend
     *
     * @return Chart
     */
    public function setLegend(\PhpOffice\PhpSpreadsheet\Chart\Legend $legend)
    {
    }
    /**
     * Get X-Axis Label.
     *
     * @return Title
     */
    public function getXAxisLabel()
    {
    }
    /**
     * Set X-Axis Label.
     *
     * @param Title $label
     *
     * @return Chart
     */
    public function setXAxisLabel(\PhpOffice\PhpSpreadsheet\Chart\Title $label)
    {
    }
    /**
     * Get Y-Axis Label.
     *
     * @return Title
     */
    public function getYAxisLabel()
    {
    }
    /**
     * Set Y-Axis Label.
     *
     * @param Title $label
     *
     * @return Chart
     */
    public function setYAxisLabel(\PhpOffice\PhpSpreadsheet\Chart\Title $label)
    {
    }
    /**
     * Get Plot Area.
     *
     * @return PlotArea
     */
    public function getPlotArea()
    {
    }
    /**
     * Get Plot Visible Only.
     *
     * @return bool
     */
    public function getPlotVisibleOnly()
    {
    }
    /**
     * Set Plot Visible Only.
     *
     * @param bool $plotVisibleOnly
     *
     * @return Chart
     */
    public function setPlotVisibleOnly($plotVisibleOnly)
    {
    }
    /**
     * Get Display Blanks as.
     *
     * @return string
     */
    public function getDisplayBlanksAs()
    {
    }
    /**
     * Set Display Blanks as.
     *
     * @param string $displayBlanksAs
     *
     * @return Chart
     */
    public function setDisplayBlanksAs($displayBlanksAs)
    {
    }
    /**
     * Get yAxis.
     *
     * @return Axis
     */
    public function getChartAxisY()
    {
    }
    /**
     * Get xAxis.
     *
     * @return Axis
     */
    public function getChartAxisX()
    {
    }
    /**
     * Get Major Gridlines.
     *
     * @return GridLines
     */
    public function getMajorGridlines()
    {
    }
    /**
     * Get Minor Gridlines.
     *
     * @return GridLines
     */
    public function getMinorGridlines()
    {
    }
    /**
     * Set the Top Left position for the chart.
     *
     * @param string $cell
     * @param int $xOffset
     * @param int $yOffset
     *
     * @return Chart
     */
    public function setTopLeftPosition($cell, $xOffset = null, $yOffset = null)
    {
    }
    /**
     * Get the top left position of the chart.
     *
     * @return array an associative array containing the cell address, X-Offset and Y-Offset from the top left of that cell
     */
    public function getTopLeftPosition()
    {
    }
    /**
     * Get the cell address where the top left of the chart is fixed.
     *
     * @return string
     */
    public function getTopLeftCell()
    {
    }
    /**
     * Set the Top Left cell position for the chart.
     *
     * @param string $cell
     *
     * @return Chart
     */
    public function setTopLeftCell($cell)
    {
    }
    /**
     * Set the offset position within the Top Left cell for the chart.
     *
     * @param int $xOffset
     * @param int $yOffset
     *
     * @return Chart
     */
    public function setTopLeftOffset($xOffset, $yOffset)
    {
    }
    /**
     * Get the offset position within the Top Left cell for the chart.
     *
     * @return int[]
     */
    public function getTopLeftOffset()
    {
    }
    public function setTopLeftXOffset($xOffset)
    {
    }
    public function getTopLeftXOffset()
    {
    }
    public function setTopLeftYOffset($yOffset)
    {
    }
    public function getTopLeftYOffset()
    {
    }
    /**
     * Set the Bottom Right position of the chart.
     *
     * @param string $cell
     * @param int $xOffset
     * @param int $yOffset
     *
     * @return Chart
     */
    public function setBottomRightPosition($cell, $xOffset = null, $yOffset = null)
    {
    }
    /**
     * Get the bottom right position of the chart.
     *
     * @return array an associative array containing the cell address, X-Offset and Y-Offset from the top left of that cell
     */
    public function getBottomRightPosition()
    {
    }
    public function setBottomRightCell($cell)
    {
    }
    /**
     * Get the cell address where the bottom right of the chart is fixed.
     *
     * @return string
     */
    public function getBottomRightCell()
    {
    }
    /**
     * Set the offset position within the Bottom Right cell for the chart.
     *
     * @param int $xOffset
     * @param int $yOffset
     *
     * @return Chart
     */
    public function setBottomRightOffset($xOffset, $yOffset)
    {
    }
    /**
     * Get the offset position within the Bottom Right cell for the chart.
     *
     * @return int[]
     */
    public function getBottomRightOffset()
    {
    }
    public function setBottomRightXOffset($xOffset)
    {
    }
    public function getBottomRightXOffset()
    {
    }
    public function setBottomRightYOffset($yOffset)
    {
    }
    public function getBottomRightYOffset()
    {
    }
    public function refresh()
    {
    }
    /**
     * Render the chart to given file (or stream).
     *
     * @param string $outputDestination Name of the file render to
     *
     * @return bool true on success
     */
    public function render($outputDestination = null)
    {
    }
}