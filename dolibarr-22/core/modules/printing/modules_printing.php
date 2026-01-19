<?php

/**
 *      Parent class of emailing target selectors modules
 */
class PrintingDriver
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * @var string Name
     */
    public $name;
    /**
     * @var string Description
     */
    public $desc;
    /**
     * @var string Html string returned for print
     */
    public $resprint;
    /**
     * @var string Name of active driver ? ("Constant" in child class)
     */
    public $active = "NOT_SET";
    /**
     *  Constructor
     *
     *  @param      DoliDB      $db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *  Return list of printing driver
     *
     *  @param  DoliDB  $db                 Database handler
     *  @param  int		$maxfilenamelength	Max length of value to show
     *  @return array<string,string>		List of drivers
     */
    public static function listDrivers($db, $maxfilenamelength = 0)
    {
    }
    /**
     *  Return description of Printing Module
     *
     *  @return     string      Return translation of key PrintingModuleDescXXX where XXX is module name, or $this->desc if not exists
     */
    public function getDesc()
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
     *  @return array<int|string,string|array<string|int,string>>	list of printers
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