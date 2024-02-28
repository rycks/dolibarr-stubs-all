<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * The default email message class.
 *
 * @author Chris Corbyn
 */
class Swift_Mime_SimpleMessage extends \Swift_Mime_MimePart
{
    const PRIORITY_HIGHEST = 1;
    const PRIORITY_HIGH = 2;
    const PRIORITY_NORMAL = 3;
    const PRIORITY_LOW = 4;
    const PRIORITY_LOWEST = 5;
    /**
     * Create a new SimpleMessage with $headers, $encoder and $cache.
     *
     * @param Swift_Mime_SimpleHeaderSet $headers
     * @param Swift_Mime_ContentEncoder  $encoder
     * @param Swift_KeyCache             $cache
     * @param Swift_IdGenerator          $idGenerator
     * @param string                     $charset
     */
    public function __construct(\Swift_Mime_SimpleHeaderSet $headers, \Swift_Mime_ContentEncoder $encoder, \Swift_KeyCache $cache, \Swift_IdGenerator $idGenerator, $charset = \null)
    {
    }
    /**
     * Always returns {@link LEVEL_TOP} for a message instance.
     *
     * @return int
     */
    public function getNestingLevel()
    {
    }
    /**
     * Set the subject of this message.
     *
     * @param string $subject
     *
     * @return $this
     */
    public function setSubject($subject)
    {
    }
    /**
     * Get the subject of this message.
     *
     * @return string
     */
    public function getSubject()
    {
    }
    /**
     * Set the date at which this message was created.
     *
     * @param DateTimeInterface $dateTime
     *
     * @return $this
     */
    public function setDate(\DateTimeInterface $dateTime)
    {
    }
    /**
     * Get the date at which this message was created.
     *
     * @return DateTimeInterface
     */
    public function getDate()
    {
    }
    /**
     * Set the return-path (the bounce address) of this message.
     *
     * @param string $address
     *
     * @return $this
     */
    public function setReturnPath($address)
    {
    }
    /**
     * Get the return-path (bounce address) of this message.
     *
     * @return string
     */
    public function getReturnPath()
    {
    }
    /**
     * Set the sender of this message.
     *
     * This does not override the From field, but it has a higher significance.
     *
     * @param string $address
     * @param string $name    optional
     *
     * @return $this
     */
    public function setSender($address, $name = \null)
    {
    }
    /**
     * Get the sender of this message.
     *
     * @return string
     */
    public function getSender()
    {
    }
    /**
     * Add a From: address to this message.
     *
     * If $name is passed this name will be associated with the address.
     *
     * @param string $address
     * @param string $name    optional
     *
     * @return $this
     */
    public function addFrom($address, $name = \null)
    {
    }
    /**
     * Set the from address of this message.
     *
     * You may pass an array of addresses if this message is from multiple people.
     *
     * If $name is passed and the first parameter is a string, this name will be
     * associated with the address.
     *
     * @param string|array $addresses
     * @param string       $name      optional
     *
     * @return $this
     */
    public function setFrom($addresses, $name = \null)
    {
    }
    /**
     * Get the from address of this message.
     *
     * @return mixed
     */
    public function getFrom()
    {
    }
    /**
     * Add a Reply-To: address to this message.
     *
     * If $name is passed this name will be associated with the address.
     *
     * @param string $address
     * @param string $name    optional
     *
     * @return $this
     */
    public function addReplyTo($address, $name = \null)
    {
    }
    /**
     * Set the reply-to address of this message.
     *
     * You may pass an array of addresses if replies will go to multiple people.
     *
     * If $name is passed and the first parameter is a string, this name will be
     * associated with the address.
     *
     * @param mixed  $addresses
     * @param string $name      optional
     *
     * @return $this
     */
    public function setReplyTo($addresses, $name = \null)
    {
    }
    /**
     * Get the reply-to address of this message.
     *
     * @return string
     */
    public function getReplyTo()
    {
    }
    /**
     * Add a To: address to this message.
     *
     * If $name is passed this name will be associated with the address.
     *
     * @param string $address
     * @param string $name    optional
     *
     * @return $this
     */
    public function addTo($address, $name = \null)
    {
    }
    /**
     * Set the to addresses of this message.
     *
     * If multiple recipients will receive the message an array should be used.
     * Example: array('receiver@domain.org', 'other@domain.org' => 'A name')
     *
     * If $name is passed and the first parameter is a string, this name will be
     * associated with the address.
     *
     * @param mixed  $addresses
     * @param string $name      optional
     *
     * @return $this
     */
    public function setTo($addresses, $name = \null)
    {
    }
    /**
     * Get the To addresses of this message.
     *
     * @return array
     */
    public function getTo()
    {
    }
    /**
     * Add a Cc: address to this message.
     *
     * If $name is passed this name will be associated with the address.
     *
     * @param string $address
     * @param string $name    optional
     *
     * @return $this
     */
    public function addCc($address, $name = \null)
    {
    }
    /**
     * Set the Cc addresses of this message.
     *
     * If $name is passed and the first parameter is a string, this name will be
     * associated with the address.
     *
     * @param mixed  $addresses
     * @param string $name      optional
     *
     * @return $this
     */
    public function setCc($addresses, $name = \null)
    {
    }
    /**
     * Get the Cc address of this message.
     *
     * @return array
     */
    public function getCc()
    {
    }
    /**
     * Add a Bcc: address to this message.
     *
     * If $name is passed this name will be associated with the address.
     *
     * @param string $address
     * @param string $name    optional
     *
     * @return $this
     */
    public function addBcc($address, $name = \null)
    {
    }
    /**
     * Set the Bcc addresses of this message.
     *
     * If $name is passed and the first parameter is a string, this name will be
     * associated with the address.
     *
     * @param mixed  $addresses
     * @param string $name      optional
     *
     * @return $this
     */
    public function setBcc($addresses, $name = \null)
    {
    }
    /**
     * Get the Bcc addresses of this message.
     *
     * @return array
     */
    public function getBcc()
    {
    }
    /**
     * Set the priority of this message.
     *
     * The value is an integer where 1 is the highest priority and 5 is the lowest.
     *
     * @param int $priority
     *
     * @return $this
     */
    public function setPriority($priority)
    {
    }
    /**
     * Get the priority of this message.
     *
     * The returned value is an integer where 1 is the highest priority and 5
     * is the lowest.
     *
     * @return int
     */
    public function getPriority()
    {
    }
    /**
     * Ask for a delivery receipt from the recipient to be sent to $addresses.
     *
     * @param array $addresses
     *
     * @return $this
     */
    public function setReadReceiptTo($addresses)
    {
    }
    /**
     * Get the addresses to which a read-receipt will be sent.
     *
     * @return string
     */
    public function getReadReceiptTo()
    {
    }
    /**
     * Attach a {@link Swift_Mime_SimpleMimeEntity} such as an Attachment or MimePart.
     *
     * @param Swift_Mime_SimpleMimeEntity $entity
     *
     * @return $this
     */
    public function attach(\Swift_Mime_SimpleMimeEntity $entity)
    {
    }
    /**
     * Remove an already attached entity.
     *
     * @param Swift_Mime_SimpleMimeEntity $entity
     *
     * @return $this
     */
    public function detach(\Swift_Mime_SimpleMimeEntity $entity)
    {
    }
    /**
     * Attach a {@link Swift_Mime_SimpleMimeEntity} and return it's CID source.
     * This method should be used when embedding images or other data in a message.
     *
     * @param Swift_Mime_SimpleMimeEntity $entity
     *
     * @return string
     */
    public function embed(\Swift_Mime_SimpleMimeEntity $entity)
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
     * Returns a string representation of this object.
     *
     * @see toString()
     *
     * @return string
     */
    public function __toString()
    {
    }
    /**
     * Write this message to a {@link Swift_InputByteStream}.
     *
     * @param Swift_InputByteStream $is
     */
    public function toByteStream(\Swift_InputByteStream $is)
    {
    }
    /** @see Swift_Mime_SimpleMimeEntity::getIdField() */
    protected function getIdField()
    {
    }
    /** Turn the body of this message into a child of itself if needed */
    protected function becomeMimePart()
    {
    }
    /** Get the highest nesting level nested inside this message */
    private function getTopNestingLevel()
    {
    }
}