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
     *  @param  DoliDB  	$db                 Database handler
     *  @param  int<0,max>	$maxfilenamelength  Max length of value to show
     *  @return string[]|int<-1,0>				List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Function to build a document on disk using the generic odt module.
     *
     *	@param	Societe		$object				Object source to build document
     *	@param	Translate	$outputlangs		Lang output object
     *	@param	string		$srctemplatepath	Full path of source filename for generator using a template file
     *	@param	int<0,1>	$hidedetails		Do not show line details
     *	@param	int<0,1>	$hidedesc			Do not show desc
     *	@param	int<0,1>	$hideref			Do not show ref
     *	@return	int<-1,1>						1 if OK, <=0 if KO
     */
    public abstract function write_file($object, $outputlangs, $srctemplatepath = '', $hidedetails = 0, $hidedesc = 0, $hideref = 0);
    // phpcs:enable
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
     * Return an example of result returned by getNextValue
     *
     * @param	?Translate		$langs		Object langs
     * @param	Societe|string	$objsoc		Object thirdparty
     * @param	int<-1,2>		$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string						Return string example
     */
    public abstract function getExample($langs = \null, $objsoc = '', $type = -1);
    /**
     *  Return next value available
     *
     *	@param	Societe|string|null	$objsoc	Object thirdparty
     *	@param	int<-1,2>			$type	Type
     *  @return string						Value
     */
    public function getNextValue($objsoc = '', $type = -1)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param  DoliDB  	$dbs				Database handler
     *  @param  int<0,max>	$maxfilenamelength	Max length of value to show
     *  @return string[]|int<-1,0>				List of templates
     */
    public static function liste_modeles($dbs, $maxfilenamelength = 0)
    {
    }
    /**
     *  Return description of module parameters
     *
     *  @param	Translate	$langs      Output language
     *  @param	?Societe	$soc		Third party object
     *  @param	int<-1,1>	$type		-1=Nothing, 0=Customer, 1=Supplier
     *  @return	string					HTML translated description
     */
    public function getToolTip($langs, $soc, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Check if mask/numbering use prefix
     *
     *   @return    int<0,1>    0=no, 1=yes
     */
    public function verif_prefixIsUsed()
    {
    }
    /**
     * 	Check validity of code according to its rules
     *
     *	@param	DoliDB		$db		Database handler
     *	@param	string		$code	Code to check/correct
     *	@param	Societe		$soc	Object third party
     *  @param  int<0,1>  	$type   0 = customer/prospect , 1 = supplier
     *  @return int<-6,0>			0 if OK
     * 								-1 ErrorBadCustomerCodeSyntax
     * 								-2 ErrorCustomerCodeRequired
     * 								-3 ErrorCustomerCodeAlreadyUsed
     * 								-4 ErrorPrefixRequired
     * 								-5 NotConfigured - Setup empty so any value may be ok or not
     * 								-6 Other (see this->error)
     */
    public abstract function verif($db, &$code, $soc, $type);
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
     *  @param	?Societe	$soc		Third party object
     *  @param	int<-1,1>	$type		-1=Nothing, 0=Customer, 1=Supplier
     *  @return	string					HTML translated description
     */
    public function getToolTip($langs, $soc, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Set accountancy account code for a third party into this->code
     *
     *  @param	DoliDB		$db         Database handler
     *  @param  ?Societe	$societe	Third party object
     *  @param  'customer'|'supplier'|''	$type	'customer' or 'supplier'
     *  @return	int<-1,1>				>=0 if success, -1 if failure
     */
    public function get_code($db, $societe, $type = '')
    {
    }
    /**
     * Return an example of result returned by getNextValue
     *
     * @param	?Translate		$langs		Object langs
     * @param	Societe|string	$objsoc		Object thirdparty
     * @param	int<-1,2>		$type		Type of third party (1:customer, 2:supplier, -1:autodetect)
     * @return	string						Return string example
     */
    public abstract function getExample($langs = \null, $objsoc = '', $type = -1);
}