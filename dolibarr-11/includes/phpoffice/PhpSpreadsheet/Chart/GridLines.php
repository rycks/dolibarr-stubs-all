<?php

namespace PhpOffice\PhpSpreadsheet\Chart;

/**
 * Created by PhpStorm.
 * User: Wiktor Trzonkowski
 * Date: 7/2/14
 * Time: 2:36 PM.
 */
class GridLines extends \PhpOffice\PhpSpreadsheet\Chart\Properties
{
    /**
     * Properties of Class:
     * Object State (State for Minor Tick Mark) @var bool
     * Line Properties @var  array of mixed
     * Shadow Properties @var  array of mixed
     * Glow Properties @var  array of mixed
     * Soft Properties @var  array of mixed.
     */
    private $objectState = false;
    private $lineProperties = ['color' => ['type' => self::EXCEL_COLOR_TYPE_STANDARD, 'value' => null, 'alpha' => 0], 'style' => ['width' => '9525', 'compound' => self::LINE_STYLE_COMPOUND_SIMPLE, 'dash' => self::LINE_STYLE_DASH_SOLID, 'cap' => self::LINE_STYLE_CAP_FLAT, 'join' => self::LINE_STYLE_JOIN_BEVEL, 'arrow' => ['head' => ['type' => self::LINE_STYLE_ARROW_TYPE_NOARROW, 'size' => self::LINE_STYLE_ARROW_SIZE_5], 'end' => ['type' => self::LINE_STYLE_ARROW_TYPE_NOARROW, 'size' => self::LINE_STYLE_ARROW_SIZE_8]]]];
    private $shadowProperties = ['presets' => self::SHADOW_PRESETS_NOSHADOW, 'effect' => null, 'color' => ['type' => self::EXCEL_COLOR_TYPE_STANDARD, 'value' => 'black', 'alpha' => 85], 'size' => ['sx' => null, 'sy' => null, 'kx' => null], 'blur' => null, 'direction' => null, 'distance' => null, 'algn' => null, 'rotWithShape' => null];
    private $glowProperties = ['size' => null, 'color' => ['type' => self::EXCEL_COLOR_TYPE_STANDARD, 'value' => 'black', 'alpha' => 40]];
    private $softEdges = ['size' => null];
    /**
     * Get Object State.
     *
     * @return bool
     */
    public function getObjectState()
    {
    }
    /**
     * Change Object State to True.
     *
     * @return GridLines
     */
    private function activateObject()
    {
    }
    /**
     * Set Line Color Properties.
     *
     * @param string $value
     * @param int $alpha
     * @param string $type
     */
    public function setLineColorProperties($value, $alpha = 0, $type = self::EXCEL_COLOR_TYPE_STANDARD)
    {
    }
    /**
     * Set Line Color Properties.
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
    public function setLineStyleProperties($line_width = null, $compound_type = null, $dash_type = null, $cap_type = null, $join_type = null, $head_arrow_type = null, $head_arrow_size = null, $end_arrow_type = null, $end_arrow_size = null)
    {
    }
    /**
     * Get Line Color Property.
     *
     * @param string $parameter
     *
     * @return string
     */
    public function getLineColorProperty($parameter)
    {
    }
    /**
     * Get Line Style Property.
     *
     * @param array|string $elements
     *
     * @return string
     */
    public function getLineStyleProperty($elements)
    {
    }
    /**
     * Set Glow Properties.
     *
     * @param float $size
     * @param string $color_value
     * @param int $color_alpha
     * @param string $color_type
     */
    public function setGlowProperties($size, $color_value = null, $color_alpha = null, $color_type = null)
    {
    }
    /**
     * Get Glow Color Property.
     *
     * @param string $property
     *
     * @return string
     */
    public function getGlowColor($property)
    {
    }
    /**
     * Get Glow Size.
     *
     * @return string
     */
    public function getGlowSize()
    {
    }
    /**
     * Set Glow Size.
     *
     * @param float $size
     *
     * @return GridLines
     */
    private function setGlowSize($size)
    {
    }
    /**
     * Set Glow Color.
     *
     * @param string $color
     * @param int $alpha
     * @param string $type
     *
     * @return GridLines
     */
    private function setGlowColor($color, $alpha, $type)
    {
    }
    /**
     * Get Line Style Arrow Parameters.
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
     * Set Shadow Properties.
     *
     * @param int $sh_presets
     * @param string $sh_color_value
     * @param string $sh_color_type
     * @param int $sh_color_alpha
     * @param string $sh_blur
     * @param int $sh_angle
     * @param float $sh_distance
     */
    public function setShadowProperties($sh_presets, $sh_color_value = null, $sh_color_type = null, $sh_color_alpha = null, $sh_blur = null, $sh_angle = null, $sh_distance = null)
    {
    }
    /**
     * Set Shadow Presets Properties.
     *
     * @param int $shadow_presets
     *
     * @return GridLines
     */
    private function setShadowPresetsProperties($shadow_presets)
    {
    }
    /**
     * Set Shadow Properties Values.
     *
     * @param array $properties_map
     * @param * $reference
     *
     * @return GridLines
     */
    private function setShadowProperiesMapValues(array $properties_map, &$reference = null)
    {
    }
    /**
     * Set Shadow Color.
     *
     * @param string $color
     * @param int $alpha
     * @param string $type
     *
     * @return GridLines
     */
    private function setShadowColor($color, $alpha, $type)
    {
    }
    /**
     * Set Shadow Blur.
     *
     * @param float $blur
     *
     * @return GridLines
     */
    private function setShadowBlur($blur)
    {
    }
    /**
     * Set Shadow Angle.
     *
     * @param int $angle
     *
     * @return GridLines
     */
    private function setShadowAngle($angle)
    {
    }
    /**
     * Set Shadow Distance.
     *
     * @param float $distance
     *
     * @return GridLines
     */
    private function setShadowDistance($distance)
    {
    }
    /**
     * Get Shadow Property.
     *
     * @param string|string[] $elements
     *
     * @return string
     */
    public function getShadowProperty($elements)
    {
    }
    /**
     * Set Soft Edges Size.
     *
     * @param float $size
     */
    public function setSoftEdgesSize($size)
    {
    }
    /**
     * Get Soft Edges Size.
     *
     * @return string
     */
    public function getSoftEdgesSize()
    {
    }
}