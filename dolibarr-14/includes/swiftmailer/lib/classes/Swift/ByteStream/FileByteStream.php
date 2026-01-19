<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Allows reading and writing of bytes to and from a file.
 *
 * @author     Chris Corbyn
 */
class Swift_ByteStream_FileByteStream extends \Swift_ByteStream_AbstractFilterableInputStream implements \Swift_FileStream
{
    /** The internal pointer offset */
    private $offset = 0;
    /** The path to the file */
    private $path;
    /** The mode this file is opened in for writing */
    private $mode;
    /** A lazy-loaded resource handle for reading the file */
    private $reader;
    /** A lazy-loaded resource handle for writing the file */
    private $writer;
    /** If stream is seekable true/false, or null if not known */
    private $seekable = \null;
    /**
     * Create a new FileByteStream for $path.
     *
     * @param string $path
     * @param bool   $writable if true
     */
    public function __construct($path, $writable = \false)
    {
    }
    /**
     * Get the complete path to the file.
     *
     * @return string
     */
    public function getPath()
    {
    }
    /**
     * Reads $length bytes from the stream into a string and moves the pointer
     * through the stream by $length.
     *
     * If less bytes exist than are requested the
     * remaining bytes are given instead. If no bytes are remaining at all, boolean
     * false is returned.
     *
     * @param int $length
     *
     * @return string|bool
     *
     * @throws Swift_IoException
     */
    public function read($length)
    {
    }
    /**
     * Move the internal read pointer to $byteOffset in the stream.
     *
     * @param int $byteOffset
     *
     * @return bool
     */
    public function setReadPointer($byteOffset)
    {
    }
    /** Just write the bytes to the file */
    protected function doCommit($bytes)
    {
    }
    /** Not used */
    protected function flush()
    {
    }
    /** Get the resource for reading */
    private function getReadHandle()
    {
    }
    /** Get the resource for writing */
    private function getWriteHandle()
    {
    }
    /** Force a reload of the resource for reading */
    private function resetReadHandle()
    {
    }
    /** Check if ReadOnly Stream is seekable */
    private function getReadStreamSeekableStatus()
    {
    }
    /** Streams in a readOnly stream ensuring copy if needed */
    private function seekReadStreamToPosition($offset)
    {
    }
    /** Copy a readOnly Stream to ensure seekability */
    private function copyReadStream()
    {
    }
}