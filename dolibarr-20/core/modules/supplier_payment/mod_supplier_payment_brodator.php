<?php

/**
 *	Class to manage customer payment numbering rules Ant
 */
class mod_supplier_payment_brodator extends \ModeleNumRefSupplierPayments
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Brodator';
    /**
     * @var string model name
     */
    public $name = 'Brodator';
    /**
     *  Returns the description of the numbering model
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
     * 	Return next free value
     *
     *  @param	Societe			$objsoc     Object thirdparty
     *  @param  PaiementFourn	$object		Object we need next value for
     *  @return string|0      				Next value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}