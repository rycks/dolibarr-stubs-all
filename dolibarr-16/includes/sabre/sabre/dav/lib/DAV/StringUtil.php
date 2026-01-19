<?php

namespace Sabre\DAV;

/**
 * String utility
 *
 * This class is mainly used to implement the 'text-match' filter, used by both
 * the CalDAV calendar-query REPORT, and CardDAV addressbook-query REPORT.
 * Because they both need it, it was decided to put it in Sabre\DAV instead.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class StringUtil
{
    /**
     * Checks if a needle occurs in a haystack ;)
     *
     * @param string $haystack
     * @param string $needle
     * @param string $collation
     * @param string $matchType
     * @return bool
     */
    static function textMatch($haystack, $needle, $collation, $matchType = 'contains')
    {
    }
    /**
     * This method takes an input string, checks if it's not valid UTF-8 and
     * attempts to convert it to UTF-8 if it's not.
     *
     * Note that currently this can only convert ISO-8559-1 to UTF-8 (latin-1),
     * anything else will likely fail.
     *
     * @param string $input
     * @return string
     */
    static function ensureUTF8($input)
    {
    }
}