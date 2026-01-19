<?php

namespace Sabre\Xml;

/**
 * This exception is thrown when the Readers runs into a parsing error.
 *
 * This exception effectively wraps 1 or more LibXMLError objects.
 *
 * @copyright Copyright (C) 2009-2015 fruux GmbH (https://fruux.com/).
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class LibXMLException extends \Sabre\Xml\ParseException
{
    /**
     * The error list.
     *
     * @var LibXMLError[]
     */
    protected $errors;
    /**
     * Creates the exception.
     *
     * You should pass a list of LibXMLError objects in its constructor.
     *
     * @param LibXMLError[] $errors
     * @param int $code
     * @param Exception $previousException
     */
    function __construct(array $errors, $code = null, \Sabre\Xml\Exception $previousException = null)
    {
    }
    /**
     * Returns the LibXML errors
     *
     * @return void
     */
    function getErrors()
    {
    }
}