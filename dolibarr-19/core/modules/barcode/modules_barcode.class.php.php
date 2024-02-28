<?php

/**
 *	Parent class for barcode document models
 */
abstract class ModeleBarCode
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**
     * Return if a model can be used or not
     *
     * @return		boolean     true if model can be used
     */
    public function isEnabled()
    {
    }
}
/**
 *	Parent class for barcode numbering models
 */
abstract class ModeleNumRefBarCode extends \CommonNumRefGenerator
{
    /**
     * @var int Code facultatif
     */
    public $code_null;
    /**
     * @var int Automatic numbering
     */
    public $code_auto;
    /**
     *  Return next value available
     *
     *	@param	Product		$objproduct	Object Product
     *	@param	string		$type		Type of barcode (EAN, ISBN, ...)
     *  @return string      			Value
     */
    public function getNextValue($objproduct, $type = '')
    {
    }
    /**
     *      Return description of module parameters
     *
     *      @param	Translate	$langs      Output language
     *		@param	Societe		$soc		Third party object
     *		@param	int			$type		-1=Nothing, 0=Product, 1=Service
     *		@return	string					HTML translated description
     */
    public function getToolTip($langs, $soc, $type)
    {
    }
}