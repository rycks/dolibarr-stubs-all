<?php

namespace Carbon\PHPStan;

/**
 * Class MacroExtension.
 *
 * @codeCoverageIgnore Pure PHPStan wrapper.
 */
final class MacroExtension implements \PHPStan\Reflection\MethodsClassReflectionExtension
{
    /**
     * @var PhpMethodReflectionFactory
     */
    protected $methodReflectionFactory;
    /**
     * @var MacroScanner
     */
    protected $scanner;
    /**
     * Extension constructor.
     *
     * @param PhpMethodReflectionFactory $methodReflectionFactory
     */
    public function __construct(\PHPStan\Reflection\Php\PhpMethodReflectionFactory $methodReflectionFactory)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function hasMethod(\PHPStan\Reflection\ClassReflection $classReflection, string $methodName) : bool
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getMethod(\PHPStan\Reflection\ClassReflection $classReflection, string $methodName) : \PHPStan\Reflection\MethodReflection
    {
    }
}