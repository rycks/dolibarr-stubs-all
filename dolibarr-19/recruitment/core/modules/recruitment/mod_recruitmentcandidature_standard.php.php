<?php

/**
 *	Class to manage the Standard numbering rule for Job application
 */
class mod_recruitmentcandidature_standard extends \ModeleNumRefRecruitmentCandidature
{
    /**
     * Dolibarr version of the loaded document
     * @var string
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    public $prefix = 'JOA';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string name
     */
    public $name = 'standard';
    /**
     *  Return description of numbering module
     *
     *	@param		Translate	$langs		Language
     *  @return     string      Text with description
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
     *  @param  Object		$object		Object we need next value for
     *  @return boolean     			false if conflict, true if ok
     */
    public function canBeActivated($object)
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