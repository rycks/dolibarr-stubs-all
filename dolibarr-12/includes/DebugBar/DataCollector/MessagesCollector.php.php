<?php

namespace DebugBar\DataCollector;

/**
 * Provides a way to log messages
 */
class MessagesCollector extends \Psr\Log\AbstractLogger implements \DebugBar\DataCollector\DataCollectorInterface, \DebugBar\DataCollector\MessagesAggregateInterface, \DebugBar\DataCollector\Renderable
{
    protected $name;
    protected $messages = array();
    protected $aggregates = array();
    protected $dataFormater;
    /**
     * @param string $name
     */
    public function __construct($name = 'messages')
    {
    }
    /**
     * Sets the data formater instance used by this collector
     *
     * @param DataFormatterInterface $formater
     */
    public function setDataFormatter(\DebugBar\DataCollector\DataFormatterInterface $formater)
    {
    }
    public function getDataFormatter()
    {
    }
    /**
     * Adds a message
     *
     * A message can be anything from an object to a string
     *
     * @param mixed $message
     * @param string $label
     */
    public function addMessage($message, $label = 'info', $isString = true)
    {
    }
    /**
     * Aggregates messages from other collectors
     *
     * @param MessagesAggregateInterface $messages
     */
    public function aggregate(\DebugBar\DataCollector\MessagesAggregateInterface $messages)
    {
    }
    public function getMessages()
    {
    }
    public function log($level, $message, array $context = array())
    {
    }
    /**
     * Deletes all messages
     */
    public function clear()
    {
    }
    public function collect()
    {
    }
    public function getName()
    {
    }
    public function getWidgets()
    {
    }
}