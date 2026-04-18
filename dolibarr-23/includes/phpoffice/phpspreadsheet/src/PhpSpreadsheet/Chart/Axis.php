<?php

namespace PhpOffice\PhpSpreadsheet\Chart;

/**
 * Created by PhpStorm.
 * User: Wiktor Trzonkowski
 * Date: 6/17/14
 * Time: 12:11 PM.
 */
class Axis extends \PhpOffice\PhpSpreadsheet\Chart\Properties
{
    /**
     * Axis Number.
     *
     * @var array of mixed
     */
    private $axisNumber = ['format' => self::FORMAT_CODE_GENERAL, 'source_linked' => 1];
    /**
     * Axis Options.
     *
     * @var array of mixed
     */
    private $axisOptions = ['minimum' => null, 'maximum' => null, 'major_unit' => null, 'minor_unit' => null, 'orientation' => self::ORIENTATION_NORMAL, 'minor_tick_mark' => self::TICK_MARK_NONE, 'major_tick_mark' => self::TICK_MARK_NONE, 'axis_labels' => self::AXIS_LABELS_NEXT_TO, 'horizontal_crosses' => self::HORIZONTAL_CROSSES_AUTOZERO, 'horizontal_crosses_value' => null];
    /**
     * Fill Properties.
     *
     * @var array of mixed
     */
    private $fillProperties = ['type' => self::EXCEL_COLOR_TYPE_ARGB, 'value' => null, 'alpha' => 0];
    /**
     * Line Properties.
     *
     * @var array of mixed
     */
    private $lineProperties = ['type' => self::EXCEL_COLOR_TYPE_ARGB, 'value' => null, 'alpha' => 0];
    /**
     * Line Style Properties.
     *
     * @var array of mixed
     */
    private $lineStyleProperties = ['width' => '9525', 'compound' => self::LINE_STYLE_COMPOUND_SIMPLE, 'dash' => self::LINE_STYLE_DASH_SOLID, 'cap' => self::LINE_STYLE_CAP_FLAT, 'join' => self::LINE_STYLE_JOIN_BEVEL, 'arrow' => ['head' => ['type' => self::LINE_STYLE_ARROW_TYPE_NOARROW, 'size' => self::LINE_STYLE_ARROW_SIZE_5], 'end' => ['type' => self::LINE_STYLE_ARROW_TYPE_NOARROW, 'size' => self::LINE_STYLE_ARROW_SIZE_8]]];
    /**
     * Shadow Properties.
     *
     * @var array of mixed
     */
    private $shadowProperties = ['presets' => self::SHADOW_PRESETS_NOSHADOW, 'effect' => null, 'color' => ['type' => self::EXCEL_COLOR_TYPE_STANDARD, 'value' => 'black', 'alpha' => 40], 'size' => ['sx' => null, 'sy' => null, 'kx' => null], 'blur' => null, 'direction' => null, 'distance' => null, 'algn' => null, 'rotWithShape' => null];
    /**
     * Glow Properties.
     *
     * @var array of mixed
     */
    private $glowProperties = ['size' => null, 'color' => ['type' => self::EXCEL_COLOR_TYPE_STANDARD, 'value' => 'black', 'alpha' => 40]];
    /**
     * Soft Edge Properties.
     *
     * @var array of mixed
     */
    private $softEdges = ['size' => null];
    /**
     * Get Series Data Type.
     *
     * @param mixed $format_code
     *
     * @return string
     */
    public function setAxisNumberProperties($format_code)
    {
    }
    /**
     * Get Axis Number Format Data Type.
     *
     * @return string
     */
    public function getAxisNumberFormat()
    {
    }
    /**
     * Get Axis Number Source Linked.
     *
     * @return string
     */
    public function getAxisNumberSourceLinked()
    {
    }
    /**
     * Set Axis Options Properties.
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
     */
    public function setAxisOptionsProperties($axis_labels, $horizontal_crosses_value = null, $horizontal_crosses = null, $axis_orientation = null, $major_tmt = null, $minor_tmt = null, $minimum = null, $maximum = null, $major_unit = null, $minor_unit = null)
    {
    }
    /**
     * Get Axis Options Property.
     *
     * @param string $property
     *
     * @return string
     */
    public function getAxisOptionsProperty($property)
    {
    }
    /**
     * Set Axis Orientation Property.
     *
     * @param string $orientation
     */
    public function setAxisOrientation($orientation)
    {
    }
    /**
     * Set Fill Property.
     *
     * @param string $color
     * @param int $alpha
     * @param string $type
     */
    public function setFillParameters($color, $alpha = 0, $type = self::EXCEL_COLOR_TYPE_ARGB)
    {
    }
    /**
     * Set Line Property.
     *
     * @param string $color
     * @param int $alpha
     * @param string $type
     */
    public function setLineParameters($color, $alpha = 0, $type = self::EXCEL_COLOR_TYPE_ARGB)
    {
    }
    /**
     * Get Fill Property.
     *
     * @param string $property
     *
     * @return string
     */
    public function getFillProperty($property)
    {
    }
    /**
     * Get Line Property.
     *
     * @param string $property
     *
     * @return string
     */
    public function getLineProperty($property)
    {
    }
    /**
     * Set Line Style Properties.
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
     * Get Line Style Arrow Excel Width.
     *
     * @param string $arrow
     *
     * @return string
     */
    public function getLineStyleArrowWidth($arrow)
    {
    }
    /**
     * Get Line Style Arrow Excel Length.
     *
     * @param string $arrow
     *
     * @return string
     */
    public function getLineStyleArrowLength($arrow)
    {
    }
    /**
     * Set Shadow Properties.
     *
     * @param int $sh_presets
     * @param string $sh_color_value
     * @param string $sh_color_type
     * @param string $sh_color_alpha
     * @param float $sh_blur
     * @param int $sh_angle
     * @param float $sh_distance
     */
    public function setShadowProperties($sh_presets, $sh_color_value = null, $sh_color_type = null, $sh_color_alpha = null, $sh_blur = null, $sh_angle = null, $sh_distance = null)
    {
    }
    /**
     * Set Shadow Color.
     *
     * @param int $shadow_presets
     *
     * @return $this
     */
    private function setShadowPresetsProperties($shadow_presets)
    {
    }
    /**
     * Set Shadow Properties from Mapped Values.
     *
     * @param array $properties_map
     * @param mixed &$reference
     *
     * @return $this
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
     * @return $this
     */
    private function setShadowColor($color, $alpha, $type)
    {
    }
    /**
     * Set Shadow Blur.
     *
     * @param float $blur
     *
     * @return $this
     */
    private function setShadowBlur($blur)
    {
    }
    /**
     * Set Shadow Angle.
     *
     * @param int $angle
     *
     * @return $this
     */
    private function setShadowAngle($angle)
    {
    }
    /**
     * Set Shadow Distance.
     *
     * @param float $distance
     *
     * @return $this
     */
    private function setShadowDistance($distance)
    {
    }
    /**
     * Get Shadow Property.
     *
     * @param string|string[] $elements
     *
     * @return null|array|int|string
     */
    public function getShadowProperty($elements)
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
     * Get Glow Property.
     *
     * @param array|string $property
     *
     * @return string
     */
    public function getGlowProperty($property)
    {
    }
    /**
     * Set Glow Color.
     *
     * @param float $size
     *
     * @return $this
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
     * @return $this
     */
    private function setGlowColor($color, $alpha, $type)
    {
    }
    /**
     * Set Soft Edges Size.
     *
     * @param float $size
     */
    public function setSoftEdges($size)
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