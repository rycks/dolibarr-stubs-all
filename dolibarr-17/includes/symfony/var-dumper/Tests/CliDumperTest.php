<?php

namespace Symfony\Component\VarDumper\Tests;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class CliDumperTest extends \PHPUnit\Framework\TestCase
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
    public function testJsonCast()
    {
    }
    public function testObjectCast()
    {
    }
    public function testClosedResource()
    {
    }
    public function testFlags()
    {
    }
    /**
     * @requires function Twig\Template::getSourceContext
     */
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
    public function testIncompleteClass()
    {
    }
    private function getSpecialVars()
    {
    }
}