<?php

/**
 *	Class to generate PDF orders with template Eagle
 */
class pdf_eagle_proforma extends \ModelePDFStockTransfer
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
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
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
     *	Function to build pdf onto disk
     *
     *	@param		StockTransfer	$object				Object StockTransfer to generate (or id if old method)
     *	@param		Translate		$outputlangs		Lang output object
     *  @param		string			$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int<0,1>		$hidedetails		Do not show line details
     *  @param		int<0,1>		$hidedesc			Do not show desc
     *  @param		int<0,1>		$hideref			Do not show ref
     *  @return     int<-1,1>      	    				1=OK, 0=KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     *   Show miscellaneous information (payment mode, payment term, ...)
     *
     *   @param		TCPDF			$pdf     		Object PDF
     *   @param		StockTransfer	$object			Object to show
     *   @param		int				$posy			Y
     *   @param		Translate		$outputlangs	Langs object
     *   @return	int								Pos y
     */
    protected function drawInfoTable(&$pdf, $object, $posy, $outputlangs)
    {
    }
    /**
     *	Show total to pay
     *
     *	@param	TCPDF		$pdf            Object PDF
     *	@param  StockTransfer	$object     Object StockTransfer
     *	@param  float		$deja_regle     Montant deja regle
     *	@param	float		$posy			Position depart
     *	@param	Translate	$outputlangs	Object langs
     *	@return float						Position pour suite
     */
    protected function drawTotalTable(&$pdf, $object, $deja_regle, $posy, $outputlangs)
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page.
     *
     *  @param	TCPDF			$pdf     		Object PDF
     *  @param  StockTransfer	$object     	Object to show
     *  @param  int<0,1>		$showaddress    0=no, 1=yes
     *  @param  Translate		$outputlangs	Object lang for output
     *  @param	string			$titlekey		Translation key to show as title of document
     *  @return	float|int                   Return topshift value
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs, $titlekey = "StockTransferSheetProforma")
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   	Show footer of page. Need this->emetteur object
     *
     *   	@param	TCPDF			$pdf     			PDF
     * 		@param	StockTransfer	$object				Object to show
     *      @param	Translate		$outputlangs		Object lang for output
     *      @param	int				$hidefreetext		1=Hide free text
     *      @return	int									Return height of bottom margin including footer text
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
    /**
     *   	Define Array Column Field
     *
     *   	@param	CommonObject	$object    		common object
     *   	@param	Translate		$outputlangs    langs
     *      @param	int				$hidedetails	Do not show line details
     *      @param	int				$hidedesc		Do not show desc
     *      @param	int				$hideref		Do not show ref
     *      @return	void
     */
    public function defineColumnField($object, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
}