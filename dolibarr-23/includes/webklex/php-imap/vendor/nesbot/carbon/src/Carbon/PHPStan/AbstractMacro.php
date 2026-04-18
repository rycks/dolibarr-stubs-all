<?php

namespace Carbon\PHPStan;

abstract class AbstractMacro implements \PHPStan\Reflection\Php\BuiltinMethodReflection
{
    /**
     * The reflection function/method.
     *
     * @var ReflectionFunction|ReflectionMethod
     */
    protected $reflectionFunction;
    /**
     * The class name.
     *
     * @var class-string
     */
    private $className;
    /**
     * The method name.
     *
     * @var string
     */
    private $methodName;
    /**
     * The parameters.
     *
     * @var ReflectionParameter[]
     */
    private $parameters;
    /**
     * The is static.
     *
     * @var bool
     */
    private $static = false;
    /**
     * Macro constructor.
     *
     * @param string $className
     * @phpstan-param class-string $className
     *
     * @param string   $methodName
     * @param callable $macro
     */
    public function __construct(string $className, string $methodName, $macro)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getDeclaringClass() : \ReflectionClass
    {
    }
    /**
     * {@inheritdoc}
     */
    public function isPrivate() : bool
    {
    }
    /**
     * {@inheritdoc}
     */
    public function isPublic() : bool
    {
    }
    /**
     * {@inheritdoc}
     */
    public function isFinal() : bool
    {
    }
    /**
     * {@inheritdoc}
     */
    public function isInternal() : bool
    {
    }
    /**
     * {@inheritdoc}
     */
    public function isAbstract() : bool
    {
    }
    /**
     * {@inheritdoc}
     */
    public function isStatic() : bool
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getDocComment() : ?string
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getName() : string
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getParameters() : array
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getReturnType() : ?\ReflectionType
    {
    }
    /**
     * {@inheritdoc}
     */
    public function isDeprecated() : \PHPStan\TrinaryLogic
    {
    }
    /**
     * {@inheritdoc}
     */
    public function isVariadic() : bool
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getPrototype() : \PHPStan\Reflection\Php\BuiltinMethodReflection
    {
    }
    public function getTentativeReturnType() : ?\ReflectionType
    {
    }
}