<?php

/**
 *	Class to generate the customer invoice PDF with template Crabe
 */
class pdf_crabe extends \ModelePDFFactures
{
    /**
     * @var DoliDB Database handler
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
     * @var int 	Save the name of generated file as the main doc when generating a doc with this template
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
     * @var bool Situation invoice type
     */
    public $situationinvoice;
    /**
     * @var float X position for the situation progress column
     */
    public $posxprogress;
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show payments table
     *
     *  @param	TCPDF		$pdf            	Object PDF
     *  @param  Facture		$object         	Object invoice
     *  @param  int			$posy           	Position y in PDF
     *  @param  Translate	$outputlangs    	Object langs for output
     *  @param  int			$heightforfooter 	Height for footer
     *  @return int             				Return integer <0 if KO, >0 if OK
     */
    protected function _tableau_versements(&$pdf, $object, $posy, $outputlangs, $heightforfooter = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Function _tableau_versements_header
     *
     * @param TCPDF 		$pdf				Object PDF
     * @param Facture		$object				Object invoice
     * @param Translate		$outputlangs		Object langs for output
     * @param int			$default_font_size	Font size
     * @param int			$tab3_posx			pos x
     * @param int 			$tab3_top			pos y
     * @param int 			$tab3_width			width
     * @param int 			$tab3_height		height
     * @return void
     */
    protected function _tableau_versements_header($pdf, $object, $outputlangs, $default_font_size, $tab3_posx, $tab3_top, $tab3_width, $tab3_height)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
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
    protected function _tableau_info(&$pdf, $object, $posy, $outputlangs, $outputlangsbis)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Show total to pay
     *
     *	@param	TCPDF		$pdf            Object PDF
     *	@param  Facture		$object         Object invoice
     *	@param  int			$deja_regle     Amount already paid (in the currency of invoice)
     *	@param	int			$posy			Position depart
     *	@param	Translate	$outputlangs	Object langs
     *  @param  Translate	$outputlangsbis	Object lang for output bis
     *	@return int							Position pour suite
     */
    protected function _tableau_tot(&$pdf, $object, $deja_regle, $posy, $outputlangs, $outputlangsbis)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   Show table for lines
     *
     *   @param		TCPDF		$pdf     		Object PDF
     *   @param		float|int	$tab_top		Top position of table
     *   @param		float|int	$tab_height		Height of table (rectangle)
     *   @param		int			$nexY			Y (not used)
     *   @param		Translate	$outputlangs	Langs object
     *   @param		int			$hidetop		1=Hide top bar of array and title, 0=Hide nothing, -1=Hide only title
     *   @param		int			$hidebottom		Hide bottom bar of array
     *   @param		string		$currency		Currency code
     *   @return	void
     */
    protected function _tableau(&$pdf, $tab_top, $tab_height, $nexY, $outputlangs, $hidetop = 0, $hidebottom = 0, $currency = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page.
     *
     *  @param	TCPDF		$pdf     		Object PDF
     *  @param  Facture		$object     	Object to show
     *  @param  int	    	$showaddress    0=no, 1=yes
     *  @param  Translate	$outputlangs	Object lang for output
     *  @param  Translate	$outputlangsbis	Object lang for output bis
     *  @return	float|int                   Return topshift value
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
}