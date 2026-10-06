<?php

namespace Symfony\Component\VarDumper\Tests\Caster;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class PdoCasterTest extends \PHPUnit\Framework\TestCase
{
    use \Symfony\Component\VarDumper\Test\VarDumperTestTrait;
    /**
     * @requires extension pdo_sqlite
     */
    public function testCastPdo()
    {
    }
}