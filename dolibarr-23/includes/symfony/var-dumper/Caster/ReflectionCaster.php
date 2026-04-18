<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Casts Reflector related classes to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ReflectionCaster
{
    private static $extraMap = array('docComment' => 'getDocComment', 'extension' => 'getExtensionName', 'isDisabled' => 'isDisabled', 'isDeprecated' => 'isDeprecated', 'isInternal' => 'isInternal', 'isUserDefined' => 'isUserDefined', 'isGenerator' => 'isGenerator', 'isVariadic' => 'isVariadic');
    public static function castClosure(\Closure $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castGenerator(\Generator $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castType(\ReflectionType $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castReflectionGenerator(\ReflectionGenerator $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castClass(\ReflectionClass $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested, $filter = 0)
    {
    }
    public static function castFunctionAbstract(\ReflectionFunctionAbstract $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested, $filter = 0)
    {
    }
    public static function castMethod(\ReflectionMethod $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castParameter(\ReflectionParameter $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castProperty(\ReflectionProperty $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castExtension(\ReflectionExtension $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castZendExtension(\ReflectionZendExtension $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    private static function addExtra(&$a, \Reflector $c)
    {
    }
    private static function addMap(&$a, \Reflector $c, $map, $prefix = \Symfony\Component\VarDumper\Caster\Caster::PREFIX_VIRTUAL)
    {
    }
}