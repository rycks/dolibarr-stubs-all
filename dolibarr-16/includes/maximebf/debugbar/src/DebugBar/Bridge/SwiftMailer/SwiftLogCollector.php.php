<?php

namespace DebugBar\Bridge\SwiftMailer;

/**
 * Collects log messages
 *
 * http://swiftmailer.org/
 */
class SwiftLogCollector extends \DebugBar\DataCollector\MessagesCollector implements \Swift_Plugins_Logger
{
    public function __construct(\Swift_Mailer $mailer)
    {
    }
    public function add($entry)
    {
    }
    public function dump()
    {
    }
    public function getName()
    {
    }
}