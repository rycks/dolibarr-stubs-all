<?php

namespace Luracast\Restler;

/**
 * Default Composer to provide standard structure for all HTTP responses
 *
 * @category   Framework
 * @package    Restler
 * @subpackage result
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class Compose implements \Luracast\Restler\iCompose
{
    /**
     * @var bool When restler is not running in production mode, this value will
     * be checked to include the debug information on error response
     */
    public static $includeDebugInfo = true;
    /**
     * Current Restler instance
     * Injected at runtime
     *
     * @var Restler
     */
    public $restler;
    /**
     * Result of an api call is passed to this method
     * to create a standard structure for the data
     *
     * @param mixed $result can be a primitive or array or object
     *
     * @return mixed
     */
    public function response($result)
    {
    }
    /**
     * When the api call results in RestException this method
     * will be called to return the error message
     *
     * @param RestException $exception exception that has reasons for failure
     *
     * @return array
     */
    public function message(\Luracast\Restler\RestException $exception)
    {
    }
}