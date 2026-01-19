<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Helper for filtering out properties in casters.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class Caster
{
    const EXCLUDE_VERBOSE = 1;
    const EXCLUDE_VIRTUAL = 2;
    const EXCLUDE_DYNAMIC = 4;
    const EXCLUDE_PUBLIC = 8;
    const EXCLUDE_PROTECTED = 16;
    const EXCLUDE_PRIVATE = 32;
    const EXCLUDE_NULL = 64;
    const EXCLUDE_EMPTY = 128;
    const EXCLUDE_NOT_IMPORTANT = 256;
    const EXCLUDE_STRICT = 512;
    const PREFIX_VIRTUAL = "\x00~\x00";
    const PREFIX_DYNAMIC = "\x00+\x00";
    const PREFIX_PROTECTED = "\x00*\x00";
    /**
     * Casts objects to arrays and adds the dynamic property prefix.
     *
     * @param object           $obj       The object to cast.
     * @param \ReflectionClass $reflector The class reflector to use for inspecting the object definition.
     *
     * @return array The array-cast of the object, with prefixed dynamic properties.
     */
    public static function castObject($obj, \ReflectionClass $reflector)
    {
    }
    /**
     * Filters out the specified properties.
     *
     * By default, a single match in the $filter bit field filters properties out, following an "or" logic.
     * When EXCLUDE_STRICT is set, an "and" logic is applied: all bits must match for a property to be removed.
     *
     * @param array    $a                The array containing the properties to filter.
     * @param int      $filter           A bit field of Caster::EXCLUDE_* constants specifying which properties to filter out.
     * @param string[] $listedProperties List of properties to exclude when Caster::EXCLUDE_VERBOSE is set, and to preserve when Caster::EXCLUDE_NOT_IMPORTANT is set.
     *
     * @return array The filtered array
     */
    public static function filter(array $a, $filter, array $listedProperties = array())
    {
    }
}