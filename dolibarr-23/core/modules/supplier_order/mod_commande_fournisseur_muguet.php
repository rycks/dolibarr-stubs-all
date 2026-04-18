<?php

/**
 *	Class du modele de numerotation de reference de commande fournisseur Muguet
 */
class mod_commande_fournisseur_muguet extends \ModeleNumRefSuppliersOrders
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
    public $nom = 'Muguet';
    /**
     * @var string model name
     */
    public $name = 'Muguet';
    /**
     * @var string prefix
     */
    public $prefix = 'PO';
    // PO for "Purchase Order"
    /**
     * Constructor
     */
    public function __construct()
    {
    }
    /**
     * 	Return description of numbering module
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     * 	Return an example of numbering
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
     *	@param	CommonObject	$object		Object we need next value for
     *  @return boolean     				false if KO (there is a conflict), true if OK
     */
    public function canBeActivated($object)
    {
    }
    /**
     * 	Return next value
     *
     *  @param	Societe|string		$objsoc		Object third party
     *  @param  CommandeFournisseur	$object		Object
     *  @return string|int<-1,0>				Value if OK, <=0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}