<?php

namespace DebugBar;

/**
 * Main DebugBar object
 *
 * Manages data collectors. DebugBar provides an array-like access
 * to collectors by name.
 *
 * <code>
 *     $debugbar = new DebugBar();
 *     $debugbar->addCollector(new DataCollector\MessagesCollector());
 *     $debugbar['messages']->addMessage("foobar");
 * </code>
 */
class DebugBar implements \ArrayAccess
{
    public static $useOpenHandlerWhenSendingDataHeaders = false;
    protected $collectors = array();
    protected $data;
    protected $jsRenderer;
    protected $requestIdGenerator;
    protected $requestId;
    protected $storage;
    protected $httpDriver;
    protected $stackSessionNamespace = 'PHPDEBUGBAR_STACK_DATA';
    protected $stackAlwaysUseSessionStorage = false;
    /**
     * Adds a data collector
     *
     * @param DataCollectorInterface $collector
     *
     * @throws DebugBarException
     * @return $this
     */
    public function addCollector(\DebugBar\DataCollector\DataCollectorInterface $collector)
    {
    }
    /**
     * Checks if a data collector has been added
     *
     * @param string $name
     * @return boolean
     */
    public function hasCollector($name)
    {
    }
    /**
     * Returns a data collector
     *
     * @param string $name
     * @return DataCollectorInterface
     * @throws DebugBarException
     */
    public function getCollector($name)
    {
    }
    /**
     * Returns an array of all data collectors
     *
     * @return array[DataCollectorInterface]
     */
    public function getCollectors()
    {
    }
    /**
     * Sets the request id generator
     *
     * @param RequestIdGeneratorInterface $generator
     * @return $this
     */
    public function setRequestIdGenerator(\DebugBar\RequestIdGeneratorInterface $generator)
    {
    }
    /**
     * @return RequestIdGeneratorInterface
     */
    public function getRequestIdGenerator()
    {
    }
    /**
     * Returns the id of the current request
     *
     * @return string
     */
    public function getCurrentRequestId()
    {
    }
    /**
     * Sets the storage backend to use to store the collected data
     *
     * @param StorageInterface $storage
     * @return $this
     */
    public function setStorage(\DebugBar\Storage\StorageInterface $storage = null)
    {
    }
    /**
     * @return StorageInterface
     */
    public function getStorage()
    {
    }
    /**
     * Checks if the data will be persisted
     *
     * @return boolean
     */
    public function isDataPersisted()
    {
    }
    /**
     * Sets the HTTP driver
     *
     * @param HttpDriverInterface $driver
     * @return $this
     */
    public function setHttpDriver(\DebugBar\HttpDriverInterface $driver)
    {
    }
    /**
     * Returns the HTTP driver
     *
     * If no http driver where defined, a PhpHttpDriver is automatically created
     *
     * @return HttpDriverInterface
     */
    public function getHttpDriver()
    {
    }
    /**
     * Collects the data from the collectors
     *
     * @return array
     */
    public function collect()
    {
    }
    /**
     * Returns collected data
     *
     * Will collect the data if none have been collected yet
     *
     * @return array
     */
    public function getData()
    {
    }
    /**
     * Returns an array of HTTP headers containing the data
     *
     * @param string $headerName
     * @param integer $maxHeaderLength
     * @return array
     */
    public function getDataAsHeaders($headerName = 'phpdebugbar', $maxHeaderLength = 4096, $maxTotalHeaderLength = 250000)
    {
    }
    /**
     * Sends the data through the HTTP headers
     *
     * @param bool $useOpenHandler
     * @param string $headerName
     * @param integer $maxHeaderLength
     * @return $this
     */
    public function sendDataInHeaders($useOpenHandler = null, $headerName = 'phpdebugbar', $maxHeaderLength = 4096)
    {
    }
    /**
     * Stacks the data in the session for later rendering
     */
    public function stackData()
    {
    }
    /**
     * Checks if there is stacked data in the session
     *
     * @return boolean
     */
    public function hasStackedData()
    {
    }
    /**
     * Returns the data stacked in the session
     *
     * @param boolean $delete Whether to delete the data in the session
     * @return array
     */
    public function getStackedData($delete = true)
    {
    }
    /**
     * Sets the key to use in the $_SESSION array
     *
     * @param string $ns
     * @return $this
     */
    public function setStackDataSessionNamespace($ns)
    {
    }
    /**
     * Returns the key used in the $_SESSION array
     *
     * @return string
     */
    public function getStackDataSessionNamespace()
    {
    }
    /**
     * Sets whether to only use the session to store stacked data even
     * if a storage is enabled
     *
     * @param boolean $enabled
     * @return $this
     */
    public function setStackAlwaysUseSessionStorage($enabled = true)
    {
    }
    /**
     * Checks if the session is always used to store stacked data
     * even if a storage is enabled
     *
     * @return boolean
     */
    public function isStackAlwaysUseSessionStorage()
    {
    }
    /**
     * Initializes the session for stacked data
     * @return HttpDriverInterface
     * @throws DebugBarException
     */
    protected function initStackSession()
    {
    }
    /**
     * Returns a JavascriptRenderer for this instance
     * @param string $baseUrl
     * @param string $basePath
     * @return JavascriptRenderer
     */
    public function getJavascriptRenderer($baseUrl = null, $basePath = null)
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