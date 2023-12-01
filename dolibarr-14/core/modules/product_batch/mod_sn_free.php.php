<?php

/**
 *	\class 		mod_codeproduct_leopard
 *	\brief 		Classe permettant la gestion leopard des codes produits
 */
class mod_sn_free extends \ModeleNumRefBatch
{
    /*
     * Attention ce module est utilise par defaut si aucun module n'a
     * ete definit dans la configuration
     *
     * Le fonctionnement de celui-ci doit donc rester le plus ouvert possible
     */
    /**
     * @var string model name
     */
    public $name = 'sn_free';
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
    /**
     *	Constructor
     */
    public function __construct()
    {
    }
    /**
     *  Return description of module
     *
     *  @return string      		Description of module
     */
    public function info()
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
}