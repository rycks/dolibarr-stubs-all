<?php

namespace Luracast\Restler\Data;

/**
 * Convenience class that converts the given object
 * in to associative array
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 *
 */
class Obj
{
    /**
     * @var bool|string|callable
     */
    public static $stringEncoderFunction = false;
    /**
     * @var bool|string|callable
     */
    public static $numberEncoderFunction = false;
    /**
     * @var array key value pairs for fixing value types using functions.
     * For example
     *
     *      'id'=>'intval'      will make sure all values of the id properties
     *                          will be converted to integers intval function
     *      'password'=> null   will remove all the password entries
     */
    public static $fix = array();
    /**
     * @var string character that is used to identify sub objects
     *
     * For example
     *
     * when Object::$separatorChar = '.';
     *
     * array('my.object'=>true) will result in
     *
     * array(
     *    'my'=>array('object'=>true)
     * );
     */
    public static $separatorChar = null;
    /**
     * @var bool set it to true when empty arrays, blank strings, null values
     * to be automatically removed from response
     */
    public static $removeEmpty = false;
    /**
     * @var bool set it to true to remove all null values from the result
     */
    public static $removeNull = false;
    /**
     * Convenience function that converts the given object
     * in to associative array
     *
     * @static
     *
     * @param mixed $object                          that needs to be converted
     *
     * @param bool  $forceObjectTypeWhenEmpty        when set to true outputs
     *                                               actual type  (array or
     *                                               object) rather than
     *                                               always an array when the
     *                                               array/object is empty
     *
     * @return array
     */
    public static function toArray($object, $forceObjectTypeWhenEmpty = false)
    {
    }
    public function __get($name)
    {
    }
    public function __set($name, $function)
    {
    }
    public function __isset($name)
    {
    }
    public function __unset($name)
    {
    }
}