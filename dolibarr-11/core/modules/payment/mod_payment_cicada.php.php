<?php

/**
 *	Class to manage customer payment numbering rules Cicada
 */
class mod_payment_cicada extends \ModeleNumRefPayments
{
    /**
     * Dolibarr version of the loaded document
     * @var string
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
     * @see name
     */
    public $nom = 'Cicada';
    /**
     * @var string model name
     */
    public $name = 'Cicada';
    /**
     *  Return description of numbering module
     *
     *  @return     string      Text with description
     */
    public function info()
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
     *  Checks if the numbers already in force in the data base do not
     *  cause conflicts that would prevent this numbering from working.
     *
     *  @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe		$objsoc     Object thirdparty
     *  @param  Object		$object		Object we need next value for
     *  @return string      			Value if KO, <0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return next free value
     *
     *  @param	Societe		$objsoc     Object third party
     *  @param	string		$objforref	Object for number to search
     *  @return string      			Next free value
     */
    public function payment_get_num($objsoc, $objforref)
    {
    }
}