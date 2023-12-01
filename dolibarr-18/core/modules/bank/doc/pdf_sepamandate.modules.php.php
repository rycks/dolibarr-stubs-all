<?php

/**
 *	Class to generate SEPA mandate
 */
class pdf_sepamandate extends \ModeleBankAccountDoc
{
    /**
     * Issuer
     * @var Societe
     */
    public $emetteur;
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
     *  Function to create pdf of company bank account sepa mandate
     *
     *	@param	CompanyBankAccount	$object   		    Object bank account to generate document for
     *	@param	Translate			$outputlangs	    Lang output object
     *  @param	string				$srctemplatepath	Full path of source filename for generator using a template file
     *  @param	int					$hidedetails		Do not show line details (not used for this template)
     *  @param	int					$hidedesc			Do not show desc (not used for this template)
     *  @param	int					$hideref			Do not show ref (not used for this template)
     *  @param  null|array  		$moreparams         More parameters
     *	@return	int         				    		1 if OK, <=0 if KO
     */
    public function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0, $moreparams = \null)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *   Show table for lines
     *
     *   @param		TCPDF		$pdf     		Object PDF
     *   @param		string		$tab_top		Top position of table
     *   @param		string		$tab_height		Height of table (rectangle)
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Show miscellaneous information (payment mode, payment term, ...)
     *
     *   @param		TCPDF				$pdf     		Object PDF
     *   @param		CompanyBankAccount	$object			Object to show
     *   @param		int					$posy			Y
     *   @param		Translate			$outputlangs	Langs object
     *   @return	float
     */
    protected function _tableau_info(&$pdf, $object, $posy, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Show area for the customer to sign
     *
     *	@param	TCPDF				$pdf           	Object PDF
     *	@param  CompanyBankAccount	$object         Object invoice
     *	@param	int					$posy			Position depart
     *	@param	Translate			$outputlangs	Objet langs
     *	@return int									Position pour suite
     */
    protected function _signature_area(&$pdf, $object, $posy, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page.
     *
     *  @param	TCPDF				$pdf     		Object PDF
     *  @param  CompanyBankAccount	$object     	Object to show
     *  @param  int	    			$showaddress    0=no, 1=yes
     *  @param  Translate			$outputlangs	Object lang for output
     *  @return	void
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *	Show footer of page. Need this->emetteur object
     *
     *	@param	TCPDF				$pdf     			PDF
     * 	@param	CompanyBankAccount	$object				Object to show
     * 	@param	Translate			$outputlangs		Object lang for output
     *	@param	int					$hidefreetext		1=Hide free text
     *	@return	integer
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
}