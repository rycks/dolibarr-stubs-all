<?php

/**
 *	Parent class of invoice document generators
 */
abstract class ModelePDFFactures extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $posxpicture;
    public $posxtva;
    public $posxup;
    public $posxqty;
    public $posxunit;
    public $posxdesc;
    public $posxdiscount;
    public $postotalht;
    public $tva;
    public $tva_array;
    public $localtax1;
    public $localtax2;
    public $atleastonediscount = 0;
    public $atleastoneratenotnull = 0;
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    /**
     * Get the SwissQR object, including validation
     *
     * @param 	Facture 				$object  	Invoice object
     * @param 	Translate 				$langs 		Translation object
     * @return 	SwissQrBill\QrBill|bool 			The valid SwissQR object, or false
     */
    private function getSwissQrBill(\Facture $object, \Translate $langs)
    {
    }
    /**
     * Get the height for bottom-page QR invoice in mm, depending on the page number.
     *
     * @param int       $pagenbr 	Page number
     * @param Facture   $object  	Invoice object
     * @param Translate $langs   	Translation object
     * @return int      			Height in mm of the bottom-page QR invoice. Can be zero if not on right page; not enabled
     */
    protected function getHeightForQRInvoice(int $pagenbr, \Facture $object, \Translate $langs) : int
    {
    }
    /**
     * Add SwissQR invoice at bottom of page 1
     *
     * @param TCPDF     $pdf     	TCPDF object
     * @param Facture   $object  	Invoice object
     * @param Translate $langs   	Translation object
     * @return bool 				True for for success
     */
    public function addBottomQRInvoice(\TCPDF $pdf, \Facture $object, \Translate $langs) : bool
    {
    }
}
/**
 *  Parent class of invoice reference numbering templates
 */
abstract class ModeleNumRefFactures
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $version;
    /**
     * Return if a module can be used or not
     *
     * @return	boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    /**
     * Returns the default description of the numbering pattern
     *
     * @return    string      Descriptive text
     */
    public function info()
    {
    }
    /**
     * Return an example of numbering
     *
     * @return	string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     * @return	boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     * Renvoi prochaine valeur attribuee
     *
     * @param	Societe		$objsoc		Objet societe
     * @param   Facture		$invoice	Objet facture
     * @param   string		$mode       'next' for next value or 'last' for last value
     * @return  string      			Value
     */
    public function getNextValue($objsoc, $invoice, $mode = 'next')
    {
    }
    /**
     * Renvoi version du modele de numerotation
     *
     * @return    string      Valeur
     */
    public function getVersion()
    {
    }
}