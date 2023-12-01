<?php

namespace Carbon\PHPStan;

abstract class AbstractReflectionMacro extends \Carbon\PHPStan\AbstractMacro
{
    /**
     * {@inheritdoc}
     */
    public function getReflection() : ?\PHPStan\BetterReflection\Reflection\Adapter\ReflectionMethod
    {
    }
}