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
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Writer_Excel2007_Chart
 *
 * @category   PHPExcel
 * @package    PHPExcel_Writer_Excel2007
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Writer_Excel2007_Chart extends \PHPExcel_Writer_Excel2007_WriterPart
{
    /**
     * Write charts to XML format
     *
     * @param  PHPExcel_Chart $pChart
     *
     * @return  string            XML Output
     * @throws  PHPExcel_Writer_Exception
     */
    public function writeChart(\PHPExcel_Chart $pChart = \NULL)
    {
    }
    /**
     * Write Chart Title
     *
     * @param  PHPExcel_Chart_Title $title
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writeTitle(\PHPExcel_Chart_Title $title = \NULL, $objWriter)
    {
    }
    /**
     * Write Chart Legend
     *
     * @param  PHPExcel_Chart_Legend $legend
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writeLegend(\PHPExcel_Chart_Legend $legend = \NULL, $objWriter)
    {
    }
    /**
     * Write Chart Plot Area
     *
     * @param  PHPExcel_Chart_PlotArea $plotArea
     * @param  PHPExcel_Chart_Title $xAxisLabel
     * @param  PHPExcel_Chart_Title $yAxisLabel
     * @param  PHPExcel_Chart_Axis $xAxis
     * @param  PHPExcel_Chart_Axis $yAxis
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writePlotArea(\PHPExcel_Chart_PlotArea $plotArea, \PHPExcel_Chart_Title $xAxisLabel = \NULL, \PHPExcel_Chart_Title $yAxisLabel = \NULL, $objWriter, \PHPExcel_Worksheet $pSheet, \PHPExcel_Chart_Axis $xAxis, \PHPExcel_Chart_Axis $yAxis, \PHPExcel_Chart_GridLines $majorGridlines, \PHPExcel_Chart_GridLines $minorGridlines)
    {
    }
    /**
     * Write Data Labels
     *
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     * @param  PHPExcel_Chart_Layout $chartLayout Chart layout
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writeDataLbls($objWriter, $chartLayout)
    {
    }
    /**
     * Write Category Axis
     *
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     * @param  PHPExcel_Chart_PlotArea $plotArea
     * @param  PHPExcel_Chart_Title $xAxisLabel
     * @param  string $groupType Chart type
     * @param  string $id1
     * @param  string $id2
     * @param  boolean $isMultiLevelSeries
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writeCatAx($objWriter, \PHPExcel_Chart_PlotArea $plotArea, $xAxisLabel, $groupType, $id1, $id2, $isMultiLevelSeries, $xAxis, $yAxis)
    {
    }
    /**
     * Write Value Axis
     *
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     * @param  PHPExcel_Chart_PlotArea $plotArea
     * @param  PHPExcel_Chart_Title $yAxisLabel
     * @param  string $groupType Chart type
     * @param  string $id1
     * @param  string $id2
     * @param  boolean $isMultiLevelSeries
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writeValAx($objWriter, \PHPExcel_Chart_PlotArea $plotArea, $yAxisLabel, $groupType, $id1, $id2, $isMultiLevelSeries, $xAxis, $yAxis, $majorGridlines, $minorGridlines)
    {
    }
    /**
     * Get the data series type(s) for a chart plot series
     *
     * @param  PHPExcel_Chart_PlotArea $plotArea
     *
     * @return  string|array
     * @throws  PHPExcel_Writer_Exception
     */
    private static function _getChartType($plotArea)
    {
    }
    /**
     * Write Plot Group (series of related plots)
     *
     * @param  PHPExcel_Chart_DataSeries $plotGroup
     * @param  string $groupType Type of plot for dataseries
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     * @param  boolean &$catIsMultiLevelSeries Is category a multi-series category
     * @param  boolean &$valIsMultiLevelSeries Is value set a multi-series set
     * @param  string &$plotGroupingType Type of grouping for multi-series values
     * @param  PHPExcel_Worksheet $pSheet
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writePlotGroup($plotGroup, $groupType, $objWriter, &$catIsMultiLevelSeries, &$valIsMultiLevelSeries, &$plotGroupingType, \PHPExcel_Worksheet $pSheet)
    {
    }
    /**
     * Write Plot Series Label
     *
     * @param  PHPExcel_Chart_DataSeriesValues $plotSeriesLabel
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writePlotSeriesLabel($plotSeriesLabel, $objWriter)
    {
    }
    /**
     * Write Plot Series Values
     *
     * @param  PHPExcel_Chart_DataSeriesValues $plotSeriesValues
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     * @param  string $groupType Type of plot for dataseries
     * @param  string $dataType Datatype of series values
     * @param  PHPExcel_Worksheet $pSheet
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writePlotSeriesValues($plotSeriesValues, $objWriter, $groupType, $dataType = 'str', \PHPExcel_Worksheet $pSheet)
    {
    }
    /**
     * Write Bubble Chart Details
     *
     * @param  PHPExcel_Chart_DataSeriesValues $plotSeriesValues
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writeBubbles($plotSeriesValues, $objWriter, \PHPExcel_Worksheet $pSheet)
    {
    }
    /**
     * Write Layout
     *
     * @param  PHPExcel_Chart_Layout $layout
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writeLayout(\PHPExcel_Chart_Layout $layout = \NULL, $objWriter)
    {
    }
    /**
     * Write Alternate Content block
     *
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writeAlternateContent($objWriter)
    {
    }
    /**
     * Write Printer Settings
     *
     * @param  PHPExcel_Shared_XMLWriter $objWriter XML Writer
     *
     * @throws  PHPExcel_Writer_Exception
     */
    private function _writePrintSettings($objWriter)
    {
    }
}