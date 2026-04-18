<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Changes some global preference settings in Swift Mailer.
 *
 * @author Chris Corbyn
 */
class Swift_Preferences
{
    /** Singleton instance */
    private static $instance = \null;
    /** Constructor not to be used */
    private function __construct()
    {
    }
    /**
     * Gets the instance of Preferences.
     *
     * @return self
     */
    public static function getInstance()
    {
    }
    /**
     * Set the default charset used.
     *
     * @param string $charset
     *
     * @return $this
     */
    public function setCharset($charset)
    {
    }
    /**
     * Set the directory where temporary files can be saved.
     *
     * @param string $dir
     *
     * @return $this
     */
    public function setTempDir($dir)
    {
    }
    /**
     * Set the type of cache to use (i.e. "disk" or "array").
     *
     * @param string $type
     *
     * @return $this
     */
    public function setCacheType($type)
    {
    }
    /**
     * Set the QuotedPrintable dot escaper preference.
     *
     * @param bool $dotEscape
     *
     * @return $this
     */
    public function setQPDotEscape($dotEscape)
    {
    }
}