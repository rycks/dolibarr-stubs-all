<?php

namespace Sabre\DAV\FSExt;

class ServerTest extends \Sabre\DAV\AbstractServer
{
    protected function getRootNode()
    {
    }
    function testGet()
    {
    }
    function testHEAD()
    {
    }
    function testPut()
    {
    }
    function testPutAlreadyExists()
    {
    }
    function testMkcol()
    {
    }
    function testPutUpdate()
    {
    }
    function testDelete()
    {
    }
    function testDeleteDirectory()
    {
    }
    function testOptions()
    {
    }
    function testMove()
    {
    }
    /**
     * This test checks if it's possible to move a non-FSExt collection into a
     * FSExt collection.
     *
     * The moveInto function *should* ignore the object and let sabredav itself
     * execute the slow move.
     */
    function testMoveOtherObject()
    {
    }
}