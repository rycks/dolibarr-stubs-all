<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2009 Fabien Potencier
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Replaces the sender of a message.
 *
 * @author Arjen Brouwer
 */
class Swift_Plugins_ImpersonatePlugin implements \Swift_Events_SendListener
{
    /**
     * The sender to impersonate.
     *
     * @var string
     */
    private $sender;
    /**
     * Create a new ImpersonatePlugin to impersonate $sender.
     *
     * @param string $sender address
     */
    public function __construct($sender)
    {
    }
    /**
     * Invoked immediately before the Message is sent.
     */
    public function beforeSendPerformed(\Swift_Events_SendEvent $evt)
    {
    }
    /**
     * Invoked immediately after the Message is sent.
     */
    public function sendPerformed(\Swift_Events_SendEvent $evt)
    {
    }
}