<?php

namespace PhpOffice\PhpSpreadsheet\Chart;

class Title
{
    /**
     * Title Caption.
     *
     * @var string
     */
    private $caption;
    /**
     * Title Layout.
     *
     * @var Layout
     */
    private $layout;
    /**
     * Create a new Title.
     *
     * @param null|mixed $caption
     * @param null|Layout $layout
     */
    public function __construct($caption = null, \PhpOffice\PhpSpreadsheet\Chart\Layout $layout = null)
    {
    }
    /**
     * Get caption.
     *
     * @return string
     */
    public function getCaption()
    {
    }
    /**
     * Set caption.
     *
     * @param string $caption
     *
     * @return Title
     */
    public function setCaption($caption)
    {
    }
    /**
     * Get Layout.
     *
     * @return Layout
     */
    public function getLayout()
    {
    }
}