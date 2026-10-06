<?php

namespace Symfony\Component\VarDumper\Tests\Caster;

/**
 * @author Baptiste Clavié <clavie.b@gmail.com>
 */
class XmlReaderCasterTest extends \PHPUnit\Framework\TestCase
{
    use \Symfony\Component\VarDumper\Test\VarDumperTestTrait;
    /** @var \XmlReader */
    private $reader;
    protected function setUp()
    {
    }
    protected function tearDown()
    {
    }
    public function testParserProperty()
    {
    }
    /**
     * @dataProvider provideNodes
     */
    public function testNodes($seek, $expectedDump)
    {
    }
    public function provideNodes()
    {
    }
}