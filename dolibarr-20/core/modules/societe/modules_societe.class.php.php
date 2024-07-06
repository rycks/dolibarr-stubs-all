<?php

/**
 *	Parent class for third parties models of doc generators
 */
abstract class ModeleThirdPartyDoc extends \CommonDocGenerator
{
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
abstract class ModeleThirdPartyCode extends \CommonNumRefGenerator
{
    /**
     * Constructor
     *
     *  @param DoliDB       $db     Database object
     */
    public abstract function __construct($db);
    /**
     *  Return next value available
     *
     *	@param	Societe|string	$objsoc		Object thirdparty
     *	@param	int				$type		Type
     *  @return string      				Value
     */
    public function getNextValue($objsoc = '', $type = -1)
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
abstract class ModeleAccountancyCode extends \CommonNumRefGenerator
{
    /**
     * @var string
     */
    public $code;
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
     *  @param  string	$type			'customer' or 'supplier'
     *  @return	int<-1,1>				>=0 if success, -1 if failure
     */
    public function get_code($db, $societe, $type = '')
    {
    }
}