<?php

namespace Sabre\VObject\Parser;

/**
 * Json Parser.
 *
 * This parser parses both the jCal and jCard formats.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Json extends \Sabre\VObject\Parser\Parser
{
    /**
     * The input data.
     *
     * @var array
     */
    protected $input;
    /**
     * Root component.
     *
     * @var Document
     */
    protected $root;
    /**
     * This method starts the parsing process.
     *
     * If the input was not supplied during construction, it's possible to pass
     * it here instead.
     *
     * If either input or options are not supplied, the defaults will be used.
     *
     * @param resource|string|array|null $input
     * @param int $options
     *
     * @return Sabre\VObject\Document
     */
    function parse($input = null, $options = 0)
    {
    }
    /**
     * Parses a component.
     *
     * @param array $jComp
     *
     * @return \Sabre\VObject\Component
     */
    function parseComponent(array $jComp)
    {
    }
    /**
     * Parses properties.
     *
     * @param array $jProp
     *
     * @return \Sabre\VObject\Property
     */
    function parseProperty(array $jProp)
    {
    }
    /**
     * Sets the input data.
     *
     * @param resource|string|array $input
     *
     * @return void
     */
    function setInput($input)
    {
    }
}