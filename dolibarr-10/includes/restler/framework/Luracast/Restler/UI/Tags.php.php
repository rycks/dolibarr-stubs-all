<?php

namespace Luracast\Restler\UI;

/**
 * Utility class for generating html tags in an object oriented way
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 *
 * ============================ magic  properties ==============================
 * @property Tags parent parent tag
 * ============================== magic  methods ===============================
 * @method Tags name(string $value) name attribute
 * @method Tags action(string $value) action attribute
 * @method Tags placeholder(string $value) placeholder attribute
 * @method Tags value(string $value) value attribute
 * @method Tags required(boolean $value) required attribute
 * @method Tags class(string $value) required attribute
 *
 * =========================== static magic methods ============================
 * @method static Tags form() creates a html form
 * @method static Tags input() creates a html input element
 * @method static Tags button() creates a html button element
 *
 */
class Tags implements \ArrayAccess, \Countable
{
    public static $humanReadable = true;
    public static $initializer = null;
    protected static $instances = array();
    public $prefix = '';
    public $indent = '    ';
    public $tag;
    protected $attributes = array();
    protected $children = array();
    protected $_parent;
    public function __construct($name = null, array $children = array())
    {
    }
    /**
     * Get Tag by id
     *
     * Retrieve a tag by its id attribute
     *
     * @param string $id
     *
     * @return Tags|null
     */
    public static function byId($id)
    {
    }
    /**
     * @param       $name
     * @param array $children
     *
     * @return Tags
     */
    public static function __callStatic($name, array $children)
    {
    }
    public function toString($prefix = '', $indent = '    ')
    {
    }
    public function __toString()
    {
    }
    public function toArray()
    {
    }
    /**
     * Set the id attribute of the current tag
     *
     * @param string $value
     *
     * @return string
     */
    public function id($value)
    {
    }
    public function __get($name)
    {
    }
    public function __set($name, $value)
    {
    }
    public function __isset($name)
    {
    }
    /**
     * @param $attribute
     * @param $value
     *
     * @return Tags
     */
    public function __call($attribute, $value)
    {
    }
    public function offsetGet($index)
    {
    }
    public function offsetExists($index)
    {
    }
    public function offsetSet($index, $value)
    {
    }
    public function offsetUnset($index)
    {
    }
    public function getContents()
    {
    }
    public function count()
    {
    }
    private function markAsChildren(&$children)
    {
    }
}