<?php

namespace Sabre\CalDAV\Subscriptions;

class CreateSubscriptionTest extends \Sabre\DAVServerTest
{
    protected $setupCalDAV = true;
    protected $setupCalDAVSubscriptions = true;
    /**
     * OS X 10.7 - 10.9.1
     */
    function testMKCOL()
    {
    }
    /**
     * OS X 10.9.2 and up
     */
    function testMKCALENDAR()
    {
    }
    function assertSubscription($subscription)
    {
    }
}