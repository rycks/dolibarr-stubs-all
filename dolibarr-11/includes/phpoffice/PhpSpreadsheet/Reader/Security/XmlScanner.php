<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Security;

class XmlScanner
{
    /**
     * Identifies whether the thread-safe libxmlDisableEntityLoader() function is available.
     *
     * @var bool
     */
    private $libxmlDisableEntityLoader = false;
    /**
     * String used to identify risky xml elements.
     *
     * @var string
     */
    private $pattern;
    private $callback;
    private function __construct($pattern = '<!DOCTYPE')
    {
    }
    public static function getInstance(\PhpOffice\PhpSpreadsheet\Reader\IReader $reader)
    {
    }
    private function identifyLibxmlDisableEntityLoaderAvailability()
    {
    }
    public function setAdditionalCallback(callable $callback)
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