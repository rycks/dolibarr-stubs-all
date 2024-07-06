<?php

/**
 *  Class to manage cheque receipts numbering rules Mint
 */
class mod_chequereceipt_mint extends \ModeleNumRefChequeReceipts
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'CHK';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    public $name = 'Mint';
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
     *  @param  CommonObject	$object	Object we need next value for
     *  @return boolean     			false if conflict, true if ok
     */
    public function canBeActivated($object)
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe			$objsoc     Object thirdparty
     *  @param  RemiseCheque	$object		Object we need next value for
     *  @return string|-1      				Next value if OK, -1 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}