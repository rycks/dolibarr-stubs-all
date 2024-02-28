<?php

/**
 *	Class to manage numbering of thirdparties code
 */
class mod_codeclient_leopard extends \ModeleThirdPartyCode
{
    /*
     * Attention ce module est utilise par defaut si aucun module n'a
     * ete definit dans la configuration
     *
     * Le fonctionnement de celui-ci doit donc rester le plus ouvert possible
     */
    /**
     * @var string Nom du modele
     * @deprecated
     * @see name
     */
    public $nom = 'Leopard';
    /**
     * @var string model name
     */
    public $name = 'Leopard';
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
    public $code_auto;
    // Numerotation automatique
    /**
     *	Constructor
     */
    public function __construct()
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
     * @param	societe		$objsoc		Object thirdparty
     * @param	int			$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string					Return next value
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
}