<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Security;

class XmlScanner
{
    /**
     * String used to identify risky xml elements.
     *
     * @var string
     */
    private $pattern;
    private $callback;
    private static $libxmlDisableEntityLoaderValue;
    public function __construct($pattern = '<!DOCTYPE')
    {
    }
    public static function getInstance(\PhpOffice\PhpSpreadsheet\Reader\IReader $reader)
    {
    }
    public static function threadSafeLibxmlDisableEntityLoaderAvailability()
    {
    }
    private function disableEntityLoaderCheck()
    {
    }
    public static function shutdown()
    {
    }
    public function __destruct()
    {
    }
    public function setAdditionalCallback(callable $callback)
    {
    }
    private function toUtf8($xml)
    {
    }
    /**
     * Scan the XML for use of <!ENTITY to prevent XXE/XEE attacks.
     *
     * @param mixed $xml
     *
     * @throws Reader\Exception
     *
     * @return string
     */
    public function scan($xml)
    {
    }
    /**
     * Scan theXML for use of <!ENTITY to prevent XXE/XEE attacks.
     *
     * @param string $filestream
     *
     * @throws Reader\Exception
     *
     * @return string
     */
    public function scanFile($filestream)
    {
    }
}