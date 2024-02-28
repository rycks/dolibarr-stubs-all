<?php

/**
 *	Class to manage PDF invoice template sponge
 */
class pdf_sponge extends \ModelePDFFactures
{
    /**
     * @var DoliDb Database handler
     */
    public $db;
    /**
     * @var string model name
     */
    public $name;
    /**
     * @var string model description (short text)
     */
    public $description;
    /**
     * @var int     Save the name of generated file as the main doc when generating a doc with this template
     */
    public $update_main_doc_field;
    /**
     * @var string document type
     */
    public $type;
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    /**
     * @var int heightforinfotot
     */
    public $heightforinfotot;
    /**
     * @var int heightforfreetext
     */
    public $heightforfreetext;
    /**
     * @var int heightforfooter
     */
    public $heightforfooter;
    /**
     * @var int tab_top
     */
    public $tab_top;
    /**
     * @var int tab_top_newpage
     */
    public $tab_top_newpage;
    /**
     * @var bool Situation invoice type
     */
    public $situationinvoice;
    /**
     * @var array of document table columns
     */
    public $cols;
    /**
     * @var int Category of operation
     */
    public $categoryOfOperation = -1;
    // unknown by default
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to build pdf onto disk
     *
     *  @param		Facture		$object				Object to generate
     *  @param		Translate	$outputlangs		Lang output object
     *  @param		string		$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int			$hidedetails		Do not show line details
     *  @param		int			$hidedesc			Do not show desc
     *  @param		int			$hideref			Do not show ref
     *  @return     int         	    			1=OK, 0=KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     *  Show payments table
     *
     *  @param	TCPDF		$pdf            Object PDF
     *  @param  Facture		$object         Object invoice
     *  @param  int			$posy           Position y in PDF
     *  @param  Translate	$outputlangs    Object langs for output
     *  @return int             			Return integer <0 if KO, >0 if OK
     */
    public function drawPaymentsTable(&$pdf, $object, $posy, $outputlangs)
    {
    }
    /**
     *   Show miscellaneous information (payment mode, payment term, ...)
     *
     *   @param		TCPDF		$pdf     		Object PDF
     *   @param		Facture		$object			Object to show
     *   @param		int			$posy			Y
     *   @param		Translate	$outputlangs	Langs object
     *   @param  	Translate	$outputlangsbis	Object lang for output bis
     *   @return	int							Pos y
     */
    protected function drawInfoTable(&$pdf, $object, $posy, $outputlangs, $outputlangsbis)
    {
    }
    /**
     *  Show total to pay
     *
     *  @param	TCPDF		$pdf            Object PDF
     *	@param  Facture		$object         Object invoice
     *	@param  int			$deja_regle     Amount already paid (in the currency of invoice)
     *	@param	int			$posy			Position depart
     *	@param	Translate	$outputlangs	Objet langs
     *  @param  Translate	$outputlangsbis	Object lang for output bis
     *	@return int							Position pour suite
     */
    protected function drawTotalTable(&$pdf, $object, $deja_regle, $posy, $outputlangs, $outputlangsbis)
    {
    }
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   Show table for lines
     *
     *   @param		TCPDF		$pdf     		Object PDF
     *   @param		string		$tab_top		Top position of table
     *   @param		string		$tab_height		Height of table (rectangle)
     *   @param		int			$nexY			Y (not used)
     *   @param		Translate	$outputlangs	Langs object
     *   @param		int			$hidetop		1=Hide top bar of array and title, 0=Hide nothing, -1=Hide only title
     *   @param		int			$hidebottom		Hide bottom bar of array
     *   @param		string		$currency		Currency code
     *   @param		Translate	$outputlangsbis	Langs object bis
     *   @return	void
     */
    protected function _tableau(&$pdf, $tab_top, $tab_height, $nexY, $outputlangs, $hidetop = 0, $hidebottom = 0, $currency = '', $outputlangsbis = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page. This include the logo, ref and address blocs
     *
     *  @param	TCPDF		$pdf     		Object PDF
     *  @param  Facture		$object     	Object to show
     *  @param  int	    	$showaddress    0=no, 1=yes (usually set to 1 for first page, and 0 for next pages)
     *  @param  Translate	$outputlangs	Object lang for output
     *  @param  Translate	$outputlangsbis	Object lang for output bis
     *  @return	array							top shift of linked object lines
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs, $outputlangsbis = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   	Show footer of page. Need this->emetteur object
     *
     *   	@param	TCPDF		$pdf     			PDF
     * 		@param	Facture		$object				Object to show
     *      @param	Translate	$outputlangs		Object lang for output
     *      @param	int			$hidefreetext		1=Hide free text
     *      @param	int			$heightforqrinvoice	Height for QR invoices
     *      @return	int								Return height of bottom margin including footer text
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0, $heightforqrinvoice = 0)
    {
    }
    /**
     *  Define Array Column Field
     *
     *  @param	Facture		   $object    		common object
     *  @param	Translate	   $outputlangs     langs
     *  @param	int			   $hidedetails		Do not show line details
     *  @param	int			   $hidedesc		Do not show desc
     *  @param	int			   $hideref			Do not show ref
     *  @return	void
     */
    public function defineColumnField($object, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
}