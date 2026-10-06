<?php

/**
 *	Class to manage the knowledgerecord numbering rules standard
 */
class mod_knowledgerecord_standard extends \ModeleNumRefKnowledgeRecord
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string
     */
    public $prefix = 'KM';
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string name
     */
    public $name = 'standard';
    /**
     *	Returns the default description of the numbering template
     *
     *  @param	Translate	$langs Object langs
     *	@return	string	Descriptive text
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
     *  @param  KnowledgeRecord	$object		Object we need next value for
     *  @return string|int<-1,0>			Next value if OK, <=0 if KO
     */
    public function getNextValue($object)
    {
    }
}