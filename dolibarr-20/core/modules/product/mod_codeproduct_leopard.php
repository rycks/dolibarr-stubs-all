<?php

/**
 *	\class 		mod_codeproduct_leopard
 *	\brief 		Class permettant la gestion leopard des codes produits
 */
class mod_codeproduct_leopard extends \ModeleProductCode
{
    /*
     * Please note this module is used by default if no module has been defined in the configuration
     *
     * Its operation must therefore remain as open as possible
     */
    // variables inherited from ModelProductCode class
    public $name = 'Leopard';
    public $version = 'dolibarr';
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
     * @param	Translate	$langs		Object langs
     * @param	Product		$objproduct		Object product
     * @param	int			$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string					Return string example
     */
    public function getExample($langs, $objproduct = \null, $type = -1)
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     * @param	Product|string	$objproduct	Object product
     * @param	int				$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string						Return next value
     */
    public function getNextValue($objproduct = '', $type = -1)
    {
    }
    /**
     *  Check validity of code according to its rules
     *
     *  @param	DoliDB		$db			Database handler
     *  @param	string		$code		Code to check/correct
     *  @param	Product		$product	Object product
     *  @param  int		  	$type   	0 = product , 1 = service
     *  @return int                 	0 if OK
     *                              	-1 ErrorBadProductCodeSyntax
     *                              	-2 ErrorProductCodeRequired
     *                              	-3 ErrorProductCodeAlreadyUsed
     *                              	-4 ErrorPrefixRequired
     */
    public function verif($db, &$code, $product, $type)
    {
    }
}