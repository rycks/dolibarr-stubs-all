<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Represents a list of function arguments.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ArgsStub extends \Symfony\Component\VarDumper\Caster\EnumStub
{
    private static $parameters = array();
    public function __construct(array $args, $function, $class)
    {
    }
    private static function getParameters($function, $class)
    {
    }
}