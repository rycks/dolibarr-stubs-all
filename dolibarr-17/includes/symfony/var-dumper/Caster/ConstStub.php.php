<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Represents a PHP constant and its value.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ConstStub extends \Symfony\Component\VarDumper\Cloner\Stub
{
    public function __construct($name, $value)
    {
    }
    public function __toString()
    {
    }
}