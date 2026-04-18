<?php

/**
 *		Class to manage accountancy code of thirdparties with Panicum rules
 */
class mod_codecompta_panicum extends \ModeleAccountancyCode
{
    /**
     * @var string model name
     */
    public $name = 'Panicum';
    /**
     * @var string
     */
    public $code;
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var int
     */
    public $position = 10;
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
     * Return an example of result returned by getNextValue
     *
     * @param	?Translate		$langs		Object langs
     * @param	Societe|string	$objsoc		Object thirdparty
     * @param	int<-1,2>		$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string						Return string example
     */
    public function getExample($langs = \null, $objsoc = '', $type = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set accountancy account code for a third party into this->code
     *
     *  @param	DoliDB		$db         Database handler
     *  @param  ?Societe	$societe	Third party object
     *  @param  'customer'|'supplier'|''	$type	'customer' or 'supplier'
     *  @return	int						>=0 if OK, <0 if KO
     */
    public function get_code($db, $societe, $type = '')
    {
    }
}