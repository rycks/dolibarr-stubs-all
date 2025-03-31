<?php

namespace Illuminate\Support;

class Reflector
{
    /**
     * This is a PHP 7.4 compatible implementation of is_callable.
     *
     * @param  mixed  $var
     * @param  bool  $syntaxOnly
     * @return bool
     */
    public static function isCallable($var, $syntaxOnly = false)
    {
    }
    /**
     * Get the class name of the given parameter's type, if possible.
     *
     * @param  \ReflectionParameter  $parameter
     * @return string|null
     */
    public static function getParameterClassName($parameter)
    {
    }
    /**
     * Get the class names of the given parameter's type, including union types.
     *
     * @param  \ReflectionParameter  $parameter
     * @return array
     */
    public static function getParameterClassNames($parameter)
    {
    }
    /**
     * Get the given type's class name.
     *
     * @param  \ReflectionParameter  $parameter
     * @param  \ReflectionNamedType  $type
     * @return string
     */
    protected static function getTypeName($parameter, $type)
    {
    }
    /**
     * Determine if the parameter's type is a subclass of the given type.
     *
     * @param  \ReflectionParameter  $parameter
     * @param  string  $className
     * @return bool
     */
    public static function isParameterSubclassOf($parameter, $className)
    {
    }
}