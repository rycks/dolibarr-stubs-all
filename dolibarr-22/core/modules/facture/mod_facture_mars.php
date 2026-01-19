<?php

/**
 * 	Class to manage invoice numbering rules Mars
 */
class mod_facture_mars extends \ModeleNumRefFactures
{
    /**
     * @var string Sub-module name
     */
    public $name = 'Mars';
    /**
     * @var int		Position
     */
    public $position = 30;
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefixinvoice = 'FA';
    public $prefixreplacement = 'FR';
    public $prefixdeposit = 'AC';
    public $prefixcreditnote = 'AV';
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
     *  @param  CommonObject	$object		Object we need next value for
     *  @return boolean     				false if conflict, true if ok
     */
    public function canBeActivated($object)
    {
    }
    /**
     * Return next value not used or last value used
     *
     * @param	Societe		$objsoc		Object third party
     * @param   ?Facture	$invoice	Object invoice
     * @param   string		$mode		'next' for next value or 'last' for last value
     * @return  string|int<-1,0>		Value if OK, <=0 if KO
     */
    public function getNextValue($objsoc, $invoice, $mode = 'next')
    {
    }
    /**
     *  Return next free value
     *
     *  @param  Societe     $objsoc         Object third party
     *  @param  Facture     $objforref      Object for number to search
     *  @param  string      $mode           'next' for next value or 'last' for last value
     *  @return string                      Next free value
     *  @deprecated see getNextValue
     */
    public function getNumRef($objsoc, $objforref, $mode = 'next')
    {
    }
}