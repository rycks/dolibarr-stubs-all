<?php

namespace DebugBar\Bridge;

/**
 * Collects messages from a Slim logger
 *
 * http://slimframework.com
 */
class SlimCollector extends \DebugBar\DataCollector\MessagesCollector
{
    protected $slim;
    protected $originalLogWriter;
    public function __construct(\Slim\Slim $slim)
    {
    }
    public function write($message, $level)
    {
    }
    protected function getLevelName($level)
    {
    }
    public function getName()
    {
    }
}