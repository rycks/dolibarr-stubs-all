<?php

namespace Sabre\VObject\Property;

/**
 * Text property.
 *
 * This object represents TEXT values.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Text extends \Sabre\VObject\Property
{
    /**
     * In case this is a multi-value property. This string will be used as a
     * delimiter.
     *
     * @var string
     */
    public $delimiter = ',';
    /**
     * List of properties that are considered 'structured'.
     *
     * @var array
     */
    protected $structuredValues = [
        // vCard
        'N',
        'ADR',
        'ORG',
        'GENDER',
        'CLIENTPIDMAP',
        // iCalendar
        'REQUEST-STATUS',
    ];
    /**
     * Some text components have a minimum number of components.
     *
     * N must for instance be represented as 5 components, separated by ;, even
     * if the last few components are unused.
     *
     * @var array
     */
    protected $minimumPropertyValues = ['N' => 5, 'ADR' => 7];
    /**
     * Creates the property.
     *
     * You can specify the parameters either in key=>value syntax, in which case
     * parameters will automatically be created, or you can just pass a list of
     * Parameter objects.
     *
     * @param Component $root The root document
     * @param string $name
     * @param string|array|null $value
     * @param array $parameters List of parameters
     * @param string $group The vcard property group
     *
     * @return void
     */
    function __construct(\Sabre\VObject\Component $root, $name, $value = null, array $parameters = [], $group = null)
    {
    }
    /**
     * Sets a raw value coming from a mimedir (iCalendar/vCard) file.
     *
     * This has been 'unfolded', so only 1 line will be passed. Unescaping is
     * not yet done, but parameters are not included.
     *
     * @param string $val
     *
     * @return void
     */
    function setRawMimeDirValue($val)
    {
    }
    /**
     * Sets the value as a quoted-printable encoded string.
     *
     * @param string $val
     *
     * @return void
     */
    function setQuotedPrintableValue($val)
    {
    }
    /**
     * Returns a raw mime-dir representation of the value.
     *
     * @return string
     */
    function getRawMimeDirValue()
    {
    }
    /**
     * Returns the value, in the format it should be encoded for json.
     *
     * This method must always return an array.
     *
     * @return array
     */
    function getJsonValue()
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
    function getValueType()
    {
    }
    /**
     * Turns the object back into a serialized blob.
     *
     * @return string
     */
    function serialize()
    {
    }
    /**
     * This method serializes only the value of a property. This is used to
     * create xCard or xCal documents.
     *
     * @param Xml\Writer $writer  XML writer.
     *
     * @return void
     */
    protected function xmlSerializeValue(\Sabre\Xml\Writer $writer)
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
    function validate($options = 0)
    {
    }
}