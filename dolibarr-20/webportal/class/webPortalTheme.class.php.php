<?php

// used for color functions
/**
 * Class WebPortalTheme
 */
class WebPortalTheme
{
    public $primaryColorHex = '#263c5c';
    public $primaryColorHsl = array(
        'h' => 216,
        // Hue
        'l' => 42,
        // lightness
        's' => 25,
        // Saturation
        'a' => 1,
    );
    public $loginLogoUrl;
    public $menuLogoUrl;
    public $loginBackground;
    /**
     * @var string Background of banner
     */
    public $bannerBackground;
    /**
     * @var int Use dark theme on banner
     */
    public $bannerUseDarkTheme;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Load hex of primary theme color
     *
     * @return void
     */
    public function loadPrimaryColor()
    {
    }
}