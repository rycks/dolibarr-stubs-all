<?php

/**
 *	Class to manage third party code with elephant rule
 */
class mod_codeclient_elephant extends \ModeleThirdPartyCode
{
    // variables inherited from ModeleThirdPartyCode class
    public $name = 'Elephant';
    public $version = 'dolibarr';
    // variables not inherited
    /**
     * @var string search string
     */
    public $searchcode;
    /**
     * @var int Nombre de chiffres du compteur
     */
    public $numbitcounter;
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
     *  @param	Translate	$langs		Object langs
     *  @return string      			Description of module
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
     * Return next value
     *
     * @param	Societe|string	$objsoc     Object third party
     * @param  	int		    	$type       Client ou fournisseur (0:customer, 1:supplier)
     * @return 	string|-1      				Value if OK, '' if module not configured, -1 if KO
     */
    public function getNextValue($objsoc = '', $type = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Check if mask/numbering use prefix
     *
     *   @return	int			0 or 1
     */
    public function verif_prefixIsUsed()
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
     *		Indicate if the code is available or not (by another third party)
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
}