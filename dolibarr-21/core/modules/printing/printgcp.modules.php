<?php

/**
 *     Class to provide printing with Google Cloud Print
 */
class printing_printgcp extends \PrintingDriver
{
    /**
     * @var string module name
     */
    public $name = 'printgcp';
    /**
     * @var string module description
     */
    public $desc = 'PrintGCPDesc';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'printer';
    /**
     * @var string module description
     */
    public $active = 'PRINTING_PRINTGCP';
    /**
     * @var array<string|int,string|array{varname:string,info:string,type:'info',renew?:string,delete?:string}|array{enabled:int<0,1>,type:'submit'}> module parameters
     */
    public $conf = array();
    /**
     * @var string google id
     */
    public $google_id = '';
    /**
     * @var string google secret
     */
    public $google_secret = '';
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string
     */
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
     *  @return array{available:array{name:string,displayname:string,id:string,ownerName:string,status:string,connectionStatus:string,type:string}}	list of printers
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
     *  @return array{status:int<0,1>,errorcode:string,errormessage:string}  status array
     */
    public function sendPrintToPrinter($printerid, $printjobtitle, $filepath, $contenttype)
    {
    }
    /**
     *  List jobs print
     *
     *  @param   ?string      $module     module
     *
     *  @return  int                     0 if OK, >0 if KO
     */
    public function listJobs($module = \null)
    {
    }
}