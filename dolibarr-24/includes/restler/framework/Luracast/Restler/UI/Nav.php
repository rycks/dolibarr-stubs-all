<?php

namespace Luracast\Restler\UI;

/**
 * Utility class for automatically creating data to build an navigation interface
 * based on available routes that are accessible by the current user
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 *
 */
class Nav
{
    protected static $tree = array();
    public static $root = 'home';
    /**
     * @var array all paths beginning with any of the following will be excluded
     * from documentation. if an empty string is given it will exclude the root
     */
    public static $excludedPaths = array('');
    /**
     * @var array prefix additional menu items with one of the following syntax
     *            [$path => $text]
     *            [$path]
     *            [$path => ['text' => $text, 'url' => $url, 'trail'=> $trail]]
     */
    public static $prepends = array();
    /**
     * @var array suffix additional menu items with one of the following syntax
     *            [$path => $text]
     *            [$path]
     *            [$path => ['text' => $text, 'url' => $url, 'trail'=> $trail]]
     */
    public static $appends = array();
    public static $addExtension = true;
    protected static $extension = '';
    protected static $activeTrail = '';
    protected static $url;
    public static function get($for = '', $activeTrail = null)
    {
    }
    protected static function &nested(array &$tree, array $parts)
    {
    }
    public static function addUrls(array $urls)
    {
    }
    public static function add($url, $label = null, $trail = null)
    {
    }
    public static function build(array $r)
    {
    }
}