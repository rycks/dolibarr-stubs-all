<?php

namespace DebugBar\Bridge\SwiftMailer;

/**
 * Collects data about sent mails
 *
 * http://swiftmailer.org/
 */
class SwiftMailCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    protected $messagesLogger;
    public function __construct(\Swift_Mailer $mailer)
    {
    }
    public function collect()
    {
    }
    protected function formatTo($to)
    {
    }
    public function getName()
    {
    }
    public function getWidgets()
    {
    }
    public function getAssets()
    {
    }
}