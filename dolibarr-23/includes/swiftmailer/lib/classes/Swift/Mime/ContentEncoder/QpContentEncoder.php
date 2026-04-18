<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Handles Quoted Printable (QP) Transfer Encoding in Swift Mailer.
 *
 * @author     Chris Corbyn
 */
class Swift_Mime_ContentEncoder_QpContentEncoder extends \Swift_Encoder_QpEncoder implements \Swift_Mime_ContentEncoder
{
    protected $dotEscape;
    /**
     * Creates a new QpContentEncoder for the given CharacterStream.
     *
     * @param Swift_CharacterStream $charStream to use for reading characters
     * @param Swift_StreamFilter    $filter     if canonicalization should occur
     * @param bool                  $dotEscape  if dot stuffing workaround must be enabled
     */
    public function __construct(\Swift_CharacterStream $charStream, \Swift_StreamFilter $filter = \null, $dotEscape = \false)
    {
    }
    public function __sleep()
    {
    }
    protected function getSafeMapShareId()
    {
    }
    protected function initSafeMap()
    {
    }
    /**
     * Encode stream $in to stream $out.
     *
     * QP encoded strings have a maximum line length of 76 characters.
     * If the first line needs to be shorter, indicate the difference with
     * $firstLineOffset.
     *
     * @param Swift_OutputByteStream $os              output stream
     * @param Swift_InputByteStream  $is              input stream
     * @param int                    $firstLineOffset
     * @param int                    $maxLineLength
     */
    public function encodeByteStream(\Swift_OutputByteStream $os, \Swift_InputByteStream $is, $firstLineOffset = 0, $maxLineLength = 0)
    {
    }
    /**
     * Get the name of this encoding scheme.
     * Returns the string 'quoted-printable'.
     *
     * @return string
     */
    public function getName()
    {
    }
}