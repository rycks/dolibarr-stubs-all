<?php

/**
 *     Class to provide printing with Google Cloud Print
 */
class printing_printgcp extends \PrintingDriver
{
    public $name = 'printgcp';
    public $desc = 'PrintGCPDesc';
    public $picto = 'printer';
    public $active = 'PRINTING_PRINTGCP';
    public $conf = array();
    public $google_id = '';
    public $google_secret = '';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    private $OAUTH_SERVICENAME_GOOGLE = 'Google';
    const LOGIN_URL = 'https://accounts.google.com/o/oauth2/token';
    const PRINTERS_SEARCH_URL = 'https://www.google.com/cloudprint/search';
    const PRINTERS_GET_JOBS = 'https://www.google.com/cloudprint/jobs';
    const PRINT_URL = 'https://www.google.com/cloudprint/submit';
    /**
     *  Constructor
     *
     *  @param      DoliDB      $db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Return list of available printers
     *
     *  @return  int                     0 if OK, >0 if KO
     */
    public function listAvailablePrinters()
    {
    }
    /**
     *  Return list of available printers
     *
     *  @return array      list of printers
     */
    public function getlistAvailablePrinters()
    {
    }
    /**
     *  Print selected file
     *
     * @param   string      $file       file
     * @param   string      $module     module
     * @param   string      $subdir     subdir for file
     * @return  int                     0 if OK, >0 if KO
     */
    public function printFile($file, $module, $subdir = '')
    {
    }
    /**
     *  Sends document to the printer
     *
     *  @param  string      $printerid      Printer id returned by Google Cloud Print
     *  @param  string      $printjobtitle  Job Title
     *  @param  string      $filepath       File Path to be send to Google Cloud Print
     *  @param  string      $contenttype    File content type by example application/pdf, image/png
     *  @return array                       status array
     */
    public function sendPrintToPrinter($printerid, $printjobtitle, $filepath, $contenttype)
    {
    }
    /**
     *  List jobs print
     *
     *  @return  int                     0 if OK, >0 if KO
     */
    public function listJobs()
    {
    }
}