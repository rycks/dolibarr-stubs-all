<?php

namespace DebugBar\DataCollector\PDO;

/**
 * Collects data about SQL statements executed with PDO
 */
class PDOCollector extends \DebugBar\DataCollector\DataCollector implements \DebugBar\DataCollector\Renderable, \DebugBar\DataCollector\AssetProvider
{
    protected $connections = array();
    protected $timeCollector;
    protected $renderSqlWithParams = false;
    protected $sqlQuotationChar = '<>';
    /**
     * @param \PDO $pdo
     * @param TimeDataCollector $timeCollector
     */
    public function __construct(\PDO $pdo = null, \DebugBar\DataCollector\TimeDataCollector $timeCollector = null)
    {
    }
    /**
     * Renders the SQL of traced statements with params embeded
     *
     * @param boolean $enabled
     */
    public function setRenderSqlWithParams($enabled = true, $quotationChar = '<>')
    {
    }
    /**
     * @return bool
     */
    public function isSqlRenderedWithParams()
    {
    }
    /**
     * @return string
     */
    public function getSqlQuotationChar()
    {
    }
    /**
     * Adds a new PDO instance to be collector
     *
     * @param TraceablePDO $pdo
     * @param string $name Optional connection name
     */
    public function addConnection(\PDO $pdo, $name = null)
    {
    }
    /**
     * Returns PDO instances to be collected
     *
     * @return array
     */
    public function getConnections()
    {
    }
    /**
     * @return array
     */
    public function collect()
    {
    }
    /**
     * Collects data from a single TraceablePDO instance
     *
     * @param TraceablePDO $pdo
     * @param TimeDataCollector $timeCollector
     * @param string|null $connectionName the pdo connection (eg default | read | write)
     * @return array
     */
    protected function collectPDO(\DebugBar\DataCollector\PDO\TraceablePDO $pdo, \DebugBar\DataCollector\TimeDataCollector $timeCollector = null, $connectionName = null)
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
    /**
     * @return array
     */
    public function getAssets()
    {
    }
}