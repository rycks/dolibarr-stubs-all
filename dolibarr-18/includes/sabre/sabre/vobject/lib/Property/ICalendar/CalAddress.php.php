<?php

namespace Sabre\VObject\Property\ICalendar;

/**
 * CalAddress property.
 *
 * This object encodes CAL-ADDRESS values, as defined in rfc5545
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class CalAddress extends \Sabre\VObject\Property\Text
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
     * This returns a normalized form of the value.
     *
     * This is primarily used right now to turn mixed-cased schemes in user
     * uris to lower-case.
     *
     * Evolution in particular tends to encode mailto: as MAILTO:.
     *
     * @return string
     */
    public function getNormalizedValue()
    {
    }
}