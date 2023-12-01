<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * General utility class in Swift Mailer, not to be instantiated.
 *
 *
 * @author Chris Corbyn
 */
abstract class Swift
{
    const VERSION = '6.0.2';
    public static $initialized = \false;
    public static $inits = array();
    /**
     * Registers an initializer callable that will be called the first time
     * a SwiftMailer class is autoloaded.
     *
     * This enables you to tweak the default configuration in a lazy way.
     *
     * @param mixed $callable A valid PHP callable that will be called when autoloading the first Swift class
     */
    public static function init($callable)
    {
    }
    /**
     * Internal autoloader for spl_autoload_register().
     *
     * @param string $class
     */
    public static function autoload($class)
    {
    }
    /**
     * Configure autoloading using Swift Mailer.
     *
     * This is designed to play nicely with other autoloaders.
     *
     * @param mixed $callable A valid PHP callable that will be called when autoloading the first Swift class
     */
    public static function registerAutoload($callable = \null)
    {
    }
}