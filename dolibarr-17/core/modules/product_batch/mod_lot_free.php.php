<?php

/**
 *	\class mod_lot_free
 *	\brief Class allowing lot_free management of batch numbers
 */
class mod_lot_free extends \ModeleNumRefBatch
{
    /*
     * Please note this module is used by default if no module has been defined in the configuration
     *
     * Its operation must therefore remain as open as possible
     */
    /**
     * @var string model name
     */
    public $name = 'lot_free';
    /**
     * @var string Code modifiable
     */
    public $code_modifiable;
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
     * @param	Societe		$objsoc	    Object thirdparty
     * @param   Productlot	$object		Object we need next value for
     * @return	string					Return next value
     */
    public function getNextValue($objsoc, $object)
    {
    }
}