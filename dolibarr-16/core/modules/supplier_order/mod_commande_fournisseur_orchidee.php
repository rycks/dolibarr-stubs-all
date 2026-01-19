<?php

/**
 *	Classe du modele de numerotation de reference de commande fournisseur Orchidee
 */
class mod_commande_fournisseur_orchidee extends \ModeleNumRefSuppliersOrders
{
    /**
     * Dolibarr version of the loaded document
     * @var string
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
     * 	@return     string      Texte descripif
     */
    public function info()
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
     *  Return next value
     *
     *  @param	Societe		$objsoc     Object third party
     *  @param  Object	    $object		Object
     *  @return string      			Value if OK, 0 if KO
     */
    public function getNextValue($objsoc = 0, $object = '')
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoie la reference de commande suivante non utilisee
     *
     *  @param	Societe		$objsoc     Object third party
     *  @param  Object	    $object		Object
     *  @return string      			Texte descripif
     */
    public function commande_get_num($objsoc = 0, $object = '')
    {
    }
}