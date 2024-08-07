<?php

/**
 *	Class of numbering module Mercure for invoices
 */
class mod_facture_mercure extends \ModeleNumRefFactures
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Error message
     */
    public $error = '';
    /**
     *  Returns the description of the numbering model
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     *  Return an example of number value
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     * Return next value
     *
     * @param	Societe		$objsoc     Object third party
     * @param   Facture		$invoice	Object invoice
     * @param   string		$mode       'next' for next value or 'last' for last value
     * @return  string|0      			Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $invoice, $mode = 'next')
    {
    }
    /**
     * Return next free value
     *
     * @param	Societe		$objsoc     	Object third party
     * @param	Facture		$objforref		Object for number to search
     * @param   string		$mode       	'next' for next value or 'last' for last value
     * @return  string|0      				Next free value, 0 if KO
     * @deprecated see getNextValue
     */
    public function getNumRef($objsoc, $objforref, $mode = 'next')
    {
    }
}