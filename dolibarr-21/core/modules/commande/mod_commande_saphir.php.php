<?php

/**
 *	Class to manage Sales Order numbering rules Saphir
 */
class mod_commande_saphir extends \ModeleNumRefCommandes
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
    public $name = 'Saphir';
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
     *  @return     string|int<0,0>      Example
     */
    public function getExample()
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe			$objsoc     Object thirdparty
     *  @param  Commande		$object		Object we need next value for
     *  @return string|int<-1,0>		Value if OK, -1 if KO
     */
    public function getNextValue($objsoc, $object)
    {
    }
}