<?php

namespace Sabre\VObject\Component;

/**
 * The VTimeZone component.
 *
 * This component adds functionality to a component, specific for VTIMEZONE
 * components.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class VTimeZone extends \Sabre\VObject\Component
{
    /**
     * Returns the PHP DateTimeZone for this VTIMEZONE component.
     *
     * If we can't accurately determine the timezone, this method will return
     * UTC.
     *
     * @return \DateTimeZone
     */
    function getTimeZone()
    {
    }
    /**
     * A simple list of validation rules.
     *
     * This is simply a list of properties, and how many times they either
     * must or must not appear.
     *
     * Possible values per property:
     *   * 0 - Must not appear.
     *   * 1 - Must appear exactly once.
     *   * + - Must appear at least once.
     *   * * - Can appear any number of times.
     *   * ? - May appear, but not more than once.
     *
     * @var array
     */
    function getValidationRules()
    {
    }
}