<?php

namespace Webklex\PHPIMAP;

/**
 * Class Structure
 *
 * @package Webklex\PHPIMAP
 */
class Structure
{
    /**
     * Raw structure
     *
     * @var string $raw
     */
    public $raw = "";
    /**
     * @var Header $header
     */
    private $header = null;
    /**
     * Message type (if multipart or not)
     *
     * @var int $type
     */
    public $type = \Webklex\PHPIMAP\IMAP::MESSAGE_TYPE_TEXT;
    /**
     * All available parts
     *
     * @var Part[] $parts
     */
    public $parts = [];
    /**
     * Config holder
     *
     * @var array $config
     */
    protected $config = [];
    /**
     * Structure constructor.
     * @param $raw_structure
     * @param Header $header
     *
     * @throws MessageContentFetchingException
     * @throws InvalidMessageDateException
     */
    public function __construct($raw_structure, \Webklex\PHPIMAP\Header $header)
    {
    }
    /**
     * Parse the given raw structure
     *
     * @throws MessageContentFetchingException
     * @throws InvalidMessageDateException
     */
    protected function parse()
    {
    }
    /**
     * Determine the message content type
     */
    public function findContentType()
    {
    }
    /**
     * Find all available headers and return the left over body segment
     * @var string $context
     * @var integer $part_number
     *
     * @return Part[]
     * @throws InvalidMessageDateException
     */
    private function parsePart($context, $part_number = 0)
    {
    }
    /**
     * @param string $boundary
     * @param string $context
     * @param int $part_number
     *
     * @return array
     * @throws InvalidMessageDateException
     */
    private function detectParts($boundary, $context, $part_number = 0)
    {
    }
    /**
     * Find all available parts
     *
     * @return array
     * @throws MessageContentFetchingException
     * @throws InvalidMessageDateException
     */
    public function find_parts()
    {
    }
    /**
     * Try to find a boundary if possible
     *
     * @return string|null
     * @Depricated since version 2.4.4
     */
    public function getBoundary()
    {
    }
}