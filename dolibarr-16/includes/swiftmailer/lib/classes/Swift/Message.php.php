<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * The Message class for building emails.
 *
 * @author Chris Corbyn
 */
class Swift_Message extends \Swift_Mime_SimpleMessage
{
    /**
     * @var Swift_Signers_HeaderSigner[]
     */
    private $headerSigners = [];
    /**
     * @var Swift_Signers_BodySigner[]
     */
    private $bodySigners = [];
    /**
     * @var array
     */
    private $savedMessage = [];
    /**
     * Create a new Message.
     *
     * Details may be optionally passed into the constructor.
     *
     * @param string $subject
     * @param string $body
     * @param string $contentType
     * @param string $charset
     */
    public function __construct($subject = \null, $body = \null, $contentType = \null, $charset = \null)
    {
    }
    /**
     * Add a MimePart to this Message.
     *
     * @param string|Swift_OutputByteStream $body
     * @param string                        $contentType
     * @param string                        $charset
     *
     * @return $this
     */
    public function addPart($body, $contentType = \null, $charset = \null)
    {
    }
    /**
     * Attach a new signature handler to the message.
     *
     * @return $this
     */
    public function attachSigner(\Swift_Signer $signer)
    {
    }
    /**
     * Detach a signature handler from a message.
     *
     * @return $this
     */
    public function detachSigner(\Swift_Signer $signer)
    {
    }
    /**
     * Clear all signature handlers attached to the message.
     *
     * @return $this
     */
    public function clearSigners()
    {
    }
    /**
     * Get this message as a complete string.
     *
     * @return string
     */
    public function toString()
    {
    }
    /**
     * Write this message to a {@link Swift_InputByteStream}.
     */
    public function toByteStream(\Swift_InputByteStream $is)
    {
    }
    public function __wakeup()
    {
    }
    /**
     * loops through signers and apply the signatures.
     */
    protected function doSign()
    {
    }
    /**
     * save the message before any signature is applied.
     */
    protected function saveMessage()
    {
    }
    /**
     * save the original headers.
     */
    protected function saveHeaders(array $altered)
    {
    }
    /**
     * Remove or restore altered headers.
     */
    protected function restoreHeaders()
    {
    }
    /**
     * Restore message body.
     */
    protected function restoreMessage()
    {
    }
    /**
     * Clone Message Signers.
     *
     * @see Swift_Mime_SimpleMimeEntity::__clone()
     */
    public function __clone()
    {
    }
}