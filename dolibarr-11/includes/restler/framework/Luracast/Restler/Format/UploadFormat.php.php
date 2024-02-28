<?php

namespace Luracast\Restler\Format;

/**
 * Support for Multi Part Form Data and File Uploads
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
class UploadFormat extends \Luracast\Restler\Format\Format
{
    const MIME = 'multipart/form-data';
    const EXTENSION = 'post';
    public static $errors = array(0 => false, 1 => "The uploaded file exceeds the maximum allowed size", 2 => "The uploaded file exceeds the maximum allowed size", 3 => "The uploaded file was only partially uploaded", 4 => "No file was uploaded", 6 => "Missing a temporary folder", 7 => "Failed to write file to disk", 8 => "A PHP extension stopped the file upload");
    /**
     * use it if you need to restrict uploads based on file type
     * setting it as an empty array allows all file types
     * default is to allow only png and jpeg images
     *
     * @var array
     */
    public static $allowedMimeTypes = array('image/jpeg', 'image/png');
    /**
     * use it to restrict uploads based on file size
     * set it to 0 to allow all sizes
     * please note that it upload restrictions in the server
     * takes precedence so it has to be lower than or equal to that
     * default value is 1MB (1024x1024)bytes
     * usual value for the server is 8388608
     *
     * @var int
     */
    public static $maximumFileSize = 1048576;
    /**
     * Your own validation function for validating each uploaded file
     * it can return false or throw an exception for invalid file
     * use anonymous function / closure in PHP 5.3 and above
     * use function name in other cases
     *
     * @var Callable
     */
    public static $customValidationFunction;
    /**
     * Since exceptions are triggered way before at the `get` stage
     *
     * @var bool
     */
    public static $suppressExceptionsAsError = false;
    protected static function checkFile(&$file, $doMimeCheck = false, $doSizeCheck = false)
    {
    }
    public function encode($data, $humanReadable = false)
    {
    }
    public function decode($data)
    {
    }
    function isWritable()
    {
    }
}