<?php

namespace Luracast\Restler\Data;

/**
 * Convenience class for String manipulation
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 *
 */
class Text
{
    /**
     * Given haystack contains the needle or not?
     *
     * @param string $haystack
     * @param string $needle
     * @param bool $caseSensitive
     *
     * @return bool
     */
    public static function contains($haystack, $needle, $caseSensitive = true)
    {
    }
    /**
     * Given haystack begins with the needle or not?
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool
     */
    public static function beginsWith($haystack, $needle)
    {
    }
    /**
     * Given haystack ends with the needle or not?
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool
     */
    public static function endsWith($haystack, $needle)
    {
    }
    /**
     * Convert camelCased or underscored string in to a title
     *
     * @param string $name
     *
     * @return string
     */
    public static function title($name)
    {
    }
    /**
     * Convert given string to be used as a slug or css class
     *
     * @param string $name
     * @return string
     */
    public static function slug($name)
    {
    }
}