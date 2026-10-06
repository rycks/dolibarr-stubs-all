<?php

/**
 * EWKB (Extended Well Known Binary) Adapter
 */
class EWKB extends \WKB
{
    /**
     * Read WKB binary string into geometry objects
     *
     * @param string $wkb An Extended-WKB binary string
     *
     * @return Geometry
     */
    public function read($wkb, $is_hex_string = \false)
    {
    }
    /**
     * Serialize geometries into an EWKB binary string.
     *
     * @param Geometry $geometry
     *
     * @return string The Extended-WKB binary string representation of the input geometries
     */
    public function write(\Geometry $geometry, $write_as_hex = \false)
    {
    }
}