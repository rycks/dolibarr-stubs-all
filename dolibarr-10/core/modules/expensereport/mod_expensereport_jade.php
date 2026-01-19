<?php

/**
 *	Class to manage expensereport numbering rules Jade
 */
class mod_expensereport_jade extends \ModeleNumRefExpenseReport
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'ER';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Jade';
    /**
     * @var string model name
     */
    public $name = 'Jade';
    /**
     *  Return description of numbering model
     *
     *  @return     string      Text with description
     */
    public function info()
    {
    }
    /**
     *  Returns an example of numbering
     *
     *  @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     *  Test whether the numbers already in force in the base do not cause conflicts
     *  that would prevent this numbering from working.
     *
     *  @return     boolean     false si conflit, true si ok
     */
    public function canBeActivated()
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