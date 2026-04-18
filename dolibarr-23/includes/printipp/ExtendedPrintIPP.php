<?php

class ExtendedPrintIPP extends \PrintIPP
{
    public function __construct()
    {
    }
    // OPERATIONS
    public function printURI($uri)
    {
    }
    public function purgeJobs()
    {
    }
    public function createJob()
    {
    }
    public function sendDocument($job, $is_last = \false)
    {
    }
    public function sendURI($uri, $job, $is_last = \false)
    {
    }
    public function pausePrinter()
    {
    }
    public function resumePrinter()
    {
    }
    public function holdJob($job_uri, $until = 'indefinite')
    {
    }
    public function releaseJob($job_uri)
    {
    }
    public function restartJob($job_uri)
    {
    }
    public function setJobAttributes($job_uri, $deleted_attributes = array())
    {
    }
    public function setPrinterAttributes($document_format = '', $deleted_attributes = array())
    {
    }
    // REQUEST BUILDING
    protected function _setDocumentUri()
    {
    }
    protected function _stringUri()
    {
    }
    protected function _stringDocument($job, $is_last)
    {
    }
    protected function _stringSendUri($uri, $job, $is_last)
    {
    }
}