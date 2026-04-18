<?php

namespace PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class Shadow implements \PhpOffice\PhpSpreadsheet\IComparable
{
    // Shadow alignment
    const SHADOW_BOTTOM = 'b';
    const SHADOW_BOTTOM_LEFT = 'bl';
    const SHADOW_BOTTOM_RIGHT = 'br';
    const SHADOW_CENTER = 'ctr';
    const SHADOW_LEFT = 'l';
    const SHADOW_TOP = 't';
    const SHADOW_TOP_LEFT = 'tl';
    const SHADOW_TOP_RIGHT = 'tr';
    /**
     * Visible.
     *
     * @var bool
     */
    private $visible;
    /**
     * Blur radius.
     *
     * Defaults to 6
     *
     * @var int
     */
    private $blurRadius;
    /**
     * Shadow distance.
     *
     * Defaults to 2
     *
     * @var int
     */
    private $distance;
    /**
     * Shadow direction (in degrees).
     *
     * @var int
     */
    private $direction;
    /**
     * Shadow alignment.
     *
     * @var int
     */
    private $alignment;
    /**
     * Color.
     *
     * @var Color
     */
    private $color;
    /**
     * Alpha.
     *
     * @var int
     */
    private $alpha;
    /**
     * Create a new Shadow.
     */
    public function __construct()
    {
    }
    /**
     * Get Visible.
     *
     * @return bool
     */
    public function getVisible()
    {
    }
    /**
     * Set Visible.
     *
     * @param bool $pValue
     *
     * @return $this
     */
    public function setVisible($pValue)
    {
    }
    /**
     * Get Blur radius.
     *
     * @return int
     */
    public function getBlurRadius()
    {
    }
    /**
     * Set Blur radius.
     *
     * @param int $pValue
     *
     * @return $this
     */
    public function setBlurRadius($pValue)
    {
    }
    /**
     * Get Shadow distance.
     *
     * @return int
     */
    public function getDistance()
    {
    }
    /**
     * Set Shadow distance.
     *
     * @param int $pValue
     *
     * @return $this
     */
    public function setDistance($pValue)
    {
    }
    /**
     * Get Shadow direction (in degrees).
     *
     * @return int
     */
    public function getDirection()
    {
    }
    /**
     * Set Shadow direction (in degrees).
     *
     * @param int $pValue
     *
     * @return $this
     */
    public function setDirection($pValue)
    {
    }
    /**
     * Get Shadow alignment.
     *
     * @return int
     */
    public function getAlignment()
    {
    }
    /**
     * Set Shadow alignment.
     *
     * @param int $pValue
     *
     * @return $this
     */
    public function setAlignment($pValue)
    {
    }
    /**
     * Get Color.
     *
     * @return Color
     */
    public function getColor()
    {
    }
    /**
     * Set Color.
     *
     * @param Color $pValue
     *
     * @return $this
     */
    public function setColor(\PhpOffice\PhpSpreadsheet\Style\Color $pValue = null)
    {
    }
    /**
     * Get Alpha.
     *
     * @return int
     */
    public function getAlpha()
    {
    }
    /**
     * Set Alpha.
     *
     * @param int $pValue
     *
     * @return $this
     */
    public function setAlpha($pValue)
    {
    }
    /**
     * Get hash code.
     *
     * @return string Hash code
     */
    public function getHashCode()
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}