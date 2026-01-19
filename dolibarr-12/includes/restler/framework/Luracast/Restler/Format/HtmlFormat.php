<?php

namespace Luracast\Restler\Format;

/**
 * Html template format
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
class HtmlFormat extends \Luracast\Restler\Format\DependentFormat
{
    public static $mime = 'text/html';
    public static $extension = 'html';
    public static $view;
    public static $errorView = 'debug.php';
    public static $template = 'php';
    public static $handleSession = true;
    public static $convertResponseToArray = false;
    public static $useSmartViews = true;
    /**
     * @var null|string defaults to template named folder in Defaults::$cacheDirectory
     */
    public static $cacheDirectory = null;
    /**
     * @var array global key value pair to be supplied to the templates. All
     * keys added here will be available as a variable inside the template
     */
    public static $data = array();
    /**
     * @var string set it to the location of your the view files. Defaults to
     * views folder which is same level as vendor directory.
     */
    public static $viewPath;
    /**
     * @var array template and its custom extension key value pair
     */
    public static $customTemplateExtensions = array('blade' => 'blade.php');
    /**
     * @var bool used internally for error handling
     */
    protected static $parseViewMetadata = true;
    /**
     * @var Restler;
     */
    public $restler;
    public function __construct()
    {
    }
    public function getDependencyMap()
    {
    }
    public static function blade(array $data, $debug = true)
    {
    }
    public static function twig(array $data, $debug = true)
    {
    }
    public static function handlebar(array $data, $debug = true)
    {
    }
    public static function mustache(array $data, $debug = true)
    {
    }
    public static function php(array $data, $debug = true)
    {
    }
    /**
     * Encode the given data in the format
     *
     * @param array   $data                resulting data that needs to
     *                                     be encoded in the given format
     * @param boolean $humanReadable       set to TRUE when restler
     *                                     is not running in production mode.
     *                                     Formatter has to make the encoded
     *                                     output more human readable
     *
     * @throws \Exception
     * @return string encoded string
     */
    public function encode($data, $humanReadable = false)
    {
    }
    public static function guessViewName($path)
    {
    }
    public static function getViewExtension()
    {
    }
    public static function getViewFile($fullPath = false, $includeExtension = true)
    {
    }
    private function reset()
    {
    }
    /**
     * Decode the given data from the format
     *
     * @param string $data
     *            data sent from client to
     *            the api in the given format.
     *
     * @return array associative array of the parsed data
     *
     * @throws RestException
     */
    public function decode($data)
    {
    }
    /**
     * @return bool false as HTML format is write only
     */
    public function isReadable()
    {
    }
    /**
     * Get MIME type => Extension mappings as an associative array
     *
     * @return array list of mime strings for the format
     * @example array('application/json'=>'json');
     */
    public function getMIMEMap()
    {
    }
    /**
     * Set the selected MIME type
     *
     * @param string $mime MIME type
     */
    public function setMIME($mime)
    {
    }
    /**
     * Get selected MIME type
     */
    public function getMIME()
    {
    }
    /**
     * Get the selected file extension
     *
     * @return string file extension
     */
    public function getExtension()
    {
    }
    /**
     * Set the selected file extension
     *
     * @param string $extension file extension
     */
    public function setExtension($extension)
    {
    }
}