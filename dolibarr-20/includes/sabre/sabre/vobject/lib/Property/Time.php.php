<?php

namespace Sabre\VObject\Property;

/**
 * Time property.
 *
 * This object encodes TIME values.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Time extends \Sabre\VObject\Property\Text
{
    /**
     * In case this is a multi-value property. This string will be used as a
     * delimiter.
     *
     * @var string
     */
    public $delimiter = '';
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
     * Sets the JSON value, as it would appear in a jCard or jCal object.
     *
     * The value must always be an array.
     */
    public function setJsonValue(array $value)
    {
    }
    /**
     * Returns the value, in the format it should be encoded for json.
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
}