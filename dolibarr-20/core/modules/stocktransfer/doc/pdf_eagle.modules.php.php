<?php

/**
 *	Class to build sending documents with model Eagle
 */
class pdf_eagle extends \ModelePDFStockTransfer
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
     * @var string document type
     */
    public $type;
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    /**
     * @var int posx lot
     */
    public $posxlot;
    /**
     * @var int posx weightvol
     */
    public $posxweightvol;
    /**
     * @var int posx warehousesource
     */
    public $posxwarehousesource;
    /**
     * @var int posx warehousedestination
     */
    public $posxwarehousedestination;
    /**
     * @var bool        True if at least one line of the StockTransfer object has a batch set.
     *                  Populated by $pdf_eagle->atLeastOneBatch()
     * @see atLeastOneBatch()
     */
    public $atLeastOneBatch;
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
     *	Function to build pdf onto disk
     *
     *	@param		StockTransfer	$object				Object StockTransfer to generate (or id if old method)
     *	@param		Translate		$outputlangs		Lang output object
     *  @param		string			$srctemplatepath	Full path of source filename for generator using a template file
     *  @param		int				$hidedetails		Do not show line details
     *  @param		int				$hidedesc			Do not show desc
     *  @param		int				$hideref			Do not show ref
     *  @return     int         	    				1=OK, 0=KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Show total to pay
     *
     *	@param	TCPDF			$pdf            Object PDF
     *	@param  StockTransfer	$object         Object StockTransfer
     *	@param  int				$deja_regle     Amount already paid
     *	@param	int				$posy			Start Position
     *	@param	Translate		$outputlangs	Object langs
     *	@return int								Position for suite
     */
    protected function _tableau_tot(&$pdf, $object, $deja_regle, $posy, $outputlangs)
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
    /**
     * Used to know if at least one line of Stock Transfer object has a batch set
     *
     * @param	StockTransfer	$object	Stock Transfer object
     * @return	boolean			true if at least one line has batch set, false if not
     */
    public function atLeastOneBatch($object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page.
     *
     *  @param	TCPDF			$pdf     		Object PDF
     *  @param  StockTransfer	$object     	Object to show
     *  @param  int	    		$showaddress    0=no, 1=yes
     *  @param  Translate		$outputlangs	Object lang for output
     *  @return	float|int                   	Return topshift value
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show footer of page. Need this->emetteur object
     *
     *  @param	TCPDF			$pdf     			PDF
     *  @param	StockTransfer	$object				Object to show
     *  @param	Translate		$outputlangs		Object lang for output
     *  @param	int				$hidefreetext		1=Hide free text
     *  @return	int									Return height of bottom margin including footer text
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
}