<?php

namespace Sabre\VObject\Component;

/**
 * VAlarm component.
 *
 * This component contains some additional functionality specific for VALARMs.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class VAlarm extends \Sabre\VObject\Component
{
    /**
     * Returns a DateTime object when this alarm is going to trigger.
     *
     * This ignores repeated alarm, only the first trigger is returned.
     *
     * @return DateTimeImmutable
     */
    public function getEffectiveTriggerTime()
    {
    }
    /**
     * Returns true or false depending on if the event falls in the specified
     * time-range. This is used for filtering purposes.
     *
     * The rules used to determine if an event falls within the specified
     * time-range is based on the CalDAV specification.
     *
     * @param DateTime $start
     * @param DateTime $end
     *
     * @return bool
     */
    public function isInTimeRange(\DateTimeInterface $start, \DateTimeInterface $end)
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