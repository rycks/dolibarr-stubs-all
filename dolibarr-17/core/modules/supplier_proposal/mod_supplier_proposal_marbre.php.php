<?php

/**
 * Class to manage the Marbre numbering rule for Request for quotation
 */
class mod_supplier_proposal_marbre extends \ModeleNumRefSupplierProposal
{
    /**
     * Dolibarr version of the loaded document
     * @var string
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
     *  @return     string      Text with description
     */
    public function info()
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
     *  @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Return next value
     *
     *  @param	Societe				$objsoc     			Object third party
     * 	@param	SupplierProposal	$supplier_proposal		Object commercial proposal
     *  @return string      								Next value
     */
    public function getNextValue($objsoc, $supplier_proposal)
    {
    }
    /**
     *  Return next free value
     *
     *  @param	Societe		$objsoc      	Object third party
     * 	@param	Object		$objforref		Object for number to search
     *  @return string      				Next free value
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}