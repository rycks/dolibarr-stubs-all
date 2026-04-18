<?php

/**
 *	Class to generate the supplier invoices payment file with the standard model
 */
class pdf_standard_supplierpayment extends \ModelePDFSuppliersPayments
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
     * @var float
     */
    public $posxdate;
    /**
     * @var float
     */
    public $posxreffacturefourn;
    /**
     * @var float
     */
    public $posxreffacture;
    /**
     * @var float
     */
    public $posxtype;
    /**
     * @var float
     */
    public $posxtotalht;
    /**
     * @var float
     */
    public $posxtva;
    /**
     * @var float
     */
    public $posxtotalttc;
    /**
     *	Constructor
     *
     *  @param	DoliDB		$db     	Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Function to build pdf onto disk
     *
     *	@param		PaiementFourn	$object				Object source to generate
     *	@param		Translate		$outputlangs		Lang output object
     *	@param		string			$srctemplatepath	Full path of source filename for generator using a template file
     *	@param		int<0,1>		$hidedetails		Do not show line details
     *	@param		int<0,1>		$hidedesc			Do not show desc
     *	@param		int<0,1>		$hideref			Do not show ref
     *	@return		int<-1,1>							1 if OK, <=0 if KO
     */
    public function write_file($object, $outputlangs = \null, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Show total to pay
     *
     *	@param	TCPDF			$pdf			Object PDF
     *	@param  PaiementFourn	$object         Object PaiementFourn
     *	@param	float			$posy			Position depart
     *	@param	Translate		$outputlangs	Object langs
     *	@return float							Position pour suite
     */
    protected function _tableau_cheque(&$pdf, $object, $posy, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   Show table for lines
     *
     *   @param		TCPDF		$pdf     		Object PDF
     *   @param		float		$tab_top		Top position of table
     *   @param		float		$tab_height		Height of table (rectangle)
     *   @param		float		$nexY			Y (not used)
     *   @param		Translate	$outputlangs	Langs object
     *   @param		int			$hidetop		Hide top bar of array
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
     *  @param	TCPDF			$pdf     		Object PDF
     *  @param  PaiementFourn	$object     	Object to show
     *  @param  int	    		$showaddress    0=no, 1=yes
     *  @param  Translate		$outputlangs	Object lang for output
     *  @return	float|int                   	Return topshift value
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   	Show footer of page. Need this->emetteur object
     *
     *   	@param	TCPDF			$pdf     			PDF
     * 		@param	PaiementFourn	$object				Object to show
     *      @param	Translate		$outputlangs		Object lang for output
     *      @param	int				$hidefreetext		1=Hide free text
     *      @return	int									Return height of bottom margin including footer text
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
}