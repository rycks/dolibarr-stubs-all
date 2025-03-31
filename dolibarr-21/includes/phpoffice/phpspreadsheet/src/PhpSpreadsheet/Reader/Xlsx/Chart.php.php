<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Chart
{
    /**
     * @param SimpleXMLElement $component
     * @param string $name
     * @param string $format
     *
     * @return null|bool|float|int|string
     */
    private static function getAttribute(\SimpleXMLElement $component, $name, $format)
    {
    }
    private static function readColor($color, $background = false)
    {
    }
    /**
     * @param SimpleXMLElement $chartElements
     * @param string $chartName
     *
     * @return \PhpOffice\PhpSpreadsheet\Chart\Chart
     */
    public static function readChart(\SimpleXMLElement $chartElements, $chartName)
    {
    }
    private static function chartTitle(\SimpleXMLElement $titleDetails, array $namespacesChartMeta)
    {
    }
    private static function chartLayoutDetails($chartDetail, $namespacesChartMeta)
    {
    }
    private static function chartDataSeries($chartDetail, $namespacesChartMeta, $plotType)
    {
    }
    private static function chartDataSeriesValueSet($seriesDetail, $namespacesChartMeta, $marker = null)
    {
    }
    private static function chartDataSeriesValues($seriesValueSet, $dataType = 'n')
    {
    }
    private static function chartDataSeriesValuesMultiLevel($seriesValueSet, $dataType = 'n')
    {
    }
    private static function parseRichText(\SimpleXMLElement $titleDetailPart)
    {
    }
    private static function readChartAttributes($chartDetail)
    {
    }
    /**
     * @param Layout $plotArea
     * @param mixed $plotAttributes
     */
    private static function setChartAttributes(\PhpOffice\PhpSpreadsheet\Chart\Layout $plotArea, $plotAttributes)
    {
    }
}