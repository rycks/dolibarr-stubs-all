<?php

/**
 *	Parent class for barcode document generators (image)
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
    /**
     *	Save an image file on disk (with no output)
     *
     *	@param	   string	    $code		      Value to encode
     *	@param	   string	    $encoding	      Mode of encoding ('QRCODE', 'EAN13', ...)
     *	@param	   string	    $readable	      Code can be read
     *	@param	   integer		$scale			  Scale (not used with this engine)
     *  @param     integer      $nooutputiferror  No output if error (not used with this engine)
     *	@return	   int			                  Return integer <0 if KO, >0 if OK
     */
    public function writeBarCode($code, $encoding, $readable = 'Y', $scale = 1, $nooutputiferror = 0)
    {
    }
}
/**
 *	Parent class for barcode numbering models
 */
abstract class ModeleNumRefBarCode extends \CommonNumRefGenerator
{
    // variables inherited from CommonNumRefGenerator
    public $code_null;
    /**
     *  Return next value available
     *
     *	@param	?CommonObject	$objcommon	Object Product, Thirdparty
     *	@param	string			$type		Type of barcode (EAN, ISBN, ...)
     *  @return string						Value
     */
    public function getNextValue($objcommon = \null, $type = '')
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