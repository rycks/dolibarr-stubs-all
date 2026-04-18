<?php

namespace Sabre\Xml;

/**
 * This exception is thrown when the Reader runs into a parsing error.
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
     * @var \LibXMLError[]
     */
    protected $errors;
    /**
     * Creates the exception.
     *
     * You should pass a list of LibXMLError objects in its constructor.
     *
     * @param LibXMLError[] $errors
     * @param Throwable     $previousException
     */
    public function __construct(array $errors, int $code = 0, \Throwable $previousException = null)
    {
    }
    /**
     * Returns the LibXML errors.
     */
    public function getErrors() : array
    {
    }
}