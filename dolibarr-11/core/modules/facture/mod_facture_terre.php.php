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
     *  @return     string      Texte descripif
     */
    public function info()
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
     *  Checks if the numbers already in force in the data base do not
     *  cause conflicts that would prevent this numbering from working.
     *
     *  @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     * Return next value not used or last value used
     *
     * @param   Societe		$objsoc		Object third party
     * @param   Facture		$invoice	Object invoice
     * @param   string		$mode       'next' for next value or 'last' for last value
     * @return  string       			Value
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