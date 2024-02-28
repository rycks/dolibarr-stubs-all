<?php

/**
 *	Class to generate document for a generic donations receipt
 */
class html_generic extends \ModeleDon
{
    /**
     *  Constructor
     *
     *  @param      DoliDb      $db      Database handler
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
    /**
     *  Load translation files
     *
     *  @param	Translate	$outputlangs    Lang object for output language
     *  @return	Translate	$outputlangs    Lang object for output language
     */
    private function loadTranslationFiles($outputlangs)
    {
    }
    /**
     *  Write the object to document file to disk
     *
     *  @param	Don			$don	        Donation object
     *  @return	string             			Label for payment type
     */
    private function getDonationPaymentType($don)
    {
    }
    /**
     *  Get the contents of the file
     *
     *  @param	Don			$don	        Donation object
     *  @param	Translate	$outputlangs    Lang object for output language
     *  @param	string		$currency		Currency code
     *  @return	string             			Contents of the file
     */
    private function getContents($don, $outputlangs, $currency)
    {
    }
    /**
     *  Write the object to document file to disk
     *
     *  @param	string			$path	        Path for the file
     *  @param	string			$contents	Contents of the file
     *  @return	NULL
     */
    private function saveFile($path, $contents)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Write the object to document file to disk
     *
     *  @param	Don			$don	        Donation object
     *  @param	Translate	$outputlangs    Lang object for output language
     *  @param	string		$currency		Currency code
     *  @return	int             			>0 if OK, <0 if KO
     */
    public function write_file($don, $outputlangs, $currency = '')
    {
    }
}