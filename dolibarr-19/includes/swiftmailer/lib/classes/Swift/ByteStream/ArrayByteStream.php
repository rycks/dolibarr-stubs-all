<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Allows reading and writing of bytes to and from an array.
 *
 * @author     Chris Corbyn
 */
class Swift_ByteStream_ArrayByteStream implements \Swift_InputByteStream, \Swift_OutputByteStream
{
    /**
     * The internal stack of bytes.
     *
     * @var string[]
     */
    private $array = [];
    /**
     * The size of the stack.
     *
     * @var int
     */
    private $arraySize = 0;
    /**
     * The internal pointer offset.
     *
     * @var int
     */
    private $offset = 0;
    /**
     * Bound streams.
     *
     * @var Swift_InputByteStream[]
     */
    private $mirrors = [];
    /**
     * Create a new ArrayByteStream.
     *
     * If $stack is given the stream will be populated with the bytes it contains.
     *
     * @param mixed $stack of bytes in string or array form, optional
     */
    public function __construct($stack = \null)
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
     * @return string
     */
    public function read($length)
    {
    }
    /**
     * Writes $bytes to the end of the stream.
     *
     * @param string $bytes
     */
    public function write($bytes)
    {
    }
    /**
     * Not used.
     */
    public function commit()
    {
    }
    /**
     * Attach $is to this stream.
     *
     * The stream acts as an observer, receiving all data that is written.
     * All {@link write()} and {@link flushBuffers()} operations will be mirrored.
     */
    public function bind(\Swift_InputByteStream $is)
    {
    }
    /**
     * Remove an already bound stream.
     *
     * If $is is not bound, no errors will be raised.
     * If the stream currently has any buffered data it will be written to $is
     * before unbinding occurs.
     */
    public function unbind(\Swift_InputByteStream $is)
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
    /**
     * Flush the contents of the stream (empty it) and set the internal pointer
     * to the beginning.
     */
    public function flushBuffers()
    {
    }
}