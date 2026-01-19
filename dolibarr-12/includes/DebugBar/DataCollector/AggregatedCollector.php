<?php

namespace DebugBar\DataCollector;

/**
 * Aggregates data from multiple collectors
 *
 * <code>
 * $aggcollector = new AggregateCollector('foobar');
 * $aggcollector->addCollector(new MessagesCollector('msg1'));
 * $aggcollector->addCollector(new MessagesCollector('msg2'));
 * $aggcollector['msg1']->addMessage('hello world');
 * </code>
 */
class AggregatedCollector implements \DebugBar\DataCollector\DataCollectorInterface, \ArrayAccess
{
    protected $name;
    protected $mergeProperty;
    protected $sort;
    protected $collectors = array();
    /**
     * @param string $name
     * @param string $mergeProperty
     * @param boolean $sort
     */
    public function __construct($name, $mergeProperty = null, $sort = false)
    {
    }
    /**
     * @param DataCollectorInterface $collector
     */
    public function addCollector(\DebugBar\DataCollector\DataCollectorInterface $collector)
    {
    }
    /**
     * @return array
     */
    public function getCollectors()
    {
    }
    /**
     * Merge data from one of the key/value pair of the collected data
     *
     * @param string $property
     */
    public function setMergeProperty($property)
    {
    }
    /**
     * @return string
     */
    public function getMergeProperty()
    {
    }
    /**
     * Sorts the collected data
     *
     * If true, sorts using sort()
     * If it is a string, sorts the data using the value from a key/value pair of the array
     *
     * @param bool|string $sort
     */
    public function setSort($sort)
    {
    }
    /**
     * @return bool|string
     */
    public function getSort()
    {
    }
    public function collect()
    {
    }
    /**
     * Sorts the collected data
     *
     * @param array $data
     * @return array
     */
    protected function sort($data)
    {
    }
    public function getName()
    {
    }
    // --------------------------------------------
    // ArrayAccess implementation
    public function offsetSet($key, $value)
    {
    }
    public function offsetGet($key)
    {
    }
    public function offsetExists($key)
    {
    }
    public function offsetUnset($key)
    {
    }
}