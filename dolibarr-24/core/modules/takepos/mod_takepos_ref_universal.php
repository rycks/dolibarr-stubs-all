<?php

/**
 *	Class to manage ref numbering of takepos cards with rule universal.
 */
class mod_takepos_ref_universal extends \ModeleNumRefTakepos
{
    /**
     * Dolibarr version of the loaded document 'development', 'experimental', 'dolibarr'
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
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
     * @param	?Societe	$objsoc		Object third party
     * @param	?Facture	$invoice	Object invoice
     * @param	string		$mode		'next' for next value or 'last' for last value
     * @return	string|int<-1,0>		Next ref value or last ref if $mode is 'last'
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