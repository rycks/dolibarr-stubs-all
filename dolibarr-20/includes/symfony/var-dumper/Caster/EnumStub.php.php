<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Represents an enumeration of values.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class EnumStub extends \Symfony\Component\VarDumper\Cloner\Stub
{
    public $dumpKeys = true;
    public function __construct(array $values, $dumpKeys = true)
    {
    }
}