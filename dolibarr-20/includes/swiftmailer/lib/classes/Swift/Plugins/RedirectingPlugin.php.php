<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Redirects all email to a single recipient.
 *
 * @author     Fabien Potencier
 */
class Swift_Plugins_RedirectingPlugin implements \Swift_Events_SendListener
{
    /**
     * The recipient who will receive all messages.
     *
     * @var mixed
     */
    private $recipient;
    /**
     * List of regular expression for recipient whitelisting.
     *
     * @var array
     */
    private $whitelist = [];
    /**
     * Create a new RedirectingPlugin.
     *
     * @param mixed $recipient
     */
    public function __construct($recipient, array $whitelist = [])
    {
    }
    /**
     * Set the recipient of all messages.
     *
     * @param mixed $recipient
     */
    public function setRecipient($recipient)
    {
    }
    /**
     * Get the recipient of all messages.
     *
     * @return mixed
     */
    public function getRecipient()
    {
    }
    /**
     * Set a list of regular expressions to whitelist certain recipients.
     */
    public function setWhitelist(array $whitelist)
    {
    }
    /**
     * Get the whitelist.
     *
     * @return array
     */
    public function getWhitelist()
    {
    }
    /**
     * Invoked immediately before the Message is sent.
     */
    public function beforeSendPerformed(\Swift_Events_SendEvent $evt)
    {
    }
    /**
     * Filter header set against a whitelist of regular expressions.
     *
     * @param string $type
     */
    private function filterHeaderSet(\Swift_Mime_SimpleHeaderSet $headerSet, $type)
    {
    }
    /**
     * Filtered list of addresses => name pairs.
     *
     * @return array
     */
    private function filterNameAddresses(array $recipients)
    {
    }
    /**
     * Matches address against whitelist of regular expressions.
     *
     * @return bool
     */
    protected function isWhitelisted($recipient)
    {
    }
    /**
     * Invoked immediately after the Message is sent.
     */
    public function sendPerformed(\Swift_Events_SendEvent $evt)
    {
    }
    private function restoreMessage(\Swift_Mime_SimpleMessage $message)
    {
    }
}