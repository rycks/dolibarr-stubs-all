<?php

/**
 *	Parent class for third parties models of doc generators
 */
abstract class ModeleThirdPartyDoc extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     * 	@param	DoliDB		$dbs				Database handler
     *  @param	integer		$maxfilenamelength  Max length of value to show
     * 	@return	array							List of templates
     */
    public static function liste_modeles($dbs, $maxfilenamelength = 0)
    {
    }
}
/**
 *		Parent class for third parties code generators
 */
abstract class ModeleThirdPartyCode
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var array Error code (or message) array
     */
    public $errors;
    /**     Returns the default description of the numbering pattern
     *
     *		@param	Translate	$langs		Object langs
     *      @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**     Return name of module
     *
     *		@param	Translate	$langs		Object langs
     *      @return string      			Nom du module
     */
    public function getNom($langs)
    {
    }
    /**     Return an example of numbering
     *
     *		@param	Translate	$langs		Object langs
     *      @return string      			Example
     */
    public function getExample($langs)
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *  @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Return next value available
     *
     *	@param	Societe		$objsoc		Object thirdparty
     *	@param	int			$type		Type
     *  @return string      			Value
     */
    public function getNextValue($objsoc = 0, $type = -1)
    {
    }
    /**
     *  Return version of module
     *
     *  @return     string      Version
     */
    public function getVersion()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoie la liste des modeles de numérotation
     *
     *  @param	DoliDB	$dbs     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array|int					List of numbers
     */
    public static function liste_modeles($dbs, $maxfilenamelength = 0)
    {
    }
    /**
     *  Return description of module parameters
     *
     *  @param	Translate	$langs      Output language
     *  @param	Societe		$soc		Third party object
     *  @param	int			$type		-1=Nothing, 0=Customer, 1=Supplier
     *  @return	string					HTML translated description
     */
    public function getToolTip($langs, $soc, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Check if mask/numbering use prefix
     *
     *   @return    int	    0=no, 1=yes
     */
    public function verif_prefixIsUsed()
    {
    }
}
/**
 *		Parent class for third parties accountancy code generators
 */
abstract class ModeleAccountancyCode
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     *  Return description of module
     *
     *  @param	Translate	$langs		Object langs
     *  @return string      			Description of module
     */
    public function info($langs)
    {
    }
    /**
     *  Return an example of result returned by getNextValue
     *
     *  @param	Translate	$langs		Object langs
     *  @param	societe		$objsoc		Object thirdparty
     *  @param	int			$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     *  @return	string					Example
     */
    public function getExample($langs, $objsoc = 0, $type = -1)
    {
    }
    /**
     *  Checks if the numbers already in the database do not
     *  cause conflicts that would prevent this numbering working.
     *
     *  @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Return version of module
     *
     *  @return     string      Version
     */
    public function getVersion()
    {
    }
    /**
     *  Return description of module parameters
     *
     *  @param	Translate	$langs      Output language
     *  @param	Societe		$soc		Third party object
     *  @param	int			$type		-1=Nothing, 0=Customer, 1=Supplier
     *  @return	string					HTML translated description
     */
    public function getToolTip($langs, $soc, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set accountancy account code for a third party into this->code
     *
     *  @param	DoliDB	$db             Database handler
     *  @param  Societe	$societe        Third party object
     *  @param  int		$type			'customer' or 'supplier'
     *  @return	int						>=0 if OK, <0 if KO
     */
    public function get_code($db, $societe, $type = '')
    {
    }
}