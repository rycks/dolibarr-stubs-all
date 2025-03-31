<?php

// used for color functions
/**
 * Class WebPortalTheme
 */
class WebPortalTheme
{
    /**
     * @var string
     */
    public $primaryColorHex = '#263c5c';
    /**
     * @var array{h:float,l:float,s:float,a:float}
     */
    public $primaryColorHsl = array(
        'h' => 216,
        // Hue
        'l' => 42,
        // lightness
        's' => 25,
        // Saturation
        'a' => 1,
    );
    /**
     * @var string login logo url
     */
    public $loginLogoUrl;
    /**
     * @var string menu logo url
     */
    public $menuLogoUrl;
    /**
     * @var string login background
     */
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