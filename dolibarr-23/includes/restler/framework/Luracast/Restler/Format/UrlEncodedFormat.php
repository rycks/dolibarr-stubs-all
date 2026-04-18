<?php

namespace Luracast\Restler\Format;

/**
 * URL Encoded String Format
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
class UrlEncodedFormat extends \Luracast\Restler\Format\Format
{
    const MIME = 'application/x-www-form-urlencoded';
    const EXTENSION = 'post';
    public function encode($data, $humanReadable = false)
    {
    }
    public function decode($data)
    {
    }
    public static function encoderTypeFix(array $data)
    {
    }
    public static function decoderTypeFix(array $data)
    {
    }
}