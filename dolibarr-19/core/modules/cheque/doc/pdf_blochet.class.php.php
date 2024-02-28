<?php

/**
 *	Class of file to build cheque deposit receipts
 */
class BordereauChequeBlochet extends \ModeleChequeReceipts
{
    /**
     * @var int tab_top
     */
    public $tab_top;
    /**
     * @var int tab_height
     */
    public $tab_height;
    /**
     * @var int line_height
     */
    public $line_height;
    /**
     * @var int line per page
     */
    public $line_per_page;
    /**
     * @var Account bank account
     */
    public $account;
    public $amount;
    public $date;
    public $nbcheque;
    public $ref;
    public $ref_ext;
    /**
     * @var array lines
     */
    public $lines;
    /**
     *	Constructor
     *
     *	@param	DoliDB	$db		Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Fonction to generate document on disk
     *
     *	@param	RemiseCheque	$object			Object RemiseCheque
     *	@param	string			$_dir			Directory
     *	@param	string			$number			Number
     *	@param	Translate		$outputlangs	Lang output object
     *	@return	int     						1=ok, 0=ko
     */
    public function write_file($object, $_dir, $number, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Generate Header
     *
     *	@param  TCPDF		$pdf        	Pdf object
     *	@param  int			$page        	Current page number
     *	@param  int			$pages       	Total number of pages
     *	@param	Translate	$outputlangs	Object language for output
     *	@return	void
     */
    public function Header(&$pdf, $page, $pages, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Output array
     *
     *	@param	TCPDF		$pdf			PDF object
     *	@param	int			$pagenb			Page nb
     *	@param	int			$pages			Pages
     *	@param	Translate	$outputlangs	Object lang
     *	@return	void
     */
    public function Body(&$pdf, $pagenb, $pages, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show footer of page. Need this->emetteur object
     *
     *  @param	TCPDF		$pdf     			PDF
     *  @param	Object		$object				Object to show
     *  @param	Translate	$outputlangs		Object lang for output
     *  @param	int			$hidefreetext		1=Hide free text
     *  @return	mixed
     */
    protected function _pagefoot(&$pdf, $object, $outputlangs, $hidefreetext = 0)
    {
    }
}