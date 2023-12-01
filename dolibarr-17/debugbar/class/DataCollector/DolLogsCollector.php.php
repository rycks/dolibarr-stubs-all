<?php

//use ReflectionClass;
/**
 * DolLogsCollector class
 */
class DolLogsCollector extends \DebugBar\DataCollector\MessagesCollector
{
    /**
     * @var string default logs file path
     */
    protected $path;
    /**
     * @var int number of lines to show
     */
    protected $maxnboflines;
    /**
     * @var int number of lines
     */
    protected $nboflines;
    /**
     * Constructor
     *
     * @param string $path     Path
     * @param string $name     Name
     */
    public function __construct($path = \null, $name = 'logs')
    {
    }
    /**
     *	Return widget settings
     *
     *  @return array  Array
     */
    public function getWidgets()
    {
    }
    /**
     *	Return collected data
     *
     *  @return array  Array
     */
    public function collect()
    {
    }
    /**
     * Get the path to the logs file
     *
     * @return string
     */
    public function getLogsFile()
    {
    }
    /**
     * Get logs
     *
     * @param string $path     Path
     * @return array
     */
    public function getStorageLogs($path)
    {
    }
    /**
     * Get latest file lines
     *
     * @param string       $file       File
     * @param int          $lines      Lines
     * @return array       Array
     */
    protected function tailFile($file, $lines)
    {
    }
    /**
     * Search a string for log entries
     *
     * @param  string  $file       File
     * @return array               Lines of logs
     */
    public function getLogs($file)
    {
    }
    /**
     * Get the log levels from psr/log.
     *
     * @return array       Array of log level
     */
    public function getLevels()
    {
    }
}