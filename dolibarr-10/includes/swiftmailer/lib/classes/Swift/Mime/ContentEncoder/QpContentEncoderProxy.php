<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Proxy for quoted-printable content encoders.
 *
 * Switches on the best QP encoder implementation for current charset.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 */
class Swift_Mime_ContentEncoder_QpContentEncoderProxy implements \Swift_Mime_ContentEncoder
{
    /**
     * @var Swift_Mime_ContentEncoder_QpContentEncoder
     */
    private $safeEncoder;
    /**
     * @var Swift_Mime_ContentEncoder_NativeQpContentEncoder
     */
    private $nativeEncoder;
    /**
     * @var null|string
     */
    private $charset;
    /**
     * Constructor.
     *
     * @param Swift_Mime_ContentEncoder_QpContentEncoder       $safeEncoder
     * @param Swift_Mime_ContentEncoder_NativeQpContentEncoder $nativeEncoder
     * @param string|null                                      $charset
     */
    public function __construct(\Swift_Mime_ContentEncoder_QpContentEncoder $safeEncoder, \Swift_Mime_ContentEncoder_NativeQpContentEncoder $nativeEncoder, $charset)
    {
    }
    /**
     * Make a deep copy of object.
     */
    public function __clone()
    {
    }
    /**
     * {@inheritdoc}
     */
    public function charsetChanged($charset)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function encodeByteStream(\Swift_OutputByteStream $os, \Swift_InputByteStream $is, $firstLineOffset = 0, $maxLineLength = 0)
    {
    }
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
    }
    /**
     * {@inheritdoc}
     */
    public function encodeString($string, $firstLineOffset = 0, $maxLineLength = 0)
    {
    }
    /**
     * @return Swift_Mime_ContentEncoder
     */
    private function getEncoder()
    {
    }
}