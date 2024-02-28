<?php

/**
 *		Class to manage accountancy code of thirdparties with Panicum rules
 */
class mod_codecompta_panicum extends \ModeleAccountancyCode
{
    /**
     * @var string Nom du modele
     * @deprecated
     * @see name
     */
    public $nom = 'Panicum';
    /**
     * @var string model name
     */
    public $name = 'Panicum';
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * 	Constructor
     */
    public function __construct()
    {
    }
    /**
     * Return description of module
     *
     * @param	Translate	$langs	Object langs
     * @return 	string      		Description of module
     */
    public function info($langs)
    {
    }
    /**
     *  Return an example of result returned by getNextValue
     *
     *  @param	Translate	$langs		Object langs
     *  @param	Societe		$objsoc		Object thirdparty
     *  @param	int			$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     *  @return	string					Example
     */
    public function getExample($langs, $objsoc = 0, $type = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set accountancy account code for a third party into this->code
     *
     *  @param	DoliDB	$db              Database handler
     *  @param  Societe	$societe         Third party object
     *  @param  int		$type			'customer' or 'supplier'
     *  @return	int						>=0 if OK, <0 if KO
     */
    public function get_code($db, $societe, $type = '')
    {
    }
}