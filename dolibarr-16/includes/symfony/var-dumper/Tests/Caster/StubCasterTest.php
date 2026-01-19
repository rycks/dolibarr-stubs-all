<?php

namespace Symfony\Component\VarDumper\Tests\Caster;

class StubCasterTest extends \PHPUnit\Framework\TestCase
{
    use \Symfony\Component\VarDumper\Test\VarDumperTestTrait;
    public function testArgsStubWithDefaults($foo = 234, $bar = 456)
    {
    }
    public function testArgsStubWithExtraArgs($foo = 234)
    {
    }
    public function testArgsStubNoParamWithExtraArgs()
    {
    }
    public function testArgsStubWithClosure()
    {
    }
    public function testLinkStub()
    {
    }
    public function testClassStub()
    {
    }
    public function testClassStubWithNotExistingClass()
    {
    }
    public function testClassStubWithNotExistingMethod()
    {
    }
}