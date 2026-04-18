<?php

/**
 *	Class providing the 'Orchidee' numbering models for supplier orders
 */
class mod_commande_fournisseur_orchidee extends \ModeleNumRefSuppliersOrders
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
    public $nom = 'Orchidee';
    /**
     * @var string model name
     */
    public $name = 'Orchidee';
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