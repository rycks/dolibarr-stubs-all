<?php

/**
 *  Cactus Class of numbering models of suppliers invoices references
 */
class mod_facture_fournisseur_cactus extends \ModeleNumRefSuppliersInvoices
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
    public $nom = 'Cactus';
    /**
     * @var string model name
     */
    public $name = 'Cactus';
    public $prefixinvoice = 'SI';
    public $prefixcreditnote = 'SA';
    public $prefixdeposit = 'SD';
    /**
     *  Return description of numbering model
     *
     *  @return     string      Text with description
     */
    public function info()
    {
    }
    /**
     *  Returns a numbering example
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     * 	Tests if the numbers already in the database do not cause conflicts that would prevent this numbering.
     *
     *  @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     * Return next value
     *
     * @param	Societe		$objsoc     Object third party
     * @param  	Object		$object		Object invoice
     * @param   string		$mode       'next' for next value or 'last' for last value
     * @return 	string      			Value if OK, <=0 if KO
     */
    public function getNextValue($objsoc, $object, $mode = 'next')
    {
    }
    /**
     * Return next free value
     *
     * @param	Societe		$objsoc     	Object third party
     * @param	string		$objforref		Object for number to search
     * @param   string		$mode       	'next' for next value or 'last' for last value
     * @return  string      				Next free value
     */
    public function getNumRef($objsoc, $objforref, $mode = 'next')
    {
    }
}