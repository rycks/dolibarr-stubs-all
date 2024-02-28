<?php

namespace Luracast\Restler;

/**
 * Static Class to pass through content outside of web root
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 *
 */
class PassThrough
{
    public static $mimeTypes = array('js' => 'text/javascript', 'css' => 'text/css', 'png' => 'image/png', 'jpg' => 'image/jpeg', 'gif' => 'image/gif', 'html' => 'text/html');
    /**
     * Serve a file outside web root
     *
     * Respond with a file stored outside web accessible path
     *
     * @param string $filename      full path for the file to be served
     * @param bool   $forceDownload should the we download instead of viewing
     * @param int    $expires       cache expiry in number of seconds
     * @param bool   $isPublic      cache control, is it public or private
     *
     * @throws RestException
     *
     */
    public static function file($filename, $forceDownload = false, $expires = 0, $isPublic = true)
    {
    }
}