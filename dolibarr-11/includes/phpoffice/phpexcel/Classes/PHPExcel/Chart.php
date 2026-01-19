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
 * @category	PHPExcel
 * @package		PHPExcel_Chart
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license		http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version		##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Chart
 *
 * @category	PHPExcel
 * @package		PHPExcel_Chart
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Chart
{
    /**
     * Chart Name
     *
     * @var string
     */
    private $_name = '';
    /**
     * Worksheet
     *
     * @var PHPExcel_Worksheet
     */
    private $_worksheet = \null;
    /**
     * Chart Title
     *
     * @var PHPExcel_Chart_Title
     */
    private $_title = \null;
    /**
     * Chart Legend
     *
     * @var PHPExcel_Chart_Legend
     */
    private $_legend = \null;
    /**
     * X-Axis Label
     *
     * @var PHPExcel_Chart_Title
     */
    private $_xAxisLabel = \null;
    /**
     * Y-Axis Label
     *
     * @var PHPExcel_Chart_Title
     */
    private $_yAxisLabel = \null;
    /**
     * Chart Plot Area
     *
     * @var PHPExcel_Chart_PlotArea
     */
    private $_plotArea = \null;
    /**
     * Plot Visible Only
     *
     * @var boolean
     */
    private $_plotVisibleOnly = \true;
    /**
     * Display Blanks as
     *
     * @var string
     */
    private $_displayBlanksAs = '0';
    /**
     * Chart Asix Y as
     *
     * @var PHPExcel_Chart_Axis
     */
    private $_yAxis = \null;
    /**
     * Chart Asix X as
     *
     * @var PHPExcel_Chart_Axis
     */
    private $_xAxis = \null;
    /**
     * Chart Major Gridlines as
     *
     * @var PHPExcel_Chart_GridLines
     */
    private $_majorGridlines = \null;
    /**
     * Chart Minor Gridlines as
     *
     * @var PHPExcel_Chart_GridLines
     */
    private $_minorGridlines = \null;
    /**
     * Top-Left Cell Position
     *
     * @var string
     */
    private $_topLeftCellRef = 'A1';
    /**
     * Top-Left X-Offset
     *
     * @var integer
     */
    private $_topLeftXOffset = 0;
    /**
     * Top-Left Y-Offset
     *
     * @var integer
     */
    private $_topLeftYOffset = 0;
    /**
     * Bottom-Right Cell Position
     *
     * @var string
     */
    private $_bottomRightCellRef = 'A1';
    /**
     * Bottom-Right X-Offset
     *
     * @var integer
     */
    private $_bottomRightXOffset = 10;
    /**
     * Bottom-Right Y-Offset
     *
     * @var integer
     */
    private $_bottomRightYOffset = 10;
    /**
     * Create a new PHPExcel_Chart
     */
    public function __construct($name, \PHPExcel_Chart_Title $title = \null, \PHPExcel_Chart_Legend $legend = \null, \PHPExcel_Chart_PlotArea $plotArea = \null, $plotVisibleOnly = \true, $displayBlanksAs = '0', \PHPExcel_Chart_Title $xAxisLabel = \null, \PHPExcel_Chart_Title $yAxisLabel = \null, \PHPExcel_Chart_Axis $xAxis = \null, \PHPExcel_Chart_Axis $yAxis = \null, \PHPExcel_Chart_GridLines $majorGridlines = \null, \PHPExcel_Chart_GridLines $minorGridlines = \null)
    {
    }
    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Get Worksheet
     *
     * @return PHPExcel_Worksheet
     */
    public function getWorksheet()
    {
    }
    /**
     * Set Worksheet
     *
     * @param	PHPExcel_Worksheet	$pValue
     * @throws	PHPExcel_Chart_Exception
     * @return PHPExcel_Chart
     */
    public function setWorksheet(\PHPExcel_Worksheet $pValue = \null)
    {
    }
    /**
     * Get Title
     *
     * @return PHPExcel_Chart_Title
     */
    public function getTitle()
    {
    }
    /**
     * Set Title
     *
     * @param	PHPExcel_Chart_Title $title
     * @return	PHPExcel_Chart
     */
    public function setTitle(\PHPExcel_Chart_Title $title)
    {
    }
    /**
     * Get Legend
     *
     * @return PHPExcel_Chart_Legend
     */
    public function getLegend()
    {
    }
    /**
     * Set Legend
     *
     * @param	PHPExcel_Chart_Legend $legend
     * @return	PHPExcel_Chart
     */
    public function setLegend(\PHPExcel_Chart_Legend $legend)
    {
    }
    /**
     * Get X-Axis Label
     *
     * @return PHPExcel_Chart_Title
     */
    public function getXAxisLabel()
    {
    }
    /**
     * Set X-Axis Label
     *
     * @param	PHPExcel_Chart_Title $label
     * @return	PHPExcel_Chart
     */
    public function setXAxisLabel(\PHPExcel_Chart_Title $label)
    {
    }
    /**
     * Get Y-Axis Label
     *
     * @return PHPExcel_Chart_Title
     */
    public function getYAxisLabel()
    {
    }
    /**
     * Set Y-Axis Label
     *
     * @param	PHPExcel_Chart_Title $label
     * @return	PHPExcel_Chart
     */
    public function setYAxisLabel(\PHPExcel_Chart_Title $label)
    {
    }
    /**
     * Get Plot Area
     *
     * @return PHPExcel_Chart_PlotArea
     */
    public function getPlotArea()
    {
    }
    /**
     * Get Plot Visible Only
     *
     * @return boolean
     */
    public function getPlotVisibleOnly()
    {
    }
    /**
     * Set Plot Visible Only
     *
     * @param boolean $plotVisibleOnly
     * @return PHPExcel_Chart
     */
    public function setPlotVisibleOnly($plotVisibleOnly = \true)
    {
    }
    /**
     * Get Display Blanks as
     *
     * @return string
     */
    public function getDisplayBlanksAs()
    {
    }
    /**
     * Set Display Blanks as
     *
     * @param string $displayBlanksAs
     * @return PHPExcel_Chart
     */
    public function setDisplayBlanksAs($displayBlanksAs = '0')
    {
    }
    /**
     * Get yAxis
     *
     * @return PHPExcel_Chart_Axis
     */
    public function getChartAxisY()
    {
    }
    /**
     * Get xAxis
     *
     * @return PHPExcel_Chart_Axis
     */
    public function getChartAxisX()
    {
    }
    /**
     * Get Major Gridlines
     *
     * @return PHPExcel_Chart_GridLines
     */
    public function getMajorGridlines()
    {
    }
    /**
     * Get Minor Gridlines
     *
     * @return PHPExcel_Chart_GridLines
     */
    public function getMinorGridlines()
    {
    }
    /**
     * Set the Top Left position for the chart
     *
     * @param	string	$cell
     * @param	integer	$xOffset
     * @param	integer	$yOffset
     * @return PHPExcel_Chart
     */
    public function setTopLeftPosition($cell, $xOffset = \null, $yOffset = \null)
    {
    }
    /**
     * Get the top left position of the chart
     *
     * @return array	an associative array containing the cell address, X-Offset and Y-Offset from the top left of that cell
     */
    public function getTopLeftPosition()
    {
    }
    /**
     * Get the cell address where the top left of the chart is fixed
     *
     * @return string
     */
    public function getTopLeftCell()
    {
    }
    /**
     * Set the Top Left cell position for the chart
     *
     * @param	string	$cell
     * @return PHPExcel_Chart
     */
    public function setTopLeftCell($cell)
    {
    }
    /**
     * Set the offset position within the Top Left cell for the chart
     *
     * @param	integer	$xOffset
     * @param	integer	$yOffset
     * @return PHPExcel_Chart
     */
    public function setTopLeftOffset($xOffset = \null, $yOffset = \null)
    {
    }
    /**
     * Get the offset position within the Top Left cell for the chart
     *
     * @return integer[]
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
     * Set the Bottom Right position of the chart
     *
     * @param	string	$cell
     * @param	integer	$xOffset
     * @param	integer	$yOffset
     * @return PHPExcel_Chart
     */
    public function setBottomRightPosition($cell, $xOffset = \null, $yOffset = \null)
    {
    }
    /**
     * Get the bottom right position of the chart
     *
     * @return array	an associative array containing the cell address, X-Offset and Y-Offset from the top left of that cell
     */
    public function getBottomRightPosition()
    {
    }
    public function setBottomRightCell($cell)
    {
    }
    /**
     * Get the cell address where the bottom right of the chart is fixed
     *
     * @return string
     */
    public function getBottomRightCell()
    {
    }
    /**
     * Set the offset position within the Bottom Right cell for the chart
     *
     * @param	integer	$xOffset
     * @param	integer	$yOffset
     * @return PHPExcel_Chart
     */
    public function setBottomRightOffset($xOffset = \null, $yOffset = \null)
    {
    }
    /**
     * Get the offset position within the Bottom Right cell for the chart
     *
     * @return integer[]
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
    public function render($outputDestination = \null)
    {
    }
}