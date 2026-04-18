<?php

/**
 *	Class permettant la gestion monkey des codes tiers
 */
class mod_codeclient_monkey extends \ModeleThirdPartyCode
{
    // variables inherited from ModeleThirdPartyCode class
    public $name = 'Monkey';
    public $version = 'dolibarr';
    // variables not inherited
    /**
     * @var string
     */
    public $prefixcustomer = 'CU';
    /**
     * @var string
     */
    public $prefixsupplier = 'SU';
    /**
     * 	Constructor
     *
     *	@param DoliDB		$db		Database object
     */
    public function __construct($db)
    {
    }
    /**
     *  Return description of module
     *
     *  @param	Translate	$langs	Object langs
     *  @return string      		Description of module
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
    /**
     *  Return next value
     *
     * @param	Societe|string|null	$objsoc	Object third party
     * @param	int<-1,2>			$type	Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string|-1      				Value if OK, '' if module not configured, -1 if KO
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
     *  @param  int<0,1>  	$type   0 = customer/prospect , 1 = supplier
     *  @return int<-6,0>			0 if OK
     * 								-1 ErrorBadCustomerCodeSyntax
     * 								-2 ErrorCustomerCodeRequired
     * 								-3 ErrorCustomerCodeAlreadyUsed
     * 								-4 ErrorPrefixRequired
     * 								-5 NotConfigured - Setup empty so any value may be ok or not
     * 								-6 Other (see this->error)
     */
    public function verif($db, &$code, $soc, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Indicates if the code is available or not (by another third party)
     *
     *		@param	DoliDB		$db			Handler access base
     *		@param	string		$code		Code a verifier
     *		@param	Societe		$soc		Object societe
     *		@param  int		  	$type   	0 = customer/prospect , 1 = supplier
     *		@return	int						0 if available, <0 if KO
     */
    public function verif_dispo($db, $code, $soc, $type = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi si un code respecte la syntax
     *
     *  @param  string      $code       Code a verifier
     *  @return int                     0 si OK, <0 si KO
     */
    public function verif_syntax($code)
    {
    }
}