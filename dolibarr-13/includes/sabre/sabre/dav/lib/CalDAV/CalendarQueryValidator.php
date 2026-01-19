<?php

namespace Sabre\CalDAV;

/**
 * CalendarQuery Validator
 *
 * This class is responsible for checking if an iCalendar object matches a set
 * of filters. The main function to do this is 'validate'.
 *
 * This is used to determine which icalendar objects should be returned for a
 * calendar-query REPORT request.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class CalendarQueryValidator
{
    /**
     * Verify if a list of filters applies to the calendar data object
     *
     * The list of filters must be formatted as parsed by \Sabre\CalDAV\CalendarQueryParser
     *
     * @param VObject\Component\VCalendar $vObject
     * @param array $filters
     * @return bool
     */
    function validate(\Sabre\VObject\Component\VCalendar $vObject, array $filters)
    {
    }
    /**
     * This method checks the validity of comp-filters.
     *
     * A list of comp-filters needs to be specified. Also the parent of the
     * component we're checking should be specified, not the component to check
     * itself.
     *
     * @param VObject\Component $parent
     * @param array $filters
     * @return bool
     */
    protected function validateCompFilters(\Sabre\VObject\Component $parent, array $filters)
    {
    }
    /**
     * This method checks the validity of prop-filters.
     *
     * A list of prop-filters needs to be specified. Also the parent of the
     * property we're checking should be specified, not the property to check
     * itself.
     *
     * @param VObject\Component $parent
     * @param array $filters
     * @return bool
     */
    protected function validatePropFilters(\Sabre\VObject\Component $parent, array $filters)
    {
    }
    /**
     * This method checks the validity of param-filters.
     *
     * A list of param-filters needs to be specified. Also the parent of the
     * parameter we're checking should be specified, not the parameter to check
     * itself.
     *
     * @param VObject\Property $parent
     * @param array $filters
     * @return bool
     */
    protected function validateParamFilters(\Sabre\VObject\Property $parent, array $filters)
    {
    }
    /**
     * This method checks the validity of a text-match.
     *
     * A single text-match should be specified as well as the specific property
     * or parameter we need to validate.
     *
     * @param VObject\Node|string $check Value to check against.
     * @param array $textMatch
     * @return bool
     */
    protected function validateTextMatch($check, array $textMatch)
    {
    }
    /**
     * Validates if a component matches the given time range.
     *
     * This is all based on the rules specified in rfc4791, which are quite
     * complex.
     *
     * @param VObject\Node $component
     * @param DateTime $start
     * @param DateTime $end
     * @return bool
     */
    protected function validateTimeRange(\Sabre\VObject\Node $component, $start, $end)
    {
    }
}