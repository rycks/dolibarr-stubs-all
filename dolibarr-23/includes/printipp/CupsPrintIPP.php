<?php

class CupsPrintIPP extends \ExtendedPrintIPP
{
    public $printers_attributes;
    public $defaults_attributes;
    protected $parsed;
    protected $output;
    public function __construct()
    {
    }
    //
    // OPERATIONS
    //
    public function cupsGetDefaults($attributes = array("all"))
    {
    }
    public function cupsAcceptJobs($printer_uri)
    {
    }
    public function cupsRejectJobs($printer_uri, $printer_state_message)
    {
    }
    public function getPrinters($printer_location = \false, $printer_info = \false, $attributes = array())
    {
    }
    public function cupsGetPrinters()
    {
    }
    public function getPrinterAttributes()
    {
    }
    //
    // SETUP
    //
    protected function _initTags()
    {
    }
    //
    // REQUEST BUILDING
    //
    protected function _enumBuild($tag, $value)
    {
    }
    //
    // RESPONSE PARSING
    //
    private function _getAvailablePrinters()
    {
    }
    protected function _getEnumVendorExtensions($value_parsed)
    {
    }
    private function _interpretPrinterType($value)
    {
    }
    protected function _interpretEnum($attribute_name, $value)
    {
    }
}