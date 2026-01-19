<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Casts common Exception classes to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ExceptionCaster
{
    public static $srcContext = 1;
    public static $traceArgs = true;
    public static $errorTypes = array(E_DEPRECATED => 'E_DEPRECATED', E_USER_DEPRECATED => 'E_USER_DEPRECATED', E_RECOVERABLE_ERROR => 'E_RECOVERABLE_ERROR', E_ERROR => 'E_ERROR', E_WARNING => 'E_WARNING', E_PARSE => 'E_PARSE', E_NOTICE => 'E_NOTICE', E_CORE_ERROR => 'E_CORE_ERROR', E_CORE_WARNING => 'E_CORE_WARNING', E_COMPILE_ERROR => 'E_COMPILE_ERROR', E_COMPILE_WARNING => 'E_COMPILE_WARNING', E_USER_ERROR => 'E_USER_ERROR', E_USER_WARNING => 'E_USER_WARNING', E_USER_NOTICE => 'E_USER_NOTICE', E_STRICT => 'E_STRICT');
    public static function castError(\Error $e, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested, $filter = 0)
    {
    }
    public static function castException(\Exception $e, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested, $filter = 0)
    {
    }
    public static function castErrorException(\ErrorException $e, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castThrowingCasterException(\Symfony\Component\VarDumper\Exception\ThrowingCasterException $e, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castTraceStub(\Symfony\Component\VarDumper\Caster\TraceStub $trace, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castFrameStub(\Symfony\Component\VarDumper\Caster\FrameStub $frame, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    private static function filterExceptionArray($xClass, array $a, $xPrefix, $filter)
    {
    }
    private static function extractSource(array $srcArray, $line, $srcContext)
    {
    }
}