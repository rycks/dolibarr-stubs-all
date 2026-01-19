<?php

/*
 * (c) Patrick Hayes 2011
 *
 * This code is open-source and licenced under the Modified BSD License.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * GeoAdapter : abstract class which represents an adapter
 * for reading and writing to and from Geomtry objects
 *
 */
abstract class GeoAdapter
{
    /**
     * Read input and return a Geomtry or GeometryCollection
     *
     * @return Geometry|GeometryCollection
     */
    public abstract function read($input);
    /**
     * Write out a Geomtry or GeometryCollection in the adapter's format
     *
     * @return mixed
     */
    public abstract function write(\Geometry $geometry);
}