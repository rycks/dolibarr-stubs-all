<?php

/**
 *	Class to manage ref numbering of takepos cards with rule universal.
 */
class mod_takepos_ref_universal extends \ModeleNumRefTakepos
{
    /**
     * Dolibarr version of the loaded document 'development', 'experimental', 'dolibarr'
     * @var string
     */
    public $version = 'dolibarr';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * Name
     * @var string
     */
    public $nom = 'Universal';
    /**
     *  return description of the numbering model
     *
     * @return     string      Descriptive text
     */
    public function info()
    {
    }
    /**
     * Return an example of numbering
     *
     * @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     * Return next free value
     *
     * @param   Societe     $objsoc     Object thirdparty
     * @param   Facture		$invoice	Object invoice
     * @param   string		$mode       'next' for next value or 'last' for last value
     * @return  string      Value if KO, <0 if KO
     */
    public function getNextValue($objsoc = \null, $invoice = \null, $mode = 'next')
    {
    }
    /**
     * Return next free value
     *
     * @param   Societe     $objsoc         Object third party
     * @param   Object      $objforref      Object for number to search
     * @return  string      Next free value
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}