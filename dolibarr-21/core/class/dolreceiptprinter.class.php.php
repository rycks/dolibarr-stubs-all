<?php

/**
 * Class to manage Receipt Printers
 */
class dolReceiptPrinter extends \Mike42\Escpos\Printer
{
    const CONNECTOR_DUMMY = 1;
    const CONNECTOR_FILE_PRINT = 2;
    const CONNECTOR_NETWORK_PRINT = 3;
    const CONNECTOR_WINDOWS_PRINT = 4;
    const CONNECTOR_CUPS_PRINT = 5;
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string[] array of tags
     */
    public $tags;
    /**
     * @var \Mike42\Escpos\Printer
     */
    public $printer;
    /**
     * @var string
     */
    public $template;
    /**
     * Number of order printer
     * @var int
     */
    public $orderprinter;
    /**
     * Array with list of printers
     * @var array<array{rowid:int,name:string,fk_type:int,fk_type_name:string,fk_profile:int,fk_profile_name:string,parameter:string}>	List of printers
     */
    public $listprinters;
    /**
     * Array with list of printer templates
     * @var array<array{rowid:int,name:string,template:string}>	List of printer templates
     */
    public $listprinterstemplates;
    /**
     * @var string
     */
    public $profileresprint;
    /**
     * @var string
     */
    public $resprint;
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
     * List printers into the array ->listprinters
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
     *  Function to add a printer template in db
     *
     *  @param    string    $name           Template name
     *  @param    int       $template       Template
     *  @return   int                       0 if OK; >0 if KO
     */
    public function addTemplate($name, $template)
    {
    }
    /**
     *  Function to delete a printer template in db
     *
     *  @param    int       $templateid     Template ID
     *  @return   int                       0 if OK; >0 if KO
     */
    public function deleteTemplate($templateid)
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
     *  @param  int     $printerid      	Printer id
     *  @param	int		$addimgandbarcode	Add image and barcode into the test
     *  @return int                        	0 if OK; >0 if KO
     */
    public function sendTestToPrinter($printerid, $addimgandbarcode = 0)
    {
    }
    /**
     *  Function to Print Receipt Ticket
     *
     *  @param   Facture|Commande   $object         Order or invoice object
     *  @param   int       			$templateid     Template id
     *  @param   int       			$printerid      Printer id
     *  @return  int                				0 if OK; >0 if KO
     */
    public function sendToPrinter($object, $templateid, $printerid)
    {
    }
    /**
     *  Function to load Template into $this->template
     *
     *  @param   int       $templateid          Template id
     *  @return  int                            0 if OK; >0 if KO
     */
    public function loadTemplate($templateid)
    {
    }
    /**
     *  Function Init Printer into $this->printer
     *
     *  @param   int       $printerid       Printer id
     *  @return  void|int                   0 if OK; >0 if KO
     */
    public function initPrinter($printerid)
    {
    }
}