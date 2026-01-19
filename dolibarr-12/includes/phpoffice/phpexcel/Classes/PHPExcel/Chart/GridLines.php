<?php

/**
 * Created by PhpStorm.
 * User: Wiktor Trzonkowski
 * Date: 7/2/14
 * Time: 2:36 PM
 */
class PHPExcel_Chart_GridLines extends \PHPExcel_Properties
{
    /**
     * Properties of Class:
     * Object State (State for Minor Tick Mark) @var bool
     * Line Properties @var  array of mixed
     * Shadow Properties @var  array of mixed
     * Glow Properties @var  array of mixed
     * Soft Properties @var  array of mixed
     *
     */
    private $_object_state = \FALSE, $_line_properties = array('color' => array('type' => self::EXCEL_COLOR_TYPE_STANDARD, 'value' => \NULL, 'alpha' => 0), 'style' => array('width' => '9525', 'compound' => self::LINE_STYLE_COMPOUND_SIMPLE, 'dash' => self::LINE_STYLE_DASH_SOLID, 'cap' => self::LINE_STYLE_CAP_FLAT, 'join' => self::LINE_STYLE_JOIN_BEVEL, 'arrow' => array('head' => array('type' => self::LINE_STYLE_ARROW_TYPE_NOARROW, 'size' => self::LINE_STYLE_ARROW_SIZE_5), 'end' => array('type' => self::LINE_STYLE_ARROW_TYPE_NOARROW, 'size' => self::LINE_STYLE_ARROW_SIZE_8)))), $_shadow_properties = array('presets' => self::SHADOW_PRESETS_NOSHADOW, 'effect' => \NULL, 'color' => array('type' => self::EXCEL_COLOR_TYPE_STANDARD, 'value' => 'black', 'alpha' => 85), 'size' => array('sx' => \NULL, 'sy' => \NULL, 'kx' => \NULL), 'blur' => \NULL, 'direction' => \NULL, 'distance' => \NULL, 'algn' => \NULL, 'rotWithShape' => \NULL), $_glow_properties = array('size' => \NULL, 'color' => array('type' => self::EXCEL_COLOR_TYPE_STANDARD, 'value' => 'black', 'alpha' => 40)), $_soft_edges = array('size' => \NULL);
    /**
     * Get Object State
     *
     * @return bool
     */
    public function getObjectState()
    {
    }
    /**
     * Change Object State to True
     *
     * @return PHPExcel_Chart_GridLines
     */
    private function _activateObject()
    {
    }
    /**
     * Set Line Color Properties
     *
     * @param string $value
     * @param int $alpha
     * @param string $type
     */
    public function setLineColorProperties($value, $alpha = 0, $type = self::EXCEL_COLOR_TYPE_STANDARD)
    {
    }
    /**
     * Set Line Color Properties
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
     */
    public function setLineStyleProperties($line_width = \NULL, $compound_type = \NULL, $dash_type = \NULL, $cap_type = \NULL, $join_type = \NULL, $head_arrow_type = \NULL, $head_arrow_size = \NULL, $end_arrow_type = \NULL, $end_arrow_size = \NULL)
    {
    }
    /**
     * Get Line Color Property
     *
     * @param string $parameter
     *
     * @return string
     */
    public function getLineColorProperty($parameter)
    {
    }
    /**
     * Get Line Style Property
     *
     * @param  array|string $elements
     *
     * @return string
     */
    public function getLineStyleProperty($elements)
    {
    }
    /**
     * Set Glow Properties
     *
     * @param  float $size
     * @param  string $color_value
     * @param  int $color_alpha
     * @param  string $color_type
     *
     */
    public function setGlowProperties($size, $color_value = \NULL, $color_alpha = \NULL, $color_type = \NULL)
    {
    }
    /**
     * Get Glow Color Property
     *
     * @param string $property
     *
     * @return string
     */
    public function getGlowColor($property)
    {
    }
    /**
     * Get Glow Size
     *
     * @return string
     */
    public function getGlowSize()
    {
    }
    /**
     * Set Glow Size
     *
     * @param float $size
     *
     * @return PHPExcel_Chart_GridLines
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
     * @return PHPExcel_Chart_GridLines
     */
    private function _setGlowColor($color, $alpha, $type)
    {
    }
    /**
     * Get Line Style Arrow Parameters
     *
     * @param string $arrow_selector
     * @param string $property_selector
     *
     * @return string
     */
    public function getLineStyleArrowParameters($arrow_selector, $property_selector)
    {
    }
    /**
     * Set Shadow Properties
     *
     * @param int $sh_presets
     * @param string $sh_color_value
     * @param string $sh_color_type
     * @param int $sh_color_alpha
     * @param string $sh_blur
     * @param int $sh_angle
     * @param float $sh_distance
     *
     */
    public function setShadowProperties($sh_presets, $sh_color_value = \NULL, $sh_color_type = \NULL, $sh_color_alpha = \NULL, $sh_blur = \NULL, $sh_angle = \NULL, $sh_distance = \NULL)
    {
    }
    /**
     * Set Shadow Presets Properties
     *
     * @param int $shadow_presets
     *
     * @return PHPExcel_Chart_GridLines
     */
    private function _setShadowPresetsProperties($shadow_presets)
    {
    }
    /**
     * Set Shadow Properties Values
     *
     * @param array $properties_map
     * @param * $reference
     *
     * @return PHPExcel_Chart_GridLines
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
     * @return PHPExcel_Chart_GridLines
     */
    private function _setShadowColor($color, $alpha, $type)
    {
    }
    /**
     * Set Shadow Blur
     *
     * @param float $blur
     *
     * @return PHPExcel_Chart_GridLines
     */
    private function _setShadowBlur($blur)
    {
    }
    /**
     * Set Shadow Angle
     *
     * @param int $angle
     *
     * @return PHPExcel_Chart_GridLines
     */
    private function _setShadowAngle($angle)
    {
    }
    /**
     * Set Shadow Distance
     *
     * @param float $distance
     *
     * @return PHPExcel_Chart_GridLines
     */
    private function _setShadowDistance($distance)
    {
    }
    /**
     * Get Shadow Property
     *
     * @param string $elements
     * @param array $elements
     *
     * @return string
     */
    public function getShadowProperty($elements)
    {
    }
    /**
     * Set Soft Edges Size
     *
     * @param float $size
     */
    public function setSoftEdgesSize($size)
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