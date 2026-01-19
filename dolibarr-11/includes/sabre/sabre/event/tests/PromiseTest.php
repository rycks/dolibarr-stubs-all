<?php

namespace Sabre\Event;

class PromiseTest extends \PHPUnit_Framework_TestCase
{
    function testSuccess()
    {
    }
    function testFail()
    {
    }
    function testChain()
    {
    }
    function testChainPromise()
    {
    }
    function testPendingResult()
    {
    }
    function testPendingFail()
    {
    }
    function testExecutorSuccess()
    {
    }
    function testExecutorFail()
    {
    }
    /**
     * @expectedException \Sabre\Event\PromiseAlreadyResolvedException
     */
    function testFulfillTwice()
    {
    }
    /**
     * @expectedException \Sabre\Event\PromiseAlreadyResolvedException
     */
    function testRejectTwice()
    {
    }
    function testFromFailureHandler()
    {
    }
    function testAll()
    {
    }
    function testAllReject()
    {
    }
    function testAllRejectThenResolve()
    {
    }
    function testRace()
    {
    }
    function testRaceReject()
    {
    }
    function testWaitResolve()
    {
    }
    /**
     * @expectedException \LogicException
     */
    function testWaitWillNeverResolve()
    {
    }
    function testWaitRejectedException()
    {
    }
    function testWaitRejectedScalar()
    {
    }
    function testWaitRejectedNonScalar()
    {
    }
}