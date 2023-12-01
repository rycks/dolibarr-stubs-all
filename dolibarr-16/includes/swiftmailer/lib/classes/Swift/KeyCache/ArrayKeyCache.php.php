<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * A basic KeyCache backed by an array.
 *
 * @author Chris Corbyn
 */
class Swift_KeyCache_ArrayKeyCache implements \Swift_KeyCache
{
    /**
     * Cache contents.
     *
     * @var array
     */
    private $contents = [];
    /**
     * An InputStream for cloning.
     *
     * @var Swift_KeyCache_KeyCacheInputStream
     */
    private $stream;
    /**
     * Create a new ArrayKeyCache with the given $stream for cloning to make
     * InputByteStreams.
     */
    public function __construct(\Swift_KeyCache_KeyCacheInputStream $stream)
    {
    }
    /**
     * Set a string into the cache under $itemKey for the namespace $nsKey.
     *
     * @see MODE_WRITE, MODE_APPEND
     *
     * @param string $nsKey
     * @param string $itemKey
     * @param string $string
     * @param int    $mode
     */
    public function setString($nsKey, $itemKey, $string, $mode)
    {
    }
    /**
     * Set a ByteStream into the cache under $itemKey for the namespace $nsKey.
     *
     * @see MODE_WRITE, MODE_APPEND
     *
     * @param string $nsKey
     * @param string $itemKey
     * @param int    $mode
     */
    public function importFromByteStream($nsKey, $itemKey, \Swift_OutputByteStream $os, $mode)
    {
    }
    /**
     * Provides a ByteStream which when written to, writes data to $itemKey.
     *
     * NOTE: The stream will always write in append mode.
     *
     * @param string $nsKey
     * @param string $itemKey
     *
     * @return Swift_InputByteStream
     */
    public function getInputByteStream($nsKey, $itemKey, \Swift_InputByteStream $writeThrough = \null)
    {
    }
    /**
     * Get data back out of the cache as a string.
     *
     * @param string $nsKey
     * @param string $itemKey
     *
     * @return string
     */
    public function getString($nsKey, $itemKey)
    {
    }
    /**
     * Get data back out of the cache as a ByteStream.
     *
     * @param string                $nsKey
     * @param string                $itemKey
     * @param Swift_InputByteStream $is      to write the data to
     */
    public function exportToByteStream($nsKey, $itemKey, \Swift_InputByteStream $is)
    {
    }
    /**
     * Check if the given $itemKey exists in the namespace $nsKey.
     *
     * @param string $nsKey
     * @param string $itemKey
     *
     * @return bool
     */
    public function hasKey($nsKey, $itemKey)
    {
    }
    /**
     * Clear data for $itemKey in the namespace $nsKey if it exists.
     *
     * @param string $nsKey
     * @param string $itemKey
     */
    public function clearKey($nsKey, $itemKey)
    {
    }
    /**
     * Clear all data in the namespace $nsKey if it exists.
     *
     * @param string $nsKey
     */
    public function clearAll($nsKey)
    {
    }
    /**
     * Initialize the namespace of $nsKey if needed.
     *
     * @param string $nsKey
     */
    private function prepareCache($nsKey)
    {
    }
}