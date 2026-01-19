<?php

namespace PhpOffice\PhpSpreadsheet\Cell;

class Hyperlink
{
    /**
     * URL to link the cell to.
     *
     * @var string
     */
    private $url;
    /**
     * Tooltip to display on the hyperlink.
     *
     * @var string
     */
    private $tooltip;
    /**
     * Create a new Hyperlink.
     *
     * @param string $pUrl Url to link the cell to
     * @param string $pTooltip Tooltip to display on the hyperlink
     */
    public function __construct($pUrl = '', $pTooltip = '')
    {
    }
    /**
     * Get URL.
     *
     * @return string
     */
    public function getUrl()
    {
    }
    /**
     * Set URL.
     *
     * @param string $value
     *
     * @return Hyperlink
     */
    public function setUrl($value)
    {
    }
    /**
     * Get tooltip.
     *
     * @return string
     */
    public function getTooltip()
    {
    }
    /**
     * Set tooltip.
     *
     * @param string $value
     *
     * @return Hyperlink
     */
    public function setTooltip($value)
    {
    }
    /**
     * Is this hyperlink internal? (to another worksheet).
     *
     * @return bool
     */
    public function isInternal()
    {
    }
    /**
     * @return string
     */
    public function getTypeHyperlink()
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
}