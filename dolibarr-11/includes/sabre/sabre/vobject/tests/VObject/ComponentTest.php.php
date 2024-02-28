<?php

namespace Sabre\VObject;

class ComponentTest extends \PHPUnit_Framework_TestCase
{
    function testIterate()
    {
    }
    function testMagicGet()
    {
    }
    function testMagicGetGroups()
    {
    }
    function testMagicIsset()
    {
    }
    function testMagicSetScalar()
    {
    }
    function testMagicSetScalarTwice()
    {
    }
    function testMagicSetArray()
    {
    }
    function testMagicSetComponent()
    {
    }
    function testMagicSetTwice()
    {
    }
    function testArrayAccessGet()
    {
    }
    function testArrayAccessExists()
    {
    }
    /**
     * @expectedException LogicException
     */
    function testArrayAccessSet()
    {
    }
    /**
     * @expectedException LogicException
     */
    function testArrayAccessUnset()
    {
    }
    function testAddScalar()
    {
    }
    function testAddScalarParams()
    {
    }
    function testAddComponent()
    {
    }
    function testAddComponentTwice()
    {
    }
    /**
     * @expectedException InvalidArgumentException
     */
    function testAddArgFail()
    {
    }
    /**
     * @expectedException InvalidArgumentException
     */
    function testAddArgFail2()
    {
    }
    function testMagicUnset()
    {
    }
    function testCount()
    {
    }
    function testChildren()
    {
    }
    function testGetComponents()
    {
    }
    function testSerialize()
    {
    }
    function testSerializeChildren()
    {
    }
    function testSerializeOrderCompAndProp()
    {
    }
    function testAnotherSerializeOrderProp()
    {
    }
    function testInstantiateWithChildren()
    {
    }
    function testInstantiateSubComponent()
    {
    }
    function testRemoveByName()
    {
    }
    function testRemoveByObj()
    {
    }
    /**
     * @expectedException InvalidArgumentException
     */
    function testRemoveNotFound()
    {
    }
    /**
     * @dataProvider ruleData
     */
    function testValidateRules($componentList, $errorCount)
    {
    }
    function testValidateRepair()
    {
    }
    function ruleData()
    {
    }
}
class FakeComponent extends \Sabre\VObject\Component
{
    function getValidationRules()
    {
    }
    function getDefaults()
    {
    }
}