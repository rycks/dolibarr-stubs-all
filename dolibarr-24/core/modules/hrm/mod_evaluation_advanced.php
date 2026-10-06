<?php

/**
 *	Class to manage customer evaluation numbering rules advanced
 */
class mod_evaluation_advanced extends \ModeleNumRefEvaluation
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
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
     * 	Return next free value
     *
     *  @param  Evaluation|EvaluationLine|Job|Position|Skill|Skilldet|SkillRank	$object		Object	$object		Object we need next value for
     *  @return string|int<-1,0>			Value if OK, <=0 if KO
     */
    public function getNextValue($object)
    {
    }
}