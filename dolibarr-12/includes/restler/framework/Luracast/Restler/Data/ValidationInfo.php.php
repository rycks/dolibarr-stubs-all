<?php

namespace Luracast\Restler\Data;

/**
 * ValueObject for validation information. An instance is created and
 * populated by Restler to pass it to iValidate implementing classes for
 * validation
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class ValidationInfo implements \Luracast\Restler\Data\iValueObject
{
    /**
     * @var mixed given value for the parameter
     */
    public $value;
    /**
     * @var string proper name for given parameter
     */
    public $label;
    /**
     * @var string html element that can be used to represent the parameter for
     *             input
     */
    public $field;
    /**
     * @var mixed default value for the parameter
     */
    public $default;
    /**
     * Name of the variable being validated
     *
     * @var string variable name
     */
    public $name;
    /**
     * @var bool is it required or not
     */
    public $required;
    /**
     * @var string body or header or query where this parameter is coming from
     * in the http request
     */
    public $from;
    /**
     * Data type of the variable being validated.
     * It will be mostly string
     *
     * @var string|array multiple types are specified it will be of
     *      type array otherwise it will be a string
     */
    public $type;
    /**
     * When the type is array, this field is used to define the type of the
     * contents of the array
     *
     * @var string|null when all the items in an array are of certain type, we
     * can set this property. It will be null if the items can be of any type
     */
    public $contentType;
    /**
     * Should we attempt to fix the value?
     * When set to false validation class should throw
     * an exception or return false for the validate call.
     * When set to true it will attempt to fix the value if possible
     * or throw an exception or return false when it cant be fixed.
     *
     * @var boolean true or false
     */
    public $fix = false;
    /**
     * @var array of children to be validated
     */
    public $children = null;
    // ==================================================================
    //
    // VALUE RANGE
    //
    // ------------------------------------------------------------------
    /**
     * Given value should match one of the values in the array
     *
     * @var array of choices to match to
     */
    public $choice;
    /**
     * If the type is string it will set the lower limit for length
     * else will specify the lower limit for the value
     *
     * @var number minimum value
     */
    public $min;
    /**
     * If the type is string it will set the upper limit limit for length
     * else will specify the upper limit for the value
     *
     * @var number maximum value
     */
    public $max;
    // ==================================================================
    //
    // REGEX VALIDATION
    //
    // ------------------------------------------------------------------
    /**
     * RegEx pattern to match the value
     *
     * @var string regular expression
     */
    public $pattern;
    // ==================================================================
    //
    // CUSTOM VALIDATION
    //
    // ------------------------------------------------------------------
    /**
     * Rules specified for the parameter in the php doc comment.
     * It is passed to the validation method as the second parameter
     *
     * @var array custom rule set
     */
    public $rules;
    /**
     * Specifying a custom error message will override the standard error
     * message return by the validator class
     *
     * @var string custom error response
     */
    public $message;
    // ==================================================================
    //
    // METHODS
    //
    // ------------------------------------------------------------------
    /**
     * Name of the method to be used for validation.
     * It will be receiving two parameters $input, $rules (array)
     *
     * @var string validation method name
     */
    public $method;
    /**
     * Instance of the API class currently being called. It will be null most of
     * the time. Only when method is defined it will contain an instance.
     * This behavior is for lazy loading of the API class
     *
     * @var null|object will be null or api class instance
     */
    public $apiClassInstance = null;
    public static function numericValue($value)
    {
    }
    public static function arrayValue($value)
    {
    }
    public static function stringValue($value, $glue = ',')
    {
    }
    public static function booleanValue($value)
    {
    }
    public static function filterArray(array $data, $keepNumericKeys)
    {
    }
    public function __toString()
    {
    }
    private function getProperty(array &$from, $property)
    {
    }
    public function __construct(array $info)
    {
    }
    /**
     * Magic Method used for creating instance at run time
     */
    public static function __set_state(array $info)
    {
    }
}