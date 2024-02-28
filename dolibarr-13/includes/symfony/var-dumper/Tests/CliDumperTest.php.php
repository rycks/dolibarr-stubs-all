<?php

namespace Symfony\Component\VarDumper\Tests;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class CliDumperTest extends \PHPUnit_Framework_TestCase
{
    use \Symfony\Component\VarDumper\Test\VarDumperTestTrait;
    public function testGet()
    {
    }
    /**
     * @requires extension xml
     */
    public function testXmlResource()
    {
    }
    public function testClosedResource()
    {
    }
    public function testThrowingCaster()
    {
    }
    public function testRefsInProperties()
    {
    }
    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @requires PHP 5.6
     */
    public function testSpecialVars56()
    {
    }
    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testGlobalsNoExt()
    {
    }
    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testBuggyRefs()
    {
    }
    private function getSpecialVars()
    {
    }
}