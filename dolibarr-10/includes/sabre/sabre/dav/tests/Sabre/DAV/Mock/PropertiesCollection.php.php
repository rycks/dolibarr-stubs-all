<?php

namespace Sabre\DAV\Mock;

/**
 * A node specifically for testing property-related operations
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class PropertiesCollection extends \Sabre\DAV\Mock\Collection implements \Sabre\DAV\IProperties
{
    public $failMode = false;
    public $properties;
    /**
     * Creates the object
     *
     * @param string $name
     * @param array $children
     * @param array $properties
     * @return void
     */
    function __construct($name, array $children, array $properties = [])
    {
    }
    /**
     * Updates properties on this node.
     *
     * This method received a PropPatch object, which contains all the
     * information about the update.
     *
     * To update specific properties, call the 'handle' method on this object.
     * Read the PropPatch documentation for more information.
     *
     * @param PropPatch $proppatch
     * @return bool|array
     */
    function propPatch(\Sabre\DAV\PropPatch $proppatch)
    {
    }
    /**
     * Returns a list of properties for this nodes.
     *
     * The properties list is a list of propertynames the client requested,
     * encoded in clark-notation {xmlnamespace}tagname
     *
     * If the array is empty, it means 'all properties' were requested.
     *
     * Note that it's fine to liberally give properties back, instead of
     * conforming to the list of requested properties.
     * The Server class will filter out the extra.
     *
     * @param array $requestedProperties
     * @return array
     */
    function getProperties($requestedProperties)
    {
    }
}