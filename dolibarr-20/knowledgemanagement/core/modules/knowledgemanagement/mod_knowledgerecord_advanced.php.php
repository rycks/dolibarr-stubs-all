<?php

/**
 *	Class to manage customer Bom numbering rules advanced
 */
class mod_knowledgerecord_advanced extends \ModeleNumRefKnowledgeRecord
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
    public $name = 'advanced';
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
     *  @return string|0      			Next value if OK, 0 if KO
     */
    public function getNextValue($object)
    {
    }
}