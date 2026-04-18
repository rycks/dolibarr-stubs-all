<?php

namespace Sabre\VObject\Property\VCard;

/**
 * TimeStamp property.
 *
 * This object encodes TIMESTAMP values.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class TimeStamp extends \Sabre\VObject\Property\Text
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
     * This method serializes only the value of a property. This is used to
     * create xCard or xCal documents.
     *
     * @param Xml\Writer $writer XML writer
     */
    protected function xmlSerializeValue(\Sabre\Xml\Writer $writer)
    {
    }
}