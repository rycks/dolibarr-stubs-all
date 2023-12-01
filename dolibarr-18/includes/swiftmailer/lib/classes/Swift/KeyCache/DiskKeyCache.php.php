<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * A KeyCache which streams to and from disk.
 *
 * @author Chris Corbyn
 */
class Swift_KeyCache_DiskKeyCache implements \Swift_KeyCache
{
    /** Signal to place pointer at start of file */
    const POSITION_START = 0;
    /** Signal to place pointer at end of file */
    const POSITION_END = 1;
    /** Signal to leave pointer in whatever position it currently is */
    const POSITION_CURRENT = 2;
    /**
     * An InputStream for cloning.
     *
     * @var Swift_KeyCache_KeyCacheInputStream
     */
    private $stream;
    /**
     * A path to write to.
     *
     * @var string
     */
    private $path;
    /**
     * Stored keys.
     *
     * @var array
     */
    private $keys = [];
    /**
     * Create a new DiskKeyCache with the given $stream for cloning to make
     * InputByteStreams, and the given $path to save to.
     *
     * @param string $path to save to
     */
    public function __construct(\Swift_KeyCache_KeyCacheInputStream $stream, $path)
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
     *
     * @throws Swift_IoException
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
     *
     * @throws Swift_IoException
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
     * @throws Swift_IoException
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
    /**
     * Get a file handle on the cache item.
     *
     * @param string $nsKey
     * @param string $itemKey
     * @param int    $position
     *
     * @return resource
     */
    private function getHandle($nsKey, $itemKey, $position)
    {
    }
    private function freeHandle($nsKey, $itemKey)
    {
    }
    /**
     * Destructor.
     */
    public function __destruct()
    {
    }
    public function __wakeup()
    {
    }
}