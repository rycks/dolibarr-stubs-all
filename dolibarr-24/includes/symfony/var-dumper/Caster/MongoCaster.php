<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Casts classes from the MongoDb extension to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class MongoCaster
{
    public static function castCursor(\MongoCursorInterface $cursor, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
}