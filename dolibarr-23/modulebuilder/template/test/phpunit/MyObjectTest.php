<?php

/**
 * Class MyObjectTest
 *
 * @backupGlobals disabled
 * @backupStaticAttributes enabled
 * @remarks	backupGlobals must be disabled to have db,conf,user and lang not erased.
 * @phan-file-suppress PhanCompatibleVoidTypePHP70
 */
class MyObjectTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Conf Saved configuration object
     */
    protected $savconf;
    /**
     * @var User Saved User object
     */
    protected $savuser;
    /**
     * @var Translate Saved translations object (from $langs)
     */
    protected $savlangs;
    /**
     * @var DoliDB Saved database object
     */
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
     * @return void No return value
     */
    public static function setUpBeforeClass() : void
    {
    }
    /**
     * Unit test setup
     *
     * @return void No return value
     */
    protected function setUp() : void
    {
    }
    /**
     * Unit test teardown
     *
     * @return void  No return value
     */
    protected function tearDown() : void
    {
    }
    /**
     * Global test teardown
     *
     * @return void No return value
     */
    public static function tearDownAfterClass() : void
    {
    }
    /**
     * A sample test
     *
     * @return bool
     * @phan-suppress PhanUndeclaredMethod
     */
    public function testSomething()
    {
    }
    /**
     * testMyObjectCreate
     *
     * @return int
     * @phan-suppress PhanUndeclaredMethod
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
     * @phan-suppress PhanUndeclaredMethod
     */
    public function testMyObjectDelete($id)
    {
    }
}