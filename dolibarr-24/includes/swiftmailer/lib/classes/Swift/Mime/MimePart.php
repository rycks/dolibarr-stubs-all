<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * A MIME part, in a multipart message.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_MimePart extends \Swift_Mime_SimpleMimeEntity
{
    /** The format parameter last specified by the user */
    protected $userFormat;
    /** The charset last specified by the user */
    protected $userCharset;
    /** The delsp parameter last specified by the user */
    protected $userDelSp;
    /** The nesting level of this MimePart */
    private $nestingLevel = self::LEVEL_ALTERNATIVE;
    /**
     * Create a new MimePart with $headers, $encoder and $cache.
     *
     * @param string $charset
     */
    public function __construct(\Swift_Mime_SimpleHeaderSet $headers, \Swift_Mime_ContentEncoder $encoder, \Swift_KeyCache $cache, \Swift_IdGenerator $idGenerator, $charset = \null)
    {
    }
    /**
     * Set the body of this entity, either as a string, or as an instance of
     * {@link Swift_OutputByteStream}.
     *
     * @param mixed  $body
     * @param string $contentType optional
     * @param string $charset     optional
     *
     * @return $this
     */
    public function setBody($body, $contentType = \null, $charset = \null)
    {
    }
    /**
     * Get the character set of this entity.
     *
     * @return string
     */
    public function getCharset()
    {
    }
    /**
     * Set the character set of this entity.
     *
     * @param string $charset
     *
     * @return $this
     */
    public function setCharset($charset)
    {
    }
    /**
     * Get the format of this entity (i.e. flowed or fixed).
     *
     * @return string
     */
    public function getFormat()
    {
    }
    /**
     * Set the format of this entity (flowed or fixed).
     *
     * @param string $format
     *
     * @return $this
     */
    public function setFormat($format)
    {
    }
    /**
     * Test if delsp is being used for this entity.
     *
     * @return bool
     */
    public function getDelSp()
    {
    }
    /**
     * Turn delsp on or off for this entity.
     *
     * @param bool $delsp
     *
     * @return $this
     */
    public function setDelSp($delsp = \true)
    {
    }
    /**
     * Get the nesting level of this entity.
     *
     * @see LEVEL_TOP, LEVEL_ALTERNATIVE, LEVEL_MIXED, LEVEL_RELATED
     *
     * @return int
     */
    public function getNestingLevel()
    {
    }
    /**
     * Receive notification that the charset has changed on this document, or a
     * parent document.
     *
     * @param string $charset
     */
    public function charsetChanged($charset)
    {
    }
    /** Fix the content-type and encoding of this entity */
    protected function fixHeaders()
    {
    }
    /** Set the nesting level of this entity */
    protected function setNestingLevel($level)
    {
    }
    /** Encode charset when charset is not utf-8 */
    protected function convertString($string)
    {
    }
}