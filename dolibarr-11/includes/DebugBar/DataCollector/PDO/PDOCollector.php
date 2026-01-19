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
     * @param TraceablePDO $pdo
     * @param TimeDataCollector $timeCollector
     */
    public function __construct(\DebugBar\DataCollector\PDO\TraceablePDO $pdo = null, \DebugBar\DataCollector\TimeDataCollector $timeCollector = null)
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
    public function isSqlRenderedWithParams()
    {
    }
    public function getSqlQuotationChar()
    {
    }
    /**
     * Adds a new PDO instance to be collector
     *
     * @param TraceablePDO $pdo
     * @param string $name Optional connection name
     */
    public function addConnection(\DebugBar\DataCollector\PDO\TraceablePDO $pdo, $name = null)
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
    public function collect()
    {
    }
    /**
     * Collects data from a single TraceablePDO instance
     *
     * @param TraceablePDO $pdo
     * @param TimeDataCollector $timeCollector
     * @return array
     */
    protected function collectPDO(\DebugBar\DataCollector\PDO\TraceablePDO $pdo, \DebugBar\DataCollector\TimeDataCollector $timeCollector = null)
    {
    }
    public function getName()
    {
    }
    public function getWidgets()
    {
    }
    public function getAssets()
    {
    }
}