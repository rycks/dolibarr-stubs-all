<?php

/**
 *	Class to manage customer Bom numbering rules advanced
 */
class mod_stocktransfer_advanced extends \ModeleNumRefStockTransfer
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
    /**
     * @var string name
     */
    public $name = 'got2be';
    /**
     *  Returns the description of the numbering model
     *
     *  @return     string      Descriptive text
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
     * 	Return next free value
     *
     *  @param  Object		$object		Object we need next value for
     *  @return string      			Value if KO, <0 if KO
     */
    public function getNextValue($object)
    {
    }
}