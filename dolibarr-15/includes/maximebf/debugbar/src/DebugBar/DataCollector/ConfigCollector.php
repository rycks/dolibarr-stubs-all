<?php

namespace DebugBar\DataCollector;

/**
 * Collects array data
 */
class ConfigCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    protected $name;
    protected $data;
    // The HTML var dumper requires debug bar users to support the new inline assets, which not all
    // may support yet - so return false by default for now.
    protected $useHtmlVarDumper = false;
    /**
     * Sets a flag indicating whether the Symfony HtmlDumper will be used to dump variables for
     * rich variable rendering.
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