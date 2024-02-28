<?php

namespace DebugBar\DataCollector\PDO;

/**
 * A traceable PDO statement to use with Traceablepdo
 */
class TraceablePDOStatement extends \PDOStatement
{
    protected $pdo;
    protected $boundParameters = array();
    protected function __construct(\DebugBar\DataCollector\PDO\TraceablePDO $pdo)
    {
    }
    public function bindColumn($column, &$param, $type = null, $maxlen = null, $driverdata = null)
    {
    }
    public function bindParam($param, &$var, $data_type = \PDO::PARAM_STR, $length = null, $driver_options = null)
    {
    }
    public function bindValue($param, $value, $data_type = \PDO::PARAM_STR)
    {
    }
    public function execute($params = null)
    {
    }
}