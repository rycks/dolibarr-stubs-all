<?php

/**
 *	Class to manage third party code with elephant rule
 */
class mod_codeclient_elephant extends \ModeleThirdPartyCode
{
    /**
     * @var string model name
     */
    public $name = 'Elephant';
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
    public $searchcode;
    // String de recherche
    public $numbitcounter;
    // Nombre de chiffres du compteur
    public $prefixIsRequired;
    // Le champ prefix du tiers doit etre renseigne quand on utilise {pre}
    /**
     *	Constructor
     */
    public function __construct()
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
     * @param	Translate	$langs		Object langs
     * @param	societe		$objsoc		Object thirdparty
     * @param	int			$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string					Return string example
     */
    public function getExample($langs, $objsoc = 0, $type = -1)
    {
    }
    /**
     * Return next value
     *
     * @param	Societe		$objsoc     Object third party
     * @param  	int		    $type       Client ou fournisseur (0:customer, 1:supplier)
     * @return 	string      			Value if OK, '' if module not configured, <0 if KO
     */
    public function getNextValue($objsoc = 0, $type = -1)
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
     *  @param  int		  	$type   0 = customer/prospect , 1 = supplier
     *  @return int					0 if OK
     * 								-1 ErrorBadCustomerCodeSyntax
     * 								-2 ErrorCustomerCodeRequired
     * 								-3 ErrorCustomerCodeAlreadyUsed
     * 								-4 ErrorPrefixRequired
     * 								-5 Other (see this->error)
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
}