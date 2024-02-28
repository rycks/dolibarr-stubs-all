<?php

namespace DebugBar\DataCollector;

/**
 * Collects array data
 */
class ConfigCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable
{
    protected $name;
    protected $data;
    /**
     * @param array  $data
     * @param string $name
     */
    public function __construct(array $data = array(), $name = 'config')
    {
    }
    /**
     * Sets the data
     *
     * @param array $data
     */
    public function setData(array $data)
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