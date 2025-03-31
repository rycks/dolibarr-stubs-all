<?php

/**
 *	Class to manage customer payment numbering rules Cicada
 */
class mod_payment_cicada extends \ModeleNumRefPayments
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'PAY';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Cicada';
    /**
     * @var string model name
     */
    public $name = 'Cicada';
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
     *  @param  Object		$object		Object we need next value for
     *  @return boolean     			false if conflict, true if ok
     */
    public function canBeActivated($object)
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe			$objsoc     Object thirdparty
     *  @param  ?Paiement		$object		Object we need next value for
     *  @return string|int<-1,0>			Value if OK, <=0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return next free value
     *
     *  @param	Societe		$objsoc     Object third party
     *  @param	?Paiement	$objforref	Object for number to search
     *  @return string|int<-1,0> 		Next free value, -1 if KO
     */
    public function payment_get_num($objsoc, $objforref)
    {
    }
}