<?php

/**
 * \class      mod_facture_fournisseur_tulip
 * \brief      Tulip Class of numbering models of suppliers invoices references
*/
class mod_facture_fournisseur_tulip extends \ModeleNumRefSuppliersInvoices
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
    public $nom = 'Tulip';
    /**
     * @var string model name
     */
    public $name = 'Tulip';
    /**
     *  Returns the description of the model numbering
     *
     *	@param	Translate	$langs      Lang object to use for output
     *  @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**
     *  Returns a numbering example
     *
     *  @return     string     Example
     */
    public function getExample()
    {
    }
    /**
     * Return next value
     *
     * @param	Societe				$objsoc     Object third party
     * @param  	FactureFournisseur	$object		Object invoice
     * @param	string				$mode       'next' for next value or 'last' for last value
     * @return 	string|0      					Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $object, $mode = 'next')
    {
    }
    /**
     * Return next free value
     *
     *  @param  Societe     		$objsoc         Object third party
     *  @param  FactureFournisseur  $objforref      Object for number to search
     *  @param  string      		$mode           'next' for next value or 'last' for last value
     *  @return string                      		Next free value
     *  @deprecated see getNextValue
     */
    public function getNumRef($objsoc, $objforref, $mode = 'next')
    {
    }
}