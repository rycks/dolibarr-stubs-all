<?php

/**
 *	Class to manage generation of HTML components for accounting management
 */
class FormFiscalYear extends \Form
{
    /**
     * @var DoliDB Database handler.
     */
    public $db;
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * Constructor
     *
     * @param		DoliDB		$db      Database handler
     */
    public function __construct($db)
    {
    }
    /**
     *	Return list of fiscal year
     *
     *	@param	int		$selected       Preselected type
     *	@param  string	$htmlname       Name of field in form
     * 	@param	int		$useempty		Set to 1 if we want an empty value
     * 	@param	int		$maxlen			Max length of text in combo box
     * 	@param	int		$help			Add or not the admin help picto
     * 	@return	void|string				HTML component with the select
     */
    public function selectFiscalYear($selected = 0, $htmlname = 'fiscalyear', $useempty = 0, $maxlen = 0, $help = 1)
    {
    }
}