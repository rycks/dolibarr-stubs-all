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
 * PHPExcel_Chart_DataSeriesValues
 *
 * @category	PHPExcel
 * @package		PHPExcel_Chart
 * @copyright	Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 */
class PHPExcel_Chart_DataSeriesValues
{
    const DATASERIES_TYPE_STRING = 'String';
    const DATASERIES_TYPE_NUMBER = 'Number';
    private static $_dataTypeValues = array(self::DATASERIES_TYPE_STRING, self::DATASERIES_TYPE_NUMBER);
    /**
     * Series Data Type
     *
     * @var	string
     */
    private $_dataType = \null;
    /**
     * Series Data Source
     *
     * @var	string
     */
    private $_dataSource = \null;
    /**
     * Format Code
     *
     * @var	string
     */
    private $_formatCode = \null;
    /**
     * Series Point Marker
     *
     * @var	string
     */
    private $_marker = \null;
    /**
     * Point Count (The number of datapoints in the dataseries)
     *
     * @var	integer
     */
    private $_pointCount = 0;
    /**
     * Data Values
     *
     * @var	array of mixed
     */
    private $_dataValues = array();
    /**
     * Create a new PHPExcel_Chart_DataSeriesValues object
     */
    public function __construct($dataType = self::DATASERIES_TYPE_NUMBER, $dataSource = \null, $formatCode = \null, $pointCount = 0, $dataValues = array(), $marker = \null)
    {
    }
    /**
     * Get Series Data Type
     *
     * @return	string
     */
    public function getDataType()
    {
    }
    /**
     * Set Series Data Type
     *
     * @param	string	$dataType	Datatype of this data series
     *								Typical values are:
     *									PHPExcel_Chart_DataSeriesValues::DATASERIES_TYPE_STRING
     *										Normally used for axis point values
     *									PHPExcel_Chart_DataSeriesValues::DATASERIES_TYPE_NUMBER
     *										Normally used for chart data values
     * @return	PHPExcel_Chart_DataSeriesValues
     */
    public function setDataType($dataType = self::DATASERIES_TYPE_NUMBER)
    {
    }
    /**
     * Get Series Data Source (formula)
     *
     * @return	string
     */
    public function getDataSource()
    {
    }
    /**
     * Set Series Data Source (formula)
     *
     * @param	string	$dataSource
     * @return	PHPExcel_Chart_DataSeriesValues
     */
    public function setDataSource($dataSource = \null, $refreshDataValues = \true)
    {
    }
    /**
     * Get Point Marker
     *
     * @return string
     */
    public function getPointMarker()
    {
    }
    /**
     * Set Point Marker
     *
     * @param	string	$marker
     * @return	PHPExcel_Chart_DataSeriesValues
     */
    public function setPointMarker($marker = \null)
    {
    }
    /**
     * Get Series Format Code
     *
     * @return	string
     */
    public function getFormatCode()
    {
    }
    /**
     * Set Series Format Code
     *
     * @param	string	$formatCode
     * @return	PHPExcel_Chart_DataSeriesValues
     */
    public function setFormatCode($formatCode = \null)
    {
    }
    /**
     * Get Series Point Count
     *
     * @return	integer
     */
    public function getPointCount()
    {
    }
    /**
     * Identify if the Data Series is a multi-level or a simple series
     *
     * @return	boolean
     */
    public function isMultiLevelSeries()
    {
    }
    /**
     * Return the level count of a multi-level Data Series
     *
     * @return	boolean
     */
    public function multiLevelCount()
    {
    }
    /**
     * Get Series Data Values
     *
     * @return	array of mixed
     */
    public function getDataValues()
    {
    }
    /**
     * Get the first Series Data value
     *
     * @return	mixed
     */
    public function getDataValue()
    {
    }
    /**
     * Set Series Data Values
     *
     * @param	array	$dataValues
     * @param	boolean	$refreshDataSource
     *					TRUE - refresh the value of _dataSource based on the values of $dataValues
     *					FALSE - don't change the value of _dataSource
     * @return	PHPExcel_Chart_DataSeriesValues
     */
    public function setDataValues($dataValues = array(), $refreshDataSource = \TRUE)
    {
    }
    private function _stripNulls($var)
    {
    }
    public function refresh(\PHPExcel_Worksheet $worksheet, $flatten = \TRUE)
    {
    }
}