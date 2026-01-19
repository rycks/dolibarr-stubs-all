<?php

/**
 *	\class 		mod_codeproduct_leopard
 *	\brief 		Classe permettant la gestion leopard des codes produits
 */
class mod_codeproduct_leopard extends \ModeleProductCode
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
     *  @param	Translate	$langs	Object langs
     *  @return string      		Description of module
     */
    public function info($langs)
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     * @param	product		$objproduct		Object product
     * @param	int			$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string					Return next value
     */
    public function getNextValue($objproduct = 0, $type = -1)
    {
    }
    /**
     *  Check validity of code according to its rules
     *
     *  @param	DoliDB		$db		Database handler
     *  @param	string		$code	Code to check/correct
     *  @param	Product		$product	Object product
     *  @param  int		  	$type   0 = product , 1 = service
     *  @return int                 0 if OK
     *                              -1 ErrorBadProductCodeSyntax
     *                              -2 ErrorProductCodeRequired
     *                              -3 ErrorProductCodeAlreadyUsed
     *                              -4 ErrorPrefixRequired
     */
    public function verif($db, &$code, $product, $type)
    {
    }
}