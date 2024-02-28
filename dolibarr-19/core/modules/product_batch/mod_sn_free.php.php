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
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     *  Return an example of numbering
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     * @param	Societe		$objsoc	    Object thirdparty
     * @param   Productlot	$object		Object we need next value for
     * @return	string					Return next value
     */
    public function getNextValue($objsoc, $object)
    {
    }
}