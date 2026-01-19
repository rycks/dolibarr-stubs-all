<?php

namespace Luracast\Restler\Format;

/**
 * Javascript Object Notation Packaged in a method (JSONP)
 *
 * @category   Framework
 * @package    Restler
 * @subpackage format
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 *
 */
class JsFormat extends \Luracast\Restler\Format\JsonFormat
{
    const MIME = 'text/javascript';
    const EXTENSION = 'js';
    public static $callbackMethodName = 'parseResponse';
    public static $callbackOverrideQueryString = 'callback';
    public static $includeHeaders = true;
    public function encode($data, $human_readable = false)
    {
    }
    public function isReadable()
    {
    }
}