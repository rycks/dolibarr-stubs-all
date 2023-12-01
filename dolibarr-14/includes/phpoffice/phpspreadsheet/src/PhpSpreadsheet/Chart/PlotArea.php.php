<?php

namespace PhpOffice\PhpSpreadsheet\Chart;

class PlotArea
{
    /**
     * PlotArea Layout.
     *
     * @var Layout
     */
    private $layout;
    /**
     * Plot Series.
     *
     * @var DataSeries[]
     */
    private $plotSeries = [];
    /**
     * Create a new PlotArea.
     *
     * @param null|Layout $layout
     * @param DataSeries[] $plotSeries
     */
    public function __construct(\PhpOffice\PhpSpreadsheet\Chart\Layout $layout = null, array $plotSeries = [])
    {
    }
    /**
     * Get Layout.
     *
     * @return Layout
     */
    public function getLayout()
    {
    }
    /**
     * Get Number of Plot Groups.
     *
     * @return array of DataSeries
     */
    public function getPlotGroupCount()
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
     * Get Plot Series.
     *
     * @return array of DataSeries
     */
    public function getPlotGroup()
    {
    }
    /**
     * Get Plot Series by Index.
     *
     * @param mixed $index
     *
     * @return DataSeries
     */
    public function getPlotGroupByIndex($index)
    {
    }
    /**
     * Set Plot Series.
     *
     * @param DataSeries[] $plotSeries
     *
     * @return PlotArea
     */
    public function setPlotSeries(array $plotSeries)
    {
    }
    public function refresh(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet)
    {
    }
}