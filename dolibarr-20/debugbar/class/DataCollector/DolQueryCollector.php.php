<?php

/**
 * DolQueryCollector class
 */
class DolQueryCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    /**
     * @var object Database handler
     */
    protected $db;
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * Return collected data
     *
     * @return array  Array of collected data
     */
    public function collect()
    {
    }
    /**
     *	Return collector name
     *
     *  @return string  Name
     */
    public function getName()
    {
    }
    /**
     *	Return widget settings
     *
     *  @return array      Array
     */
    public function getWidgets()
    {
    }
    /**
     *	Return assets
     *
     *  @return array   Array
     */
    public function getAssets()
    {
    }
}