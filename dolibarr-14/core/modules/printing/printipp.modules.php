<?php

/**
 *   Class to provide printing with PrintIPP
 */
class printing_printipp extends \PrintingDriver
{
    /**
     * @var string module name
     */
    public $name = 'printipp';
    /**
     * @var string module description
     */
    public $desc = 'PrintIPPDesc';
    /**
     * @var string String with name of icon for myobject. Must be the part after the 'object_' into object_myobject.png
     */
    public $picto = 'printer';
    /**
     * @var string Constant name
     */
    public $active = 'PRINTING_PRINTIPP';
    /**
     * @var array array of setup value
     */
    public $conf = array();
    /**
     * @var string host
     */
    public $host;
    /**
     * @var string port
     */
    public $port;
    /**
     * @var string username
     */
    public $userid;
    /**
     * @var string login for printer host
     */
    public $user;
    /**
     * @var string password for printer host
     */
    public $password;
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
    const LANGFILE = 'printipp';
    /**
     *  Constructor
     *
     *  @param      DoliDB      $db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Print selected file
     *
     * @param   string      $file       file
     * @param   string      $module     module
     * @param   string      $subdir     subdirectory of document like for expedition subdir is sendings
     *
     * @return  int                     0 if OK, >0 if KO
     */
    public function printFile($file, $module, $subdir = '')
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
     *  @return array                list of printers
     */
    public function getlistAvailablePrinters()
    {
    }
    /**
     *  Get printer detail
     *
     *  @param  string  $uri    URI
     *  @return array           List of attributes
     */
    private function getPrinterDetail($uri)
    {
    }
    /**
     *  List jobs print
     *
     *  @param   string      $module     module
     *
     *  @return  int                     0 if OK, >0 if KO
     */
    public function listJobs($module)
    {
    }
}