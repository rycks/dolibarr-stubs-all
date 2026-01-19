<?php

/**
 *	Classe permettant la gestion monkey des codes tiers
 */
class mod_codeclient_monkey extends \ModeleThirdPartyCode
{
    /**
     * @var string model name
     */
    public $name = 'Monkey';
    public $code_modifiable;
    // Code modifiable
    public $code_modifiable_invalide;
    // Code modifiable si il est invalide
    public $code_modifiable_null;
    // Code modifiables si il est null
    public $code_null;
    // Code facultatif
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var int Automatic numbering
     */
    public $code_auto;
    public $prefixcustomer = 'CU';
    public $prefixsupplier = 'SU';
    public $prefixIsRequired;
    // Le champ prefix du tiers doit etre renseigne quand on utilise {pre}
    /**
     * 	Constructor
     */
    public function __construct()
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
     * @param	Translate	$langs		Object langs
     * @param	societe		$objsoc		Object thirdparty
     * @param	int			$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string					Return string example
     */
    public function getExample($langs, $objsoc = 0, $type = -1)
    {
    }
    /**
     *  Return next value
     *
     *  @param	Societe		$objsoc     Object third party
     *  @param  int			$type       Client ou fournisseur (1:client, 2:fournisseur)
     *  @return string      			Value if OK, '' if module not configured, <0 if KO
     */
    public function getNextValue($objsoc = 0, $type = -1)
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
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *		Renvoi si un code est pris ou non (par autre tiers)
     *
     *		@param	DoliDB		$db			Handler acces base
     *		@param	string		$code		Code a verifier
     *		@param	Societe		$soc		Objet societe
     *		@param  int		  	$type   	0 = customer/prospect , 1 = supplier
     *		@return	int						0 if available, <0 if KO
     */
    public function verif_dispo($db, $code, $soc, $type = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi si un code respecte la syntaxe
     *
     *  @param  string      $code       Code a verifier
     *  @return int                     0 si OK, <0 si KO
     */
    public function verif_syntax($code)
    {
    }
}