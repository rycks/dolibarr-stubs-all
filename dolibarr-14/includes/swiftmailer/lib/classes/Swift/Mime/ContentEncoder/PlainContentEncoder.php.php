<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Handles binary/7/8-bit Transfer Encoding in Swift Mailer.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_ContentEncoder_PlainContentEncoder implements \Swift_Mime_ContentEncoder
{
    /**
     * The name of this encoding scheme (probably 7bit or 8bit).
     *
     * @var string
     */
    private $name;
    /**
     * True if canonical transformations should be done.
     *
     * @var bool
     */
    private $canonical;
    /**
     * Creates a new PlainContentEncoder with $name (probably 7bit or 8bit).
     *
     * @param string $name
     * @param bool   $canonical If canonicalization transformation should be done.
     */
    public function __construct($name, $canonical = \false)
    {
    }
    /**
     * Encode a given string to produce an encoded string.
     *
     * @param string $string
     * @param int    $firstLineOffset ignored
     * @param int    $maxLineLength   - 0 means no wrapping will occur
     *
     * @return string
     */
    public function encodeString($string, $firstLineOffset = 0, $maxLineLength = 0)
    {
    }
    /**
     * Encode stream $in to stream $out.
     *
     * @param Swift_OutputByteStream $os
     * @param Swift_InputByteStream  $is
     * @param int                    $firstLineOffset ignored
     * @param int                    $maxLineLength   optional, 0 means no wrapping will occur
     */
    public function encodeByteStream(\Swift_OutputByteStream $os, \Swift_InputByteStream $is, $firstLineOffset = 0, $maxLineLength = 0)
    {
    }
    /**
     * Get the name of this encoding scheme.
     *
     * @return string
     */
    public function getName()
    {
    }
    /**
     * Not used.
     */
    public function charsetChanged($charset)
    {
    }
    /**
     * A safer (but weaker) wordwrap for unicode.
     *
     * @param string $string
     * @param int    $length
     * @param string $le
     *
     * @return string
     */
    private function safeWordwrap($string, $length = 75, $le = "\r\n")
    {
    }
    /**
     * Canonicalize string input (fix CRLF).
     *
     * @param string $string
     *
     * @return string
     */
    private function canonicalize($string)
    {
    }
}