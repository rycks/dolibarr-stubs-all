<?php

namespace Sabre\DAV;

/**
 * This class represents a set of properties that are going to be updated.
 *
 * Usually this is simply a PROPPATCH request, but it can also be used for
 * internal updates.
 *
 * Property updates must always be atomic. This means that a property update
 * must either completely succeed, or completely fail.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class PropPatch
{
    /**
     * Properties that are being updated.
     *
     * This is a key-value list. If the value is null, the property is supposed
     * to be deleted.
     *
     * @var array
     */
    protected $mutations;
    /**
     * A list of properties and the result of the update. The result is in the
     * form of a HTTP status code.
     *
     * @var array
     */
    protected $result = [];
    /**
     * This is the list of callbacks when we're performing the actual update.
     *
     * @var array
     */
    protected $propertyUpdateCallbacks = [];
    /**
     * This property will be set to true if the operation failed.
     *
     * @var bool
     */
    protected $failed = false;
    /**
     * Constructor
     *
     * @param array $mutations A list of updates
     */
    function __construct(array $mutations)
    {
    }
    /**
     * Call this function if you wish to handle updating certain properties.
     * For instance, your class may be responsible for handling updates for the
     * {DAV:}displayname property.
     *
     * In that case, call this method with the first argument
     * "{DAV:}displayname" and a second argument that's a method that does the
     * actual updating.
     *
     * It's possible to specify more than one property as an array.
     *
     * The callback must return a boolean or an it. If the result is true, the
     * operation was considered successful. If it's false, it's consided
     * failed.
     *
     * If the result is an integer, we'll use that integer as the http status
     * code associated with the operation.
     *
     * @param string|string[] $properties
     * @param callable $callback
     * @return void
     */
    function handle($properties, callable $callback)
    {
    }
    /**
     * Call this function if you wish to handle _all_ properties that haven't
     * been handled by anything else yet. Note that you effectively claim with
     * this that you promise to process _all_ properties that are coming in.
     *
     * @param callable $callback
     * @return void
     */
    function handleRemaining(callable $callback)
    {
    }
    /**
     * Sets the result code for one or more properties.
     *
     * @param string|string[] $properties
     * @param int $resultCode
     * @return void
     */
    function setResultCode($properties, $resultCode)
    {
    }
    /**
     * Sets the result code for all properties that did not have a result yet.
     *
     * @param int $resultCode
     * @return void
     */
    function setRemainingResultCode($resultCode)
    {
    }
    /**
     * Returns the list of properties that don't have a result code yet.
     *
     * This method returns a list of property names, but not its values.
     *
     * @return string[]
     */
    function getRemainingMutations()
    {
    }
    /**
     * Returns the list of properties that don't have a result code yet.
     *
     * This method returns list of properties and their values.
     *
     * @return array
     */
    function getRemainingValues()
    {
    }
    /**
     * Performs the actual update, and calls all callbacks.
     *
     * This method returns true or false depending on if the operation was
     * successful.
     *
     * @return bool
     */
    function commit()
    {
    }
    /**
     * Executes a property callback with the single-property syntax.
     *
     * @param string $propertyName
     * @param callable $callback
     * @return void
     */
    private function doCallBackSingleProp($propertyName, callable $callback)
    {
    }
    /**
     * Executes a property callback with the multi-property syntax.
     *
     * @param array $propertyList
     * @param callable $callback
     * @return void
     */
    private function doCallBackMultiProp(array $propertyList, callable $callback)
    {
    }
    /**
     * Returns the result of the operation.
     *
     * @return array
     */
    function getResult()
    {
    }
    /**
     * Returns the full list of mutations
     *
     * @return array
     */
    function getMutations()
    {
    }
}