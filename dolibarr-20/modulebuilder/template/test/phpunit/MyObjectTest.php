<?php

/**
 * Class MyObjectTest
 *
 * @backupGlobals disabled
 * @backupStaticAttributes enabled
 * @remarks	backupGlobals must be disabled to have db,conf,user and lang not erased.
 */
class MyObjectTest extends \PHPUnit\Framework\TestCase
{
    protected $savconf;
    protected $savuser;
    protected $savlangs;
    protected $savdb;
    /**
     * Constructor
     * We save global variables into local variables
     *
     * @param 	string	$name		Name
     */
    public function __construct($name = '')
    {
    }
    /**
     * Global test setup
     *
     * @return void
     */
    public static function setUpBeforeClass() : void
    {
    }
    /**
     * Unit test setup
     *
     * @return void
     */
    protected function setUp() : void
    {
    }
    /**
     * Unit test teardown
     *
     * @return void
     */
    protected function tearDown() : void
    {
    }
    /**
     * Global test teardown
     *
     * @return void
     */
    public static function tearDownAfterClass() : void
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