<?php

/**
 *	Parent class to manage intervention document templates
 */
abstract class ModelePDFProduct extends \CommonDocGenerator
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * @var int page_largeur
     */
    public $page_largeur;
    /**
     * @var int page_hauteur
     */
    public $page_hauteur;
    /**
     * @var array format
     */
    public $format;
    /**
     * @var int marge_gauche
     */
    public $marge_gauche;
    /**
     * @var int marge_droite
     */
    public $marge_droite;
    /**
     * @var int marge_haute
     */
    public $marge_haute;
    /**
     * @var int marge_basse
     */
    public $marge_basse;
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Return list of active generation modules
     *
     *  @param	DoliDB	$dbs     			Database handler
     *  @param  integer	$maxfilenamelength  Max length of value to show
     *  @return	array						List of templates
     */
    public static function liste_modeles($dbs, $maxfilenamelength = 0)
    {
    }
}
/**
 * Class template for classes of numbering product
 */
abstract class ModeleProductCode
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**     Returns the default description of the numbering pattern
     *
     *		@param	Translate	$langs		Object langs
     *      @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**     Renvoi nom module
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
     *      @return     boolean     false if conflict, true if ok
     */
    public function canBeActivated()
    {
    }
    /**
     *  Return next value available
     *
     *	@param	Product		$objproduct		Object product
     *	@param	int			$type		Type
     *  @return string      			Value
     */
    public function getNextValue($objproduct = 0, $type = -1)
    {
    }
    /**     Return version of module
     *
     *      @return     string      Version
     */
    public function getVersion()
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *  Renvoi la liste des modeles de numérotation
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
     *  @param	Product		$product	Product object
     *  @param	int			$type		-1=Nothing, 0=Customer, 1=Supplier
     *  @return	string					HTML translated description
     */
    public function getToolTip($langs, $product, $type)
    {
    }
    // phpcs:disable PEAR.NamingConventions.ValidFunctionName.ScopeNotCamelCaps
    /**
     *   Check if mask/numbering use prefix
     *
     *   @return	int		0=no, 1=yes
     */
    public function verif_prefixIsUsed()
    {
    }
}