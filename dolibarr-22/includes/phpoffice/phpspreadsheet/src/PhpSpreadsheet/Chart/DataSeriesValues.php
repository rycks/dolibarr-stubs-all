<?php

namespace PhpOffice\PhpSpreadsheet\Chart;

class DataSeriesValues
{
    const DATASERIES_TYPE_STRING = 'String';
    const DATASERIES_TYPE_NUMBER = 'Number';
    private static $dataTypeValues = [self::DATASERIES_TYPE_STRING, self::DATASERIES_TYPE_NUMBER];
    /**
     * Series Data Type.
     *
     * @var string
     */
    private $dataType;
    /**
     * Series Data Source.
     *
     * @var string
     */
    private $dataSource;
    /**
     * Format Code.
     *
     * @var string
     */
    private $formatCode;
    /**
     * Series Point Marker.
     *
     * @var string
     */
    private $pointMarker;
    /**
     * Point Count (The number of datapoints in the dataseries).
     *
     * @var int
     */
    private $pointCount = 0;
    /**
     * Data Values.
     *
     * @var array of mixed
     */
    private $dataValues = [];
    /**
     * Fill color (can be array with colors if dataseries have custom colors).
     *
     * @var string|string[]
     */
    private $fillColor;
    /**
     * Line Width.
     *
     * @var int
     */
    private $lineWidth = 12700;
    /**
     * Create a new DataSeriesValues object.
     *
     * @param string $dataType
     * @param string $dataSource
     * @param null|mixed $formatCode
     * @param int $pointCount
     * @param mixed $dataValues
     * @param null|mixed $marker
     * @param null|string|string[] $fillColor
     */
    public function __construct($dataType = self::DATASERIES_TYPE_NUMBER, $dataSource = null, $formatCode = null, $pointCount = 0, $dataValues = [], $marker = null, $fillColor = null)
    {
    }
    /**
     * Get Series Data Type.
     *
     * @return string
     */
    public function getDataType()
    {
    }
    /**
     * Set Series Data Type.
     *
     * @param string $dataType Datatype of this data series
     *                                Typical values are:
     *                                    DataSeriesValues::DATASERIES_TYPE_STRING
     *                                        Normally used for axis point values
     *                                    DataSeriesValues::DATASERIES_TYPE_NUMBER
     *                                        Normally used for chart data values
     *
     * @throws Exception
     *
     * @return $this
     */
    public function setDataType($dataType)
    {
    }
    /**
     * Get Series Data Source (formula).
     *
     * @return string
     */
    public function getDataSource()
    {
    }
    /**
     * Set Series Data Source (formula).
     *
     * @param string $dataSource
     *
     * @return $this
     */
    public function setDataSource($dataSource)
    {
    }
    /**
     * Get Point Marker.
     *
     * @return string
     */
    public function getPointMarker()
    {
    }
    /**
     * Set Point Marker.
     *
     * @param string $marker
     *
     * @return $this
     */
    public function setPointMarker($marker)
    {
    }
    /**
     * Get Series Format Code.
     *
     * @return string
     */
    public function getFormatCode()
    {
    }
    /**
     * Set Series Format Code.
     *
     * @param string $formatCode
     *
     * @return $this
     */
    public function setFormatCode($formatCode)
    {
    }
    /**
     * Get Series Point Count.
     *
     * @return int
     */
    public function getPointCount()
    {
    }
    /**
     * Get fill color.
     *
     * @return string|string[] HEX color or array with HEX colors
     */
    public function getFillColor()
    {
    }
    /**
     * Set fill color for series.
     *
     * @param string|string[] $color HEX color or array with HEX colors
     *
     * @return   DataSeriesValues
     */
    public function setFillColor($color)
    {
    }
    /**
     * Method for validating hex color.
     *
     * @param string $color value for color
     *
     * @throws \Exception thrown if color is invalid
     *
     * @return bool true if validation was successful
     */
    private function validateColor($color)
    {
    }
    /**
     * Get line width for series.
     *
     * @return int
     */
    public function getLineWidth()
    {
    }
    /**
     * Set line width for the series.
     *
     * @param int $width
     *
     * @return $this
     */
    public function setLineWidth($width)
    {
    }
    /**
     * Identify if the Data Series is a multi-level or a simple series.
     *
     * @return null|bool
     */
    public function isMultiLevelSeries()
    {
    }
    /**
     * Return the level count of a multi-level Data Series.
     *
     * @return int
     */
    public function multiLevelCount()
    {
    }
    /**
     * Get Series Data Values.
     *
     * @return array of mixed
     */
    public function getDataValues()
    {
    }
    /**
     * Get the first Series Data value.
     *
     * @return mixed
     */
    public function getDataValue()
    {
    }
    /**
     * Set Series Data Values.
     *
     * @param array $dataValues
     *
     * @return $this
     */
    public function setDataValues($dataValues)
    {
    }
    public function refresh(\PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $worksheet, $flatten = true)
    {
    }
}