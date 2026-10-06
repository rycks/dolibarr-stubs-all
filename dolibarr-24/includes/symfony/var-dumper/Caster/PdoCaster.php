<?php

namespace Symfony\Component\VarDumper\Caster;

/**
 * Casts PDO related classes to array representation.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class PdoCaster
{
    private static $pdoAttributes = array('CASE' => array(\PDO::CASE_LOWER => 'LOWER', \PDO::CASE_NATURAL => 'NATURAL', \PDO::CASE_UPPER => 'UPPER'), 'ERRMODE' => array(\PDO::ERRMODE_SILENT => 'SILENT', \PDO::ERRMODE_WARNING => 'WARNING', \PDO::ERRMODE_EXCEPTION => 'EXCEPTION'), 'TIMEOUT', 'PREFETCH', 'AUTOCOMMIT', 'PERSISTENT', 'DRIVER_NAME', 'SERVER_INFO', 'ORACLE_NULLS' => array(\PDO::NULL_NATURAL => 'NATURAL', \PDO::NULL_EMPTY_STRING => 'EMPTY_STRING', \PDO::NULL_TO_STRING => 'TO_STRING'), 'CLIENT_VERSION', 'SERVER_VERSION', 'STATEMENT_CLASS', 'EMULATE_PREPARES', 'CONNECTION_STATUS', 'STRINGIFY_FETCHES', 'DEFAULT_FETCH_MODE' => array(\PDO::FETCH_ASSOC => 'ASSOC', \PDO::FETCH_BOTH => 'BOTH', \PDO::FETCH_LAZY => 'LAZY', \PDO::FETCH_NUM => 'NUM', \PDO::FETCH_OBJ => 'OBJ'));
    public static function castPdo(\PDO $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
    public static function castPdoStatement(\PDOStatement $c, array $a, \Symfony\Component\VarDumper\Cloner\Stub $stub, $isNested)
    {
    }
}