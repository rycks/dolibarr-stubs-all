<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Casts Redis class from ext-redis to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class RedisCaster
{
    private static $serializer = array(\Redis::SERIALIZER_NONE => 'NONE', \Redis::SERIALIZER_PHP => 'PHP', 2 => 'IGBINARY');
    public static function castRedis(\Redis $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castRedisArray(\RedisArray $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
}