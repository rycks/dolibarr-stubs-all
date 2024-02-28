<?php

namespace Luracast\Restler;

/**
 * Storing and retrieving a message or array of key value pairs for one time use using $_SESSION
 *
 * They are typically used in view templates when using HtmlFormat
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 * @version    3.0.0rc6
 */
class Flash implements \ArrayAccess
{
    const SUCCESS = 'success';
    const INFO = 'info';
    const WARNING = 'warning';
    const DANGER = 'danger';
    /**
     * @var Flash
     */
    private static $instance;
    private $usedOnce = false;
    /**
     * Flash a success message to user
     *
     * @param string $message
     * @param string $header
     *
     * @return Flash
     */
    public static function success($message, $header = '')
    {
    }
    /**
     * Flash a info message to user
     *
     * @param string $message
     * @param string $header
     *
     * @return Flash
     */
    public static function info($message, $header = '')
    {
    }
    /**
     * Flash a warning message to user
     *
     * @param string $message
     * @param string $header
     *
     * @return Flash
     */
    public static function warning($message, $header = '')
    {
    }
    /**
     * Flash a error message to user
     *
     * @param string $message
     * @param string $header
     *
     * @return Flash
     */
    public static function danger($message, $header = '')
    {
    }
    /**
     * Flash a message to user
     *
     * @param string $text message text
     * @param string $header
     * @param string $type
     *
     * @return Flash
     */
    public static function message($text, $header = '', $type = \Luracast\Restler\Flash::WARNING)
    {
    }
    /**
     * Set some data for one time use
     *
     * @param array $data array of key value pairs {@type associative}
     *
     * @return Flash
     */
    public static function set(array $data)
    {
    }
    public function __get($name)
    {
    }
    public function __isset($name)
    {
    }
    public function __destruct()
    {
    }
    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    public function jsonSerialize()
    {
    }
    public function offsetExists($offset)
    {
    }
    public function offsetGet($offset)
    {
    }
    public function offsetSet($offset, $value)
    {
    }
    public function offsetUnset($offset)
    {
    }
}