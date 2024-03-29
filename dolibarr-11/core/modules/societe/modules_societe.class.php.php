<?php

/**
 *	\class      ModeleThirdPartyDoc
 *	\brief      Parent class for third parties models of doc generators
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
     * 	@param	DoliDB		$db					Database handler
     *  @param	integer		$maxfilenamelength  Max length of value to show
     * 	@return	array							List of templates
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
    {
    }
}
/**
 *	    \class      ModeleThirdPartyCode
 *		\brief  	Parent class for third parties code generators
 */
abstract class ModeleThirdPartyCode
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**     Renvoi la description par defaut du modele de numerotation
     *
     *		@param	Translate	$langs		Object langs
     *      @return string      			Texte descripif
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
     *  Checks if the numbers already in force in the data base do not
     *  cause conflicts that would prevent this numbering from working.
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
     *  @param	DoliDB	$db     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of numbers
     */
    public static function liste_modeles($db, $maxfilenamelength = 0)
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
     *  Checks if the numbers already in force in the data base do not
     *  cause conflicts that would prevent this numbering from working.
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
/**
 *  Create a document onto disk according to template module.
 *
 *	@param	DoliDB		$db  			Database handler
 *	@param  Facture		$object			Object invoice
 *  @param  string      $message        Message (not used, deprecated)
 *	@param	string		$modele			Force template to use ('' to not force)
 *	@param	Translate	$outputlangs	objet lang a utiliser pour traduction
 *  @param  int			$hidedetails    Hide details of lines
 *  @param  int			$hidedesc       Hide description
 *  @param  int			$hideref        Hide ref
 *	@return int        					<0 if KO, >0 if OK
 *  @deprecated Use the new function generateDocument of Objects class
 *  @see Societe::generateDocument()
 */
function thirdparty_doc_create(\DoliDB $db, \Societe $object, $message, $modele, $outputlangs, $hidedetails = 0, $hidedesc = 0, $hideref = 0)
{
}