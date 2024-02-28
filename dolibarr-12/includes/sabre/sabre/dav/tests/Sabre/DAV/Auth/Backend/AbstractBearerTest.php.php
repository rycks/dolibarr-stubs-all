<?php

namespace Sabre\DAV\Auth\Backend;

class AbstractBearerTest extends \PHPUnit_Framework_TestCase
{
    function testCheckNoHeaders()
    {
    }
    function testCheckInvalidToken()
    {
    }
    function testCheckSuccess()
    {
    }
    function testRequireAuth()
    {
    }
}
class AbstractBearerMock extends \Sabre\DAV\Auth\Backend\AbstractBearer
{
    /**
     * Validates a bearer token
     *
     * This method should return true or false depending on if login
     * succeeded.
     *
     * @param string $bearerToken
     * @return bool
     */
    function validateBearerToken($bearerToken)
    {
    }
}