<?php

namespace Sabre\VObject\Property;

/**
 * Float property.
 *
 * This object represents FLOAT values. These can be 1 or more floating-point
 * numbers.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class FloatValue extends \Sabre\VObject\Property
{
    /**
     * In case this is a multi-value property. This string will be used as a
     * delimiter.
     *
     * @var string
     */
    public $delimiter = ';';
    /**
     * Sets a raw value coming from a mimedir (iCalendar/vCard) file.
     *
     * This has been 'unfolded', so only 1 line will be passed. Unescaping is
     * not yet done, but parameters are not included.
     *
     * @param string $val
     */
    public function setRawMimeDirValue($val)
    {
    }
    /**
     * Returns a raw mime-dir representation of the value.
     *
     * @return string
     */
    public function getRawMimeDirValue()
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
    public function getValueType()
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
     * Hydrate data from a XML subtree, as it would appear in a xCard or xCal
     * object.
     */
    public function setXmlValue(array $value)
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
}