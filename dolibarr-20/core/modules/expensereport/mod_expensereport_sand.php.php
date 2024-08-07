<?php

/**
 *	Class to manage expense report numbering rules Sand
 */
class mod_expensereport_sand extends \ModeleNumRefExpenseReport
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
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Sand';
    /**
     * @var string model name
     */
    public $name = 'Sand';
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
     *  Return next free value
     *
     *  @param  ExpenseReport	$object     Object we need next value for
     *  @return string|0                	Next value if OK, 0 if KO
     */
    public function getNextValue($object)
    {
    }
}