<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Theme
{
    /**
     * Theme Name.
     *
     * @var string
     */
    private $themeName;
    /**
     * Colour Scheme Name.
     *
     * @var string
     */
    private $colourSchemeName;
    /**
     * Colour Map.
     *
     * @var array of string
     */
    private $colourMap;
    /**
     * Create a new Theme.
     *
     * @param mixed $themeName
     * @param mixed $colourSchemeName
     * @param mixed $colourMap
     */
    public function __construct($themeName, $colourSchemeName, $colourMap)
    {
    }
    /**
     * Get Theme Name.
     *
     * @return string
     */
    public function getThemeName()
    {
    }
    /**
     * Get colour Scheme Name.
     *
     * @return string
     */
    public function getColourSchemeName()
    {
    }
    /**
     * Get colour Map Value by Position.
     *
     * @param mixed $index
     *
     * @return string
     */
    public function getColourByIndex($index)
    {
    }
    /**
     * Implement PHP __clone to create a deep clone, not just a shallow copy.
     */
    public function __clone()
    {
    }
}