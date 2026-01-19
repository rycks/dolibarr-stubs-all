<?php

/**
 *	Class to generate PDF orders with template Proforma
 */
class pdf_proforma extends \pdf_eratosthene
{
    /**
     *	Constructor
     *
     *  @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.PublicUnderscore
    /**
     *  Show top header of page.
     *
     *  @param	TCPDF		$pdf     		Object PDF
     *  @param  Object		$object     	Object to show
     *  @param  int	    	$showaddress    0=no, 1=yes
     *  @param  Translate	$outputlangs	Object lang for output
     *  @param	string		$titlekey		Translation key to show as title of document
     *  @return	int                         Return topshift value
     */
    protected function _pagehead(&$pdf, $object, $showaddress, $outputlangs, $titlekey = "InvoiceProForma")
    {
    }
}