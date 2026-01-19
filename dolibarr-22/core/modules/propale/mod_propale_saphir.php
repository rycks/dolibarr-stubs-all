<?php

/**
 * Class of file that contains the numbering module rules Saphir
 */
class mod_propale_saphir extends \ModeleNumRefPropales
{
    /**
     * Dolibarr version of the loaded document
     * @var string Version, possible values are: 'development', 'experimental', 'dolibarr', 'dolibarr_deprecated' or a version string like 'x.y.z'''|'development'|'dolibarr'|'experimental'
     */
    public $version = 'dolibarr';
    // 'development', 'experimental', 'dolibarr'
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var string Nom du modele
     * @deprecated
     * @see $name
     */
    public $nom = 'Saphir';
    /**
     * @var string model name
     */
    public $name = 'Saphir';
    /**
     *  Return description of module
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
     *  Return next value
     *
     *  @param	?Societe	$objsoc     Object third party
     * 	@param	Propal		$propal		Object commercial proposal
     *  @return string|int<-1,0>		Next value, <=0 if KO
     */
    public function getNextValue($objsoc, $propal)
    {
    }
}