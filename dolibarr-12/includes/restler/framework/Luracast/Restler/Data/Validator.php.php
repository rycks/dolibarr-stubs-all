<?php

namespace Luracast\Restler\Data;

/**
 * Default Validator class used by Restler. It can be replaced by any
 * iValidate implementing class by setting Defaults::$validatorClass
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class Validator implements \Luracast\Restler\Data\iValidate
{
    public static $holdException = false;
    public static $exceptions = array();
    public static $preFilters = array(
        //'*'            => 'some_global_filter', //applied to all parameters
        'string' => 'trim',
    );
    /**
     * Validate alphabetic characters.
     *
     * Check that given value contains only alphabetic characters.
     *
     * @param                $input
     * @param ValidationInfo $info
     *
     * @return string
     *
     * @throws Invalid
     */
    public static function alpha($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Validate UUID strings.
     *
     * Check that given value contains only alpha numeric characters and the length is 36 chars.
     *
     * @param                $input
     * @param ValidationInfo $info
     *
     * @return string
     *
     * @throws Invalid
     */
    public static function uuid($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Validate alpha numeric characters.
     *
     * Check that given value contains only alpha numeric characters.
     *
     * @param                $input
     * @param ValidationInfo $info
     *
     * @return string
     *
     * @throws Invalid
     */
    public static function alphanumeric($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Validate printable characters.
     *
     * Check that given value contains only printable characters.
     *
     * @param                $input
     * @param ValidationInfo $info
     *
     * @return string
     *
     * @throws Invalid
     */
    public static function printable($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Validate hexadecimal digits.
     *
     * Check that given value contains only hexadecimal digits.
     *
     * @param                $input
     * @param ValidationInfo $info
     *
     * @return string
     *
     * @throws Invalid
     */
    public static function hex($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Color specified as hexadecimals
     *
     * Check that given value contains only color.
     *
     * @param                     $input
     * @param ValidationInfo|null $info
     *
     * @return string
     * @throws Invalid
     */
    public static function color($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Validate Telephone number
     *
     * Check if the given value is numeric with or without a `+` prefix
     *
     * @param                $input
     * @param ValidationInfo $info
     *
     * @return string
     *
     * @throws Invalid
     */
    public static function tel($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Validate Email
     *
     * Check if the given string is a valid email
     *
     * @param String         $input
     * @param ValidationInfo $info
     *
     * @return string
     * @throws Invalid
     */
    public static function email($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Validate IP Address
     *
     * Check if the given string is a valid ip address
     *
     * @param String         $input
     * @param ValidationInfo $info
     *
     * @return string
     * @throws Invalid
     */
    public static function ip($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Validate Url
     *
     * Check if the given string is a valid url
     *
     * @param String         $input
     * @param ValidationInfo $info
     *
     * @return string
     * @throws Invalid
     */
    public static function url($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * MySQL Date
     *
     * Check if the given string is a valid date in YYYY-MM-DD format
     *
     * @param String         $input
     * @param ValidationInfo $info
     *
     * @return string
     * @throws Invalid
     */
    public static function date($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * MySQL DateTime
     *
     * Check if the given string is a valid date and time in YYY-MM-DD HH:MM:SS format
     *
     * @param String         $input
     * @param ValidationInfo $info
     *
     * @return string
     * @throws Invalid
     */
    public static function datetime($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Alias for Time
     *
     * Check if the given string is a valid time in HH:MM:SS format
     *
     * @param String         $input
     * @param ValidationInfo $info
     *
     * @return string
     * @throws Invalid
     */
    public static function time24($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Time
     *
     * Check if the given string is a valid time in HH:MM:SS format
     *
     * @param String         $input
     * @param ValidationInfo $info
     *
     * @return string
     * @throws Invalid
     */
    public static function time($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Time in 12 hour format
     *
     * Check if the given string is a valid time 12 hour format
     *
     * @param String         $input
     * @param ValidationInfo $info
     *
     * @return string
     * @throws Invalid
     */
    public static function time12($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Unix Timestamp
     *
     * Check if the given value is a valid timestamp
     *
     * @param String         $input
     * @param ValidationInfo $info
     *
     * @return int
     * @throws Invalid
     */
    public static function timestamp($input, \Luracast\Restler\Data\ValidationInfo $info = null)
    {
    }
    /**
     * Validate the given input
     *
     * Validates the input and attempts to fix it when fix is requested
     *
     * @param mixed          $input
     * @param ValidationInfo $info
     * @param null           $full
     *
     * @throws \Exception
     * @return array|bool|float|int|mixed|null|number|string
     */
    public static function validate($input, \Luracast\Restler\Data\ValidationInfo $info, $full = null)
    {
    }
}