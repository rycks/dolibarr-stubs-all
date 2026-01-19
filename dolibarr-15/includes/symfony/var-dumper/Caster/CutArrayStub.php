<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Represents a cut array.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class CutArrayStub extends \Symfony\Component\VarDumper\Caster\CutStub
{
    public $preservedSubset;
    public function __construct(array $value, array $preservedKeys)
    {
    }
}