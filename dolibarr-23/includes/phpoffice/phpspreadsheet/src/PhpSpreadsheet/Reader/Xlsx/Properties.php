<?php

namespace PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Properties
{
    private $securityScanner;
    private $docProps;
    public function __construct(\PhpOffice\PhpSpreadsheet\Reader\Security\XmlScanner $securityScanner, \PhpOffice\PhpSpreadsheet\Document\Properties $docProps)
    {
    }
    private function extractPropertyData($propertyData)
    {
    }
    public function readCoreProperties($propertyData)
    {
    }
    public function readExtendedProperties($propertyData)
    {
    }
    public function readCustomProperties($propertyData)
    {
    }
    private static function getArrayItem(array $array, $key = 0)
    {
    }
}