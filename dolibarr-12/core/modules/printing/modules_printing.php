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
     *  @param  integer  $maxfilenamelength  Max length of value to show
     *  @return array                       List of drivers
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
}