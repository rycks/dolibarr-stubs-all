<?php

/**
 *	Class to build sending documents with model Espadon
 */
class pdf_ledger extends \ModelePdfAccountancy
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
     * @var int     Save the name of generated file as the main doc when generating a doc with this template
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
     * @var int $fromDate Start timestamp
     */
    public $fromDate;
    /**
     * @var int $toDate Start timestamp
     */
    public $toDate;
    /**
     * @var string $ledgerType Ledger type, default is empty for general ledger, or 'sub' for subsidiary ledger
     */
    public $ledgerType;
    /**
     *	Constructor
     *
     *	@param	DoliDB	$db		Database handler
     */
    public function __construct(\DoliDB $db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     * Function to build pdf onto disk
     *
     * @param BookKeeping $object Object shipping to generate (or id if old method)
     * @param Translate $outputlangs Lang output object
     * @param string $srctemplatepath Source template path
     * @param bool $directDownload Send generated file to browser
     * @return        int<-1,1>                        1 if OK, <=0 if KO
     */
    public function write_file(\BookKeeping $object, \Translate $outputlangs, string $srctemplatepath = '', bool $directDownload = \true)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Show table for lines
     *
     * @param	TCPDF		$pdf     		Object PDF
     * @param	float|int	$tab_top		Top position of table
     * @param	float|int	$tab_height		Height of table (rectangle)
     * @param	float		$nexY			Y
     * @param	Translate	$outputlangs	Langs object
     * @param	int			$hidetop		Hide top bar of array
     * @param	int			$hidebottom		Hide bottom bar of array
     * @param	string		$currency		Currency code
     * @param	Translate	$outputlangsbis	Langs object bis
     * @return	void
     */
    protected function _tableau(&$pdf, $tab_top, $tab_height, $nexY, $outputlangs, $hidetop = 0, $hidebottom = 0, $currency = '', $outputlangsbis = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Show top header of page.
     *
     * @param	TCPDF		$pdf     		Object PDF
     * @param  BookKeeping	$object     	Object to show
     * @param  int<0,1>  	$showaddress    0=no, 1=yes
     * @param  Translate	$outputlangs	Object lang for output
     * @return	float|int                   Return topshift value
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     * Show footer of page. Need this->emetteur object
     *
     * @param	TCPDF		$pdf     			PDF
     * @param	BookKeeping	$object				Object to show
     * @param	Translate	$outputlangs		Object lang for output
     * @param	int			$hidefreetext		1=Hide free text
     * @return	int								Return height of bottom margin including footer text
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
    /**
     * Define Array Column Field
     *
     * @param	BookKeeping	   $object    	    common object
     * @param	Translate	   $outputlangs     langs
     * @param	int			   $hidedetails		Do not show line details
     * @param	int			   $hidedesc		Do not show desc
     * @param	int			   $hideref			Do not show ref
     * @return	void
     */
    public function defineColumnField($object, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     * Add a total line to pdf
     *
     * @param TCPDF 			$pdf 				TCPDF object
     * @param float 			$curY 				Current line Y
     * @param float 			$nexY 				Next line Y
     * @param int|float 		$default_font_size 	Default font size
     * @param string 			$label 				Line label
     * @param int|float 		$tab_top_newpage	Table top
     * @param int|float|string 	$debit				Debit
     * @param int|float|string 	$credit				Credit
     * @param bool 				$uppercase			Apply uppercase ?
     * @return void
     */
    protected function addTotalLine(\TCPDF $pdf, &$curY, &$nexY, $default_font_size, string $label, $tab_top_newpage, $debit, $credit, bool $uppercase = \true)
    {
    }
}