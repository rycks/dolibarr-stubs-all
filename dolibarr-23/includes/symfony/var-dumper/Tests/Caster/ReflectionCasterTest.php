<?php

namespace Symfony\Component\VarDumper\Tests\Caster;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ReflectionCasterTest extends \PHPUnit\Framework\TestCase
{
    use \Symfony\Component\VarDumper\Test\VarDumperTestTrait;
    public function testReflectionCaster()
    {
    }
    public function testClosureCaster()
    {
    }
    public function testReflectionParameter()
    {
    }
    /**
     * @requires PHP 7.0
     */
    public function testReflectionParameterScalar()
    {
    }
    /**
     * @requires PHP 7.0
     */
    public function testReturnType()
    {
    }
    /**
     * @requires PHP 7.0
     */
    public function testGenerator()
    {
    }
}
/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Symfony\Component\VarDumper\Tests\Caster;

function reflectionParameterFixture(\Symfony\Component\VarDumper\Tests\Fixtures\NotLoadableClass $arg1 = null, $arg2)
{
}