<?php

abstract class BenchMark
{
    protected $startTime;
    protected $iterations = 10000;
    protected $totalTime;
    function setUp()
    {
    }
    abstract function test();
    function go()
    {
    }
}
class OneCallBack extends \BenchMark
{
    protected $emitter;
    protected $iterations = 100000;
    function setUp()
    {
    }
    function test()
    {
    }
}
class ManyCallBacks extends \BenchMark
{
    protected $emitter;
    function setUp()
    {
    }
    function test()
    {
    }
}
class ManyPrioritizedCallBacks extends \BenchMark
{
    protected $emitter;
    function setUp()
    {
    }
    function test()
    {
    }
}