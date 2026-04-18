<?php

namespace Symfony\Component\VarDumper;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class VarDumper
{
    private static $handler;
    public static function dump($var)
    {
    }
    public static function setHandler(callable $callable = null)
    {
    }
}