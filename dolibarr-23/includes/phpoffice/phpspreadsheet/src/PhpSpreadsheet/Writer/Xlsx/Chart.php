<?php

namespace PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Chart extends \PhpOffice\PhpSpreadsheet\Writer\Xlsx\WriterPart
{
    protected $calculateCellValues;
    /**
     * @var int
     */
    private $seriesIndex;
    /**
     * Write charts to XML format.
     *
     * @param \PhpOffice\PhpSpreadsheet\Chart\Chart $pChart
     * @param mixed $calculateCellValues
     *
     * @throws WriterException
     *
     * @return string XML Output
     */
    public function writeChart(\PhpOffice\PhpSpreadsheet\Chart\Chart $pChart, $calculateCellValues = true)
    {
    }
    /**
     * Write Chart Title.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Title $title
     *
     * @throws WriterException
     */
    private function writeTitle(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Chart\Title $title = null)
    {
    }
    /**
     * Write Chart Legend.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Legend $legend
     *
     * @throws WriterException
     */
    private function writeLegend(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Chart\Legend $legend = null)
    {
    }
    /**
     * Write Chart Plot Area.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet
     * @param PlotArea $plotArea
     * @param Title $xAxisLabel
     * @param Title $yAxisLabel
     * @param Axis $xAxis
     * @param Axis $yAxis
     * @param null|GridLines $majorGridlines
     * @param null|GridLines $minorGridlines
     *
     * @throws WriterException
     */
    private function writePlotArea(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $pSheet, \PhpOffice\PhpSpreadsheet\Chart\PlotArea $plotArea, \PhpOffice\PhpSpreadsheet\Chart\Title $xAxisLabel = null, \PhpOffice\PhpSpreadsheet\Chart\Title $yAxisLabel = null, \PhpOffice\PhpSpreadsheet\Chart\Axis $xAxis = null, \PhpOffice\PhpSpreadsheet\Chart\Axis $yAxis = null, \PhpOffice\PhpSpreadsheet\Chart\GridLines $majorGridlines = null, \PhpOffice\PhpSpreadsheet\Chart\GridLines $minorGridlines = null)
    {
    }
    /**
     * Write Data Labels.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param \PhpOffice\PhpSpreadsheet\Chart\Layout $chartLayout Chart layout
     */
    private function writeDataLabels(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Chart\Layout $chartLayout = null)
    {
    }
    /**
     * Write Category Axis.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Title $xAxisLabel
     * @param string $id1
     * @param string $id2
     * @param bool $isMultiLevelSeries
     * @param Axis $yAxis
     *
     * @throws WriterException
     */
    private function writeCategoryAxis($objWriter, $xAxisLabel, $id1, $id2, $isMultiLevelSeries, \PhpOffice\PhpSpreadsheet\Chart\Axis $yAxis)
    {
    }
    /**
     * Write Value Axis.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Title $yAxisLabel
     * @param string $groupType Chart type
     * @param string $id1
     * @param string $id2
     * @param bool $isMultiLevelSeries
     * @param Axis $xAxis
     * @param GridLines $majorGridlines
     * @param GridLines $minorGridlines
     *
     * @throws WriterException
     */
    private function writeValueAxis($objWriter, $yAxisLabel, $groupType, $id1, $id2, $isMultiLevelSeries, \PhpOffice\PhpSpreadsheet\Chart\Axis $xAxis, \PhpOffice\PhpSpreadsheet\Chart\GridLines $majorGridlines, \PhpOffice\PhpSpreadsheet\Chart\GridLines $minorGridlines)
    {
    }
    /**
     * Get the data series type(s) for a chart plot series.
     *
     * @param PlotArea $plotArea
     *
     * @throws WriterException
     *
     * @return array|string
     */
    private static function getChartType($plotArea)
    {
    }
    /**
     * Method writing plot series values.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param int       $val       value for idx (default: 3)
     * @param string    $fillColor hex color (default: FF9900)
     *
     * @return XMLWriter XML Writer
     */
    private function writePlotSeriesValuesElement($objWriter, $val = 3, $fillColor = 'FF9900')
    {
    }
    /**
     * Write Plot Group (series of related plots).
     *
     * @param DataSeries $plotGroup
     * @param string $groupType Type of plot for dataseries
     * @param XMLWriter $objWriter XML Writer
     * @param bool &$catIsMultiLevelSeries Is category a multi-series category
     * @param bool &$valIsMultiLevelSeries Is value set a multi-series set
     * @param string &$plotGroupingType Type of grouping for multi-series values
     *
     * @throws WriterException
     */
    private function writePlotGroup($plotGroup, $groupType, $objWriter, &$catIsMultiLevelSeries, &$valIsMultiLevelSeries, &$plotGroupingType)
    {
    }
    /**
     * Write Plot Series Label.
     *
     * @param DataSeriesValues $plotSeriesLabel
     * @param XMLWriter $objWriter XML Writer
     */
    private function writePlotSeriesLabel($plotSeriesLabel, $objWriter)
    {
    }
    /**
     * Write Plot Series Values.
     *
     * @param DataSeriesValues $plotSeriesValues
     * @param XMLWriter $objWriter XML Writer
     * @param string $groupType Type of plot for dataseries
     * @param string $dataType Datatype of series values
     */
    private function writePlotSeriesValues($plotSeriesValues, \PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, $groupType, $dataType = 'str')
    {
    }
    /**
     * Write Bubble Chart Details.
     *
     * @param DataSeriesValues $plotSeriesValues
     * @param XMLWriter $objWriter XML Writer
     */
    private function writeBubbles($plotSeriesValues, $objWriter)
    {
    }
    /**
     * Write Layout.
     *
     * @param XMLWriter $objWriter XML Writer
     * @param Layout $layout
     */
    private function writeLayout(\PhpOffice\PhpSpreadsheet\Shared\XMLWriter $objWriter, \PhpOffice\PhpSpreadsheet\Chart\Layout $layout = null)
    {
    }
    /**
     * Write Alternate Content block.
     *
     * @param XMLWriter $objWriter XML Writer
     */
    private function writeAlternateContent($objWriter)
    {
    }
    /**
     * Write Printer Settings.
     *
     * @param XMLWriter $objWriter XML Writer
     */
    private function writePrintSettings($objWriter)
    {
    }
}