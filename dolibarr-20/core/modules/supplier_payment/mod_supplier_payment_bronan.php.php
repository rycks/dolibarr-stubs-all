<?php

/**
 *	Class to manage customer payment numbering rules Cicada
 */
class mod_supplier_payment_bronan extends \ModeleNumRefSupplierPayments
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'SPAY';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Bronan';
    /**
     * @var string model name
     */
    public $name = 'Bronan';
    /**
     *  Return description of numbering module
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
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *	@param	CommonObject	$object		Object we need next value for
     *  @return boolean     				false if KO (there is a conflict), true if OK
     */
    public function canBeActivated($object)
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe			$objsoc     Object thirdparty
     *  @param  PaiementFourn	$object		Object we need next value for
     *  @return string|-1      				Value if OK, -1 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}