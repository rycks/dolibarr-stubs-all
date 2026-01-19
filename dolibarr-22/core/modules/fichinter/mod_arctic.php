<?php

/**
 *	Class to manage numbering of intervention cards with rule Arctic.
 */
class mod_arctic extends \ModeleNumRefFicheinter
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
     * @var string Nom du modele
     * @deprecated Use $name, getName()
     * @see $name
     */
    public $nom = 'arctic';
    /**
     * @var string model name
     */
    public $name = 'arctic';
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
     * Return an example of numbering
     *
     * @return     string      Example
     */
    public function getExample()
    {
    }
    /**
     * 	Return next free value
     *
     *  @param	Societe|string		$objsoc     Object thirdparty
     *  @param  Fichinter|string	$object		Object we need next value for
     *	@return string|int<-1,0>    			Next value if OK, <=0 if KO
     */
    public function getNextValue($objsoc = '', $object = '')
    {
    }
    /**
     *  Return next free value
     *
     *  @param	Societe			$objsoc     Object third party
     *  @param	Fichinter		$objforref	Object for number to search
     *  @return string|int      			Next free value, 0 if KO
     *  @deprecated see getNextValue
     */
    public function getNumRef($objsoc, $objforref)
    {
    }
}