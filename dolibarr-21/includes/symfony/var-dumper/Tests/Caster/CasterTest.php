<?php

namespace Symfony\Component\VarDumper\Tests\Caster;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class CasterTest extends \PHPUnit\Framework\TestCase
{
    use \Symfony\Component\VarDumper\Test\VarDumperTestTrait;
    private $referenceArray = array('null' => null, 'empty' => false, 'public' => 'pub', "\x00~\x00virtual" => 'virt', "\x00+\x00dynamic" => 'dyn', "\x00*\x00protected" => 'prot', "\x00Foo\x00private" => 'priv');
    /**
     * @dataProvider provideFilter
     */
    public function testFilter($filter, $expectedDiff, $listedProperties = null)
    {
    }
    public function provideFilter()
    {
    }
    /**
     * @requires PHP 7.0
     */
    public function testAnonymousClass()
    {
    }
}