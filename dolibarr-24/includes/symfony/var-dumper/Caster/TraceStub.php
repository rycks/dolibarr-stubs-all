<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Represents a backtrace as returned by debug_backtrace() or Exception->getTrace().
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class TraceStub extends \Symfony\Component\VarDumper\Cloner\Stub
{
    public $keepArgs;
    public $sliceOffset;
    public $sliceLength;
    public $numberingOffset;
    public function __construct(array $trace, $keepArgs = true, $sliceOffset = 0, $sliceLength = null, $numberingOffset = 0)
    {
    }
}