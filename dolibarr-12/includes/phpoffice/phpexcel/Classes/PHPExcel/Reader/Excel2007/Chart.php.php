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
 * @package		PHPExcel_Reader_Excel2007
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license		http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version		##VERSION##, ##DATE##
 */
/**
 * PHPExcel_Reader_Excel2007_Chart
 *
 * @category	PHPExcel
 * @package		PHPExcel_Reader_Excel2007
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Reader_Excel2007_Chart
{
    private static function _getAttribute($component, $name, $format)
    {
    }
    //	function _getAttribute()
    private static function _readColor($color, $background = \false)
    {
    }
    public static function readChart($chartElements, $chartName)
    {
    }
    //	function readChart()
    private static function _chartTitle($titleDetails, $namespacesChartMeta, $type)
    {
    }
    //	function _chartTitle()
    private static function _chartLayoutDetails($chartDetail, $namespacesChartMeta)
    {
    }
    //	function _chartLayoutDetails()
    private static function _chartDataSeries($chartDetail, $namespacesChartMeta, $plotType)
    {
    }
    //	function _chartDataSeries()
    private static function _chartDataSeriesValueSet($seriesDetail, $namespacesChartMeta, $marker = \null, $smoothLine = \false)
    {
    }
    //	function _chartDataSeriesValueSet()
    private static function _chartDataSeriesValues($seriesValueSet, $dataType = 'n')
    {
    }
    //	function _chartDataSeriesValues()
    private static function _chartDataSeriesValuesMultiLevel($seriesValueSet, $dataType = 'n')
    {
    }
    //	function _chartDataSeriesValuesMultiLevel()
    private static function _parseRichText($titleDetailPart = \null)
    {
    }
    private static function _readChartAttributes($chartDetail)
    {
    }
    private static function _setChartAttributes($plotArea, $plotAttributes)
    {
    }
}