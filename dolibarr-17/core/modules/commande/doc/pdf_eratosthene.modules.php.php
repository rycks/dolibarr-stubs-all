<?php

/**
 *	Class to generate PDF orders with template Eratosthene
 */
class pdf_eratosthene extends \ModelePDFCommandes
{
    /**
     * @var DoliDb Database handler
     */
    public $db;
    /**
     * @var int The environment ID when using a multicompany module
     */
    public $entity;
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
     * @var array Minimum version of PHP required by module.
     * e.g.: PHP ≥ 7.0 = array(7, 0)
     */
    public $phpmin = array(7, 0);
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    /**
     * @var int page_largeur
     */
    public $page_largeur;
    /**
     * @var int page_hauteur
     */
    public $page_hauteur;
    /**
     * @var array format
     */
    public $format;
    /**
     * @var int marge_gauche
     */
    public $marge_gauche;
    /**
     * @var int marge_droite
     */
    public $marge_droite;
    /**
     * @var int marge_haute
     */
    public $marge_haute;
    /**
     * @var int marge_basse
     */
    public $marge_basse;
    /**
     * Issuer
     * @var Societe	Object that emits
     */
    public $emetteur;
    /**
     * @var array of document table columns
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
     *  @param		Commande	$object				Object to generate
     *  @param		Translate	$outputlangs		Lang output object
     *  @param		string		$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int			$hidedetails		Do not show line details
     *  @param		int			$hidedesc			Do not show desc
     *  @param		int			$hideref			Do not show ref
     *  @return     int             			    1=OK, 0=KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    /**
     *  Show payments table
     *
     *  @param	TCPDF		$pdf     		Object PDF
     *  @param  Commande	$object			Object order
     *	@param	int			$posy			Position y in PDF
     *	@param	Translate	$outputlangs	Object langs for output
     *	@return int							<0 if KO, >0 if OK
     */
    protected function drawPaymentsTable(&$pdf, $object, $posy, $outputlangs)
    {
    }
    /**
     *   Show miscellaneous information (payment mode, payment term, ...)
     *
     *   @param		TCPDF		$pdf     		Object PDF
     *   @param		Commande	$object			Object to show
     *   @param		int			$posy			Y
     *   @param		Translate	$outputlangs	Langs object
     *   @return	int							Pos y
     */
    protected function drawInfoTable(&$pdf, $object, $posy, $outputlangs)
    {
    }
    /**
     *	Show total to pay
     *
     *	@param	TCPDF		$pdf            Object PDF
     *	@param  Commande	$object         Object to show
     *	@param  int			$deja_regle     Montant deja regle
     *	@param	int			$posy			Position depart
     *	@param	Translate	$outputlangs	Objet langs
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page.
     *
     *  @param	TCPDF		$pdf     		Object PDF
     *  @param  Commande	$object     	Object to show
     *  @param  int	    	$showaddress    0=no, 1=yes
     *  @param  Translate	$outputlangs	Object lang for output
     *  @param  Translate	$outputlangsbis	Object lang for output bis
     *  @param	string		$titlekey		Translation key to show as title of document
     *  @return	int                         Return topshift value
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs, $outputlangsbis = \null, $titlekey = "PdfOrderTitle")
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   	Show footer of page. Need this->emetteur object
     *
     *   	@param	TCPDF		$pdf     			PDF
     * 		@param	Commande	$object				Object to show
     *      @param	Translate	$outputlangs		Object lang for output
     *      @param	int			$hidefreetext		1=Hide free text
     *      @return	int								Return height of bottom margin including footer text
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
    /**
     *   	Define Array Column Field
     *
     *   	@param	Commande		$object    		common object
     *   	@param	Translate		$outputlangs    langs
     *      @param	int				$hidedetails	Do not show line details
     *      @param	int				$hidedesc		Do not show desc
     *      @param	int				$hideref		Do not show ref
     *      @return	null
     */
    public function defineColumnField($object, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
}