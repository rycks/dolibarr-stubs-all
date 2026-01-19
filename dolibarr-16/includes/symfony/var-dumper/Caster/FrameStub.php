<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Represents a single backtrace frame as returned by debug_backtrace() or Exception->getTrace().
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class FrameStub extends \Symfony\Component\VarDumper\Caster\EnumStub
{
    public $keepArgs;
    public $inTraceStub;
    public function __construct(array $frame, $keepArgs = true, $inTraceStub = false)
    {
    }
}