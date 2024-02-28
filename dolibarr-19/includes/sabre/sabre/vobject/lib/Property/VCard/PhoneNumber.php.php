<?php

namespace Sabre\VObject\Property\VCard;

/**
 * PhoneNumber property.
 *
 * This object encodes PHONE-NUMBER values.
 *
 * @author Christian Kraus <christian@kraus.work>
 */
class PhoneNumber extends \Sabre\VObject\Property\Text
{
    protected $structuredValues = [];
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
}