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
     *  @return array<string,array{icon?:string,indicator?:string,widget?:string,tooltip?:string|array{html:string,class:string},map:string,default:string}>		Array
     */
    public function getWidgets()
    {
    }
    /**
     *	Return collected data
     *
     *  @return array{count:int,messages:string[]}  Array of collected data
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
     * @param 	string 	$path     	Path
     * @return 	void
     */
    public function getStorageLogs($path)
    {
    }
    /**
     * Get latest file lines
     *
     * @param string       $file	File
     * @param int          $lines	Lines
     * @return string[]				Array
     */
    protected function tailFile($file, $lines)
    {
    }
    /**
     * Search a string for log entries into the log file. Used when debug bar scan log file (very slow).
     *
     * @param  string  $file							File
     * @return list<array{level:string,line:string}>	Lines of log entries
     */
    public function getLogs($file)
    {
    }
    /**
     * Get the log levels from psr/log.
     *
     * @return array<string,string>	Array of log level
     */
    public function getLevels()
    {
    }
}