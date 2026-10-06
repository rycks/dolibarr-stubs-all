<?php

/**
 *	Class permettant de generer les projects au modele Ban
 */
class pdf_ban extends \ModeleBankAccountDoc
{
    /**
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental' Dolibarr version of the loaded document
     */
    public $version = 'development';
    /**
     * @var int posxdatestart
     */
    public $posxdatestart;
    /**
     * @var int posxdateend
     */
    public $posxdateend;
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
     *	Fonction generant le projet sur le disque
     *
     *	@param	Account		$object   		Object Account to generate
     *	@param	Translate	$outputlangs	Lang output object
     *	@return	int         				1 if OK, <=0 if KO
     */
    public function write_file($object, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   Show table for lines
     *
     *   @param		TCPDF		$pdf     		Object PDF
     *   @param		float		$tab_top		Top position of table
     *   @param		float		$tab_height		Height of table (rectangle)
     *   @param		float		$nexY			Y
     *   @param		Translate	$outputlangs	Langs object
     *   @param		int			$hidetop		Hide top bar of array
     *   @param		int			$hidebottom		Hide bottom bar of array
     *   @return	void
     */
    protected function _tableau(&$pdf, $tab_top, $tab_height, $nexY, $outputlangs, $hidetop = 0, $hidebottom = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page.
     *
     *  @param	TCPDF		$pdf     		Object PDF
     *  @param  Account		$object     	Object to show
     *  @param  int	    	$showaddress    0=no, 1=yes
     *  @param  Translate	$outputlangs	Object lang for output
     *  @return	float|int                   Return topshift value
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   	Show footer of page. Need this->emetteur object
     *
     *   	@param	TCPDF		$pdf     			PDF
     * 		@param	Account		$object				Object to show
     *      @param	Translate	$outputlangs		Object lang for output
     *      @param	int			$hidefreetext		1=Hide free text
     *      @return	integer
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
}