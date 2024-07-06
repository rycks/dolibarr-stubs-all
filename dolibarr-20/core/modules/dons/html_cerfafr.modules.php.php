<?php

/**
 *	Class to generate document for subscriptions
 */
class html_cerfafr extends \ModeleDon
{
    /**
     *  Constructor
     *
     *  @param      DoliDB      $db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     * 	Return if a module can be used or not
     *
     *  @return	boolean     true if module can be used
     */
    public function isEnabled()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Write the object to document file to disk
     *
     *	@param	Don			$don	        Donation object
     *  @param  Translate	$outputlangs    Lang object for output language
     *  @param	string		$currency		Currency code
     *	@return	int             			>0 if OK, <0 if KO
     */
    public function write_file($don, $outputlangs, $currency = '')
    {
    }
    /**
     * numbers to letters
     *
     * @param   mixed   $montant    amount
     * @param   mixed   $devise1    devise 1 ex: euro
     * @param   mixed   $devise2    devise 2 ex: centimes
     * @return string               amount in letters
     */
    private function amountToLetters($montant, $devise1 = '', $devise2 = '')
    {
    }
}