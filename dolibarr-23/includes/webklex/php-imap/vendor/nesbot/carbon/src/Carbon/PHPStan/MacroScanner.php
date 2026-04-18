<?php

namespace Carbon\PHPStan;

final class MacroScanner
{
    /**
     * Return true if the given pair class-method is a Carbon macro.
     *
     * @param string $className
     * @phpstan-param class-string $className
     *
     * @param string $methodName
     *
     * @return bool
     */
    public function hasMethod(string $className, string $methodName) : bool
    {
    }
    /**
     * Return the Macro for a given pair class-method.
     *
     * @param string $className
     * @phpstan-param class-string $className
     *
     * @param string $methodName
     *
     * @throws ReflectionException
     *
     * @return Macro
     */
    public function getMethod(string $className, string $methodName) : \Carbon\PHPStan\Macro
    {
    }
}