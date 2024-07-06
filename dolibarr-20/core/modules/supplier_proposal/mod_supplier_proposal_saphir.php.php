<?php

/**
 * Class of file that contains the numbering module rules Saphir
 */
class mod_supplier_proposal_saphir extends \ModeleNumRefSupplierProposal
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
    public $nom = 'Saphir';
    /**
     * @var string model name
     */
    public $name = 'Saphir';
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
     *  Return next value
     *
     *  @param	Societe				$objsoc     			Object third party
     * 	@param	SupplierProposal	$supplier_proposal		Object commercial proposal
     *  @return string|0      								Value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $supplier_proposal)
    {
    }
}