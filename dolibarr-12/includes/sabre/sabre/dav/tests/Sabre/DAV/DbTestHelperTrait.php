<?php

namespace Sabre\DAV;

class DbCache
{
    static $cache = [];
}
trait DbTestHelperTrait
{
    /**
     * Should be "mysql", "pgsql", "sqlite".
     */
    public $driver = null;
    /**
     * Returns a fully configured PDO object.
     *
     * @return PDO
     */
    function getDb()
    {
    }
    /**
     * Alias for getDb
     *
     * @return PDO
     */
    function getPDO()
    {
    }
    /**
     * Uses .sql files from the examples directory to initialize the database.
     *
     * @param string $schemaName
     * @return void
     */
    function createSchema($schemaName)
    {
    }
    /**
     * Drops tables, if they exist
     *
     * @param string|string[] $tableNames
     * @return void
     */
    function dropTables($tableNames)
    {
    }
    function tearDown()
    {
    }
}