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
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     * Return an example of numbering module values
     *
     * @return     string      Example.
     */
    public function getExample()
    {
    }
    /**
     *  Test if the numbers already in the database do not cause any conflicts that will prevent this
     *  of conflicts that will prevent this numbering from working.
     *
     *	@param	CommonObject	$object		Object we need next value for
     *  @return boolean     				false if KO (there is a conflict), true if OK
     */
    public function canBeActivated($object)
    {
    }
    /**
     * Return next value.
     * Note to increase perf of this numbering engine:
     * ALTER TABLE llx_facture ADD COLUMN calculated_numrefonly INTEGER AS (CASE SUBSTRING(ref FROM 1 FOR 2) WHEN 'TC' THEN CAST(SUBSTRING(ref FROM 10) AS SIGNED) ELSE 0 END) PERSISTENT;
     * ALTER TABLE llx_facture ADD INDEX calculated_numrefonly_idx (calculated_numrefonly);
     *
     * @param   Societe     $objsoc     Object third party
     * @param   Facture		$invoice	Object invoice
     * @param   string		$mode       'next' for next value or 'last' for last value
     * @return  string|int     			Next ref value or last ref if $mode is 'last'
     */
    public function getNextValue($objsoc = \null, $invoice = \null, $mode = 'next')
    {
    }
    /**
     *  Return next free value
     *
     * @param       Societe     $objsoc         Object third party
     * @param       Facture     $objforref      Object for number to search
     * @return      string      Next free value
     * @deprecated see getNextValue
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}