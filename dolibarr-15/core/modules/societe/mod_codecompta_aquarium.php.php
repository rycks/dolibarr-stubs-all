<?php

/**
 *	Class to manage accountancy code of thirdparties with Aquarium rules
 */
class mod_codecompta_aquarium extends \ModeleAccountancyCode
{
    /**
     * @var string model name
     */
    public $name = 'Aquarium';
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefixcustomeraccountancycode;
    public $prefixsupplieraccountancycode;
    public $position = 20;
    /**
     * 	Constructor
     */
    public function __construct()
    {
    }
    /**
     * Return description of module
     *
     * @param	Translate	$langs		Object langs
     * @return	string   		   		Description of module
     */
    public function info($langs)
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     * @param	Translate	$langs		Object langs
     * @param	societe		$objsoc		Object thirdparty
     * @param	int			$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string					Return string example
     */
    public function getExample($langs, $objsoc = 0, $type = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set accountancy account code for a third party into this->code
     *
     *  @param	DoliDB		$db             Database handler
     *  @param  Societe		$societe        Third party object
     *  @param  string		$type			'customer' or 'supplier'
     *  @return	int							>=0 if OK, <0 if KO
     */
    public function get_code($db, $societe, $type = '')
    {
    }
    /**
     *  Return if a code is available
     *
     *	@param	DoliDB		$db			Database handler
     * 	@param	string		$code		Code of third party
     * 	@param	Societe		$societe	Object third party
     * 	@param	string		$type		'supplier' or 'customer'
     *	@return	int						0 if OK but not available, >0 if OK and available, <0 if KO
     */
    public function verif($db, $code, $societe, $type)
    {
    }
}