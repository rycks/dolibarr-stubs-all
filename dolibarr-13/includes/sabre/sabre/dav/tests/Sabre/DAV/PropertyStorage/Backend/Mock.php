<?php

namespace Sabre\DAV\PropertyStorage\Backend;

class Mock implements \Sabre\DAV\PropertyStorage\Backend\BackendInterface
{
    public $data = [];
    /**
     * Fetches properties for a path.
     *
     * This method received a PropFind object, which contains all the
     * information about the properties that need to be fetched.
     *
     * Usually you would just want to call 'get404Properties' on this object,
     * as this will give you the _exact_ list of properties that need to be
     * fetched, and haven't yet.
     *
     * @param string $path
     * @param PropFind $propFind
     * @return void
     */
    function propFind($path, \Sabre\DAV\PropFind $propFind)
    {
    }
    /**
     * Updates properties for a path
     *
     * This method received a PropPatch object, which contains all the
     * information about the update.
     *
     * Usually you would want to call 'handleRemaining' on this object, to get;
     * a list of all properties that need to be stored.
     *
     * @param string $path
     * @param PropPatch $propPatch
     * @return void
     */
    function propPatch($path, \Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * This method is called after a node is deleted.
     *
     * This allows a backend to clean up all associated properties.
     *
     * @param string $path
     * @return void
     */
    function delete($path)
    {
    }
    /**
     * This method is called after a successful MOVE
     *
     * This should be used to migrate all properties from one path to another.
     * Note that entire collections may be moved, so ensure that all properties
     * for children are also moved along.
     *
     * @param string $source
     * @param string $destination
     * @return void
     */
    function move($source, $destination)
    {
    }
}