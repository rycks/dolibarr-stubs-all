<?php

/**
 *	Class to manage reporting of payments
 */
class pdf_paiement extends \CommonDocGenerator
{
    public $tab_top;
    public $line_height;
    public $line_per_page;
    public $tab_height;
    public $posxdate;
    public $posxpaymenttype;
    public $posxinvoice;
    public $posxbankaccount;
    public $posxinvoiceamount;
    public $posxpaymentamount;
    public $doc_type;
    /**
     * @var int
     */
    public $year;
    /**
     * @var int
     */
    public $month;
    /**
     *  Constructor
     *
     *  @param      DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Fonction generant la rapport sur le disque
     *
     *	@param	string	$_dir			repertoire
     *	@param	int		$month			mois du rapport
     *	@param	int		$year			annee du rapport
     *	@param	string	$outputlangs	Lang output object
     *	@return	int						Return integer <0 if KO, >0 if OK
     */
    public function write_file($_dir, $month, $year, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page.
     *
     *  @param	TCPDF		$pdf     		Object PDF
     *  @param  int			$page	     	Object to show
     *  @param  int	    	$showaddress    0=no, 1=yes
     *  @param  Translate	$outputlangs	Object lang for output
     *  @return	float|int                   Return topshift value
     */
    protected function _pagehead(&$pdf, $page, $showaddress, $outputlangs)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *	Output body
     *
     *	@param	TCPDF		$pdf			PDF object
     *	@param	string		$page			Page
     *	@param	array		$lines			Array of lines
     *	@param	Translate	$outputlangs	Object langs
     *	@return	void
     */
    public function Body(&$pdf, $page, $lines, $outputlangs)
    {
    }
}