<?php

namespace Symfony\Component\VarDumper\Exception;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ThrowingCasterException extends \Exception
{
    /**
     * @param \Exception $prev The exception thrown from the caster
     */
    public function __construct(\Exception $prev)
    {
    }
}