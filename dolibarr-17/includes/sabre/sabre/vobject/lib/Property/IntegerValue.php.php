<?php

namespace Sabre\VObject\Property;

/**
 * Integer property.
 *
 * This object represents INTEGER values. These are always a single integer.
 * They may be preceeded by either + or -.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class IntegerValue extends \Sabre\VObject\Property
{
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
     * Returns a raw mime-dir representation of the value.
     *
     * @return string
     */
    function getRawMimeDirValue()
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
     * Hydrate data from a XML subtree, as it would appear in a xCard or xCal
     * object.
     *
     * @param array $value
     *
     * @return void
     */
    function setXmlValue(array $value)
    {
    }
}