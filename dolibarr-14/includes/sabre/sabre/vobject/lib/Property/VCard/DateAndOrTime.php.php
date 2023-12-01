<?php

namespace Sabre\VObject\Property\VCard;

/**
 * DateAndOrTime property.
 *
 * This object encodes DATE-AND-OR-TIME values.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class DateAndOrTime extends \Sabre\VObject\Property
{
    /**
     * Field separator.
     *
     * @var null|string
     */
    public $delimiter = null;
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
     * Sets a multi-valued property.
     *
     * You may also specify DateTimeInterface objects here.
     *
     * @param array $parts
     *
     * @return void
     */
    function setParts(array $parts)
    {
    }
    /**
     * Updates the current value.
     *
     * This may be either a single, or multiple strings in an array.
     *
     * Instead of strings, you may also use DateTimeInterface here.
     *
     * @param string|array|DateTimeInterface $value
     *
     * @return void
     */
    function setValue($value)
    {
    }
    /**
     * Sets the property as a DateTime object.
     *
     * @param DateTimeInterface $dt
     *
     * @return void
     */
    function setDateTime(\DateTimeInterface $dt)
    {
    }
    /**
     * Returns a date-time value.
     *
     * Note that if this property contained more than 1 date-time, only the
     * first will be returned. To get an array with multiple values, call
     * getDateTimes.
     *
     * If no time was specified, we will always use midnight (in the default
     * timezone) as the time.
     *
     * If parts of the date were omitted, such as the year, we will grab the
     * current values for those. So at the time of writing, if the year was
     * omitted, we would have filled in 2014.
     *
     * @return DateTimeImmutable
     */
    function getDateTime()
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
     * This method serializes only the value of a property. This is used to
     * create xCard or xCal documents.
     *
     * @param Xml\Writer $writer  XML writer.
     *
     * @return void
     */
    protected function xmlSerializeValue(\Sabre\Xml\Writer $writer)
    {
    }
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
     * Validates the node for correctness.
     *
     * The following options are supported:
     *   Node::REPAIR - May attempt to automatically repair the problem.
     *
     * This method returns an array with detected problems.
     * Every element has the following properties:
     *
     *  * level - problem level.
     *  * message - A human-readable string describing the issue.
     *  * node - A reference to the problematic node.
     *
     * The level means:
     *   1 - The issue was repaired (only happens if REPAIR was turned on)
     *   2 - An inconsequential issue
     *   3 - A severe issue.
     *
     * @param int $options
     *
     * @return array
     */
    function validate($options = 0)
    {
    }
}