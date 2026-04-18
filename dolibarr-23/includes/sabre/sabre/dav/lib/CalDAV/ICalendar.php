<?php

namespace Sabre\CalDAV;

/**
 * Calendar interface.
 *
 * Implement this interface to allow a node to be recognized as an calendar.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
interface ICalendar extends \Sabre\CalDAV\ICalendarObjectContainer, \Sabre\DAVACL\IACL
{
}