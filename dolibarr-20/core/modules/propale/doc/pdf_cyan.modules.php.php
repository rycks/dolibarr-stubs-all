<?php

/**
 *	Class to generate PDF proposal Cyan
 */
class pdf_cyan extends \ModelePDFPropales
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
     * @var int    Save the name of generated file as the main doc when generating a doc with this template
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
     * @var array<string,array{rank:int,width:float|int,title:array{textkey:string,label:string,align:string,padding:array{0:float,1:float,2:float,3:float}},content:array{align:string,padding:array{0:float,1:float,2:float,3:float}}}>	Array of columns
     */
    public $cols;
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
     *  @param		Propal		$object				Object to generate
     *  @param		Translate	$outputlangs		Lang output object
     *  @param		string		$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int			$hidedetails		Do not show line details
     *  @param		int			$hidedesc			Do not show desc
     *  @param		int			$hideref			Do not show ref
     *  @return     int             				1=OK, 0=KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     *   Show miscellaneous information (payment mode, payment term, ...)
     *
     *   @param		TCPDF		$pdf     		Object PDF
     *   @param		Propal		$object			Object to show
     *   @param		int			$posy			Y
     *   @param		Translate	$outputlangs	Langs object
     *   @return	int							Pos y
     */
    public function drawInfoTable(&$pdf, $object, $posy, $outputlangs)
    {
    }
    /**
     *	Show total to pay
     *
     *	@param	TCPDF		$pdf            Object PDF
     *	@param  Propal		$object         Object proposal
     *	@param  int			$deja_regle     Amount already paid (in the currency of invoice)
     *	@param	int			$posy			Position depart
     *	@param	Translate	$outputlangs	Object langs
     *  @param  Translate	$outputlangsbis	Object lang for output bis
     *	@return int							Position pour suite
     */
    protected function drawTotalTable(&$pdf, $object, $deja_regle, $posy, $outputlangs, $outputlangsbis = \null)
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
     *   @param		Translate	$outputlangsbis	Langs object bis
     *   @return	void
     */
    protected function _tableau(&$pdf, $tab_top, $tab_height, $nexY, $outputlangs, $hidetop = 0, $hidebottom = 0, $currency = '', $outputlangsbis = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page.
     *
     *  @param	TCPDF		$pdf     		Object PDF
     *  @param  Propal		$object     	Object to show
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
     * 		@param	Propal		$object				Object to show
     *      @param	Translate	$outputlangs		Object lang for output
     *      @param	int			$hidefreetext		1=Hide free text
     *      @return	int								Return height of bottom margin including footer text
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
    /**
     *	Show area for the customer to sign
     *
     *	@param	TCPDF		$pdf            Object PDF
     *	@param  Propal		$object         Object proposal
     *	@param	int			$posy			Position depart
     *	@param	Translate	$outputlangs	Object langs
     *	@return int							Position pour suite
     */
    protected function drawSignatureArea(&$pdf, $object, $posy, $outputlangs)
    {
    }
    /**
     *   	Define Array Column Field
     *
     *   	@param	Propal			$object			object proposal
     *   	@param	Translate		$outputlangs	langs
     *      @param	int				$hidedetails	Do not show line details
     *      @param	int				$hidedesc		Do not show desc
     *      @param	int				$hideref		Do not show ref
     *      @return	void
     */
    public function defineColumnField($object, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
}