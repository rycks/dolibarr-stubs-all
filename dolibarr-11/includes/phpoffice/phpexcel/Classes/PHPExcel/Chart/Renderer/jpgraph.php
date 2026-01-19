<?php

/**
 * PHPExcel_Chart_Renderer_jpgraph
 *
 * @category	PHPExcel
 * @package		PHPExcel_Chart_Renderer
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Chart_Renderer_jpgraph
{
    private static $_width = 640;
    private static $_height = 480;
    private static $_colourSet = array('mediumpurple1', 'palegreen3', 'gold1', 'cadetblue1', 'darkmagenta', 'coral', 'dodgerblue3', 'eggplant', 'mediumblue', 'magenta', 'sandybrown', 'cyan', 'firebrick1', 'forestgreen', 'deeppink4', 'darkolivegreen', 'goldenrod2');
    private static $_markSet = array('diamond' => \MARK_DIAMOND, 'square' => \MARK_SQUARE, 'triangle' => \MARK_UTRIANGLE, 'x' => \MARK_X, 'star' => \MARK_STAR, 'dot' => \MARK_FILLEDCIRCLE, 'dash' => \MARK_DTRIANGLE, 'circle' => \MARK_CIRCLE, 'plus' => \MARK_CROSS);
    private $_chart = \null;
    private $_graph = \null;
    private static $_plotColour = 0;
    private static $_plotMark = 0;
    private function _formatPointMarker($seriesPlot, $markerID)
    {
    }
    //	function _formatPointMarker()
    private function _formatDataSetLabels($groupID, $datasetLabels, $labelCount, $rotation = '')
    {
    }
    //	function _formatDataSetLabels()
    private function _percentageSumCalculation($groupID, $seriesCount)
    {
    }
    //	function _percentageSumCalculation()
    private function _percentageAdjustValues($dataValues, $sumValues)
    {
    }
    //	function _percentageAdjustValues()
    private function _getCaption($captionElement)
    {
    }
    //	function _getCaption()
    private function _renderTitle()
    {
    }
    //	function _renderTitle()
    private function _renderLegend()
    {
    }
    //	function _renderLegend()
    private function _renderCartesianPlotArea($type = 'textlin')
    {
    }
    //	function _renderCartesianPlotArea()
    private function _renderPiePlotArea($doughnut = \False)
    {
    }
    //	function _renderPiePlotArea()
    private function _renderRadarPlotArea()
    {
    }
    //	function _renderRadarPlotArea()
    private function _renderPlotLine($groupID, $filled = \false, $combination = \false, $dimensions = '2d')
    {
    }
    //	function _renderPlotLine()
    private function _renderPlotBar($groupID, $dimensions = '2d')
    {
    }
    //	function _renderPlotBar()
    private function _renderPlotScatter($groupID, $bubble)
    {
    }
    //	function _renderPlotScatter()
    private function _renderPlotRadar($groupID)
    {
    }
    //	function _renderPlotRadar()
    private function _renderPlotContour($groupID)
    {
    }
    //	function _renderPlotContour()
    private function _renderPlotStock($groupID)
    {
    }
    //	function _renderPlotStock()
    private function _renderAreaChart($groupCount, $dimensions = '2d')
    {
    }
    //	function _renderAreaChart()
    private function _renderLineChart($groupCount, $dimensions = '2d')
    {
    }
    //	function _renderLineChart()
    private function _renderBarChart($groupCount, $dimensions = '2d')
    {
    }
    //	function _renderBarChart()
    private function _renderScatterChart($groupCount)
    {
    }
    //	function _renderScatterChart()
    private function _renderBubbleChart($groupCount)
    {
    }
    //	function _renderBubbleChart()
    private function _renderPieChart($groupCount, $dimensions = '2d', $doughnut = \False, $multiplePlots = \False)
    {
    }
    //	function _renderPieChart()
    private function _renderRadarChart($groupCount)
    {
    }
    //	function _renderRadarChart()
    private function _renderStockChart($groupCount)
    {
    }
    //	function _renderStockChart()
    private function _renderContourChart($groupCount, $dimensions)
    {
    }
    //	function _renderContourChart()
    private function _renderCombinationChart($groupCount, $dimensions, $outputDestination)
    {
    }
    //	function _renderCombinationChart()
    public function render($outputDestination)
    {
    }
    //	function render()
    /**
     * Create a new PHPExcel_Chart_Renderer_jpgraph
     */
    public function __construct(\PHPExcel_Chart $chart)
    {
    }
    //	function __construct()
}