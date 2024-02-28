<?php

namespace Sabre\DAV\Auth\Backend;

class AbstractBasicTest extends \PHPUnit_Framework_TestCase
{
    function testCheckNoHeaders()
    {
    }
    function testCheckUnknownUser()
    {
    }
    function testCheckSuccess()
    {
    }
    function testRequireAuth()
    {
    }
}
class AbstractBasicMock extends \Sabre\DAV\Auth\Backend\AbstractBasic
{
    /**
     * Validates a username and password
     *
     * This method should return true or false depending on if login
     * succeeded.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    function validateUserPass($username, $password)
    {
    }
}