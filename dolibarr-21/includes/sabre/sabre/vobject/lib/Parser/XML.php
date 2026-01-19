<?php

namespace Sabre\VObject\Parser;

/**
 * XML Parser.
 *
 * This parser parses both the xCal and xCard formats.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Ivan Enderlin
 * @license http://sabre.io/license/ Modified BSD License
 */
class XML extends \Sabre\VObject\Parser\Parser
{
    const XCAL_NAMESPACE = 'urn:ietf:params:xml:ns:icalendar-2.0';
    const XCARD_NAMESPACE = 'urn:ietf:params:xml:ns:vcard-4.0';
    /**
     * The input data.
     *
     * @var array
     */
    protected $input;
    /**
     * A pointer/reference to the input.
     *
     * @var array
     */
    private $pointer;
    /**
     * Document, root component.
     *
     * @var \Sabre\VObject\Document
     */
    protected $root;
    /**
     * Creates the parser.
     *
     * Optionally, it's possible to parse the input stream here.
     *
     * @param mixed $input
     * @param int   $options any parser options (OPTION constants)
     */
    public function __construct($input = null, $options = 0)
    {
    }
    /**
     * Parse xCal or xCard.
     *
     * @param resource|string $input
     * @param int             $options
     *
     * @throws \Exception
     *
     * @return \Sabre\VObject\Document
     */
    public function parse($input = null, $options = 0)
    {
    }
    /**
     * Parse a xCalendar component.
     */
    protected function parseVCalendarComponents(\Sabre\VObject\Component $parentComponent)
    {
    }
    /**
     * Parse a xCard component.
     */
    protected function parseVCardComponents(\Sabre\VObject\Component $parentComponent)
    {
    }
    /**
     * Parse xCalendar and xCard properties.
     *
     * @param string $propertyNamePrefix
     */
    protected function parseProperties(\Sabre\VObject\Component $parentComponent, $propertyNamePrefix = '')
    {
    }
    /**
     * Parse a component.
     */
    protected function parseComponent(\Sabre\VObject\Component $parentComponent)
    {
    }
    /**
     * Create a property.
     *
     * @param string $name
     * @param array  $parameters
     * @param string $type
     * @param mixed  $value
     */
    protected function createProperty(\Sabre\VObject\Component $parentComponent, $name, $parameters, $type, $value)
    {
    }
    /**
     * Sets the input data.
     *
     * @param resource|string $input
     */
    public function setInput($input)
    {
    }
    /**
     * Get tag name from a Clark notation.
     *
     * @param string $clarkedTagName
     *
     * @return string
     */
    protected static function getTagName($clarkedTagName)
    {
    }
}