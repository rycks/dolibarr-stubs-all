<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Represents the main properties of a PHP variable, pre-casted by a caster.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class CutStub extends \Symfony\Component\VarDumper\Cloner\Stub
{
    public function __construct($value)
    {
    }
}