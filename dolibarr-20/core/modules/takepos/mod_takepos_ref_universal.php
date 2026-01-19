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
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
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
     * @return  string|0                Next value if OK, 0 if KO
     */
    public function getNextValue($objsoc = \null, $invoice = \null, $mode = 'next')
    {
    }
    /**
     * Return next free value
     *
     * @param   Societe     $objsoc         Object third party
     * @param   Facture     $objforref      Object for number to search
     * @return  string      Next free value
     * @deprecated see getNextValue
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}