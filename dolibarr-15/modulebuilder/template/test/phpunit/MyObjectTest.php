<?php

/**
 * Class MyObjectTest
 *
 * @backupGlobals disabled
 * @backupStaticAttributes enabled
 * @remarks	backupGlobals must be disabled to have db,conf,user and lang not erased.
 */
class MyObjectTest extends \PHPUnit_Framework_TestCase
{
    protected $savconf;
    protected $savuser;
    protected $savlangs;
    protected $savdb;
    /**
     * Constructor
     * We save global variables into local variables
     *
     * @return MyObjectTest
     */
    public function __construct()
    {
    }
    /**
     * Global test setup
     *
     * @return void
     */
    public static function setUpBeforeClass()
    {
    }
    /**
     * Unit test setup
     *
     * @return void
     */
    protected function setUp()
    {
    }
    /**
     * Unit test teardown
     *
     * @return void
     */
    protected function tearDown()
    {
    }
    /**
     * Global test teardown
     *
     * @return void
     */
    public static function tearDownAfterClass()
    {
    }
    /**
     * A sample test
     *
     * @return bool
     */
    public function testSomething()
    {
    }
    /**
     * testMyObjectCreate
     *
     * @return int
     */
    public function testMyObjectCreate()
    {
    }
    /**
     * testMyObjectDelete
     *
     * @param	int		$id		Id of object
     * @return	int
     *
     * @depends	testMyObjectCreate
     * The depends says test is run only if previous is ok
     */
    public function testMyObjectDelete($id)
    {
    }
}