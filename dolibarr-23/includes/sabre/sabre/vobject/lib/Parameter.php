<?php

namespace Sabre\VObject;

/**
 * VObject Parameter.
 *
 * This class represents a parameter. A parameter is always tied to a property.
 * In the case of:
 *   DTSTART;VALUE=DATE:20101108
 * VALUE=DATE would be the parameter name and value.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Parameter extends \Sabre\VObject\Node
{
    /**
     * Parameter name.
     *
     * @var string
     */
    public $name;
    /**
     * vCard 2.1 allows parameters to be encoded without a name.
     *
     * We can deduce the parameter name based on its value.
     *
     * @var bool
     */
    public $noName = false;
    /**
     * Parameter value.
     *
     * @var string
     */
    protected $value;
    /**
     * Sets up the object.
     *
     * It's recommended to use the create:: factory method instead.
     *
     * @param string $name
     * @param string $value
     */
    public function __construct(\Sabre\VObject\Document $root, $name, $value = null)
    {
    }
    /**
     * Try to guess property name by value, can be used for vCard 2.1 nameless parameters.
     *
     * Figuring out what the name should have been. Note that a ton of
     * these are rather silly in 2014 and would probably rarely be
     * used, but we like to be complete.
     *
     * @param string $value
     *
     * @return string
     */
    public static function guessParameterNameByValue($value)
    {
    }
    /**
     * Updates the current value.
     *
     * This may be either a single, or multiple strings in an array.
     *
     * @param string|array $value
     */
    public function setValue($value)
    {
    }
    /**
     * Returns the current value.
     *
     * This method will always return a string, or null. If there were multiple
     * values, it will automatically concatenate them (separated by comma).
     *
     * @return string|null
     */
    public function getValue()
    {
    }
    /**
     * Sets multiple values for this parameter.
     */
    public function setParts(array $value)
    {
    }
    /**
     * Returns all values for this parameter.
     *
     * If there were no values, an empty array will be returned.
     *
     * @return array
     */
    public function getParts()
    {
    }
    /**
     * Adds a value to this parameter.
     *
     * If the argument is specified as an array, all items will be added to the
     * parameter value list.
     *
     * @param string|array $part
     */
    public function addValue($part)
    {
    }
    /**
     * Checks if this parameter contains the specified value.
     *
     * This is a case-insensitive match. It makes sense to call this for for
     * instance the TYPE parameter, to see if it contains a keyword such as
     * 'WORK' or 'FAX'.
     *
     * @param string $value
     *
     * @return bool
     */
    public function has($value)
    {
    }
    /**
     * Turns the object back into a serialized blob.
     *
     * @return string
     */
    public function serialize()
    {
    }
    /**
     * This method returns an array, with the representation as it should be
     * encoded in JSON. This is used to create jCard or jCal documents.
     *
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
    }
    /**
     * This method serializes the data into XML. This is used to create xCard or
     * xCal documents.
     *
     * @param Xml\Writer $writer XML writer
     */
    public function xmlSerialize(\Sabre\Xml\Writer $writer) : void
    {
    }
    /**
     * Called when this object is being cast to a string.
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Returns the iterator for this object.
     *
     * @return ElementList
     */
    #[\ReturnTypeWillChange]
    public function getIterator()
    {
    }
}