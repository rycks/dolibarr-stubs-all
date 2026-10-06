<?php

namespace Sabre\VObject;

/**
 * Property.
 *
 * A property is always in a KEY:VALUE structure, and may optionally contain
 * parameters.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
abstract class Property extends \Sabre\VObject\Node
{
    /**
     * Property name.
     *
     * This will contain a string such as DTSTART, SUMMARY, FN.
     *
     * @var string
     */
    public $name;
    /**
     * Property group.
     *
     * This is only used in vcards
     *
     * @var string|null
     */
    public $group;
    /**
     * List of parameters.
     *
     * @var array
     */
    public $parameters = [];
    /**
     * Current value.
     *
     * @var mixed
     */
    protected $value;
    /**
     * In case this is a multi-value property. This string will be used as a
     * delimiter.
     *
     * @var string
     */
    public $delimiter = ';';
    /**
     * Creates the generic property.
     *
     * Parameters must be specified in key=>value syntax.
     *
     * @param Component         $root       The root document
     * @param string            $name
     * @param string|array|null $value
     * @param array             $parameters List of parameters
     * @param string            $group      The vcard property group
     */
    public function __construct(\Sabre\VObject\Component $root, $name, $value = null, array $parameters = [], $group = null)
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
     * This method will always return a singular value. If this was a
     * multi-value object, some decision will be made first on how to represent
     * it as a string.
     *
     * To get the correct multi-value version, use getParts.
     *
     * @return string
     */
    public function getValue()
    {
    }
    /**
     * Sets a multi-valued property.
     */
    public function setParts(array $parts)
    {
    }
    /**
     * Returns a multi-valued property.
     *
     * This method always returns an array, if there was only a single value,
     * it will still be wrapped in an array.
     *
     * @return array
     */
    public function getParts()
    {
    }
    /**
     * Adds a new parameter.
     *
     * If a parameter with same name already existed, the values will be
     * combined.
     * If nameless parameter is added, we try to guess its name.
     *
     * @param string            $name
     * @param string|array|null $value
     */
    public function add($name, $value = null)
    {
    }
    /**
     * Returns an iterable list of children.
     *
     * @return array
     */
    public function parameters()
    {
    }
    /**
     * Returns the type of value.
     *
     * This corresponds to the VALUE= parameter. Every property also has a
     * 'default' valueType.
     *
     * @return string
     */
    public abstract function getValueType();
    /**
     * Sets a raw value coming from a mimedir (iCalendar/vCard) file.
     *
     * This has been 'unfolded', so only 1 line will be passed. Unescaping is
     * not yet done, but parameters are not included.
     *
     * @param string $val
     */
    public abstract function setRawMimeDirValue($val);
    /**
     * Returns a raw mime-dir representation of the value.
     *
     * @return string
     */
    public abstract function getRawMimeDirValue();
    /**
     * Turns the object back into a serialized blob.
     *
     * @return string
     */
    public function serialize()
    {
    }
    /**
     * Returns the value, in the format it should be encoded for JSON.
     *
     * This method must always return an array.
     *
     * @return array
     */
    public function getJsonValue()
    {
    }
    /**
     * Sets the JSON value, as it would appear in a jCard or jCal object.
     *
     * The value must always be an array.
     */
    public function setJsonValue(array $value)
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
     * Hydrate data from a XML subtree, as it would appear in a xCard or xCal
     * object.
     */
    public function setXmlValue(array $value)
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
     * This method serializes only the value of a property. This is used to
     * create xCard or xCal documents.
     *
     * @param Xml\Writer $writer XML writer
     */
    protected function xmlSerializeValue(\Sabre\Xml\Writer $writer)
    {
    }
    /**
     * Called when this object is being cast to a string.
     *
     * If the property only had a single value, you will get just that. In the
     * case the property had multiple values, the contents will be escaped and
     * combined with ,.
     *
     * @return string
     */
    public function __toString()
    {
    }
    /* ArrayAccess interface {{{ */
    /**
     * Checks if an array element exists.
     *
     * @param mixed $name
     *
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($name)
    {
    }
    /**
     * Returns a parameter.
     *
     * If the parameter does not exist, null is returned.
     *
     * @param string $name
     *
     * @return Node
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($name)
    {
    }
    /**
     * Creates a new parameter.
     *
     * @param string $name
     * @param mixed  $value
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($name, $value)
    {
    }
    /**
     * Removes one or more parameters with the specified name.
     *
     * @param string $name
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($name)
    {
    }
    /* }}} */
    /**
     * This method is automatically called when the object is cloned.
     * Specifically, this will ensure all child elements are also cloned.
     */
    public function __clone()
    {
    }
    /**
     * Validates the node for correctness.
     *
     * The following options are supported:
     *   - Node::REPAIR - If something is broken, and automatic repair may
     *                    be attempted.
     *
     * An array is returned with warnings.
     *
     * Every item in the array has the following properties:
     *    * level - (number between 1 and 3 with severity information)
     *    * message - (human readable message)
     *    * node - (reference to the offending node)
     *
     * @param int $options
     *
     * @return array
     */
    public function validate($options = 0)
    {
    }
    /**
     * Call this method on a document if you're done using it.
     *
     * It's intended to remove all circular references, so PHP can easily clean
     * it up.
     */
    public function destroy()
    {
    }
}