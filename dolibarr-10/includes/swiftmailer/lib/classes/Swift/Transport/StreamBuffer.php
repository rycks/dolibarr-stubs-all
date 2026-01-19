<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * A generic IoBuffer implementation supporting remote sockets and local processes.
 *
 * @author     Chris Corbyn
 */
class Swift_Transport_StreamBuffer extends \Swift_ByteStream_AbstractFilterableInputStream implements \Swift_Transport_IoBuffer
{
    /** A primary socket */
    private $stream;
    /** The input stream */
    private $in;
    /** The output stream */
    private $out;
    /** Buffer initialization parameters */
    private $params = array();
    /** The ReplacementFilterFactory */
    private $replacementFactory;
    /** Translations performed on data being streamed into the buffer */
    private $translations = array();
    /**
     * Create a new StreamBuffer using $replacementFactory for transformations.
     *
     * @param Swift_ReplacementFilterFactory $replacementFactory
     */
    public function __construct(\Swift_ReplacementFilterFactory $replacementFactory)
    {
    }
    /**
     * Perform any initialization needed, using the given $params.
     *
     * Parameters will vary depending upon the type of IoBuffer used.
     *
     * @param array $params
     */
    public function initialize(array $params)
    {
    }
    /**
     * Set an individual param on the buffer (e.g. switching to SSL).
     *
     * @param string $param
     * @param mixed  $value
     */
    public function setParam($param, $value)
    {
    }
    public function startTLS()
    {
    }
    /**
     * Perform any shutdown logic needed.
     */
    public function terminate()
    {
    }
    /**
     * Set an array of string replacements which should be made on data written
     * to the buffer.
     *
     * This could replace LF with CRLF for example.
     *
     * @param string[] $replacements
     */
    public function setWriteTranslations(array $replacements)
    {
    }
    /**
     * Get a line of output (including any CRLF).
     *
     * The $sequence number comes from any writes and may or may not be used
     * depending upon the implementation.
     *
     * @param int $sequence of last write to scan from
     *
     * @return string
     *
     * @throws Swift_IoException
     */
    public function readLine($sequence)
    {
    }
    /**
     * Reads $length bytes from the stream into a string and moves the pointer
     * through the stream by $length.
     *
     * If less bytes exist than are requested the remaining bytes are given instead.
     * If no bytes are remaining at all, boolean false is returned.
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
    /** Not implemented */
    public function setReadPointer($byteOffset)
    {
    }
    /** Flush the stream contents */
    protected function flush()
    {
    }
    /** Write this bytes to the stream */
    protected function doCommit($bytes)
    {
    }
    /**
     * Establishes a connection to a remote server.
     */
    private function establishSocketConnection()
    {
    }
    /**
     * Opens a process for input/output.
     */
    private function establishProcessConnection()
    {
    }
    private function getReadConnectionDescription()
    {
    }
}