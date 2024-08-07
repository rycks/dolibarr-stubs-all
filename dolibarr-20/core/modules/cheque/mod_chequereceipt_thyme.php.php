<?php

/**
 *	Class to manage cheque receipts numbering rules Thyme
 */
class mod_chequereceipt_thyme extends \ModeleNumRefChequeReceipts
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Error message
     */
    public $error = '';
    public $name = 'Thyme';
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
     *  @param  RemiseCheque	$object		Object we need next value for
     *  @return string|0      				Next value if OK, 0 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}