<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * A CharacterStream implementation which stores characters in an internal array.
 *
 * @author Chris Corbyn
 */
class Swift_CharacterStream_ArrayCharacterStream implements \Swift_CharacterStream
{
    /** A map of byte values and their respective characters */
    private static $charMap;
    /** A map of characters and their derivative byte values */
    private static $byteMap;
    /** The char reader (lazy-loaded) for the current charset */
    private $charReader;
    /** A factory for creating CharacterReader instances */
    private $charReaderFactory;
    /** The character set this stream is using */
    private $charset;
    /** Array of characters */
    private $array = [];
    /** Size of the array of character */
    private $array_size = [];
    /** The current character offset in the stream */
    private $offset = 0;
    /**
     * Create a new CharacterStream with the given $chars, if set.
     *
     * @param Swift_CharacterReaderFactory $factory for loading validators
     * @param string                       $charset used in the stream
     */
    public function __construct(\Swift_CharacterReaderFactory $factory, $charset)
    {
    }
    /**
     * Set the character set used in this CharacterStream.
     *
     * @param string $charset
     */
    public function setCharacterSet($charset)
    {
    }
    /**
     * Set the CharacterReaderFactory for multi charset support.
     */
    public function setCharacterReaderFactory(\Swift_CharacterReaderFactory $factory)
    {
    }
    /**
     * Overwrite this character stream using the byte sequence in the byte stream.
     *
     * @param Swift_OutputByteStream $os output stream to read from
     */
    public function importByteStream(\Swift_OutputByteStream $os)
    {
    }
    /**
     * Import a string a bytes into this CharacterStream, overwriting any existing
     * data in the stream.
     *
     * @param string $string
     */
    public function importString($string)
    {
    }
    /**
     * Read $length characters from the stream and move the internal pointer
     * $length further into the stream.
     *
     * @param int $length
     *
     * @return string
     */
    public function read($length)
    {
    }
    /**
     * Read $length characters from the stream and return a 1-dimensional array
     * containing there octet values.
     *
     * @param int $length
     *
     * @return int[]
     */
    public function readBytes($length)
    {
    }
    /**
     * Write $chars to the end of the stream.
     *
     * @param string $chars
     */
    public function write($chars)
    {
    }
    /**
     * Move the internal pointer to $charOffset in the stream.
     *
     * @param int $charOffset
     */
    public function setPointer($charOffset)
    {
    }
    /**
     * Empty the stream and reset the internal pointer.
     */
    public function flushContents()
    {
    }
    private function reloadBuffer($fp, $len)
    {
    }
    private static function initializeMaps()
    {
    }
}