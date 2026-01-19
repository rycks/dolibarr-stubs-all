<?php

/**
 *	Class to manage numbering of thirdparties code
 */
class mod_codeclient_leopard extends \ModeleThirdPartyCode
{
    /*
     * Attention ce module est utilise par default si aucun module n'a
     * ete definite dans la configuration
     *
     * Le fonctionnement de celui-ci doit donc rester le plus ouvert possible
     */
    // variables inherited from ModeleThirdPartyCode class
    public $name = 'Leopard';
    public $version = 'dolibarr';
    /**
     *	Constructor
     *
     *	@param DoliDB		$db		Database object
     */
    public function __construct($db)
    {
    }
    /**
     *  Return description of module
     *
     *  @param  Translate   $langs  Object langs
     *  @return string              Description of module
     */
    public function info($langs)
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     * @param	Translate		$langs		Object langs
     * @param	Societe|string	$objsoc		Object thirdparty
     * @param	int				$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string						Return string example
     */
    public function getExample($langs, $objsoc = '', $type = -1)
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     * @param	Societe|string	$objsoc		Object thirdparty
     * @param	int				$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string						Return next value
     */
    public function getNextValue($objsoc = '', $type = -1)
    {
    }
    /**
     * 	Check validity of code according to its rules
     *
     *	@param	DoliDB		$db		Database handler
     *	@param	string		$code	Code to check/correct
     *	@param	Societe		$soc	Object third party
     *  @param  int		  	$type   0 = customer/prospect , 1 = supplier
     *  @return int					0 if OK
     * 								-1 ErrorBadCustomerCodeSyntax
     * 								-2 ErrorCustomerCodeRequired
     * 								-3 ErrorCustomerCodeAlreadyUsed
     * 								-4 ErrorPrefixRequired
     */
    public function verif($db, &$code, $soc, $type)
    {
    }
}