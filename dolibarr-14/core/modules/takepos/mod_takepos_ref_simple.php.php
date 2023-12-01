<?php

/**
 *	Class to manage ref numbering of takepos cards with rule Simple.
 */
class mod_takepos_ref_simple extends \ModeleNumRefTakepos
{
    /**
     * Dolibarr version of the loaded document 'development', 'experimental', 'dolibarr'
     * @var string
     */
    public $version = 'dolibarr';
    /**
     * Prefix
     * @var string
     */
    public $prefix = 'TC';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * Name
     * @var string
     */
    public $nom = 'Simple';
    /**
     *  Return description of numbering module
     *
     * @return     string      Text with description
     */
    public function info()
    {
    }
    /**
     *  Return an example of numbering module values
     *
     * @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Test si les numeros deja en vigueur dans la base ne provoquent pas de
     *  de conflits qui empechera cette numerotation de fonctionner.
     *
     * @return     boolean     false si conflit, true si ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Return next value
     *
     * @param   Societe     $objsoc     Object third party
     * @param   Facture		$invoice	Object invoice
     * @param   string		$mode       'next' for next value or 'last' for last value
     * @return  string      Next value
     */
    public function getNextValue($objsoc = \null, $invoice = \null, $mode = 'next')
    {
    }
    /**
     *  Return next free value
     *
     * @param       Societe     $objsoc         Object third party
     * @param       Object      $objforref      Object for number to search
     * @return      string      Next free value
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}