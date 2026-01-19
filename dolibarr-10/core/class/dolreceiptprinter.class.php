<?php

/**
 * Class to manage Receipt Printers
 */
class dolReceiptPrinter extends \Escpos
{
    const CONNECTOR_DUMMY = 1;
    const CONNECTOR_FILE_PRINT = 2;
    const CONNECTOR_NETWORK_PRINT = 3;
    const CONNECTOR_WINDOWS_PRINT = 4;
    //const CONNECTOR_JAVA = 5;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    public $tags;
    public $printer;
    public $template;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string[] Error codes (or messages)
     */
    public $errors = array();
    /**
     * Constructor
     *
     * @param   DoliDB      $db         database
     */
    public function __construct($db)
    {
    }
    /**
     * list printers
     *
     * @return  int                     0 if OK; >0 if KO
     */
    public function listPrinters()
    {
    }
    /**
     * List printers templates
     *
     * @return  int                     0 if OK; >0 if KO
     */
    public function listPrintersTemplates()
    {
    }
    /**
     *  Form to Select type printer
     *
     *  @param    string    $selected       Id printer type pre-selected
     *  @param    string    $htmlname       select html name
     *  @return  int                        0 if OK; >0 if KO
     */
    public function selectTypePrinter($selected = '', $htmlname = 'printertypeid')
    {
    }
    /**
     *  Form to Select Profile printer
     *
     *  @param    string    $selected       Id printer profile pre-selected
     *  @param    string    $htmlname       select html name
     *  @return  int                        0 if OK; >0 if KO
     */
    public function selectProfilePrinter($selected = '', $htmlname = 'printerprofileid')
    {
    }
    /**
     *  Function to Add a printer in db
     *
     *  @param    string    $name           Printer name
     *  @param    int       $type           Printer type
     *  @param    int       $profile        Printer profile
     *  @param    string    $parameter      Printer parameter
     *  @return  int                        0 if OK; >0 if KO
     */
    public function addPrinter($name, $type, $profile, $parameter)
    {
    }
    /**
     *  Function to Update a printer in db
     *
     *  @param    string    $name           Printer name
     *  @param    int       $type           Printer type
     *  @param    int       $profile        Printer profile
     *  @param    string    $parameter      Printer parameter
     *  @param    int       $printerid      Printer id
     *  @return  int                        0 if OK; >0 if KO
     */
    public function updatePrinter($name, $type, $profile, $parameter, $printerid)
    {
    }
    /**
     *  Function to Delete a printer from db
     *
     *  @param    int       $printerid      Printer id
     *  @return  int                        0 if OK; >0 if KO
     */
    public function deletePrinter($printerid)
    {
    }
    /**
     *  Function to Update a printer template in db
     *
     *  @param    string    $name           Template name
     *  @param    int       $template       Template
     *  @param    int       $templateid     Template id
     *  @return   int                       0 if OK; >0 if KO
     */
    public function updateTemplate($name, $template, $templateid)
    {
    }
    /**
     *  Function to Send Test page to Printer
     *
     *  @param    int       $printerid      Printer id
     *  @return  int                        0 if OK; >0 if KO
     */
    public function sendTestToPrinter($printerid)
    {
    }
    /**
     *  Function to Print Receipt Ticket
     *
     *  @param   object    $object          order or invoice object
     *  @param   int       $templateid      Template id
     *  @param   int       $printerid       Printer id
     *  @return  int                        0 if OK; >0 if KO
     */
    public function sendToPrinter($object, $templateid, $printerid)
    {
    }
    /**
     *  Function to load Template
     *
     *  @param   int       $templateid          Template id
     *  @return  int                            0 if OK; >0 if KO
     */
    public function loadTemplate($templateid)
    {
    }
    /**
     *  Function Init Printer
     *
     *  @param   int       $printerid       Printer id
     *  @return  int                        0 if OK; >0 if KO
     */
    public function initPrinter($printerid)
    {
    }
}