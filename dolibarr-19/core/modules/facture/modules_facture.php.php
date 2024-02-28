<?php

/**
 *	Parent class of invoice document generators
 */
abstract class ModelePDFFactures extends \CommonDocGenerator
{
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
    protected function getHeightForQRInvoice(int $pagenbr, \Facture $object, \Translate $langs)
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
abstract class ModeleNumRefFactures extends \CommonNumRefGenerator
{
    // No overload code
}