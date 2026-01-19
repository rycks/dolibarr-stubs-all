<?php

namespace Luracast\Restler;

/**
 * Static class for handling redirection
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class Redirect
{
    /**
     * Redirect to given url
     *
     * @param string $url       relative path or full url
     * @param array  $params    associative array of query parameters
     * @param array  $flashData associative array of properties to be set in $_SESSION for one time use
     * @param int    $status    http status code to send the response with ideally 301 or 302
     *
     * @return array
     */
    public static function to($url, array $params = array(), array $flashData = array(), $status = 302)
    {
    }
    /**
     * Redirect back to the previous page
     *
     * Makes use of http referrer for redirection
     *
     * @return array
     */
    public static function back()
    {
    }
}