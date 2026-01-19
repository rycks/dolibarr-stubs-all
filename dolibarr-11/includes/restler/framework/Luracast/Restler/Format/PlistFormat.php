<?php

namespace Luracast\Restler\Format;

/**
 * Plist Format for Restler Framework.
 * Plist is the native data exchange format for Apple iOS and Mac platform.
 * Use this format to talk to mac applications and iOS devices.
 * This class is capable of serving both xml plist and binary plist.
 *
 * @category   Framework
 * @package    Restler
 * @subpackage format
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class PlistFormat extends \Luracast\Restler\Format\DependentMultiFormat
{
    /**
     * @var boolean set it to true binary plist is preferred
     */
    public static $compact = null;
    const MIME = 'application/xml,application/x-plist';
    const EXTENSION = 'plist';
    public function setMIME($mime)
    {
    }
    /**
     * Encode the given data in plist format
     *
     * @param array   $data
     *            resulting data that needs to
     *            be encoded in plist format
     * @param boolean $humanReadable
     *            set to true when restler
     *            is not running in production mode. Formatter has to
     *            make the encoded output more human readable
     *
     * @return string encoded string
     */
    public function encode($data, $humanReadable = false)
    {
    }
    /**
     * Decode the given data from plist format
     *
     * @param string $data
     *            data sent from client to
     *            the api in the given format.
     *
     * @return array associative array of the parsed data
     */
    public function decode($data)
    {
    }
    /**
     * Get external class => packagist package name as an associative array
     *
     * @return array list of dependencies for the format
     *
     * @example return ['Illuminate\\View\\View' => 'illuminate/view:4.2.*']
     */
    public function getDependencyMap()
    {
    }
}