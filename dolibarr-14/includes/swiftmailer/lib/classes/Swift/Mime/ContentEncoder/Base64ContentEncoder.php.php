<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Handles Base 64 Transfer Encoding in Swift Mailer.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_ContentEncoder_Base64ContentEncoder extends \Swift_Encoder_Base64Encoder implements \Swift_Mime_ContentEncoder
{
    /**
     * Encode stream $in to stream $out.
     *
     * @param Swift_OutputByteStream $os
     * @param Swift_InputByteStream  $is
     * @param int                    $firstLineOffset
     * @param int                    $maxLineLength,  optional, 0 indicates the default of 76 bytes
     */
    public function encodeByteStream(\Swift_OutputByteStream $os, \Swift_InputByteStream $is, $firstLineOffset = 0, $maxLineLength = 0)
    {
    }
    /**
     * Get the name of this encoding scheme.
     * Returns the string 'base64'.
     *
     * @return string
     */
    public function getName()
    {
    }
}