<?php

/**
 * Created by PhpStorm.
 * User: Wiktor Trzonkowski
 * Date: 6/17/14
 * Time: 12:11 PM
 */
class PHPExcel_Chart_Axis extends \PHPExcel_Properties
{
    /**
     * Axis Number
     *
     * @var  array of mixed
     */
    private $_axis_number = array('format' => self::FORMAT_CODE_GENERAL, 'source_linked' => 1);
    /**
     * Axis Options
     *
     * @var  array of mixed
     */
    private $_axis_options = array('minimum' => \NULL, 'maximum' => \NULL, 'major_unit' => \NULL, 'minor_unit' => \NULL, 'orientation' => self::ORIENTATION_NORMAL, 'minor_tick_mark' => self::TICK_MARK_NONE, 'major_tick_mark' => self::TICK_MARK_NONE, 'axis_labels' => self::AXIS_LABELS_NEXT_TO, 'horizontal_crosses' => self::HORIZONTAL_CROSSES_AUTOZERO, 'horizontal_crosses_value' => \NULL);
    /**
     * Fill Properties
     *
     * @var  array of mixed
     */
    private $_fill_properties = array('type' => self::EXCEL_COLOR_TYPE_ARGB, 'value' => \NULL, 'alpha' => 0);
    /**
     * Line Properties
     *
     * @var  array of mixed
     */
    private $_line_properties = array('type' => self::EXCEL_COLOR_TYPE_ARGB, 'value' => \NULL, 'alpha' => 0);
    /**
     * Line Style Properties
     *
     * @var  array of mixed
     */
    private $_line_style_properties = array('width' => '9525', 'compound' => self::LINE_STYLE_COMPOUND_SIMPLE, 'dash' => self::LINE_STYLE_DASH_SOLID, 'cap' => self::LINE_STYLE_CAP_FLAT, 'join' => self::LINE_STYLE_JOIN_BEVEL, 'arrow' => array('head' => array('type' => self::LINE_STYLE_ARROW_TYPE_NOARROW, 'size' => self::LINE_STYLE_ARROW_SIZE_5), 'end' => array('type' => self::LINE_STYLE_ARROW_TYPE_NOARROW, 'size' => self::LINE_STYLE_ARROW_SIZE_8)));
    /**
     * Shadow Properties
     *
     * @var  array of mixed
     */
    private $_shadow_properties = array('presets' => self::SHADOW_PRESETS_NOSHADOW, 'effect' => \NULL, 'color' => array('type' => self::EXCEL_COLOR_TYPE_STANDARD, 'value' => 'black', 'alpha' => 40), 'size' => array('sx' => \NULL, 'sy' => \NULL, 'kx' => \NULL), 'blur' => \NULL, 'direction' => \NULL, 'distance' => \NULL, 'algn' => \NULL, 'rotWithShape' => \NULL);
    /**
     * Glow Properties
     *
     * @var  array of mixed
     */
    private $_glow_properties = array('size' => \NULL, 'color' => array('type' => self::EXCEL_COLOR_TYPE_STANDARD, 'value' => 'black', 'alpha' => 40));
    /**
     * Soft Edge Properties
     *
     * @var  array of mixed
     */
    private $_soft_edges = array('size' => \NULL);
    /**
     * Get Series Data Type
     *
     * @return  string
     */
    public function setAxisNumberProperties($format_code)
    {
    }
    /**
     * Get Axis Number Format Data Type
     *
     * @return  string
     */
    public function getAxisNumberFormat()
    {
    }
    /**
     * Get Axis Number Source Linked
     *
     * @return  string
     */
    public function getAxisNumberSourceLinked()
    {
    }
    /**
     * Set Axis Options Properties
     *
     * @param string $axis_labels
     * @param string $horizontal_crosses_value
     * @param string $horizontal_crosses
     * @param string $axis_orientation
     * @param string $major_tmt
     * @param string $minor_tmt
     * @param string $minimum
     * @param string $maximum
     * @param string $major_unit
     * @param string $minor_unit
     *
     */
    public function setAxisOptionsProperties($axis_labels, $horizontal_crosses_value = \NULL, $horizontal_crosses = \NULL, $axis_orientation = \NULL, $major_tmt = \NULL, $minor_tmt = \NULL, $minimum = \NULL, $maximum = \NULL, $major_unit = \NULL, $minor_unit = \NULL)
    {
    }
    /**
     * Get Axis Options Property
     *
     * @param string $property
     *
     * @return string
     */
    public function getAxisOptionsProperty($property)
    {
    }
    /**
     * Set Axis Orientation Property
     *
     * @param string $orientation
     *
     */
    public function setAxisOrientation($orientation)
    {
    }
    /**
     * Set Fill Property
     *
     * @param string $color
     * @param int $alpha
     * @param string $type
     *
     */
    public function setFillParameters($color, $alpha = 0, $type = self::EXCEL_COLOR_TYPE_ARGB)
    {
    }
    /**
     * Set Line Property
     *
     * @param string $color
     * @param int $alpha
     * @param string $type
     *
     */
    public function setLineParameters($color, $alpha = 0, $type = self::EXCEL_COLOR_TYPE_ARGB)
    {
    }
    /**
     * Get Fill Property
     *
     * @param string $property
     *
     * @return string
     */
    public function getFillProperty($property)
    {
    }
    /**
     * Get Line Property
     *
     * @param string $property
     *
     * @return string
     */
    public function getLineProperty($property)
    {
    }
    /**
     * Set Line Style Properties
     *
     * @param float $line_width
     * @param string $compound_type
     * @param string $dash_type
     * @param string $cap_type
     * @param string $join_type
     * @param string $head_arrow_type
     * @param string $head_arrow_size
     * @param string $end_arrow_type
     * @param string $end_arrow_size
     *
     */
    public function setLineStyleProperties($line_width = \NULL, $compound_type = \NULL, $dash_type = \NULL, $cap_type = \NULL, $join_type = \NULL, $head_arrow_type = \NULL, $head_arrow_size = \NULL, $end_arrow_type = \NULL, $end_arrow_size = \NULL)
    {
    }
    /**
     * Get Line Style Property
     *
     * @param array|string $elements
     *
     * @return string
     */
    public function getLineStyleProperty($elements)
    {
    }
    /**
     * Get Line Style Arrow Excel Width
     *
     * @param string $arrow
     *
     * @return string
     */
    public function getLineStyleArrowWidth($arrow)
    {
    }
    /**
     * Get Line Style Arrow Excel Length
     *
     * @param string $arrow
     *
     * @return string
     */
    public function getLineStyleArrowLength($arrow)
    {
    }
    /**
     * Set Shadow Properties
     *
     * @param int $shadow_presets
     * @param string $sh_color_value
     * @param string $sh_color_type
     * @param string $sh_color_alpha
     * @param float $sh_blur
     * @param int $sh_angle
     * @param float $sh_distance
     *
     */
    public function setShadowProperties($sh_presets, $sh_color_value = \NULL, $sh_color_type = \NULL, $sh_color_alpha = \NULL, $sh_blur = \NULL, $sh_angle = \NULL, $sh_distance = \NULL)
    {
    }
    /**
     * Set Shadow Color
     *
     * @param int $shadow_presets
     *
     * @return PHPExcel_Chart_Axis
     */
    private function _setShadowPresetsProperties($shadow_presets)
    {
    }
    /**
     * Set Shadow Properties from Maped Values
     *
     * @param array $properties_map
     * @param * $reference
     *
     * @return PHPExcel_Chart_Axis
     */
    private function _setShadowProperiesMapValues(array $properties_map, &$reference = \NULL)
    {
    }
    /**
     * Set Shadow Color
     *
     * @param string $color
     * @param int $alpha
     * @param string $type
     *
     * @return PHPExcel_Chart_Axis
     */
    private function _setShadowColor($color, $alpha, $type)
    {
    }
    /**
     * Set Shadow Blur
     *
     * @param float $blur
     *
     * @return PHPExcel_Chart_Axis
     */
    private function _setShadowBlur($blur)
    {
    }
    /**
     * Set Shadow Angle
     *
     * @param int $angle
     *
     * @return PHPExcel_Chart_Axis
     */
    private function _setShadowAngle($angle)
    {
    }
    /**
     * Set Shadow Distance
     *
     * @param float $distance
     *
     * @return PHPExcel_Chart_Axis
     */
    private function _setShadowDistance($distance)
    {
    }
    /**
     * Get Glow Property
     *
     * @param float $size
     * @param string $color_value
     * @param int $color_alpha
     * @param string $color_type
     */
    public function getShadowProperty($elements)
    {
    }
    /**
     * Set Glow Properties
     *
     * @param float $size
     * @param string $color_value
     * @param int $color_alpha
     * @param string $color_type
     */
    public function setGlowProperties($size, $color_value = \NULL, $color_alpha = \NULL, $color_type = \NULL)
    {
    }
    /**
     * Get Glow Property
     *
     * @param array|string $property
     *
     * @return string
     */
    public function getGlowProperty($property)
    {
    }
    /**
     * Set Glow Color
     *
     * @param float $size
     *
     * @return PHPExcel_Chart_Axis
     */
    private function _setGlowSize($size)
    {
    }
    /**
     * Set Glow Color
     *
     * @param string $color
     * @param int $alpha
     * @param string $type
     *
     * @return PHPExcel_Chart_Axis
     */
    private function _setGlowColor($color, $alpha, $type)
    {
    }
    /**
     * Set Soft Edges Size
     *
     * @param float $size
     */
    public function setSoftEdges($size)
    {
    }
    /**
     * Get Soft Edges Size
     *
     * @return string
     */
    public function getSoftEdgesSize()
    {
    }
}