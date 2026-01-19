<?php

/**
 *	Parent class for barcode document generators (image)
 *
 *	@property 'development'|'experimental'|'dolibarr' $version Dolibarr version of loaded document
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
     *  Return description
     *
     *  @param  Translate   $langs      Lang object to use for output
     *  @return string                  Descriptive text
     */
    public abstract function info($langs);
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
    /**
     *  Return true if encoding is supported
     *
     *  @param  string  $encoding       Encoding norm
     *  @return int                     >0 if supported, 0 if not
     */
    public abstract function encodingIsSupported($encoding);
}
/**
 *	Parent class for barcode numbering models
 *
 *	@property string $nom Name for the GeneratorModel
 */
abstract class ModeleNumRefBarCode extends \CommonNumRefGenerator
{
    // variables inherited from CommonNumRefGenerator
    /**
     * @var int<0,1>
     */
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
     * Return an example of result returned by getNextValue
     *
     * @param   ?Translate		$langs			Object langs
     * @param   ?CommonObject	$object			Object product
     * @return  string							Return string example
     */
    public abstract function getExample($langs = \null, $object = \null);
    /**
     *      Return description of module parameters
     *
     *      @param	Translate	$langs      Output language
     *		@param	?Societe	$soc		Third party object
     *		@param	int			$type		-1=Nothing, 0=Product, 1=Service
     *		@return	string					HTML translated description
     */
    public function getToolTip($langs, $soc, $type)
    {
    }
    /**
     * 	Check validity of code according to its rules
     *
     *	@param	DoliDB		$db					Database handler
     *	@param	string		$code				Code to check/correct
     *	@param	Product|Societe	$object		Object product or ThirdParty
     *  @param  int<0,1>  	$thirdparty_type   	0 = customer/prospect , 1 = supplier
     *  @param	string		$type       	    type of barcode (EAN, ISBN, ...)
     *  @return int<-7,0>						0 if OK
     * 											-1 ErrorBadCustomerCodeSyntax
     * 											-2 ErrorCustomerCodeRequired
     * 											-3 ErrorCustomerCodeAlreadyUsed
     * 											-4 ErrorPrefixRequired
     * 											-7 ErrorBadClass
     */
    public abstract function verif($db, &$code, $object, $thirdparty_type, $type);
}