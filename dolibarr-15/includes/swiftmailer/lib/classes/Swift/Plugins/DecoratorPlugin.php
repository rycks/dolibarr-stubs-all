<?php

/*
 * This file is part of SwiftMailer.
 * (c) 2004-2009 Chris Corbyn
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
/**
 * Allows customization of Messages on-the-fly.
 *
 * @author Chris Corbyn
 * @author Fabien Potencier
 */
class Swift_Plugins_DecoratorPlugin implements \Swift_Events_SendListener, \Swift_Plugins_Decorator_Replacements
{
    /** The replacement map */
    private $replacements;
    /** The body as it was before replacements */
    private $originalBody;
    /** The original headers of the message, before replacements */
    private $originalHeaders = array();
    /** Bodies of children before they are replaced */
    private $originalChildBodies = array();
    /** The Message that was last replaced */
    private $lastMessage;
    /**
     * Create a new DecoratorPlugin with $replacements.
     *
     * The $replacements can either be an associative array, or an implementation
     * of {@link Swift_Plugins_Decorator_Replacements}.
     *
     * When using an array, it should be of the form:
     * <code>
     * $replacements = array(
     *  "address1@domain.tld" => array("{a}" => "b", "{c}" => "d"),
     *  "address2@domain.tld" => array("{a}" => "x", "{c}" => "y")
     * )
     * </code>
     *
     * When using an instance of {@link Swift_Plugins_Decorator_Replacements},
     * the object should return just the array of replacements for the address
     * given to {@link Swift_Plugins_Decorator_Replacements::getReplacementsFor()}.
     *
     * @param mixed $replacements Array or Swift_Plugins_Decorator_Replacements
     */
    public function __construct($replacements)
    {
    }
    /**
     * Sets replacements.
     *
     * @param mixed $replacements Array or Swift_Plugins_Decorator_Replacements
     *
     * @see __construct()
     */
    public function setReplacements($replacements)
    {
    }
    /**
     * Invoked immediately before the Message is sent.
     *
     * @param Swift_Events_SendEvent $evt
     */
    public function beforeSendPerformed(\Swift_Events_SendEvent $evt)
    {
    }
    /**
     * Find a map of replacements for the address.
     *
     * If this plugin was provided with a delegate instance of
     * {@link Swift_Plugins_Decorator_Replacements} then the call will be
     * delegated to it.  Otherwise, it will attempt to find the replacements
     * from the array provided in the constructor.
     *
     * If no replacements can be found, an empty value (NULL) is returned.
     *
     * @param string $address
     *
     * @return array
     */
    public function getReplacementsFor($address)
    {
    }
    /**
     * Invoked immediately after the Message is sent.
     *
     * @param Swift_Events_SendEvent $evt
     */
    public function sendPerformed(\Swift_Events_SendEvent $evt)
    {
    }
    /** Restore a changed message back to its original state */
    private function restoreMessage(\Swift_Mime_SimpleMessage $message)
    {
    }
}