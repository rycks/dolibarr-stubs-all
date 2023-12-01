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
 * @author     Xavier De Cock <xdecock@gmail.com>
 */
class Swift_CharacterStream_NgCharacterStream implements \Swift_CharacterStream
{
    /**
     * The char reader (lazy-loaded) for the current charset.
     *
     * @var Swift_CharacterReader
     */
    private $charReader;
    /**
     * A factory for creating CharacterReader instances.
     *
     * @var Swift_CharacterReaderFactory
     */
    private $charReaderFactory;
    /**
     * The character set this stream is using.
     *
     * @var string
     */
    private $charset;
    /**
     * The data's stored as-is.
     *
     * @var string
     */
    private $datas = '';
    /**
     * Number of bytes in the stream.
     *
     * @var int
     */
    private $datasSize = 0;
    /**
     * Map.
     *
     * @var mixed
     */
    private $map;
    /**
     * Map Type.
     *
     * @var int
     */
    private $mapType = 0;
    /**
     * Number of characters in the stream.
     *
     * @var int
     */
    private $charCount = 0;
    /**
     * Position in the stream.
     *
     * @var int
     */
    private $currentPos = 0;
    /**
     * Constructor.
     *
     * @param Swift_CharacterReaderFactory $factory
     * @param string                       $charset
     */
    public function __construct(\Swift_CharacterReaderFactory $factory, $charset)
    {
    }
    /* -- Changing parameters of the stream -- */
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
     *
     * @param Swift_CharacterReaderFactory $factory
     */
    public function setCharacterReaderFactory(\Swift_CharacterReaderFactory $factory)
    {
    }
    /**
     * @see Swift_CharacterStream::flushContents()
     */
    public function flushContents()
    {
    }
    /**
     * @see Swift_CharacterStream::importByteStream()
     *
     * @param Swift_OutputByteStream $os
     */
    public function importByteStream(\Swift_OutputByteStream $os)
    {
    }
    /**
     * @see Swift_CharacterStream::importString()
     *
     * @param string $string
     */
    public function importString($string)
    {
    }
    /**
     * @see Swift_CharacterStream::read()
     *
     * @param int $length
     *
     * @return string
     */
    public function read($length)
    {
    }
    /**
     * @see Swift_CharacterStream::readBytes()
     *
     * @param int $length
     *
     * @return int[]
     */
    public function readBytes($length)
    {
    }
    /**
     * @see Swift_CharacterStream::setPointer()
     *
     * @param int $charOffset
     */
    public function setPointer($charOffset)
    {
    }
    /**
     * @see Swift_CharacterStream::write()
     *
     * @param string $chars
     */
    public function write($chars)
    {
    }
}