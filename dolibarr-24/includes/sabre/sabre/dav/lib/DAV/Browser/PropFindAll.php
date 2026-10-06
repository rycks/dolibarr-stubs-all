<?php

namespace Sabre\DAV\Browser;

/**
 * This class is used by the browser plugin to trick the system in returning
 * every defined property.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class PropFindAll extends \Sabre\DAV\PropFind
{
    /**
     * Creates the PROPFIND object.
     *
     * @param string $path
     */
    public function __construct($path)
    {
    }
    /**
     * Handles a specific property.
     *
     * This method checks whether the specified property was requested in this
     * PROPFIND request, and if so, it will call the callback and use the
     * return value for it's value.
     *
     * Example:
     *
     * $propFind->handle('{DAV:}displayname', function() {
     *      return 'hello';
     * });
     *
     * Note that handle will only work the first time. If null is returned, the
     * value is ignored.
     *
     * It's also possible to not pass a callback, but immediately pass a value
     *
     * @param string $propertyName
     * @param mixed  $valueOrCallBack
     */
    public function handle($propertyName, $valueOrCallBack)
    {
    }
    /**
     * Sets the value of the property.
     *
     * If status is not supplied, the status will default to 200 for non-null
     * properties, and 404 for null properties.
     *
     * @param string $propertyName
     * @param mixed  $value
     * @param int    $status
     */
    public function set($propertyName, $value, $status = null)
    {
    }
    /**
     * Returns the current value for a property.
     *
     * @param string $propertyName
     *
     * @return mixed
     */
    public function get($propertyName)
    {
    }
    /**
     * Returns the current status code for a property name.
     *
     * If the property does not appear in the list of requested properties,
     * null will be returned.
     *
     * @param string $propertyName
     *
     * @return int|null
     */
    public function getStatus($propertyName)
    {
    }
    /**
     * Returns all propertynames that have a 404 status, and thus don't have a
     * value yet.
     *
     * @return array
     */
    public function get404Properties()
    {
    }
}