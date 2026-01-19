<?php

namespace Sabre\DAV;

/**
 * Tests related to the MOVE request.
 *
 * @copyright Copyright (C) fruux GmbH (https://fruux.com/)
 * @author Evert Pot (http://evertpot.com/)
 * @license http://sabre.io/license/ Modified BSD License
 */
class HttpMoveTest extends \Sabre\DAVServerTest
{
    /**
     * Sets up the DAV tree.
     *
     * @return void
     */
    function setUpTree()
    {
    }
    function testMoveToSelf()
    {
    }
    function testMove()
    {
    }
    function testMoveToExisting()
    {
    }
    function testMoveToExistingOverwriteT()
    {
    }
    function testMoveToExistingOverwriteF()
    {
    }
    /**
     * If we MOVE to an existing file, but a plugin prevents the original from
     * being deleted, we need to make sure that the server does not delete
     * the destination.
     */
    function testMoveToExistingBlockedDeleteSource()
    {
    }
}