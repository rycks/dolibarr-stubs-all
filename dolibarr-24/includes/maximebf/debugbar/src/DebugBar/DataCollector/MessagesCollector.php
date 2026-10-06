<?php

namespace DebugBar\DataCollector;

/**
 * Provides a way to log messages
 */
class MessagesCollector extends \Psr\Log\AbstractLogger implements \DebugBar\DataCollector\DataCollectorInterface, \DebugBar\DataCollector\MessagesAggregateInterface, \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    protected $name;
    protected $messages = array();
    protected $aggregates = array();
    protected $dataFormater;
    protected $varDumper;
    // The HTML var dumper requires debug bar users to support the new inline assets, which not all
    // may support yet - so return false by default for now.
    protected $useHtmlVarDumper = false;
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
     * @return $this
     */
    public function setDataFormatter(\DebugBar\DataFormatter\DataFormatterInterface $formater)
    {
    }
    /**
     * @return DataFormatterInterface
     */
    public function getDataFormatter()
    {
    }
    /**
     * Sets the variable dumper instance used by this collector
     *
     * @param DebugBarVarDumper $varDumper
     * @return $this
     */
    public function setVarDumper(\DebugBar\DataFormatter\DebugBarVarDumper $varDumper)
    {
    }
    /**
     * Gets the variable dumper instance used by this collector
     *
     * @return DebugBarVarDumper
     */
    public function getVarDumper()
    {
    }
    /**
     * Sets a flag indicating whether the Symfony HtmlDumper will be used to dump variables for
     * rich variable rendering.  Be sure to set this flag before logging any messages for the
     * first time.
     *
     * @param bool $value
     * @return $this
     */
    public function useHtmlVarDumper($value = true)
    {
    }
    /**
     * Indicates whether the Symfony HtmlDumper will be used to dump variables for rich variable
     * rendering.
     *
     * @return mixed
     */
    public function isHtmlVarDumperUsed()
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
    /**
     * @return array
     */
    public function getMessages()
    {
    }
    /**
     * @param $level
     * @param $message
     * @param array $context
     */
    public function log($level, $message, array $context = array()) : void
    {
    }
    /**
     * Interpolates context values into the message placeholders.
     *
     * @param $message
     * @param array $context
     * @return string
     */
    function interpolate($message, array $context = array())
    {
    }
    /**
     * Deletes all messages
     */
    public function clear()
    {
    }
    /**
     * @return array
     */
    public function collect()
    {
    }
    /**
     * @return string
     */
    public function getName()
    {
    }
    /**
     * @return array
     */
    public function getAssets()
    {
    }
    /**
     * @return array
     */
    public function getWidgets()
    {
    }
}