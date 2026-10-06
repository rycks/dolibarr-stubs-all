<?php

namespace Sabre\VObject\Component;

/**
 * The VFreeBusy component.
 *
 * This component adds functionality to a component, specific for VFREEBUSY
 * components.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class VFreeBusy extends \Sabre\VObject\Component
{
    /**
     * Checks based on the contained FREEBUSY information, if a timeslot is
     * available.
     *
     * @return bool
     */
    public function isFree(\DateTimeInterface $start, \DateTimeInterface $end)
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
    public function getValidationRules()
    {
    }
}