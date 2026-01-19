<?php

/**
 *  \class      mod_facture_terre
 *  \brief      Class of numbering module Terre for invoices
 */
class mod_facture_terre extends \ModeleNumRefFactures
{
    /**
     * Dolibarr version of the loaded document 'development', 'experimental', 'dolibarr'
     * @var string
     */
    public $version = 'dolibarr';
    /**
     * Prefix for invoices
     * @var string
     */
    public $prefixinvoice = 'FA';
    /**
     * Prefix for replacement invoices
     * @var string
     */
    public $prefixreplacement = 'FA';
    /**
     * Prefix for credit note
     * @var string
     */
    public $prefixcreditnote = 'AV';
    /**
     * Prefix for deposit
     * @var string
     */
    public $prefixdeposit = 'AC';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * Constructor
     */
    public function __construct()
    {
    }
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
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *  @param  Object		$object		Object we need next value for
     *  @return boolean     			false if conflict, true if ok
     */
    public function canBeActivated($object)
    {
    }
    /**
     * Return next value not used or last value used.
     * Note to increase perf of this numbering engine, you can create a calculated column and modify request to use this field instead for select:
     * ALTER TABLE llx_facture ADD COLUMN calculated_numrefonly INTEGER AS (CASE SUBSTRING(ref FROM 1 FOR 2) WHEN 'FA' THEN CAST(SUBSTRING(ref FROM 10) AS SIGNED) ELSE 0 END) PERSISTENT;
     * ALTER TABLE llx_facture ADD INDEX calculated_numrefonly_idx (calculated_numrefonly);
     *
     * @param   Societe		$objsoc		Object third party
     * @param   Facture		$invoice	Object invoice
     * @param   string		$mode       'next' for next value or 'last' for last value
     * @return  string       			Next ref value or last ref if $mode is 'last', <= 0 if KO
     */
    public function getNextValue($objsoc, $invoice, $mode = 'next')
    {
    }
    /**
     *  Return next free value
     *
     *  @param  Societe     $objsoc         Object third party
     *  @param  string      $objforref      Object for number to search
     *  @param   string     $mode           'next' for next value or 'last' for last value
     *  @return  string                     Next free value
     */
    public function getNumRef($objsoc, $objforref, $mode = 'next')
    {
    }
}