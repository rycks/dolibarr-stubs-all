<?php

namespace Sabre\VObject\Property\VCard;

/**
 * Date property.
 *
 * This object encodes vCard DATE values.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class Date extends \Sabre\VObject\Property\VCard\DateAndOrTime
{
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
     * Sets the property as a DateTime object.
     */
    public function setDateTime(\DateTimeInterface $dt)
    {
    }
}