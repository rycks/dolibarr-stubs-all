<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Casts Doctrine related classes to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class DoctrineCaster
{
    public static function castCommonProxy(\Doctrine\Common\Proxy\Proxy $proxy, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castOrmProxy(\Doctrine\ORM\Proxy\Proxy $proxy, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castPersistentCollection(\Doctrine\ORM\PersistentCollection $coll, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
}