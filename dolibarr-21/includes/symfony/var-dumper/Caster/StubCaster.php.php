<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Casts a caster's Stub.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class StubCaster
{
    public static function castStub(\Symfony\Component\VarDumper\Cloner\Stub $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castCutArray(\Symfony\Component\VarDumper\Caster\CutArrayStub $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function cutInternals($obj, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castEnum(\Symfony\Component\VarDumper\Caster\EnumStub $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
}