<?php

namespace Sabre\DAV;

class SyncTokenPropertyTest extends \Sabre\DAVServerTest
{
    /**
     * The assumption in these tests is that a PROPFIND is going on, and to
     * fetch the sync-token, the event handler is just able to use the existing
     * result.
     *
     * @param string $name
     * @param mixed $value
     *
     * @dataProvider data
     */
    function testAlreadyThere1($name, $value)
    {
    }
    /**
     * In these test-cases, the plugin is forced to do a local propfind to
     * fetch the items.
     *
     * @param string $name
     * @param mixed $value
     *
     * @dataProvider data
     */
    function testRefetch($name, $value)
    {
    }
    function testNoData()
    {
    }
    function data()
    {
    }
}