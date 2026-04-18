<?php

namespace Luracast\Restler\Format;

/**
 * Abstract class to implement common methods of iFormat
 *
 * @category   Framework
 * @package    Restler
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link       http://luracast.com/products/restler/
 *
 */
abstract class Format implements \Luracast\Restler\Format\iFormat
{
    /**
     * override in the extending class
     */
    const MIME = 'text/plain';
    /**
     * override in the extending class
     */
    const EXTENSION = 'txt';
    /**
     * @var string charset encoding defaults to UTF8
     */
    protected $charset = 'utf-8';
    /**
     * Injected at runtime
     *
     * @var \Luracast\Restler\Restler
     */
    public $restler;
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
     * @param string $mime
     *            MIME type
     */
    public function setMIME($mime)
    {
    }
    /**
     * Content-Type field of the HTTP header can send a charset
     * parameter in the HTTP header to specify the character
     * encoding of the document.
     * This information is passed
     * here so that Format class can encode data accordingly
     * Format class may choose to ignore this and use its
     * default character set.
     *
     * @param string $charset
     *            Example utf-8
     */
    public function setCharset($charset)
    {
    }
    /**
     * Content-Type accepted by the Format class
     *
     * @return string $charset Example utf-8
     */
    public function getCharset()
    {
    }
    /**
     * Get selected MIME type
     */
    public function getMIME()
    {
    }
    /**
     * Set the selected file extension
     *
     * @param string $extension
     *            file extension
     */
    public function setExtension($extension)
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
     * @return boolean is parsing the request supported?
     */
    public function isReadable()
    {
    }
    /**
     * @return boolean is composing response supported?
     */
    public function isWritable()
    {
    }
    public function __toString()
    {
    }
}