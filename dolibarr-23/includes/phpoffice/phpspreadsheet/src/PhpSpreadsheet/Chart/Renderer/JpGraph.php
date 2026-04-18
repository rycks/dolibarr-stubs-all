<?php

namespace PhpOffice\PhpSpreadsheet\Chart\Renderer;

class JpGraph implements \PhpOffice\PhpSpreadsheet\Chart\Renderer\IRenderer
{
    private static $width = 640;
    private static $height = 480;
    private static $colourSet = ['mediumpurple1', 'palegreen3', 'gold1', 'cadetblue1', 'darkmagenta', 'coral', 'dodgerblue3', 'eggplant', 'mediumblue', 'magenta', 'sandybrown', 'cyan', 'firebrick1', 'forestgreen', 'deeppink4', 'darkolivegreen', 'goldenrod2'];
    private static $markSet;
    private $chart;
    private $graph;
    private static $plotColour = 0;
    private static $plotMark = 0;
    /**
     * Create a new jpgraph.
     *
     * @param Chart $chart
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Chart\Chart $chart)
    {
    }
    private static function init()
    {
    }
    private function formatPointMarker($seriesPlot, $markerID)
    {
    }
    private function formatDataSetLabels($groupID, $datasetLabels, $labelCount, $rotation = '')
    {
    }
    private function percentageSumCalculation($groupID, $seriesCount)
    {
    }
    private function percentageAdjustValues($dataValues, $sumValues)
    {
    }
    private function getCaption($captionElement)
    {
    }
    private function renderTitle()
    {
    }
    private function renderLegend()
    {
    }
    private function renderCartesianPlotArea($type = 'textlin')
    {
    }
    private function renderPiePlotArea()
    {
    }
    private function renderRadarPlotArea()
    {
    }
    private function renderPlotLine($groupID, $filled = false, $combination = false, $dimensions = '2d')
    {
    }
    private function renderPlotBar($groupID, $dimensions = '2d')
    {
    }
    private function renderPlotScatter($groupID, $bubble)
    {
    }
    private function renderPlotRadar($groupID)
    {
    }
    private function renderPlotContour($groupID)
    {
    }
    private function renderPlotStock($groupID)
    {
    }
    private function renderAreaChart($groupCount, $dimensions = '2d')
    {
    }
    private function renderLineChart($groupCount, $dimensions = '2d')
    {
    }
    private function renderBarChart($groupCount, $dimensions = '2d')
    {
    }
    private function renderScatterChart($groupCount)
    {
    }
    private function renderBubbleChart($groupCount)
    {
    }
    private function renderPieChart($groupCount, $dimensions = '2d', $doughnut = false, $multiplePlots = false)
    {
    }
    private function renderRadarChart($groupCount)
    {
    }
    private function renderStockChart($groupCount)
    {
    }
    private function renderContourChart($groupCount, $dimensions)
    {
    }
    private function renderCombinationChart($groupCount, $dimensions, $outputDestination)
    {
    }
    public function render($outputDestination)
    {
    }
}