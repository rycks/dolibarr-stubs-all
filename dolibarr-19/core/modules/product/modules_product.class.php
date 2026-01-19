<?php

/**
 *	Parent class to manage intervention document templates
 */
abstract class ModelePDFProduct extends \CommonDocGenerator
{
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
abstract class ModeleProductCode extends \CommonNumRefGenerator
{
    /**
     * @var int Automatic numbering
     */
    public $code_auto;
    /**
     * @var string Editable code
     */
    public $code_modifiable;
    public $code_modifiable_invalide;
    // Modified code if it is invalid
    /**
     * @var int Code facultatif
     */
    public $code_null;
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