<?php

namespace Sabre\VObject;

/**
 * UUID Utility.
 *
 * This class has static methods to generate and validate UUID's.
 * UUIDs are used a decent amount within various *DAV standards, so it made
 * sense to include it.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class UUIDUtil
{
    /**
     * Returns a pseudo-random v4 UUID.
     *
     * This function is based on a comment by Andrew Moore on php.net
     *
     * @see http://www.php.net/manual/en/function.uniqid.php#94959
     *
     * @return string
     */
    public static function getUUID()
    {
    }
    /**
     * Checks if a string is a valid UUID.
     *
     * @param string $uuid
     *
     * @return bool
     */
    public static function validateUUID($uuid)
    {
    }
}