<?php

/**
 *  \class      mod_facture_terre
 *  \brief      Classe du modele de numerotation de reference de facture Terre
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
     *  Renvoi la description du modele de numerotation
     *
     *  @return     string      Texte descripif
     */
    public function info()
    {
    }
    /**
     *  Renvoi un exemple de numerotation
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Test si les numeros deja en vigueur dans la base ne provoquent pas de
     *  de conflits qui empechera cette numerotation de fonctionner.
     *
     *  @return     boolean     false si conflit, true si ok
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