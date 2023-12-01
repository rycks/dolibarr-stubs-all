<?php

namespace Carbon\Traits;

/**
 * Trait Mixin.
 *
 * Allows mixing in entire classes with multiple macros.
 */
trait Mixin
{
    /**
     * Stack of macro instance contexts.
     *
     * @var array
     */
    protected static $macroContextStack = [];
    /**
     * Mix another object into the class.
     *
     * @example
     * ```
     * Carbon::mixin(new class {
     *   public function addMoon() {
     *     return function () {
     *       return $this->addDays(30);
     *     };
     *   }
     *   public function subMoon() {
     *     return function () {
     *       return $this->subDays(30);
     *     };
     *   }
     * });
     * $fullMoon = Carbon::create('2018-12-22');
     * $nextFullMoon = $fullMoon->addMoon();
     * $blackMoon = Carbon::create('2019-01-06');
     * $previousBlackMoon = $blackMoon->subMoon();
     * echo "$nextFullMoon\n";
     * echo "$previousBlackMoon\n";
     * ```
     *
     * @param object|string $mixin
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public static function mixin($mixin)
    {
    }
    /**
     * @param object|string $mixin
     *
     * @throws ReflectionException
     */
    private static function loadMixinClass($mixin)
    {
    }
    /**
     * @param string $trait
     */
    private static function loadMixinTrait($trait)
    {
    }
    private static function getAnonymousClassCodeForTrait(string $trait)
    {
    }
    private static function getMixableMethods(self $context) : \Generator
    {
    }
    /**
     * Stack a Carbon context from inside calls of self::this() and execute a given action.
     *
     * @param static|null $context
     * @param callable    $callable
     *
     * @throws Throwable
     *
     * @return mixed
     */
    protected static function bindMacroContext($context, callable $callable)
    {
    }
    /**
     * Return the current context from inside a macro callee or a null if static.
     *
     * @return static|null
     */
    protected static function context()
    {
    }
    /**
     * Return the current context from inside a macro callee or a new one if static.
     *
     * @return static
     */
    protected static function this()
    {
    }
}