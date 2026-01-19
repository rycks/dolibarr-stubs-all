<?php

/**
 *	Parent class of invoice document generators
 */
abstract class ModelePDFFactures extends \CommonDocGenerator
{
    /**
     * @var float
     */
    public $posxpicture;
    /**
     * @var float
     */
    public $posxtva;
    /**
     * @var float
     */
    public $posxup;
    /**
     * @var float
     */
    public $posxqty;
    /**
     * @var float
     */
    public $posxunit;
    /**
     * @var float
     */
    public $posxdesc;
    /**
     * @var float
     */
    public $posxdiscount;
    /**
     * @var float
     */
    public $postotalht;
    /**
     * @var array<string,float>
     */
    public $tva;
    /**
     * @var array<string,array{amount:float}>
     */
    public $tva_array;
    /**
     * Local tax rates Array[tax_type][tax_rate]
     *
     * @var array<int,array<string,float>>
     */
    public $localtax1;
    /**
     * Local tax rates Array[tax_type][tax_rate]
     *
     * @var array<int,array<string,float>>
     */
    public $localtax2;
    /**
     * @var int<0,1>
     */
    public $atleastonediscount = 0;
    /**
     * @var int<0,1>
     */
    public $atleastoneratenotnull = 0;
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param  DoliDB  	$db                 Database handler
     *  @param  int<0,max>	$maxfilenamelength  Max length of value to show
     *  @return string[]|int<-1,0>				List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to build pdf onto disk
     *
     *  @param		Facture			$object				Object to generate
     *  @param		Translate		$outputlangs		Lang output object
     *  @param		string			$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int<0,1>		$hidedetails		Do not show line details
     *  @param		int<0,1>		$hidedesc			Do not show desc
     *  @param		int<0,1>		$hideref			Do not show ref
     *  @return		int<-1,1>							1=OK, <=0=KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
    // phpcs:enable
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
    /**
     * Return next value not used or last value used
     *
     * @param	Societe		$objsoc		Object third party
     * @param   ?Facture	$invoice	Object invoice
     * @param   string		$mode		'next' for next value or 'last' for last value
     * @return  string|int<-1,0>		Value if OK, <=0 if KO
     */
    public abstract function getNextValue($objsoc, $invoice, $mode = 'next');
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public abstract function getExample();
}