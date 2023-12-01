<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Casts SPL related classes to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class SplCaster
{
    private static $splFileObjectFlags = array(\SplFileObject::DROP_NEW_LINE => 'DROP_NEW_LINE', \SplFileObject::READ_AHEAD => 'READ_AHEAD', \SplFileObject::SKIP_EMPTY => 'SKIP_EMPTY', \SplFileObject::READ_CSV => 'READ_CSV');
    public static function castArrayObject(\ArrayObject $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castHeap(\Iterator $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castDoublyLinkedList(\SplDoublyLinkedList $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castFileInfo(\SplFileInfo $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castFileObject(\SplFileObject $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castFixedArray(\SplFixedArray $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castObjectStorage(\SplObjectStorage $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castOuterIterator(\OuterIterator $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
}