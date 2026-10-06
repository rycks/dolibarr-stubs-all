<?php

namespace Webklex\PHPIMAP;

/**
 * Class Part
 *
 * @package Webklex\PHPIMAP
 */
class Part
{
    /**
     * Raw part
     *
     * @var string $raw
     */
    public $raw = "";
    /**
     * Part type
     *
     * @var int $type
     */
    public $type = \Webklex\PHPIMAP\IMAP::MESSAGE_TYPE_TEXT;
    /**
     * Part content
     *
     * @var string $content
     */
    public $content = "";
    /**
     * Part subtype
     *
     * @var string $subtype
     */
    public $subtype = null;
    /**
     * Part charset - if available
     *
     * @var string $charset
     */
    public $charset = "utf-8";
    /**
     * Part encoding method
     *
     * @var int $encoding
     */
    public $encoding = \Webklex\PHPIMAP\IMAP::MESSAGE_ENC_OTHER;
    /**
     * Alias to check if the part is an attachment
     *
     * @var boolean $ifdisposition
     */
    public $ifdisposition = false;
    /**
     * Indicates if the part is an attachment
     *
     * @var string $disposition
     */
    public $disposition = null;
    /**
     * Alias to check if the part has a description
     *
     * @var boolean $ifdescription
     */
    public $ifdescription = false;
    /**
     * Part description if available
     *
     * @var string $description
     */
    public $description = null;
    /**
     * Part filename if available
     *
     * @var string $filename
     */
    public $filename = null;
    /**
     * Part name if available
     *
     * @var string $name
     */
    public $name = null;
    /**
     * Part id if available
     *
     * @var string $id
     */
    public $id = null;
    /**
     * The part number of the current part
     *
     * @var integer $part_number
     */
    public $part_number = 0;
    /**
     * Part length in bytes
     *
     * @var integer $bytes
     */
    public $bytes = null;
    /**
     * Part content type
     *
     * @var string|null $content_type
     */
    public $content_type = null;
    /**
     * @var Header $header
     */
    private $header = null;
    /**
     * Part constructor.
     * @param $raw_part
     * @param Header $header
     * @param integer $part_number
     *
     * @throws InvalidMessageDateException
     */
    public function __construct($raw_part, $header = null, $part_number = 0)
    {
    }
    /**
     * Parse the raw parts
     *
     * @throws InvalidMessageDateException
     */
    protected function parse()
    {
    }
    /**
     * Find all available headers and return the left over body segment
     *
     * @return string
     * @throws InvalidMessageDateException
     */
    private function findHeaders()
    {
    }
    /**
     * Try to parse the subtype if any is present
     * @param $content_type
     *
     * @return string
     */
    private function parseSubtype($content_type)
    {
    }
    /**
     * Try to parse the disposition if any is present
     */
    private function parseDisposition()
    {
    }
    /**
     * Try to parse the description if any is present
     */
    private function parseDescription()
    {
    }
    /**
     * Try to parse the encoding if any is present
     */
    private function parseEncoding()
    {
    }
    /**
     * Check if the current part represents an attachment
     *
     * @return bool
     */
    public function isAttachment()
    {
    }
}