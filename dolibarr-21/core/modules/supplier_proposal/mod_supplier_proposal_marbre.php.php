<?php

/**
 * Class to manage the Marbre numbering rule for Request for quotation
 */
class mod_supplier_proposal_marbre extends \ModeleNumRefSupplierProposal
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'RQ';
    // RQ = Request for quotation
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Marbre';
    /**
     * @var string model name
     */
    public $name = 'Marbre';
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
     *  Return an example of numbering module values
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
     *  Return next value
     *
     *  @param	Societe				$objsoc					Object third party
     * 	@param	?SupplierProposal	$supplier_proposal		Object commercial proposal
     *  @return string|int<-1,0>							Next value if OK, -1 if KO
     */
    public function getNextValue($objsoc, $supplier_proposal)
    {
    }
    /**
     *  Return next free value
     *
     *  @param	Societe				$objsoc     Object third party
     * 	@param	SupplierProposal	$objforref	Object for number to search
     *  @return string      					Next free value
     *  @deprecated see getNextValue
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}