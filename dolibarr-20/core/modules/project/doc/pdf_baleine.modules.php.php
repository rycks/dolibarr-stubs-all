<?php

/**
 *	Class to manage generation of project document Baleine
 */
class pdf_baleine extends \ModelePDFProjects
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
     * @var int posxdatestart
     */
    public $posxdatestart;
    /**
     * @var int posxdateend
     */
    public $posxdateend;
    /**
     * Dolibarr version of the loaded document
     * @var string
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
     *  Function to build pdf project onto disk
     *
     *	@param	Project		$object   		Object project a generer
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
     *   @param		float|int	$tab_top		Top position of table
     *   @param		float|int	$tab_height		Height of table (rectangle)
     *   @param		int			$nexY			Y
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
     *  @param  Project		$object     	Object to show
     *  @param  int	    	$showaddress    0=no, 1=yes
     *  @param  Translate	$outputlangs	Object lang for output
     *  @return	float|int                   Return topshift value
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show footer of page. Need this->emetteur object
     *
     *  @param	TCPDF		$pdf     			PDF
     *  @param	Project		$object				Object to show
     *  @param	Translate	$outputlangs		Object lang for output
     *  @param	int			$hidefreetext		1=Hide free text
     *  @return	integer
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
}