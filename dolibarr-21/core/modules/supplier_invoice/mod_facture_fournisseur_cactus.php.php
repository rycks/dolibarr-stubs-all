<?php

/**
 *  Cactus Class of numbering models of suppliers invoices references
 */
class mod_facture_fournisseur_cactus extends \ModeleNumRefSuppliersInvoices
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Cactus';
    /**
     * @var string model name
     */
    public $name = 'Cactus';
    /**
     * @var string
     */
    public $prefixinvoice = 'SI';
    /**
     * @var string
     */
    public $prefixcreditnote = 'SA';
    /**
     * @var string
     */
    public $prefixdeposit = 'SD';
    /**
     *  Return description of numbering model
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     *  Returns a numbering example
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     * 	Tests if the numbers already in the database do not cause conflicts that would prevent this numbering.
     *
     *	@param	CommonObject	$object		Object we need next value for
     *  @return boolean     				false if KO (there is a conflict), true if OK
     */
    public function canBeActivated($object)
    {
    }
    /**
     * Return next value
     *
     * @param	?Societe			$objsoc		Object third party
     * @param  	?FactureFournisseur	$object		Object invoice
     * @param   string				$mode		'next' for next value or 'last' for last value
     * @return 	string|int<-1,0>				Value if OK, -1 if KO
     */
    public function getNextValue($objsoc, $object, $mode = 'next')
    {
    }
    /**
     * Return next free value
     *
     * @param	Societe				$objsoc     	Object third party
     * @param	FactureFournisseur	$objforref		Object for number to search
     * @param   string				$mode      		'next' for next value or 'last' for last value
     * @return  string      						Next free value
     * @deprecated see getNextValue
     */
    public function getNumRef($objsoc, $objforref, $mode = 'next')
    {
    }
}