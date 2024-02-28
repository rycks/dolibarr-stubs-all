<?php

namespace Webklex\PHPIMAP;

/**
 * Class Header
 *
 * @package Webklex\PHPIMAP
 */
class Header
{
    /**
     * Raw header
     *
     * @var string $raw
     */
    public $raw = "";
    /**
     * Attribute holder
     *
     * @var Attribute[]|array $attributes
     */
    protected $attributes = [];
    /**
     * Config holder
     *
     * @var array $config
     */
    protected $config = [];
    /**
     * Fallback Encoding
     *
     * @var string
     */
    public $fallback_encoding = 'UTF-8';
    /**
     * Convert parsed values to attributes
     *
     * @var bool
     */
    protected $attributize = false;
    /**
     * Header constructor.
     * @param string $raw_header
     * @param boolean $attributize
     *
     * @throws InvalidMessageDateException
     */
    public function __construct($raw_header, $attributize = true)
    {
    }
    /**
     * Call dynamic attribute setter and getter methods
     * @param string $method
     * @param array $arguments
     *
     * @return Attribute|mixed
     * @throws MethodNotFoundException
     */
    public function __call($method, $arguments)
    {
    }
    /**
     * Magic getter
     * @param $name
     *
     * @return Attribute|null
     */
    public function __get($name)
    {
    }
    /**
     * Get a specific header attribute
     * @param $name
     *
     * @return Attribute|mixed
     */
    public function get($name)
    {
    }
    /**
     * Set a specific attribute
     * @param string $name
     * @param array|mixed $value
     * @param boolean $strict
     *
     * @return Attribute
     */
    public function set($name, $value, $strict = false)
    {
    }
    /**
     * Perform a regex match all on the raw header and return the first result
     * @param $pattern
     *
     * @return mixed|null
     */
    public function find($pattern)
    {
    }
    /**
     * Try to find a boundary if possible
     *
     * @return string|null
     */
    public function getBoundary()
    {
    }
    /**
     * Remove all unwanted chars from a given boundary
     * @param string $str
     *
     * @return string
     */
    private function clearBoundaryString($str)
    {
    }
    /**
     * Parse the raw headers
     *
     * @throws InvalidMessageDateException
     */
    protected function parse()
    {
    }
    /**
     * Parse mail headers from a string
     * @link https://php.net/manual/en/function.imap-rfc822-parse-headers.php
     * @param $raw_headers
     *
     * @return object
     */
    public function rfc822_parse_headers($raw_headers)
    {
    }
    /**
     * Decode MIME header elements
     * @link https://php.net/manual/en/function.imap-mime-header-decode.php
     * @param string $text The MIME text
     *
     * @return array The decoded elements are returned in an array of objects, where each
     * object has two properties, charset and text.
     */
    public function mime_header_decode($text)
    {
    }
    /**
     * Check if a given pair of strings has ben decoded
     * @param $encoded
     * @param $decoded
     *
     * @return bool
     */
    private function notDecoded($encoded, $decoded)
    {
    }
    /**
     * Convert the encoding
     * @param $str
     * @param string $from
     * @param string $to
     *
     * @return mixed|string
     */
    public function convertEncoding($str, $from = "ISO-8859-2", $to = "UTF-8")
    {
    }
    /**
     * Get the encoding of a given abject
     * @param object|string $structure
     *
     * @return string
     */
    public function getEncoding($structure)
    {
    }
    /**
     * Test if a given value is utf-8 encoded
     * @param $value
     *
     * @return bool
     */
    private function is_uft8($value)
    {
    }
    /**
     * Try to decode a specific header
     * @param mixed $value
     *
     * @return mixed
     */
    private function decode($value)
    {
    }
    /**
     * Decode a given array
     * @param array $values
     *
     * @return array
     */
    private function decodeArray($values)
    {
    }
    /**
     * Try to extract the priority from a given raw header string
     */
    private function findPriority()
    {
    }
    /**
     * Extract a given part as address array from a given header
     * @param $values
     *
     * @return array
     */
    private function decodeAddresses($values)
    {
    }
    /**
     * Extract a given part as address array from a given header
     * @param object $header
     */
    private function extractAddresses($header)
    {
    }
    /**
     * Parse Addresses
     * @param $list
     *
     * @return array
     */
    private function parseAddresses($list)
    {
    }
    /**
     * Search and extract potential header extensions
     */
    private function extractHeaderExtensions()
    {
    }
    /**
     * Exception handling for invalid dates
     *
     * Currently known invalid formats:
     * ^ Datetime                                   ^ Problem                           ^ Cause
     * | Mon, 20 Nov 2017 20:31:31 +0800 (GMT+8:00) | Double timezone specification     | A Windows feature
     * | Thu, 8 Nov 2018 08:54:58 -0200 (-02)       |
     * |                                            | and invalid timezone (max 6 char) |
     * | 04 Jan 2018 10:12:47 UT                    | Missing letter "C"                | Unknown
     * | Thu, 31 May 2018 18:15:00 +0800 (added by) | Non-standard details added by the | Unknown
     * |                                            | mail server                       |
     * | Sat, 31 Aug 2013 20:08:23 +0580            | Invalid timezone                  | PHPMailer bug https://sourceforge.net/p/phpmailer/mailman/message/6132703/
     *
     * Please report any new invalid timestamps to [#45](https://github.com/Webklex/php-imap/issues)
     *
     * @param object $header
     *
     * @throws InvalidMessageDateException
     */
    private function parseDate($header)
    {
    }
    /**
     * Get all available attributes
     *
     * @return array
     */
    public function getAttributes()
    {
    }
}