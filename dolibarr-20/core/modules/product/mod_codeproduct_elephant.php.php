<?php

/**
 *  Class to manage product code with elephant rule
 */
class mod_codeproduct_elephant extends \ModeleProductCode
{
    // variables inherited from ModelProductCode class
    public $name = 'Elephant';
    public $version = 'dolibarr';
    // variables not inherited
    /**
     *  @var string			String de recherche
     */
    public $searchcode;
    /**
     *  @var int			Nombre de chiffres du compteur
     */
    public $numbitcounter;
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
     * @param	Translate		$langs		Object langs
     * @param	Product|string	$objproduct	Object product
     * @param	int				$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string						Return string example
     */
    public function getExample($langs, $objproduct = '', $type = -1)
    {
    }
    /**
     * Return next value
     *
     * @param	Product		$objproduct     Object product
     * @param  	int		    $type       Produit ou service (0:product, 1:service)
     * @return 	string|-1      			Value if OK, '' if module not configured, -1 if KO
     */
    public function getNextValue($objproduct = \null, $type = -1)
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
     *	@param	DoliDB		$db			Database handler
     *	@param	string		$code		Code to check/correct
     *	@param	Product		$product	Object product
     *  @param  int		  	$type   	0 = product , 1 = service
     *  @return int						0 if OK
     * 									-1 ErrorBadCustomerCodeSyntax
     * 									-2 ErrorCustomerCodeRequired
     * 									-3 ErrorCustomerCodeAlreadyUsed
     * 									-4 ErrorPrefixRequired
     * 									-5 Other (see this->error)
     */
    public function verif($db, &$code, $product, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Indicate if the code is available or not (by another third party)
     *
     *  @param	DoliDB		$db			Handler access base
     *  @param	string		$code		Code a verifier
     *  @param	Product		$product		Object product
     *  @return	int						0 if available, <0 if KO
     */
    public function verif_dispo($db, $code, $product)
    {
    }
}