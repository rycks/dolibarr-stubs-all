<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Represents a PHP class identifier.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ClassStub extends \Symfony\Component\VarDumper\Caster\ConstStub
{
    /**
     * Constructor.
     *
     * @param string   A PHP identifier, e.g. a class, method, interface, etc. name
     * @param callable The callable targeted by the identifier when it is ambiguous or not a real PHP identifier
     */
    public function __construct($identifier, $callable = null)
    {
    }
    public static function wrapCallable($callable)
    {
    }
}