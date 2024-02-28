<?php

class PrintIPP extends \BasicIPP
{
    public function __construct()
    {
    }
    // OPERATIONS
    public function printJob()
    {
    }
    public function cancelJob($job_uri)
    {
    }
    public function validateJob()
    {
    }
    public function getPrinterAttributes()
    {
    }
    public function getJobs($my_jobs = \true, $limit = 0, $which_jobs = "not-completed", $subset = \false)
    {
    }
    public function getJobAttributes($job_uri, $subset = \false, $attributes_group = "all")
    {
    }
    public function getPrinters()
    {
    }
    public function generateError($error)
    {
    }
    public function resetError($error)
    {
    }
    // SETUP
    protected function _setOperationId()
    {
    }
    protected function _setJobId()
    {
    }
    protected function _setJobUri($job_uri)
    {
    }
    // RESPONSE PARSING
    protected function _parsePrinterAttributes()
    {
    }
    protected function _parseJobsAttributes()
    {
    }
    protected function _readAttribute($attributes_type)
    {
    }
    protected function _readTag($tag)
    {
    }
    protected function _readCollection($attributes_type, $j)
    {
    }
    protected function _readAttributeName($attributes_type, $j, $write = 1)
    {
    }
    protected function _readValue($type, $attributes_type, $j, $write = 1)
    {
    }
    protected function _parseAttributes()
    {
    }
    protected function _parseJobAttributes()
    {
    }
    protected function _interpretAttribute($attribute_name, $type, $value)
    {
    }
    protected function _interpretRangeOfInteger($value)
    {
    }
    protected function _interpretDateTime($date)
    {
    }
    protected function _interpretEnum($attribute_name, $value)
    {
    }
    protected function _getJobId()
    {
    }
    protected function _getJobUri()
    {
    }
    protected function _parseResponse()
    {
    }
    /*
        // NOTICE : HAVE TO READ AGAIN RFC 2911 TO SEE IF IT IS PART OF SERVER'S RESPONSE (CUPS DO NOT)
    protected function _getPrinterUri () {
        for ($i = 0 ; (array_key_exists($i,$this->serveroutput->response)) ; $i ++)
                if (($this->serveroutput->response[$i]['attributes']) == "job-attributes")
                    for ($j = 0 ; array_key_exists($j,$this->serveroutput->response[$i]) ; $j++)
                        if ($this->serveroutput->response[$i][$j]['name'] == "printer-uri") {
                            $this->printers_uri = array_merge($this->printers_uri,array($this->serveroutput->response[$i][$j]['value']));
                        return;
                            
                            }
        $this->printers_uri = array_merge($this->printers_uri,array(''));
     
        }
    */
    // REQUEST BUILDING
    protected function _stringCancel($job_uri)
    {
    }
}