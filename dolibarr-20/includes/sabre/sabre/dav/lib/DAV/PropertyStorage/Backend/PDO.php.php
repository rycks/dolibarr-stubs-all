<?php

namespace Sabre\DAV\PropertyStorage\Backend;

/**
 * PropertyStorage PDO backend.
 *
 * This backend class uses a PDO-enabled database to store webdav properties.
 * Both sqlite and mysql have been tested.
 *
 * The database structure can be found in the examples/sql/ directory.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class PDO implements \Sabre\DAV\PropertyStorage\Backend\BackendInterface
{
    /**
     * Value is stored as string.
     */
    const VT_STRING = 1;
    /**
     * Value is stored as XML fragment.
     */
    const VT_XML = 2;
    /**
     * Value is stored as a property object.
     */
    const VT_OBJECT = 3;
    /**
     * PDO.
     *
     * @var \PDO
     */
    protected $pdo;
    /**
     * PDO table name we'll be using.
     *
     * @var string
     */
    public $tableName = 'propertystorage';
    /**
     * Creates the PDO property storage engine.
     */
    public function __construct(\PDO $pdo)
    {
    }
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
     * However, you can also support the 'allprops' property here. In that
     * case, you should check for $propFind->isAllProps().
     *
     * @param string $path
     */
    public function propFind($path, \Sabre\DAV\PropFind $propFind)
    {
    }
    /**
     * Updates properties for a path.
     *
     * This method received a PropPatch object, which contains all the
     * information about the update.
     *
     * Usually you would want to call 'handleRemaining' on this object, to get;
     * a list of all properties that need to be stored.
     *
     * @param string $path
     */
    public function propPatch($path, \Sabre\DAV\PropPatch $propPatch)
    {
    }
    /**
     * This method is called after a node is deleted.
     *
     * This allows a backend to clean up all associated properties.
     *
     * The delete method will get called once for the deletion of an entire
     * tree.
     *
     * @param string $path
     */
    public function delete($path)
    {
    }
    /**
     * This method is called after a successful MOVE.
     *
     * This should be used to migrate all properties from one path to another.
     * Note that entire collections may be moved, so ensure that all properties
     * for children are also moved along.
     *
     * @param string $source
     * @param string $destination
     */
    public function move($source, $destination)
    {
    }
}