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
abstract class ModeleNumRefBarCode
{
    /**
     * @var string Error code (or message)
     */
    public $error = '';
    /**     Return default description of numbering model
     *
     *		@param	Translate	$langs		Object langs
     *      @return string      			Descriptive text
     */
    public function info($langs)
    {
    }
    /**     Return model name
     *
     *		@param	Translate	$langs		Object langs
     *      @return string      			Model name
     */
    public function getNom($langs)
    {
    }
    /**     Return a numbering example
     *
     *		@param	Translate	$langs		Object langs
     *      @return string      			Example
     */
    public function getExample($langs)
    {
    }
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
    /**     Return version of module
     *
     *      @return     string      Version
     */
    public function getVersion()
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