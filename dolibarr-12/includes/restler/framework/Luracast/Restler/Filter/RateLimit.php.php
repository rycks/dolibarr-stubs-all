<?php

namespace Luracast\Restler\Filter;

/**
 * Describe the purpose of this class/interface/trait
 *
 * @category   Framework
 * @package    restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class RateLimit implements \Luracast\Restler\iFilter, \Luracast\Restler\iUseAuthentication
{
    /**
     * @var \Luracast\Restler\Restler;
     */
    public $restler;
    /**
     * @var int
     */
    public static $usagePerUnit = 1200;
    /**
     * @var int
     */
    public static $authenticatedUsagePerUnit = 5000;
    /**
     * @var string
     */
    public static $unit = 'hour';
    /**
     * @var string group the current api belongs to
     */
    public static $group = 'common';
    protected static $units = array(
        'second' => 1,
        'minute' => 60,
        'hour' => 3600,
        // 60*60 seconds
        'day' => 86400,
        // 60*60*24 seconds
        'week' => 604800,
        // 60*60*24*7 seconds
        'month' => 2592000,
    );
    /**
     * @var array all paths beginning with any of the following will be excluded
     * from documentation
     */
    public static $excludedPaths = array('explorer');
    /**
     * @param string $unit
     * @param int    $usagePerUnit
     * @param int    $authenticatedUsagePerUnit set it to false to give unlimited access
     *
     * @throws \InvalidArgumentException
     * @return void
     */
    public static function setLimit($unit, $usagePerUnit, $authenticatedUsagePerUnit = null)
    {
    }
    public function __isAllowed()
    {
    }
    public function __setAuthenticationStatus($isAuthenticated = false)
    {
    }
    private static function validate($unit)
    {
    }
    private function check($isAuthenticated = false)
    {
    }
    private function duration($secs)
    {
    }
}