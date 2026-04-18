<?php

namespace DebugBar\Bridge;

/**
 * A monolog handler as well as a data collector
 *
 * https://github.com/Seldaek/monolog
 *
 * <code>
 * $debugbar->addCollector(new MonologCollector($logger));
 * </code>
 */
class MonologCollector extends \Monolog\Handler\AbstractProcessingHandler implements \DebugBar\DataCollector\DataCollectorInterface, \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\MessagesAggregateInterface
{
    protected $name;
    protected $records = array();
    /**
     * @param Logger $logger
     * @param int $level
     * @param boolean $bubble
     * @param string $name
     */
    public function __construct(\Monolog\Logger $logger = null, $level = \Monolog\Logger::DEBUG, $bubble = true, $name = 'monolog')
    {
    }
    /**
     * Adds logger which messages you want to log
     *
     * @param Logger $logger
     */
    public function addLogger(\Monolog\Logger $logger)
    {
    }
    /**
     * @param array|\Monolog\LogRecord $record
     */
    protected function write($record) : void
    {
    }
    /**
     * @return array
     */
    public function getMessages()
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
    public function getWidgets()
    {
    }
}